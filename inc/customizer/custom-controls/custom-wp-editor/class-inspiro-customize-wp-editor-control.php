<?php
/**
 * Create Customized WP Editor Control
 *
 * @package    Inspiro
 * @subpackage Inspiro_Lite
 * @since      Inspiro 1.9.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return;
}

/**
 * WP Editor Control.
 */
class Inspiro_Customize_Copyright_WP_Editor_Control extends WP_Customize_Control {
	/**
	 * Control type.
	 *
	 * @since 1.9.0
	 * @var string $type
	 */
	public $type = 'copyright-wp-editor';

	/**
	 * Send data to _s
	 *
	 * @return array
	 * @see WP_Customize_Control::to_json()
	 */
	public function json() {
		$json                = parent::json();
		$this->json['value'] = $this->value();

		return $json;
	}

	/**
	 * Get editor settings
	 *
	 * @return array
	 */
	private function get_editor_settings() {
		return array(
			'media_buttons' => false, // Show media upload buttons
			'textarea_rows' => 4,
			'teeny'         => true, // Output the minimal editor config
			'quicktags'     => true, // Show Quicktags (Text Mode),
			'tinymce'       => array(
				'toolbar1' => 'bold,italic,underline,|,link,unlink', // Customize the toolbar
				'toolbar2' => '', // Leave empty to remove the second toolbar
				'wpautop'  => false, // Disable auto-paragraphs, don't had effect
			),
		);
	}

	/**
	 * Prepare Custom WP Editor function
	 * @return mixed
	 *
	 * todo: improve to work without prepare_and_return_wp_editor_content(), directly in render or true JS
	 */
	public function prepare_wp_editor_content() {
		if ( ! function_exists( 'wp_editor' ) ) {
			require_once( ABSPATH . WPINC . '/class-wp-editor.php' );
		}

		$settings = $this->get_editor_settings();

		return wp_editor( get_theme_mod( 'footer_copyright_text_setting' ), 'footer_copyright_editor', $settings );
	}

	/**
	 * An Underscore (JS) template for this control's content (but not its container).
	 *
	 * Class variables for this control class are available in the `data` JS object;
	 * export custom variables by overriding {@see WP_Customize_Control::to_json()}.
	 *
	 * @see    WP_Customize_Control::print_template()
	 *
	 * @access protected
	 */
	protected function content_template() {
		?>

		<label>
			<span class="customize-control-title">{{ data.label }}</span>
		</label>

		<?php $this->prepare_wp_editor_content(); ?>
		<p class="description customize-control-description">
			<?php esc_html_e( 'Available tags (click to copy):', 'inspiro' ); ?>
		</p>
		<div class="wpzoom-copyright-tags">
			<?php
			$tags = array(
				'{copyright}'    => '©',
				'{current-year}' => date( 'Y' ),
				'{site-title}'   => get_bloginfo( 'name' ),
			);
			foreach ( $tags as $tag => $preview ) :
			?>
				<div class="wpzoom-copyright-tag-row">
					<input type="text" readonly value="<?php echo esc_attr( $tag ); ?>" class="wpzoom-copyright-tag" onclick="this.select(); document.execCommand('copy');" />
					<span class="wpzoom-copyright-tag-preview">&rarr; <?php echo esc_html( $preview ); ?></span>
				</div>
			<?php endforeach; ?>
		</div>
		<style>
			.wpzoom-copyright-tags {
				display: flex;
				flex-direction: column;
				gap: 4px;
				margin-top: 6px;
			}
			.wpzoom-copyright-tag-row {
				display: flex;
				align-items: center;
				gap: 8px;
			}
			.wpzoom-copyright-tag {
				width: auto !important;
				min-width: 0 !important;
				padding: 2px 8px !important;
				font-family: monospace;
				font-size: 12px;
				cursor: pointer;
				background: #f0f0f1;
				border: 1px solid #c3c4c7;
				border-radius: 3px;
				color: #2c3338;
				text-align: center;
				flex: 0 0 auto;
			}
			.wpzoom-copyright-tag:hover {
				background: #e0e0e0;
			}
			.wpzoom-copyright-tag:focus {
				border-color: #2271b1;
				box-shadow: 0 0 0 1px #2271b1;
				outline: none;
			}
			.wpzoom-copyright-tag-preview {
				font-size: 12px;
				color: #757575;
				font-style: italic;
			}
		</style>
		<?php
	}
}
