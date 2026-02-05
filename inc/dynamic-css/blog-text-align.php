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
