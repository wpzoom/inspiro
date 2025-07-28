<?php
/**
 * Generate inline css based on Customizer settings value for H1 content headings
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 2.0.8
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

add_filter( 'inspiro/dynamic_theme_css/selectors', 'inspiro_selector_h1_content' );

if ( ! function_exists( 'inspiro_selector_h1_content' ) ) {
	/**
	 * Set HTML selector for H1 content headings
	 *
	 * @param array $selectors HTML selectors.
	 * @return array The array with HTML selectors.
	 */
	function inspiro_selector_h1_content( $selectors ) {
		$selectors['typo-h1-content'] = '.entry-content h1, .widget-area h1, h1:not(.entry-title):not(.page-title):not(.site-title)';
		$selectors['h1-content-tablet-media'] = '@media screen and (min-width: 641px) and (max-width: 1024px)';
		$selectors['h1-content-desktop-media'] = '@media screen and (min-width: 1025px)';
		return $selectors;
	}
}

add_filter( 'inspiro/dynamic_theme_css', 'inspiro_dynamic_theme_css_h1_content' );

/**
 * Typography -> H1 Content Headings
 *
 * @param string $dynamic_css Dynamic CSS from Customizer.
 * @return string Generated dynamic CSS for H1 content headings.
 */
function inspiro_dynamic_theme_css_h1_content( $dynamic_css ) {
	$h1_content_font_size         = inspiro_get_theme_mod( 'h1-content-font-size' );
	$h1_content_font_size_tablet  = inspiro_get_theme_mod( 'h1-content-font-size-tablet' );
	$h1_content_font_size_mobile  = inspiro_get_theme_mod( 'h1-content-font-size-mobile' );
	$h1_content_font_weight       = inspiro_get_theme_mod( 'h1-content-font-weight' );
	$h1_content_text_transform    = inspiro_get_theme_mod( 'h1-content-text-transform' );
	$h1_content_line_height       = inspiro_get_theme_mod( 'h1-content-line-height' );

	$selectors           = apply_filters( 'inspiro/dynamic_theme_css/selectors', array() );
	$selector            = inspiro_get_prop( $selectors, 'typo-h1-content' );
	$tablet_media_query  = inspiro_get_prop( $selectors, 'h1-content-tablet-media' );
	$desktop_media_query = inspiro_get_prop( $selectors, 'h1-content-desktop-media' );

	// Base styles (mobile-first approach)
	$dynamic_css .= "{$selector} {\n";
	if ( absint( $h1_content_font_size_mobile ) >= 24 && absint( $h1_content_font_size_mobile ) <= 80 ) {
		$dynamic_css .= "font-size: {$h1_content_font_size_mobile}px;\n";
	}
	if ( ! empty( $h1_content_font_weight ) && 'inherit' !== $h1_content_font_weight ) {
		$dynamic_css .= "font-weight: {$h1_content_font_weight};\n";
	}
	if ( ! empty( $h1_content_text_transform ) && 'inherit' !== $h1_content_text_transform ) {
		$dynamic_css .= "text-transform: {$h1_content_text_transform};\n";
	}
	if ( ! empty( $h1_content_line_height ) && 'inherit' !== $h1_content_line_height ) {
		$dynamic_css .= "line-height: {$h1_content_line_height};\n";
	}
	$dynamic_css .= "}\n";

	// Tablet styles
	if ( $tablet_media_query && absint( $h1_content_font_size_tablet ) >= 24 && absint( $h1_content_font_size_tablet ) <= 80 ) {
		$dynamic_css .= "{$tablet_media_query} {\n";
		$dynamic_css .= "{$selector} {\n";
		$dynamic_css .= "font-size: {$h1_content_font_size_tablet}px;\n";
		$dynamic_css .= "} }\n";
	}

	// Desktop styles
	if ( $desktop_media_query && absint( $h1_content_font_size ) >= 24 && absint( $h1_content_font_size ) <= 80 ) {
		$dynamic_css .= "{$desktop_media_query} {\n";
		$dynamic_css .= "{$selector} {\n";
		$dynamic_css .= "font-size: {$h1_content_font_size}px;\n";
		$dynamic_css .= "} }\n";
	}

	return $dynamic_css;
} 