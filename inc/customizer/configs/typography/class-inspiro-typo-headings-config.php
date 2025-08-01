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
				// Post Titles Settings (H1)
				array(
					'id'   => 'heading1-font-size',
					'args' => array(
						'default'           => 45,
						'transport'         => 'postMessage',
						'sanitize_callback' => 'inspiro_sanitize_integer',
					),
				),
				array(
					'id'   => 'heading1-font-size-tablet',
					'args' => array(
						'default'           => 32,
						'transport'         => 'postMessage',
						'sanitize_callback' => 'inspiro_sanitize_integer',
					),
				),
				array(
					'id'   => 'heading1-font-size-mobile',
					'args' => array(
						'default'           => 24,
						'transport'         => 'postMessage',
						'sanitize_callback' => 'inspiro_sanitize_integer',
					),
				),
				// Page Titles Settings
				array(
					'id'   => 'page-title-font-size',
					'args' => array(
						'default'           => 45,
						'transport'         => 'postMessage',
						'sanitize_callback' => 'inspiro_sanitize_integer',
					),
				),
				array(
					'id'   => 'page-title-font-size-tablet',
					'args' => array(
						'default'           => 32,
						'transport'         => 'postMessage',
						'sanitize_callback' => 'inspiro_sanitize_integer',
					),
				),
				array(
					'id'   => 'page-title-font-size-mobile',
					'args' => array(
						'default'           => 24,
						'transport'         => 'postMessage',
						'sanitize_callback' => 'inspiro_sanitize_integer',
					),
				),
				array(
					'id'   => 'page-title-font-weight',
					'args' => array(
						'default'           => '600',
						'transport'         => 'postMessage',
						'sanitize_callback' => 'inspiro_sanitize_font_weight',
					),
				),
				array(
					'id'   => 'page-title-text-transform',
					'args' => array(
						'default'           => '',
						'transport'         => 'postMessage',
						'sanitize_callback' => 'inspiro_sanitize_choices',
					),
				),
				array(
					'id'   => 'page-title-line-height',
					'args' => array(
						'default'           => 1.4,
						'transport'         => 'postMessage',
						'sanitize_callback' => 'inspiro_sanitize_float',
					),
				),
				array(
					'id'   => 'page-title-text-align',
					'args' => array(
						'default'           => 'left',
						'transport'         => 'postMessage',
						'sanitize_callback' => 'inspiro_sanitize_choices',
					),
				),
				// H1 Content Headings Settings
				array(
					'id'   => 'h1-content-font-size',
					'args' => array(
						'default'           => 45,
						'transport'         => 'postMessage',
						'sanitize_callback' => 'inspiro_sanitize_integer',
					),
				),
				array(
					'id'   => 'h1-content-font-size-tablet',
					'args' => array(
						'default'           => 32,
						'transport'         => 'postMessage',
						'sanitize_callback' => 'inspiro_sanitize_integer',
					),
				),
				array(
					'id'   => 'h1-content-font-size-mobile',
					'args' => array(
						'default'           => 24,
						'transport'         => 'postMessage',
						'sanitize_callback' => 'inspiro_sanitize_integer',
					),
				),
				array(
					'id'   => 'h1-content-font-weight',
					'args' => array(
						'default'           => '600',
						'transport'         => 'postMessage',
						'sanitize_callback' => 'inspiro_sanitize_font_weight',
					),
				),
				array(
					'id'   => 'h1-content-text-transform',
					'args' => array(
						'default'           => '',
						'transport'         => 'postMessage',
						'sanitize_callback' => 'inspiro_sanitize_choices',
					),
				),
				array(
					'id'   => 'h1-content-line-height',
					'args' => array(
						'default'           => 1.4,
						'transport'         => 'postMessage',
						'sanitize_callback' => 'inspiro_sanitize_float',
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
				// Content Headings Settings (H2-H6)
				array(
					'id'   => 'heading2-font-size',
					'args' => array(
						'default'           => 30,
						'transport'         => 'postMessage',
						'sanitize_callback' => 'inspiro_sanitize_integer',
					),
				),
				array(
					'id'   => 'heading2-font-weight',
					'args' => array(
						'default'           => '600',
						'transport'         => 'postMessage',
						'sanitize_callback' => 'inspiro_sanitize_font_weight',
					),
				),
				array(
					'id'   => 'heading2-text-transform',
					'args' => array(
						'default'           => '',
						'transport'         => 'postMessage',
						'sanitize_callback' => 'inspiro_sanitize_choices',
					),
				),
				array(
					'id'   => 'heading2-line-height',
					'args' => array(
						'default'           => 1.4,
						'transport'         => 'postMessage',
						'sanitize_callback' => 'inspiro_sanitize_float',
					),
				),
				array(
					'id'   => 'heading3-font-size',
					'args' => array(
						'default'           => 24,
						'transport'         => 'postMessage',
						'sanitize_callback' => 'inspiro_sanitize_integer',
					),
				),
				array(
					'id'   => 'heading3-font-weight',
					'args' => array(
						'default'           => '600',
						'transport'         => 'postMessage',
						'sanitize_callback' => 'inspiro_sanitize_font_weight',
					),
				),
				array(
					'id'   => 'heading3-text-transform',
					'args' => array(
						'default'           => '',
						'transport'         => 'postMessage',
						'sanitize_callback' => 'inspiro_sanitize_choices',
					),
				),
				array(
					'id'   => 'heading3-line-height',
					'args' => array(
						'default'           => 1.4,
						'transport'         => 'postMessage',
						'sanitize_callback' => 'inspiro_sanitize_float',
					),
				),
				array(
					'id'   => 'heading4-font-size',
					'args' => array(
						'default'           => 16,
						'transport'         => 'postMessage',
						'sanitize_callback' => 'inspiro_sanitize_integer',
					),
				),
				array(
					'id'   => 'heading4-font-weight',
					'args' => array(
						'default'           => '600',
						'transport'         => 'postMessage',
						'sanitize_callback' => 'inspiro_sanitize_font_weight',
					),
				),
				array(
					'id'   => 'heading4-text-transform',
					'args' => array(
						'default'           => '',
						'transport'         => 'postMessage',
						'sanitize_callback' => 'inspiro_sanitize_choices',
					),
				),
				array(
					'id'   => 'heading4-line-height',
					'args' => array(
						'default'           => 1.4,
						'transport'         => 'postMessage',
						'sanitize_callback' => 'inspiro_sanitize_float',
					),
				),
				array(
					'id'   => 'heading5-font-size',
					'args' => array(
						'default'           => 14,
						'transport'         => 'postMessage',
						'sanitize_callback' => 'inspiro_sanitize_integer',
					),
				),
				array(
					'id'   => 'heading5-font-weight',
					'args' => array(
						'default'           => '600',
						'transport'         => 'postMessage',
						'sanitize_callback' => 'inspiro_sanitize_font_weight',
					),
				),
				array(
					'id'   => 'heading5-text-transform',
					'args' => array(
						'default'           => '',
						'transport'         => 'postMessage',
						'sanitize_callback' => 'inspiro_sanitize_choices',
					),
				),
				array(
					'id'   => 'heading5-line-height',
					'args' => array(
						'default'           => 1.4,
						'transport'         => 'postMessage',
						'sanitize_callback' => 'inspiro_sanitize_float',
					),
				),
				array(
					'id'   => 'heading6-font-size',
					'args' => array(
						'default'           => 13,
						'transport'         => 'postMessage',
						'sanitize_callback' => 'inspiro_sanitize_integer',
					),
				),
				array(
					'id'   => 'heading6-font-weight',
					'args' => array(
						'default'           => '600',
						'transport'         => 'postMessage',
						'sanitize_callback' => 'inspiro_sanitize_font_weight',
					),
				),
				array(
					'id'   => 'heading6-text-transform',
					'args' => array(
						'default'           => '',
						'transport'         => 'postMessage',
						'sanitize_callback' => 'inspiro_sanitize_choices',
					),
				),
				array(
					'id'   => 'heading6-line-height',
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
				// Post Titles Accordion
				array(
					'id'           => 'for_typography_headings_h1_section',
					'control_type' => 'Inspiro_Customize_Accordion_UI_Control',
					'args'         => array(
						'label'            => __( 'Post Titles', 'inspiro' ),
						'section'          => 'inspiro_typography_section_headings',
						'settings'         => array(),
						'controls_to_wrap' => 4,
					),
				),
				array(
					'id'           => 'heading1-font-size',
					'control_type' => 'Inspiro_Customize_Responsive_Range_Control',
					'args'         => array(
						'label'           => __( 'Font Size (px)', 'inspiro' ),
						'section'         => 'inspiro_typography_section_headings',
						'device_settings' => array(
							'tablet' => 'heading1-font-size-tablet',
							'mobile' => 'heading1-font-size-mobile',
						),
						'input_attrs'     => array(
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
				// Page Titles Accordion
				array(
					'id'           => 'for_typography_headings_page_section',
					'control_type' => 'Inspiro_Customize_Accordion_UI_Control',
					'args'         => array(
						'label'            => __( 'Page Titles', 'inspiro' ),
						'section'          => 'inspiro_typography_section_headings',
						'settings'         => array(),
						'controls_to_wrap' => 5,
					),
				),
				array(
					'id'           => 'page-title-font-size',
					'control_type' => 'Inspiro_Customize_Responsive_Range_Control',
					'args'         => array(
						'label'           => __( 'Font Size (px)', 'inspiro' ),
						'section'         => 'inspiro_typography_section_headings',
						'device_settings' => array(
							'tablet' => 'page-title-font-size-tablet',
							'mobile' => 'page-title-font-size-mobile',
						),
						'input_attrs'     => array(
							'min'  => 24,
							'max'  => 80,
							'step' => 1,
						),
					),
				),
				array(
					'id'               => 'page-title-font-weight',
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
					'id'   => 'page-title-text-transform',
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
					'id'           => 'page-title-line-height',
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
				array(
					'id'           => 'page-title-text-align',
					'control_type' => 'Inspiro_Customize_Alignment_Control',
					'args'         => array(
						'label'   => __( 'Text Alignment', 'inspiro' ),
						'section' => 'inspiro_typography_section_headings',
						'choices' => array(
							'left'   => __( 'Left', 'inspiro' ),
							'center' => __( 'Center', 'inspiro' ),
							'right'  => __( 'Right', 'inspiro' ),
						),
					),
				),
				// H1 Content Headings Accordion
				array(
					'id'           => 'for_typography_headings_h1_content_section',
					'control_type' => 'Inspiro_Customize_Accordion_UI_Control',
					'args'         => array(
						'label'            => __( 'Heading 1 (H1)', 'inspiro' ),
						'section'          => 'inspiro_typography_section_headings',
						'settings'         => array(),
						'controls_to_wrap' => 4,
					),
				),
				array(
					'id'           => 'h1-content-font-size',
					'control_type' => 'Inspiro_Customize_Responsive_Range_Control',
					'args'         => array(
						'label'           => __( 'Font Size (px)', 'inspiro' ),
						'section'         => 'inspiro_typography_section_headings',
						'device_settings' => array(
							'tablet' => 'h1-content-font-size-tablet',
							'mobile' => 'h1-content-font-size-mobile',
						),
						'input_attrs'     => array(
							'min'  => 24,
							'max'  => 80,
							'step' => 1,
						),
					),
				),
				array(
					'id'               => 'h1-content-font-weight',
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
					'id'   => 'h1-content-text-transform',
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
					'id'           => 'h1-content-line-height',
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
				// H2 Accordion
				array(
					'id'           => 'for_typography_headings_h2_section',
					'control_type' => 'Inspiro_Customize_Accordion_UI_Control',
					'args'         => array(
						'label'            => __( 'Heading 2 (H2)', 'inspiro' ),
						'section'          => 'inspiro_typography_section_headings',
						'settings'         => array(),
						'controls_to_wrap' => 4,
					),
				),
				// H2 Controls
				array(
					'id'           => 'heading2-font-size',
					'control_type' => 'Inspiro_Customize_Range_Control',
					'args'         => array(
						'label'       => __( 'H2 Font Size (px)', 'inspiro' ),
						'section'     => 'inspiro_typography_section_headings',
						'input_attrs' => array(
							'min'  => 14,
							'max'  => 60,
							'step' => 1,
						),
					),
				),
				array(
					'id'               => 'heading2-font-weight',
					'args'             => array(
						'label'   => __( 'H2 Font Weight', 'inspiro' ),
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
					'id'   => 'heading2-text-transform',
					'args' => array(
						'label'   => __( 'H2 Text Transform', 'inspiro' ),
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
					'id'           => 'heading2-line-height',
					'control_type' => 'Inspiro_Customize_Range_Control',
					'args'         => array(
						'label'       => __( 'H2 Line Height', 'inspiro' ),
						'section'     => 'inspiro_typography_section_headings',
						'input_attrs' => array(
							'min'  => 1,
							'max'  => 2,
							'step' => 0.1,
						),
					),
				),
				// H3 Accordion
				array(
					'id'           => 'for_typography_headings_h3_section',
					'control_type' => 'Inspiro_Customize_Accordion_UI_Control',
					'args'         => array(
						'label'            => __( 'Heading 3 (H3)', 'inspiro' ),
						'section'          => 'inspiro_typography_section_headings',
						'settings'         => array(),
						'controls_to_wrap' => 4,
					),
				),
				// H3 Controls
				array(
					'id'           => 'heading3-font-size',
					'control_type' => 'Inspiro_Customize_Range_Control',
					'args'         => array(
						'label'       => __( 'H3 Font Size (px)', 'inspiro' ),
						'section'     => 'inspiro_typography_section_headings',
						'input_attrs' => array(
							'min'  => 14,
							'max'  => 50,
							'step' => 1,
						),
					),
				),
				array(
					'id'               => 'heading3-font-weight',
					'args'             => array(
						'label'   => __( 'H3 Font Weight', 'inspiro' ),
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
					'id'   => 'heading3-text-transform',
					'args' => array(
						'label'   => __( 'H3 Text Transform', 'inspiro' ),
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
					'id'           => 'heading3-line-height',
					'control_type' => 'Inspiro_Customize_Range_Control',
					'args'         => array(
						'label'       => __( 'H3 Line Height', 'inspiro' ),
						'section'     => 'inspiro_typography_section_headings',
						'input_attrs' => array(
							'min'  => 1,
							'max'  => 2,
							'step' => 0.1,
						),
					),
				),
				// H4 Accordion
				array(
					'id'           => 'for_typography_headings_h4_section',
					'control_type' => 'Inspiro_Customize_Accordion_UI_Control',
					'args'         => array(
						'label'            => __( 'Heading 4 (H4)', 'inspiro' ),
						'section'          => 'inspiro_typography_section_headings',
						'settings'         => array(),
						'controls_to_wrap' => 4,
					),
				),
				// H4 Controls
				array(
					'id'           => 'heading4-font-size',
					'control_type' => 'Inspiro_Customize_Range_Control',
					'args'         => array(
						'label'       => __( 'H4 Font Size (px)', 'inspiro' ),
						'section'     => 'inspiro_typography_section_headings',
						'input_attrs' => array(
							'min'  => 12,
							'max'  => 30,
							'step' => 1,
						),
					),
				),
				array(
					'id'               => 'heading4-font-weight',
					'args'             => array(
						'label'   => __( 'H4 Font Weight', 'inspiro' ),
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
					'id'   => 'heading4-text-transform',
					'args' => array(
						'label'   => __( 'H4 Text Transform', 'inspiro' ),
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
					'id'           => 'heading4-line-height',
					'control_type' => 'Inspiro_Customize_Range_Control',
					'args'         => array(
						'label'       => __( 'H4 Line Height', 'inspiro' ),
						'section'     => 'inspiro_typography_section_headings',
						'input_attrs' => array(
							'min'  => 1,
							'max'  => 2,
							'step' => 0.1,
						),
					),
				),
				// H5 Accordion
				array(
					'id'           => 'for_typography_headings_h5_section',
					'control_type' => 'Inspiro_Customize_Accordion_UI_Control',
					'args'         => array(
						'label'            => __( 'Heading 5 (H5)', 'inspiro' ),
						'section'          => 'inspiro_typography_section_headings',
						'settings'         => array(),
						'controls_to_wrap' => 4,
					),
				),
				// H5 Controls
				array(
					'id'           => 'heading5-font-size',
					'control_type' => 'Inspiro_Customize_Range_Control',
					'args'         => array(
						'label'       => __( 'H5 Font Size (px)', 'inspiro' ),
						'section'     => 'inspiro_typography_section_headings',
						'input_attrs' => array(
							'min'  => 10,
							'max'  => 24,
							'step' => 1,
						),
					),
				),
				array(
					'id'               => 'heading5-font-weight',
					'args'             => array(
						'label'   => __( 'H5 Font Weight', 'inspiro' ),
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
					'id'   => 'heading5-text-transform',
					'args' => array(
						'label'   => __( 'H5 Text Transform', 'inspiro' ),
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
					'id'           => 'heading5-line-height',
					'control_type' => 'Inspiro_Customize_Range_Control',
					'args'         => array(
						'label'       => __( 'H5 Line Height', 'inspiro' ),
						'section'     => 'inspiro_typography_section_headings',
						'input_attrs' => array(
							'min'  => 1,
							'max'  => 2,
							'step' => 0.1,
						),
					),
				),
				// H6 Accordion
				array(
					'id'           => 'for_typography_headings_h6_section',
					'control_type' => 'Inspiro_Customize_Accordion_UI_Control',
					'args'         => array(
						'label'            => __( 'Heading 6 (H6)', 'inspiro' ),
						'section'          => 'inspiro_typography_section_headings',
						'settings'         => array(),
						'controls_to_wrap' => 4,
					),
				),
				// H6 Controls
				array(
					'id'           => 'heading6-font-size',
					'control_type' => 'Inspiro_Customize_Range_Control',
					'args'         => array(
						'label'       => __( 'H6 Font Size (px)', 'inspiro' ),
						'section'     => 'inspiro_typography_section_headings',
						'input_attrs' => array(
							'min'  => 10,
							'max'  => 20,
							'step' => 1,
						),
					),
				),
				array(
					'id'               => 'heading6-font-weight',
					'args'             => array(
						'label'   => __( 'H6 Font Weight', 'inspiro' ),
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
					'id'   => 'heading6-text-transform',
					'args' => array(
						'label'   => __( 'H6 Text Transform', 'inspiro' ),
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
					'id'           => 'heading6-line-height',
					'control_type' => 'Inspiro_Customize_Range_Control',
					'args'         => array(
						'label'       => __( 'H6 Line Height', 'inspiro' ),
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
