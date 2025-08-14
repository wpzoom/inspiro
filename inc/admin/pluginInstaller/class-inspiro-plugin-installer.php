<?php
/**
 * Inspiro functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Inspiro
 * @since Inspiro 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

require_once get_template_directory() . '/inc/admin/pluginInstaller/class-inspiro-plugin-installer-skin.php';

if ( ! class_exists( 'Inspiro_Plugin_Installer' ) ) {
	/**
	 * Inspiro_Plugin_Installer initial setup
	 *
	 * @since 1.0.0
	 */
	class Inspiro_Plugin_Installer {

		/**
		 * Holds all registered plugins.
		 *
		 * @var array
		 */
		private $plugins;

		/**
		 * Instance
		 *
		 * @var $instance
		 */
		private static $instance;

		/**
		 * Initiator
		 *
		 * @since 1.0.0
		 * @return object
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() {
			$this->set_plugins();
			add_action( 'wp_ajax_inspiro_install_plugin', array( $this, 'inspiro_install_plugin' ) );
		}

		/**
		 * Set all registered plugins.
		 */
		public function set_plugins() {
			$this->plugins = TGM_Plugin_Activation::$instance->plugins;
		}

		function inspiro_install_plugin() {

			// Verify nonce for CSRF protection
			if ( ! isset( $_POST['security'] ) || ! wp_verify_nonce( $_POST['security'], 'inspiro-admin-pages' ) ) {
				wp_send_json_error( esc_html__( 'Security verification failed. Please refresh the page and try again.', 'inspiro' ) );
			}
		
			// Check if user has the WP capability to install plugins.
			if ( ! current_user_can( 'install_plugins' ) ) {
				wp_send_json_error( esc_html__( 'Could not install the plugin. You don\'t have permission to install plugins.', 'inspiro' ) );
			}
		
			$slug = ! empty( $_POST['slug'] ) ? sanitize_key( wp_unslash( $_POST['slug'] ) ) : '';
		
			if ( empty( $slug ) ) {
				wp_send_json_error( esc_html__( 'Could not install the plugin. Plugin slug is missing.', 'inspiro' ) );
			}
		
			// Check if plugin is already installed
			$plugin_file = WP_PLUGIN_DIR . '/' . $slug . '/' . $slug . '.php';
		
			// Check if the plugin is already installed and activated.
			if ( is_plugin_active( $plugin_file ) ) {
				wp_send_json_success( esc_html__( 'Plugin is already installed and activated!', 'inspiro' ) );
			}
		
			if ( file_exists( $plugin_file ) ) {
				$result = activate_plugin( $plugin_file );
		
				if ( is_wp_error( $result ) ) {
					wp_send_json_error( array( 'message' => $result->get_error_message() ) );
				} else {
					wp_send_json_success( esc_html__( 'Plugin was already installed! We activated it for you.', 'inspiro' ) );
				}
			}
		
			// Do not allow WordPress to search/download translations, as this will break JS output.
			remove_action( 'upgrader_process_complete', [ 'Language_Pack_Upgrader', 'async_upgrade' ], 20 );

			// Prep variables for Plugin_Installer_Skin class.
			$extra         = array();
			$extra['slug'] = $slug; // Needed for potentially renaming of directory name.
			$source        = $this->get_download_url( $slug );
			$api           = empty( $this->get_plugin_data( $slug )['source'] ) ? $this->get_plugins_api( $slug ) : null;
			$api           = ( false !== $api ) ? $api : null;

			if ( ! empty( $api ) && is_wp_error( $api ) ) {
				wp_send_json_error( $api->get_error_message() );
			}
		
			// Include necessary files for plugin installation
			
			if ( ! class_exists( 'Plugin_Upgrader', false ) ) {
				require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
			}

			$skin_args = array(
				'type'   => 'web',
				'plugin' => '',
				'api'    => $api,
				'extra'  => $extra,
			);

			$upgrader = new \Plugin_Upgrader( new InspiroPluginInstallerSkin( $skin_args ) );

			$upgrader->install( $source );
		
			// // Instantiate the Plugin_Upgrader class
			// $upgrader = new Plugin_Upgrader();
		
			// // Install the plugin
			// $upgrader->install( 'https://downloads.wordpress.org/plugin/' . $slug . '.zip' );
		
			// Flush the cache and return the newly installed plugin basename.
			wp_cache_flush();
		
			if ( $upgrader->plugin_info() ) {
				// Activate the plugin
				$result = activate_plugin( $plugin_file );
		
				if ( ! is_wp_error( $result ) ) {
					// Activation succeeded
					wp_send_json_success( esc_html__( 'Plugin installed and activated successfully.', 'inspiro' ) );
				} else {			
					// Activation failed
					wp_send_json_error(  $result->get_error_message() );
				}
			} else {
				// Installation failed
				wp_send_json_error( esc_html__( 'Failed to install plugin.', 'inspiro' ) );
			}

		}

		/**
		 * Get the data of a registered plugin via the slug.
		 *
		 * @param string $slug The plugin slug.
		 *
		 * @return array
		 */
		public function get_plugin_data( $slug ) {
			$data = [];

			foreach ( $this->plugins as $plugin ) {
				if ( $plugin['slug'] === $slug ) {
					$data = $plugin;
					break;
				}
			}

			return $data;
		}

		/**
		 * Get the download URL for a plugin.
		 *
		 * @param  string $slug Plugin slug.
		 *
		 * @return string Plugin download URL.
		 */
		public function get_download_url( $slug ) {
			$plugin_data = $this->get_plugin_data( $slug );

			if ( ! empty( $plugin_data['source'] ) ) {
				return $plugin_data['source'];
			}

			return $this->get_wp_repo_download_url( $slug );
		}

		/**
		 * Get the download URL from the WP.org.
		 *
		 * @param string $slug Plugin slug.
		 *
		 * @return string Plugin download URL from WP.org.
		 */
		protected function get_wp_repo_download_url( $slug ) {
			$source = '';
			$api    = $this->get_plugins_api( $slug );

			if ( false !== $api && isset( $api->download_link ) ) {
				$source = $api->download_link;
			}

			return $source;
		}

		/**
		 * Try to grab information from WordPress API.
		 *
		 * @param string $slug Plugin slug.
		 *
		 * @return object Plugins_api response object on success, WP_Error on failure.
		 */
		protected function get_plugins_api( $slug ) {
			static $api = array(); // Cache received responses.

			if ( ! isset( $api[ $slug ] ) ) {
				if ( ! function_exists( 'plugins_api' ) ) {
					require_once ABSPATH . 'wp-admin/includes/plugin-install.php';
				}

				$api[ $slug ] = plugins_api( 'plugin_information', array( 'slug' => $slug, 'fields' => array( 'sections' => false ) ) );
			}

			return $api[ $slug ];
		}

	}

}

Inspiro_Plugin_Installer::get_instance();
