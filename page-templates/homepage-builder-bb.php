<?php
/**
 * Template Name: Homepage (Page Builder)
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.0.0
 * @version 1.0.0
 */

get_header(); ?>

<main id="content" class="clearfix" role="main">

	<div class="builder-wrap">

		<?php
		while ( have_posts() ) :
			the_post();
			?>
            <div class="entry-content">
                <?php the_content(); ?>
            </div>

		<?php endwhile; // end of the loop. ?>

	</div>

</main><!-- #content -->

<?php
get_footer();
