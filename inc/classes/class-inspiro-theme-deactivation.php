<?php
/**
 * Register theme deactivation survey class.
 *
 * @package Inspiro
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Inspiro_Theme_Deactivation Class
 *
 * @since 2.1.0
 */
class Inspiro_Theme_Deactivation {

	const CONTAINER_ID = 'inspiro-theme-deactivate-modal';

	/**
	 * Constructor
	 */
	public function __construct() {
		add_action( 'admin_footer-themes.php', array( $this, 'admin_deactivation_modal' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'wp_ajax_inspiro_theme_deactivation_survey', array( $this, 'handle_survey_submission' ) );
	}

	/**
	 * Enqueue scripts and styles for the deactivation survey.
	 *
	 * @param string $hook_suffix The current admin page.
	 */
	public function enqueue_scripts( $hook_suffix ) {
		if ( 'themes.php' !== $hook_suffix ) {
			return;
		}

		// Enqueue modal script.
		wp_enqueue_script(
			'inspiro-theme-deactivation',
			get_template_directory_uri() . '/assets/js/minified/theme-deactivation.min.js',
			array( 'jquery', 'wp-dom-ready' ),
			INSPIRO_THEME_VERSION,
			true
		);

		$deactivation_form_choices = array(
			array(
				'slug'       => 'broken-or-breaks-plugins',
				'label'      => "It's broken or broke other plugins I'm using",
				'is_checked' => false,
				'text_field' => null,
			),
			array(
				'slug'       => 'not-enough-features',
				'label'      => "It doesn't have the features I am looking for",
				'is_checked' => false,
				'text_field' => 'choice_not_enough_features_text',
			),
			array(
				'slug'       => 'not-responsive',
				'label'      => "It isn't responsive to screen size",
				'is_checked' => false,
				'text_field' => null,
			),
			array(
				'slug'       => 'slow-website-performance',
				'label'      => "It slows down my website's speed/load time",
				'is_checked' => false,
				'text_field' => null,
			),
			array(
				'slug'       => 'lack-of-support',
				'label'      => 'Lack of help or support from WPZOOM',
				'is_checked' => false,
				'text_field' => null,
			),
		);

		// Add "Other Reason" at the end (no randomization).
		$deactivation_form_choices[] = array(
			'slug'       => 'other',
			'label'      => 'Other reason:',
			'is_checked' => false,
			'text_field' => 'choice_other_text',
		);

		$deactivation_labels = array(
			'privacy_disclaimer' => __( 'Please do not include any personal information in your submission. We do not collect or need this information. Please see our <a href="https://www.wpzoom.com/privacy-policy/" target="_blank">privacy policy</a> for details.', 'inspiro' ),
			'consent_checkbox'   => __( 'I consent to sharing my website address, admin email, and technical details to help WPZOOM improve the Inspiro theme.', 'inspiro' ),
			'skip_deactivate'    => __( 'Skip & Switch Theme', 'inspiro' ),
			'submit_deactivate'  => __( 'Submit & Switch Theme', 'inspiro' ),
			'title'              => __( 'Thanks for trying Inspiro. Let us know how we can improve.', 'inspiro' ),
		);

		// Pass data to JavaScript.
		wp_localize_script(
			'inspiro-theme-deactivation',
			'inspiroThemeDeactivateData',
			array(
				'containerId'         => self::CONTAINER_ID,
				'hostname'            => gethostname(),
				'choices'             => $deactivation_form_choices,
				'labels'              => $deactivation_labels,
				'domain'              => site_url(),
				'inspiroThemeVersion' => INSPIRO_THEME_VERSION,
				'wpVersion'           => $GLOBALS['wp_version'],
				'phpVersion'          => PHP_VERSION,
				'isMultisite'         => is_multisite(),
				'activePluginsCount'  => count( get_option( 'active_plugins', array() ) ),
				'adminEmail'          => get_option( 'admin_email' ),
				'ajaxUrl'             => admin_url( 'admin-ajax.php' ),
				'nonce'               => wp_create_nonce( 'inspiro_deactivation_survey' ),
				'remoteApiUrl'        => 'https://ai.wpzoom.com/inspiro-analytics/simple-survey-endpoint.php', // Simple standalone endpoint
			)
		);

		// Enqueue styles.
		wp_enqueue_style(
			'inspiro-theme-deactivation',
			get_template_directory_uri() . '/assets/css/minified/theme-deactivation.min.css',
			array(),
			INSPIRO_THEME_VERSION
		);
	}

	/**
	 * Add Inspiro Theme Deactivation Modal backdrop to the DOM.
	 */
	public function admin_deactivation_modal() {
		?>
		<div id="<?php echo esc_attr( self::CONTAINER_ID ); ?>"></div>
		<?php
	}

	/**
	 * Handle the survey submission via AJAX.
	 */
	public function handle_survey_submission() {
		// Verify nonce.
		if ( ! wp_verify_nonce( $_POST['nonce'], 'inspiro_deactivation_survey' ) ) {
			wp_die( 'Security check failed.' );
		}

		// Check consent status
		$has_consent = filter_var( $_POST['user_consent'] ?? false, FILTER_VALIDATE_BOOLEAN );
		
		$survey_data = array(
			'choices'              => sanitize_text_field( $_POST['choices'] ?? '' ),
			'choice_other_text'    => sanitize_textarea_field( $_POST['choice_other_text'] ?? '' ),
			'choice_not_enough_features_text' => sanitize_textarea_field( $_POST['choice_not_enough_features_text'] ?? '' ),
			'domain'               => sanitize_url( $_POST['domain'] ?? '' ),
			'hostname'             => sanitize_text_field( $_POST['hostname'] ?? '' ),
			'inspiro_theme_version' => sanitize_text_field( $_POST['inspiro_theme_version'] ?? '' ),
			'wp_version'           => sanitize_text_field( $_POST['wp_version'] ?? '' ),
			'language'             => sanitize_text_field( $_POST['language'] ?? '' ),
			'php_version'          => sanitize_text_field( $_POST['php_version'] ?? '' ),
			'is_multisite'         => sanitize_text_field( $_POST['is_multisite'] ?? '' ),
			'active_plugins_count' => sanitize_text_field( $_POST['active_plugins_count'] ?? '' ),
			'timezone_offset'      => sanitize_text_field( $_POST['timezone_offset'] ?? '' ),
			'user_agent'           => sanitize_textarea_field( $_POST['user_agent'] ?? '' ),
			'referrer'             => sanitize_url( $_POST['referrer'] ?? '' ),
			'switching_to_theme'   => sanitize_text_field( $_POST['switching_to_theme'] ?? '' ),
			'user_consent'         => $has_consent,
			'timestamp'            => current_time( 'mysql' ),
		);

		// Only include admin email if user consented
		if ( $has_consent ) {
			$survey_data['admin_email'] = sanitize_email( $_POST['admin_email'] ?? '' );
		}

		// Log the data (you can modify this to send to your analytics service).
		error_log( 'Inspiro Theme Deactivation Survey: ' . wp_json_encode( $survey_data ) );

		// Store in database option for later retrieval.
		$existing_data = get_option( 'inspiro_deactivation_surveys', array() );
		$existing_data[] = $survey_data;
		
		// Keep only the last 100 entries.
		if ( count( $existing_data ) > 100 ) {
			$existing_data = array_slice( $existing_data, -100 );
		}
		
		update_option( 'inspiro_deactivation_surveys', $existing_data );

		wp_send_json_success( array( 'message' => 'Survey submitted successfully.' ) );
	}
}

return new Inspiro_Theme_Deactivation();