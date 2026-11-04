<?php
/**
 * Starter content set: Creative Agency
 *
 * The page from the theme preview on WordPress.org: a still-image hero,
 * about, projects, services, process, team, testimonials, latest posts and
 * a call to action. Core blocks only, images bundled with the theme.
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$inspiro_img = get_template_directory_uri() . '/assets/images/';

$inspiro_home_content = <<<'HTML'
<!-- wp:cover {"url":"{{img}}starter/agency-hero.jpg","isUserOverlayColor":true,"minHeight":100,"minHeightUnit":"vh","customGradient":"linear-gradient(0deg,rgb(16,16,16) 3%,rgba(15,15,15,0) 98%)","contentPosition":"bottom center","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|x-small","right":"var:preset|spacing|x-small"},"margin":{"bottom":"0"}}},"layout":{"type":"constrained","contentSize":"1280px"}} -->
<div class="wp-block-cover alignfull has-custom-content-position is-position-bottom-center" style="margin-bottom:0;padding-top:var(--wp--preset--spacing--x-large);padding-right:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--x-small);min-height:100vh"><img class="wp-block-cover__image-background" alt="" src="{{img}}starter/agency-hero.jpg" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim wp-block-cover__gradient-background has-background-gradient" style="background:linear-gradient(0deg,rgb(16,16,16) 3%,rgba(15,15,15,0) 98%)"></span><div class="wp-block-cover__inner-container"><!-- wp:columns {"verticalAlignment":"bottom","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|medium"}}}} -->
<div class="wp-block-columns are-vertically-aligned-bottom" style="margin-bottom:var(--wp--preset--spacing--medium)"><!-- wp:column {"verticalAlignment":"bottom","width":"60%","style":{"spacing":{"blockGap":"0"}}} -->
<div class="wp-block-column is-vertically-aligned-bottom" style="flex-basis:60%"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px","textTransform":"uppercase"}},"textColor":"white","fontSize":"x-small"} -->
<p class="has-white-color has-text-color has-x-small-font-size" style="letter-spacing:2px;text-transform:uppercase">We are</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1,"style":{"typography":{"fontStyle":"normal","fontWeight":"700","lineHeight":"1"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"white","fontSize":"max-72"} -->
<h1 class="wp-block-heading has-white-color has-text-color has-max-72-font-size" style="margin-top:0;margin-bottom:0;font-style:normal;font-weight:700;line-height:1">Inspiro</h1>
<!-- /wp:heading --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"bottom","width":"40%"} -->
<div class="wp-block-column is-vertically-aligned-bottom" style="flex-basis:40%"><!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"0"}}},"textColor":"white","fontSize":"small"} -->
<p class="has-white-color has-text-color has-small-font-size" style="margin-bottom:0">Inspiro is a video production studio crafting cinematic brand films, campaign content, and documentary storytelling for brands that want to be felt, not just seen.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:columns {"verticalAlignment":"center"} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"30%","style":{"spacing":{"blockGap":"0"}}} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:30%"><!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"0"}}},"textColor":"white","fontSize":"small"} -->
<p class="has-white-color has-text-color has-small-font-size" style="margin-bottom:0">★★★★★ &nbsp;4.9/5</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"color":{"text":"#b5b5b5"}},"fontSize":"x-small"} -->
<p class="has-text-color has-x-small-font-size" style="color:#b5b5b5">Trusted by 120+ studios &amp; startups</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"70%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:70%"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"color":{"text":"#b5b5b5"},"typography":{"fontStyle":"normal","fontWeight":"600","letterSpacing":"1px"}},"fontSize":"small"} -->
<p class="has-text-color has-small-font-size" style="color:#b5b5b5;font-style:normal;font-weight:600;letter-spacing:1px">AURUM</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"color":{"text":"#b5b5b5"},"typography":{"fontStyle":"normal","fontWeight":"600","letterSpacing":"1px"}},"fontSize":"small"} -->
<p class="has-text-color has-small-font-size" style="color:#b5b5b5;font-style:normal;font-weight:600;letter-spacing:1px">DWELL</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"color":{"text":"#b5b5b5"},"typography":{"fontStyle":"normal","fontWeight":"600","letterSpacing":"1px"}},"fontSize":"small"} -->
<p class="has-text-color has-small-font-size" style="color:#b5b5b5;font-style:normal;font-weight:600;letter-spacing:1px">FIELDWORK</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"color":{"text":"#b5b5b5"},"typography":{"fontStyle":"normal","fontWeight":"600","letterSpacing":"1px"}},"fontSize":"small"} -->
<p class="has-text-color has-small-font-size" style="color:#b5b5b5;font-style:normal;font-weight:600;letter-spacing:1px">NORTHLINE</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|x-small","right":"var:preset|spacing|x-small"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--x-large);padding-right:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--x-small)"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"width":"55%"} -->
<div class="wp-block-column" style="flex-basis:55%"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"1px"}},"textColor":"tertiary","fontSize":"x-small"} -->
<p class="has-tertiary-color has-text-color has-x-small-font-size" style="letter-spacing:1px">About us</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"500","lineHeight":"1.2"}},"fontSize":"large"} -->
<h2 class="wp-block-heading has-large-font-size" style="font-style:normal;font-weight:500;line-height:1.2">We believe the most powerful thing a brand can do is make its audience feel something real.</h2>
<!-- /wp:heading --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"45%","style":{"spacing":{"padding":{"left":"var:preset|spacing|small"}}}} -->
<div class="wp-block-column" style="padding-left:var(--wp--preset--spacing--small);flex-basis:45%"><!-- wp:paragraph {"textColor":"tertiary"} -->
<p class="has-tertiary-color has-text-color">Inspiro was founded in 2011 by a pair of documentary filmmakers who got tired of watching brands play it safe. We started shooting short-form stories for social enterprises out of a converted warehouse in Amsterdam.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"textColor":"tertiary"} -->
<p class="has-tertiary-color has-text-color">Today we produce campaign films, brand documentaries, and content series for clients across Europe and the US, but the belief that every brand has a story worth telling has never wavered.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"style":{"border":{"radius":"4px"}},"fontSize":"small"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-small-font-size has-custom-font-size wp-element-button" href="#" style="border-radius:4px">More about us</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:spacer {"height":"var:preset|spacing|medium"} -->
<div style="height:var(--wp--preset--spacing--medium)" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"width":"58%"} -->
<div class="wp-block-column" style="flex-basis:58%"><!-- wp:image {"sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":"12px"}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="{{img}}starter/agency-car.jpg" alt="" style="border-radius:12px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"42%"} -->
<div class="wp-block-column" style="flex-basis:42%"><!-- wp:image {"sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":"12px"}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="{{img}}starter/agency-runner.jpg" alt="" style="border-radius:12px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|x-small","right":"var:preset|spacing|x-small"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--x-small)"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"1px"}},"textColor":"tertiary","fontSize":"x-small"} -->
<p class="has-tertiary-color has-text-color has-x-small-font-size" style="letter-spacing:1px">Projects</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"500","lineHeight":"1.2"},"layout":{"selfStretch":"fixed","flexSize":"760px"}},"fontSize":"large"} -->
<h2 class="wp-block-heading has-large-font-size" style="font-style:normal;font-weight:500;line-height:1.2">A selection of brand films, campaigns, and documentaries, each one built around a story worth telling.</h2>
<!-- /wp:heading -->

<!-- wp:spacer {"height":"var:preset|spacing|small"} -->
<div style="height:var(--wp--preset--spacing--small)" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:cover {"url":"{{img}}StockSnap_356BERTH29.jpg","dimRatio":30,"overlayColor":"primary","isUserOverlayColor":true,"minHeight":460,"minHeightUnit":"px","contentPosition":"bottom left","style":{"border":{"radius":"12px"}}} -->
<div class="wp-block-cover has-custom-content-position is-position-bottom-left" style="border-radius:12px;min-height:460px"><img class="wp-block-cover__image-background" alt="" src="{{img}}StockSnap_356BERTH29.jpg" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-30 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"bottom":"0"}}},"textColor":"white","fontSize":"medium"} -->
<h3 class="wp-block-heading has-white-color has-text-color has-medium-font-size" style="margin-bottom:0">Midnight Session</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"white","fontSize":"x-small"} -->
<p class="has-white-color has-text-color has-x-small-font-size">Music video</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:cover {"url":"{{img}}StockSnap_KV0WLH355C.jpg","dimRatio":30,"overlayColor":"primary","isUserOverlayColor":true,"minHeight":460,"minHeightUnit":"px","contentPosition":"bottom left","style":{"border":{"radius":"12px"}}} -->
<div class="wp-block-cover has-custom-content-position is-position-bottom-left" style="border-radius:12px;min-height:460px"><img class="wp-block-cover__image-background" alt="" src="{{img}}StockSnap_KV0WLH355C.jpg" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-30 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"bottom":"0"}}},"textColor":"white","fontSize":"medium"} -->
<h3 class="wp-block-heading has-white-color has-text-color has-medium-font-size" style="margin-bottom:0">Golden Hour</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"white","fontSize":"x-small"} -->
<p class="has-white-color has-text-color has-x-small-font-size">Campaign film</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:cover {"url":"{{img}}video-2.jpeg","dimRatio":30,"overlayColor":"primary","isUserOverlayColor":true,"minHeight":460,"minHeightUnit":"px","contentPosition":"bottom left","style":{"border":{"radius":"12px"}}} -->
<div class="wp-block-cover has-custom-content-position is-position-bottom-left" style="border-radius:12px;min-height:460px"><img class="wp-block-cover__image-background" alt="" src="{{img}}video-2.jpeg" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-30 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"bottom":"0"}}},"textColor":"white","fontSize":"medium"} -->
<h3 class="wp-block-heading has-white-color has-text-color has-medium-font-size" style="margin-bottom:0">The Long Way Home</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"white","fontSize":"x-small"} -->
<p class="has-white-color has-text-color has-x-small-font-size">Documentary series</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:cover {"url":"{{img}}video-3.jpeg","dimRatio":30,"overlayColor":"primary","isUserOverlayColor":true,"minHeight":460,"minHeightUnit":"px","contentPosition":"bottom left","style":{"border":{"radius":"12px"}}} -->
<div class="wp-block-cover has-custom-content-position is-position-bottom-left" style="border-radius:12px;min-height:460px"><img class="wp-block-cover__image-background" alt="" src="{{img}}video-3.jpeg" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-30 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"bottom":"0"}}},"textColor":"white","fontSize":"medium"} -->
<h3 class="wp-block-heading has-white-color has-text-color has-medium-font-size" style="margin-bottom:0">Northline Launch</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"white","fontSize":"x-small"} -->
<p class="has-white-color has-text-color has-x-small-font-size">Brand film</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|x-small","right":"var:preset|spacing|x-small"}}},"backgroundColor":"background","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-background-background-color has-background" style="padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--x-small)"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"1px"}},"textColor":"tertiary","fontSize":"x-small"} -->
<p class="has-tertiary-color has-text-color has-x-small-font-size" style="letter-spacing:1px">Services</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"500","lineHeight":"1.2"}},"fontSize":"large"} -->
<h2 class="wp-block-heading has-large-font-size" style="font-style:normal;font-weight:500;line-height:1.2">We cover every stage of production, from the first creative conversation to the final exported frame.</h2>
<!-- /wp:heading -->

<!-- wp:spacer {"height":"var:preset|spacing|small"} -->
<div style="height:var(--wp--preset--spacing--small)" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3,"fontSize":"medium"} -->
<h3 class="wp-block-heading has-medium-font-size">Brand films</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"tertiary","fontSize":"small"} -->
<p class="has-tertiary-color has-text-color has-small-font-size">A cinematic declaration of who you are and why it matters. We develop the concept, direct the shoot, and deliver a film your audience will remember.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3,"fontSize":"medium"} -->
<h3 class="wp-block-heading has-medium-font-size">Campaign production</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"tertiary","fontSize":"small"} -->
<p class="has-tertiary-color has-text-color has-small-font-size">Built for moments that need to land hard and fast. Product launches, seasonal pushes and social-first content, delivered in every format you need.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3,"fontSize":"medium"} -->
<h3 class="wp-block-heading has-medium-font-size">Documentary series</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"tertiary","fontSize":"small"} -->
<p class="has-tertiary-color has-text-color has-small-font-size">For brands with a story too big for a single film. Short-form series of three to six episodes that give an audience a reason to come back.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3,"fontSize":"medium"} -->
<h3 class="wp-block-heading has-medium-font-size">Post production</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"tertiary","fontSize":"small"} -->
<p class="has-tertiary-color has-text-color has-small-font-size">If you have footage, we can make it broadcast-ready. Our editors, colourists and sound designers finish films for cinema, television and every screen in between.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|x-small","right":"var:preset|spacing|x-small"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--x-small)"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"width":"55%"} -->
<div class="wp-block-column" style="flex-basis:55%"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"1px"}},"textColor":"tertiary","fontSize":"x-small"} -->
<p class="has-tertiary-color has-text-color has-x-small-font-size" style="letter-spacing:1px">Process</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"500","lineHeight":"1.2"}},"fontSize":"large"} -->
<h2 class="wp-block-heading has-large-font-size" style="font-style:normal;font-weight:500;line-height:1.2">Great production isn't accidental. It's designed.</h2>
<!-- /wp:heading --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"45%","style":{"spacing":{"padding":{"left":"var:preset|spacing|small"}}}} -->
<div class="wp-block-column" style="padding-left:var(--wp--preset--spacing--small);flex-basis:45%"><!-- wp:paragraph {"textColor":"tertiary"} -->
<p class="has-tertiary-color has-text-color">A clear process is the first creative decision we make. It keeps projects on time, keeps clients informed, and leaves room for the unplanned moments that make a film worth watching.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:spacer {"height":"var:preset|spacing|small"} -->
<div style="height:var(--wp--preset--spacing--small)" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"style":{"border":{"top":{"color":"var:preset|color|lightgrey","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|x-small"}}}} -->
<div class="wp-block-column" style="border-top-color:var(--wp--preset--color--lightgrey);border-top-width:1px;padding-top:var(--wp--preset--spacing--x-small)"><!-- wp:paragraph {"textColor":"secondary","fontSize":"x-small"} -->
<p class="has-secondary-color has-text-color has-x-small-font-size">Step 1</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"fontSize":"medium"} -->
<h3 class="wp-block-heading has-medium-font-size">Discover</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"tertiary","fontSize":"small"} -->
<p class="has-tertiary-color has-text-color has-small-font-size">We start by understanding your audience, your message, and the emotional response you want to trigger.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"border":{"top":{"color":"var:preset|color|lightgrey","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|x-small"}}}} -->
<div class="wp-block-column" style="border-top-color:var(--wp--preset--color--lightgrey);border-top-width:1px;padding-top:var(--wp--preset--spacing--x-small)"><!-- wp:paragraph {"textColor":"secondary","fontSize":"x-small"} -->
<p class="has-secondary-color has-text-color has-x-small-font-size">Step 2</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"fontSize":"medium"} -->
<h3 class="wp-block-heading has-medium-font-size">Script and storyboard</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"tertiary","fontSize":"small"} -->
<p class="has-tertiary-color has-text-color has-small-font-size">We develop the narrative arc, scripted or documentary-style, and map out every shot before the camera rolls.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"border":{"top":{"color":"var:preset|color|lightgrey","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|x-small"}}}} -->
<div class="wp-block-column" style="border-top-color:var(--wp--preset--color--lightgrey);border-top-width:1px;padding-top:var(--wp--preset--spacing--x-small)"><!-- wp:paragraph {"textColor":"secondary","fontSize":"x-small"} -->
<p class="has-secondary-color has-text-color has-x-small-font-size">Step 3</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"fontSize":"medium"} -->
<h3 class="wp-block-heading has-medium-font-size">Production</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"tertiary","fontSize":"small"} -->
<p class="has-tertiary-color has-text-color has-small-font-size">Our crew captures your story with precision and presence, whether that's a single-day studio shoot or a multi-week documentary.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"border":{"top":{"color":"var:preset|color|lightgrey","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|x-small"}}}} -->
<div class="wp-block-column" style="border-top-color:var(--wp--preset--color--lightgrey);border-top-width:1px;padding-top:var(--wp--preset--spacing--x-small)"><!-- wp:paragraph {"textColor":"secondary","fontSize":"x-small"} -->
<p class="has-secondary-color has-text-color has-x-small-font-size">Step 4</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"fontSize":"medium"} -->
<h3 class="wp-block-heading has-medium-font-size">Post and delivery</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"tertiary","fontSize":"small"} -->
<p class="has-tertiary-color has-text-color has-small-font-size">We edit, grade, mix, and deliver broadcast-ready files across every format and platform you need.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|x-small","right":"var:preset|spacing|x-small"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--x-small)"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"1px"}},"textColor":"tertiary","fontSize":"x-small"} -->
<p class="has-tertiary-color has-text-color has-x-small-font-size" style="letter-spacing:1px">Our team</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"500","lineHeight":"1.2"}},"fontSize":"large"} -->
<h2 class="wp-block-heading has-large-font-size" style="font-style:normal;font-weight:500;line-height:1.2">A small, senior crew who have spent years getting better at one thing: telling stories that stick.</h2>
<!-- /wp:heading -->

<!-- wp:spacer {"height":"var:preset|spacing|small"} -->
<div style="height:var(--wp--preset--spacing--small)" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":"12px"}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="{{img}}team1.jpg" alt="" style="border-radius:12px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"bottom":"0"}}},"fontSize":"medium"} -->
<h3 class="wp-block-heading has-medium-font-size" style="margin-bottom:0">Lena Vasquez</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"secondary","fontSize":"x-small"} -->
<p class="has-secondary-color has-text-color has-x-small-font-size">Executive Producer</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"textColor":"tertiary","fontSize":"small"} -->
<p class="has-tertiary-color has-text-color has-small-font-size">Lena keeps the wheels turning without letting them show. She has managed productions across 14 countries and has never missed a delivery date.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":"12px"}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="{{img}}team2.jpg" alt="" style="border-radius:12px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"bottom":"0"}}},"fontSize":"medium"} -->
<h3 class="wp-block-heading has-medium-font-size" style="margin-bottom:0">Marco den Hartog</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"secondary","fontSize":"x-small"} -->
<p class="has-secondary-color has-text-color has-x-small-font-size">Founder and Director</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"textColor":"tertiary","fontSize":"small"} -->
<p class="has-tertiary-color has-text-color has-small-font-size">Marco has directed over 200 brand films across Europe. He started in documentary, and it shows: every frame is there because something true is happening in it.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":"12px"}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="{{img}}team3.jpg" alt="" style="border-radius:12px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"bottom":"0"}}},"fontSize":"medium"} -->
<h3 class="wp-block-heading has-medium-font-size" style="margin-bottom:0">Daan Hoekstra</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"secondary","fontSize":"x-small"} -->
<p class="has-secondary-color has-text-color has-x-small-font-size">Director of Photography</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"textColor":"tertiary","fontSize":"small"} -->
<p class="has-tertiary-color has-text-color has-small-font-size">Daan has shot campaigns for global brands and intimate social stories. An eye for available light is why clients keep asking for the same crew.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|x-small","right":"var:preset|spacing|x-small"}}},"backgroundColor":"primary","textColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-white-color has-primary-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--x-small)"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"1px"},"color":{"text":"#b5b5b5"}},"fontSize":"x-small"} -->
<p class="has-text-color has-x-small-font-size" style="color:#b5b5b5;letter-spacing:1px">Testimonials</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"500","lineHeight":"1.2"}},"textColor":"white","fontSize":"large"} -->
<h2 class="wp-block-heading has-white-color has-text-color has-large-font-size" style="font-style:normal;font-weight:500;line-height:1.2">Words from the people we've made films for.</h2>
<!-- /wp:heading -->

<!-- wp:spacer {"height":"var:preset|spacing|small"} -->
<div style="height:var(--wp--preset--spacing--small)" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph {"textColor":"secondary","fontSize":"small"} -->
<p class="has-secondary-color has-text-color has-small-font-size">★★★★★</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"textColor":"white","fontSize":"medium"} -->
<p class="has-white-color has-text-color has-medium-font-size">"We briefed them on a Monday. By Friday we had a rough cut that made our CEO cry. In a good way."</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"color":{"text":"#b5b5b5"}},"fontSize":"x-small"} -->
<p class="has-text-color has-x-small-font-size" style="color:#b5b5b5">Emma V., Head of Brand, Aurum</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph {"textColor":"secondary","fontSize":"small"} -->
<p class="has-secondary-color has-text-color has-small-font-size">★★★★★</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"textColor":"white","fontSize":"medium"} -->
<p class="has-white-color has-text-color has-medium-font-size">"Every agency promised us a great film. Inspiro is the only one that delivered one."</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"color":{"text":"#b5b5b5"}},"fontSize":"x-small"} -->
<p class="has-text-color has-x-small-font-size" style="color:#b5b5b5">Jonas F., Co-founder, Dwell</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph {"textColor":"secondary","fontSize":"small"} -->
<p class="has-secondary-color has-text-color has-small-font-size">★★★★★</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"textColor":"white","fontSize":"medium"} -->
<p class="has-white-color has-text-color has-medium-font-size">"We've worked with bigger studios and spent more money. Nothing has ever performed like the film Inspiro made for us."</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"color":{"text":"#b5b5b5"}},"fontSize":"x-small"} -->
<p class="has-text-color has-x-small-font-size" style="color:#b5b5b5">Ren T., VP Marketing, Fieldwork</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|x-small","right":"var:preset|spacing|x-small"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--x-small)"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"1px"}},"textColor":"tertiary","fontSize":"x-small"} -->
<p class="has-tertiary-color has-text-color has-x-small-font-size" style="letter-spacing:1px">Blog</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"500","lineHeight":"1.2"}},"fontSize":"large"} -->
<h2 class="wp-block-heading has-large-font-size" style="font-style:normal;font-weight:500;line-height:1.2">Thinking out loud on brand storytelling, production craft, and what actually makes a film work.</h2>
<!-- /wp:heading -->

<!-- wp:spacer {"height":"var:preset|spacing|small"} -->
<div style="height:var(--wp--preset--spacing--small)" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:query {"queryId":4,"query":{"perPage":"3","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"excludeCurrent":null}} -->
<div class="wp-block-query"><!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"grid","columnCount":3}} -->
<!-- wp:post-featured-image {"isLink":true,"width":"100%","height":"240px","style":{"border":{"radius":"12px"},"spacing":{"margin":{"bottom":"var:preset|spacing|x-small"}}}} /-->

<!-- wp:post-date {"metadata":{"bindings":{"datetime":{"source":"core/post-data","args":{"field":"date"}}}},"style":{"elements":{"link":{"color":{"text":"var:preset|color|tertiary"}}},"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"tertiary","fontSize":"x-small"} /-->

<!-- wp:post-title {"level":3,"isLink":true,"style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|x-small"}}},"fontSize":"medium"} /-->

<!-- wp:post-excerpt {"excerptLength":24,"style":{"elements":{"link":{"color":{"text":"var:preset|color|tertiary"}}}},"textColor":"tertiary","fontSize":"small"} /-->
<!-- /wp:post-template -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"placeholder":"Add text or blocks that will display when a query returns no results."} -->
<p></p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|x-large","left":"var:preset|spacing|x-small","right":"var:preset|spacing|x-small"}}},"backgroundColor":"background","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-background-background-color has-background" style="padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--x-large);padding-left:var(--wp--preset--spacing--x-small)"><!-- wp:columns {"verticalAlignment":"center"} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"60%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:60%"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"1px"}},"textColor":"tertiary","fontSize":"x-small"} -->
<p class="has-tertiary-color has-text-color has-x-small-font-size" style="letter-spacing:1px">Start a project</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"500","lineHeight":"1.1"}},"fontSize":"x-large"} -->
<h2 class="wp-block-heading has-x-large-font-size" style="font-style:normal;font-weight:500;line-height:1.1">Let's make something.</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"tertiary"} -->
<p class="has-tertiary-color has-text-color">Every great film starts with a single conversation. Tell us what you're building and we'll tell you what's possible.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"40%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:40%"><!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"0"}}},"fontSize":"medium"} -->
<p class="has-medium-font-size" style="margin-bottom:0">+31 10 000 0000</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"fontSize":"medium"} -->
<p class="has-medium-font-size">hello@inspiro.com</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"style":{"border":{"radius":"4px"}},"fontSize":"small"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-small-font-size has-custom-font-size wp-element-button" href="#" style="border-radius:4px">Get in touch</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
HTML;

$inspiro_studio = require __DIR__ . '/studio-pages.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

return array(
	'widgets'     => array(
		'footer_1' => array(
			'text_business_info',
		),
		'footer_2' => array(
			'text_about',
		),
		'footer_3' => array(
			'search',
		),
	),

	'posts'       => array_merge(
		array(
			'front'    => array(
				'post_type'    => 'page',
				'template'     => 'page-templates/full-width-transparent.php',
				'post_title'   => esc_html_x( 'Homepage', 'Theme starter content', 'inspiro' ),
				'post_content' => str_replace( '{{img}}', $inspiro_img, $inspiro_home_content ),
			),
			'blog',
		),
		$inspiro_studio['pages'],
		$inspiro_studio['posts']
	),

	'attachments' => $inspiro_studio['attachments'],

	'options'     => array(
		'show_on_front'  => 'page',
		'page_on_front'  => '{{front}}',
		'page_for_posts' => '{{blog}}',
	),

	'theme_mods'  => array(
		'hero_enable' => false,
	),

	'nav_menus'   => array(
		'primary' => array(
			'name'  => __( 'Main Menu', 'inspiro' ),
			'items' => array(
				'link_home',
				'page_about',
				'page_services',
				'page_blog',
				'page_contact',
			),
		),
	),
);
