<?php
/**
 * Generate inline css based on Customizer settings value for H2-H6 content headings
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

add_filter( 'inspiro/dynamic_theme_css/selectors', 'inspiro_selector_content_headings' );

if ( ! function_exists( 'inspiro_selector_content_headings' ) ) {
	/**
	 * Set HTML selector for content headings
	 *
	 * @param array $selectors HTML selectors.
	 * @return array The array with HTML selectors.
	 */
	function inspiro_selector_content_headings( $selectors ) {
		$selectors['typo-heading2'] = '.entry-content h2, .page-content h2, .comment-content h2';
		$selectors['typo-heading3'] = '.entry-content h3, .page-content h3, .comment-content h3';
		$selectors['typo-heading4'] = '.entry-content h4, .page-content h4, .comment-content h4';
		$selectors['typo-heading5'] = '.entry-content h5, .page-content h5, .comment-content h5';
		$selectors['typo-heading6'] = '.entry-content h6, .page-content h6, .comment-content h6';
		return $selectors;
	}
}

add_filter( 'inspiro/dynamic_theme_css', 'inspiro_dynamic_theme_css_content_headings' );

/**
 * Typography -> Content Headings (H2-H6)
 *
 * @param string $dynamic_css Dynamic CSS from Customizer.
 * @return string Generated dynamic CSS for content headings.
 */
function inspiro_dynamic_theme_css_content_headings( $dynamic_css ) {
	$selectors = apply_filters( 'inspiro/dynamic_theme_css/selectors', array() );
	
	// H2 Styling
	$heading2_font_size      = inspiro_get_theme_mod( 'heading2-font-size' );
	$heading2_font_weight    = inspiro_get_theme_mod( 'heading2-font-weight' );
	$heading2_text_transform = inspiro_get_theme_mod( 'heading2-text-transform' );
	$heading2_line_height    = inspiro_get_theme_mod( 'heading2-line-height' );
	$selector2               = inspiro_get_prop( $selectors, 'typo-heading2' );

	if ( $selector2 ) {
		$dynamic_css .= "{$selector2} {\n";
		if ( absint( $heading2_font_size ) >= 14 && absint( $heading2_font_size ) <= 60 ) {
			$dynamic_css .= "font-size: {$heading2_font_size}px;\n";
		}
		if ( ! empty( $heading2_font_weight ) && 'inherit' !== $heading2_font_weight ) {
			$dynamic_css .= "font-weight: {$heading2_font_weight};\n";
		}
		if ( ! empty( $heading2_text_transform ) && 'inherit' !== $heading2_text_transform ) {
			$dynamic_css .= "text-transform: {$heading2_text_transform};\n";
		}
		if ( ! empty( $heading2_line_height ) && 'inherit' !== $heading2_line_height ) {
			$dynamic_css .= "line-height: {$heading2_line_height};\n";
		}
		$dynamic_css .= "}\n";
	}

	// H3 Styling
	$heading3_font_size      = inspiro_get_theme_mod( 'heading3-font-size' );
	$heading3_font_weight    = inspiro_get_theme_mod( 'heading3-font-weight' );
	$heading3_text_transform = inspiro_get_theme_mod( 'heading3-text-transform' );
	$heading3_line_height    = inspiro_get_theme_mod( 'heading3-line-height' );
	$selector3               = inspiro_get_prop( $selectors, 'typo-heading3' );

	if ( $selector3 ) {
		$dynamic_css .= "{$selector3} {\n";
		if ( absint( $heading3_font_size ) >= 14 && absint( $heading3_font_size ) <= 50 ) {
			$dynamic_css .= "font-size: {$heading3_font_size}px;\n";
		}
		if ( ! empty( $heading3_font_weight ) && 'inherit' !== $heading3_font_weight ) {
			$dynamic_css .= "font-weight: {$heading3_font_weight};\n";
		}
		if ( ! empty( $heading3_text_transform ) && 'inherit' !== $heading3_text_transform ) {
			$dynamic_css .= "text-transform: {$heading3_text_transform};\n";
		}
		if ( ! empty( $heading3_line_height ) && 'inherit' !== $heading3_line_height ) {
			$dynamic_css .= "line-height: {$heading3_line_height};\n";
		}
		$dynamic_css .= "}\n";
	}

	// H4 Styling
	$heading4_font_size      = inspiro_get_theme_mod( 'heading4-font-size' );
	$heading4_font_weight    = inspiro_get_theme_mod( 'heading4-font-weight' );
	$heading4_text_transform = inspiro_get_theme_mod( 'heading4-text-transform' );
	$heading4_line_height    = inspiro_get_theme_mod( 'heading4-line-height' );
	$selector4               = inspiro_get_prop( $selectors, 'typo-heading4' );

	if ( $selector4 ) {
		$dynamic_css .= "{$selector4} {\n";
		if ( absint( $heading4_font_size ) >= 12 && absint( $heading4_font_size ) <= 30 ) {
			$dynamic_css .= "font-size: {$heading4_font_size}px;\n";
		}
		if ( ! empty( $heading4_font_weight ) && 'inherit' !== $heading4_font_weight ) {
			$dynamic_css .= "font-weight: {$heading4_font_weight};\n";
		}
		if ( ! empty( $heading4_text_transform ) && 'inherit' !== $heading4_text_transform ) {
			$dynamic_css .= "text-transform: {$heading4_text_transform};\n";
		}
		if ( ! empty( $heading4_line_height ) && 'inherit' !== $heading4_line_height ) {
			$dynamic_css .= "line-height: {$heading4_line_height};\n";
		}
		$dynamic_css .= "}\n";
	}

	// H5 Styling
	$heading5_font_size      = inspiro_get_theme_mod( 'heading5-font-size' );
	$heading5_font_weight    = inspiro_get_theme_mod( 'heading5-font-weight' );
	$heading5_text_transform = inspiro_get_theme_mod( 'heading5-text-transform' );
	$heading5_line_height    = inspiro_get_theme_mod( 'heading5-line-height' );
	$selector5               = inspiro_get_prop( $selectors, 'typo-heading5' );

	if ( $selector5 ) {
		$dynamic_css .= "{$selector5} {\n";
		if ( absint( $heading5_font_size ) >= 10 && absint( $heading5_font_size ) <= 24 ) {
			$dynamic_css .= "font-size: {$heading5_font_size}px;\n";
		}
		if ( ! empty( $heading5_font_weight ) && 'inherit' !== $heading5_font_weight ) {
			$dynamic_css .= "font-weight: {$heading5_font_weight};\n";
		}
		if ( ! empty( $heading5_text_transform ) && 'inherit' !== $heading5_text_transform ) {
			$dynamic_css .= "text-transform: {$heading5_text_transform};\n";
		}
		if ( ! empty( $heading5_line_height ) && 'inherit' !== $heading5_line_height ) {
			$dynamic_css .= "line-height: {$heading5_line_height};\n";
		}
		$dynamic_css .= "}\n";
	}

	// H6 Styling
	$heading6_font_size      = inspiro_get_theme_mod( 'heading6-font-size' );
	$heading6_font_weight    = inspiro_get_theme_mod( 'heading6-font-weight' );
	$heading6_text_transform = inspiro_get_theme_mod( 'heading6-text-transform' );
	$heading6_line_height    = inspiro_get_theme_mod( 'heading6-line-height' );
	$selector6               = inspiro_get_prop( $selectors, 'typo-heading6' );

	if ( $selector6 ) {
		$dynamic_css .= "{$selector6} {\n";
		if ( absint( $heading6_font_size ) >= 10 && absint( $heading6_font_size ) <= 20 ) {
			$dynamic_css .= "font-size: {$heading6_font_size}px;\n";
		}
		if ( ! empty( $heading6_font_weight ) && 'inherit' !== $heading6_font_weight ) {
			$dynamic_css .= "font-weight: {$heading6_font_weight};\n";
		}
		if ( ! empty( $heading6_text_transform ) && 'inherit' !== $heading6_text_transform ) {
			$dynamic_css .= "text-transform: {$heading6_text_transform};\n";
		}
		if ( ! empty( $heading6_line_height ) && 'inherit' !== $heading6_line_height ) {
			$dynamic_css .= "line-height: {$heading6_line_height};\n";
		}
		$dynamic_css .= "}\n";
	}

	return $dynamic_css;
}