<?php
/**
 * Inspiro Lite: Adds the Page Settings section to the Customizer
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 2.2.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * PHP Class for Registering Customizer Configuration
 *
 * @since 2.2.1
 */
class Inspiro_Page_Settings_Config {
	/**
	 * Configurations
	 *
	 * @return array
	 */
	public static function config() {
		return array(
			'section' => array(
				array(
					'id'   => 'page_settings_section',
					'args' => array(
						'title'    => esc_html__( 'Page Settings', 'inspiro' ),
						'priority' => 52,
					),
				),
			),
			'setting' => array(
				array(
					'id'   => 'display_page_featured_image',
					'args' => array(
						'default'           => true,
						'sanitize_callback' => 'inspiro_sanitize_checkbox',
						'transport'         => 'refresh',
					),
				),
				array(
					'id'   => 'cover-size',
					'args' => array(
						'default'           => 'cover_fixed_height',
						'sanitize_callback' => 'sanitize_key',
						'transport'         => 'refresh',
					),
				),
			),
			'control' => array(
				array(
					'id'   => 'display_page_featured_image',
					'args' => array(
						'priority'    => 1,
						'label'       => esc_html__( 'Display Featured Image in Page Header', 'inspiro' ),
						'description' => esc_html__( 'Show the Featured Image as a banner at the top of pages that use the Default page template. Disable this if you only set Featured Images for SEO and social sharing and don\'t want them displayed. You can also hide it for a single page from the page editor (Page Settings panel).', 'inspiro' ),
						'section'     => 'page_settings_section',
						'type'        => 'checkbox',
					),
				),
				array(
					'id'   => 'cover-size',
					'args' => array(
						'priority' => 2,
						'label'    => esc_html__( 'Featured Image Height in Posts and Pages', 'inspiro' ),
						'section'  => 'page_settings_section',
						'type'     => 'radio',
						'choices'  => array(
							'cover_fixed_height' => esc_html__( 'Fixed height', 'inspiro' ),
							'cover_fullscreen'   => esc_html__( 'Fullscreen', 'inspiro' ),
						),
					),
				),
			),
		);
	}
}
