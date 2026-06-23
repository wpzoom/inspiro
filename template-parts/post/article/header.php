<?php
/**
 * Template part for displaying article header
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.0.0
 * @version 1.0.0
 */

$cover_height = inspiro_get_theme_mod( 'cover-size' );

$featured_image_show       = inspiro_get_theme_mod( 'display_featured_image' );
$featured_image_position   = inspiro_get_theme_mod( 'featured_image_position' );
$featured_image_above_size = inspiro_get_theme_mod( 'featured_image_above_size' );

/*
 * Whether a regular post or page (not the front page) should render the featured image,
 * and in which position: as a header cover background, or above the title.
 */
$show_featured_image  = ( is_single() || ( is_page() && ! inspiro_is_frontpage() ) ) && has_post_thumbnail( get_the_ID() ) && $featured_image_show;
$featured_above_title = $show_featured_image && 'above_title' === $featured_image_position;
$featured_as_cover    = $show_featured_image && ! $featured_above_title;

?>

<?php
if ( is_sticky() && is_home() ) {
	echo inspiro_get_theme_svg( 'thumb-tack' );
}
?>

<?php get_template_part( 'template-parts/post/article/post-thumbnail', get_post_format() ); ?>

<?php
// Featured image as the header cover background (default).
if ( $featured_as_cover ) {
	echo '<div class="entry-cover-image '.$cover_height.'">';
	echo '<div class="single-featured-image-header">';
	echo get_the_post_thumbnail( get_the_ID(), 'inspiro-featured-image' );
	echo '</div><!-- .single-featured-image-header -->';
}

// Featured image above the post title.
if ( $featured_above_title ) {
	echo '<div class="single-featured-image-above">';
	echo '<div class="inner-wrap">';
	echo get_the_post_thumbnail( get_the_ID(), $featured_image_above_size );
	echo '</div><!-- .inner-wrap -->';
	echo '</div><!-- .single-featured-image-above -->';
}
?>

<header class="entry-header">

	<?php
	if ( ( is_single() || ( is_page() && ! inspiro_is_frontpage() ) ) ) {
		echo '<div class="inner-wrap">';
	}

	if ( is_single() ) {
		the_title( '<h1 class="entry-title">', '</h1>' );
	} elseif ( is_front_page() && is_home() ) {
		the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
	} else {
		the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
	}

	if ( 'post' === get_post_type() ) {
		echo '<div class="entry-meta">';
		if ( is_single() ) {
			inspiro_single_entry_meta();
		} else {
			echo inspiro_entry_meta(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		};
		echo '</div><!-- .entry-meta -->';
	}

	if ( ( is_single() || ( is_page() && ! inspiro_is_frontpage() ) ) ) {
		echo '</div><!-- .inner-wrap -->';
	}
	?>
</header><!-- .entry-header -->

<?php
if ( $featured_as_cover ) {
	echo '</div><!-- .entry-cover-image -->';
}
?>
