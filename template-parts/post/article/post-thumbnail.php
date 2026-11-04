<?php
/**
 * Template part for displaying article post thumbnail
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.0.0
 * @version 1.0.0
 */

?>

<?php
$inspiro_thumbnail_size = get_theme_mod( 'blog_thumbnail_size', 'inspiro-loop' );

// The default loop size is a wide 950x320 crop made for the list layout.
// The grid shows landscape 3:2 images, so it uses an uncropped size instead
// unless a specific size was chosen in the Customizer.
if ( 'inspiro-loop' === $inspiro_thumbnail_size && function_exists( 'inspiro_is_blog_layout_grid' ) && inspiro_is_blog_layout_grid() ) {
	$inspiro_thumbnail_size = 'large';
}
?>

<?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
	<div class="post-thumbnail">
		<a href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail( $inspiro_thumbnail_size ); ?>
		</a>
	</div><!-- .post-thumbnail -->
<?php endif; ?>
