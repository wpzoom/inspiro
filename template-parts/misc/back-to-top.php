<?php
/**
 * Back-to-top button.
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! inspiro_is_back_to_top_enabled() ) {
	return;
}

$inspiro_btt_bg   = inspiro_get_theme_mod( 'back_to_top_bg_color' );
$inspiro_btt_icon = inspiro_get_theme_mod( 'back_to_top_icon_color' );

$inspiro_btt_style = '';
if ( $inspiro_btt_bg ) {
	$inspiro_btt_style .= '--inspiro-btt-bg:' . esc_attr( $inspiro_btt_bg ) . ';';
}
if ( $inspiro_btt_icon ) {
	$inspiro_btt_style .= '--inspiro-btt-icon:' . esc_attr( $inspiro_btt_icon ) . ';';
}
?>

<a
	href="#top"
	id="inspiro-back-to-top"
	class="inspiro-back-to-top"
	aria-label="<?php esc_attr_e( 'Scroll to top', 'inspiro' ); ?>"
	<?php echo $inspiro_btt_style ? 'style="' . esc_attr( $inspiro_btt_style ) . '"' : ''; ?>
>
	<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" aria-hidden="true" focusable="false">
		<path d="M8 3.5 2 9.5l1 1L8 5.5l5 5 1-1z" fill="currentColor"/>
	</svg>
	<span class="screen-reader-text"><?php esc_html_e( 'Scroll to top', 'inspiro' ); ?></span>
</a>
