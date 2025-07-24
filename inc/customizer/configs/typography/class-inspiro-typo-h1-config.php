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
class Inspiro_Typo_H1_Config {
	/**
	 * Configurations
	 *
	 * @since 1.4.0 Store configurations to class method.
	 *
	 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
	 * @return array
	 */
	public static function config( $wp_customize ) {
		return array(
			'setting' => array(
				array(
					'id'   => 'heading1-font-size',
					'args' => array(
						'default'           => 45,
						'transport'         => 'postMessage',
						'sanitize_callback' => 'inspiro_sanitize_integer',
					),
				),
				array(
					'id'   => 'heading1-font-weight',
					'args' => array(
						'default'           => '600',
						'transport'         => 'postMessage',
						'sanitize_callback' => 'inspiro_sanitize_font_weight',
					),
				),
				array(
					'id'   => 'heading1-text-transform',
					'args' => array(
						'default'           => '',
						'transport'         => 'postMessage',
						'sanitize_callback' => 'inspiro_sanitize_choices',
					),
				),
				array(
					'id'   => 'heading1-line-height',
					'args' => array(
						'default'           => 1.4,
						'transport'         => 'postMessage',
						'sanitize_callback' => 'inspiro_sanitize_float',
					),
				),
			),
			'control' => array(
				array(
					'id'           => 'inspiro_typography_section_title_h1',
					'control_type' => 'Inspiro_Customize_Title_Control',
					'args'         => array(
						'label'    => __( 'Heading 1', 'inspiro' ),
						'section'  => 'inspiro_typography_section_headings',
						'settings' => array(),
					),
				),
				array(
					'id'           => 'heading1-font-size',
					'control_type' => 'Inspiro_Customize_Range_Control',
					'args'         => array(
						'label'       => __( 'Font Size (px)', 'inspiro' ),
						'section'     => 'inspiro_typography_section_headings',
						'input_attrs' => array(
							'min'  => 24,
							'max'  => 80,
							'step' => 1,
						),
					),
				),
				array(
					'id'               => 'heading1-font-weight',
					'args'             => array(
						'label'   => __( 'Font Weight', 'inspiro' ),
						'section' => 'inspiro_typography_section_headings',
						'type'    => 'select',
						'choices' => array(),
					),
					'callable_choices' => array(
						array( 'Inspiro_Font_Family_Manager', 'get_font_family_weight' ),
						array( 'headings-font-family', $wp_customize ),
					),
				),
				array(
					'id'   => 'heading1-text-transform',
					'args' => array(
						'label'   => __( 'Text Transform', 'inspiro' ),
						'section' => 'inspiro_typography_section_headings',
						'type'    => 'select',
						'choices' => array(
							''           => _x( 'Inherit', 'text transform', 'inspiro' ),
							'none'       => _x( 'None', 'text transform', 'inspiro' ),
							'capitalize' => __( 'Capitalize', 'inspiro' ),
							'uppercase'  => __( 'Uppercase', 'inspiro' ),
							'lowercase'  => __( 'Lowercase', 'inspiro' ),
						),
					),
				),
				array(
					'id'           => 'heading1-line-height',
					'control_type' => 'Inspiro_Customize_Range_Control',
					'args'         => array(
						'label'       => __( 'Line Height', 'inspiro' ),
						'section'     => 'inspiro_typography_section_headings',
						'input_attrs' => array(
							'min'  => 1,
							'max'  => 2,
							'step' => 0.1,
						),
					),
				),
			),
		);
	}
}
