<?php
/**
 * Inspiro Customizer Guided Tour Class
 *
 * @package Inspiro
 * @since   Inspiro 1.9.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( 'Inspiro_Customizer_Guided_Tour' ) ) {

	/**
	 * The Customizer Guided Tour Class (Singleton)
	 */
	class Inspiro_Customizer_Guided_Tour {

		// Holds the single instance of the class
		private static $instance = null;

		/**
		 * Private constructor to prevent multiple instances.
		 *
		 * @since 1.9.4
		 */
		private function __construct() {
			add_action( 'admin_init', [ $this, 'init_guider' ] );
			add_action( 'wp_ajax_customize_guided_tour_action', [ $this, 'ajax_handler' ] );
		}

		/**
		 * Prevent cloning of the instance.
		 */
		private function __clone() {
		}

		/**
		 * Prevent unserializing of the instance.
		 */
		public function __wakeup() {
		}

		/**
		 * Get the single instance of the class.
		 *
		 * @return Inspiro_Customizer_Guided_Tour
		 * @since 1.9.4
		 */
		public static function get_instance() {
			if ( self::$instance === null ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * Handle AJAX requests.
		 *
		 * @since 1.9.4
		 */
		public function ajax_handler() {
			// Verify nonce for CSRF protection
			if ( ! isset( $_POST['security'] ) || ! wp_verify_nonce( $_POST['security'], 'inspiro-guided-tour' ) ) {
				wp_send_json_error( 'Security verification failed. Please refresh the page and try again.' );
			}

			$response_message       = 'No data received';
			$theme_mode_name        = 'inspiro_guided_tour_checked_status';
			$is_checked_status_set  = isset( $_POST['checked_status_value'] );
			$is_checked_status_true = $is_checked_status_set && $_POST['checked_status_value'];
			$can_manage_options     = current_user_can( 'manage_options' );

			if ( $is_checked_status_set ) {
				if ( $is_checked_status_true ) {
					if ( $can_manage_options ) {
						set_theme_mod( $theme_mode_name, true );
						$response_message = 'Status was changed to hide on next visit';
					} else {
						$response_message = 'User does not have permission to change this setting';
					}
				}
			}

			$response = [
				'success' => true,
				'data'    => $response_message,
			];

			// Uncomment the following line in actual use
			// wp_send_json_success($response);
		}

		/**
		 * Initialize the guider.
		 *
		 * @since 1.9.4
		 */
		public function init_guider() {
			global $pagenow;
			if ( 'customize.php' === $pagenow && false === (bool) get_theme_mod( 'inspiro_guided_tour_checked_status', false ) ) {
				// include customize scripts
				add_action( 'customize_controls_enqueue_scripts', array( $this, 'include_guider_scripts' ) );
				// include underscore template
				add_action( 'customize_controls_print_footer_scripts', array( $this, 'print_guider_templates' ) );
			}
		}

		/**
		 * Enqueue guider scripts.
		 *
		 * @since 1.9.4
		 */
		public function include_guider_scripts() {
			// styles
			wp_enqueue_style( 'inspiro-guided-tour-style', inspiro_get_assets_uri( 'customize-guided-tour', 'css' ), [], INSPIRO_THEME_VERSION, 'all' );
			// scripts
			wp_enqueue_script( 'inspiro-guided-tour', inspiro_get_assets_uri( 'customize-guided-tour', 'js' ), [
				'jquery',
				'wp-backbone'
			], INSPIRO_THEME_VERSION, true );
			wp_localize_script( 'inspiro-guided-tour', '_wpCustomizeInspiroGuidedTourSteps', $this->get_guided_tour_steps() );
			wp_localize_script( 'inspiro-guided-tour', 'inspiroGuidedTourVars', array(
				'nonce' => wp_create_nonce( 'inspiro-guided-tour' ),
			) );
		}

		/**
		 * Template for steps.
		 *
		 * @since 1.9.4
		 */
		public function print_guider_templates() {
			?>
			<script type="text/html" id="tmpl-ins-guided-tour-step">
				<div class="ins-guided-tour-step">
					<# if ( data.title ) { #>
					<h2>{{ data.title }}</h2>
					<# } #>

					{{{ data.message }}}

					<div class="guided-tour-step-nav-elements">
						<a class="button button-primary ins-go-button <# if (data.last_step ) { #>ins-done-btn<# } #>"
						   href="#">
							<# if ( data.button_text ) { #>
							{{ data.button_text }}
							<# } else { #>
							<?php esc_attr_e( 'Next', 'inspiro' ); ?>
							<# } #>
						</a>
						<# if ( ! data.last_step ) { #>
						<# if ( data.first_step ) { #>
						<a href="#" class="ins-guided-tour-skip">
							<?php esc_attr_e( 'No thanks, skip the tour', 'inspiro' ); ?>
							<# } else { #>
							<a href="#" class="ins-guided-tour-next-step">
								<?php esc_attr_e( 'Next step &rarr;', 'inspiro' ); ?>
								<# } #>
							</a>
							<# } #>
					</div>
				</div>
			</script>
			<?php
		}

		/**
		 * Setup guided tour steps.
		 *
		 * @since 1.9.4
		 */
		public function get_guided_tour_steps() {
			return [
				[
					'title'       => __( 'Customize Inspiro', 'inspiro' ),
					'message'     => sprintf( __( 'Here you can control the overall look and feel of your website.%sAre you ready? Let\'s start the tour!', 'inspiro' ), PHP_EOL . PHP_EOL ),
					'button_text' => __( 'Take the tour', 'inspiro' ),
					'section'     => '#customize-info',
				],
				[
					'title'   => __( '1. Customize your Site Identity', 'inspiro' ),
					'message' => __( 'Click on the Site Identity section to upload your custom logo image or change the Site Title.', 'inspiro' ),
					'section' => 'title_tagline',
				],
				[
					'title'   => __( '2. Customize Colors', 'inspiro' ),
					'message' => __( 'Change the color scheme of theme, accent color or individual colors.', 'inspiro' ),
					'section' => 'colors',
				],
				[
					'title'   => __( '3. Customize Fonts', 'inspiro' ),
					'message' => __( 'From this section you can easily change the global fonts in your theme or customize individual elements.', 'inspiro' ),
					'section' => 'inspiro_typography_panel',
				],
				[
					'title'   => __( '4. Customize Footer', 'inspiro' ),
					'message' => __( 'Need to change the default copyright text or add additional links? You can do it here!', 'inspiro' ),
					'section' => 'footer-area',
				],
				[
					'title'       => '',
					'message'     => sprintf( __( 'All set! Remember to %1$sSave & publish%2$s your changes when you\'re done.%3$sYou can return to your dashboard by clicking the X in the top left corner.', 'inspiro' ), '<strong>', '</strong>', PHP_EOL . PHP_EOL ),
					'section'     => '#customize-header-actions .save',
					'button_text' => __( 'Done', 'inspiro' ),
				],
			];
		}
	}
}

// Get the singleton instance
Inspiro_Customizer_Guided_Tour::get_instance();
