<?php
/**
 * Starter Content Manager
 *
 * Functions to detect and delete the default starter content
 *
 * @package Inspiro
 * @since Inspiro 2.2.0
 */

/**
 * Mark pages as starter content when they're created
 * This hooks into the starter content creation process
 */
function inspiro_mark_starter_content_posts( $saved_data ) {
	// Check if posts were created
	if ( isset( $saved_data['posts'] ) && is_array( $saved_data['posts'] ) ) {
		foreach ( $saved_data['posts'] as $post_id ) {
			if ( $post_id ) {
				update_post_meta( $post_id, '_inspiro_starter_content', 'yes' );
			}
		}
	}
	return $saved_data;
}
add_filter( 'customize_save_response', 'inspiro_mark_starter_content_posts', 10, 1 );

/**
 * Check if starter content has been imported
 *
 * @return bool|array Array with page IDs if found, false otherwise
 */
function inspiro_has_starter_content() {
	// First check: Look for pages with the starter content meta
	$query = new WP_Query(
		array(
			'post_type'      => 'page',
			'posts_per_page' => -1,
			'meta_key'       => '_inspiro_starter_content',
			'meta_value'     => 'yes',
			'fields'         => 'ids',
		)
	);

	if ( $query->have_posts() ) {
		return $query->posts; // Return array of page IDs
	}

	// Second check: Look for the primary menu created by starter content
	// Starter content creates a menu in the 'primary' location
	$locations = get_nav_menu_locations();

	if ( isset( $locations['primary'] ) ) {
		$menu_id = $locations['primary'];
		$menu    = wp_get_nav_menu_object( $menu_id );

		// Check if the menu is named "Main Menu" (default starter content menu name)
		if ( $menu && $menu->name === 'Main Menu' ) {
			// Get menu items to find the linked pages
			$menu_items = wp_get_nav_menu_items( $menu_id );
			$page_ids   = array();

			if ( $menu_items ) {
				foreach ( $menu_items as $item ) {
					// Only get page objects
					if ( $item->object === 'page' && $item->object_id ) {
						$page = get_post( $item->object_id );

						// Verify the page title matches typical starter content
						if ( $page && in_array( $page->post_title, array( 'Homepage', 'About', 'Contact', 'Blog' ), true ) ) {
							// Mark it with meta for next time
							update_post_meta( $item->object_id, '_inspiro_starter_content', 'yes' );
							$page_ids[] = $item->object_id;
						}
					}
				}
			}

			// Also check for the front page if it's set and has the starter content meta
			// The starter content uses 'link_home' instead of 'page_home' in the menu
			// so the Homepage page won't be detected through menu items
			$front_page_id = get_option( 'page_on_front' );
			if ( $front_page_id ) {
				// Check if it has the WordPress starter content meta
				$is_starter_content = get_post_meta( $front_page_id, '_customize_starter_content_theme', true );
				if ( $is_starter_content ) {
					update_post_meta( $front_page_id, '_inspiro_starter_content', 'yes' );
					$page_ids[] = $front_page_id;
				}
			}

			if ( ! empty( $page_ids ) ) {
				return $page_ids;
			}
		}
	}

	// Third check: Look for pages with WordPress starter content meta
	// This catches pages that WordPress created as starter content
	$starter_query = new WP_Query(
		array(
			'post_type'      => 'page',
			'posts_per_page' => -1,
			'meta_key'       => '_customize_starter_content_theme',
			'fields'         => 'ids',
		)
	);

	if ( $starter_query->have_posts() ) {
		// Mark these pages with our custom meta for faster detection next time
		foreach ( $starter_query->posts as $page_id ) {
			update_post_meta( $page_id, '_inspiro_starter_content', 'yes' );
		}
		return $starter_query->posts;
	}

	return false;
}

/**
 * Get starter content page IDs
 *
 * @return array Array of page IDs that are marked as starter content
 */
function inspiro_get_starter_content_pages() {
	$pages = inspiro_has_starter_content();

	if ( is_array( $pages ) ) {
		return $pages;
	}

	return array();
}

/**
 * Delete all starter content (pages, widgets, menu)
 *
 * @return array Array with 'success' boolean and 'message' string
 */
function inspiro_delete_starter_content() {
	// Verify nonce if this is an AJAX request
	if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
		check_ajax_referer( 'inspiro_delete_starter_content', 'nonce' );
	}

	// Check user capabilities
	if ( ! current_user_can( 'manage_options' ) ) {
		return array(
			'success' => false,
			'message' => esc_html__( 'You do not have permission to perform this action.', 'inspiro' ),
		);
	}

	$deleted_items = array();

	// Get the starter content pages
	$starter_pages = inspiro_get_starter_content_pages();

	// Reset front page settings BEFORE deleting pages
	$front_page_id = get_option( 'page_on_front' );
	$blog_page_id  = get_option( 'page_for_posts' );

	if ( ( $front_page_id && in_array( $front_page_id, $starter_pages, true ) ) ||
	     ( $blog_page_id && in_array( $blog_page_id, $starter_pages, true ) ) ) {
		update_option( 'show_on_front', 'posts' );
		update_option( 'page_on_front', 0 );
		update_option( 'page_for_posts', 0 );
		$deleted_items[] = esc_html__( 'Reset front page settings', 'inspiro' );
	}

	// Delete the starter content pages
	if ( ! empty( $starter_pages ) ) {
		foreach ( $starter_pages as $page_id ) {
			$page = get_post( $page_id );
			if ( $page ) {
				wp_delete_post( $page_id, true ); // true = force delete (skip trash)
				$deleted_items[] = sprintf( esc_html__( 'Page: %s', 'inspiro' ), $page->post_title );
			}
		}
	}

	// Delete the starter content menu
	$menu = wp_get_nav_menu_object( 'Main Menu' );
	if ( $menu ) {
		wp_delete_nav_menu( $menu->term_id );
		$deleted_items[] = esc_html__( 'Menu: Main Menu', 'inspiro' );
	}

	// Clear starter content widgets from sidebar
	// Only clear if we actually deleted starter content
	if ( ! empty( $starter_pages ) ) {
		$sidebars_widgets = get_option( 'sidebars_widgets', array() );
		$widget_areas     = array( 'sidebar', 'footer_1', 'footer_2', 'footer_3' );
		$cleared_widgets  = false;

		foreach ( $widget_areas as $widget_area ) {
			if ( isset( $sidebars_widgets[ $widget_area ] ) && ! empty( $sidebars_widgets[ $widget_area ] ) ) {
				// Remove widgets from this area
				$sidebars_widgets[ $widget_area ] = array();
				$cleared_widgets = true;
			}
		}

		if ( $cleared_widgets ) {
			update_option( 'sidebars_widgets', $sidebars_widgets );
			$deleted_items[] = esc_html__( 'Cleared starter content widgets', 'inspiro' );
		}
	}

	// Clean up the theme mods that track starter content
	$theme_mods = get_option( 'theme_mods_inspiro', array() );
	if ( isset( $theme_mods['nav_menus_created_posts'] ) ) {
		unset( $theme_mods['nav_menus_created_posts'] );
		update_option( 'theme_mods_inspiro', $theme_mods );
	}

	// Return success message
	if ( ! empty( $deleted_items ) ) {
		return array(
			'success' => true,
			'message' => sprintf(
				esc_html__( 'Successfully deleted starter content: %s', 'inspiro' ),
				implode( ', ', $deleted_items )
			),
		);
	} else {
		return array(
			'success' => false,
			'message' => esc_html__( 'No starter content found to delete.', 'inspiro' ),
		);
	}
}

/**
 * AJAX handler to delete starter content
 */
function inspiro_ajax_delete_starter_content() {
	$result = inspiro_delete_starter_content();
	wp_send_json( $result );
}
add_action( 'wp_ajax_inspiro_delete_starter_content', 'inspiro_ajax_delete_starter_content' );