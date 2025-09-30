<?php
/**
 * Inspiro Lite: Global Color Palettes
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 2.2.0
 */

/**
 * Get available color palettes
 *
 * @return array Array of color palettes with their color definitions
 */
function inspiro_get_color_palettes() {
	$palettes = array(
		'default' => array(
			'label'   => esc_html__( 'Default (Teal)', 'inspiro' ),
			'colors'  => array(
				'primary'   => '#0bb4aa',  // Main teal color
				'secondary' => '#5ec5bd',  // Lighter teal
				'tertiary'  => '#37746F',  // Dark teal
				'accent'    => '#0bb4aa',  // Accent color (same as primary for default)
			),
			'theme_colors' => array(
				'colorscheme_hex'                 => '#0bb4aa',
				'color_sidebar_widgets_link'      => '#0bb4aa',
				'color_sidebar_widgets_background'=> '#37746F',
				'color_menu_background'           => '#101010',
				'color-menu-background-scroll'    => 'rgba(16,16,16,0.9)',
				'color_footer_background'         => '#101010',
			),
		),
		'blue' => array(
			'label'   => esc_html__( 'Blue', 'inspiro' ),
			'colors'  => array(
				'primary'   => '#2d70b8',  // Primary blue
				'secondary' => '#4a8fd4',  // Lighter blue
				'tertiary'  => '#1e4d7a',  // Dark blue
				'accent'    => '#42a5f5',  // Bright blue accent
			),
			'theme_colors' => array(
				'colorscheme_hex'                 => '#2d70b8',
				'color_sidebar_widgets_link'      => '#42a5f5',
				'color_sidebar_widgets_background'=> '#1a2332',
				'color_menu_background'           => '#1e4d7a',
				'color-menu-background-scroll'    => 'rgba(30,77,122,0.95)',
				'color_footer_background'         => '#1a2332',
			),
		),
	);

	/**
	 * Filters the available color palettes
	 *
	 * @since Inspiro 2.2.0
	 *
	 * @param array $palettes Array of color palettes
	 */
	return apply_filters( 'inspiro_color_palettes', $palettes );
}

/**
 * Get a specific color from the current palette
 *
 * @param string $color_key The color key (primary, secondary, tertiary, accent)
 * @return string Hex color code
 */
function inspiro_get_palette_color( $color_key = 'primary' ) {
	$palette_id = get_theme_mod( 'color_palette', 'default' );
	$palettes   = inspiro_get_color_palettes();

	// Fallback to default if palette doesn't exist
	if ( ! isset( $palettes[ $palette_id ] ) ) {
		$palette_id = 'default';
	}

	// Get the color from the palette
	if ( isset( $palettes[ $palette_id ]['colors'][ $color_key ] ) ) {
		return $palettes[ $palette_id ]['colors'][ $color_key ];
	}

	// Fallback to primary color
	return $palettes['default']['colors']['primary'];
}

/**
 * Generate the CSS for the current color palette
 */
function inspiro_palette_colors_css() {
	// Check if we're using the custom color scheme
	$colorscheme = inspiro_get_theme_mod( 'colorscheme' );

	// If custom, use the existing custom hex color
	if ( 'custom' === $colorscheme ) {
		$hex = inspiro_get_theme_mod( 'colorscheme_hex' );
		$css = '
/**
 * Inspiro Lite: Custom Color Scheme
 */

:root {
    --inspiro-primary-color: ' . $hex . ';
    --inspiro-secondary-color: ' . $hex . ';
    --inspiro-tertiary-color: ' . $hex . ';
    --inspiro-accent-color: ' . $hex . ';
}

body {
    --wp--preset--color--secondary: ' . $hex . ';
}
';
	} else {
		// Use palette colors
		$primary   = inspiro_get_palette_color( 'primary' );
		$secondary = inspiro_get_palette_color( 'secondary' );
		$tertiary  = inspiro_get_palette_color( 'tertiary' );
		$accent    = inspiro_get_palette_color( 'accent' );

		$css = '
/**
 * Inspiro Lite: Palette Color Scheme
 */

:root {
    --inspiro-primary-color: ' . $primary . ';
    --inspiro-secondary-color: ' . $secondary . ';
    --inspiro-tertiary-color: ' . $tertiary . ';
    --inspiro-accent-color: ' . $accent . ';
}

body {
    --wp--preset--color--secondary: ' . $primary . ';
}
';
	}

	/**
	 * Filters Inspiro Lite palette colors CSS
	 *
	 * @since Inspiro 2.2.0
	 *
	 * @param string $css Base theme colors CSS
	 */
	return apply_filters( 'inspiro_palette_colors_css', $css );
}

/**
 * Filter theme.json to dynamically update the Secondary color based on customizer settings
 *
 * @since Inspiro 2.2.0
 * @param WP_Theme_JSON_Data $theme_json Theme JSON data object
 * @return WP_Theme_JSON_Data Modified theme JSON data
 */
function inspiro_filter_theme_json_secondary_color( $theme_json ) {
	$data = $theme_json->get_data();

	// Get the accent color from Customizer
	$accent_color = get_theme_mod( 'colorscheme_hex', '#0bb4aa' );

	// Validate it's a hex color
	if ( empty( $accent_color ) || ! preg_match( '/^#([0-9a-f]{3}){1,2}$/i', $accent_color ) ) {
		$accent_color = '#0bb4aa'; // Default teal color
	}

	// Replace the entire palette with accent color in Secondary position
	$custom_palette = array(
		array( 'color' => '#101010', 'name' => 'Primary', 'slug' => 'primary' ),
		array( 'color' => $accent_color, 'name' => 'Secondary', 'slug' => 'secondary' ),
		array( 'color' => '#101010', 'name' => 'Header & Footer', 'slug' => 'header-footer' ),
		array( 'color' => '#6C6C77', 'name' => 'Tertiary', 'slug' => 'tertiary' ),
		array( 'color' => '#D9D9D9', 'name' => 'LightGrey', 'slug' => 'lightgrey' ),
		array( 'color' => '#000', 'name' => 'Foreground', 'slug' => 'foreground' ),
		array( 'color' => '#f9fafd', 'name' => 'Background', 'slug' => 'background' ),
		array( 'color' => '#ffffff', 'name' => 'White', 'slug' => 'white' ),
		array( 'color' => '#ffffff', 'name' => 'Light Background', 'slug' => 'light-background' ),
	);

	$data['settings']['color']['palette'] = $custom_palette;

	return new WP_Theme_JSON_Data( $data, 'theme' );
}
add_filter( 'wp_theme_json_data_theme', 'inspiro_filter_theme_json_secondary_color' );

/**
 * Clear theme.json cache when customizer settings change
 *
 * @since Inspiro 2.2.0
 */
function inspiro_clear_theme_json_cache() {
	if ( function_exists( 'wp_clean_theme_json_cache' ) ) {
		wp_clean_theme_json_cache();
	}
}
add_action( 'customize_save_after', 'inspiro_clear_theme_json_cache' );