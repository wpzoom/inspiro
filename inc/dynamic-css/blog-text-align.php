<?php
/**
 * Generate inline css based on Customizer settings value
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 2.1.9
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

add_filter( 'inspiro/dynamic_theme_css', 'inspiro_dynamic_theme_css_blog_text_align' );

/**
 * Blog Text Alignment
 *
 * @param string $dynamic_css Dynamic CSS from Customizer.
 * @return string Generated dynamic CSS for blog text alignment.
 */
function inspiro_dynamic_theme_css_blog_text_align( $dynamic_css ) {

	$blog_text_align = inspiro_get_theme_mod( 'blog_text_align' );

	if ( ! empty( $blog_text_align ) && 'center' !== $blog_text_align ) {
		$selector = 'body:not(.page-layout-sidebar-right).blog .site-main article,
body:not(.page-layout-sidebar-right).archive .site-main article,
body:not(.page-layout-sidebar-right).search .site-main article,
body:not(.page-layout-sidebar-right).blog .site-main article .entry-title,
body:not(.page-layout-sidebar-right).archive .site-main article .entry-title,
body:not(.page-layout-sidebar-right).search .site-main article .entry-title,
.post-grid article .entry-header,
.post-grid article .entry-title,
body:not(.page-layout-sidebar-right).blog .site-main article .link-more,
body:not(.page-layout-sidebar-right).archive .site-main article .link-more,
body:not(.page-layout-sidebar-right).search .site-main article .link-more,
.post-grid article .link-more';

		$dynamic_css .= "{$selector} {\n";
		$dynamic_css .= "text-align: {$blog_text_align};\n";
		$dynamic_css .= "}\n";
	}

	return $dynamic_css;
}

add_filter( 'inspiro/dynamic_theme_css', 'inspiro_dynamic_theme_css_blog_post_meta' );

/**
 * Blog Show/Hide Post Meta
 *
 * @param string $dynamic_css Dynamic CSS from Customizer.
 * @return string Generated dynamic CSS for blog post meta visibility.
 */
function inspiro_dynamic_theme_css_blog_post_meta( $dynamic_css ) {

	$blog_show_post_meta = get_theme_mod( 'blog_show_post_meta', true );

	if ( ! $blog_show_post_meta ) {
		$selector = '.blog .site-main article .entry-meta,
.archive .site-main article .entry-meta,
.search .site-main article .entry-meta,
.post-grid article .entry-meta';

		$dynamic_css .= "{$selector} {\n";
		$dynamic_css .= "display: none;\n";
		$dynamic_css .= "}\n";
	}

	return $dynamic_css;
}

add_filter( 'inspiro/dynamic_theme_css', 'inspiro_dynamic_theme_css_blog_excerpt' );

/**
 * Blog Show/Hide Excerpt (for grid layout)
 *
 * @param string $dynamic_css Dynamic CSS from Customizer.
 * @return string Generated dynamic CSS for blog excerpt visibility.
 */
function inspiro_dynamic_theme_css_blog_excerpt( $dynamic_css ) {

	$blog_show_excerpt = get_theme_mod( 'blog_show_excerpt', true );

	if ( ! $blog_show_excerpt ) {
		$selector = '.post-grid article .entry-summary';

		$dynamic_css .= "{$selector} {\n";
		$dynamic_css .= "display: none;\n";
		$dynamic_css .= "}\n";
	}

	return $dynamic_css;
}
