<?php
/**
 * Elementor compatibility functions.
 *
 * Registers Elementor Theme Builder locations so the site header and footer can
 * be built with Elementor Pro. When a template is assigned to a location, the
 * theme's default markup is skipped in header.php / footer.php via
 * elementor_theme_do_location(); otherwise the theme defaults are used.
 *
 * @package    Inspiro
 * @subpackage Inspiro_Lite
 * @since      Inspiro 2.1.16
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Register Elementor Theme Builder locations for the header and footer.
 *
 * The 'elementor/theme/register_locations' action only fires when Elementor Pro
 * is active, so this is a no-op on installs without it.
 *
 * @param \ElementorPro\Modules\ThemeBuilder\Classes\Locations_Manager $elementor_theme_manager Elementor locations manager.
 * @return void
 */
if ( ! function_exists( 'inspiro_register_elementor_locations' ) ) :
	function inspiro_register_elementor_locations( $elementor_theme_manager ) {
		$elementor_theme_manager->register_location( 'header' );
		$elementor_theme_manager->register_location( 'footer' );
	}
endif;
add_action( 'elementor/theme/register_locations', 'inspiro_register_elementor_locations' );
