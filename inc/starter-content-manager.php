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
	$page_ids = array();

	// Source 1: pages we've already marked as starter content.
	$marked = get_posts(
		array(
			'post_type'      => 'page',
			'posts_per_page' => -1,
			'meta_key'       => '_inspiro_starter_content',
			'meta_value'     => 'yes',
			'fields'         => 'ids',
		)
	);
	$page_ids = array_merge( $page_ids, $marked );

	// Source 2: posts WordPress created for starter content. This theme mod is the
	// authoritative list and crucially includes the Homepage (the "front" page),
	// which is added to the menu as a home link (link_home) and is therefore never
	// found by the menu-item scan below.
	$created_posts = get_theme_mod( 'nav_menus_created_posts', array() );
	if ( is_array( $created_posts ) ) {
		$page_ids = array_merge( $page_ids, $created_posts );
	}

	// Source 3: pages carrying WordPress' own starter-content meta.
	$wp_meta = get_posts(
		array(
			'post_type'      => 'page',
			'posts_per_page' => -1,
			'meta_key'       => '_customize_starter_content_theme',
			'fields'         => 'ids',
		)
	);
	$page_ids = array_merge( $page_ids, $wp_meta );

	// Source 4: page menu items under the default "Main Menu", plus the static front
	// page (the starter Homepage) which the menu references only as a home link.
	$locations = get_nav_menu_locations();
	if ( isset( $locations['primary'] ) ) {
		$menu = wp_get_nav_menu_object( $locations['primary'] );

		if ( $menu && 'Main Menu' === $menu->name ) {
			$menu_items = wp_get_nav_menu_items( $menu->term_id );

			if ( $menu_items ) {
				foreach ( $menu_items as $item ) {
					if ( 'page' === $item->object && $item->object_id
						&& in_array( get_the_title( $item->object_id ), array( 'Homepage', 'About', 'Contact', 'Blog' ), true ) ) {
						$page_ids[] = (int) $item->object_id;
					}
				}
			}

			// The Homepage is the static front page; capture it by title since it
			// isn't a page menu item (it's a link_home in the menu).
			$front_page_id = (int) get_option( 'page_on_front' );
			if ( $front_page_id && 'Homepage' === get_the_title( $front_page_id ) ) {
				$page_ids[] = $front_page_id;
			}
		}
	}

	// Keep only IDs that are still existing pages, de-duplicated.
	$page_ids = array_unique( array_filter( array_map( 'intval', $page_ids ) ) );
	$page_ids = array_values(
		array_filter(
			$page_ids,
			function ( $id ) {
				return 'page' === get_post_type( $id );
			}
		)
	);

	if ( empty( $page_ids ) ) {
		return false;
	}

	// Mark for faster detection next time.
	foreach ( $page_ids as $id ) {
		update_post_meta( $id, '_inspiro_starter_content', 'yes' );
	}

	return $page_ids;
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

	// Reset front page settings BEFORE deleting pages.
	// Cast to int: get_option() returns a numeric string, but $starter_pages holds
	// integers — a strict in_array() would otherwise never match and the front page
	// would stay set to a page we're about to delete.
	$front_page_id = (int) get_option( 'page_on_front' );
	$blog_page_id  = (int) get_option( 'page_for_posts' );

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