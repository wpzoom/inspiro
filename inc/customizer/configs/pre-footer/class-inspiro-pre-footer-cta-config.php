<?php
/**
 * Inspiro Lite: Pre-Footer CTA section configuration.
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Registers the Pre-Footer CTA customizer section and its controls.
 *
 * Adapted from Prisma Core's pre-footer CTA module.
 *
 * @since 2.2.0
 */
class Inspiro_Pre_Footer_Cta_Config {

	/**
	 * Configuration array consumed by Inspiro_Customizer_Control_Base.
	 *
	 * @return array
	 */
	public static function config() {
		return array(
			'section' => array(
				'id'   => 'inspiro_pre_footer_cta',
				'args' => array(
					'title'       => esc_html__( 'Pre-Footer CTA', 'inspiro' ),
					'description' => esc_html__( 'Display a call-to-action section above the footer with a headline and a button.', 'inspiro' ),
					'priority'    => 140,
					'capability'  => 'edit_theme_options',
				),
			),
			'setting' => array(
				array(
					'id'   => 'pre_footer_cta_enable',
					'args' => array(
						'default'           => false,
						'sanitize_callback' => 'inspiro_sanitize_checkbox',
						'transport'         => 'refresh',
					),
				),
				array(
					'id'   => 'pre_footer_cta_visibility',
					'args' => array(
						'default'           => 'all',
						'sanitize_callback' => 'inspiro_sanitize_choices',
						'transport'         => 'refresh',
					),
				),
				array(
					'id'   => 'pre_footer_cta_text',
					'args' => array(
						'default'           => esc_html__( 'Ready to start your next project with us?', 'inspiro' ),
						'sanitize_callback' => 'wp_kses_post',
						'transport'         => 'postMessage',
					),
				),
				array(
					'id'   => 'pre_footer_cta_btn_text',
					'args' => array(
						'default'           => esc_html__( 'Get in touch', 'inspiro' ),
						'sanitize_callback' => 'sanitize_text_field',
						'transport'         => 'postMessage',
					),
				),
				array(
					'id'   => 'pre_footer_cta_btn_url',
					'args' => array(
						'default'           => '#',
						'sanitize_callback' => 'esc_url_raw',
						'transport'         => 'refresh',
					),
				),
				array(
					'id'   => 'pre_footer_cta_btn_new_tab',
					'args' => array(
						'default'           => false,
						'sanitize_callback' => 'inspiro_sanitize_checkbox',
						'transport'         => 'refresh',
					),
				),
				array(
					'id'   => 'pre_footer_cta_bg_color',
					'args' => array(
						'default'           => '#111111',
						'sanitize_callback' => 'sanitize_hex_color',
						'transport'         => 'postMessage',
					),
				),
				array(
					'id'   => 'pre_footer_cta_text_color',
					'args' => array(
						'default'           => '#ffffff',
						'sanitize_callback' => 'sanitize_hex_color',
						'transport'         => 'postMessage',
					),
				),
			),
			'control' => array(
				array(
					'id'   => 'pre_footer_cta_enable',
					'args' => array(
						'label'   => esc_html__( 'Enable Pre-Footer CTA', 'inspiro' ),
						'section' => 'inspiro_pre_footer_cta',
						'type'    => 'checkbox',
					),
				),
				array(
					'id'   => 'pre_footer_cta_visibility',
					'args' => array(
						'label'           => esc_html__( 'Visibility', 'inspiro' ),
						'section'         => 'inspiro_pre_footer_cta',
						'type'            => 'select',
						'choices'         => array(
							'all'      => esc_html__( 'All pages', 'inspiro' ),
							'home'     => esc_html__( 'Front page only', 'inspiro' ),
							'singular' => esc_html__( 'Posts and pages (not on archives)', 'inspiro' ),
						),
						'active_callback' => 'inspiro_is_pre_footer_cta_enabled',
					),
				),
				array(
					'id'   => 'pre_footer_cta_text',
					'args' => array(
						'label'           => esc_html__( 'Headline', 'inspiro' ),
						'section'         => 'inspiro_pre_footer_cta',
						'type'            => 'textarea',
						'active_callback' => 'inspiro_is_pre_footer_cta_enabled',
					),
				),
				array(
					'id'   => 'pre_footer_cta_btn_text',
					'args' => array(
						'label'           => esc_html__( 'Button Text', 'inspiro' ),
						'section'         => 'inspiro_pre_footer_cta',
						'type'            => 'text',
						'active_callback' => 'inspiro_is_pre_footer_cta_enabled',
					),
				),
				array(
					'id'   => 'pre_footer_cta_btn_url',
					'args' => array(
						'label'           => esc_html__( 'Button URL', 'inspiro' ),
						'section'         => 'inspiro_pre_footer_cta',
						'type'            => 'url',
						'active_callback' => 'inspiro_is_pre_footer_cta_enabled',
					),
				),
				array(
					'id'   => 'pre_footer_cta_btn_new_tab',
					'args' => array(
						'label'           => esc_html__( 'Open button link in a new tab', 'inspiro' ),
						'section'         => 'inspiro_pre_footer_cta',
						'type'            => 'checkbox',
						'active_callback' => 'inspiro_is_pre_footer_cta_enabled',
					),
				),
				array(
					'id'           => 'pre_footer_cta_bg_color',
					'control_type' => 'WP_Customize_Color_Control',
					'args'         => array(
						'label'           => esc_html__( 'Background Color', 'inspiro' ),
						'section'         => 'inspiro_pre_footer_cta',
						'active_callback' => 'inspiro_is_pre_footer_cta_enabled',
					),
				),
				array(
					'id'           => 'pre_footer_cta_text_color',
					'control_type' => 'WP_Customize_Color_Control',
					'args'         => array(
						'label'           => esc_html__( 'Text Color', 'inspiro' ),
						'section'         => 'inspiro_pre_footer_cta',
						'active_callback' => 'inspiro_is_pre_footer_cta_enabled',
					),
				),
			),
			'partial' => array(
				array(
					'id'   => 'pre_footer_cta_text',
					'args' => array(
						'selector'        => '.inspiro-pre-footer-cta .pre-footer-cta-text',
						'render_callback' => 'inspiro_render_pre_footer_cta_text',
					),
				),
				array(
					'id'   => 'pre_footer_cta_btn_text',
					'args' => array(
						'selector'        => '.inspiro-pre-footer-cta .pre-footer-cta-button',
						'render_callback' => 'inspiro_render_pre_footer_cta_button_text',
					),
				),
			),
		);
	}
}
