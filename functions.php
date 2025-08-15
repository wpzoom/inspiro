<?php
/**
 * Inspiro functions and definitions
 *
 * @link    https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Inspiro
 * @since   Inspiro 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Define Constants
 */
define( 'INSPIRO_THEME_VERSION', '2.1.3' );
define( 'INSPIRO_THEME_DIR', trailingslashit( get_template_directory() ) );
define( 'INSPIRO_THEME_URI', trailingslashit( esc_url( get_template_directory_uri() ) ) );
define( 'INSPIRO_THEME_ASSETS_URI', INSPIRO_THEME_URI . 'dist' );
// Marketing
define( 'INSPIRO_MARKETING_UTM_CODE_STARTER_SITE', '?utm_source=wpadmin&utm_medium=starter-sites&utm_campaign=upgrade-premium' );
define( 'INSPIRO_MARKETING_UTM_CODE_FOOTER_MENU', '?utm_source=wpadmin&utm_medium=footer-menu&utm_campaign=upgrade-premium' );

// This theme requires WordPress 5.3 or later.
if ( version_compare( $GLOBALS['wp_version'], '5.3', '<' ) ) {
	require INSPIRO_THEME_DIR . 'inc/back-compat.php';
}

/**
 * Recommended Plugins
 */
require INSPIRO_THEME_DIR . 'inc/classes/class-tgm-plugin-activation.php';

/**
 * Setup helper functions.
 */
require INSPIRO_THEME_DIR . 'inc/common-functions.php';

/**
 * Setup theme media.
 */
require INSPIRO_THEME_DIR . 'inc/theme-media.php';

/**
 * Enqueues scripts and styles
 */
require INSPIRO_THEME_DIR . 'inc/classes/class-inspiro-enqueue-scripts.php';

/**
 * Starter Content Notice
 */
require INSPIRO_THEME_DIR . 'inc/classes/class-inspiro-starter-content-notice.php';

/**
 * Setup custom wp-admin options pages
 */
require INSPIRO_THEME_DIR . 'inc/classes/class-inspiro-custom-wp-admin-menu.php';

/**
 * Additional features to include custom WP pointer function
 */
require INSPIRO_THEME_DIR . 'inc/classes/class-inspiro-wp-admin-menu-pointer.php';

/**
 * Functions and definitions.
 */
require INSPIRO_THEME_DIR . 'inc/classes/class-inspiro-after-setup-theme.php';

/**
 * Handle SVG icons.
 */
require INSPIRO_THEME_DIR . 'inc/classes/class-inspiro-svg-icons.php';

/**
 * Implement the Custom Header feature.
 */
require INSPIRO_THEME_DIR . 'inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require INSPIRO_THEME_DIR . 'inc/template-tags.php';

/**
 * Additional features to allow styling of the templates.
 */
require INSPIRO_THEME_DIR . 'inc/template-functions.php';

/**
 * Custom Template WC functions
 */
require INSPIRO_THEME_DIR . 'inc/wc-custom-functions.php';

/**
 * Editor Fonts
 */
require INSPIRO_THEME_DIR . 'inc/editor-fonts.php';


/**
 * Custom template shortcode tags for this theme
 */
// require INSPIRO_THEME_DIR . 'inc/shortcodes.php';

/**
 * Customizer additions.
 */
require INSPIRO_THEME_DIR . 'inc/classes/class-inspiro-font-family-manager.php';
require INSPIRO_THEME_DIR . 'inc/classes/class-inspiro-fonts-manager.php';

// Include Customizer Guided Tour
if ( is_admin() ) { // && is_customize_preview(), AJAX don't work with is_customize_preview() included
	require INSPIRO_THEME_DIR . 'inc/classes/inspiro-customizer-guided-tour.php';
}
require INSPIRO_THEME_DIR . 'inc/customizer-functions.php';
require INSPIRO_THEME_DIR . 'inc/customizer/class-inspiro-customizer-control-base.php';
require INSPIRO_THEME_DIR . 'inc/customizer/class-inspiro-customizer.php';

/**
 * SVG icons functions and filters.
 */
require INSPIRO_THEME_DIR . 'inc/icon-functions.php';

/**
 * Theme admin notices and info page
 */
if ( is_admin() ) {
	require INSPIRO_THEME_DIR . 'inc/admin-notice.php';
	require INSPIRO_THEME_DIR . 'inc/admin/admin-api.php';

	// temporary marketing black friday functionality
	require INSPIRO_THEME_DIR . 'inc/marketing-functions.php';

	if ( current_user_can( 'manage_options' ) ) {
		require INSPIRO_THEME_DIR . 'inc/classes/class-inspiro-notices.php';
		require INSPIRO_THEME_DIR . 'inc/classes/class-inspiro-notice-review.php';
		require INSPIRO_THEME_DIR . 'inc/classes/class-inspiro-theme-deactivation.php';
	}
}

/**
 * Theme Upgrader
 */
require INSPIRO_THEME_DIR . 'inc/classes/class-inspiro-theme-upgrader.php';

/**
 * Inline theme css generated dynamically
 */
require INSPIRO_THEME_DIR . 'inc/dynamic-css/body.php';
require INSPIRO_THEME_DIR . 'inc/dynamic-css/logo.php';
require INSPIRO_THEME_DIR . 'inc/dynamic-css/headings.php';
require INSPIRO_THEME_DIR . 'inc/dynamic-css/h1.php';
require INSPIRO_THEME_DIR . 'inc/dynamic-css/page-title.php';
require INSPIRO_THEME_DIR . 'inc/dynamic-css/h1-content.php';
require INSPIRO_THEME_DIR . 'inc/dynamic-css/content-headings.php';
require INSPIRO_THEME_DIR . 'inc/dynamic-css/hero-header-title.php';
require INSPIRO_THEME_DIR . 'inc/dynamic-css/hero-header-desc.php';
require INSPIRO_THEME_DIR . 'inc/dynamic-css/hero-header-button.php';
require INSPIRO_THEME_DIR . 'inc/dynamic-css/main-menu.php';
require INSPIRO_THEME_DIR . 'inc/dynamic-css/mobile-menu.php';

/**
 * Container Width Functions
 */

/**
 * Filter theme.json to make contentSize dynamic based on customizer container width
 */
if ( ! function_exists( 'inspiro_filter_theme_json_data' ) ) :
	function inspiro_filter_theme_json_data( $theme_json_data ) {
		$container_width = get_theme_mod( 'container_width', 1200 );
		$container_width_narrow = get_theme_mod( 'container_width_narrow', 950 );
		
		// Get the data array from the WP_Theme_JSON_Data object
		$theme_json = $theme_json_data->get_data();
		
		// Determine which width to use based on context
		// Pages use default container width, single posts use narrow width
		$content_size = $container_width; // Default to full width for pages
		if ( is_single() || is_home() || is_archive() || is_category() || is_tag() || is_author() || is_date() ) {
			$content_size = $container_width_narrow; // Use narrow width for blog contexts
		}
		
		// Update the contentSize in theme.json
		if ( isset( $theme_json['settings']['layout']['contentSize'] ) ) {
			$theme_json['settings']['layout']['contentSize'] = $content_size . 'px';
		}
		
		// Set wideSize to be content width + 250px to match CSS .alignwide styles
		if ( isset( $theme_json['settings']['layout']['wideSize'] ) ) {
			$wide_size = $content_size + 250;
			$theme_json['settings']['layout']['wideSize'] = $wide_size . 'px';
		}
		
		// Update the data in the object and return it
		$theme_json_data->update_with( $theme_json );
		return $theme_json_data;
	}
endif;
add_filter( 'wp_theme_json_data_user', 'inspiro_filter_theme_json_data' );

/**
 * Also apply the container width to block editor
 */
if ( ! function_exists( 'inspiro_filter_theme_json_theme' ) ) :
	function inspiro_filter_theme_json_theme( $theme_json_data ) {
		return inspiro_filter_theme_json_data( $theme_json_data );
	}
endif;
add_filter( 'wp_theme_json_data_theme', 'inspiro_filter_theme_json_theme' );

/**
 * Update editor styles to reflect container width changes
 */
if ( ! function_exists( 'inspiro_add_editor_container_width_styles' ) ) :
	function inspiro_add_editor_container_width_styles() {
		$container_width = get_theme_mod( 'container_width', 1200 );
		$container_width_narrow = get_theme_mod( 'container_width_narrow', 950 );
		
		// Determine which width to use based on context
		// Pages use default container width, single posts use narrow width
		$content_size = $container_width; // Default to full width for pages
		if ( is_single() || is_home() || is_archive() || is_category() || is_tag() || is_author() || is_date() ) {
			$content_size = $container_width_narrow; // Use narrow width for blog contexts
		}
		
		$wide_size = $content_size + 250;
		
		$editor_styles = "
		.editor-styles-wrapper .wp-block {
			max-width: {$content_size}px;
		}
		.editor-styles-wrapper .wp-block[data-align='wide'] {
			max-width: {$wide_size}px;
		}
		";
		
		wp_add_inline_style( 'wp-edit-blocks', $editor_styles );
	}
endif;
add_action( 'enqueue_block_editor_assets', 'inspiro_add_editor_container_width_styles' );

/**
 * Add dynamic CSS variables for container widths
 */
if ( ! function_exists( 'inspiro_add_container_width_css_variables' ) ) :
	function inspiro_add_container_width_css_variables() {
		$container_width = get_theme_mod( 'container_width', 1200 );
		$container_width_narrow = get_theme_mod( 'container_width_narrow', 950 );
		$container_width_elementor = get_theme_mod( 'container_width_elementor', false );
		
		// Calculate responsive padding breakpoints
		$container_padding = 30; // 30px padding
		$container_width_breakpoint = $container_width + 60; // container width + 60px buffer
		$container_width_narrow_breakpoint = $container_width_narrow + 60; // narrow container width + 60px buffer
		
		$css = "
		:root {
			--container-width: {$container_width}px;
			--container-width-narrow: {$container_width_narrow}px;
			--container-padding: {$container_padding}px;
		}
		
		/* Dynamic responsive padding media queries */
		@media (max-width: {$container_width_breakpoint}px) {
			.wrap,
			.inner-wrap,
			.page .entry-content,
			.page:not(.inspiro-front-page) .entry-footer,
			.single .entry-wrapper,
			.single.has-sidebar.page-layout-sidebar-right .entry-header .inner-wrap,
			.wp-block-group > .wp-block-group__inner-container {
				padding-left: {$container_padding}px;
				padding-right: {$container_padding}px;
			}
		}
		
		@media (max-width: {$container_width_narrow_breakpoint}px) {
			.single .entry-header .inner-wrap,
			.single .entry-content,
			.single .entry-footer,
			#comments {
				padding-left: {$container_padding}px;
				padding-right: {$container_padding}px;
			}
		}
		";
		
		// Add Elementor container width override if enabled
		if ( $container_width_elementor ) {
			$css .= "
			.elementor-container {
				max-width: {$container_width}px !important;
			}
			";
		}
		
		wp_add_inline_style( 'inspiro-style', $css );
	}
endif;
add_action( 'wp_enqueue_scripts', 'inspiro_add_container_width_css_variables' );