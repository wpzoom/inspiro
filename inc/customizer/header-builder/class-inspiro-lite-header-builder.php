<?php
/**
 * Inspiro Lite Header Builder.
 *
 * @package Inspiro
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Inspiro_Lite_Header_Builder' ) ) {
	/**
	 * Limited Header Builder implementation for Lite.
	 */
	class Inspiro_Lite_Header_Builder {
		/**
		 * Singleton instance.
		 *
		 * @var Inspiro_Lite_Header_Builder|null
		 */
		private static $instance = null;

		/**
		 * Supported components.
		 *
		 * @var array[]
		 */
		private $components = array();

		/**
		 * Get class instance.
		 *
		 * @return Inspiro_Lite_Header_Builder
		 */
		public static function get_instance() {
			if ( null === self::$instance ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * Constructor.
		 */
		private function __construct() {
			$this->components = array(
				array(
					'id'    => 'logo',
					'label' => esc_html__( 'Site Logo', 'inspiro' ),
					'icon'  => 'dashicons-format-image',
				),
				array(
					'id'    => 'menu',
					'label' => esc_html__( 'Primary Menu', 'inspiro' ),
					'icon'  => 'dashicons-menu',
				),
				array(
					'id'    => 'search',
					'label' => esc_html__( 'Search', 'inspiro' ),
					'icon'  => 'dashicons-search',
				),
				array(
					'id'    => 'social',
					'label' => esc_html__( 'Social Icons', 'inspiro' ),
					'icon'  => 'dashicons-share',
				),
				array(
					'id'    => 'button',
					'label' => esc_html__( 'Button', 'inspiro' ),
					'icon'  => 'dashicons-admin-links',
				),
				array(
					'id'    => 'hamburger',
					'label' => esc_html__( 'Menu Toggle', 'inspiro' ),
					'icon'  => 'dashicons-menu-alt3',
				),
			);

			add_action( 'customize_register', array( $this, 'register_customizer' ), 50 );
			add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_customizer_assets' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_frontend_assets' ), 20 );
		}

		/**
		 * Register customizer settings and controls.
		 *
		 * @param WP_Customize_Manager $wp_customize Customize manager.
		 */
		public function register_customizer( $wp_customize ) {
			$wp_customize->add_setting(
				'inspiro_header_builder_enable',
				array(
					'default'           => false,
					'sanitize_callback' => 'inspiro_sanitize_checkbox',
					'transport'         => 'refresh',
				)
			);

			$wp_customize->add_control(
				'inspiro_header_builder_enable',
				array(
					'label'       => esc_html__( 'Enable Header Builder', 'inspiro' ),
					'description' => esc_html__( 'Switch from predefined header layout to drag-and-drop header builder.', 'inspiro' ),
					'section'     => 'header-area',
					'type'        => 'checkbox',
					'priority'    => 270,
				)
			);

			$wp_customize->add_setting(
				'inspiro_header_builder_header_main_header_row',
				array(
					'default'           => wp_json_encode( $this->get_default_layout() ),
					'sanitize_callback' => array( $this, 'sanitize_layout' ),
					'transport'         => 'refresh',
				)
			);

			$wp_customize->add_control(
				'inspiro_header_builder_header_main_header_row',
				array(
					'section'  => 'header-area',
					'type'     => 'hidden',
					'priority' => 271,
				)
			);
		}

		/**
		 * Enqueue Customizer assets.
		 */
		public function enqueue_customizer_assets() {
			wp_enqueue_style(
				'inspiro-lite-header-builder-customizer',
				get_template_directory_uri() . '/inc/customizer/header-builder/assets/css/header-builder-customizer.css',
				array(),
				INSPIRO_THEME_VERSION
			);

			wp_enqueue_script(
				'inspiro-lite-header-builder-customizer',
				get_template_directory_uri() . '/inc/customizer/header-builder/assets/js/header-builder-customizer.js',
				array( 'jquery', 'jquery-ui-sortable', 'customize-controls' ),
				INSPIRO_THEME_VERSION,
				true
			);

			wp_localize_script(
				'inspiro-lite-header-builder-customizer',
				'inspiroLiteHeaderBuilder',
				array(
					'components' => $this->components,
					'defaults'   => $this->get_default_layout(),
					'strings'    => array(
						'desktop'             => esc_html__( 'Desktop', 'inspiro' ),
						'tablet'              => esc_html__( 'Tablet', 'inspiro' ),
						'mobile'              => esc_html__( 'Mobile', 'inspiro' ),
						'availableComponents' => esc_html__( 'Available Components', 'inspiro' ),
						'leftZone'            => esc_html__( 'Left', 'inspiro' ),
						'centerZone'          => esc_html__( 'Center', 'inspiro' ),
						'rightZone'           => esc_html__( 'Right', 'inspiro' ),
						'builderTitle'        => esc_html__( 'Header Builder (Lite)', 'inspiro' ),
						'openBuilder'         => esc_html__( 'Open Header Builder', 'inspiro' ),
						'remove'              => esc_html__( 'Remove', 'inspiro' ),
					),
				)
			);
		}

		/**
		 * Enqueue frontend style.
		 */
		public function enqueue_frontend_assets() {
			if ( ! get_theme_mod( 'inspiro_header_builder_enable', false ) ) {
				return;
			}

			wp_enqueue_style(
				'inspiro-lite-header-builder-frontend',
				get_template_directory_uri() . '/inc/customizer/header-builder/assets/css/header-builder-frontend.css',
				array(),
				INSPIRO_THEME_VERSION
			);
		}

		/**
		 * Sanitize layout payload.
		 *
		 * @param string|array $input User input.
		 * @return string
		 */
		public function sanitize_layout( $input ) {
			$data = $input;
			if ( is_string( $data ) ) {
				$decoded = json_decode( $data, true );
				$data    = ( JSON_ERROR_NONE === json_last_error() && is_array( $decoded ) ) ? $decoded : null;
			}

			if ( ! is_array( $data ) ) {
				return wp_json_encode( $this->get_default_layout() );
			}

			$default = $this->get_default_layout();
			foreach ( array( 'desktop', 'tablet', 'mobile' ) as $device ) {
				if ( ! isset( $data[ $device ] ) || ! is_array( $data[ $device ] ) ) {
					$data[ $device ] = $default[ $device ];
					continue;
				}

				foreach ( array( 'left', 'center', 'right' ) as $zone ) {
					if ( ! isset( $data[ $device ][ $zone ] ) || ! is_array( $data[ $device ][ $zone ] ) ) {
						$data[ $device ][ $zone ] = array();
						continue;
					}

					$data[ $device ][ $zone ] = array_values(
						array_filter(
							array_map( 'sanitize_key', $data[ $device ][ $zone ] ),
							array( $this, 'is_supported_component' )
						)
					);
				}
			}

			return wp_json_encode( $data );
		}

		/**
		 * Check whether component id is allowed in Lite.
		 *
		 * @param string $component_id Component id.
		 * @return bool
		 */
		private function is_supported_component( $component_id ) {
			$supported = wp_list_pluck( $this->components, 'id' );
			return in_array( $component_id, $supported, true );
		}

		/**
		 * Get stored layout data.
		 *
		 * @return array
		 */
		private function get_layout_data() {
			$raw = get_theme_mod( 'inspiro_header_builder_header_main_header_row', wp_json_encode( $this->get_default_layout() ) );
			if ( is_string( $raw ) ) {
				$decoded = json_decode( $raw, true );
				if ( JSON_ERROR_NONE === json_last_error() && is_array( $decoded ) ) {
					return $decoded;
				}
			}

			return $this->get_default_layout();
		}

		/**
		 * Render the header builder markup.
		 *
		 * @param string $search_display CSS display value for search.
		 */
		public function render_header( $search_display = 'block' ) {
			$layout = $this->get_layout_data();
			foreach ( array( 'desktop', 'tablet', 'mobile' ) as $device ) {
				echo '<div class="ihb-lite ihb-lite-' . esc_attr( $device ) . '">';
				echo '<div class="ihb-lite-row">';
				foreach ( array( 'left', 'center', 'right' ) as $zone ) {
					echo '<div class="ihb-lite-zone ihb-lite-zone-' . esc_attr( $zone ) . '">';
					if ( isset( $layout[ $device ][ $zone ] ) && is_array( $layout[ $device ][ $zone ] ) ) {
						foreach ( $layout[ $device ][ $zone ] as $component_id ) {
							$this->render_component( $component_id, $search_display );
						}
					}
					echo '</div>';
				}
				echo '</div>';
				echo '</div>';
			}
		}

		/**
		 * Render supported components.
		 *
		 * @param string $component_id Component id.
		 * @param string $search_display Search display style.
		 */
		private function render_component( $component_id, $search_display ) {
			switch ( $component_id ) {
				case 'logo':
					echo '<div class="ihb-component ihb-component-logo">';
					inspiro_custom_logo();
					echo '</div>';
					break;
				case 'menu':
					echo '<div class="ihb-component ihb-component-menu">';
					echo '<nav class="primary-menu-wrapper navbar-collapse collapse" aria-label="' . esc_attr_x( 'Top Horizontal Menu', 'menu', 'inspiro' ) . '" role="navigation">';
					wp_nav_menu(
						array(
							'theme_location' => 'primary',
							'container'      => false,
							'menu_class'     => 'nav navbar-nav dropdown sf-menu',
							'fallback_cb'    => function() {
								echo '<ul class="nav navbar-nav dropdown sf-menu">';
								wp_list_pages(
									array(
										'title_li' => '',
									)
								);
								echo '</ul>';
							},
						)
					);
					echo '</nav>';
					echo '</div>';
					break;
				case 'search':
					echo '<div class="ihb-component ihb-component-search">';
					echo '<div id="sb-search" class="sb-search" style="display: ' . esc_attr( $search_display ) . ';">';
					get_template_part( 'template-parts/header/search', 'form' );
					echo '</div></div>';
					break;
				case 'social':
					if ( is_active_sidebar( 'header_social' ) ) {
						echo '<div class="ihb-component ihb-component-social header_social">';
						dynamic_sidebar( 'header_social' );
						echo '</div>';
					}
					break;
				case 'button':
					echo '<div class="ihb-component ihb-component-button">';
					get_template_part( 'template-parts/header/header', 'button' );
					echo '</div>';
					break;
				case 'hamburger':
					if ( has_nav_menu( 'primary' ) || is_active_sidebar( 'sidebar' ) ) {
						echo '<div class="ihb-component ihb-component-hamburger">';
						echo '<button type="button" class="navbar-toggle">';
						echo '<span class="screen-reader-text">' . esc_html__( 'Toggle sidebar & navigation', 'inspiro' ) . '</span>';
						echo '<span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>';
						echo '</button></div>';
					}
					break;
			}
		}

		/**
		 * Default builder arrangement.
		 *
		 * @return array
		 */
		private function get_default_layout() {
			return array(
				'desktop' => array(
					'left'   => array( 'logo' ),
					'center' => array( 'menu' ),
					'right'  => array( 'social', 'search', 'button', 'hamburger' ),
				),
				'mobile'  => array(
					'left'   => array( 'logo' ),
					'center' => array(),
					'right'  => array( 'search', 'button', 'hamburger' ),
				),
				'tablet'  => array(
					'left'   => array( 'logo' ),
					'center' => array( 'menu' ),
					'right'  => array( 'search', 'button', 'hamburger' ),
				),
			);
		}
	}
}
