<?php
/**
 * Customizer Alignment Control
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 2.0.8
 */

// Prevent direct access.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Inspiro_Customize_Alignment_Control
 */
class Inspiro_Customize_Alignment_Control extends WP_Customize_Control {

	/**
	 * The control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'inspiro-alignment';

	/**
	 * Alignment options
	 *
	 * @access public
	 * @var array
	 */
	public $alignment_options = array();

	/**
	 * Constructor
	 */
	public function __construct( $manager, $id, $args = array() ) {
		parent::__construct( $manager, $id, $args );
		
		// Set default alignment options if not provided
		if ( empty( $this->alignment_options ) ) {
			$this->alignment_options = array(
				'left'   => __( 'Left', 'inspiro' ),
				'center' => __( 'Center', 'inspiro' ),
				'right'  => __( 'Right', 'inspiro' ),
			);
		}
		
		// Ensure choices are available for sanitization
		if ( empty( $this->choices ) ) {
			$this->choices = $this->alignment_options;
		}
	}

	/**
	 * Enqueue control related scripts/styles.
	 */
	public function enqueue() {
		$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
		
		wp_enqueue_script(
			'inspiro-alignment-control',
			get_template_directory_uri() . '/inc/customizer/custom-controls/alignment/alignment' . $suffix . '.js',
			array( 'jquery', 'customize-controls' ),
			INSPIRO_THEME_VERSION,
			true
		);
		
		wp_enqueue_style(
			'inspiro-alignment-control',
			get_template_directory_uri() . '/inc/customizer/custom-controls/alignment/alignment' . $suffix . '.css',
			array(),
			INSPIRO_THEME_VERSION
		);
	}

	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 */
	public function to_json() {
		parent::to_json();
		
		$this->json['defaultValue'] = $this->setting->default;
		$this->json['id']           = $this->id;
		$this->json['value']        = $this->value();
		$this->json['link']         = $this->get_link();
		$this->json['alignmentOptions'] = $this->alignment_options;
	}

	/**
	 * Render a JS template for the content of the alignment control.
	 */
	public function content_template() { ?>
		<label>
			<# if ( data.label ) { #>
				<span class="customize-control-title">
					{{{ data.label }}}
				</span>
			<# } #>
			<# if ( data.description ) { #>
				<span class="description customize-control-description">{{{ data.description }}}</span>
			<# } #>
			
			<!-- Alignment Toggle Buttons -->
			<div class="inspiro-alignment-buttons">
				<button type="button" class="alignment-left <# if ( data.value === 'left' ) { #>active<# } #>" data-alignment="left">
					<span class="dashicons dashicons-editor-alignleft"></span>
				</button>
				<button type="button" class="alignment-center <# if ( data.value === 'center' ) { #>active<# } #>" data-alignment="center">
					<span class="dashicons dashicons-editor-aligncenter"></span>
				</button>
				<button type="button" class="alignment-right <# if ( data.value === 'right' ) { #>active<# } #>" data-alignment="right">
					<span class="dashicons dashicons-editor-alignright"></span>
				</button>
			</div>
		</label>
		<?php
	}
} 