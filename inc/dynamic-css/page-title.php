<?php
/**
 * Generate inline css based on Customizer settings value for Page titles
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 2.0.8
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

add_filter( 'inspiro/dynamic_theme_css/selectors', 'inspiro_selector_page_title' );

if ( ! function_exists( 'inspiro_selector_page_title' ) ) {
	/**
	 * Set HTML selector for Page titles
	 *
	 * @param array $selectors HTML selectors.
	 * @return array The array with HTML selectors.
	 */
	function inspiro_selector_page_title( $selectors ) {
		$selectors['typo-page-title'] = '.page .entry-title, .page-title, .page .entry-cover-image .entry-header .entry-title';
		$selectors['page-title-tablet-media'] = '@media screen and (min-width: 641px) and (max-width: 1024px)';
		$selectors['page-title-desktop-media'] = '@media screen and (min-width: 1025px)';
		return $selectors;
	}
}

add_filter( 'inspiro/dynamic_theme_css', 'inspiro_dynamic_theme_css_page_title' );

/**
 * Typography -> Page Titles
 *
 * @param string $dynamic_css Dynamic CSS from Customizer.
 * @return string Generated dynamic CSS for Page titles.
 */
function inspiro_dynamic_theme_css_page_title( $dynamic_css ) {
	$page_title_font_size         = inspiro_get_theme_mod( 'page-title-font-size' );
	$page_title_font_size_tablet  = inspiro_get_theme_mod( 'page-title-font-size-tablet' );
	$page_title_font_size_mobile  = inspiro_get_theme_mod( 'page-title-font-size-mobile' );
	$page_title_font_weight       = inspiro_get_theme_mod( 'page-title-font-weight' );
	$page_title_text_transform    = inspiro_get_theme_mod( 'page-title-text-transform' );
	$page_title_line_height       = inspiro_get_theme_mod( 'page-title-line-height' );
	$page_title_text_align        = inspiro_get_theme_mod( 'page-title-text-align' );

	$selectors           = apply_filters( 'inspiro/dynamic_theme_css/selectors', array() );
	$selector            = inspiro_get_prop( $selectors, 'typo-page-title' );
	$tablet_media_query  = inspiro_get_prop( $selectors, 'page-title-tablet-media' );
	$desktop_media_query = inspiro_get_prop( $selectors, 'page-title-desktop-media' );

	// Base styles (mobile-first approach)
	$dynamic_css .= "{$selector} {\n";
	if ( absint( $page_title_font_size_mobile ) >= 24 && absint( $page_title_font_size_mobile ) <= 80 ) {
		$dynamic_css .= "font-size: {$page_title_font_size_mobile}px;\n";
	}
	if ( ! empty( $page_title_font_weight ) && 'inherit' !== $page_title_font_weight ) {
		$dynamic_css .= "font-weight: {$page_title_font_weight};\n";
	}
	if ( ! empty( $page_title_text_transform ) && 'inherit' !== $page_title_text_transform ) {
		$dynamic_css .= "text-transform: {$page_title_text_transform};\n";
	}
	if ( ! empty( $page_title_line_height ) && 'inherit' !== $page_title_line_height ) {
		$dynamic_css .= "line-height: {$page_title_line_height};\n";
	}
	if ( ! empty( $page_title_text_align ) ) {
		$dynamic_css .= "text-align: {$page_title_text_align};\n";
	}
	$dynamic_css .= "}\n";

	// Tablet styles
	if ( $tablet_media_query && absint( $page_title_font_size_tablet ) >= 24 && absint( $page_title_font_size_tablet ) <= 80 ) {
		$dynamic_css .= "{$tablet_media_query} {\n";
		$dynamic_css .= "{$selector} {\n";
		$dynamic_css .= "font-size: {$page_title_font_size_tablet}px;\n";
		$dynamic_css .= "} }\n";
	}

	// Desktop styles
	if ( $desktop_media_query && absint( $page_title_font_size ) >= 24 && absint( $page_title_font_size ) <= 80 ) {
		$dynamic_css .= "{$desktop_media_query} {\n";
		$dynamic_css .= "{$selector} {\n";
		$dynamic_css .= "font-size: {$page_title_font_size}px;\n";
		$dynamic_css .= "} }\n";
	}

	return $dynamic_css;
} 