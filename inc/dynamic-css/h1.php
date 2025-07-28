<?php
/**
 * Generate inline css based on Customizer settings value for H1 headings
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

add_filter( 'inspiro/dynamic_theme_css/selectors', 'inspiro_selector_h1' );

if ( ! function_exists( 'inspiro_selector_h1' ) ) {
	/**
	 * Set HTML selector for H1 headings
	 *
	 * @param array $selectors HTML selectors.
	 * @return array The array with HTML selectors.
	 */
	function inspiro_selector_h1( $selectors ) {
		$selectors['typo-heading1'] = '.home.blog .entry-title, .single .entry-title, .single .entry-cover-image .entry-header .entry-title';
		$selectors['heading1-tablet-media'] = '@media screen and (min-width: 641px) and (max-width: 1024px)';
		$selectors['heading1-desktop-media'] = '@media screen and (min-width: 1025px)';
		return $selectors;
	}
}

add_filter( 'inspiro/dynamic_theme_css', 'inspiro_dynamic_theme_css_h1' );

/**
 * Typography -> Post Titles (H1)
 *
 * @param string $dynamic_css Dynamic CSS from Customizer.
 * @return string Generated dynamic CSS for Post titles.
 */
function inspiro_dynamic_theme_css_h1( $dynamic_css ) {
	$heading1_font_size         = inspiro_get_theme_mod( 'heading1-font-size' );
	$heading1_font_size_tablet  = inspiro_get_theme_mod( 'heading1-font-size-tablet' );
	$heading1_font_size_mobile  = inspiro_get_theme_mod( 'heading1-font-size-mobile' );
	$heading1_font_weight       = inspiro_get_theme_mod( 'heading1-font-weight' );
	$heading1_text_transform    = inspiro_get_theme_mod( 'heading1-text-transform' );
	$heading1_line_height       = inspiro_get_theme_mod( 'heading1-line-height' );

	$selectors           = apply_filters( 'inspiro/dynamic_theme_css/selectors', array() );
	$selector            = inspiro_get_prop( $selectors, 'typo-heading1' );
	$tablet_media_query  = inspiro_get_prop( $selectors, 'heading1-tablet-media' );
	$desktop_media_query = inspiro_get_prop( $selectors, 'heading1-desktop-media' );

	// Base styles (mobile-first approach)
	$dynamic_css .= "{$selector} {\n";
	if ( absint( $heading1_font_size_mobile ) >= 24 && absint( $heading1_font_size_mobile ) <= 80 ) {
		$dynamic_css .= "font-size: {$heading1_font_size_mobile}px;\n";
	}
	if ( ! empty( $heading1_font_weight ) && 'inherit' !== $heading1_font_weight ) {
		$dynamic_css .= "font-weight: {$heading1_font_weight};\n";
	}
	if ( ! empty( $heading1_text_transform ) && 'inherit' !== $heading1_text_transform ) {
		$dynamic_css .= "text-transform: {$heading1_text_transform};\n";
	}
	if ( ! empty( $heading1_line_height ) && 'inherit' !== $heading1_line_height ) {
		$dynamic_css .= "line-height: {$heading1_line_height};\n";
	}
	$dynamic_css .= "}\n";

	// Tablet styles
	if ( $tablet_media_query && absint( $heading1_font_size_tablet ) >= 24 && absint( $heading1_font_size_tablet ) <= 80 ) {
		$dynamic_css .= "{$tablet_media_query} {\n";
		$dynamic_css .= "{$selector} {\n";
		$dynamic_css .= "font-size: {$heading1_font_size_tablet}px;\n";
		$dynamic_css .= "} }\n";
	}

	// Desktop styles
	if ( $desktop_media_query && absint( $heading1_font_size ) >= 24 && absint( $heading1_font_size ) <= 80 ) {
		$dynamic_css .= "{$desktop_media_query} {\n";
		$dynamic_css .= "{$selector} {\n";
		$dynamic_css .= "font-size: {$heading1_font_size}px;\n";
		$dynamic_css .= "} }\n";
	}

	return $dynamic_css;
}