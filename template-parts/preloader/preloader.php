<?php
/**
 * Page preloader overlay.
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! inspiro_is_preloader_enabled() ) {
	return;
}

$inspiro_pl_bg      = inspiro_get_theme_mod( 'preloader_bg_color' );
$inspiro_pl_spinner = inspiro_get_theme_mod( 'preloader_spinner_color' );

$inspiro_pl_style = '';
if ( $inspiro_pl_bg ) {
	$inspiro_pl_style .= '--inspiro-preloader-bg:' . esc_attr( $inspiro_pl_bg ) . ';';
}
if ( $inspiro_pl_spinner ) {
	$inspiro_pl_style .= '--inspiro-preloader-color:' . esc_attr( $inspiro_pl_spinner ) . ';';
}
?>

<div id="inspiro-preloader" class="inspiro-preloader" role="status" aria-label="<?php esc_attr_e( 'Page is loading', 'inspiro' ); ?>" <?php echo $inspiro_pl_style ? 'style="' . esc_attr( $inspiro_pl_style ) . '"' : ''; ?>>
	<div class="inspiro-preloader__spinner" aria-hidden="true"></div>
</div>
