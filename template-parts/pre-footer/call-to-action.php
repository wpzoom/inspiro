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

$inspiro_cta_text       = apply_filters( 'inspiro_pre_footer_cta_text', inspiro_get_theme_mod( 'pre_footer_cta_text' ) );
$inspiro_cta_btn_text   = inspiro_get_theme_mod( 'pre_footer_cta_btn_text' );
$inspiro_cta_btn_url    = inspiro_get_theme_mod( 'pre_footer_cta_btn_url' );
$inspiro_cta_btn_new    = (bool) inspiro_get_theme_mod( 'pre_footer_cta_btn_new_tab' );
$inspiro_cta_bg_color   = inspiro_get_theme_mod( 'pre_footer_cta_bg_color' );
$inspiro_cta_text_color = inspiro_get_theme_mod( 'pre_footer_cta_text_color' );

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
