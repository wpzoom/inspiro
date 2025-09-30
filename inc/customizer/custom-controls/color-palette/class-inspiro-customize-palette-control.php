<?php
/**
 * Customize Palette Control class.
 *
 * @package Inspiro
 * @since Inspiro 2.2.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( class_exists( 'WP_Customize_Control' ) ) {

	/**
	 * Visual Color Palette Selector Control
	 */
	class Inspiro_Customize_Palette_Control extends WP_Customize_Control {
		/**
		 * Type.
		 *
		 * @var string
		 */
		public $type = 'inspiro-palette';

		/**
		 * Palettes data.
		 *
		 * @var array
		 */
		public $palettes = array();

		/**
		 * Enqueue control related scripts/styles.
		 */
		public function enqueue() {
			wp_enqueue_style(
				'inspiro-palette-control',
				get_template_directory_uri() . '/inc/customizer/custom-controls/color-palette/palette-control.css',
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
			$this->json['palettes']     = $this->get_palettes_data();
		}

		/**
		 * Get palettes data for JSON.
		 *
		 * @return array
		 */
		private function get_palettes_data() {
			$palettes = inspiro_get_color_palettes();
			$data     = array();

			foreach ( $palettes as $palette_id => $palette_info ) {
				$data[ $palette_id ] = array(
					'id'          => $palette_id,
					'label'       => $palette_info['label'],
					'colors'      => $palette_info['colors'],
					'theme_colors'=> isset( $palette_info['theme_colors'] ) ? $palette_info['theme_colors'] : array(),
				);
			}

			return $data;
		}

		/**
		 * Render a JS template for the content of the palette control.
		 */
		public function content_template() {
			?>
			<label>
				<# if ( data.label ) { #>
					<span class="customize-control-title">{{{ data.label }}}</span>
				<# } #>
				<# if ( data.description ) { #>
					<span class="description customize-control-description">{{{ data.description }}}</span>
				<# } #>
				<div class="customize-control-content inspiro-palette-control-wrapper">
					<input type="hidden" class="inspiro-palette-input" value="{{ data.value }}" {{{ data.link }}} />
					<div class="inspiro-palette-options">
						<# _.each( data.palettes, function( palette ) { #>
							<div class="inspiro-palette-option {{ data.value === palette.id ? 'selected' : '' }}" data-palette="{{ palette.id }}">
								<div class="inspiro-palette-header">
									<span class="inspiro-palette-label">{{ palette.label }}</span>
								</div>
								<div class="inspiro-palette-colors">
									<# _.each( palette.colors, function( color, key ) { #>
										<span class="inspiro-palette-color" style="background-color: {{ color }}" title="{{ key }}: {{ color }}"></span>
									<# }); #>
								</div>
							</div>
						<# }); #>
					</div>
				</div>
			</label>
			<?php
		}
	}
}