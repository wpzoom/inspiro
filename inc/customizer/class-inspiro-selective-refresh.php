<?php
/**
 * Inspiro Lite: Selective Refresh Partials
 *
 * Registers Customizer selective refresh partials so that pencil-icon edit
 * shortcuts appear in the Customizer preview for common editable elements
 * (header logo/text, tagline, hero title/description/button, footer copyright).
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 2.1.14
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Inspiro_Selective_Refresh' ) ) {

	/**
	 * Registers selective refresh partials to enable Customizer edit shortcuts.
	 */
	class Inspiro_Selective_Refresh {

		/**
		 * Constructor.
		 */
		public function __construct() {
			add_action( 'customize_register', array( $this, 'register_partials' ), 20 );
			add_action( 'customize_preview_init', array( $this, 'enqueue_preview_styles' ) );
		}

		/**
		 * Adds inline styles in the Customizer preview to:
		 * 1. Force edit shortcuts above the theme's navbar (z-index 200) and hero overlays.
		 * 2. Give the text-logo <a> an explicit positioning context so WP can reliably
		 *    place the pencil icon over it (otherwise WP skips/misplaces shortcuts on
		 *    tiny inline-block elements without a positioned ancestor inside the partial).
		 */
		public function enqueue_preview_styles() {
			$css  = '.customize-partial-edit-shortcut { z-index: 999999 !important; }';
			$css .= '.custom-logo-text { position: relative; }';
			wp_register_style( 'inspiro-selective-refresh-preview', false, array(), INSPIRO_THEME_VERSION );
			wp_enqueue_style( 'inspiro-selective-refresh-preview' );
			wp_add_inline_style( 'inspiro-selective-refresh-preview', $css );
		}

		/**
		 * Register selective refresh partials.
		 *
		 * @param WP_Customize_Manager $wp_customize Customize manager.
		 */
		public function register_partials( WP_Customize_Manager $wp_customize ) {
			if ( ! isset( $wp_customize->selective_refresh ) ) {
				return;
			}

			// Header text-logo (custom_logo_text fallback shown when no image is set).
			// WP core already auto-registers a `custom_logo` partial on `.custom-logo-link`
			// for the image-logo case, so we only need this one for the text variant.
			// Mirrors Twenty Twenty's pattern (selector on the <a>, container_inclusive).
			$wp_customize->selective_refresh->add_partial(
				'inspiro_custom_logo_text',
				array(
					'selector'            => '.custom-logo-text',
					'settings'            => array( 'custom_logo_text', 'blogname' ),
					'container_inclusive' => true,
					'render_callback'     => array( $this, 'render_custom_logo_text' ),
				)
			);

			// Header tagline (only present when Show Tagline is enabled).
			$wp_customize->selective_refresh->add_partial(
				'inspiro_header_tagline',
				array(
					'selector'            => '.header-logo-wrapper .header-tagline',
					'settings'            => array( 'show_tagline', 'blogdescription' ),
					'container_inclusive' => true,
					'render_callback'     => array( $this, 'render_header_tagline' ),
				)
			);

			// Hero title.
			if ( $wp_customize->get_setting( 'header_site_title' ) ) {
				$wp_customize->selective_refresh->add_partial(
					'inspiro_header_site_title',
					array(
						'selector'        => '.site-branding-text .site-title',
						'settings'        => array( 'header_site_title' ),
						'render_callback' => array( $this, 'render_header_site_title' ),
					)
				);
			}

			// Hero description.
			if ( $wp_customize->get_setting( 'header_site_description' ) ) {
				$wp_customize->selective_refresh->add_partial(
					'inspiro_header_site_description',
					array(
						'selector'        => '.site-branding-text .site-description',
						'settings'        => array( 'header_site_description' ),
						'render_callback' => array( $this, 'render_header_site_description' ),
					)
				);
			}

			// Hero button.
			if ( $wp_customize->get_setting( 'header_button_title' ) ) {
				$wp_customize->selective_refresh->add_partial(
					'inspiro_header_button',
					array(
						'selector'            => '.custom-header-button-wrapper',
						'settings'            => array( 'header_button_title', 'header_button_url', 'header_button_link_open' ),
						'container_inclusive' => true,
						'render_callback'     => array( $this, 'render_header_button' ),
					)
				);
			}

			// Footer copyright.
			if ( $wp_customize->get_setting( 'footer_copyright_text_setting' ) ) {
				$footer_copyright = $wp_customize->get_setting( 'footer_copyright_text_setting' );
				$footer_copyright->transport = 'postMessage';

				$wp_customize->selective_refresh->add_partial(
					'inspiro_footer_copyright',
					array(
						'selector'            => '.site-info',
						'settings'            => array( 'footer_copyright_text_setting' ),
						'container_inclusive' => false,
						'render_callback'     => array( $this, 'render_footer_copyright' ),
					)
				);
			}
		}

		/**
		 * Render the custom-logo-text <a> link (used when no image logo is set).
		 *
		 * Must return the same markup that inspiro_custom_logo() outputs in
		 * its text-fallback branch so selective refresh replaces the element cleanly.
		 *
		 * @return string
		 */
		public function render_custom_logo_text() {
			return sprintf(
				'<a href="%1$s" title="%2$s" class="custom-logo-text">%3$s</a>',
				esc_url( home_url() ),
				esc_attr( get_bloginfo( 'description' ) ),
				esc_html( inspiro_get_theme_mod( 'custom_logo_text' ) )
			);
		}

		/**
		 * Render the header tagline markup (or empty when disabled).
		 *
		 * @return string
		 */
		public function render_header_tagline() {
			if ( ! inspiro_get_theme_mod( 'show_tagline' ) ) {
				return '';
			}

			$tagline = get_bloginfo( 'description', 'display' );
			if ( ! $tagline ) {
				return '';
			}

			return '<p class="header-tagline">' . esc_html( $tagline ) . '</p>';
		}

		/**
		 * Render the hero title.
		 *
		 * @return string
		 */
		public function render_header_site_title() {
			return esc_html( inspiro_get_theme_mod( 'header_site_title' ) );
		}

		/**
		 * Render the hero description.
		 *
		 * @return string
		 */
		public function render_header_site_description() {
			return esc_html( inspiro_get_theme_mod( 'header_site_description' ) );
		}

		/**
		 * Render the hero button markup.
		 *
		 * @return string
		 */
		public function render_header_button() {
			ob_start();
			get_template_part( 'template-parts/header/header', 'button' );
			return ob_get_clean();
		}

		/**
		 * Render the footer copyright site-info block.
		 *
		 * @return string
		 */
		public function render_footer_copyright() {
			ob_start();
			get_template_part( 'template-parts/footer/site', 'info' );
			return ob_get_clean();
		}
	}

	new Inspiro_Selective_Refresh();
}
