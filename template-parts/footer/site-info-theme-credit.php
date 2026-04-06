<?php
/**
 * Theme attribution links (Inspiro / WPZOOM) for the footer.
 *
 * Used by template-parts/footer/site-info.php and the Footer Builder Lite custom_html module.
 *
 * @package Inspiro
 */

?>
<span>
	<a href="<?php echo esc_url( 'https://www.wpzoom.com/themes/inspiro/?utm_source=inspiro-lite&utm_medium=theme&utm_campaign=inspiro-lite-footer' ); ?>" target="_blank" rel="nofollow">Inspiro Theme</a>
	<?php esc_html_e( 'by', 'inspiro' ); ?>
	<a href="<?php echo esc_url( 'https://www.wpzoom.com/' ); ?>" target="_blank" rel="nofollow">WPZOOM</a>
</span>
