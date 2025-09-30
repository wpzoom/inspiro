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
		),
		'blue' => array(
			'label'   => esc_html__( 'Blue', 'inspiro' ),
			'colors'  => array(
				'primary'   => '#2d70b8',  // Primary blue
				'secondary' => '#4a8fd4',  // Lighter blue
				'tertiary'  => '#1e4d7a',  // Dark blue
				'accent'    => '#42a5f5',  // Bright blue accent
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