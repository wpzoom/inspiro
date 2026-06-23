<?php
/**
 * Additional features to allow styling of the templates
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.0.0
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function inspiro_body_classes( $classes ) {
	global $paged;

	// Add class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Add class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Add class if we're viewing the Customizer for easier styling of theme options.
	if ( is_customize_preview() ) {
		$classes[] = 'inspiro-customizer';
	}

	// Add class on front page.
	if ( is_front_page() && 'posts' !== get_option( 'show_on_front' ) ) {
		$classes[] = 'inspiro-front-page';
	}

	if ( $paged < 2 ) {

        $hero_show = inspiro_get_theme_mod( 'hero_enable' );


		// Add a class if there is a custom header.
		if ( is_front_page() && is_home() && $hero_show ) { // Default homepage.
			$classes[] = 'has-header-image';
		} elseif ( is_front_page() && $hero_show ) { // static homepage.
			$classes[] = 'has-header-image';
		} elseif ( is_page() && inspiro_is_frontpage() && $hero_show ) {
			$classes[] = 'has-header-image';
		}
		if ( is_page_template( 'page-templates/full-width-transparent.php' ) ) {
			$classes[] = 'has-header-image';
		}
		if ( is_page_template( 'page-templates/homepage-builder-bb.php' )  ) {
			$classes[] = 'has-header-image';
		}
	}

    $featured_image_show     = inspiro_get_theme_mod( 'display_featured_image' );
    $featured_image_position = inspiro_get_theme_mod( 'featured_image_position' );

    // The featured image only acts as a transparent header cover when it isn't
    // displayed above the title. When it's above the title, the header stays
    // solid, exactly like when the featured image is disabled.
    $featured_image_as_cover = 'above_title' !== $featured_image_position;

	// Add class if the page actually renders the Featured Image as a header cover.
	// Only templates that output the cover should get the transparent header; other
	// templates (e.g. "Without Page Title") leave the header solid even with a thumbnail.
	if ( inspiro_page_uses_featured_cover_template() && has_post_thumbnail() && $featured_image_as_cover && inspiro_page_featured_header_enabled() ) {
		$classes[] = 'has-header-image';
	}

    // Add class if is single post and has post thumbnail.
    if ( ( ( is_single() && 'post' === get_post_type() ) || ( is_single() && 'portfolio_item' === get_post_type() ) ) && has_post_thumbnail() && $featured_image_show && $featured_image_as_cover ) {
        $classes[] = 'has-header-image';
    }

	// Add class if sidebar is used.
	if ( is_active_sidebar( 'blog-sidebar' ) && ! is_page() ) {
		$classes[] = 'has-sidebar';
	}
	if ( is_active_sidebar( 'sidebar' ) ) {
		$classes[] = 'inspiro--with-page-nav';
	}

	// Add class for full width or sidebar right page layouts.
	if ( is_front_page() || is_home() ) {
		if ( 'full' === inspiro_get_theme_mod( 'layout_blog_page' ) ) {
			$classes[] = 'page-layout-full-width';
		} elseif ( 'side-right' === inspiro_get_theme_mod( 'layout_blog_page' ) && is_active_sidebar( 'blog-sidebar' ) ) {
			$classes[] = 'page-layout-sidebar-right';
		}
	}

	if ( is_single() ) {
		if ( 'full' === inspiro_get_theme_mod( 'layout_single_post' ) ) {
			$classes[] = 'page-layout-full-width';
		} elseif ( 'side-right' === inspiro_get_theme_mod( 'layout_single_post' ) && is_active_sidebar( 'blog-sidebar' ) ) {
			$classes[] = 'page-layout-sidebar-right';
		}
	}

	// Add class for display content.
	if ( inspiro_get_theme_mod( 'display_content' ) ) {
		$classes[] = 'post-display-content-' . esc_attr( inspiro_get_theme_mod( 'display_content' ) );
	}

	// Add class if the site title and tagline is hidden.
	if ( 'blank' === get_header_textcolor() ) {
		$classes[] = 'title-tagline-hidden';
	}

	// Add class if has the archive descrption.
	if ( get_the_archive_description() ) {
		$classes[] = 'has-archive-description';
	}

	if ( inspiro_is_external_video_active() && inspiro_get_theme_mod( 'external_header_video_full_height' ) ) {
		$classes[] = 'full-height-iframe-video';
	}

	// Add class if the header search icon is hidden.
	if ( ! inspiro_get_theme_mod( 'header_search_show' ) ) {
		$classes[] = 'header-search-hidden';
	}

	// Get the colorscheme or the default if there isn't one.
	$colors    = inspiro_sanitize_colorscheme( inspiro_get_theme_mod( 'colorscheme' ) );
	$classes[] = 'colors-' . $colors;

	// Add demo layout class if set
	$demo_layout = get_option( 'inspiro_demo_layout' );
	if ( ! empty( $demo_layout ) ) {
		$classes[] = 'layout-' . sanitize_html_class( $demo_layout );
	}

	return $classes;
}
add_filter( 'body_class', 'inspiro_body_classes' );

/**
 * Displays the class names for the footer element.
 *
 * @since 1.0.0
 * @see https://core.trac.wordpress.org/browser/tags/5.5.1/src/wp-includes/post-template.php#L586
 *
 * @param string|string[] $class Space-separated string or array of class names to add to the class list.
 */
function inspiro_footer_class( $class = '' ) {
	// Separates class names with a single space, collates class names for footer element.
	echo 'class="' . esc_attr( join( ' ', inspiro_get_footer_class( $class ) ) ) . '"';
}

/**
 * Retrieves an array of the class names for the footer element.
 *
 * @since 1.0.0
 * @see https://core.trac.wordpress.org/browser/tags/5.5.1/src/wp-includes/post-template.php#L608
 *
 * @param string|string[] $class Space-separated string or array of class names to add to the class list.
 * @return string[] Array of class names.
 */
function inspiro_get_footer_class( $class = '' ) {
	$classes            = array( 'site-footer' );
	$widgets_columns    = inspiro_get_theme_mod( 'footer-widget-areas' );
	$has_footer_widgets = false;

	if ( $widgets_columns > 0 ) {
		for ( $i = 0; $i <= intval( $widgets_columns ); $i++ ) { // phpcs:ignore Generic.CodeAnalysis.ForLoopWithTestFunctionCall.NotAllowed
			if ( $has_footer_widgets ) {
				$classes[] = 'has-footer-widgets';
				break;
			}
			$has_footer_widgets = is_active_sidebar( "footer_$i" );
		}
	}

	if ( ! empty( $class ) ) {
		if ( ! is_array( $class ) ) {
			$class = preg_split( '#\s+#', $class );
		}
		$classes = array_merge( $classes, $class );
	} else {
		// Ensure that we always coerce class to being an array.
		$class = array();
	}

	$classes = array_map( 'esc_attr', $classes );

	/**
	 * Filters the list of CSS footer class names.
	 *
	 * @since 1.0.0
	 *
	 * @param string[] $classes An array of footer class names.
	 * @param string[] $class   An array of additional class names added to the footer.
	 */
	$classes = apply_filters( 'inspiro_footer_class', $classes, $class );

	return array_unique( $classes );
}

/**
 * Custom function for remove first and last p tags.
 * used for footer-copyright text
 */
function inspiro_custom_sanitize_callback( $content ) {

	return inspiro_remove_first_and_last_p_tags( wp_kses_post( $content ) );
}

/**
 * Render Footer Copyright Markup!
 * Replace placeholders in the copyright text with actual values.
 * Placeholders:
 * - {copyright} -> © (copyright symbol)
 * - {current-year} -> current year (e.g., 2024)
 * - {site-title} -> site name (e.g., My Blog)
 *
 * @param   string  $content  The raw content with placeholders.
 *
 * @return string The content with placeholders replaced by actual values.
 */
function get_footer_copyright_text( string $content ) {

	// Define replacements for placeholders.
	$replacements = array(
		'{copyright}'    => '&copy;',
		'{current-year}' => date( 'Y' ),
		'{site-title}'   => get_bloginfo( 'name' ),
	);

	// Perform the replacements in the content.
	return str_replace( array_keys( $replacements ), array_values( $replacements ), $content );
}

/**
 * Custom function for remove first and last p tags.
 */
function inspiro_remove_first_and_last_p_tags( $content ) {
	// Remove the first opening <p> tag.
	$content = preg_replace( '/<p[^>]*>/', '', $content, 1 );

	// Remove the last closing </p> tag.
	$content = preg_replace( '/<\/p>\s*$/', '', $content, 1 );

	return $content;
}


/**
 * Checks to see if we're on the front page or not.
 */
function inspiro_is_frontpage() {
	return ( is_front_page() && ! is_home() );
}

/**
 * Whether the Featured Image is allowed to display as a header cover on a page.
 *
 * Reflects the global "Display Featured Image in Page Header" Customizer option
 * and the per-page "Hide Featured Image" override. It does NOT check whether the
 * page actually has a Featured Image — callers combine it with has_post_thumbnail().
 *
 * @since 2.2.1
 *
 * @param int|null $post_id Optional. Page ID. Defaults to the queried object.
 * @return bool
 */
function inspiro_page_featured_header_enabled( $post_id = null ) {
	// Global Customizer toggle.
	if ( ! inspiro_get_theme_mod( 'display_page_featured_image' ) ) {
		return false;
	}

	if ( null === $post_id ) {
		$post_id = get_queried_object_id();
	}

	// Per-page override.
	if ( $post_id && get_post_meta( $post_id, 'inspiro_hide_featured_image', true ) ) {
		return false;
	}

	return true;
}

/**
 * Whether the current page uses a template that renders the Featured Image as a
 * header cover.
 *
 * Only the Default template (page.php) and the "Full-width (Page Builder)"
 * template load template-parts/page/content-page.php, which outputs the cover.
 * Other custom page templates (no-title, page-builder, transparent, homepage,
 * etc.) render the content directly and never display the cover, so they must
 * not receive the transparent "has-header-image" body class on their own.
 *
 * @since 2.2.1
 *
 * @return bool
 */
function inspiro_page_uses_featured_cover_template() {
	if ( ! is_page() || inspiro_is_frontpage() ) {
		return false;
	}

	// Default template (no custom template assigned) or the Page Builder full-width one.
	return ! is_page_template() || is_page_template( 'page-templates/full-width-builder-bb.php' );
}

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 *
 * @since 1.0.0
 *
 * @return void
 */
function inspiro_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'inspiro_pingback_header' );
