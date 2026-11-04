<?php
/**
 * Starter content set: Personal Blog
 *
 * No hero. The front page lists the latest posts with a sidebar, and the
 * menu links to About and Contact pages. Built from core blocks and the
 * images bundled with the theme.
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$inspiro_img = get_template_directory_uri() . '/assets/images/';

$inspiro_about_content = <<<'HTML'
<!-- wp:image {"sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":"8px"}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="{{img}}StockSnap_PT8C3EOE19.jpg" alt="" style="border-radius:8px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"fontSize":"large"} -->
<h2 class="wp-block-heading has-large-font-size">Hi, I'm Alex. I shoot small films and write about how they get made.</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>This blog started as a notebook. After every shoot I would write down what went wrong, what surprised me, and what I would do differently. At some point the notes got long enough to share, and a few people said they were useful, so here we are.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>I work with small brands, musicians and the occasional documentary. Most of what you will read here is about light, sound, gear that is cheaper than it looks, and the quiet parts of a production day that nobody puts on a reel.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>If you want to work together or just say hello, the <a href="#">contact page</a> is the fastest way to reach me.</p>
<!-- /wp:paragraph -->
HTML;

$inspiro_contact_content = <<<'HTML'
<!-- wp:heading {"fontSize":"large"} -->
<h2 class="wp-block-heading has-large-font-size">Say hello</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>For bookings, collaborations or questions about a post, email is best. I read everything, and I answer within a couple of days unless I'm on a shoot.</p>
<!-- /wp:paragraph -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3,"fontSize":"medium"} -->
<h3 class="wp-block-heading has-medium-font-size">Email</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>hello@example.com</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3,"fontSize":"medium"} -->
<h3 class="wp-block-heading has-medium-font-size">Studio</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>12 Harbour Lane<br>Rotterdam, NL</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3,"fontSize":"medium"} -->
<h3 class="wp-block-heading has-medium-font-size">Elsewhere</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><a href="#">Instagram</a><br><a href="#">Vimeo</a><br><a href="#">Newsletter</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->
HTML;

$inspiro_post_body = <<<'HTML'
<!-- wp:paragraph -->
<p>%s</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>%s</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">What I would do differently</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>%s</p>
<!-- /wp:paragraph -->
HTML;

$inspiro_posts = array(
	'post-one-night' => array(
		'title'   => _x( 'What I learned shooting a music video in one night', 'Theme starter content', 'inspiro' ),
		'excerpt' => _x( 'Twelve hours, one location, no second chances. Notes from a shoot that almost went sideways.', 'Theme starter content', 'inspiro' ),
		'image'   => 'image-dance-floor',
		'body'    => array(
			'We had the venue from eight in the evening until the cleaners arrived at six. The band had rehearsed the song maybe four times. Everything that follows is what I wrote in the van on the way home.',
			'The first lesson is boring and true: the schedule is the film. We lost forty minutes to a lighting setup that looked great on the monitor and terrible through the haze, and those forty minutes came out of the last scene, which was the one that mattered.',
			'Shoot the ending first. Nobody is tired yet, the band still likes each other, and if the night falls apart you have the shot the whole video is built around.',
		),
	),
	'post-natural-light' => array(
		'title'   => _x( 'A beginner\'s guide to natural light', 'Theme starter content', 'inspiro' ),
		'excerpt' => _x( 'Windows, white walls and a cheap reflector will carry you further than a lighting kit you don\'t understand yet.', 'Theme starter content', 'inspiro' ),
		'image'   => 'image-camera-operators',
		'body'    => array(
			'Most of my favourite frames were lit by a window. Not because windows are magic, but because I had to pay attention to where the light was coming from instead of making it come from wherever I wanted.',
			'Start by turning everything off. Walk the room at the time of day you plan to shoot and watch where the light falls. Put your subject at the edge of it, not in the middle, and let one side of the face go a little dark.',
			'Buy a reflector before you buy a light. Learn to bounce before you learn to blast. The kit can wait.',
		),
	),
	'post-prime-lenses' => array(
		'title'   => _x( 'Why I switched to prime lenses', 'Theme starter content', 'inspiro' ),
		'excerpt' => _x( 'Zooms are convenient. Primes made me move my feet, and the footage got better.', 'Theme starter content', 'inspiro' ),
		'image'   => 'image-film-set',
		'body'    => array(
			'For three years I shot everything on a 24-70. It is a brilliant lens and I was lazy with it. I stood in one spot and zoomed, and every shot had the same flat feeling of someone standing in one spot and zooming.',
			'The day I rented a 35 and a 50 I spent the whole shoot walking. Closer for the hands, back for the room, crouched for the kid. The edit cut together like a real scene because the camera had actually been in the scene.',
			'If you only buy one, buy the 35. If you can buy two, add an 85 and skip the 50 for now.',
		),
	),
	'post-packing-list' => array(
		'title'   => _x( 'Packing list for a three-day documentary shoot', 'Theme starter content', 'inspiro' ),
		'excerpt' => _x( 'Everything that goes in the bag, what stays home, and the two things I always forget.', 'Theme starter content', 'inspiro' ),
		'image'   => 'image-gimbal',
		'body'    => array(
			'Documentary work punishes heavy bags. You will carry whatever you bring up stairs, across fields and through airports, so the list below is what survived five years of leaving things at home on purpose.',
			'One body, two primes, one small zoom for the moments you cannot predict. A shotgun mic and two lavs. One LED panel the size of a paperback. Batteries, more batteries, and a card wallet you never let out of your sight.',
			'The two things I always forget are gaffer tape and a spare cable for the monitor. Put them in the bag now, before you read the next post.',
		),
	),
	'post-quiet-hour' => array(
		'title'   => _x( 'The quiet hour before a shoot', 'Theme starter content', 'inspiro' ),
		'excerpt' => _x( 'The best part of the day happens before anyone else arrives.', 'Theme starter content', 'inspiro' ),
		'image'   => 'image-aerial-land',
		'body'    => array(
			'I get to every location an hour early. Not to set up, although I do, but to sit in the room and let it tell me what it wants to be. Every space has a direction it wants the camera to point.',
			'That hour is when I find the window, the wall that will give me a clean background, and the corner where the sound is dead enough for an interview. It is also when I decide what we are not going to shoot, which is the decision that saves the day.',
			'Protect that hour. Put it in the call sheet as your own call time and do not give it away to the client.',
		),
	),
);

$inspiro_post_entries = array();
foreach ( $inspiro_posts as $inspiro_key => $inspiro_post ) {
	$inspiro_post_entries[ $inspiro_key ] = array(
		'post_type'    => 'post',
		'post_title'   => $inspiro_post['title'],
		'post_excerpt' => $inspiro_post['excerpt'],
		'thumbnail'    => '{{' . $inspiro_post['image'] . '}}',
		'post_content' => sprintf( $inspiro_post_body, $inspiro_post['body'][0], $inspiro_post['body'][1], $inspiro_post['body'][2] ),
	);
}

return array(
	'widgets'     => array(
		'sidebar'      => array(
			'search',
			'text_about',
			'recent-posts',
			'categories',
		),
		'blog-sidebar' => array(
			'search',
			'text_about',
			'recent-posts',
			'categories',
		),
		'footer_1'     => array(
			'text_about',
		),
		'footer_2'     => array(
			'recent-posts',
		),
		'footer_3'     => array(
			'search',
		),
	),

	'posts'       => array_merge(
		array(
			'about'   => array(
				'post_type'    => 'page',
				'post_title'   => esc_html_x( 'About', 'Theme starter content', 'inspiro' ),
				'thumbnail'    => '{{image-camera-operators}}',
				'post_content' => str_replace( '{{img}}', $inspiro_img, $inspiro_about_content ),
			),
			'contact' => array(
				'post_type'    => 'page',
				'post_title'   => esc_html_x( 'Contact', 'Theme starter content', 'inspiro' ),
				'thumbnail'    => '{{image-contact}}',
				'post_content' => $inspiro_contact_content,
			),
		),
		$inspiro_post_entries
	),

	'attachments' => array(
		'image-dance-floor'      => array(
			'post_title' => _x( 'On the dance floor', 'Theme starter content', 'inspiro' ),
			'file'       => 'assets/images/StockSnap_356BERTH29.jpg',
		),
		'image-camera-operators' => array(
			'post_title' => _x( 'Camera operators', 'Theme starter content', 'inspiro' ),
			'file'       => 'assets/images/StockSnap_PT8C3EOE19.jpg',
		),
		'image-film-set'         => array(
			'post_title' => _x( 'Film set', 'Theme starter content', 'inspiro' ),
			'file'       => 'assets/images/StockSnap_KV0WLH355C.jpg',
		),
		'image-gimbal'           => array(
			'post_title' => _x( 'Gimbal', 'Theme starter content', 'inspiro' ),
			'file'       => 'assets/images/video-1.jpeg',
		),
		'image-aerial-land'      => array(
			'post_title' => _x( 'Aerial Land', 'Theme starter content', 'inspiro' ),
			'file'       => 'assets/images/StockSnap_M6D1GS9PSL.jpg',
		),
		'image-contact'          => array(
			'post_title' => _x( 'Contact', 'Theme starter content', 'inspiro' ),
			'file'       => 'assets/images/StockSnap_6O7JXC5DC5.jpg',
		),
	),

	// Latest posts on the front page, no static page.
	'options'     => array(
		'show_on_front' => 'posts',
	),

	'theme_mods'  => array(
		'hero_enable'        => false,
		'layout_blog_page'   => 'side-right',
		'layout_single_post' => 'side-right',
	),

	'nav_menus'   => array(
		'primary' => array(
			'name'  => __( 'Main Menu', 'inspiro' ),
			'items' => array(
				'link_home',
				'page_about',
				'page_contact',
			),
		),
	),
);
