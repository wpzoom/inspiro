<?php
/**
 * Editor Typography
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Enqueue editor styles and fonts
 */
function inspiro_block_editor_fonts_styles() {
    // Get font settings from customizer
    $body_font = get_theme_mod('body-font-family', "'Inter', sans-serif");
    $headings_font = get_theme_mod('headings-font-family', "'Onest', sans-serif");

    // Generate dynamic CSS
    $css = "
        /* Editor Typography */
        body .editor-styles-wrapper,
        body .editor-styles-wrapper p,
        body .editor-styles-wrapper .wp-block,
        .wp-block {
            font-family: {$body_font} !important;
        }

        .wpzoom-blocks_portfolio-block .wpz-portfolio-button__link,
        .wp-block-post-title,
        .wp-block-heading,
        .wp-block-button .wp-block-button__link,
        body .editor-styles-wrapper .editor-post-title__block .editor-post-title__input,
        body .editor-styles-wrapper h1,
        body .editor-styles-wrapper h2,
        body .editor-styles-wrapper h3,
        body .editor-styles-wrapper h4,
        body .editor-styles-wrapper h5,
        body .editor-styles-wrapper h6,
        body .editor-styles-wrapper .wp-block h1,
        body .editor-styles-wrapper .wp-block h2,
        body .editor-styles-wrapper .wp-block h3,
        body .editor-styles-wrapper .wp-block h4,
        body .editor-styles-wrapper .wp-block h5,
        body .editor-styles-wrapper .wp-block h6,
        body .editor-styles-wrapper .wp-block-heading,
        body .editor-styles-wrapper .wp-block-button .wp-block-button__link {
            font-family: {$headings_font} !important;
        }
    ";

    // Create editor-specific stylesheet
    $editor_style = array(
        'assets/css/' . ((SCRIPT_DEBUG) ? 'unminified' : 'minified') . '/editor-style' . ((SCRIPT_DEBUG) ? '' : '.min') . '.css'
    );

    // Get Google Fonts URL
    $google_fonts_url = Inspiro_Fonts_Manager::get_google_font_url();
    if (!empty($google_fonts_url)) {
        $editor_style[] = $google_fonts_url;
    }

    // Remove existing editor styles first
    remove_editor_styles();

    // Add our compiled styles
    add_editor_style($editor_style);

    // Add inline styles for typography
    wp_add_inline_style('wp-edit-blocks', $css);
}

// Use both hooks to ensure styles are loaded in all contexts
add_action('admin_init', 'inspiro_block_editor_fonts_styles');
add_action('enqueue_block_editor_assets', 'inspiro_block_editor_fonts_styles');

