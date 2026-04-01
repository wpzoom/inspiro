<?php
/**
 * Inspiro Lite Footer Builder.
 *
 * @package Inspiro
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Inspiro_Lite_Footer_Builder' ) ) {
	class Inspiro_Lite_Footer_Builder {
		/**
		 * Singleton instance.
		 *
		 * @var Inspiro_Lite_Footer_Builder|null
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
		 * @return Inspiro_Lite_Footer_Builder
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
					'label' => esc_html__( 'Footer Menu', 'inspiro' ),
					'icon'  => 'dashicons-menu',
				),
				array(
					'id'    => 'copyright',
					'label' => esc_html__( 'Copyright', 'inspiro' ),
					'icon'  => 'dashicons-editor-code',
				),
				array(
					'id'     => 'social',
					'label'  => esc_html__( 'Social Icons', 'inspiro' ),
					'icon'   => 'dashicons-share',
					'locked' => true,
				),
				array(
					'id'    => 'custom_html',
					'label' => esc_html__( 'HTML/Shortcode', 'inspiro' ),
					'icon'  => 'dashicons-editor-code',
				),
				array(
					'id'     => 'custom_html_2',
					'label'  => esc_html__( 'HTML/Shortcode 2', 'inspiro' ),
					'icon'   => 'dashicons-editor-code',
					'locked' => true,
				),
				array(
					'id'     => 'widget-1',
					'label'  => esc_html__( 'Widget Area 1', 'inspiro' ),
					'icon'   => 'dashicons-welcome-widgets-menus',
				),
				array(
					'id'    => 'widget-2',
					'label' => esc_html__( 'Widget Area 2', 'inspiro' ),
					'icon'  => 'dashicons-welcome-widgets-menus',
				),
				array(
					'id'    => 'widget-3',
					'label' => esc_html__( 'Widget Area 3', 'inspiro' ),
					'icon'  => 'dashicons-welcome-widgets-menus',
				),
				array(
					'id'     => 'widget-4',
					'label'  => esc_html__( 'Widget Area 4', 'inspiro' ),
					'icon'   => 'dashicons-welcome-widgets-menus',
					'locked' => true,
				),
			);

			add_action( 'customize_register', array( $this, 'register_customizer' ), 50 );
			add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_customizer_assets' ) );
			add_action( 'customize_controls_print_footer_scripts', array( $this, 'render_customizer_markup' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_frontend_assets' ), 20 );
		}

		/**
		 * Register customizer settings and controls.
		 *
		 * @param WP_Customize_Manager $wp_customize Customize manager.
		 */
		public function register_customizer( $wp_customize ) {
			$wp_customize->add_setting(
				'inspiro_footer_builder_enable',
				array(
					'default'           => false,
					'sanitize_callback' => 'inspiro_sanitize_checkbox',
					'transport'         => 'refresh',
				)
			);

			$wp_customize->add_control(
				'inspiro_footer_builder_enable',
				array(
					'label'       => esc_html__( 'Enable Footer Builder Lite', 'inspiro' ),
					'description' => esc_html__( 'Switch from predefined footer layout to drag-and-drop footer builder.', 'inspiro' ),
					'section'     => 'footer-area',
					'type'        => 'checkbox',
					'priority'    => 95,
				)
			);

			$wp_customize->add_setting(
				'inspiro_footer_builder_settings',
				array(
					'default'           => wp_json_encode( $this->get_default_layout() ),
					'sanitize_callback' => array( $this, 'sanitize_layout' ),
					'transport'         => 'refresh',
				)
			);

			$wp_customize->add_control(
				'inspiro_footer_builder_settings',
				array(
					'section'  => 'footer-area',
					'type'     => 'hidden',
					'priority' => 96,
				)
			);
		}

		/**
		 * Enqueue Customizer assets.
		 */
		public function enqueue_customizer_assets() {
			wp_enqueue_style(
				'inspiro-lite-footer-builder-customizer',
				get_template_directory_uri() . '/inc/customizer/footer-builder/assets/css/footer-builder-customizer.css',
				array(),
				INSPIRO_THEME_VERSION
			);

			wp_enqueue_script(
				'inspiro-lite-footer-builder-customizer',
				get_template_directory_uri() . '/inc/customizer/footer-builder/assets/js/footer-builder-customizer.js',
				array( 'jquery', 'jquery-ui-sortable', 'customize-controls' ),
				INSPIRO_THEME_VERSION,
				true
			);

			wp_localize_script(
				'inspiro-lite-footer-builder-customizer',
				'inspiroLiteFooterBuilder',
				array(
					'components' => $this->components,
					'defaults'   => $this->get_default_layout(),
					'proUrl'     => esc_url( 'https://www.wpzoom.com/themes/inspiro-lite/upgrade/?utm_source=wpadmin&utm_medium=customizer&utm_campaign=footerbuilder-lite-lock' ),
					'strings'    => array(
						'desktop'             => esc_html__( 'Desktop', 'inspiro' ),
						'tablet'              => esc_html__( 'Tablet', 'inspiro' ),
						'mobile'              => esc_html__( 'Mobile', 'inspiro' ),
						'availableComponents' => esc_html__( 'Available Components', 'inspiro' ),
						'leftZone'            => esc_html__( 'Left', 'inspiro' ),
						'centerZone'          => esc_html__( 'Center', 'inspiro' ),
						'rightZone'           => esc_html__( 'Right', 'inspiro' ),
						'builderTitle'        => esc_html__( 'Footer Builder (Lite)', 'inspiro' ),
						'openBuilder'         => esc_html__( 'Open Footer Builder', 'inspiro' ),
						'remove'              => esc_html__( 'Remove', 'inspiro' ),
						'lockProFeature'      => esc_html__( 'Available in Inspiro Premium', 'inspiro' ),
						'upgrade'             => esc_html__( 'Upgrade', 'inspiro' ),
						'colorsLinkLabel'     => esc_html__( 'Colors', 'inspiro' ),
						'columnsLinkLabel'    => esc_html__( 'Columns', 'inspiro' ),
						'topRow'              => esc_html__( 'Top Row', 'inspiro' ),
						'mainRow'             => esc_html__( 'Main Row', 'inspiro' ),
						'bottomRow'           => esc_html__( 'Bottom Row', 'inspiro' ),
						'lockedRowHint'       => esc_html__( 'Multiple editable rows are available in Inspiro Premium', 'inspiro' ),
					),
				)
			);
		}

		/**
		 * Prints a lightweight root element for builder UI mounting.
		 */
		public function render_customizer_markup() {
			echo '<div id="inspiro-lite-footer-builder-mount" style="display:none;"></div>';
		}

		/**
		 * Enqueue frontend style.
		 */
		public function enqueue_frontend_assets() {
			if ( ! get_theme_mod( 'inspiro_footer_builder_enable', false ) ) {
				return;
			}

			wp_enqueue_style(
				'inspiro-lite-footer-builder-frontend',
				get_template_directory_uri() . '/inc/customizer/footer-builder/assets/css/footer-builder-frontend.css',
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
				foreach ( array( 'top', 'main', 'bottom' ) as $row ) {
					if ( ! isset( $data[ $device ][ $row ] ) || ! is_array( $data[ $device ][ $row ] ) ) {
						$data[ $device ][ $row ] = $default[ $device ][ $row ];
						continue;
					}
					foreach ( array( 'left', 'center', 'right' ) as $zone ) {
						if ( ! isset( $data[ $device ][ $row ][ $zone ] ) || ! is_array( $data[ $device ][ $row ][ $zone ] ) ) {
							$data[ $device ][ $row ][ $zone ] = array();
							continue;
						}
						$data[ $device ][ $row ][ $zone ] = array_values(
							array_filter(
								array_map( 'sanitize_key', $data[ $device ][ $row ][ $zone ] ),
								array( $this, 'is_allowed_layout_component' )
							)
						);
					}
				}
			}

			return wp_json_encode( $data );
		}

		/**
		 * Check whether component id may be stored in layout JSON.
		 *
		 * @param string $component_id Component id.
		 * @return bool
		 */
		private function is_allowed_layout_component( $component_id ) {
			foreach ( $this->components as $component ) {
				if ( ! isset( $component['id'] ) || $component['id'] !== $component_id ) {
					continue;
				}
				return empty( $component['locked'] );
			}
			return false;
		}

		/**
		 * Get stored layout data.
		 *
		 * @return array
		 */
		private function get_layout_data() {
			$raw = get_theme_mod( 'inspiro_footer_builder_settings', wp_json_encode( $this->get_default_layout() ) );
			if ( is_string( $raw ) ) {
				$decoded = json_decode( $raw, true );
				if ( JSON_ERROR_NONE === json_last_error() && is_array( $decoded ) ) {
					return $this->filter_layout_locked_components( $decoded );
				}
			}

			return $this->get_default_layout();
		}

		/**
		 * Remove locked component ids from layout.
		 *
		 * @param array $data Layout data.
		 * @return array
		 */
		private function filter_layout_locked_components( $data ) {
			if ( ! is_array( $data ) ) {
				return $this->get_default_layout();
			}

			foreach ( array( 'desktop', 'tablet', 'mobile' ) as $device ) {
				if ( ! isset( $data[ $device ] ) || ! is_array( $data[ $device ] ) ) {
					continue;
				}
				foreach ( array( 'top', 'main', 'bottom' ) as $row ) {
					if ( ! isset( $data[ $device ][ $row ] ) || ! is_array( $data[ $device ][ $row ] ) ) {
						continue;
					}
					foreach ( array( 'left', 'center', 'right' ) as $zone ) {
						if ( ! isset( $data[ $device ][ $row ][ $zone ] ) || ! is_array( $data[ $device ][ $row ][ $zone ] ) ) {
							continue;
						}
						$data[ $device ][ $row ][ $zone ] = array_values(
							array_filter(
								$data[ $device ][ $row ][ $zone ],
								array( $this, 'is_allowed_layout_component' )
							)
						);
					}
				}
			}

			return $data;
		}

		/**
		 * Render builder output.
		 */
		public function render_footer() {
			$layout = $this->get_layout_data();

			echo '<footer id="colophon" class="site-footer footer-builder-output" role="contentinfo">';
			echo '<div class="inner-wrap">';
			foreach ( array( 'desktop', 'tablet', 'mobile' ) as $device ) {
				echo '<div class="ifb-lite ifb-lite-' . esc_attr( $device ) . '">';
				foreach ( array( 'main', 'bottom' ) as $row ) {
					echo '<div class="ifb-lite-row ifb-lite-row-' . esc_attr( $row ) . '">';
					foreach ( array( 'left', 'center', 'right' ) as $zone ) {
						echo '<div class="ifb-lite-zone ifb-lite-zone-' . esc_attr( $zone ) . '">';
						if ( isset( $layout[ $device ][ $row ][ $zone ] ) && is_array( $layout[ $device ][ $row ][ $zone ] ) ) {
							foreach ( $layout[ $device ][ $row ][ $zone ] as $component_id ) {
								$this->render_component( $component_id );
							}
						}
						echo '</div>';
					}
					echo '</div>';
				}
				echo '</div>';
			}
			echo '</div>';
			echo '</footer>';
		}

		/**
		 * Render supported components.
		 *
		 * @param string $component_id Component id.
		 */
		private function render_component( $component_id ) {
			switch ( $component_id ) {
				case 'logo':
					$logo_url  = get_theme_mod( 'inspiro-footer-logo' );
					$logo_size = absint( get_theme_mod( 'footer_logo_size', 100 ) );
					echo '<div class="ifb-component ifb-component-logo">';
					if ( $logo_url ) {
						echo '<a href="' . esc_url( home_url( '/' ) ) . '" rel="home">';
						echo '<img src="' . esc_url( $logo_url ) . '" style="max-width:' . esc_attr( $logo_size ) . '%;height:auto;" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '">';
						echo '</a>';
					} else {
						inspiro_custom_logo();
					}
					echo '</div>';
					break;
				case 'menu':
					echo '<nav class="ifb-component ifb-component-menu footer-builder-navigation">';
					wp_nav_menu(
						array(
							'theme_location' => 'footer',
							'container'      => false,
							'menu_class'     => 'footer-menu-container',
							'fallback_cb'    => false,
							'depth'          => 1,
						)
					);
					echo '</nav>';
					break;
				case 'copyright':
					$customizer_copyright_text = get_theme_mod( 'footer_copyright_text_setting', 'Copyright {copyright} {current-year} {site-title}' );
					echo '<div class="ifb-component ifb-component-copyright site-info">';
					echo '<span class="copyright"><span>' . wp_kses_post( get_footer_copyright_text( $customizer_copyright_text ) ) . '</span></span>';
					echo '</div>';
					break;
			}
		}

		/**
		 * Default builder arrangement.
		 *
		 * @return array
		 */
		private function get_default_layout() {
			$main = array(
				'left'   => array( 'logo' ),
				'center' => array( 'menu', 'custom_html' ),
				'right'  => array( 'widget-1', 'widget-2', 'widget-3' ),
			);

			$bottom = array(
				'left'   => array( 'copyright' ),
				'center' => array(),
				'right'  => array(),
			);

			$empty = array(
				'left'   => array(),
				'center' => array(),
				'right'  => array(),
			);

			return array(
				'desktop' => array(
					'top'    => $empty,
					'main'   => $main,
					'bottom' => $bottom,
				),
				'tablet'  => array(
					'top'    => $empty,
					'main'   => $main,
					'bottom' => $bottom,
				),
				'mobile'  => array(
					'top'    => $empty,
					'main'   => array(
						'left'   => array( 'logo', 'menu' ),
						'center' => array( 'custom_html' ),
						'right'  => array(),
					),
					'bottom' => array(
						'left'   => array( 'copyright' ),
						'center' => array( 'widget-1', 'widget-2', 'widget-3' ),
						'right'  => array(),
					),
				),
			);
		}
	}
}
