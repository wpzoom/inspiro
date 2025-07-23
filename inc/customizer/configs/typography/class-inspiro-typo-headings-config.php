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
class Inspiro_Typo_Headings_Config {
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
			'section' => array(
				'id'   => 'inspiro_typography_section_headings',
				'args' => array(
					'title' => __( 'Headings', 'inspiro' ),
					'panel' => 'inspiro_typography_panel',
				),
			),
			'setting' => array(
				// All Headings Settings
				array(
					'id'   => 'headings-font-family',
					'args' => array(
						'transport'         => 'postMessage',
						'sanitize_callback' => 'sanitize_text_field',
						'default'           => "'Onest', sans-serif",
					),
				),
				array(
					'id'   => 'headings-font-variant',
					'args' => array(
						'transport'         => 'postMessage',
						'sanitize_callback' => 'inspiro_sanitize_font_variant',
						'default'           => '600',
					),
				),
				array(
					'id'   => 'headings-font-weight',
					'args' => array(
						'default'           => '600',
						'transport'         => 'postMessage',
						'sanitize_callback' => 'inspiro_sanitize_font_weight',
					),
				),
				array(
					'id'   => 'headings-text-transform',
					'args' => array(
						'default'           => 'inherit',
						'transport'         => 'refresh',
						'sanitize_callback' => 'inspiro_sanitize_choices',
					),
				),
				array(
					'id'   => 'headings-line-height',
					'args' => array(
						'default'           => 1.4,
						'transport'         => 'refresh',
						'sanitize_callback' => 'inspiro_sanitize_float',
					),
				),
				// Page & Post Titles Settings (H1)
				array(
					'id'   => 'heading1-font-size',
					'args' => array(
						'default'           => 36,
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
				// All Headings Accordion
				array(
					'id'           => 'for_typography_headings_all_section',
					'control_type' => 'Inspiro_Customize_Accordion_UI_Control',
					'args'         => array(
						'label'            => __( 'All Headings', 'inspiro' ),
						'section'          => 'inspiro_typography_section_headings',
						'settings'         => array(),
						'controls_to_wrap' => 5,
					),
				),
				array(
					'id'           => 'headings-font-family',
					'control_type' => 'Inspiro_Customize_Typography_Control',
					'args'         => array(
						'label'   => __( 'Font Family', 'inspiro' ),
						'section' => 'inspiro_typography_section_headings',
						'connect' => 'headings-font-weight',
						'variant' => 'headings-font-variant',
					),
				),
				array(
					'id'           => 'headings-font-variant',
					'control_type' => 'Inspiro_Customize_Font_Variant_Control',
					'args'         => array(
						'label'       => __( 'Variants', 'inspiro' ),
						'description' => __( 'Only selected Font Variants will be loaded from Google Fonts.', 'inspiro' ),
						'section'     => 'inspiro_typography_section_headings',
						'connect'     => 'headings-font-family',
					),
				),
				array(
					'id'               => 'headings-font-weight',
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
					'id'   => 'headings-text-transform',
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
					'id'           => 'headings-line-height',
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
				// Page & Post Titles Accordion
				array(
					'id'           => 'for_typography_headings_h1_section',
					'control_type' => 'Inspiro_Customize_Accordion_UI_Control',
					'args'         => array(
						'label'            => __( 'Page & Post Titles', 'inspiro' ),
						'section'          => 'inspiro_typography_section_headings',
						'settings'         => array(),
						'controls_to_wrap' => 4,
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
