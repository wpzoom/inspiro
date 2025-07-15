<?php
/**
 * Admin notice after Theme activation
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.2.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'inspiro_admin_notice' ) ) {
	/**
	 * Welcome Notice after Theme Activation
	 *
	 * @return void
	 */
	function inspiro_admin_notice() {
		global $pagenow, $inspiro_version;

		$welcome_notice   = get_option( 'inspiro_notice_welcome' );
		$current_user_can = current_user_can( 'edit_theme_options' );
		$plugin_status    = inspiro_check_plugin_status( 'inspiro-starter-sites/inspiro-starter-sites.php' );
		$theme_dashboard  = ( 'admin.php' === $pagenow && isset( $_GET['page'] ) && 'inspiro' === $_GET['page'] ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended

		$should_display_notice = ( 'active' !== $plugin_status &&  ! $welcome_notice && ! $theme_dashboard ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended

		if ( $should_display_notice ) {
			wp_enqueue_style(
				'inspiro-admin-notice',
				inspiro_get_assets_uri( 'welcome-notice', 'css' ),
				array(),
				INSPIRO_THEME_VERSION
			);

			inspiro_welcome_notice();
		}
	}	
}
add_action( 'admin_notices', 'inspiro_admin_notice' );

if ( ! function_exists( 'inspiro_hide_notice' ) ) {
	/**
	 * Hide Welcome Notice in WordPress Dashboard
	 *
	 * @return void
	 */
	function inspiro_hide_notice() {
		if ( isset( $_GET['inspiro-hide-notice'] ) && isset( $_GET['_inspiro_notice_nonce'] ) ) {
			if ( ! check_admin_referer( 'inspiro_hide_notices_nonce', '_inspiro_notice_nonce' ) ) {
				wp_die( esc_html__( 'Action failed. Please refresh the page and retry.', 'inspiro' ) );
			}

			if ( ! current_user_can( 'edit_theme_options' ) ) {
				wp_die( esc_html__( 'You do not have the necessary permission to perform this action.', 'inspiro' ) );
			}

			$hide_notice = sanitize_text_field( wp_unslash( $_GET['inspiro-hide-notice'] ) );
			update_option( 'inspiro_notice_' . $hide_notice, 1 );
		}
	}
}
add_action( 'wp_loaded', 'inspiro_hide_notice' );

if ( ! function_exists( 'inspiro_welcome_notice' ) ) {
	/**
	 * Content of Welcome Notice in WordPress Dashboard
	 *
	 * @return void
	 */
	function inspiro_welcome_notice() {


		$plugin_status = inspiro_check_plugin_status( 'inspiro-starter-sites/inspiro-starter-sites.php' );

		$note_html = '';
		
		if ( 'not_installed' === $plugin_status ) {
			$note_html = __( 'Clicking "Starter Sites" will install and activate Inspiro Starter Sites plugin on your WordPress site.', 'inspiro' );
		} elseif ( 'installed' === $plugin_status ) {
			$note_html = __( 'Clicking "Starter Sites" will activate Inspiro Starter Sites plugin on your WordPress site.', 'inspiro' );
		}
	
		?>
		<div class="notice wpz-welcome-notice">
			<a class="notice-dismiss wpz-welcome-notice-hide" href="<?php echo esc_url( wp_nonce_url( remove_query_arg( array( 'activated' ), add_query_arg( 'inspiro-hide-notice', 'welcome' ) ), 'inspiro_hide_notices_nonce', '_inspiro_notice_nonce' ) ); ?>">
				<span class="screen-reader-text">
					<?php echo esc_html__( 'Dismiss this notice.', 'inspiro' ); ?>
				</span>
			</a>

			<div class="wpz-notice-heading">
				<h3><?php echo esc_html__( 'Welcome to Inspiro! &#128075;', 'inspiro' ); ?></h3>
				<p><?php esc_html_e( 'Your Inspiro theme is now ready for use. To guide you through the next steps, we\'ve compiled a collection of helpful resources on this page.', 'inspiro' ); ?></p>
			</div>

			<div class="wpz-notice-content">

				<div class="wpz-notice-image">
					<a href="https://www.wpzoom.com/themes/inspiro-lite/upgrade/?utm_source=wpadmin&utm_medium=adminnotice&utm_campaign=welcome-banner" title="Inspiro Premium" target="_blank"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/admin/inspiro-top.png' ); ?>" width="180" alt="<?php echo esc_attr__( 'Inspiro Premium', 'inspiro' ); ?>" /></a>
				</div>

				<div class="wpz-notice-text">
					<p><?php esc_html_e( 'Explore a vast library of pre-designed sites within Inspiro. Visit our constantly growing collection of demos to find the perfect starting point for your project.', 'inspiro' ); ?></p>

					<div class="wpz-welcome-notice-button">
						<a id="wpz-notice-inspiro-plugin-handle" class="button button-primary" data-plugin-status="<?php echo esc_attr( $plugin_status ); ?>" href="<?php echo esc_url( admin_Url( 'admin.php?page=inspiro-demo' ) ); ?>"><?php esc_html_e( 'Starter Sites', 'inspiro' ); ?></a>
						<a class="button button-secondary" href="<?php echo esc_url( admin_url( 'admin.php?page=inspiro' ) ); ?>">
							<?php esc_html_e( 'Theme Dashboard', 'inspiro' ); ?>
						</a>
					</div>
					<?php
						if ( $note_html ) {
							printf( 
								'<note>%s</note>', 
								wp_kses_post( $note_html )
							);
						}
					?>
				</div>
			</div>

		</div>
		<?php
	}
}