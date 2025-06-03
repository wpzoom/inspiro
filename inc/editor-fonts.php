<?php
/**
 * Editor Font Functions
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Get the current font families from Customizer settings
 */
function inspiro_get_customizer_fonts() {
    $font_families = array();

    // Get font settings from customizer
    $body_font = get_theme_mod('body-font-family', "'Inter', sans-serif");
    $headings_font = get_theme_mod('headings-font-family', "'Onest', sans-serif");

    // Clean up font family strings
    $body_font = str_replace(array('"', "'"), '', $body_font);
    $headings_font = str_replace(array('"', "'"), '', $headings_font);

    // Only add each font family once
    if ($body_font !== 'inherit' && !in_array($body_font, $font_families)) {
        $font_families[] = $body_font;
    }

    if ($headings_font !== 'inherit' && !in_array($headings_font, $font_families)) {
        $font_families[] = $headings_font;
    }

    return $font_families;
}

/**
 * Generate Google Fonts URL based on Customizer settings
 */
function inspiro_get_google_fonts_url() {
    $font_families = inspiro_get_customizer_fonts();

    if (empty($font_families)) {
        return '';
    }

    // Convert font families array to Google Fonts format
    $formatted_fonts = array();
    foreach ($font_families as $font) {
        // Add default font weights
        $formatted_fonts[] = $font . ':100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i';
    }

    $query_args = array(
        'family'  => urlencode(implode('|', $formatted_fonts)),
        'display' => 'swap',
        'subset'  => 'latin,latin-ext',
    );

    return add_query_arg($query_args, 'https://fonts.googleapis.com/css');
}

/**
 * Enqueue Google Fonts in Block Editor
 */
function inspiro_block_editor_fonts() {
    // Add custom fonts
    wp_enqueue_style('inspiro-google-fonts', inspiro_get_google_fonts_url(), array(), null);
}
add_action('enqueue_block_editor_assets', 'inspiro_block_editor_fonts');

/**
 * Enqueue dynamic styles for block editor
 */
function inspiro_block_editor_dynamic_css() {
    // Get font settings from customizer
    $body_font = get_theme_mod('body-font-family', "'Inter', sans-serif");
    $headings_font = get_theme_mod('headings-font-family', "'Onest', sans-serif");

    // Add editor styles
    add_editor_style(array(
        'assets/css/' . ((SCRIPT_DEBUG) ? 'unminified' : 'minified') . '/editor-style' . ((SCRIPT_DEBUG) ? '' : '.min') . '.css',
        Inspiro_Fonts_Manager::get_google_font_url()
    ));

    // Add dynamic CSS
    $css = "
        /* Editor Typography */
        .editor-styles-wrapper,
        .wp-block {
            font-family: {$body_font} !important;
        }

        .editor-post-title__block .editor-post-title__input,
        .wpzoom-blocks_portfolio-block .wpz-portfolio-button__link,
        .wp-block-post-title,
        .wp-block-heading,
        .wp-block-button .wp-block-button__link,
        .editor-styles-wrapper .wp-block h1,
        .editor-styles-wrapper .wp-block h2,
        .editor-styles-wrapper .wp-block h3,
        .editor-styles-wrapper .wp-block h4,
        .editor-styles-wrapper .wp-block h5,
        .editor-styles-wrapper .wp-block h6 {
            font-family: {$headings_font} !important;
        }
    ";

    wp_add_inline_style('wp-block-editor', $css);
}
add_action('enqueue_block_editor_assets', 'inspiro_block_editor_dynamic_css');

