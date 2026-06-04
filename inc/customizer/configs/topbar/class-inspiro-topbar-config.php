<?php
/**
 * Inspiro Lite: Topbar configuration.
 *
 * Registers the topbar's settings + controls inside the existing "Header"
 * section as a collapsible accordion group, matching Inspiro's native pattern.
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Inspiro_Topbar_Config' ) ) {

	/**
	 * Topbar customizer config.
	 *
	 * Uses the constructor + register_configuration pattern (same as
	 * Inspiro_Header_Area_Config) rather than the static config() array so we
	 * can register an accordion UI wrapper for the controls.
	 *
	 * @since 2.2.0
	 */
	class Inspiro_Topbar_Config {

		/**
		 * Constructor.
		 */
		public function __construct() {
			// Priority 11 — after Inspiro_Header_Area_Config (priority 10) so the
			// header-area section already exists when we attach to it.
			add_action( 'customize_register', array( $this, 'register_configuration' ), 11 );
		}

		/**
		 * Register topbar settings + controls inside the Header section.
		 *
		 * @param WP_Customize_Manager $wp_customize Customizer manager.
		 */
		public function register_configuration( $wp_customize ) {

			// =====================================================================
			// SETTINGS
			// =====================================================================
			$wp_customize->add_setting(
				'topbar_enable',
				array(
					'default'           => false,
					'sanitize_callback' => 'inspiro_sanitize_checkbox',
					'transport'         => 'refresh',
				)
			);
			$wp_customize->add_setting(
				'topbar_left_text',
				array(
					'default'           => '',
					'sanitize_callback' => 'wp_kses_post',
					'transport'         => 'postMessage',
				)
			);
			$wp_customize->add_setting(
				'topbar_right_text',
				array(
					'default'           => '',
					'sanitize_callback' => 'wp_kses_post',
					'transport'         => 'postMessage',
				)
			);
			$wp_customize->add_setting(
				'topbar_bg_color',
				array(
					'default'           => '#000000',
					'sanitize_callback' => 'maybe_hash_hex_color', // accepts hex or rgba pass-through
					'transport'         => 'postMessage',
				)
			);
			$wp_customize->add_setting(
				'topbar_text_color',
				array(
					'default'           => '#ffffff',
					'sanitize_callback' => 'sanitize_hex_color',
					'transport'         => 'postMessage',
				)
			);
			$wp_customize->add_setting(
				'topbar_link_color',
				array(
					'default'           => '#ffffff',
					'sanitize_callback' => 'sanitize_hex_color',
					'transport'         => 'postMessage',
				)
			);

			// =====================================================================
			// ACCORDION WRAPPER + CONTROLS (inside the Header section)
			// =====================================================================
			$wp_customize->add_control(
				new Inspiro_Customize_Accordion_UI_Control(
					$wp_customize,
					'for_topbar_accordion',
					array(
						'type'             => 'accordion-section-ui-wrapper',
						'label'            => esc_html__( 'Topbar', 'inspiro' ),
						'description'      => esc_html__( 'An optional thin bar above the header for contact info, secondary links, or short announcements.', 'inspiro' ),
						'settings'         => array(),
						'section'          => 'header-area',
						'accordion'        => true,
						'expanded'         => false,
						'controls_to_wrap' => 6,
						'priority'         => 5,
					)
				)
			);

			$wp_customize->add_control(
				'topbar_enable',
				array(
					'label'    => esc_html__( 'Enable Topbar', 'inspiro' ),
					'section'  => 'header-area',
					'type'     => 'checkbox',
					'priority' => 6,
				)
			);

			$wp_customize->add_control(
				'topbar_left_text',
				array(
					'label'           => esc_html__( 'Left Content (HTML allowed)', 'inspiro' ),
					'description'     => esc_html__( 'Example: <a href="tel:+1234567890">Call us: +1 234 567 890</a>', 'inspiro' ),
					'section'         => 'header-area',
					'type'            => 'textarea',
					'active_callback' => 'inspiro_is_topbar_enabled',
					'priority'        => 7,
				)
			);

			$wp_customize->add_control(
				'topbar_right_text',
				array(
					'label'           => esc_html__( 'Right Content (HTML allowed)', 'inspiro' ),
					'section'         => 'header-area',
					'type'            => 'textarea',
					'active_callback' => 'inspiro_is_topbar_enabled',
					'priority'        => 8,
				)
			);

			$wp_customize->add_control(
				new Inspiro_Customize_Alpha_Color_Picker_Control(
					$wp_customize,
					'topbar_bg_color',
					array(
						'label'           => esc_html__( 'Background Color', 'inspiro' ),
						'description'     => esc_html__( 'Supports transparency — pick a color and adjust the alpha slider.', 'inspiro' ),
						'section'         => 'header-area',
						'active_callback' => 'inspiro_is_topbar_enabled',
						'priority'        => 9,
					)
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'topbar_text_color',
					array(
						'label'           => esc_html__( 'Text Color', 'inspiro' ),
						'section'         => 'header-area',
						'active_callback' => 'inspiro_is_topbar_enabled',
						'priority'        => 10,
					)
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'topbar_link_color',
					array(
						'label'           => esc_html__( 'Link Color', 'inspiro' ),
						'section'         => 'header-area',
						'active_callback' => 'inspiro_is_topbar_enabled',
						'priority'        => 11,
					)
				)
			);

			// =====================================================================
			// SELECTIVE-REFRESH PARTIALS
			// =====================================================================
			if ( isset( $wp_customize->selective_refresh ) ) {
				$wp_customize->selective_refresh->add_partial(
					'topbar_left_text',
					array(
						'selector'        => '#inspiro-topbar .topbar-col--left',
						'render_callback' => 'inspiro_render_topbar_left',
					)
				);
				$wp_customize->selective_refresh->add_partial(
					'topbar_right_text',
					array(
						'selector'        => '#inspiro-topbar .topbar-col--right',
						'render_callback' => 'inspiro_render_topbar_right',
					)
				);
			}
		}
	}

	new Inspiro_Topbar_Config();
}
