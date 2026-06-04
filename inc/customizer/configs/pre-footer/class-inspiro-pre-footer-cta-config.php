<?php
/**
 * Inspiro Lite: Pre-Footer CTA section configuration.
 *
 * Registers the Pre-Footer CTA's settings + controls inside the existing
 * "Footer" section as a collapsible accordion group, matching Inspiro's
 * native pattern.
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Inspiro_Pre_Footer_Cta_Config' ) ) {

	/**
	 * Pre-Footer CTA customizer config.
	 *
	 * Uses the constructor + register_configuration pattern (same as
	 * Inspiro_Footer_Widget_Areas_Config) rather than the static config()
	 * array so we can register an accordion UI wrapper for the controls.
	 *
	 * @since 2.2.0
	 */
	class Inspiro_Pre_Footer_Cta_Config {

		/**
		 * Constructor.
		 */
		public function __construct() {
			// Priority 11 — after Inspiro_Footer_Widget_Areas_Config (priority 10)
			// so the footer-area section already exists when we attach to it.
			add_action( 'customize_register', array( $this, 'register_configuration' ), 11 );
		}

		/**
		 * Register Pre-Footer CTA settings + controls inside the Footer section.
		 *
		 * @param WP_Customize_Manager $wp_customize Customizer manager.
		 */
		public function register_configuration( $wp_customize ) {

			// =====================================================================
			// SETTINGS
			// =====================================================================
			$wp_customize->add_setting(
				'pre_footer_cta_enable',
				array(
					'default'           => false,
					'sanitize_callback' => 'inspiro_sanitize_checkbox',
					'transport'         => 'refresh',
				)
			);
			$wp_customize->add_setting(
				'pre_footer_cta_visibility',
				array(
					'default'           => 'all',
					'sanitize_callback' => 'inspiro_sanitize_choices',
					'transport'         => 'refresh',
				)
			);
			$wp_customize->add_setting(
				'pre_footer_cta_text',
				array(
					'default'           => esc_html__( 'Ready to start your next project with us?', 'inspiro' ),
					'sanitize_callback' => 'wp_kses_post',
					'transport'         => 'postMessage',
				)
			);
			$wp_customize->add_setting(
				'pre_footer_cta_btn_text',
				array(
					'default'           => esc_html__( 'Get in touch', 'inspiro' ),
					'sanitize_callback' => 'sanitize_text_field',
					'transport'         => 'postMessage',
				)
			);
			$wp_customize->add_setting(
				'pre_footer_cta_btn_url',
				array(
					'default'           => '#',
					'sanitize_callback' => 'esc_url_raw',
					'transport'         => 'refresh',
				)
			);
			$wp_customize->add_setting(
				'pre_footer_cta_btn_new_tab',
				array(
					'default'           => false,
					'sanitize_callback' => 'inspiro_sanitize_checkbox',
					'transport'         => 'refresh',
				)
			);
			$wp_customize->add_setting(
				'pre_footer_cta_bg_color',
				array(
					'default'           => '#111111',
					'sanitize_callback' => 'sanitize_hex_color',
					'transport'         => 'postMessage',
				)
			);
			$wp_customize->add_setting(
				'pre_footer_cta_text_color',
				array(
					'default'           => '#ffffff',
					'sanitize_callback' => 'sanitize_hex_color',
					'transport'         => 'postMessage',
				)
			);

			// =====================================================================
			// ACCORDION WRAPPER + CONTROLS (inside the Footer section)
			// =====================================================================
			// IMPORTANT — fractional priorities are deliberate.
			//
			// The Footer section already has ~7 other controls clustered at
			// priority 10 (Footer Builder, Copyright Text accordion, widget
			// areas, etc.). The accordion-section-ui-wrapper hides the next N
			// consecutive DOM siblings, so our 8 wrapped controls MUST be
			// contiguous in the rendered order. Spacing ours at 4.0–4.8 keeps
			// them tight between Footer Builder Lite (priorities 1–3) and the
			// priority-10 cluster — no interleaving.
			$wp_customize->add_control(
				new Inspiro_Customize_Accordion_UI_Control(
					$wp_customize,
					'for_pre_footer_cta_accordion',
					array(
						'type'             => 'accordion-section-ui-wrapper',
						'label'            => esc_html__( 'Pre-Footer CTA', 'inspiro' ),
						'description'      => esc_html__( 'A call-to-action band above the footer with a headline and a button.', 'inspiro' ),
						'settings'         => array(),
						'section'          => 'footer-area',
						'accordion'        => true,
						'expanded'         => false,
						'controls_to_wrap' => 8,
						'priority'         => 4,
					)
				)
			);

			$wp_customize->add_control(
				'pre_footer_cta_enable',
				array(
					'label'    => esc_html__( 'Enable Pre-Footer CTA', 'inspiro' ),
					'section'  => 'footer-area',
					'type'     => 'checkbox',
					'priority' => 4.1,
				)
			);

			$wp_customize->add_control(
				'pre_footer_cta_visibility',
				array(
					'label'           => esc_html__( 'Visibility', 'inspiro' ),
					'section'         => 'footer-area',
					'type'            => 'select',
					'choices'         => array(
						'all'      => esc_html__( 'All pages', 'inspiro' ),
						'home'     => esc_html__( 'Front page only', 'inspiro' ),
						'singular' => esc_html__( 'Posts and pages (not on archives)', 'inspiro' ),
					),
					'active_callback' => 'inspiro_is_pre_footer_cta_enabled',
					'priority'        => 4.2,
				)
			);

			$wp_customize->add_control(
				'pre_footer_cta_text',
				array(
					'label'           => esc_html__( 'Headline', 'inspiro' ),
					'section'         => 'footer-area',
					'type'            => 'textarea',
					'active_callback' => 'inspiro_is_pre_footer_cta_enabled',
					'priority'        => 4.3,
				)
			);

			$wp_customize->add_control(
				'pre_footer_cta_btn_text',
				array(
					'label'           => esc_html__( 'Button Text', 'inspiro' ),
					'section'         => 'footer-area',
					'type'            => 'text',
					'active_callback' => 'inspiro_is_pre_footer_cta_enabled',
					'priority'        => 4.4,
				)
			);

			$wp_customize->add_control(
				'pre_footer_cta_btn_url',
				array(
					'label'           => esc_html__( 'Button URL', 'inspiro' ),
					'section'         => 'footer-area',
					'type'            => 'url',
					'active_callback' => 'inspiro_is_pre_footer_cta_enabled',
					'priority'        => 4.5,
				)
			);

			$wp_customize->add_control(
				'pre_footer_cta_btn_new_tab',
				array(
					'label'           => esc_html__( 'Open button link in a new tab', 'inspiro' ),
					'section'         => 'footer-area',
					'type'            => 'checkbox',
					'active_callback' => 'inspiro_is_pre_footer_cta_enabled',
					'priority'        => 4.6,
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'pre_footer_cta_bg_color',
					array(
						'label'           => esc_html__( 'Background Color', 'inspiro' ),
						'section'         => 'footer-area',
						'active_callback' => 'inspiro_is_pre_footer_cta_enabled',
						'priority'        => 4.7,
					)
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'pre_footer_cta_text_color',
					array(
						'label'           => esc_html__( 'Text Color', 'inspiro' ),
						'section'         => 'footer-area',
						'active_callback' => 'inspiro_is_pre_footer_cta_enabled',
						'priority'        => 4.8,
					)
				)
			);

			// =====================================================================
			// SELECTIVE-REFRESH PARTIALS
			// =====================================================================
			if ( isset( $wp_customize->selective_refresh ) ) {
				$wp_customize->selective_refresh->add_partial(
					'pre_footer_cta_text',
					array(
						'selector'        => '.inspiro-pre-footer-cta .pre-footer-cta-text',
						'render_callback' => 'inspiro_render_pre_footer_cta_text',
					)
				);
				$wp_customize->selective_refresh->add_partial(
					'pre_footer_cta_btn_text',
					array(
						'selector'        => '.inspiro-pre-footer-cta .pre-footer-cta-button',
						'render_callback' => 'inspiro_render_pre_footer_cta_button_text',
					)
				);
			}
		}
	}

	new Inspiro_Pre_Footer_Cta_Config();
}
