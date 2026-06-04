<?php
/**
 * Optional topbar displayed above the header.
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! inspiro_is_topbar_enabled() ) {
	return;
}

// Defaults declared here mirror those in Inspiro_Topbar_Config — kept inline
// because the constructor-style config doesn't publish its defaults into
// Inspiro_Customizer::$customizer_data the way the static config() pattern
// does, so inspiro_get_theme_mod() can't fall back to them automatically.
$inspiro_topbar_left  = get_theme_mod( 'topbar_left_text', '' );
$inspiro_topbar_right = get_theme_mod( 'topbar_right_text', '' );
$inspiro_topbar_bg    = get_theme_mod( 'topbar_bg_color', '#000000' );
$inspiro_topbar_text  = get_theme_mod( 'topbar_text_color', '#ffffff' );
$inspiro_topbar_link  = get_theme_mod( 'topbar_link_color', '#ffffff' );

$inspiro_topbar_style = '';
if ( $inspiro_topbar_bg ) {
	$inspiro_topbar_style .= '--inspiro-topbar-bg:' . esc_attr( $inspiro_topbar_bg ) . ';';
}
if ( $inspiro_topbar_text ) {
	$inspiro_topbar_style .= '--inspiro-topbar-color:' . esc_attr( $inspiro_topbar_text ) . ';';
}
if ( $inspiro_topbar_link ) {
	$inspiro_topbar_style .= '--inspiro-topbar-link:' . esc_attr( $inspiro_topbar_link ) . ';';
}

if ( '' === trim( wp_strip_all_tags( $inspiro_topbar_left ) ) && '' === trim( wp_strip_all_tags( $inspiro_topbar_right ) ) && ! is_customize_preview() ) {
	return;
}
?>

<div id="inspiro-topbar" class="inspiro-topbar" <?php echo $inspiro_topbar_style ? 'style="' . esc_attr( $inspiro_topbar_style ) . '"' : ''; ?>>
	<div class="inner-wrap inspiro-topbar__inner">
		<div class="topbar-col topbar-col--left">
			<?php echo wp_kses_post( $inspiro_topbar_left ); ?>
		</div>
		<div class="topbar-col topbar-col--right">
			<?php echo wp_kses_post( $inspiro_topbar_right ); ?>
		</div>
	</div>
</div>
