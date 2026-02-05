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
class Inspiro_Blog_Layout_Config {

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

		$wp_customize->add_setting(
			'blog_layout',
			array(
				'default'           => 'list',
				'sanitize_callback' => 'inspiro_sanitize_blog_layout',
				'transport'         => 'refresh',
			)
		);


		$wp_customize->add_control(
			new Inspiro_Customize_Image_Select_Control(
				$wp_customize,
				'blog_layout',
				array(
					'priority'      => 1,
					'section' => 'blog_page_section',
					'label' => __('Choose blog list layout', 'inspiro'),
					'grid' => true,
					'description' => __('This setting will also apply to all post archive pages, such as categories, tags, dates, and authors.', 'inspiro'),
					'choices'     => array(
						'list' => array(
							'label' => esc_html__('List view', 'inspiro'),
							'url' => '%sblog-list.png',
						),
						'grid' => array(
							'label' => esc_html__('Grid view', 'inspiro'),
							'url' => '%sblog-grid.png'
						),
					)
				)
			)
		);
	}
}
new Inspiro_Blog_Layout_Config();
