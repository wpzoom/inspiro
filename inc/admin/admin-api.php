<?php
/**
 * Theme Admin API
 *
 * @package    Inspiro
 * @since      Inspiro 1.9.5
 */

// Handle AJAX request for activating Inspiro Starter Sites plugin
add_action( 'wp_ajax_install_activate_inspiro_starter_sites_plugin', 'install_activate_inspiro_starter_sites_plugin' );
function install_activate_inspiro_starter_sites_plugin() {
	// Check for nonce security
	//	check_ajax_referer( 'install_activate_inspiro_starter-sites_plugin_nonce', 'nonce' );

	// Ensure the user has the capability to install plugins
	if ( current_user_can( 'install_plugins' ) ) {
		// Assuming the plugin slug is passed via POST
		$plugin_slug = isset( $_POST['plugin_slug'] ) ? sanitize_text_field( $_POST['plugin_slug'] ) : '';

		if ( ! empty( $plugin_slug ) && 'inspiro-starter-sites' === $plugin_slug ) {
			// Check if plugin is already installed
			$plugin_file = WP_PLUGIN_DIR . '/' . $plugin_slug . '/' . $plugin_slug . '.php';
			if ( file_exists( $plugin_file ) ) {
				// Plugin is installed, activate it
				$result = activate_plugin( $plugin_slug . '/' . $plugin_slug . '.php' );

				if ( is_wp_error( $result ) ) {
					// Activation failed
					wp_send_json_error( array( 'message' => $result->get_error_message() ) );
				} else {
					// Activation succeeded
					wp_send_json_success( array( 'message' => 'Plugin activated successfully.' ) );
				}
			} else {
				// Include necessary files for plugin installation
				require_once ABSPATH . 'wp-admin/includes/plugin-install.php';
				require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
				require_once ABSPATH . 'wp-admin/includes/file.php';
				require_once ABSPATH . 'wp-admin/includes/misc.php';

				// Instantiate the Plugin_Upgrader class
				$upgrader = new Plugin_Upgrader();

				// Install the plugin
				$install_result = $upgrader->install( 'https://downloads.wordpress.org/plugin/' . $plugin_slug . '.zip' );

				if ( $install_result ) {
					// Activate the plugin
					$result = activate_plugin( $plugin_slug . '/' . $plugin_slug . '.php' );

					if ( is_wp_error( $result ) ) {
						// Activation failed
						wp_send_json_error( array( 'message' => $result->get_error_message() ) );
					} else {
						// Activation succeeded
						wp_send_json_success( array( 'message' => 'Plugin installed and activated successfully.' ) );
					}
				} else {
					// Installation failed
					wp_send_json_error( array( 'message' => 'Failed to install plugin.' ) );
				}
			}
		} else {
			wp_send_json_error( array( 'message' =>  'Invalid plugin slug.' ) );
		}
	} else {
		wp_send_json_error( array( 'message' => 'You do not have permission to install plugins.' ) );
	}

	// End the AJAX request
	wp_die();
}

// Handle AJAX request for saving selected demo
add_action( 'wp_ajax_inspiro_save_selected_demo', 'inspiro_save_selected_demo' );
function inspiro_save_selected_demo() {
	// Check nonce for security
	if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( $_POST['nonce'], 'inspiro-admin-pages' ) ) {
		wp_send_json_error( array( 'message' => 'Invalid nonce' ) );
		wp_die();
	}

	// Check user permissions
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		wp_send_json_error( array( 'message' => 'Insufficient permissions' ) );
		wp_die();
	}

	// Get demo ID from request
	$demo_id = isset( $_POST['demo_id'] ) ? sanitize_text_field( $_POST['demo_id'] ) : '';

	if ( empty( $demo_id ) ) {
		// Clear the demo layout option
		delete_option( 'inspiro_demo_layout' );
		wp_send_json_success( array( 'message' => 'Demo layout cleared' ) );
	} else {
		// Extract demo name from demo_id (e.g., 'inspiro-video' -> 'video', 'inspiro-lite-remix' -> 'remix')
		$demo_layout = '';
		if ( strpos( $demo_id, 'inspiro-lite-' ) === 0 ) {
			$demo_layout = str_replace( 'inspiro-lite-', '', $demo_id );
		} elseif ( strpos( $demo_id, 'inspiro-' ) === 0 ) {
			$demo_layout = str_replace( 'inspiro-', '', $demo_id );
		} else {
			$demo_layout = $demo_id;
		}

		// Save the demo layout option
		update_option( 'inspiro_demo_layout', $demo_layout );
		wp_send_json_success( array( 
			'message' => 'Demo layout saved',
			'demo_layout' => $demo_layout 
		) );
	}

	wp_die();
}

include_once get_template_directory() . '/inc/admin/pluginInstaller/class-inspiro-plugin-installer.php';