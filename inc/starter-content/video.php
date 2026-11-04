<?php
/**
 * Starter content set: Video Hero
 *
 * The classic Inspiro start: a full-screen video header, followed by an
 * intro with key numbers, three services, a grid of films, reasons to work
 * with the studio, a testimonial, the latest posts and a call to action.
 * Inner pages and posts are shared with the Creative Agency set.
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.0.0
 * @since Inspiro 2.3.0 Moved into its own set and rebuilt below the hero.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$inspiro_img = get_template_directory_uri() . '/assets/images/';

$inspiro_video_home = <<<'HTML'
<!-- wp:cover {"url":"https://demo.wpzoom.com/inspiro-lite/files/2022/03/Pexels-Videos-1409899-1.mp4","id":6672,"dimRatio":100,"customGradient":"linear-gradient(0deg,rgb(16,16,16) 0%,rgba(16,16,16,0.2) 45%,rgba(16,16,16,0) 100%)","isUserOverlayColor":true,"backgroundType":"video","minHeight":100,"minHeightUnit":"vh","contentPosition":"bottom center","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|x-small","right":"var:preset|spacing|x-small"},"margin":{"bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull has-custom-content-position is-position-bottom-center" style="margin-bottom:0;padding-top:var(--wp--preset--spacing--x-large);padding-right:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--x-small);min-height:100vh"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim wp-block-cover__gradient-background has-background-gradient" style="background:linear-gradient(0deg,rgb(16,16,16) 0%,rgba(16,16,16,0.2) 45%,rgba(16,16,16,0) 100%)"></span><video class="wp-block-cover__video-background intrinsic-ignore" autoplay muted loop playsinline src="https://demo.wpzoom.com/inspiro-lite/files/2022/03/Pexels-Videos-1409899-1.mp4" data-object-fit="cover"></video><div class="wp-block-cover__inner-container"><!-- wp:columns {"verticalAlignment":"bottom"} -->
<div class="wp-block-columns are-vertically-aligned-bottom"><!-- wp:column {"verticalAlignment":"bottom","width":"60%","style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}}} -->
<div class="wp-block-column is-vertically-aligned-bottom" style="flex-basis:60%"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px","textTransform":"uppercase"}},"textColor":"white","fontSize":"x-small"} -->
<p class="has-white-color has-text-color has-x-small-font-size" style="letter-spacing:2px;text-transform:uppercase">Video production studio</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1,"style":{"typography":{"fontStyle":"normal","fontWeight":"600","lineHeight":"1.05"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"white","fontSize":"max-60"} -->
<h1 class="wp-block-heading has-white-color has-text-color has-max-60-font-size" style="margin-top:0;margin-bottom:0;font-style:normal;font-weight:600;line-height:1.05">Create. Amaze. Inspire.</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"color":{"text":"#d6d6d6"}},"fontSize":"small"} -->
<p class="has-text-color has-small-font-size" style="color:#d6d6d6">Inspiro is a portfolio and photography theme with a full-screen video header. This area plays self-hosted videos as well as videos from YouTube and Vimeo.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"white","textColor":"primary","style":{"border":{"radius":"4px"}},"fontSize":"small"} -->
<div class="wp-block-button has-custom-font-size has-small-font-size"><a class="wp-block-button__link has-primary-color has-white-background-color has-text-color has-background wp-element-button" href="#work" style="border-radius:4px">See our work</a></div>
<!-- /wp:button -->

<!-- wp:button {"textColor":"white","style":{"border":{"radius":"4px"}},"className":"is-style-outline","fontSize":"small"} -->
<div class="wp-block-button has-custom-font-size is-style-outline has-small-font-size"><a class="wp-block-button__link has-white-color has-text-color wp-element-button" href="#" style="border-radius:4px">Get in touch</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"bottom","width":"40%"} -->
<div class="wp-block-column is-vertically-aligned-bottom" style="flex-basis:40%"><!-- wp:paragraph {"align":"right","style":{"spacing":{"margin":{"bottom":"0"}}},"textColor":"white","fontSize":"small"} -->
<p class="has-text-align-right has-white-color has-text-color has-small-font-size" style="margin-bottom:0">★★★★★ &nbsp;4.9/5</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"right","style":{"color":{"text":"#b5b5b5"},"spacing":{"margin":{"bottom":"0"}}},"fontSize":"x-small"} -->
<p class="has-text-align-right has-text-color has-x-small-font-size" style="color:#b5b5b5;margin-bottom:0">Trusted by 120+ studios and startups</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|x-small","right":"var:preset|spacing|x-small"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--x-large);padding-right:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--x-small)"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"width":"55%"} -->
<div class="wp-block-column" style="flex-basis:55%"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"1px"}},"textColor":"tertiary","fontSize":"x-small"} -->
<p class="has-tertiary-color has-text-color has-x-small-font-size" style="letter-spacing:1px">About the studio</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"500","lineHeight":"1.2"}},"fontSize":"large"} -->
<h2 class="wp-block-heading has-large-font-size" style="font-style:normal;font-weight:500;line-height:1.2">We make films for brands that want to be felt, not just seen.</h2>
<!-- /wp:heading --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"45%","style":{"spacing":{"padding":{"left":"var:preset|spacing|small"}}}} -->
<div class="wp-block-column" style="padding-left:var(--wp--preset--spacing--small);flex-basis:45%"><!-- wp:paragraph {"textColor":"tertiary"} -->
<p class="has-tertiary-color has-text-color">Inspiro is a small production studio in Amsterdam. We write, shoot and finish brand films, campaign content and documentary series for clients across Europe, with a senior crew on every job and a director who stays from the first call to the final grade.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"style":{"border":{"radius":"4px"}},"fontSize":"small"} -->
<div class="wp-block-button has-custom-font-size has-small-font-size"><a class="wp-block-button__link wp-element-button" href="#" style="border-radius:4px">About us</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:spacer {"height":"var:preset|spacing|small"} -->
<div style="height:var(--wp--preset--spacing--small)" aria-hidden="true" class="wp-block-spacer"></div>
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

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|x-small","right":"var:preset|spacing|x-small"}}},"backgroundColor":"background","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-background-background-color has-background" style="padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--x-small)"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"width":"55%"} -->
<div class="wp-block-column" style="flex-basis:55%"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"1px"}},"textColor":"tertiary","fontSize":"x-small"} -->
<p class="has-tertiary-color has-text-color has-x-small-font-size" style="letter-spacing:1px">What we do</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"500","lineHeight":"1.2"}},"fontSize":"large"} -->
<h2 class="wp-block-heading has-large-font-size" style="font-style:normal;font-weight:500;line-height:1.2">Three services, one crew, every stage of production.</h2>
<!-- /wp:heading --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"45%","style":{"spacing":{"padding":{"left":"var:preset|spacing|small"}}}} -->
<div class="wp-block-column" style="padding-left:var(--wp--preset--spacing--small);flex-basis:45%"><!-- wp:paragraph {"textColor":"tertiary"} -->
<p class="has-tertiary-color has-text-color">From the first creative conversation to the final exported frame, the same people stay on your project. No handoffs, no telephone game.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:spacer {"height":"var:preset|spacing|small"} -->
<div style="height:var(--wp--preset--spacing--small)" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":"12px"}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="{{img}}StockSnap_356BERTH29.jpg" alt="" style="border-radius:12px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3,"fontSize":"medium"} -->
<h3 class="wp-block-heading has-medium-font-size">Video production</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"tertiary","fontSize":"small"} -->
<p class="has-tertiary-color has-text-color has-small-font-size">Brand films, campaign spots and music videos. We develop the concept, direct the shoot and deliver every cutdown you need.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size"><a href="#">Learn more</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":"12px"}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="{{img}}StockSnap_KV0WLH355C.jpg" alt="" style="border-radius:12px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3,"fontSize":"medium"} -->
<h3 class="wp-block-heading has-medium-font-size">Editing and finishing</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"tertiary","fontSize":"small"} -->
<p class="has-tertiary-color has-text-color has-small-font-size">Have footage already? Our editors, colourists and sound designers turn it into something broadcast-ready for every screen.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size"><a href="#">Learn more</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":"12px"}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="{{img}}StockSnap_M6D1GS9PSL.jpg" alt="" style="border-radius:12px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3,"fontSize":"medium"} -->
<h3 class="wp-block-heading has-medium-font-size">Aerial video</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"tertiary","fontSize":"small"} -->
<p class="has-tertiary-color has-text-color has-small-font-size">Licensed drone pilots and stabilised rigs for the shots that make a location feel bigger than it is.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size"><a href="#">Learn more</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|x-small","right":"var:preset|spacing|x-small"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" id="work" style="padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--x-small)"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"1px"}},"textColor":"tertiary","fontSize":"x-small"} -->
<p class="has-tertiary-color has-text-color has-x-small-font-size" style="letter-spacing:1px">From the portfolio</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"500","lineHeight":"1.2"}},"fontSize":"large"} -->
<h2 class="wp-block-heading has-large-font-size" style="font-style:normal;font-weight:500;line-height:1.2">A few of the films we are proud of.</h2>
<!-- /wp:heading -->

<!-- wp:spacer {"height":"var:preset|spacing|small"} -->
<div style="height:var(--wp--preset--spacing--small)" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:cover {"url":"{{img}}video-1.jpeg","dimRatio":30,"overlayColor":"primary","isUserOverlayColor":true,"minHeight":460,"minHeightUnit":"px","contentPosition":"bottom left","style":{"border":{"radius":"12px"}}} -->
<div class="wp-block-cover has-custom-content-position is-position-bottom-left" style="border-radius:12px;min-height:460px"><img class="wp-block-cover__image-background" alt="" src="{{img}}video-1.jpeg" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-30 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"bottom":"0"}}},"textColor":"white","fontSize":"medium"} -->
<h3 class="wp-block-heading has-white-color has-text-color has-medium-font-size" style="margin-bottom:0">Northline Launch</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"white","fontSize":"x-small"} -->
<p class="has-white-color has-text-color has-x-small-font-size">Brand film</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:cover {"url":"{{img}}video-2.jpeg","dimRatio":30,"overlayColor":"primary","isUserOverlayColor":true,"minHeight":460,"minHeightUnit":"px","contentPosition":"bottom left","style":{"border":{"radius":"12px"}}} -->
<div class="wp-block-cover has-custom-content-position is-position-bottom-left" style="border-radius:12px;min-height:460px"><img class="wp-block-cover__image-background" alt="" src="{{img}}video-2.jpeg" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-30 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"bottom":"0"}}},"textColor":"white","fontSize":"medium"} -->
<h3 class="wp-block-heading has-white-color has-text-color has-medium-font-size" style="margin-bottom:0">The Long Way Home</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"white","fontSize":"x-small"} -->
<p class="has-white-color has-text-color has-x-small-font-size">Documentary series</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:cover {"url":"{{img}}video-3.jpeg","dimRatio":30,"overlayColor":"primary","isUserOverlayColor":true,"minHeight":460,"minHeightUnit":"px","contentPosition":"bottom left","style":{"border":{"radius":"12px"}}} -->
<div class="wp-block-cover has-custom-content-position is-position-bottom-left" style="border-radius:12px;min-height:460px"><img class="wp-block-cover__image-background" alt="" src="{{img}}video-3.jpeg" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-30 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"bottom":"0"}}},"textColor":"white","fontSize":"medium"} -->
<h3 class="wp-block-heading has-white-color has-text-color has-medium-font-size" style="margin-bottom:0">Golden Hour</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"white","fontSize":"x-small"} -->
<p class="has-white-color has-text-color has-x-small-font-size">Campaign film</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:cover {"url":"{{img}}StockSnap_PT8C3EOE19.jpg","dimRatio":30,"overlayColor":"primary","isUserOverlayColor":true,"minHeight":460,"minHeightUnit":"px","contentPosition":"bottom left","style":{"border":{"radius":"12px"}}} -->
<div class="wp-block-cover has-custom-content-position is-position-bottom-left" style="border-radius:12px;min-height:460px"><img class="wp-block-cover__image-background" alt="" src="{{img}}StockSnap_PT8C3EOE19.jpg" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-30 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"bottom":"0"}}},"textColor":"white","fontSize":"medium"} -->
<h3 class="wp-block-heading has-white-color has-text-color has-medium-font-size" style="margin-bottom:0">Midnight Session</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"white","fontSize":"x-small"} -->
<p class="has-white-color has-text-color has-x-small-font-size">Music video</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|x-small","right":"var:preset|spacing|x-small"}}},"backgroundColor":"primary","textColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-white-color has-primary-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--x-small)"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"width":"45%"} -->
<div class="wp-block-column" style="flex-basis:45%"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"1px"},"color":{"text":"#b5b5b5"}},"fontSize":"x-small"} -->
<p class="has-text-color has-x-small-font-size" style="color:#b5b5b5;letter-spacing:1px">Why Inspiro</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"500","lineHeight":"1.2"}},"textColor":"white","fontSize":"large"} -->
<h2 class="wp-block-heading has-white-color has-text-color has-large-font-size" style="font-style:normal;font-weight:500;line-height:1.2">A partner that stays until the film works.</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"color":{"text":"#b5b5b5"}}} -->
<p class="has-text-color" style="color:#b5b5b5">We do not hand you a treatment and disappear. The same crew is with you through the shoot, the edit and the launch.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"55%","style":{"spacing":{"padding":{"left":"var:preset|spacing|small"}}}} -->
<div class="wp-block-column" style="padding-left:var(--wp--preset--spacing--small);flex-basis:55%"><!-- wp:paragraph {"style":{"border":{"bottom":{"color":"#333333","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|x-small"},"margin":{"bottom":"0"}}},"textColor":"white"} -->
<p class="has-white-color has-text-color" style="border-bottom-color:#333333;border-bottom-width:1px;margin-bottom:0;padding-top:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--x-small)">One director from the first call to the final grade</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"border":{"bottom":{"color":"#333333","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|x-small"},"margin":{"top":"0","bottom":"0"}}},"textColor":"white"} -->
<p class="has-white-color has-text-color" style="border-bottom-color:#333333;border-bottom-width:1px;margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--x-small)">Fixed scope and a price you know before we shoot</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"border":{"bottom":{"color":"#333333","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|x-small"},"margin":{"top":"0","bottom":"0"}}},"textColor":"white"} -->
<p class="has-white-color has-text-color" style="border-bottom-color:#333333;border-bottom-width:1px;margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--x-small)">Every cutdown included: 60s, 30s, 15s and 6s</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|x-small"},"margin":{"top":"0","bottom":"0"}}},"textColor":"white"} -->
<p class="has-white-color has-text-color" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--x-small)">Most films delivered 21 days after the brief</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|x-small","right":"var:preset|spacing|x-small"}}},"layout":{"type":"constrained","contentSize":"860px"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--x-small)"><!-- wp:paragraph {"align":"center","textColor":"secondary","fontSize":"small"} -->
<p class="has-text-align-center has-secondary-color has-text-color has-small-font-size">★★★★★</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"500","lineHeight":"1.3"}},"fontSize":"medium"} -->
<h2 class="wp-block-heading has-text-align-center has-medium-font-size" style="font-style:normal;font-weight:500;line-height:1.3">"We briefed them on a Monday. By Friday we had a rough cut that made our CEO cry. In a good way."</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"tertiary","fontSize":"x-small"} -->
<p class="has-text-align-center has-tertiary-color has-text-color has-x-small-font-size">Emma V., Head of Brand, Aurum</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|x-small","right":"var:preset|spacing|x-small"}}},"backgroundColor":"background","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-background-background-color has-background" style="padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--x-small)"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"1px"}},"textColor":"tertiary","fontSize":"x-small"} -->
<p class="has-tertiary-color has-text-color has-x-small-font-size" style="letter-spacing:1px">From the blog</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"500","lineHeight":"1.2"}},"fontSize":"large"} -->
<h2 class="wp-block-heading has-large-font-size" style="font-style:normal;font-weight:500;line-height:1.2">Latest news</h2>
<!-- /wp:heading -->

<!-- wp:spacer {"height":"var:preset|spacing|small"} -->
<div style="height:var(--wp--preset--spacing--small)" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:query {"queryId":4,"query":{"perPage":"3","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
<div class="wp-block-query"><!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"grid","columnCount":3}} -->
<!-- wp:post-featured-image {"isLink":true,"width":"100%","height":"240px","style":{"border":{"radius":"12px"},"spacing":{"margin":{"bottom":"var:preset|spacing|x-small"}}}} /-->

<!-- wp:post-date {"style":{"elements":{"link":{"color":{"text":"var:preset|color|tertiary"}}},"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"tertiary","fontSize":"x-small"} /-->

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

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|x-large","left":"var:preset|spacing|x-small","right":"var:preset|spacing|x-small"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--x-large);padding-left:var(--wp--preset--spacing--x-small)"><!-- wp:columns {"verticalAlignment":"center"} -->
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
