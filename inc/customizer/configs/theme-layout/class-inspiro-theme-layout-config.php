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
class Inspiro_Theme_Layout_Config {
	/**
	 * Configurations
	 *
	 * @since 1.4.0 Store configurations to class method.
	 * @return array
	 */
	public static function config() {
		return array(
			'section' => array(
				'id'   => 'theme_layout',
				'args' => array(
					'title'       => esc_html__( 'Theme Layout', 'inspiro' ),
					'description' => sprintf( __( 'If you want to display the Sidebar on the right, please make sure to add some widgets to the %s', 'inspiro' ), '<a href="javascript:wp.customize.panel( \'widgets\' ).focus();" title="Open Widgets Panel">' . __( 'Blog Sidebar', 'inspiro' ) . '</a>' ), // phpcs:ignore WordPress.WP.I18n.MissingTranslatorsComment
					'priority'    => 50,
					'capability'  => 'edit_theme_options',
				),
			),
			'setting' => array(
				array(
					'id'   => 'layout_blog_page',
					'args' => array(
						'default'           => 'full',
						'sanitize_callback' => 'inspiro_sanitize_page_layout',
						'transport'         => 'refresh',
					),
				),
				array(
					'id'   => 'layout_single_post',
					'args' => array(
						'default'           => 'full',
						'sanitize_callback' => 'inspiro_sanitize_page_layout',
						'transport'         => 'refresh',
					),
				),
				array(
					'id'   => 'container_width',
					'args' => array(
						'default'           => 1200,
						'sanitize_callback' => 'absint',
						'transport'         => 'postMessage',
					),
				),
				array(
					'id'   => 'container_width_narrow',
					'args' => array(
						'default'           => 950,
						'sanitize_callback' => 'absint',
						'transport'         => 'postMessage',
					),
				),
				array(
					'id'   => 'container_width_elementor',
					'args' => array(
						'default'           => false,
						'sanitize_callback' => 'inspiro_sanitize_checkbox',
						'transport'         => 'postMessage',
					),
				),
			),
			'control' => array(
				array(
					'id'   => 'layout_blog_page',
					'args' => array(
						'label'           => esc_html__( 'Blog Layout', 'inspiro' ),
						'section'         => 'theme_layout',
						'type'            => 'radio',
						'choices'         => array(
							'full'       => esc_html__( 'Full width', 'inspiro' ),
							'side-right' => esc_html__( 'Sidebar on the right', 'inspiro' ),
						),
						'active_callback' => 'inspiro_is_view_with_layout_option',
					),
				),
				array(
					'id'   => 'layout_single_post',
					'args' => array(
						'label'           => esc_html__( 'Single Post Layout', 'inspiro' ),
						'section'         => 'theme_layout',
						'type'            => 'radio',
						'choices'         => array(
							'full'       => esc_html__( 'Full width', 'inspiro' ),
							'side-right' => esc_html__( 'Sidebar on the right', 'inspiro' ),
						),
						'active_callback' => 'inspiro_is_view_with_layout_option',
					),
				),
				array(
					'id'                => 'container_width',
					'control_type'      => 'Inspiro_Customize_Range_Control',
					'args'              => array(
						'label'       => esc_html__( 'Default Container Width (px)', 'inspiro' ),
						'description' => esc_html__( 'Controls the width of main content containers and block editor content width. Default: 1200px', 'inspiro' ),
						'section'     => 'theme_layout',
						'input_attrs' => array(
							'min'  => 600,
							'max'  => 1600,
							'step' => 10,
						),
						'priority'    => 15,
					),
				),
				array(
					'id'   => 'container_width_elementor',
					'args' => array(
						'label'       => esc_html__( 'Apply container width to Elementor pages', 'inspiro' ),
						'description' => esc_html__( '⚠️ Warning: This will override the width of boxed containers in your existing Elementor pages. When enabled, boxed containers in Elementor will use the same width as set above, ensuring alignment with your theme\'s layout.', 'inspiro' ),
						'section'     => 'theme_layout',
						'type'        => 'checkbox',
						'priority'    => 16,
					),
				),
				array(
					'id'                => 'container_width_narrow',
					'control_type'      => 'Inspiro_Customize_Range_Control',
					'args'              => array(
						'label'       => esc_html__( 'Narrow Container Width (px)', 'inspiro' ),
						'description' => esc_html__( 'Controls the width of narrow content containers (used in posts and pages). Default: 950px', 'inspiro' ),
						'section'     => 'theme_layout',
						'input_attrs' => array(
							'min'  => 600,
							'max'  => 1400,
							'step' => 10,
						),
						'priority'    => 17,
					),
				),
			),
		);
	}
}
