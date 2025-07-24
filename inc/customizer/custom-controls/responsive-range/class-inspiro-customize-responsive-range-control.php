<?php
/**
 * Customize Responsive Range Control class.
 *
 * @package Inspiro
 * @since Inspiro 1.3.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( class_exists( 'WP_Customize_Control' ) ) {

	/**
	 * Responsive range control with device toggles.
	 */
	class Inspiro_Customize_Responsive_Range_Control extends WP_Customize_Control {
		/**
		 * Type.
		 *
		 * @var string
		 */
		public $type = 'inspiro-responsive-range';

		/**
		 * Device settings for responsive controls.
		 *
		 * @var array
		 */
		public $device_settings = array();

		/**
		 * Refresh the parameters passed to the JavaScript via JSON.
		 */
		public function to_json() {
			parent::to_json();
			
			// Get default value from the main setting
			$this->json['defaultValue'] = $this->setting->default;
			$this->json['id']           = $this->id;
			$this->json['value']        = $this->value();
			$this->json['link']         = $this->get_link();
			$this->json['input_attrs']  = $this->input_attrs;
			
			// Get device-specific values
			$devices = array();
			if ( ! empty( $this->device_settings['tablet'] ) ) {
				$tablet_setting = $this->manager->get_setting( $this->device_settings['tablet'] );
				$devices['tablet'] = $tablet_setting ? $tablet_setting->default : '';
			}
			if ( ! empty( $this->device_settings['mobile'] ) ) {
				$mobile_setting = $this->manager->get_setting( $this->device_settings['mobile'] );
				$devices['mobile'] = $mobile_setting ? $mobile_setting->default : '';
			}
			
			$this->json['devices'] = $devices;
		}

		/**
		 * Render a JS template for the content of the responsive range control.
		 */
		public function content_template() { ?>
			<label>
				<# if ( data.label ) { #>
					<span class="customize-control-title">
						{{{ data.label }}}
						<!-- Device Toggle Buttons -->
						<div class="inspiro-responsive-device-buttons">
							<button type="button" class="preview-desktop active" data-device="desktop">
								<span class="dashicons dashicons-desktop"></span>
							</button>
							<button type="button" class="preview-tablet" data-device="tablet">
								<span class="dashicons dashicons-tablet"></span>
							</button>
							<button type="button" class="preview-smartphone" data-device="mobile">
								<span class="dashicons dashicons-smartphone"></span>
							</button>
						</div>
					</span>
				<# } #>
				<# if ( data.description ) { #>
					<span class="description customize-control-description">{{{ data.description }}}</span>
				<# } #>
				<div class="customize-control-content">
					
					<!-- Desktop Controls -->
					<div class="inspiro-device-controls inspiro-device-desktop">
						<input type="range" class="inspiro-control-range" <# for (key in data.input_attrs) { #> {{ key }}="{{ data.input_attrs[ key ] }}" <# } #> value="{{ data.value }}" data-device="desktop"/>
						<input type="number" class="inspiro-control-range-value" <# for (key in data.input_attrs) { #> {{ key }}="{{ data.input_attrs[ key ] }}" <# } #> value="{{ data.value }}" {{{ data.link }}} data-device="desktop" />
					</div>
					
					<!-- Tablet Controls -->
					<div class="inspiro-device-controls inspiro-device-tablet" style="display: none;">
						<input type="range" class="inspiro-control-range" <# for (key in data.input_attrs) { #> {{ key }}="{{ data.input_attrs[ key ] }}" <# } #> value="{{ data.devices.tablet || data.value }}" data-device="tablet"/>
						<input type="number" class="inspiro-control-range-value" <# for (key in data.input_attrs) { #> {{ key }}="{{ data.input_attrs[ key ] }}" <# } #> value="{{ data.devices.tablet || data.value }}" data-device="tablet" />
					</div>
					
					<!-- Mobile Controls -->
					<div class="inspiro-device-controls inspiro-device-mobile" style="display: none;">
						<input type="range" class="inspiro-control-range" <# for (key in data.input_attrs) { #> {{ key }}="{{ data.input_attrs[ key ] }}" <# } #> value="{{ data.devices.mobile || data.value }}" data-device="mobile"/>
						<input type="number" class="inspiro-control-range-value" <# for (key in data.input_attrs) { #> {{ key }}="{{ data.input_attrs[ key ] }}" <# } #> value="{{ data.devices.mobile || data.value }}" data-device="mobile" />
					</div>
				</div>
			</label>
			<?php
		}

		/**
		 * Enqueue control related scripts/styles.
		 */
		public function enqueue() {
			wp_enqueue_script( 'inspiro-responsive-range-control', get_template_directory_uri() . '/inc/customizer/custom-controls/responsive-range/responsive-range.js', array( 'jquery', 'customize-controls' ), INSPIRO_THEME_VERSION, true );
			wp_enqueue_style( 'inspiro-responsive-range-control', get_template_directory_uri() . '/inc/customizer/custom-controls/responsive-range/responsive-range.css', array(), INSPIRO_THEME_VERSION );
		}
	}
}