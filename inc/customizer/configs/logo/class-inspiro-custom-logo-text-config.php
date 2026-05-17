<?php
/**
 * Inspiro Lite: Adds settings, sections, controls to Customizer
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * PHP Class for Registering Customizer Configuration
 *
 * @since 1.3.0
 */
class Inspiro_Custom_Logo_Text_Config {
	/**
	 * Configurations
	 *
	 * @since 1.4.0 Store configurations to class method.
	 * @return array
	 */
	public static function config() {
		return array(
			'setting' => array(
				array(
					'id'   => 'custom_logo_text',
					'args' => array(
						'default'           => get_bloginfo( 'name' ),
						'transport'         => 'postMessage',
						'sanitize_callback' => 'sanitize_text_field',
					),
				),
				array(
					'id'   => 'show_tagline',
					'args' => array(
						'default'           => false,
						'transport'         => 'refresh',
						'sanitize_callback' => 'inspiro_sanitize_checkbox',
					),
				),
			),
			'control' => array(
				array(
					'id'   => 'custom_logo_text',
					'args' => array(
						'type'        => 'text',
						'label'       => esc_html__( 'Custom Logo Text', 'inspiro' ),
						'description' => esc_html__( 'You can enter a different title without changing the Site Title', 'inspiro' ),
						'section'     => 'title_tagline',
						'priority'    => 5,
					),
				),
				array(
					'id'   => 'show_tagline',
					'args' => array(
						'type'        => 'checkbox',
						'label'       => esc_html__( 'Show Tagline', 'inspiro' ),
						'description' => esc_html__( 'Display the site tagline below the logo or site title in the header.', 'inspiro' ),
						'section'     => 'title_tagline',
						'priority'    => 6,
					),
				),
			),
		);
	}
}
