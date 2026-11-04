<?php
/**
 * Starter content set: Magazine
 *
 * The Personal Blog set with a full-width, three-column grid of posts on
 * the front page instead of the list with a sidebar, and a few more posts
 * so the grid has three rows to show. Pages and widgets come from the
 * Blog set.
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$inspiro_blog = require __DIR__ . '/blog.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

$inspiro_post_body = <<<'HTML'
<!-- wp:paragraph -->
<p>%s</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>%s</p>
<!-- /wp:paragraph -->
HTML;

$inspiro_more_posts = array(
	'post-monitor'      => array(
		'title'   => _x( 'Stop looking at the monitor', 'Theme starter content', 'inspiro' ),
		'excerpt' => _x( 'The best thing I did for my directing was to hand the monitor to someone else.', 'Theme starter content', 'inspiro' ),
		'image'   => 'image-monitor',
		'body'    => array(
			'For years I directed from behind a small screen, checking focus and framing while the actual scene happened two metres to my left. The footage was sharp and the performances were flat.',
			'Now the operator owns the frame and I watch the people. If something is wrong with the image, they tell me. If something is wrong with the moment, I am the only one who can see it.',
		),
	),
	'post-first-cut'    => array(
		'title'   => _x( 'Why my first cut is always too long', 'Theme starter content', 'inspiro' ),
		'excerpt' => _x( 'Every edit starts at twice the length it should be. That is not a mistake, it is the method.', 'Theme starter content', 'inspiro' ),
		'image'   => 'image-film-set-2',
		'body'    => array(
			'The first assembly of a three-minute film is usually seven minutes. I keep everything that might work, in the order the script suggests, and I do not judge any of it yet.',
			'The second pass is where the film appears. Cutting from seven minutes to three forces a decision about every shot, and the shots that survive are the ones the film actually needs.',
		),
	),
	'post-sound'        => array(
		'title'   => _x( 'Sound is half the picture', 'Theme starter content', 'inspiro' ),
		'excerpt' => _x( 'Audiences forgive soft focus. They never forgive bad audio.', 'Theme starter content', 'inspiro' ),
		'image'   => 'image-studio-light',
		'body'    => array(
			'I learned this the expensive way: a beautifully lit interview, shot on the best camera I had ever rented, unusable because the air conditioning hummed under every sentence.',
			'Now the sound recordist gets the first ten minutes of every location. If a room cannot be made quiet, we find another room. No shot is worth a take you cannot hear.',
		),
	),
	'post-small-crew'   => array(
		'title'   => _x( 'The case for a crew of three', 'Theme starter content', 'inspiro' ),
		'excerpt' => _x( 'Director, camera, sound. Everything else is a luxury until it is a necessity.', 'Theme starter content', 'inspiro' ),
		'image'   => 'image-contact-2',
		'body'    => array(
			'Small crews move faster, cost less and make people in front of the camera relax. A documentary subject who is comfortable with three people will clam up in front of twelve.',
			'We add people when the job demands it, never because the budget allows it. A gaffer for a night exterior, yes. A second camera for a one-person interview, no.',
		),
	),
);

$inspiro_more_entries = array();
foreach ( $inspiro_more_posts as $inspiro_key => $inspiro_post ) {
	$inspiro_more_entries[ $inspiro_key ] = array(
		'post_type'    => 'post',
		'post_title'   => $inspiro_post['title'],
		'post_excerpt' => $inspiro_post['excerpt'],
		'thumbnail'    => '{{' . $inspiro_post['image'] . '}}',
		'post_content' => sprintf( $inspiro_post_body, $inspiro_post['body'][0], $inspiro_post['body'][1] ),
	);
}

$inspiro_blog['posts'] = array_merge( $inspiro_blog['posts'], $inspiro_more_entries );

$inspiro_blog['attachments'] = array_merge(
	$inspiro_blog['attachments'],
	array(
		'image-monitor'      => array(
			'post_title' => _x( 'Camera monitor', 'Theme starter content', 'inspiro' ),
			'file'       => 'assets/images/StockSnap_RW5R1EB5RC.jpg',
		),
		'image-film-set-2'   => array(
			'post_title' => _x( 'On set', 'Theme starter content', 'inspiro' ),
			'file'       => 'assets/images/video-2.jpeg',
		),
		'image-studio-light' => array(
			'post_title' => _x( 'Studio light', 'Theme starter content', 'inspiro' ),
			'file'       => 'assets/images/video-3.jpeg',
		),
		'image-contact-2'    => array(
			'post_title' => _x( 'Crew', 'Theme starter content', 'inspiro' ),
			'file'       => 'assets/images/StockSnap_6O7JXC5DC5.jpg',
		),
	)
);

// Full-width three-column grid, left-aligned text, no sidebar.
$inspiro_blog['theme_mods'] = array_merge(
	$inspiro_blog['theme_mods'],
	array(
		'blog_layout'        => 'grid',
		'blog_grid_columns'  => '3',
		'blog_text_align'    => 'left',
		'layout_blog_page'   => 'full',
		'layout_single_post' => 'full',
	)
);

// The sidebar is not shown in this layout; keep the footer widgets only.
unset( $inspiro_blog['widgets']['sidebar'], $inspiro_blog['widgets']['blog-sidebar'] );

return $inspiro_blog;
