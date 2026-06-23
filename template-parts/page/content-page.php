<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.0.0
 * @version 1.0.0
 */

$cover_height = inspiro_get_theme_mod( 'cover-size' );

/*
 * Whether to show the Featured Image as a header cover image.
 * On pages this also respects the global "Display Featured Image in Page Header"
 * option and the per-page "Hide Featured Image" setting.
 */
$show_featured_cover = ( is_single() || ( is_page() && ! inspiro_is_frontpage() ) ) && has_post_thumbnail( get_the_ID() );

if ( $show_featured_cover && is_page() && ! inspiro_page_featured_header_enabled( get_the_ID() ) ) {
	$show_featured_cover = false;
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	/*
	 * If a regular page, and not the front page, show the featured image as header cover image.
	 */
	if ( $show_featured_cover ) {
        echo '<div class="entry-cover-image '.$cover_height.'">';
		echo '<div class="single-featured-image-header">';
		echo get_the_post_thumbnail( get_the_ID(), 'inspiro-featured-image' );
		echo '</div><!-- .single-featured-image-header -->';
	}
	?>

	<header class="entry-header">

		<?php
		// Determine heading level based on whether hero is showing on front page
		$hero_show = inspiro_get_theme_mod( 'hero_enable' );
		$is_frontpage_with_hero = inspiro_is_frontpage() && $hero_show;
		$heading_tag = $is_frontpage_with_hero ? 'h2' : 'h1';

		echo '<div class="inner-wrap">';
		the_title( '<' . $heading_tag . ' class="entry-title">', '</' . $heading_tag . '>' );
		echo '</div><!-- .inner-wrap -->';

		?>

	</header><!-- .entry-header -->

	<?php
	if ( $show_featured_cover ) {
		echo '</div><!-- .entry-cover-image -->';
	}
	?>

	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'inspiro' ),
					'after'  => '</div>',
				)
			);
			?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
