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
class Inspiro_Footer_Widget_Areas_Config {

	/**
	 * Constructor
	 */
	public function __construct() {
		add_action( 'customize_register', array( $this, 'register_configuration' ), 10 );
	}

	/**
	 * Register configurations
	 *
	 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
	 * @return void
	 */
	public function register_configuration( $wp_customize ) {

		// Create sections
		$wp_customize->add_section(
			'footer-area',
			array(
				'title'    => esc_html__( 'Footer', 'inspiro' ),
				'priority' => 130, // Before Additional CSS.
			)
		);

		$wp_customize->add_setting(
			'footer-widget-areas',
			array(
				'default'           => 3,
				'sanitize_callback' => 'absint',
				'transport'         => 'refresh',
			)
		);

		$wp_customize->add_control(
			new Inspiro_Customize_Accordion_UI_Control(
				$wp_customize,
				'for_footer_widget_areas',
				array(
					'type' => 'accordion-section-ui-wrapper',
					'label' => __('Footer Layout', 'inspiro'),
					'settings' => array(),
					'section' => 'footer-area',
					'expanded' => false,
					'controls_to_wrap' => 2,
				)
			)
		);

		$wp_customize->add_control(
			new Inspiro_Customize_Image_Select_Control(
				$wp_customize,
				'footer-widget-areas',
				array(
					'section' => 'footer-area',
					'description' => __('Select a layout', 'inspiro'),
					'choices'     => array(
						array(
							'label' => __( 'Don\'t display Widgets', 'inspiro' ),
							'url'   => '%sfooter-no-widgets.png'
						),
						array(
							'label' => esc_html__( 'One Column', 'inspiro' ),
							'url'   => '%sfooter-one-column.png'
						),
						array(
							'label' => esc_html__( 'Two Columns', 'inspiro' ),
							'url'   => '%sfooter-two-columns.png'
						),
						array(
							'label' => esc_html__( 'Three Columns', 'inspiro' ),
							'url'   => '%sfooter-three-columns.png'
						),
						array(
							'label' => esc_html__( 'Four Columns', 'inspiro' ),
							'url'   => '%sfooter-four-columns.png'
						)
					)
				)
			)
		);

		$wp_customize->add_setting(
			'footer-pro-styles',
			array(
				'default' => null,
				'sanitize_callback' => 'sanitize_key',
			)
		);

		$wp_customize->add_setting(
			'footer_builder_upgrade',
			array(
				'default' => null,
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			new Inspiro_Customize_Promo_Pro_Control(
				$wp_customize,
				'footer-pro-styles',
				array(
					'label'           => esc_html__( 'PRO', 'inspiro' ),
					'section'         => 'footer-area',
					'choices'     => array(
						array(
							'label' => esc_html__( 'Footer Pro', 'inspiro' ),
							'url'   => '%sfooter-pro.png',
						),
						array(
							'label' => esc_html__( 'Footer Pro', 'inspiro' ),
							'url'   => '%sfooter-pro-2.png',
						),
						array(
							'label' => esc_html__( 'Footer Pro', 'inspiro' ),
							'url'   => '%sfooter-pro-3.png',
						),
						array(
							'label' => esc_html__( 'Footer Pro', 'inspiro' ),
							'url'   => '%sfooter-pro-4.png',
						),
					)
				)
			)
		);

		$wp_customize->add_control(
			new Inspiro_Customize_Title_Control(
				$wp_customize,
				'footer_builder_upgrade',
				array(
					'label'       => esc_html__( 'Footer Builder Pro Features', 'inspiro' ),
					'description' => esc_html__( 'Inspiro Lite includes a limited Footer Builder. Upgrade to Inspiro Premium to unlock additional rows, modules, and advanced layout controls.', 'inspiro' ),
					'pro_text'    => esc_html__( 'Unlock Full Footer Builder', 'inspiro' ),
					'pro_url'     => 'https://www.wpzoom.com/themes/inspiro-lite/upgrade/?utm_source=wpadmin&utm_medium=customizer&utm_campaign=footerbuilder',
					'section'     => 'footer-area',
				)
			)
		);

		$wp_customize->add_setting(
			'footer_rows_layout_accordion',
			array(
				'default'           => null,
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			new Inspiro_Customize_Accordion_UI_Control(
				$wp_customize,
				'footer_rows_layout_accordion',
				array(
					'type'             => 'accordion-section-ui-wrapper',
					'label'            => esc_html__( 'Footer Row Layouts', 'inspiro' ),
					'settings'         => array(),
					'section'          => 'footer-area',
					'accordion'        => true,
					'controls_to_wrap' => 1,
				)
			)
		);

		$wp_customize->add_setting(
			'footer_rows_layout_primary_pro',
			array(
				'default'           => '',
				'sanitize_callback' => '__return_empty_string',
			)
		);

		$proportion_layouts = array(
			array( 1, 1, 1 ),
			array( 2, 1, 1 ),
			array( 1, 2, 1 ),
			array( 1, 1, 2 ),
		);

		$columns_html = '';
		foreach ( array( 1, 2, 3, 4 ) as $col ) {
			$columns_html .= '<span class="ihb-row-layouts-pro-column">' . (int) $col . '</span>';
		}

		$proportions_html = '';
		foreach ( $proportion_layouts as $layout ) {
			$proportions_html .= '<span class="ihb-row-layouts-pro-option" aria-hidden="true"><span class="ihb-row-layouts-pro-preview">';
			foreach ( $layout as $flex ) {
				$proportions_html .= '<span style="flex:' . (int) $flex . '"></span>';
			}
			$proportions_html .= '</span></span>';
		}

		$description = '<div class="ihb-row-layouts-pro-lock" aria-disabled="true">'
			. '<div class="ihb-row-layouts-pro-heading">' . esc_html__( 'PRIMARY ROW', 'inspiro' ) . '</div>'
			. '<div class="ihb-row-layouts-pro-field">'
			. '<div class="ihb-row-layouts-pro-label">' . esc_html__( 'Number of Columns', 'inspiro' ) . '</div>'
			. '<div class="ihb-row-layouts-pro-columns">' . $columns_html . '</div>'
			. '</div>'
			. '<div class="ihb-row-layouts-pro-field ihb-row-layouts-pro-field-last">'
			. '<div class="ihb-row-layouts-pro-label">' . esc_html__( 'Column Proportions', 'inspiro' ) . '</div>'
			. '<div class="ihb-row-layouts-pro-picker">' . $proportions_html . '</div>'
			. '</div>'
			. '<div class="ihb-row-layouts-pro-lock-footer">'
			. '<span class="ihb-row-layouts-pro-lock-icon" aria-hidden="true">'
			. '<svg class="ihb-row-layouts-pro-lock-svg" width="12" height="12" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7 11V7a5 5 0 0 1 10 0v4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path><rect x="3" y="11" width="18" height="11" rx="2" ry="2" stroke="currentColor" stroke-width="2" fill="none"></rect></svg>'
			. '</span>'
			. '<span class="ihb-row-layouts-pro-lock-text">' . esc_html__( 'Available in Inspiro Premium', 'inspiro' ) . '</span>'
			. '</div>'
			. '</div>';

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'footer_rows_layout_primary_pro',
				array(
					'section'     => 'footer-area',
					'type'        => 'hidden',
					'description' => $description,
				)
			)
		);
	}
}
new Inspiro_Footer_Widget_Areas_Config();
