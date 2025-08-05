<?php
/**
 * Inspiro Lite: Starter Content Notice
 *
 * @package Inspiro
 * @since 2.1.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Starter Content Notice Class
 */
class Inspiro_Starter_Content_Notice {

	/**
	 * Constructor
	 */
	public function __construct() {
		add_action( 'customize_register', array( $this, 'add_starter_content_notice' ), 999 );
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_customizer_scripts' ) );
		add_action( 'wp_ajax_inspiro_dismiss_starter_content', array( $this, 'handle_starter_content_decision' ) );
	}

	/**
	 * Check if starter content is active
	 *
	 * @return bool
	 */
	public function is_starter_content_active() {
		// Don't show when previewing a theme (theme preview mode)
		if ( isset( $_GET['theme'] ) ) {
			return false;
		}
		
		// Only show when Inspiro is the ACTIVE theme
		if ( get_template() !== 'inspiro' ) {
			return false;
		}
		
		// Check if this is a fresh site with starter content
		$starter_content_dismissed = get_theme_mod( 'inspiro_starter_content_dismissed', false );
		
		// If already dismissed, don't show
		if ( $starter_content_dismissed ) {
			return false;
		}
		
		// Check if we have starter content support
		if ( ! current_theme_supports( 'starter-content' ) ) {
			return false;
		}
		
		// Check if starter content is still fresh (hasn't been customized)
		$fresh_site = get_option( 'fresh_site' );
		
		// WordPress sets fresh_site to 0 when content is added, but we also want to check
		// if there are any non-starter-content posts/pages
		if ( $fresh_site ) {
			return true;
		}
		
		// Additional check: if there are only starter content posts, still show notice
		$user_posts = get_posts( array(
			'post_type'      => array( 'post', 'page' ),
			'post_status'    => 'publish',
			'posts_per_page' => 1,
			'meta_query'     => array(
				array(
					'key'     => '_customize_starter_content_theme',
					'compare' => 'NOT EXISTS',
				),
			),
		) );
		
		return empty( $user_posts );
	}

	/**
	 * Add starter content notice to customizer
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	public function add_starter_content_notice( $wp_customize ) {
		if ( ! $this->is_starter_content_active() ) {
			return;
		}

		// Add a section at the top of the customizer for the welcome notice
		$wp_customize->add_section( 'inspiro_starter_content_notice', array(
			'title'       => __( 'Inspiro Starter Content', 'inspiro' ),
			'description' => __( 'We\'ve added some starter pages to help you get going quickly.', 'inspiro' ),
			'priority'    => 1, // Place at the very top
		) );

		// Add a setting to track user choice
		$wp_customize->add_setting( 'inspiro_starter_content_choice', array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		) );

		// Add custom control for the buttons
		$wp_customize->add_control( new Inspiro_Starter_Content_Control( 
			$wp_customize, 
			'inspiro_starter_content_choice', 
			array(
				'section' => 'inspiro_starter_content_notice',
				'settings' => 'inspiro_starter_content_choice',
			)
		) );
	}

	/**
	 * Enqueue customizer scripts
	 */
	public function enqueue_customizer_scripts() {
		if ( ! $this->is_starter_content_active() ) {
			return;
		}

		$script_debug = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG;
		$js_path = $script_debug ? '/assets/js/unminified/' : '/assets/js/minified/';
		$js_suffix = $script_debug ? '.js' : '.min.js';

		wp_enqueue_script(
			'inspiro-starter-content-notice',
			get_template_directory_uri() . $js_path . 'starter-content-notice' . $js_suffix,
			array( 'customize-controls', 'jquery' ),
			INSPIRO_THEME_VERSION,
			true
		);

		wp_localize_script(
			'inspiro-starter-content-notice',
			'inspiroStarterContent',
			array(
				'ajaxUrl'     => admin_url( 'admin-ajax.php' ),
				'nonce'       => wp_create_nonce( 'inspiro-starter-content' ),
				'welcomeText' => __( 'Inspiro Starter Content', 'inspiro' ),
				'introText'   => __( 'We\'ve added some starter pages to help you get going quickly.', 'inspiro' ),
				'keepButton'  => __( 'Keep the starter content', 'inspiro' ),
				'cleanButton' => __( 'Start with a clean slate', 'inspiro' ),
				'noteText'    => __( 'Don\'t worry - you can import fully working demos from the Dashboard', 'inspiro' ),
			)
		);

		// No additional styles needed - using inline styles in the control
	}


	/**
	 * Handle starter content decision via AJAX
	 */
	public function handle_starter_content_decision() {
		check_ajax_referer( 'inspiro-starter-content', 'nonce' );

		$action = isset( $_POST['starter_action'] ) ? sanitize_text_field( wp_unslash( $_POST['starter_action'] ) ) : '';

		if ( 'clean' === $action ) {
			// Remove starter content
			$this->remove_starter_content();
		}

		// Mark as dismissed either way
		set_theme_mod( 'inspiro_starter_content_dismissed', true );

		wp_send_json_success();
	}

	/**
	 * Remove starter content
	 */
	private function remove_starter_content() {
		global $wpdb;

		// Remove starter content posts and pages - look for the correct meta key
		$starter_posts = $wpdb->get_results(
			"SELECT p.ID FROM {$wpdb->posts} p 
			 INNER JOIN {$wpdb->postmeta} pm ON p.ID = pm.post_id 
			 WHERE pm.meta_key = '_customize_starter_content_theme' 
			 AND p.post_type IN ('post', 'page')"
		);

		foreach ( $starter_posts as $post ) {
			wp_delete_post( $post->ID, true );
		}

		// Remove starter content navigation menus
		$menus = wp_get_nav_menus();
		foreach ( $menus as $menu ) {
			// Check if this menu was created by starter content
			$menu_items = wp_get_nav_menu_items( $menu->term_id );
			$is_starter_menu = false;
			
			if ( $menu_items ) {
				foreach ( $menu_items as $item ) {
					if ( get_post_meta( $item->ID, '_customize_starter_content_theme', true ) ) {
						$is_starter_menu = true;
						break;
					}
				}
			}
			
			if ( $is_starter_menu ) {
				wp_delete_nav_menu( $menu );
			}
		}

		// Reset nav menu locations
		set_theme_mod( 'nav_menu_locations', array() );

		// Clear all widgets from sidebars (starter content widgets)
		$sidebars = wp_get_sidebars_widgets();
		$empty_sidebars = array();
		
		foreach ( $sidebars as $sidebar_id => $widgets ) {
			if ( 'wp_inactive_widgets' !== $sidebar_id ) {
				$empty_sidebars[ $sidebar_id ] = array();
			} else {
				$empty_sidebars[ $sidebar_id ] = $widgets;
			}
		}
		wp_set_sidebars_widgets( $empty_sidebars );

		// Remove customizer starter content changeset
		$wpdb->delete(
			$wpdb->posts,
			array(
				'post_type'   => 'customize_changeset',
				'post_status' => 'auto-draft',
			)
		);

		// Clear starter content theme mods that might have been set
		$theme_mods_to_clear = array(
			'custom_logo',
			'blogname',
			'blogdescription',
		);

		foreach ( $theme_mods_to_clear as $mod ) {
			$current_value = get_theme_mod( $mod );
			if ( $current_value ) {
				// Only remove if it looks like default starter content
				if ( $mod === 'blogname' && $current_value === get_option( 'blogname' ) ) {
					remove_theme_mod( $mod );
				} elseif ( $mod === 'blogdescription' && $current_value === get_option( 'blogdescription' ) ) {
					remove_theme_mod( $mod );
				}
			}
		}

		// Mark site as no longer fresh but also mark that we chose clean slate
		update_option( 'fresh_site', 0 );
	}
}

/**
 * Custom control for starter content notice buttons
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	class Inspiro_Starter_Content_Control extends WP_Customize_Control {
		
		/**
		 * Control type
		 *
		 * @var string
		 */
		public $type = 'inspiro_starter_content';

		/**
		 * Render the control
		 */
		public function render_content() {
            ?>
            <div class="inspiro-starter-content-buttons">
                <button type="button" class="button button-primary inspiro-keep-starter" data-action="keep">
                    <?php esc_html_e( 'Keep these helpful pages', 'inspiro' ); ?>
                </button>
                <button type="button" class="button inspiro-clean-slate" data-action="clean">
                    <?php esc_html_e( 'Start with a clean slate', 'inspiro' ); ?>
                </button>
                <a href="<?php echo esc_url( admin_url( 'admin.php?page=inspiro-demo' ) ); ?>" class="button button-secondary inspiro-import-demos">
                    <?php esc_html_e( 'Import Demos', 'inspiro' ); ?>
                </a>
                <p class="description" style="margin-top: 10px;">
                    <?php
                    printf(
                        esc_html__( 'Don\'t worry - you can import fully working demos from the %s.', 'inspiro' ),
                        '<a href="' . esc_url( admin_url( 'admin.php?page=inspiro-demo' ) ) . '">' . esc_html__( 'Dashboard', 'inspiro' ) . '</a>'
                    );
                    ?>
                </p>
            </div>
            <style>
                .inspiro-starter-content-buttons {
                    margin-top: 10px;
                }
                .inspiro-starter-content-buttons .button {
                    display: block;
                    width: 100%;
                    margin-bottom: 8px;
                    text-align: center;
                }
                .inspiro-clean-slate {
                    background: #fff !important;
                    color: #0073aa !important;
                    border-color: #0073aa !important;
                }
                .inspiro-clean-slate:hover {
                    background: #f1f1f1 !important;
                    color: #005a87 !important;
                    border-color: #005a87 !important;
                }
            </style>
            <?php
        }

	}
}

new Inspiro_Starter_Content_Notice();
