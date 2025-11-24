<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.0.0
 * @version 1.0.0
 */

get_header(); ?>

<div class="inner-wrap">
	<?php
	$hero_show = inspiro_get_theme_mod( 'hero_enable' );
	$use_h1 = true; // Default to h1

	if ( is_home() && ! is_front_page() ) {
		// Separate blog page - hero never shows here, always use h1
		$use_h1 = true;
	} elseif ( is_front_page() && is_home() ) {
		// Blog is front page - use h2 only if hero is enabled (hero has h1)
		$use_h1 = ! $hero_show;
	} else {
		// Static front page showing latest posts - hero may show, use h2 if hero enabled
		$use_h1 = ! $hero_show;
	}
	?>

	<?php if ( is_home() && ! is_front_page() ) : ?>
		<header class="page-header">
			<?php if ( $use_h1 ) : ?>
				<h1 class="page-title"><?php single_post_title(); ?></h1>
			<?php else : ?>
				<h2 class="page-title"><?php single_post_title(); ?></h2>
			<?php endif; ?>
		</header>
	<?php else : ?>
	<header class="page-header">
		<?php if ( $use_h1 ) : ?>
			<h1 class="page-title"><?php esc_html_e( 'Latest Posts', 'inspiro' ); ?></h1>
		<?php else : ?>
			<h2 class="page-title"><?php esc_html_e( 'Latest Posts', 'inspiro' ); ?></h2>
		<?php endif; ?>
	</header>
	<?php endif; ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			if ( have_posts() ) :

				// Start the Loop.
				while ( have_posts() ) :
					the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that
					 * will be used instead.
					 */
					get_template_part( 'template-parts/post/content', get_post_format() );
					endwhile;

				the_posts_pagination(
					array(
						'prev_next' => false,
					)
				);
				else :
					get_template_part( 'template-parts/post/content', 'none' );
				endif;

				?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php if ( 'side-right' === inspiro_get_theme_mod( 'layout_blog_page' ) && is_active_sidebar( 'blog-sidebar' ) ) : ?>
		<aside id="secondary" class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'blog-sidebar' ); ?>
		</aside>
	<?php endif ?>

</div><!-- .inner-wrap -->

<?php
get_footer();
