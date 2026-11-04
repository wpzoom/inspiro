<?php
/**
 * Inspiro Lite Starter Content
 *
 * Inspiro ships several starter content sets. Each set lives in
 * inc/starter-content/{set}.php and returns the array WordPress expects for
 * add_theme_support( 'starter-content' ). The active set is stored in the
 * `inspiro_starter_content_set` option and can be switched from the
 * "Inspiro Starter Content" section of the Customizer while the site is
 * still fresh (WordPress re-imports starter content on every Customizer
 * load until the first Publish).
 *
 * @link https://make.wordpress.org/core/2016/11/30/starter-content-for-themes-in-4-7/
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.0.0
 */

/**
 * The starter content sets the theme offers.
 *
 * @since Inspiro 2.3.0
 *
 * @return array Set id => array( label, description, thumbnail ).
 */
function inspiro_get_starter_content_sets() {
	$sets = array(
		'agency'   => array(
			'label'       => _x( 'Creative Agency', 'Starter content set', 'inspiro' ),
			'description' => __( 'Still-image hero, services, projects and a team. The design from the theme preview.', 'inspiro' ),
			'thumbnail'   => 'assets/images/starter/thumb-agency.jpg',
		),
		'video'    => array(
			'label'       => _x( 'Video Hero', 'Starter content set', 'inspiro' ),
			'description' => __( 'Full-screen video header with a short intro, services and your latest posts.', 'inspiro' ),
			'thumbnail'   => 'assets/images/starter/thumb-video.jpg',
		),
		'blog'     => array(
			'label'       => _x( 'Personal Blog', 'Starter content set', 'inspiro' ),
			'description' => __( 'No hero. Your latest posts with a sidebar, plus About and Contact pages.', 'inspiro' ),
			'thumbnail'   => 'assets/images/starter/thumb-blog.jpg',
		),
		'magazine' => array(
			'label'       => _x( 'Magazine', 'Starter content set', 'inspiro' ),
			'description' => __( 'No hero. Your posts in a full-width three-column grid, plus About and Contact pages.', 'inspiro' ),
			'thumbnail'   => 'assets/images/starter/thumb-magazine.jpg',
		),
	);

	/**
	 * Filters the available starter content sets.
	 *
	 * @since Inspiro 2.3.0
	 *
	 * @param array $sets Set id => array( label, description, thumbnail ).
	 */
	return apply_filters( 'inspiro_starter_content_sets', $sets );
}

/**
 * The default starter content set.
 *
 * @since Inspiro 2.3.0
 *
 * @return string
 */
function inspiro_get_default_starter_content_set() {
	return 'agency';
}

/**
 * The starter content set chosen for this site.
 *
 * Falls back to the default when the option is empty or names a set that
 * no longer exists.
 *
 * @since Inspiro 2.3.0
 *
 * @return string Set id.
 */
function inspiro_get_starter_content_set() {
	$set  = get_option( 'inspiro_starter_content_set', '' );
	$sets = inspiro_get_starter_content_sets();

	if ( ! is_string( $set ) || ! isset( $sets[ $set ] ) ) {
		$set = inspiro_get_default_starter_content_set();
	}

	return $set;
}

/**
 * Function to return the array of starter content for the theme.
 *
 * Passes it through the `inspiro_starter_content` filter before returning.
 *
 * @since Inspiro 1.0.0
 * @since Inspiro 2.3.0 Loads the set chosen in `inspiro_starter_content_set`.
 *
 * @return array A filtered array of args for the starter_content.
 */
function inspiro_get_starter_content() {
	$set  = inspiro_get_starter_content_set();
	$file = INSPIRO_THEME_DIR . 'inc/starter-content/' . $set . '.php';

	if ( ! file_exists( $file ) ) {
		$file = INSPIRO_THEME_DIR . 'inc/starter-content/' . inspiro_get_default_starter_content_set() . '.php';
	}

	$starter_content = require $file; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

	/**
	 * Filters Inspiro array of starter content.
	 *
	 * @since Inspiro 1.0.0
	 * @since Inspiro 2.3.0 Added the `$set` parameter.
	 *
	 * @param array  $starter_content Array of starter content.
	 * @param string $set             The starter content set id.
	 */
	return apply_filters( 'inspiro_starter_content', $starter_content, $set );
}
