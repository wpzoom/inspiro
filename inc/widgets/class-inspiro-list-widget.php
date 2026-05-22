<?php
/**
 * Inspiro Lite — List widget.
 *
 * A simple "icon + line of text" repeatable list widget for sidebars and the
 * footer. Adapted from Prisma Companion's Custom List Widget but trimmed to
 * five fixed slots, so it works without a JS repeater UI.
 *
 * Each slot accepts:
 *   - Icon (SVG markup, dashicons class, or emoji)
 *   - Text (HTML allowed via wp_kses_post)
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Inspiro_List_Widget' ) ) {

	/**
	 * Inspiro list widget.
	 *
	 * @since 2.2.0
	 */
	class Inspiro_List_Widget extends WP_Widget {

		/**
		 * Number of repeatable slots.
		 */
		const MAX_ITEMS = 5;

		/**
		 * Constructor.
		 */
		public function __construct() {
			parent::__construct(
				'inspiro_list_widget',
				__( '[Inspiro] List', 'inspiro' ),
				array(
					'classname'                   => 'inspiro-list-widget',
					'description'                 => __( 'A simple list of items with an icon (SVG, dashicon class, or emoji) and a line of text.', 'inspiro' ),
					'customize_selective_refresh' => true,
				)
			);
		}

		/**
		 * Render the widget on the front end.
		 *
		 * @param array $args     Widget args (theme-provided).
		 * @param array $instance Widget instance settings.
		 */
		public function widget( $args, $instance ) {
			echo $args['before_widget']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

			$title = isset( $instance['title'] ) ? $instance['title'] : '';
			if ( '' !== trim( $title ) ) {
				echo $args['before_title'] . esc_html( $title ) . $args['after_title']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

			echo '<ul class="inspiro-list-widget__items">';
			for ( $i = 1; $i <= self::MAX_ITEMS; $i++ ) {
				$icon = isset( $instance[ 'icon_' . $i ] ) ? $instance[ 'icon_' . $i ] : '';
				$text = isset( $instance[ 'text_' . $i ] ) ? $instance[ 'text_' . $i ] : '';

				if ( '' === trim( $icon ) && '' === trim( $text ) ) {
					continue;
				}

				echo '<li class="inspiro-list-widget__item">';
				if ( '' !== trim( $icon ) ) {
					echo '<span class="inspiro-list-widget__icon">' . $this->render_icon( $icon ) . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				}
				if ( '' !== trim( $text ) ) {
					echo '<span class="inspiro-list-widget__text">' . wp_kses_post( $text ) . '</span>';
				}
				echo '</li>';
			}
			echo '</ul>';

			echo $args['after_widget']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}

		/**
		 * Render an icon — detects SVG, dashicons class, or plain text/emoji.
		 *
		 * @param string $icon Raw user input.
		 * @return string Escaped HTML.
		 */
		protected function render_icon( $icon ) {
			$icon = trim( $icon );

			// Raw SVG — allow only safe SVG tags/attrs.
			if ( false !== strpos( $icon, '<svg' ) ) {
				return wp_kses(
					$icon,
					array(
						'svg'     => array(
							'class'       => true,
							'xmlns'       => true,
							'width'       => true,
							'height'      => true,
							'viewbox'     => true,
							'fill'        => true,
							'stroke'      => true,
							'stroke-width'   => true,
							'stroke-linecap' => true,
							'stroke-linejoin'=> true,
							'aria-hidden' => true,
							'focusable'   => true,
							'role'        => true,
						),
						'path'    => array( 'd' => true, 'fill' => true, 'stroke' => true ),
						'circle'  => array( 'cx' => true, 'cy' => true, 'r' => true, 'fill' => true, 'stroke' => true ),
						'rect'    => array( 'x' => true, 'y' => true, 'width' => true, 'height' => true, 'fill' => true, 'stroke' => true, 'rx' => true, 'ry' => true ),
						'line'    => array( 'x1' => true, 'y1' => true, 'x2' => true, 'y2' => true, 'stroke' => true ),
						'polygon' => array( 'points' => true, 'fill' => true, 'stroke' => true ),
						'polyline'=> array( 'points' => true, 'fill' => true, 'stroke' => true ),
						'g'       => array( 'fill' => true, 'stroke' => true, 'transform' => true ),
					)
				);
			}

			// Dashicons class — e.g. "dashicons dashicons-email"
			if ( 0 === strpos( $icon, 'dashicons' ) ) {
				return '<span class="' . esc_attr( $icon ) . '" aria-hidden="true"></span>';
			}

			// Fallback: treat as plain text (emoji, single letter, etc.)
			return esc_html( $icon );
		}

		/**
		 * Save widget settings.
		 *
		 * @param array $new New instance.
		 * @param array $old Previous instance.
		 * @return array
		 */
		public function update( $new, $old ) {
			$out          = array();
			$out['title'] = isset( $new['title'] ) ? sanitize_text_field( $new['title'] ) : '';

			for ( $i = 1; $i <= self::MAX_ITEMS; $i++ ) {
				$out[ 'icon_' . $i ] = isset( $new[ 'icon_' . $i ] ) ? wp_unslash( $new[ 'icon_' . $i ] ) : '';
				$out[ 'text_' . $i ] = isset( $new[ 'text_' . $i ] ) ? wp_kses_post( wp_unslash( $new[ 'text_' . $i ] ) ) : '';
			}

			return $out;
		}

		/**
		 * Render the widget admin form.
		 *
		 * @param array $instance Current instance settings.
		 */
		public function form( $instance ) {
			$title = isset( $instance['title'] ) ? $instance['title'] : '';
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
					<?php esc_html_e( 'Title:', 'inspiro' ); ?>
				</label>
				<input
					class="widefat"
					type="text"
					id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
					name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
					value="<?php echo esc_attr( $title ); ?>"
				/>
			</p>

			<?php
			for ( $i = 1; $i <= self::MAX_ITEMS; $i++ ) {
				$icon = isset( $instance[ 'icon_' . $i ] ) ? $instance[ 'icon_' . $i ] : '';
				$text = isset( $instance[ 'text_' . $i ] ) ? $instance[ 'text_' . $i ] : '';
				?>
				<fieldset style="border:1px solid #dcdcde; padding:8px 10px; margin-bottom:10px;">
					<legend style="padding:0 4px; font-weight:600;">
						<?php /* translators: %d: list item number. */ printf( esc_html__( 'Item %d', 'inspiro' ), (int) $i ); ?>
					</legend>
					<p style="margin-top:6px;">
						<label for="<?php echo esc_attr( $this->get_field_id( 'icon_' . $i ) ); ?>">
							<?php esc_html_e( 'Icon', 'inspiro' ); ?>
							<small style="font-weight:normal;color:#646970;">
								(<?php esc_html_e( 'SVG, dashicons class, or emoji', 'inspiro' ); ?>)
							</small>
						</label>
						<textarea
							class="widefat code"
							rows="2"
							id="<?php echo esc_attr( $this->get_field_id( 'icon_' . $i ) ); ?>"
							name="<?php echo esc_attr( $this->get_field_name( 'icon_' . $i ) ); ?>"
						><?php echo esc_textarea( $icon ); ?></textarea>
					</p>
					<p>
						<label for="<?php echo esc_attr( $this->get_field_id( 'text_' . $i ) ); ?>">
							<?php esc_html_e( 'Text (HTML allowed)', 'inspiro' ); ?>
						</label>
						<textarea
							class="widefat"
							rows="2"
							id="<?php echo esc_attr( $this->get_field_id( 'text_' . $i ) ); ?>"
							name="<?php echo esc_attr( $this->get_field_name( 'text_' . $i ) ); ?>"
						><?php echo esc_textarea( $text ); ?></textarea>
					</p>
				</fieldset>
				<?php
			}
		}
	}
}

if ( ! function_exists( 'inspiro_register_list_widget' ) ) {
	/**
	 * Register the list widget.
	 */
	function inspiro_register_list_widget() {
		register_widget( 'Inspiro_List_Widget' );
	}
}
add_action( 'widgets_init', 'inspiro_register_list_widget' );
