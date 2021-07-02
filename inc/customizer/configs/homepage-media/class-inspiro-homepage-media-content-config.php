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
 * PHP Class for Registering Customizer Confugration
 *
 * @since 1.3.0
 */
class Inspiro_Homepage_Media_Content_Config {
	/**
	 * Constructor
	 */
	public function __construct() {
		add_action( 'inspiro/customize_register', array( $this, 'register_configuration' ) );
	}

	/**
	 * Configurations
	 *
	 * @since 1.4.0 Store configurations to class method.
	 * @return array
	 */
	public static function config() {
		return array(
			'section' => array(
				'id'   => 'header_content',
				'args' => array(
					'title'          => esc_html__( 'Content', 'inspiro' ),
					'theme_supports' => 'custom-header',
					'priority'       => 70,
					'panel'          => 'homepage_media_panel',
				),
			),
			'setting' => array(
				array(
					'id'   => 'header_site_title',
					'args' => array(
						'default'           => get_bloginfo( 'name' ),
						'transport'         => 'postMessage',
						'sanitize_callback' => 'sanitize_text_field',
					),
				),
				array(
					'id'   => 'header_site_description',
					'args' => array(
						'default'           => get_bloginfo( 'description' ),
						'transport'         => 'postMessage',
						'sanitize_callback' => 'sanitize_textarea_field',
					),
				),
				array(
					'id'   => 'header_button_title',
					'args' => array(
						'theme_supports'    => 'custom-header',
						'default'           => '',
						'transport'         => 'postMessage',
						'sanitize_callback' => 'sanitize_text_field',
					),
				),
				array(
					'id'   => 'header_button_url',
					'args' => array(
						'theme_supports'    => 'custom-header',
						'default'           => '',
						'transport'         => 'refresh',
						'sanitize_callback' => 'inspiro_sanitize_header_button_url',
					),
				),
				array(
					'id'   => 'header_button_link_open',
					'args' => array(
						'capability'        => 'edit_theme_options',
						'default'           => true,
						'sanitize_callback' => 'inspiro_sanitize_checkbox',
					),
				),
			),
			'control' => array(
				array(
					'id'   => 'header_site_title',
					'args' => array(
						'theme_supports'  => array( 'custom-header' ),
						'type'            => 'text',
						'label'           => esc_html__( 'Header Title', 'inspiro' ),
						'description'     => esc_html__( 'Enter a site title which appears in the header on front-page', 'inspiro' ),
						'section'         => 'header_content',
						'priority'        => 1,
						'active_callback' => 'is_header_video_active',
					),
				),
				array(
					'id'   => 'header_site_description',
					'args' => array(
						'theme_supports'  => array( 'custom-header' ),
						'type'            => 'textarea',
						'label'           => esc_html__( 'Header Description', 'inspiro' ),
						'description'     => esc_html__( 'Enter a site description which appears in the header on front-page', 'inspiro' ),
						'section'         => 'header_content',
						'priority'        => 1,
						'active_callback' => 'is_header_video_active',
					),
				),
				array(
					'id'   => 'header_button_title',
					'args' => array(
						'theme_supports'  => 'custom-header',
						'type'            => 'text',
						'label'           => esc_html__( 'Header Button Title', 'inspiro' ),
						'description'     => esc_html__( 'Enter a title for Header Button', 'inspiro' ),
						'section'         => 'header_content',
						'active_callback' => 'is_header_video_active',
					),
				),
				array(
					'id'   => 'header_button_url',
					'args' => array(
						'theme_supports'  => 'custom-header',
						'type'            => 'url',
						'label'           => esc_html__( 'Header Button URL', 'inspiro' ),
						'description'     => esc_html__( 'Enter a Button URL:', 'inspiro' ),
						'section'         => 'header_content',
						'active_callback' => 'is_header_video_active',
					),
				),
				array(
					'id'   => 'header_button_link_open',
					'args' => array(
						'type'    => 'checkbox',
						'section' => 'header_content',
						'label'   => esc_html__( 'Open link on new tab', 'inspiro' ),
					),
				),
			),
		);
	}

	/**
	 * Register configurations
	 *
	 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
	 * @return void
	 */
	public function register_configuration( $wp_customize ) {
		$configs = self::config();

		$wp_customize->add_section(
			$configs['section']['id'],
			$configs['section']['args']
		);

		$wp_customize->add_setting(
			$configs['setting'][0]['id'],
			$configs['setting'][0]['args']
		);

		$wp_customize->add_setting(
			$configs['setting'][1]['id'],
			$configs['setting'][1]['args']
		);

		$wp_customize->add_setting(
			$configs['setting'][2]['id'],
			$configs['setting'][2]['args']
		);

		$wp_customize->add_setting(
			$configs['setting'][3]['id'],
			$configs['setting'][3]['args']
		);

		$wp_customize->add_setting(
			$configs['setting'][4]['id'],
			$configs['setting'][4]['args']
		);

		$wp_customize->add_control(
			$configs['control'][0]['id'],
			$configs['control'][0]['args']
		);

		$wp_customize->add_control(
			$configs['control'][1]['id'],
			$configs['control'][1]['args']
		);

		$wp_customize->add_control(
			$configs['control'][2]['id'],
			$configs['control'][2]['args']
		);

		$wp_customize->add_control(
			$configs['control'][3]['id'],
			$configs['control'][3]['args']
		);

		$wp_customize->add_control(
			$configs['control'][4]['id'],
			$configs['control'][4]['args']
		);
	}
}

new Inspiro_Homepage_Media_Content_Config();
