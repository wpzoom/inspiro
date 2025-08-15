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
		add_action( 'admin_footer-theme-install.php', array( $this, 'admin_deactivation_modal' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'wp_ajax_inspiro_theme_deactivation_survey', array( $this, 'handle_survey_submission' ) );
	}

	/**
	 * Enqueue scripts and styles for the deactivation survey.
	 *
	 * @param string $hook_suffix The current admin page.
	 */
	public function enqueue_scripts( $hook_suffix ) {
		if ( 'themes.php' !== $hook_suffix && 'theme-install.php' !== $hook_suffix ) {
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
				'slug'       => 'technical-issues',
				'label'      => 'I experienced technical issues or bugs',
				'is_checked' => false,
				'text_field' => 'choice_technical_issues_text',
			),
			array(
				'slug'       => 'plugin-compatibility',
				'label'      => 'Not compatible with plugins I use',
				'is_checked' => false,
				'text_field' => 'choice_plugin_compatibility_text',
			),
			array(
				'slug'       => 'missing-features',
				'label'      => "It doesn't have the features I am looking for",
				'is_checked' => false,
				'text_field' => null,
				'features_options' => array(
					'more-starter-sites' => 'More starter sites/demos',
					'more-customization' => 'More customization options (colors, fonts, layouts)',
					'better-integration' => 'Better integration with plugins (WooCommerce, Elementor, etc.)',
					'seo-performance' => 'SEO/Performance features',
					'other-feature' => 'Other',
				),
			),
			array(
				'slug'       => 'slow-performance',
				'label'      => "It slows down my website's speed/load time",
				'is_checked' => false,
				'text_field' => null,
			),
			array(
				'slug'       => 'found-better-theme',
				'label'      => 'I found another theme that better fits my needs',
				'is_checked' => false,
				'text_field' => null,
			),
			array(
				'slug'       => 'lack-of-support',
				'label'      => 'Lack of help or support',
				'is_checked' => false,
				'text_field' => 'choice_lack_of_support_text',
			),
			array(
				'slug'       => 'other',
				'label'      => 'Other reason',
				'is_checked' => false,
				'text_field' => 'choice_other_text',
			),
		);

		$deactivation_labels = array(
			'privacy_disclaimer' => __( 'Please do not include any personal information in your submission. Please see our <a href="https://www.wpzoom.com/privacy-policy/" target="_blank">privacy policy</a> for details.', 'inspiro' ),
			'consent_checkbox'   => __( 'I consent to sharing my website technical details to help WPZOOM improve the Inspiro theme.', 'inspiro' ),
			'skip_deactivate'    => __( 'Skip & Switch Theme', 'inspiro' ),
			'submit_deactivate'  => __( 'Submit & Switch Theme', 'inspiro' ),
			'title'              => __( 'Help us improve Inspiro Lite', 'inspiro' ),
		);

		// Get theme usage duration
		$usage_data = inspiro_get_theme_usage_duration();

		// Pass data to JavaScript.
		wp_localize_script(
			'inspiro-theme-deactivation',
			'inspiroThemeDeactivateData',
			array(
				'containerId'         => self::CONTAINER_ID,
				'hostname'            => gethostname(),
				'choices'             => $deactivation_form_choices,
				'labels'              => $deactivation_labels,
				'domain'              => home_url(),
				'inspiroThemeVersion' => INSPIRO_THEME_VERSION,
				'wpVersion'           => $GLOBALS['wp_version'],
				'phpVersion'          => PHP_VERSION,
				'isMultisite'         => is_multisite(),
				'activePluginsCount'  => count( get_option( 'active_plugins', array() ) ),
				'adminEmail'          => get_option( 'admin_email' ),
				'ajaxUrl'             => admin_url( 'admin-ajax.php' ),
				'nonce'               => wp_create_nonce( 'inspiro_deactivation_survey' ),
				'remoteApiUrl'        => 'https://ai.wpzoom.com/simple-survey-endpoint.php', // Simple standalone endpoint
				'usageData'           => $usage_data,
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
		
		// Get current usage duration for the survey
		$usage_data = inspiro_get_theme_usage_duration();
		
		$survey_data = array(
			'choices'                           => sanitize_text_field( $_POST['choices'] ?? '' ),
			'choice_technical_issues_text'      => sanitize_textarea_field( $_POST['choice_technical_issues_text'] ?? '' ),
			'choice_plugin_compatibility_text'  => sanitize_textarea_field( $_POST['choice_plugin_compatibility_text'] ?? '' ),
			'choice_missing_features'           => sanitize_text_field( $_POST['choice_missing_features'] ?? '' ),
			'choice_missing_features_other_text' => sanitize_textarea_field( $_POST['choice_missing_features_other_text'] ?? '' ),
			'choice_lack_of_support_text'       => sanitize_textarea_field( $_POST['choice_lack_of_support_text'] ?? '' ),
			'choice_other_text'                 => sanitize_textarea_field( $_POST['choice_other_text'] ?? '' ),
			'domain'                            => esc_url( $_POST['domain'] ?? '' ),
			'hostname'                          => sanitize_text_field( $_POST['hostname'] ?? '' ),
			'inspiro_theme_version'             => sanitize_text_field( $_POST['inspiro_theme_version'] ?? '' ),
			'wp_version'                        => sanitize_text_field( $_POST['wp_version'] ?? '' ),
			'language'                          => sanitize_text_field( $_POST['language'] ?? '' ),
			'php_version'                       => sanitize_text_field( $_POST['php_version'] ?? '' ),
			'is_multisite'                      => sanitize_text_field( $_POST['is_multisite'] ?? '' ),
			'active_plugins_count'              => sanitize_text_field( $_POST['active_plugins_count'] ?? '' ),
			'timezone_offset'                   => sanitize_text_field( $_POST['timezone_offset'] ?? '' ),
			'user_agent'                        => sanitize_textarea_field( $_POST['user_agent'] ?? '' ),
			'referrer'                          => esc_url( $_POST['referrer'] ?? '' ),
			'switching_to_theme'                => sanitize_text_field( $_POST['switching_to_theme'] ?? '' ),
			'user_consent'                      => $has_consent,
			'timestamp'                         => current_time( 'mysql' ),
			'usage_duration_seconds'            => $usage_data['usage_seconds'] ?? 0,
			'usage_duration_days'               => $usage_data['usage_days'] ?? 0,
			'usage_duration_formatted'          => $usage_data['formatted'] ?? 'Unknown',
			'theme_activated_at'                => $usage_data['activated_at'] ?? null,
			'nps_score'                         => intval( $_POST['nps_score'] ?? null ),
		);

		// Only include admin email if user consented
		if ( $has_consent ) {
			$survey_data['admin_email'] = sanitize_email( $_POST['admin_email'] ?? '' );
		}

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