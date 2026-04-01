<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.0.0
 * @version 1.0.0
 */

?>

		</div><!-- #content -->

		<?php get_template_part( 'template-parts/footer/footer', 'instagram-widget' ); ?>

		<?php $footer_builder_enabled = (bool) get_theme_mod( 'inspiro_footer_builder_enable', false ); ?>
		<?php if ( $footer_builder_enabled && class_exists( 'Inspiro_Lite_Footer_Builder' ) ) : ?>
			<?php Inspiro_Lite_Footer_Builder::get_instance()->render_footer(); ?>
		<?php else : ?>
			<footer id="colophon" <?php inspiro_footer_class(); ?> role="contentinfo">
				<div class="inner-wrap">
					<?php
					get_template_part( 'template-parts/footer/footer', 'widgets' );

					get_template_part( 'template-parts/footer/site', 'info' );
					?>
				</div><!-- .inner-wrap -->
			</footer><!-- #colophon -->
		<?php endif; ?>
	</div><!-- .site-content-contain -->
</div><!-- #page -->
<?php wp_footer(); ?>

</body>
</html>
