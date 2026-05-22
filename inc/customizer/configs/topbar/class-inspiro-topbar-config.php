<?php
/**
 * Inspiro Lite: Topbar configuration.
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Registers the optional topbar (above the header) and its controls.
 *
 * Adapted from Prisma Core's topbar module.
 *
 * @since 2.2.0
 */
class Inspiro_Topbar_Config {

	/**
	 * Configuration array consumed by Inspiro_Customizer_Control_Base.
	 *
	 * @return array
	 */
	public static function config() {
		return array(
			'section' => array(
				'id'   => 'inspiro_topbar',
				'args' => array(
					'title'       => esc_html__( 'Topbar', 'inspiro' ),
					'description' => esc_html__( 'An optional thin bar that sits above the main header — useful for contact info, secondary links, or short announcements.', 'inspiro' ),
					'priority'    => 21,
					'capability'  => 'edit_theme_options',
				),
			),
			'setting' => array(
				array(
					'id'   => 'topbar_enable',
					'args' => array(
						'default'           => false,
						'sanitize_callback' => 'inspiro_sanitize_checkbox',
						'transport'         => 'refresh',
					),
				),
				array(
					'id'   => 'topbar_left_text',
					'args' => array(
						'default'           => '',
						'sanitize_callback' => 'wp_kses_post',
						'transport'         => 'postMessage',
					),
				),
				array(
					'id'   => 'topbar_right_text',
					'args' => array(
						'default'           => '',
						'sanitize_callback' => 'wp_kses_post',
						'transport'         => 'postMessage',
					),
				),
				array(
					'id'   => 'topbar_bg_color',
					'args' => array(
						'default'           => '#000000',
						'sanitize_callback' => 'maybe_hash_hex_color', // accepts hex or rgba pass-through
						'transport'         => 'postMessage',
					),
				),
				array(
					'id'   => 'topbar_text_color',
					'args' => array(
						'default'           => '#ffffff',
						'sanitize_callback' => 'sanitize_hex_color',
						'transport'         => 'postMessage',
					),
				),
				array(
					'id'   => 'topbar_link_color',
					'args' => array(
						'default'           => '#ffffff',
						'sanitize_callback' => 'sanitize_hex_color',
						'transport'         => 'postMessage',
					),
				),
			),
			'control' => array(
				array(
					'id'   => 'topbar_enable',
					'args' => array(
						'label'   => esc_html__( 'Enable Topbar', 'inspiro' ),
						'section' => 'inspiro_topbar',
						'type'    => 'checkbox',
					),
				),
				array(
					'id'   => 'topbar_left_text',
					'args' => array(
						'label'           => esc_html__( 'Left Content (HTML allowed)', 'inspiro' ),
						'description'     => esc_html__( 'Example: &lt;a href="tel:+1234567890"&gt;Call us: +1 234 567 890&lt;/a&gt;', 'inspiro' ),
						'section'         => 'inspiro_topbar',
						'type'            => 'textarea',
						'active_callback' => 'inspiro_is_topbar_enabled',
					),
				),
				array(
					'id'   => 'topbar_right_text',
					'args' => array(
						'label'           => esc_html__( 'Right Content (HTML allowed)', 'inspiro' ),
						'section'         => 'inspiro_topbar',
						'type'            => 'textarea',
						'active_callback' => 'inspiro_is_topbar_enabled',
					),
				),
				array(
					'id'           => 'topbar_bg_color',
					'control_type' => 'Inspiro_Customize_Alpha_Color_Picker_Control',
					'args'         => array(
						'label'           => esc_html__( 'Background Color', 'inspiro' ),
						'description'     => esc_html__( 'Supports transparency — pick a color and adjust the alpha slider.', 'inspiro' ),
						'section'         => 'inspiro_topbar',
						'active_callback' => 'inspiro_is_topbar_enabled',
					),
				),
				array(
					'id'           => 'topbar_text_color',
					'control_type' => 'WP_Customize_Color_Control',
					'args'         => array(
						'label'           => esc_html__( 'Text Color', 'inspiro' ),
						'section'         => 'inspiro_topbar',
						'active_callback' => 'inspiro_is_topbar_enabled',
					),
				),
				array(
					'id'           => 'topbar_link_color',
					'control_type' => 'WP_Customize_Color_Control',
					'args'         => array(
						'label'           => esc_html__( 'Link Color', 'inspiro' ),
						'section'         => 'inspiro_topbar',
						'active_callback' => 'inspiro_is_topbar_enabled',
					),
				),
			),
			'partial' => array(
				array(
					'id'   => 'topbar_left_text',
					'args' => array(
						'selector'        => '#inspiro-topbar .topbar-col--left',
						'render_callback' => 'inspiro_render_topbar_left',
					),
				),
				array(
					'id'   => 'topbar_right_text',
					'args' => array(
						'selector'        => '#inspiro-topbar .topbar-col--right',
						'render_callback' => 'inspiro_render_topbar_right',
					),
				),
			),
		);
	}
}
