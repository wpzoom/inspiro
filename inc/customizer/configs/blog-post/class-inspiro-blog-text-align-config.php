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
					'section'  => 'blog_page_section',
					'label'    => __( 'Text Alignment', 'inspiro' ),
				)
			)
		);

		// Show/Hide Post Meta.
		$wp_customize->add_setting(
			'blog_show_post_meta',
			array(
				'default'           => true,
				'sanitize_callback' => 'inspiro_sanitize_checkbox',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			'blog_show_post_meta',
			array(
				'priority' => 3,
				'section'  => 'blog_page_section',
				'label'    => __( 'Show Post Meta', 'inspiro' ),
				'type'     => 'checkbox',
			)
		);

		// Show/Hide Excerpt (for grid layout).
		$wp_customize->add_setting(
			'blog_show_excerpt',
			array(
				'default'           => true,
				'sanitize_callback' => 'inspiro_sanitize_checkbox',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			'blog_show_excerpt',
			array(
				'priority'        => 4,
				'section'         => 'blog_page_section',
				'label'           => __( 'Show Excerpt', 'inspiro' ),
				'type'            => 'checkbox',
				'active_callback' => 'inspiro_is_blog_layout_grid',
			)
		);

		// Featured Image Size.
		$wp_customize->add_setting(
			'blog_thumbnail_size',
			array(
				'default'           => 'inspiro-loop',
				'sanitize_callback' => 'inspiro_sanitize_image_size',
				'transport'         => 'refresh',
			)
		);

		$wp_customize->add_control(
			'blog_thumbnail_size',
			array(
				'priority'    => 5,
				'section'     => 'blog_page_section',
				'label'       => __( 'Featured Image Size', 'inspiro' ),
				'type'        => 'select',
				'choices'     => inspiro_get_image_sizes_choices(),
				'description' => sprintf(
					/* translators: %s: link to regenerate thumbnails documentation */
					__( 'If images don\'t appear correctly cropped, you may need to <a href="%s" target="_blank">regenerate thumbnails</a>.', 'inspiro' ),
					'https://wp.md/regenerate'
				),
			)
		);
	}
}
new Inspiro_Blog_Text_Align_Config();
