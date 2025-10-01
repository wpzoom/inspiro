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
				'color_sidebar_widgets_background'=> '#101010',
                'color_header_menu_color'         => '#ffffff',
                'color_header_menu_color_hover'   => '#ffffff',
                'color_header_custom_logo_hover_text'   => '',
                'color_header_custom_logo_text'   => '#ffffff',
                'color_menu_search_icon_btn'      => '#ffffff',
                'color_menu_hamburger_btn'        => '#ffffff',
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
                'color_header_menu_color'         => '#ffffff',
                'color_header_menu_color_hover'   => '#ffffff',
                'color_header_custom_logo_text'   => '#ffffff',
                'color_header_custom_logo_hover_text'   => '',
                'color_menu_search_icon_btn'      => '#ffffff',
                'color_menu_hamburger_btn'        => '#ffffff',
				'color-menu-background-scroll'    => 'rgba(30,77,122,0.95)',
				'color_footer_background'         => '#1a2332',
			),
		),
		'brown' => array(
			'label'   => esc_html__( 'Brown', 'inspiro' ),
			'colors'  => array(
				'primary'   => '#8b5a3c',  // Primary brown
				'secondary' => '#a67c52',  // Lighter brown
				'tertiary'  => '#5d3a22',  // Dark brown
				'accent'    => '#c89b6e',  // Warm brown accent
			),
			'theme_colors' => array(
				'colorscheme_hex'                 => '#8b5a3c',
				'color_sidebar_widgets_link'      => '#c89b6e',
				'color_sidebar_widgets_background'=> '#2a1f1a',
				'color_menu_background'           => '#5d3a22',
                'color_header_menu_color'         => '#ffffff',
                'color_header_menu_color_hover'   => '#ffffff',
                'color_header_custom_logo_text'   => '#ffffff',
                'color_header_custom_logo_hover_text'   => '',
                'color_menu_search_icon_btn'      => '#ffffff',
                'color_menu_hamburger_btn'        => '#ffffff',
				'color-menu-background-scroll'    => 'rgba(93,58,34,0.95)',
				'color_footer_background'         => '#2a1f1a',
			),
		),
		'red' => array(
			'label'   => esc_html__( 'Red', 'inspiro' ),
			'colors'  => array(
				'primary'   => '#c62828',  // Primary red
				'secondary' => '#e53935',  // Lighter red
				'tertiary'  => '#8e0000',  // Dark red
				'accent'    => '#ff5252',  // Bright red accent
			),
			'theme_colors' => array(
				'colorscheme_hex'                 => '#c62828',
				'color_sidebar_widgets_link'      => '#ff5252',
				'color_sidebar_widgets_background'=> '#2b1616',
				'color_header_menu_color'         => '#ffffff',
                'color_header_menu_color_hover'   => '#ffffff',
                'color_header_custom_logo_text'   => '#ffffff',
                'color_header_custom_logo_hover_text'   => '',
                'color_menu_search_icon_btn'      => '#ffffff',
                'color_menu_hamburger_btn'        => '#ffffff',
				'color-menu-background-scroll'    => 'rgba(142,0,0,0.95)',
				'color_footer_background'         => '#2b1616',
			),
		),
		'orange' => array(
			'label'   => esc_html__( 'Orange', 'inspiro' ),
			'colors'  => array(
				'primary'   => '#e65100',  // Primary orange
				'secondary' => '#ff6f00',  // Lighter orange
				'tertiary'  => '#bf360c',  // Dark orange
				'accent'    => '#ff9800',  // Bright orange accent
			),
			'theme_colors' => array(
				'colorscheme_hex'                 => '#e65100',
				'color_sidebar_widgets_link'      => '#ff9800',
				'color_sidebar_widgets_background'=> '#2d1a0f',
				'color_header_menu_color'         => '#ffffff',
                'color_header_menu_color_hover'   => '#ffffff',
                'color_header_custom_logo_text'   => '#ffffff',
                'color_header_custom_logo_hover_text'   => '',
                'color_menu_search_icon_btn'      => '#ffffff',
                'color_menu_hamburger_btn'        => '#ffffff',
				'color-menu-background-scroll'    => 'rgba(191,54,12,0.95)',
				'color_footer_background'         => '#2d1a0f',
			),
		),
		'dark-green' => array(
			'label'   => esc_html__( 'Dark Green', 'inspiro' ),
			'colors'  => array(
				'primary'   => '#2e7d32',  // Primary green
				'secondary' => '#43a047',  // Lighter green
				'tertiary'  => '#1b5e20',  // Dark green
				'accent'    => '#66bb6a',  // Bright green accent
			),
			'theme_colors' => array(
				'colorscheme_hex'                 => '#2e7d32',
				'color_sidebar_widgets_link'      => '#66bb6a',
				'color_sidebar_widgets_background'=> '#1a2820',
				'color_menu_background'           => '#1b5e20',
                'color_header_menu_color'         => '#ffffff',
                'color_header_menu_color_hover'   => '#ffffff',
                'color_header_custom_logo_text'   => '#ffffff',
                'color_header_custom_logo_hover_text'   => '',
                'color_menu_search_icon_btn'      => '#ffffff',
                'color_menu_hamburger_btn'        => '#ffffff',
				'color-menu-background-scroll'    => 'rgba(27,94,32,0.95)',
				'color_footer_background'         => '#1a2820',
			),
		),
		'purple' => array(
			'label'   => esc_html__( 'Purple', 'inspiro' ),
			'colors'  => array(
				'primary'   => '#6a1b9a',  // Primary purple
				'secondary' => '#8e24aa',  // Lighter purple
				'tertiary'  => '#4a148c',  // Dark purple
				'accent'    => '#ab47bc',  // Bright purple accent
			),
			'theme_colors' => array(
				'colorscheme_hex'                 => '#6a1b9a',
				'color_sidebar_widgets_link'      => '#ab47bc',
				'color_sidebar_widgets_background'=> '#221a28',
				'color_menu_background'           => '#4a148c',
                'color_header_menu_color'         => '#ffffff',
                'color_header_menu_color_hover'   => '#ffffff',
                'color_header_custom_logo_text'   => '#ffffff',
                'color_header_custom_logo_hover_text'   => '',
                'color_menu_search_icon_btn'      => '#ffffff',
                'color_menu_hamburger_btn'        => '#ffffff',
				'color-menu-background-scroll'    => 'rgba(74,20,140,0.95)',
				'color_footer_background'         => '#221a28',
			),
		),
		'coral' => array(
			'label'   => esc_html__( 'Coral', 'inspiro' ),
			'colors'  => array(
				'primary'   => '#ff6f61',  // Primary coral
				'secondary' => '#ff8a80',  // Lighter coral
				'tertiary'  => '#d84a3d',  // Dark coral
				'accent'    => '#ffa599',  // Bright coral accent
			),
			'theme_colors' => array(
				'colorscheme_hex'                 => '#ff6f61',
				'color_sidebar_widgets_link'      => '#ffa599',
				'color_sidebar_widgets_background'=> '#2d1d1b',
				'color_menu_background'           => '#d84a3d',
                'color_header_menu_color'         => '#ffffff',
                'color_header_menu_color_hover'   => '#ffffff',
                'color_header_custom_logo_text'   => '#ffffff',
                'color_header_custom_logo_hover_text'   => '',
                'color_menu_search_icon_btn'      => '#ffffff',
                'color_menu_hamburger_btn'        => '#ffffff',
				'color-menu-background-scroll'    => 'rgba(216,74,61,0.95)',
				'color_footer_background'         => '#2d1d1b',
			),
		),
		'grey-blue' => array(
			'label'   => esc_html__( 'Grey Blue', 'inspiro' ),
			'colors'  => array(
				'primary'   => '#546e7a',  // Primary grey-blue
				'secondary' => '#78909c',  // Lighter grey-blue
				'tertiary'  => '#37474f',  // Dark grey-blue
				'accent'    => '#90a4ae',  // Bright grey-blue accent
			),
			'theme_colors' => array(
				'colorscheme_hex'                 => '#546e7a',
				'color_sidebar_widgets_link'      => '#90a4ae',
				'color_sidebar_widgets_background'=> '#1f2a2e',
				'color_menu_background'           => '#37474f',
                'color_header_menu_color'         => '#ffffff',
                'color_header_menu_color_hover'   => '#ffffff',
                'color_header_custom_logo_text'   => '#ffffff',
                'color_header_custom_logo_hover_text'   => '',
                'color_menu_search_icon_btn'      => '#ffffff',
                'color_menu_hamburger_btn'        => '#ffffff',
				'color-menu-background-scroll'    => 'rgba(55,71,79,0.95)',
				'color_footer_background'         => '#1f2a2e',
			),
		),
		'beige-cream' => array(
			'label'   => esc_html__( 'Beige Cream', 'inspiro' ),
			'colors'  => array(
				'primary'   => '#d4a574',  // Primary beige
				'secondary' => '#e8c9a1',  // Lighter cream
				'tertiary'  => '#b08968',  // Dark beige
				'accent'    => '#f0dcc4',  // Bright cream accent
			),
			'theme_colors' => array(
				'colorscheme_hex'                 => '#d4a574',
				'color_sidebar_widgets_link'      => '#b08968',
				'color_sidebar_widgets_background'=> '#2a2520',
				'color_menu_background'           => '#b08968',
                'color_header_menu_color'         => '#ffffff',
                'color_header_menu_color_hover'   => '#ffffff',
                'color_header_custom_logo_text'   => '#ffffff',
                'color_header_custom_logo_hover_text'   => '',
                'color_menu_search_icon_btn'      => '#ffffff',
                'color_menu_hamburger_btn'        => '#ffffff',
				'color-menu-background-scroll'    => 'rgba(176,137,104,0.95)',
				'color_footer_background'         => '#2a2520',
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