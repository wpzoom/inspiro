<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.0.0
 * @version 1.0.0
 */

get_header();

// Pages without a Featured Image header cover use a constrained content wrapper.
// The cover is skipped when the page has no thumbnail, the global "Display
// Featured Image in Page Header" option is off, or it's hidden for this page.
$inspiro_page_without_cover = ( is_page() && ! inspiro_is_frontpage() )
	&& ( ! has_post_thumbnail( get_queried_object_id() ) || ! inspiro_page_featured_header_enabled() );
?>

<?php if ( $inspiro_page_without_cover ) : ?>

<div class="inner-wrap">
	<div id="primary" class="content-area">

<?php endif ?>

		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/page/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			endwhile; // End the loop.
			?>

		</main><!-- #main -->

<?php if ( $inspiro_page_without_cover ) : ?>

	</div><!-- #primary -->
</div><!-- .inner-wrap -->

<?php endif ?>

<?php
get_footer();
