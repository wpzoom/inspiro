<?php
/**
 * Pre-footer call-to-action section.
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Defaults declared here mirror those in Inspiro_Pre_Footer_Cta_Config — kept
// inline because the constructor-style config doesn't publish its defaults
// into Inspiro_Customizer::$customizer_data the way the static config()
// pattern does, so inspiro_get_theme_mod() can't fall back to them.
$inspiro_cta_text       = apply_filters( 'inspiro_pre_footer_cta_text', get_theme_mod( 'pre_footer_cta_text', esc_html__( 'Ready to start your next project with us?', 'inspiro' ) ) );
$inspiro_cta_btn_text   = get_theme_mod( 'pre_footer_cta_btn_text', esc_html__( 'Get in touch', 'inspiro' ) );
$inspiro_cta_btn_url    = get_theme_mod( 'pre_footer_cta_btn_url', '#' );
$inspiro_cta_btn_new    = (bool) get_theme_mod( 'pre_footer_cta_btn_new_tab', false );
$inspiro_cta_bg_color   = get_theme_mod( 'pre_footer_cta_bg_color', '#111111' );
$inspiro_cta_text_color = get_theme_mod( 'pre_footer_cta_text_color', '#ffffff' );

$inspiro_cta_style = '';
if ( $inspiro_cta_bg_color ) {
	$inspiro_cta_style .= 'background-color:' . esc_attr( $inspiro_cta_bg_color ) . ';';
}
if ( $inspiro_cta_text_color ) {
	$inspiro_cta_style .= 'color:' . esc_attr( $inspiro_cta_text_color ) . ';';
}
?>

<div class="inspiro-pre-footer-cta" <?php echo $inspiro_cta_style ? 'style="' . esc_attr( $inspiro_cta_style ) . '"' : ''; ?>>
	<div class="inspiro-pre-footer-cta__inner">
		<div class="pre-footer-cta-text">
			<?php echo wp_kses_post( wpautop( $inspiro_cta_text ) ); ?>
		</div>

		<?php if ( $inspiro_cta_btn_text || is_customize_preview() ) : ?>
			<div class="pre-footer-cta-button-wrap">
				<a
					href="<?php echo esc_url( $inspiro_cta_btn_url ? $inspiro_cta_btn_url : '#' ); ?>"
					class="pre-footer-cta-button button"
					<?php echo $inspiro_cta_btn_new ? 'target="_blank" rel="noopener noreferrer"' : ''; ?>
				>
					<?php echo esc_html( $inspiro_cta_btn_text ); ?>
				</a>
			</div>
		<?php endif; ?>
	</div>
</div>
