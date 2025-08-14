<?php
/**
 * Load WP Pointer for creating custom messages
 *
 * The constant POINTER_HEADER_TEXT defines the header text displayed during the theme onboarding process.
 *
 * This text will be used as the main heading in the pointer interface to greet users or provide initial
 * guidance when they start using a new theme. It aims to enhance the first-time user experience by
 * offering a clear and welcoming introduction.
 *
 * @package Inspiro
 * @since   Inspiro 1.9.x
 * @var string $POINTER_HEADER_TEXT The onboarding header text.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( 'Inspiro_WP_Admin_Menu_Pointer' ) ) {

	class Inspiro_WP_Admin_Menu_Pointer {
		private $link_url;

		/**
		 * Pointer Settings
		 */
		const POINTER_HEADER_TEXT = 'Inspiro Lite';
		const POINTER_CONTENT_TEXT = 'Visit the <a href="%s"><strong>Inspiro Dashboard</strong></a> to set up your website with just a few clicks and learn more about your theme! 🚀';
		const POINTER_TARGET = '#toplevel_page_inspiro';
		const POINTER_USER_META_KEY_STATUS = 'inspiro_theme_admin_menu_pointer_show_status';

		public function __construct() {
			$this->link_url = admin_url( 'admin.php?page=inspiro' ); // add link here
			//add_action( 'admin_init', [ $this, 'show_custom_pointer' ] );
			add_action( 'wp_ajax_dismiss_wp_pointer', [ $this, 'dismiss_pointer_status' ] );
		}

		/**
		 * Add Conditional Logic to Show the Pointer Once
		 */
		public function show_custom_pointer() {
			$current_user_id = get_current_user_id();
			$dismissed       = get_user_meta( $current_user_id, self::POINTER_USER_META_KEY_STATUS, true );

			if ( ! $dismissed ) {
				add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_custom_pointer_scripts' ] );
			}
		}

		/**
		 * Enqueue scripts and styles for the pointer option
		 */
		public function enqueue_custom_pointer_scripts() {
			if ( ! wp_script_is( 'wp-pointer', 'registered' ) ) {
				return;
			}

			wp_enqueue_style( 'wp-pointer' );
			wp_enqueue_script( 'wp-pointer' );

			$pointer_text   = $this->create_pointer_text(
				self::POINTER_HEADER_TEXT,
				sprintf( self::POINTER_CONTENT_TEXT, esc_url( $this->link_url ) )
			);
			$pointer_target = self::POINTER_TARGET;

			wp_enqueue_script(
				'inspiro-custom-admin-pointer',
				inspiro_get_assets_uri( 'custom-admin-pointer', 'js' ),
				[ 'jquery', 'wp-pointer' ],
				INSPIRO_THEME_VERSION,
				true
			);

			$localized_data = [
				'pointer_text'   => $pointer_text,
				'pointer_target' => $pointer_target,
				'nonce'          => wp_create_nonce( 'wp-pointer' ),
			];
			wp_localize_script( 'inspiro-custom-admin-pointer', 'customAdminPointer', $localized_data );
		}

		/**
		 * Create pointer text and markup.
		 */
		public function create_pointer_text( $header_text, $content_text ) {
			return '<h3>'. sprintf( __( '%s', 'inspiro' ), $header_text ) .'</h3><p>' . sprintf( __( '%s', 'inspiro' ), $content_text ) . '</p>';
		}

		/**
		 * Mark the pointer as dismissed when closed.
		 */
		public function dismiss_pointer_status() {
			// Verify nonce for CSRF protection
			if ( ! isset( $_POST['security'] ) || ! wp_verify_nonce( $_POST['security'], 'wp-pointer' ) ) {
				wp_die( 'Security verification failed.' );
			}

			if ( isset( $_POST['pointer'] ) && 'custom_admin_pointer' === $_POST['pointer'] ) {
				update_user_meta( get_current_user_id(), self::POINTER_USER_META_KEY_STATUS, true );
				echo 'Updated';
			}
			wp_die();
		}
	}
}

// Instantiate the class
new Inspiro_WP_Admin_Menu_Pointer();

