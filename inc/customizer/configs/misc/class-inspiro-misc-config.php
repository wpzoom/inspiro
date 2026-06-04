<?php
/**
 * Inspiro Lite: Misc settings (back-to-top button, preloader).
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Registers misc UX features — back-to-top button and page preloader.
 *
 * @since 2.2.0
 */
class Inspiro_Misc_Config {

	/**
	 * Configuration array consumed by Inspiro_Customizer_Control_Base.
	 *
	 * @return array
	 */
	public static function config() {
		return array(
			'section' => array(
				'id'   => 'inspiro_misc',
				'args' => array(
					'title'       => esc_html__( 'Misc Options', 'inspiro' ),
					'description' => esc_html__( 'Small extras: a back-to-top button and an optional page-load preloader.', 'inspiro' ),
					'priority'    => 145,
					'capability'  => 'edit_theme_options',
				),
			),
			'setting' => array(
				array(
					'id'   => 'back_to_top_enable',
					'args' => array(
						'default'           => true,
						'sanitize_callback' => 'inspiro_sanitize_checkbox',
						'transport'         => 'refresh',
					),
				),
				array(
					'id'   => 'back_to_top_bg_color',
					'args' => array(
						'default'           => '#111111',
						'sanitize_callback' => 'sanitize_hex_color',
						'transport'         => 'postMessage',
					),
				),
				array(
					'id'   => 'back_to_top_icon_color',
					'args' => array(
						'default'           => '#ffffff',
						'sanitize_callback' => 'sanitize_hex_color',
						'transport'         => 'postMessage',
					),
				),
				array(
					'id'   => 'preloader_enable',
					'args' => array(
						'default'           => false,
						'sanitize_callback' => 'inspiro_sanitize_checkbox',
						'transport'         => 'refresh',
					),
				),
				array(
					'id'   => 'preloader_bg_color',
					'args' => array(
						'default'           => '#ffffff',
						'sanitize_callback' => 'sanitize_hex_color',
						'transport'         => 'postMessage',
					),
				),
				array(
					'id'   => 'preloader_spinner_color',
					'args' => array(
						'default'           => '#111111',
						'sanitize_callback' => 'sanitize_hex_color',
						'transport'         => 'postMessage',
					),
				),
			),
			'control' => array(
				array(
					'id'   => 'back_to_top_enable',
					'args' => array(
						'label'   => esc_html__( 'Enable Back-to-Top Button', 'inspiro' ),
						'section' => 'inspiro_misc',
						'type'    => 'checkbox',
					),
				),
				array(
					'id'           => 'back_to_top_bg_color',
					'control_type' => 'WP_Customize_Color_Control',
					'args'         => array(
						'label'           => esc_html__( 'Back-to-Top Background', 'inspiro' ),
						'section'         => 'inspiro_misc',
						'active_callback' => 'inspiro_is_back_to_top_enabled',
					),
				),
				array(
					'id'           => 'back_to_top_icon_color',
					'control_type' => 'WP_Customize_Color_Control',
					'args'         => array(
						'label'           => esc_html__( 'Back-to-Top Icon Color', 'inspiro' ),
						'section'         => 'inspiro_misc',
						'active_callback' => 'inspiro_is_back_to_top_enabled',
					),
				),
				array(
					'id'   => 'preloader_enable',
					'args' => array(
						'label'       => esc_html__( 'Enable Preloader', 'inspiro' ),
						'description' => esc_html__( 'Show a spinner overlay while the page is loading.', 'inspiro' ),
						'section'     => 'inspiro_misc',
						'type'        => 'checkbox',
					),
				),
				array(
					'id'           => 'preloader_bg_color',
					'control_type' => 'WP_Customize_Color_Control',
					'args'         => array(
						'label'           => esc_html__( 'Preloader Background', 'inspiro' ),
						'section'         => 'inspiro_misc',
						'active_callback' => 'inspiro_is_preloader_enabled',
					),
				),
				array(
					'id'           => 'preloader_spinner_color',
					'control_type' => 'WP_Customize_Color_Control',
					'args'         => array(
						'label'           => esc_html__( 'Spinner Color', 'inspiro' ),
						'section'         => 'inspiro_misc',
						'active_callback' => 'inspiro_is_preloader_enabled',
					),
				),
			),
		);
	}
}
