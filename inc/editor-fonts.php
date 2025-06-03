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

    // Create a temporary file for our dynamic styles
    $upload_dir = wp_upload_dir();
    $editor_css_dir = $upload_dir['basedir'] . '/inspiro-editor';
    $editor_css_file = $editor_css_dir . '/editor-typography.css';

    // Create directory if it doesn't exist
    if (!file_exists($editor_css_dir)) {
        wp_mkdir_p($editor_css_dir);
    }

    // Only write file if it doesn't exist or content has changed
    $current_css = file_exists($editor_css_file) ? file_get_contents($editor_css_file) : '';
    if ($current_css !== $css) {
        file_put_contents($editor_css_file, $css);
    }

    // Get the file URL
    $editor_css_url = $upload_dir['baseurl'] . '/inspiro-editor/editor-typography.css';

    // Add all styles to editor
    $editor_style[] = $editor_css_url;

    // Remove existing editor styles first
    remove_editor_styles();

    // Add our compiled styles
    add_editor_style($editor_style);
}

// Use both hooks to ensure styles are loaded in all contexts
add_action('admin_init', 'inspiro_block_editor_fonts_styles');
add_action('enqueue_block_editor_assets', 'inspiro_block_editor_fonts_styles');

/**
 * Clean up editor styles on theme deactivation
 */
function inspiro_cleanup_editor_styles() {
    $upload_dir = wp_upload_dir();
    $editor_css_dir = $upload_dir['basedir'] . '/inspiro-editor';

    if (is_dir($editor_css_dir)) {
        $files = glob($editor_css_dir . '/*');
        foreach ($files as $file) {
            unlink($file);
        }
        rmdir($editor_css_dir);
    }
}
register_deactivation_hook(get_template_directory() . '/functions.php', 'inspiro_cleanup_editor_styles');

