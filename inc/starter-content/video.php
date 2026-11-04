<?php
/**
 * Starter content set: Video Hero
 *
 * The classic Inspiro start: the centered full-screen video header, intro,
 * three service covers, key numbers, about and process, a dark portfolio
 * band, clients, team, a testimonial, the parallax call to action and the
 * latest news. Inner pages and posts are shared with the Creative Agency set.
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.0.0
 * @since Inspiro 2.3.0 Moved into its own set; plugin blocks replaced, numbers and testimonial added.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$inspiro_img = get_template_directory_uri() . '/assets/images/';

$inspiro_video_home = <<<'HTML'
<!-- wp:cover {"url":"https://demo.wpzoom.com/inspiro-lite/files/2022/03/Pexels-Videos-1409899-1.mp4","id":6672,"dimRatio":20,"backgroundType":"video","minHeight":100,"minHeightUnit":"vh","contentPosition":"center center","isDark":false,"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull is-light" style="min-height:100vh"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-20 has-background-dim"></span><video class="wp-block-cover__video-background intrinsic-ignore" autoplay muted loop playsinline src="https://demo.wpzoom.com/inspiro-lite/files/2022/03/Pexels-Videos-1409899-1.mp4" data-object-fit="cover"></video><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","style":{"typography":{"fontStyle":"normal","fontWeight":"900","lineHeight":"1.2"}},"textColor":"white","fontSize":"max-60"} -->
<p class="has-text-align-center has-white-color has-text-color has-max-60-font-size" style="font-style:normal;font-weight:900;line-height:1.2"><strong>Create. Amaze. Inspire.</strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center","textColor":"white","fontSize":"medium"} -->
<p class="has-text-align-center has-white-color has-text-color has-medium-font-size">Inspiro is a Portfolio &amp; Photography WordPress Theme. This area supports self-hosted videos as well as videos from YouTube and Vimeo.</p>
<!-- /wp:paragraph -->

<!-- wp:spacer {"height":"55px"} -->
<div style="height:55px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"textColor":"white","style":{"border":{"radius":"0px"}},"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-white-color has-text-color wp-element-button" href="#services" style="border-radius:0px">Learn More</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"layout":{"type":"constrained","contentSize":"860px"}} -->
<div class="wp-block-group"><!-- wp:spacer {"height":"80px"} -->
<div style="height:80px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:heading {"textAlign":"center","style":{"typography":{"letterSpacing":"1px"}},"fontSize":"medium"} -->
<h2 class="wp-block-heading has-text-align-center has-medium-font-size" style="letter-spacing:1px">WE ARE A VIDEO PRODUCTION STUDIO IN AMSTERDAM</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"tertiary"} -->
<p class="has-text-align-center has-tertiary-color has-text-color">We write, shoot and finish brand films, campaign content and documentary series for clients across Europe. A senior crew on every job, and a director who stays from the first call to the final grade.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center","orientation":"horizontal"}} -->
<div class="wp-block-buttons"><!-- wp:button {"style":{"border":{"radius":"0px"}},"className":"is-style-outline","fontSize":"small"} -->
<div class="wp-block-button has-custom-font-size is-style-outline has-small-font-size"><a class="wp-block-button__link wp-element-button" href="#" style="border-radius:0px">ABOUT US</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:spacer {"height":"80px"} -->
<div style="height:80px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|x-small","right":"var:preset|spacing|x-small"}}},"backgroundColor":"background","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-background-background-color has-background" id="services" style="padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--x-small)"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"1px"}},"textColor":"secondary","fontSize":"x-small"} -->
<p class="has-secondary-color has-text-color has-x-small-font-size" style="letter-spacing:1px">LET'S WORK TOGETHER!</p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2 class="wp-block-heading">Our Services</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"tertiary"} -->
<p class="has-tertiary-color has-text-color">From the first creative conversation to the final exported frame, the same people stay on your project. Three services, one crew, every stage of production.</p>
<!-- /wp:paragraph -->

<!-- wp:spacer {"height":"30px"} -->
<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:cover {"url":"{{img}}StockSnap_356BERTH29.jpg","dimRatio":60,"overlayColor":"primary","isUserOverlayColor":true,"minHeight":380,"minHeightUnit":"px","contentPosition":"bottom left","style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"var:preset|spacing|small","right":"var:preset|spacing|x-small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|x-small"}}}} -->
<div class="wp-block-cover has-custom-content-position is-position-bottom-left" style="border-radius:12px;padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--x-small);min-height:380px"><img class="wp-block-cover__image-background" alt="" src="{{img}}StockSnap_356BERTH29.jpg" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-60 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"white","fontSize":"medium"} -->
<h3 class="wp-block-heading has-white-color has-text-color has-medium-font-size" style="margin-top:0;margin-bottom:0">Video<br>Production</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}},"textColor":"secondary"} -->
<p class="has-secondary-color has-text-color has-link-color" style="margin-top:0;margin-bottom:0"><a href="#">Explore more →</a></p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:cover {"url":"{{img}}StockSnap_KV0WLH355C.jpg","dimRatio":60,"overlayColor":"primary","isUserOverlayColor":true,"minHeight":380,"minHeightUnit":"px","contentPosition":"bottom left","style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"var:preset|spacing|small","right":"var:preset|spacing|x-small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|x-small"}}}} -->
<div class="wp-block-cover has-custom-content-position is-position-bottom-left" style="border-radius:12px;padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--x-small);min-height:380px"><img class="wp-block-cover__image-background" alt="" src="{{img}}StockSnap_KV0WLH355C.jpg" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-60 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"white","fontSize":"medium"} -->
<h3 class="wp-block-heading has-white-color has-text-color has-medium-font-size" style="margin-top:0;margin-bottom:0">Professional<br>Editing</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}},"textColor":"secondary"} -->
<p class="has-secondary-color has-text-color has-link-color" style="margin-top:0;margin-bottom:0"><a href="#">Explore more →</a></p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:cover {"url":"{{img}}StockSnap_M6D1GS9PSL.jpg","dimRatio":60,"overlayColor":"primary","isUserOverlayColor":true,"minHeight":380,"minHeightUnit":"px","contentPosition":"bottom left","style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"var:preset|spacing|small","right":"var:preset|spacing|x-small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|x-small"}}}} -->
<div class="wp-block-cover has-custom-content-position is-position-bottom-left" style="border-radius:12px;padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--x-small);min-height:380px"><img class="wp-block-cover__image-background" alt="" src="{{img}}StockSnap_M6D1GS9PSL.jpg" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-60 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"white","fontSize":"medium"} -->
<h3 class="wp-block-heading has-white-color has-text-color has-medium-font-size" style="margin-top:0;margin-bottom:0">Aerial<br>Video</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}},"textColor":"secondary"} -->
<p class="has-secondary-color has-text-color has-link-color" style="margin-top:0;margin-bottom:0"><a href="#">Explore more →</a></p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:spacer {"height":"60px"} -->
<div style="height:60px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"style":{"border":{"top":{"color":"var:preset|color|lightgrey","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|x-small"}}}} -->
<div class="wp-block-column" style="border-top-color:var(--wp--preset--color--lightgrey);border-top-width:1px;padding-top:var(--wp--preset--spacing--x-small)"><!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"bottom":"0"}}},"fontSize":"x-large"} -->
<h3 class="wp-block-heading has-x-large-font-size" style="margin-bottom:0">12+</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"tertiary","fontSize":"small"} -->
<p class="has-tertiary-color has-text-color has-small-font-size">Years in business</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"border":{"top":{"color":"var:preset|color|lightgrey","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|x-small"}}}} -->
<div class="wp-block-column" style="border-top-color:var(--wp--preset--color--lightgrey);border-top-width:1px;padding-top:var(--wp--preset--spacing--x-small)"><!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"bottom":"0"}}},"fontSize":"x-large"} -->
<h3 class="wp-block-heading has-x-large-font-size" style="margin-bottom:0">240</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"tertiary","fontSize":"small"} -->
<p class="has-tertiary-color has-text-color has-small-font-size">Films delivered</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"border":{"top":{"color":"var:preset|color|lightgrey","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|x-small"}}}} -->
<div class="wp-block-column" style="border-top-color:var(--wp--preset--color--lightgrey);border-top-width:1px;padding-top:var(--wp--preset--spacing--x-small)"><!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"bottom":"0"}}},"fontSize":"x-large"} -->
<h3 class="wp-block-heading has-x-large-font-size" style="margin-bottom:0">98%</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"tertiary","fontSize":"small"} -->
<p class="has-tertiary-color has-text-color has-small-font-size">Clients who come back</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"border":{"top":{"color":"var:preset|color|lightgrey","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|x-small"}}}} -->
<div class="wp-block-column" style="border-top-color:var(--wp--preset--color--lightgrey);border-top-width:1px;padding-top:var(--wp--preset--spacing--x-small)"><!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"bottom":"0"}}},"fontSize":"x-large"} -->
<h3 class="wp-block-heading has-x-large-font-size" style="margin-bottom:0">14</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"tertiary","fontSize":"small"} -->
<p class="has-tertiary-color has-text-color has-small-font-size">Countries we have shot in</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|small"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--small)"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|medium"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"1px"}},"textColor":"secondary","fontSize":"x-small"} -->
<p class="has-secondary-color has-text-color has-x-small-font-size" style="letter-spacing:1px">WHO WE ARE</p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2 class="wp-block-heading">About us</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"tertiary"} -->
<p class="has-tertiary-color has-text-color">Inspiro was founded in 2011 by two documentary filmmakers who got tired of watching brands play it safe. The first office was a converted warehouse in Amsterdam, and the first clients were social enterprises with a story and no budget.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"textColor":"tertiary"} -->
<p class="has-tertiary-color has-text-color">Today a crew of twelve produces campaign films, brand documentaries and content series for clients across Europe and the US.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"left","orientation":"horizontal"}} -->
<div class="wp-block-buttons"><!-- wp:button {"style":{"border":{"radius":"0px"}},"className":"is-style-outline","fontSize":"small"} -->
<div class="wp-block-button has-custom-font-size is-style-outline has-small-font-size"><a class="wp-block-button__link wp-element-button" href="#" style="border-radius:0px">READ MORE</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":"12px"}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="{{img}}StockSnap_PT8C3EOE19.jpg" alt="" style="border-radius:12px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|large"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--large)"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|medium"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":"12px"}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="{{img}}video-1.jpeg" alt="" style="border-radius:12px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"1px"}},"textColor":"secondary","fontSize":"x-small"} -->
<p class="has-secondary-color has-text-color has-x-small-font-size" style="letter-spacing:1px">HOW WE WORK</p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2 class="wp-block-heading">Our Process</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"tertiary"} -->
<p class="has-tertiary-color has-text-color">Discovery takes a week. Script and storyboard take two. Production is one to three days, and post is three weeks. Most films are delivered 21 days after the brief is confirmed, with every cutdown included.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"style":{"border":{"radius":"0px"}},"className":"is-style-outline","fontSize":"small"} -->
<div class="wp-block-button has-custom-font-size is-style-outline has-small-font-size"><a class="wp-block-button__link wp-element-button" href="#" style="border-radius:0px">OUR SERVICES</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large","left":"var:preset|spacing|x-small","right":"var:preset|spacing|x-small"},"margin":{"top":"0px"}}},"backgroundColor":"black","textColor":"white","className":"portfolio-dark","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull portfolio-dark has-white-color has-black-background-color has-text-color has-background" style="margin-top:0px;padding-top:var(--wp--preset--spacing--x-large);padding-right:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--x-large);padding-left:var(--wp--preset--spacing--x-small)"><!-- wp:paragraph {"align":"center","style":{"typography":{"letterSpacing":"1px"}},"textColor":"secondary","fontSize":"x-small"} -->
<p class="has-text-align-center has-secondary-color has-text-color has-x-small-font-size" style="letter-spacing:1px">FROM THE PORTFOLIO</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","textColor":"white"} -->
<h2 class="wp-block-heading has-text-align-center has-white-color has-text-color">Our Work</h2>
<!-- /wp:heading -->

<!-- wp:spacer {"height":"44px"} -->
<div style="height:44px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:cover {"url":"{{img}}video-2.jpeg","dimRatio":30,"overlayColor":"black","isUserOverlayColor":true,"minHeight":420,"minHeightUnit":"px","contentPosition":"bottom left","style":{"border":{"radius":"12px"}}} -->
<div class="wp-block-cover has-custom-content-position is-position-bottom-left" style="border-radius:12px;min-height:420px"><img class="wp-block-cover__image-background" alt="" src="{{img}}video-2.jpeg" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-black-background-color has-background-dim-30 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"bottom":"0"}}},"textColor":"white","fontSize":"medium"} -->
<h3 class="wp-block-heading has-white-color has-text-color has-medium-font-size" style="margin-bottom:0">The Long Way Home</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"secondary","fontSize":"x-small"} -->
<p class="has-secondary-color has-text-color has-x-small-font-size">Documentary series</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:cover {"url":"{{img}}video-3.jpeg","dimRatio":30,"overlayColor":"black","isUserOverlayColor":true,"minHeight":420,"minHeightUnit":"px","contentPosition":"bottom left","style":{"border":{"radius":"12px"}}} -->
<div class="wp-block-cover has-custom-content-position is-position-bottom-left" style="border-radius:12px;min-height:420px"><img class="wp-block-cover__image-background" alt="" src="{{img}}video-3.jpeg" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-black-background-color has-background-dim-30 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"bottom":"0"}}},"textColor":"white","fontSize":"medium"} -->
<h3 class="wp-block-heading has-white-color has-text-color has-medium-font-size" style="margin-bottom:0">Golden Hour</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"secondary","fontSize":"x-small"} -->
<p class="has-secondary-color has-text-color has-x-small-font-size">Campaign film</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:cover {"url":"{{img}}StockSnap_KV0WLH355C.jpg","dimRatio":30,"overlayColor":"black","isUserOverlayColor":true,"minHeight":420,"minHeightUnit":"px","contentPosition":"bottom left","style":{"border":{"radius":"12px"}}} -->
<div class="wp-block-cover has-custom-content-position is-position-bottom-left" style="border-radius:12px;min-height:420px"><img class="wp-block-cover__image-background" alt="" src="{{img}}StockSnap_KV0WLH355C.jpg" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-black-background-color has-background-dim-30 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"bottom":"0"}}},"textColor":"white","fontSize":"medium"} -->
<h3 class="wp-block-heading has-white-color has-text-color has-medium-font-size" style="margin-bottom:0">Northline Launch</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"secondary","fontSize":"x-small"} -->
<p class="has-secondary-color has-text-color has-x-small-font-size">Brand film</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:spacer {"height":"44px"} -->
<div style="height:44px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"textColor":"white","style":{"border":{"radius":"0px"}},"className":"is-style-outline","fontSize":"small"} -->
<div class="wp-block-button has-custom-font-size is-style-outline has-small-font-size"><a class="wp-block-button__link has-white-color has-text-color wp-element-button" href="#" style="border-radius:0px">VIEW ALL PROJECTS</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--large)"><!-- wp:paragraph {"align":"center","style":{"typography":{"letterSpacing":"1px"}},"textColor":"secondary","fontSize":"x-small"} -->
<p class="has-text-align-center has-secondary-color has-text-color has-x-small-font-size" style="letter-spacing:1px">WE WORK WITH</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center"} -->
<h2 class="wp-block-heading has-text-align-center">Our Clients</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"tertiary"} -->
<p class="has-text-align-center has-tertiary-color has-text-color">Trusted by 120+ studios and startups, from early-stage teams to established European names.</p>
<!-- /wp:paragraph -->

<!-- wp:spacer {"height":"20px"} -->
<div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|medium"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"600","letterSpacing":"2px"}},"textColor":"tertiary","fontSize":"medium"} -->
<p class="has-tertiary-color has-text-color has-medium-font-size" style="font-style:normal;font-weight:600;letter-spacing:2px">AURUM</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"600","letterSpacing":"2px"}},"textColor":"tertiary","fontSize":"medium"} -->
<p class="has-tertiary-color has-text-color has-medium-font-size" style="font-style:normal;font-weight:600;letter-spacing:2px">DWELL</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"600","letterSpacing":"2px"}},"textColor":"tertiary","fontSize":"medium"} -->
<p class="has-tertiary-color has-text-color has-medium-font-size" style="font-style:normal;font-weight:600;letter-spacing:2px">FIELDWORK</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"600","letterSpacing":"2px"}},"textColor":"tertiary","fontSize":"medium"} -->
<p class="has-tertiary-color has-text-color has-medium-font-size" style="font-style:normal;font-weight:600;letter-spacing:2px">NORTHLINE</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"600","letterSpacing":"2px"}},"textColor":"tertiary","fontSize":"medium"} -->
<p class="has-tertiary-color has-text-color has-medium-font-size" style="font-style:normal;font-weight:600;letter-spacing:2px">VANTARA</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|x-small","right":"var:preset|spacing|x-small"}}},"backgroundColor":"background","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-background-background-color has-background" style="padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--x-small)"><!-- wp:paragraph {"align":"center","style":{"typography":{"letterSpacing":"1px"}},"textColor":"secondary","fontSize":"x-small"} -->
<p class="has-text-align-center has-secondary-color has-text-color has-x-small-font-size" style="letter-spacing:1px">MEET US</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center"} -->
<h2 class="wp-block-heading has-text-align-center">Our Team</h2>
<!-- /wp:heading -->

<!-- wp:spacer {"height":"27px"} -->
<div style="height:27px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":"12px"}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="{{img}}team1.jpg" alt="" style="border-radius:12px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"bottom":"0"}}},"fontSize":"medium"} -->
<h3 class="wp-block-heading has-medium-font-size" style="margin-bottom:0">Lena Vasquez</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"letterSpacing":"1px"}},"textColor":"secondary","fontSize":"x-small"} -->
<p class="has-secondary-color has-text-color has-x-small-font-size" style="letter-spacing:1px">EXECUTIVE PRODUCER</p>
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

<!-- wp:paragraph {"style":{"typography":{"letterSpacing":"1px"}},"textColor":"secondary","fontSize":"x-small"} -->
<p class="has-secondary-color has-text-color has-x-small-font-size" style="letter-spacing:1px">FOUNDER AND DIRECTOR</p>
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

<!-- wp:paragraph {"style":{"typography":{"letterSpacing":"1px"}},"textColor":"secondary","fontSize":"x-small"} -->
<p class="has-secondary-color has-text-color has-x-small-font-size" style="letter-spacing:1px">DIRECTOR OF PHOTOGRAPHY</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"textColor":"tertiary","fontSize":"small"} -->
<p class="has-tertiary-color has-text-color has-small-font-size">Daan has shot campaigns for global brands and intimate social stories. An eye for available light is why clients keep asking for the same crew.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:spacer {"height":"40px"} -->
<div style="height:40px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"style":{"border":{"radius":"0px"}},"className":"is-style-outline","fontSize":"small"} -->
<div class="wp-block-button has-custom-font-size is-style-outline has-small-font-size"><a class="wp-block-button__link wp-element-button" href="#" style="border-radius:0px">JOIN OUR TEAM</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large"}}},"layout":{"type":"constrained","contentSize":"860px"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--large)"><!-- wp:paragraph {"align":"center","textColor":"secondary","fontSize":"small"} -->
<p class="has-text-align-center has-secondary-color has-text-color has-small-font-size">★★★★★</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"500","lineHeight":"1.3"}},"fontSize":"medium"} -->
<h2 class="wp-block-heading has-text-align-center has-medium-font-size" style="font-style:normal;font-weight:500;line-height:1.3">"We briefed them on a Monday. By Friday we had a rough cut that made our CEO cry. In a good way."</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"tertiary","fontSize":"x-small"} -->
<p class="has-text-align-center has-tertiary-color has-text-color has-x-small-font-size">Emma V., Head of Brand, Aurum</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:cover {"url":"{{img}}StockSnap_M6D1GS9PSL.jpg","id":24,"hasParallax":true,"dimRatio":40,"overlayColor":"black","minHeightUnit":"px","contentPosition":"center center","align":"full","style":{"border":{"radius":"0px"},"spacing":{"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}}},"className":"is-position-center-center"} -->
<div class="wp-block-cover alignfull has-parallax is-position-center-center" style="border-radius:0px;padding-top:var(--wp--preset--spacing--x-large);padding-bottom:var(--wp--preset--spacing--x-large)"><span aria-hidden="true" class="wp-block-cover__background has-black-background-color has-background-dim-40 has-background-dim"></span><div role="img" class="wp-block-cover__image-background wp-image-24 has-parallax" style="background-position:50% 50%;background-image:url({{img}}StockSnap_M6D1GS9PSL.jpg)"></div><div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"constrained","contentSize":"760px"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":3,"style":{"color":{"text":"#fffffa"},"typography":{"textTransform":"uppercase"}},"fontSize":"medium"} -->
<h3 class="wp-block-heading has-text-align-center has-text-color has-medium-font-size" style="color:#fffffa;text-transform:uppercase">Unleash your creativity with Inspiro</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"white"} -->
<p class="has-text-align-center has-white-color has-text-color">Every great film starts with a single conversation. Tell us what you're building and we'll tell you what's possible, and what it will take to get there.</p>
<!-- /wp:paragraph -->

<!-- wp:spacer {"height":"31px"} -->
<div style="height:31px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center","orientation":"horizontal"}} -->
<div class="wp-block-buttons"><!-- wp:button {"textColor":"white","style":{"border":{"radius":"0px"}},"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-white-color has-text-color wp-element-button" href="#" style="border-radius:0px">CONTACT US</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div id="news" class="wp-block-group"><!-- wp:spacer {"height":"108px"} -->
<div style="height:108px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:paragraph {"style":{"typography":{"letterSpacing":"1px"}},"textColor":"secondary","fontSize":"x-small"} -->
<p class="has-secondary-color has-text-color has-x-small-font-size" style="letter-spacing:1px">FROM THE BLOG</p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2 class="wp-block-heading">Latest News</h2>
<!-- /wp:heading -->

<!-- wp:spacer {"height":"33px"} -->
<div style="height:33px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:query {"queryId":4,"query":{"perPage":"3","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
<div class="wp-block-query"><!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"grid","columnCount":3}} -->
<!-- wp:post-featured-image {"isLink":true,"width":"100%","height":"240px","style":{"border":{"radius":"12px"},"spacing":{"margin":{"bottom":"var:preset|spacing|x-small"}}}} /-->

<!-- wp:post-date {"style":{"elements":{"link":{"color":{"text":"var:preset|color|tertiary"}}},"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"tertiary","fontSize":"x-small"} /-->

<!-- wp:post-title {"level":3,"isLink":true,"style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|x-small"}}},"fontSize":"medium"} /-->

<!-- wp:post-excerpt {"excerptLength":24,"style":{"elements":{"link":{"color":{"text":"var:preset|color|tertiary"}}}},"textColor":"tertiary","fontSize":"small"} /-->

<!-- wp:read-more {"style":{"border":{"width":"2px"},"spacing":{"padding":{"right":"var:preset|spacing|x-small","left":"var:preset|spacing|x-small","top":"10px","bottom":"10px"}},"typography":{"textTransform":"uppercase"}},"textColor":"foreground","fontSize":"x-small"} /-->
<!-- /wp:post-template -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"placeholder":"Add text or blocks that will display when a query returns no results."} -->
<p></p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query -->

<!-- wp:spacer {"height":"85px"} -->
<div style="height:85px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group -->
HTML;

$inspiro_studio = require __DIR__ . '/studio-pages.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

return array(
	'widgets'     => array(
		'sidebar'  => array(
			'search',
			'text_about',
			'text_business_info',
		),
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
			'front' => array(
				'post_type'    => 'page',
				'template'     => 'page-templates/full-width-transparent.php',
				'post_title'   => esc_html_x( 'Homepage', 'Theme starter content', 'inspiro' ),
				'post_content' => str_replace( '{{img}}', $inspiro_img, $inspiro_video_home ),
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
