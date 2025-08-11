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

	<div class="builder-wrap full-width">

        <article id="post-<?php the_ID(); ?>">

            <div class="entry-content">
                <?php the_content(); ?>
            </div><!-- .entry-content -->

        </article><!-- #post-## -->

    </div><!-- .full-width -->

</main><!-- #content -->

<?php
get_footer();
