<?php
/**
 * Inspiro Lite: Breadcrumbs configuration.
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Registers the Breadcrumbs customizer section and its controls.
 *
 * The breadcrumb trail itself is provided by inc/breadcrumbs.php — a port
 * of the Justin Tadlock breadcrumb library used by Prisma Core.
 *
 * @since 2.2.0
 */
class Inspiro_Breadcrumbs_Config {

	/**
	 * Configuration array consumed by Inspiro_Customizer_Control_Base.
	 *
	 * @return array
	 */
	public static function config() {
		return array(
			'section' => array(
				'id'   => 'inspiro_breadcrumbs',
				'args' => array(
					'title'       => esc_html__( 'Breadcrumbs', 'inspiro' ),
					'description' => esc_html__( 'A breadcrumb trail with Schema.org markup. Defers to Yoast SEO, SEOPress, or Rank Math if any of them is active.', 'inspiro' ),
					'priority'    => 130,
					'capability'  => 'edit_theme_options',
				),
			),
			'setting' => array(
				array(
					'id'   => 'breadcrumbs_enable',
					'args' => array(
						'default'           => false,
						'sanitize_callback' => 'inspiro_sanitize_checkbox',
						'transport'         => 'refresh',
					),
				),
				array(
					'id'   => 'breadcrumbs_show_on_home',
					'args' => array(
						'default'           => false,
						'sanitize_callback' => 'inspiro_sanitize_checkbox',
						'transport'         => 'refresh',
					),
				),
				array(
					'id'   => 'breadcrumbs_separator',
					'args' => array(
						'default'           => '/',
						'sanitize_callback' => 'sanitize_text_field',
						'transport'         => 'postMessage',
					),
				),
			),
			'control' => array(
				array(
					'id'   => 'breadcrumbs_enable',
					'args' => array(
						'label'       => esc_html__( 'Enable Breadcrumbs', 'inspiro' ),
						'description' => esc_html__( 'Auto-inserts a breadcrumb trail above the content on posts, pages, and archives.', 'inspiro' ),
						'section'     => 'inspiro_breadcrumbs',
						'type'        => 'checkbox',
					),
				),
				array(
					'id'   => 'breadcrumbs_show_on_home',
					'args' => array(
						'label'           => esc_html__( 'Show on front page', 'inspiro' ),
						'section'         => 'inspiro_breadcrumbs',
						'type'            => 'checkbox',
						'active_callback' => 'inspiro_is_breadcrumbs_enabled',
					),
				),
				array(
					'id'   => 'breadcrumbs_separator',
					'args' => array(
						'label'           => esc_html__( 'Separator character', 'inspiro' ),
						'description'     => esc_html__( 'Examples: /  →  »  ·', 'inspiro' ),
						'section'         => 'inspiro_breadcrumbs',
						'type'            => 'text',
						'active_callback' => 'inspiro_is_breadcrumbs_enabled',
					),
				),
			),
		);
	}
}
