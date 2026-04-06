<?php
/**
 * Displays footer site info
 *
 * @package    Inspiro
 * @subpackage Inspiro_Lite
 * @since      Inspiro 1.0.0
 * @version    1.0.0
 */

// It’s essential to include a default value here,
// which should match the one defined in class-inspiro-footer-copyright-config.php for consistency.
$customizer_copyright_text = get_theme_mod( 'footer_copyright_text_setting', 'Copyright {copyright} {current-year} {site-title}' );
?>

<div class="site-info">
	<?php
	if ( function_exists( 'the_privacy_policy_link' ) ) {
		the_privacy_policy_link( '', '<span role="separator" aria-hidden="true"></span>' );
	}
	?>
	<span class="copyright">
		<span>
			<?php if ( $customizer_copyright_text ) : ?>
				<?php echo get_footer_copyright_text($customizer_copyright_text) ; ?>
			<?php endif; ?>
		</span>
		<?php get_template_part( 'template-parts/footer/site-info', 'theme-credit' ); ?>
	</span>
</div><!-- .site-info -->
