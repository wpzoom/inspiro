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

/**
 * Page hero shared by the inner pages: eyebrow, title, intro and a photo.
 * Placeholders: {{eyebrow}}, {{title}}, {{intro}}, {{image}}.
 */
$inspiro_page_hero = <<<'HTML'
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|x-small","right":"var:preset|spacing|x-small"}}},"backgroundColor":"primary","textColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-white-color has-primary-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--x-large);padding-right:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--x-small)"><!-- wp:spacer {"height":"var:preset|spacing|small"} -->
<div style="height:var(--wp--preset--spacing--small)" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:columns {"verticalAlignment":"bottom"} -->
<div class="wp-block-columns are-vertically-aligned-bottom"><!-- wp:column {"verticalAlignment":"bottom","width":"50%","style":{"spacing":{"blockGap":"0"}}} -->
<div class="wp-block-column is-vertically-aligned-bottom" style="flex-basis:50%"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px","textTransform":"uppercase"},"color":{"text":"#b5b5b5"}},"fontSize":"x-small"} -->
<p class="has-text-color has-x-small-font-size" style="color:#b5b5b5;letter-spacing:2px;text-transform:uppercase">{{eyebrow}}</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1,"style":{"typography":{"fontStyle":"normal","fontWeight":"600","lineHeight":"1.05"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"white","fontSize":"max-60"} -->
<h1 class="wp-block-heading has-white-color has-text-color has-max-60-font-size" style="margin-top:0;margin-bottom:0;font-style:normal;font-weight:600;line-height:1.05">{{title}}</h1>
<!-- /wp:heading --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"bottom","width":"50%"} -->
<div class="wp-block-column is-vertically-aligned-bottom" style="flex-basis:50%"><!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"0"}},"color":{"text":"#d6d6d6"}},"fontSize":"small"} -->
<p class="has-text-color has-small-font-size" style="color:#d6d6d6;margin-bottom:0">{{intro}}</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:spacer {"height":"var:preset|spacing|small"} -->
<div style="height:var(--wp--preset--spacing--small)" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:image {"sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":"12px"}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="{{img}}{{image}}" alt="" style="border-radius:12px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->
HTML;

/**
 * Call to action shared by the inner pages.
 */
$inspiro_page_cta = <<<'HTML'
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
<div class="wp-block-button has-custom-font-size has-small-font-size"><a class="wp-block-button__link wp-element-button" href="#" style="border-radius:4px">Get in touch</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
HTML;

$inspiro_about_content = <<<'HTML'
{{hero}}

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|x-small","right":"var:preset|spacing|x-small"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--x-large);padding-right:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--x-small)"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"width":"55%"} -->
<div class="wp-block-column" style="flex-basis:55%"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"1px"}},"textColor":"tertiary","fontSize":"x-small"} -->
<p class="has-tertiary-color has-text-color has-x-small-font-size" style="letter-spacing:1px">Who we are</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"500","lineHeight":"1.2"}},"fontSize":"large"} -->
<h2 class="wp-block-heading has-large-font-size" style="font-style:normal;font-weight:500;line-height:1.2">We believe the most powerful thing a brand can do is make its audience feel something real.</h2>
<!-- /wp:heading --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"45%","style":{"spacing":{"padding":{"left":"var:preset|spacing|small"}}}} -->
<div class="wp-block-column" style="padding-left:var(--wp--preset--spacing--small);flex-basis:45%"><!-- wp:paragraph {"textColor":"tertiary"} -->
<p class="has-tertiary-color has-text-color">Inspiro was founded in 2011 by a pair of documentary filmmakers who got tired of watching brands play it safe. The first office was a converted warehouse in Amsterdam, and the first clients were social enterprises with a story and no budget.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"textColor":"tertiary"} -->
<p class="has-tertiary-color has-text-color">Today a crew of twelve produces campaign films, brand documentaries and content series for clients across Europe and the US. We still cap ourselves at six active projects, so every frame that leaves the studio has been seen by the people who shot it.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:cover {"url":"{{img}}StockSnap_KV0WLH355C.jpg","dimRatio":70,"overlayColor":"primary","isUserOverlayColor":true,"minHeight":560,"minHeightUnit":"px","contentPosition":"center center","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|x-small","right":"var:preset|spacing|x-small"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull" style="padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--x-small);min-height:560px"><img class="wp-block-cover__image-background" alt="" src="{{img}}StockSnap_KV0WLH355C.jpg" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-70 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","style":{"typography":{"letterSpacing":"1px"},"color":{"text":"#b5b5b5"}},"fontSize":"x-small"} -->
<p class="has-text-align-center has-text-color has-x-small-font-size" style="color:#b5b5b5;letter-spacing:1px">Our mission</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"500","lineHeight":"1.25"}},"textColor":"white","fontSize":"large"} -->
<h2 class="wp-block-heading has-text-align-center has-white-color has-text-color has-large-font-size" style="font-style:normal;font-weight:500;line-height:1.25">Our mission is to help brands stop being invisible and start being unforgettable. Every film we make is built to move people, not just reach them.</h2>
<!-- /wp:heading --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|x-small","right":"var:preset|spacing|x-small"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--x-small)"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"width":"25%"} -->
<div class="wp-block-column" style="flex-basis:25%"><!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"bottom":"0"}}},"fontSize":"x-large"} -->
<h3 class="wp-block-heading has-x-large-font-size" style="margin-bottom:0">200+</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"tertiary","fontSize":"small"} -->
<p class="has-tertiary-color has-text-color has-small-font-size">Films delivered since 2011</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"25%"} -->
<div class="wp-block-column" style="flex-basis:25%"><!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"bottom":"0"}}},"fontSize":"x-large"} -->
<h3 class="wp-block-heading has-x-large-font-size" style="margin-bottom:0">14</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"tertiary","fontSize":"small"} -->
<p class="has-tertiary-color has-text-color has-small-font-size">Countries we have shot in</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"25%"} -->
<div class="wp-block-column" style="flex-basis:25%"><!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"bottom":"0"}}},"fontSize":"x-large"} -->
<h3 class="wp-block-heading has-x-large-font-size" style="margin-bottom:0">21 days</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"tertiary","fontSize":"small"} -->
<p class="has-tertiary-color has-text-color has-small-font-size">From brief to final delivery</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"25%"} -->
<div class="wp-block-column" style="flex-basis:25%"><!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"bottom":"0"}}},"fontSize":"x-large"} -->
<h3 class="wp-block-heading has-x-large-font-size" style="margin-bottom:0">4.9/5</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"tertiary","fontSize":"small"} -->
<p class="has-tertiary-color has-text-color has-small-font-size">Average client rating</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|large","left":"var:preset|spacing|x-small","right":"var:preset|spacing|x-small"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--x-small)"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"1px"}},"textColor":"tertiary","fontSize":"x-small"} -->
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

{{cta}}
HTML;

$inspiro_services_content = <<<'HTML'
{{hero}}

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|x-small","right":"var:preset|spacing|x-small"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--x-large);padding-right:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--x-small)"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"1px"}},"textColor":"tertiary","fontSize":"x-small"} -->
<p class="has-tertiary-color has-text-color has-x-small-font-size" style="letter-spacing:1px">What we do</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"500","lineHeight":"1.2"}},"fontSize":"large"} -->
<h2 class="wp-block-heading has-large-font-size" style="font-style:normal;font-weight:500;line-height:1.2">We cover every stage of production, from the first creative conversation to the final exported frame.</h2>
<!-- /wp:heading -->

<!-- wp:spacer {"height":"var:preset|spacing|small"} -->
<div style="height:var(--wp--preset--spacing--small)" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"style":{"border":{"top":{"color":"var:preset|color|lightgrey","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|x-small"}}}} -->
<div class="wp-block-column" style="border-top-color:var(--wp--preset--color--lightgrey);border-top-width:1px;padding-top:var(--wp--preset--spacing--x-small)"><!-- wp:heading {"level":3,"fontSize":"medium"} -->
<h3 class="wp-block-heading has-medium-font-size">Brand films</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"tertiary","fontSize":"small"} -->
<p class="has-tertiary-color has-text-color has-small-font-size">A cinematic declaration of who you are and why it matters. We develop the concept, direct the shoot, and deliver a film your audience will remember long after the credits.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"border":{"top":{"color":"var:preset|color|lightgrey","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|x-small"}}}} -->
<div class="wp-block-column" style="border-top-color:var(--wp--preset--color--lightgrey);border-top-width:1px;padding-top:var(--wp--preset--spacing--x-small)"><!-- wp:heading {"level":3,"fontSize":"medium"} -->
<h3 class="wp-block-heading has-medium-font-size">Campaign production</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"tertiary","fontSize":"small"} -->
<p class="has-tertiary-color has-text-color has-small-font-size">Built for moments that need to land hard and fast. Product launches, seasonal pushes and social-first content, delivered in every format and length you need.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"style":{"border":{"top":{"color":"var:preset|color|lightgrey","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|x-small"}}}} -->
<div class="wp-block-column" style="border-top-color:var(--wp--preset--color--lightgrey);border-top-width:1px;padding-top:var(--wp--preset--spacing--x-small)"><!-- wp:heading {"level":3,"fontSize":"medium"} -->
<h3 class="wp-block-heading has-medium-font-size">Documentary series</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"tertiary","fontSize":"small"} -->
<p class="has-tertiary-color has-text-color has-small-font-size">For brands with a story too big for a single film. Short-form series of three to six episodes that give an audience a reason to come back.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"border":{"top":{"color":"var:preset|color|lightgrey","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|x-small"}}}} -->
<div class="wp-block-column" style="border-top-color:var(--wp--preset--color--lightgrey);border-top-width:1px;padding-top:var(--wp--preset--spacing--x-small)"><!-- wp:heading {"level":3,"fontSize":"medium"} -->
<h3 class="wp-block-heading has-medium-font-size">Post production and finishing</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"tertiary","fontSize":"small"} -->
<p class="has-tertiary-color has-text-color has-small-font-size">If you have footage, we can make it broadcast-ready. Our editors, colourists and sound designers finish films for cinema, television and every screen in between.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|x-small","right":"var:preset|spacing|x-small"}}},"backgroundColor":"background","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-background-background-color has-background" style="padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--x-small)"><!-- wp:columns -->
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
<div class="wp-block-columns"><!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|x-small","left":"var:preset|spacing|x-small","right":"var:preset|spacing|x-small"}},"border":{"radius":"12px"}},"backgroundColor":"white"} -->
<div class="wp-block-column has-white-background-color has-background" style="border-radius:12px;padding-top:var(--wp--preset--spacing--x-small);padding-right:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--x-small);padding-left:var(--wp--preset--spacing--x-small)"><!-- wp:paragraph {"textColor":"secondary","fontSize":"x-small"} -->
<p class="has-secondary-color has-text-color has-x-small-font-size">Step 1</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"fontSize":"medium"} -->
<h3 class="wp-block-heading has-medium-font-size">Discover</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"tertiary","fontSize":"small"} -->
<p class="has-tertiary-color has-text-color has-small-font-size">We start by understanding your audience, your message, and the emotional response you want to trigger.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|x-small","left":"var:preset|spacing|x-small","right":"var:preset|spacing|x-small"}},"border":{"radius":"12px"}},"backgroundColor":"white"} -->
<div class="wp-block-column has-white-background-color has-background" style="border-radius:12px;padding-top:var(--wp--preset--spacing--x-small);padding-right:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--x-small);padding-left:var(--wp--preset--spacing--x-small)"><!-- wp:paragraph {"textColor":"secondary","fontSize":"x-small"} -->
<p class="has-secondary-color has-text-color has-x-small-font-size">Step 2</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"fontSize":"medium"} -->
<h3 class="wp-block-heading has-medium-font-size">Script and storyboard</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"tertiary","fontSize":"small"} -->
<p class="has-tertiary-color has-text-color has-small-font-size">We develop the narrative arc, scripted or documentary-style, and map out every shot before the camera rolls.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|x-small","left":"var:preset|spacing|x-small","right":"var:preset|spacing|x-small"}},"border":{"radius":"12px"}},"backgroundColor":"white"} -->
<div class="wp-block-column has-white-background-color has-background" style="border-radius:12px;padding-top:var(--wp--preset--spacing--x-small);padding-right:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--x-small);padding-left:var(--wp--preset--spacing--x-small)"><!-- wp:paragraph {"textColor":"secondary","fontSize":"x-small"} -->
<p class="has-secondary-color has-text-color has-x-small-font-size">Step 3</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"fontSize":"medium"} -->
<h3 class="wp-block-heading has-medium-font-size">Production</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"tertiary","fontSize":"small"} -->
<p class="has-tertiary-color has-text-color has-small-font-size">Our crew captures your story with precision and presence, whether that's a single-day studio shoot or a multi-week documentary.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|x-small","left":"var:preset|spacing|x-small","right":"var:preset|spacing|x-small"}},"border":{"radius":"12px"}},"backgroundColor":"white"} -->
<div class="wp-block-column has-white-background-color has-background" style="border-radius:12px;padding-top:var(--wp--preset--spacing--x-small);padding-right:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--x-small);padding-left:var(--wp--preset--spacing--x-small)"><!-- wp:paragraph {"textColor":"secondary","fontSize":"x-small"} -->
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

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|x-small","right":"var:preset|spacing|x-small"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--x-small)"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"1px"}},"textColor":"tertiary","fontSize":"x-small"} -->
<p class="has-tertiary-color has-text-color has-x-small-font-size" style="letter-spacing:1px">Why us</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"500","lineHeight":"1.2"}},"fontSize":"large"} -->
<h2 class="wp-block-heading has-large-font-size" style="font-style:normal;font-weight:500;line-height:1.2">We show up, we listen, and we deliver. Every time.</h2>
<!-- /wp:heading -->

<!-- wp:spacer {"height":"var:preset|spacing|small"} -->
<div style="height:var(--wp--preset--spacing--small)" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small","right":"var:preset|spacing|small"}},"border":{"radius":"12px"}},"backgroundColor":"background"} -->
<div class="wp-block-column has-background-background-color has-background" style="border-radius:12px;padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)"><!-- wp:heading {"level":3,"fontSize":"medium"} -->
<h3 class="wp-block-heading has-medium-font-size">One director, start to finish</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"tertiary","fontSize":"small"} -->
<p class="has-tertiary-color has-text-color has-small-font-size">The director who hears your brief is the same person who calls cut on set and approves the final grade. No handoffs, no telephone game.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small","right":"var:preset|spacing|small"}},"border":{"radius":"12px"}},"backgroundColor":"background"} -->
<div class="wp-block-column has-background-background-color has-background" style="border-radius:12px;padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)"><!-- wp:heading {"level":3,"fontSize":"medium"} -->
<h3 class="wp-block-heading has-medium-font-size">Every cutdown included</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"tertiary","fontSize":"small"} -->
<p class="has-tertiary-color has-text-color has-small-font-size">Every production includes a hero film plus a complete cutdown suite: 60s, 30s, 15s and 6s. One shoot day, one budget, every format you need.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small","right":"var:preset|spacing|small"}},"border":{"radius":"12px"}},"backgroundColor":"background"} -->
<div class="wp-block-column has-background-background-color has-background" style="border-radius:12px;padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)"><!-- wp:heading {"level":3,"fontSize":"medium"} -->
<h3 class="wp-block-heading has-medium-font-size">Delivered in 21 days</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"tertiary","fontSize":"small"} -->
<p class="has-tertiary-color has-text-color has-small-font-size">Our sprint model takes most brand films from confirmed brief to final delivery in three weeks. Fast because we are organised, not because we cut corners.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small","right":"var:preset|spacing|small"}},"border":{"radius":"12px"}},"backgroundColor":"background"} -->
<div class="wp-block-column has-background-background-color has-background" style="border-radius:12px;padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)"><!-- wp:heading {"level":3,"fontSize":"medium"} -->
<h3 class="wp-block-heading has-medium-font-size">Six projects at a time</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"tertiary","fontSize":"small"} -->
<p class="has-tertiary-color has-text-color has-small-font-size">We cap ourselves at six active projects. Every frame that leaves this studio has been seen, questioned and approved by the people who shot it.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

{{cta}}
HTML;

$inspiro_contact_content = <<<'HTML'
{{hero}}

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|x-small","right":"var:preset|spacing|x-small"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--x-large);padding-right:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--x-small)"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"width":"55%"} -->
<div class="wp-block-column" style="flex-basis:55%"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"1px"}},"textColor":"tertiary","fontSize":"x-small"} -->
<p class="has-tertiary-color has-text-color has-x-small-font-size" style="letter-spacing:1px">Start a project</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"500","lineHeight":"1.2"}},"fontSize":"large"} -->
<h2 class="wp-block-heading has-large-font-size" style="font-style:normal;font-weight:500;line-height:1.2">Ready to start? Drop us a line and we'll get back to you within two working days.</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"tertiary"} -->
<p class="has-tertiary-color has-text-color">Tell us what you're building, when you need it, and roughly what you can spend. A rough idea is enough to start the conversation.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"style":{"border":{"radius":"4px"}},"fontSize":"small"} -->
<div class="wp-block-button has-custom-font-size has-small-font-size"><a class="wp-block-button__link wp-element-button" href="mailto:hello@inspiro.com" style="border-radius:4px">Email us</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"45%","style":{"spacing":{"padding":{"left":"var:preset|spacing|small"}}}} -->
<div class="wp-block-column" style="padding-left:var(--wp--preset--spacing--small);flex-basis:45%"><!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"0"}}},"textColor":"tertiary","fontSize":"x-small"} -->
<p class="has-tertiary-color has-text-color has-x-small-font-size" style="margin-bottom:0">Email</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"fontSize":"medium"} -->
<p class="has-medium-font-size">hello@inspiro.com</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"0"}}},"textColor":"tertiary","fontSize":"x-small"} -->
<p class="has-tertiary-color has-text-color has-x-small-font-size" style="margin-bottom:0">Call us</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"fontSize":"medium"} -->
<p class="has-medium-font-size">+31 10 000 0000</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"0"}}},"textColor":"tertiary","fontSize":"x-small"} -->
<p class="has-tertiary-color has-text-color has-x-small-font-size" style="margin-bottom:0">Studio</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"fontSize":"medium"} -->
<p class="has-medium-font-size">Westerstraat 12<br>1015 MK Amsterdam</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|x-small","right":"var:preset|spacing|x-small"}}},"backgroundColor":"background","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-background-background-color has-background" style="padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--x-small)"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"width":"40%"} -->
<div class="wp-block-column" style="flex-basis:40%"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"1px"}},"textColor":"tertiary","fontSize":"x-small"} -->
<p class="has-tertiary-color has-text-color has-x-small-font-size" style="letter-spacing:1px">FAQ</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"500","lineHeight":"1.2"}},"fontSize":"large"} -->
<h2 class="wp-block-heading has-large-font-size" style="font-style:normal;font-weight:500;line-height:1.2">Questions we hear all the time</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"tertiary"} -->
<p class="has-tertiary-color has-text-color">Everything you need to know before getting started.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"60%","style":{"spacing":{"padding":{"left":"var:preset|spacing|small"}}}} -->
<div class="wp-block-column" style="padding-left:var(--wp--preset--spacing--small);flex-basis:60%"><!-- wp:details {"style":{"border":{"bottom":{"color":"var:preset|color|lightgrey","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|x-small"}}}} -->
<details class="wp-block-details" style="border-bottom-color:var(--wp--preset--color--lightgrey);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--x-small)"><summary>How long does a brand film take?</summary><!-- wp:paragraph {"textColor":"tertiary","fontSize":"small"} -->
<p class="has-tertiary-color has-text-color has-small-font-size">Most brand films move from confirmed brief to delivery in 21 days. Multi-location shoots or documentary series take longer, and we will tell you how long before you commit.</p>
<!-- /wp:paragraph --></details>
<!-- /wp:details -->

<!-- wp:details {"style":{"border":{"bottom":{"color":"var:preset|color|lightgrey","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|x-small"}}}} -->
<details class="wp-block-details" style="border-bottom-color:var(--wp--preset--color--lightgrey);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--x-small)"><summary>What is included in a brand film package?</summary><!-- wp:paragraph {"textColor":"tertiary","fontSize":"small"} -->
<p class="has-tertiary-color has-text-color has-small-font-size">Every film comes with a full cutdown suite: 60s, 30s, 15s and 6s. You get everything you need for web, paid media and social from a single production.</p>
<!-- /wp:paragraph --></details>
<!-- /wp:details -->

<!-- wp:details {"style":{"border":{"bottom":{"color":"var:preset|color|lightgrey","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|x-small"}}}} -->
<details class="wp-block-details" style="border-bottom-color:var(--wp--preset--color--lightgrey);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--x-small)"><summary>Do you work with brands outside the Netherlands?</summary><!-- wp:paragraph {"textColor":"tertiary","fontSize":"small"} -->
<p class="has-tertiary-color has-text-color has-small-font-size">Yes. We regularly produce in the UK, Germany and the US. Travel and logistics are part of the production budget from day one, so there are no surprises.</p>
<!-- /wp:paragraph --></details>
<!-- /wp:details -->

<!-- wp:details {"style":{"border":{"bottom":{"color":"var:preset|color|lightgrey","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|x-small"}}}} -->
<details class="wp-block-details" style="border-bottom-color:var(--wp--preset--color--lightgrey);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--x-small)"><summary>What if we already have footage?</summary><!-- wp:paragraph {"textColor":"tertiary","fontSize":"small"} -->
<p class="has-tertiary-color has-text-color has-small-font-size">We handle post production as a standalone service. Our editors, colourists and sound designers can take existing footage and make it broadcast-ready.</p>
<!-- /wp:paragraph --></details>
<!-- /wp:details -->

<!-- wp:details {"style":{"spacing":{"padding":{"top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|x-small"}}}} -->
<details class="wp-block-details" style="padding-top:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--x-small)"><summary>How do we get started?</summary><!-- wp:paragraph {"textColor":"tertiary","fontSize":"small"} -->
<p class="has-tertiary-color has-text-color has-small-font-size">Send us a brief or just a rough idea. We set up a call within two days, ask the right questions, and come back with a plan and a price.</p>
<!-- /wp:paragraph --></details>
<!-- /wp:details --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

{{cta}}
HTML;

/**
 * Assemble an inner page: hero placeholders, shared call to action, image URLs.
 *
 * @param string $content Page content with {{hero}}, {{cta}} and {{img}} placeholders.
 * @param array  $hero    eyebrow, title, intro, image (file name under assets/images/).
 * @return string
 */
$inspiro_build_page = static function ( $content, $hero ) use ( $inspiro_page_hero, $inspiro_page_cta, $inspiro_img ) {
	$hero_html = str_replace(
		array( '{{eyebrow}}', '{{title}}', '{{intro}}', '{{image}}' ),
		array( $hero['eyebrow'], $hero['title'], $hero['intro'], $hero['image'] ),
		$inspiro_page_hero
	);

	$content = str_replace( array( '{{hero}}', '{{cta}}' ), array( $hero_html, $inspiro_page_cta ), $content );

	return str_replace( '{{img}}', $inspiro_img, $content );
};

$inspiro_post_body = <<<'HTML'
<!-- wp:paragraph -->
<p>%s</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>%s</p>
<!-- /wp:paragraph -->
HTML;

$inspiro_posts = array(
	'post-brand-story' => array(
		'title'   => _x( 'Why your brand needs a new story', 'Theme starter content', 'inspiro' ),
		'excerpt' => _x( 'Most brand films explain the company. The good ones make people feel what it is like to believe in it.', 'Theme starter content', 'inspiro' ),
		'image'   => 'image-gimbal',
		'body'    => array(
			'A brand film is not a longer advert. Adverts ask for something. A film offers something: a point of view, a feeling, a reason to care about a company that most people have never thought about.',
			'The brands that get this right do not start with what they sell. They start with what they believe, and they let the product show up late, almost as an afterthought.',
		),
	),
	'post-one-night'   => array(
		'title'   => _x( 'What we learned shooting a music video in one night', 'Theme starter content', 'inspiro' ),
		'excerpt' => _x( 'Twelve hours, one location, no second chances. Notes from a shoot that almost went sideways.', 'Theme starter content', 'inspiro' ),
		'image'   => 'image-dance-floor',
		'body'    => array(
			'We had the venue from eight in the evening until the cleaners arrived at six. The band had rehearsed the song maybe four times. Everything that follows is what we wrote in the van on the way home.',
			'Shoot the ending first. Nobody is tired yet, the band still likes each other, and if the night falls apart you have the shot the whole video is built around.',
		),
	),
	'post-process'     => array(
		'title'   => _x( 'Our process for a campaign film, start to finish', 'Theme starter content', 'inspiro' ),
		'excerpt' => _x( 'From the first call to the final export, here is what happens and when.', 'Theme starter content', 'inspiro' ),
		'image'   => 'image-film-set',
		'body'    => array(
			'A clear process is the first creative decision we make. It keeps projects on time, keeps clients informed, and leaves room for the unplanned moments that make a film worth watching.',
			'Discovery takes a week. Script and storyboard take two. Production is one to three days, and post is three weeks. Most films are delivered 21 days after the brief is confirmed.',
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
		'post_content' => sprintf( $inspiro_post_body, $inspiro_post['body'][0], $inspiro_post['body'][1] ),
	);
}

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
			'about'    => array(
				'post_type'    => 'page',
				'template'     => 'page-templates/full-width-transparent.php',
				'post_title'   => esc_html_x( 'About', 'Theme starter content', 'inspiro' ),
				'thumbnail'    => '{{image-camera-operators}}',
				'post_content' => $inspiro_build_page(
					$inspiro_about_content,
					array(
						'eyebrow' => 'The studio',
						'title'   => 'About us',
						'intro'   => 'Inspiro is a video production studio crafting cinematic brand films, campaign content and documentary storytelling for brands that want to be felt, not just seen.',
						'image'   => 'StockSnap_PT8C3EOE19.jpg',
					)
				),
			),
			'services' => array(
				'post_type'    => 'page',
				'template'     => 'page-templates/full-width-transparent.php',
				'post_title'   => esc_html_x( 'Services', 'Theme starter content', 'inspiro' ),
				'thumbnail'    => '{{image-film-set}}',
				'post_content' => $inspiro_build_page(
					$inspiro_services_content,
					array(
						'eyebrow' => 'What we do',
						'title'   => 'Services',
						'intro'   => 'Four core services and one through-line: every production we take on is built to perform, creatively and commercially.',
						'image'   => 'video-2.jpeg',
					)
				),
			),
			'contact'  => array(
				'post_type'    => 'page',
				'template'     => 'page-templates/full-width-transparent.php',
				'post_title'   => esc_html_x( 'Contact', 'Theme starter content', 'inspiro' ),
				'thumbnail'    => '{{image-contact}}',
				'post_content' => $inspiro_build_page(
					$inspiro_contact_content,
					array(
						'eyebrow' => 'Get in touch',
						'title'   => 'Contact',
						'intro'   => 'Tell us what you are building. We will tell you what is possible, and what it will take to get there.',
						'image'   => 'StockSnap_6O7JXC5DC5.jpg',
					)
				),
			),
			'blog',
		),
		$inspiro_post_entries
	),

	'attachments' => array(
		'image-gimbal'           => array(
			'post_title' => _x( 'Gimbal', 'Theme starter content', 'inspiro' ),
			'file'       => 'assets/images/video-1.jpeg',
		),
		'image-dance-floor'      => array(
			'post_title' => _x( 'On the dance floor', 'Theme starter content', 'inspiro' ),
			'file'       => 'assets/images/StockSnap_356BERTH29.jpg',
		),
		'image-film-set'         => array(
			'post_title' => _x( 'Film set', 'Theme starter content', 'inspiro' ),
			'file'       => 'assets/images/StockSnap_KV0WLH355C.jpg',
		),
		'image-camera-operators' => array(
			'post_title' => _x( 'Camera operators', 'Theme starter content', 'inspiro' ),
			'file'       => 'assets/images/StockSnap_PT8C3EOE19.jpg',
		),
		'image-contact'          => array(
			'post_title' => _x( 'Contact', 'Theme starter content', 'inspiro' ),
			'file'       => 'assets/images/StockSnap_6O7JXC5DC5.jpg',
		),
	),

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
