<?php
/**
 * Inspiro Lite: Adds settings, sections, controls to Customizer
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 2.1.9
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * PHP Class for Registering Customizer Configuration
 *
 * @since 2.1.9
 */
class Inspiro_Blog_Text_Align_Config {

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
			'blog_text_align',
			array(
				'default'           => 'center',
				'sanitize_callback' => 'inspiro_sanitize_text_align',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			new Inspiro_Customize_Alignment_Control(
				$wp_customize,
				'blog_text_align',
				array(
					'priority' => 2,
					'section'  => 'blog_post_options',
					'label'    => __( 'Text Alignment', 'inspiro' ),
				)
			)
		);
	}
}
new Inspiro_Blog_Text_Align_Config();
