<?php
/**
 * Inspiro Lite Starter Content
 *
 * @link https://make.wordpress.org/core/2016/11/30/starter-content-for-themes-in-4-7/
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.0.0
 */

/**
 * Function to return the array of starter content for the theme.
 *
 * Passes it through the `inspiro_starter_content` filter before returning.
 *
 * @since Inspiro 1.0.0
 *
 * @return array A filtered array of args for the starter_content.
 */
function inspiro_get_starter_content() {

	// Define and register starter content to showcase the theme on new sites.
	$starter_content = array(
		'widgets'     => array(
			// Place three core-defined widgets in the sidebar area.
			'sidebar'  => array(
				'search',
				'text_about',
				'text_business_info',
			),

			// Add the core-defined business info widget to the footer 1 area.
			'footer_1' => array(
				'text_business_info',
			),

			// Put two core-defined widgets in the footer 2 area.
			'footer_2' => array(
				'text_about',
			),

            // Put two core-defined widgets in the footer 3 area.
            'footer_3' => array(
                'search',
            ),
		),

		// Specify the core-defined pages to create and add custom thumbnails to some of them.
		'posts'       => array(
			'front' => array(
				'post_type'    => 'page',
                'template' => 'page-templates/homepage-builder-bb.php',
				'post_title'   => esc_html_x( 'Homepage', 'Theme starter content', 'inspiro' ),
				'post_content' => '
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
                    <div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-white-color has-text-color wp-element-button" href="#" style="border-radius:0px">Learn More</a></div>
                    <!-- /wp:button --></div>
                    <!-- /wp:buttons --></div></div>
                    <!-- /wp:cover -->

                    <!-- wp:group {"layout":{"type":"constrained"}} -->
                    <div class="wp-block-group"><!-- wp:spacer {"height":"57px"} -->
                    <div style="height:57px" aria-hidden="true" class="wp-block-spacer"></div>
                    <!-- /wp:spacer -->

                    <!-- wp:heading {"textAlign":"center","style":{"typography":{"letterSpacing":"1px"}},"fontSize":"medium"} -->
                    <h2 class="wp-block-heading has-text-align-center has-medium-font-size" style="letter-spacing:1px">WE ARE A CREATIVE AGENCY LOCATED IN LONDON</h2>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"align":"center"} -->
                    <p class="has-text-align-center">This is some dummy copy. You’re not really supposed to read this dummy copy, it is just a placeholder for people who need some type to visualize what the actual copy might look like if it were real content.</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center","orientation":"horizontal"}} -->
                    <div class="wp-block-buttons"><!-- wp:button {"style":{"border":{"radius":"0px"}},"className":"is-style-outline","fontSize":"small"} -->
                    <div class="wp-block-button has-custom-font-size is-style-outline has-small-font-size"><a class="wp-block-button__link wp-element-button" href="#" style="border-radius:0px">ABOUT US</a></div>
                    <!-- /wp:button --></div>
                    <!-- /wp:buttons -->

                    <!-- wp:spacer {"height":"57px"} -->
                    <div style="height:57px" aria-hidden="true" class="wp-block-spacer"></div>
                    <!-- /wp:spacer --></div>
                    <!-- /wp:group -->

                    <!-- wp:group {"className":"pattern_multiple_covers","layout":{"type":"constrained"}} -->
                    <div class="wp-block-group alignfull pattern_multiple_covers has-background" id="services"><!-- wp:spacer {"height":"84px"} -->
                    <div style="height:84px" aria-hidden="true" class="wp-block-spacer"></div>
                    <!-- /wp:spacer -->

                    <!-- wp:paragraph {"align":"left","style":{"typography":{"letterSpacing":"1px"}},"textColor":"secondary"} -->
                    <p class="has-text-align-left has-secondary-color has-text-color" style="letter-spacing:1px">LET\'S WORK TOGETHER!</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:heading {"textAlign":"left"} -->
                    <h2 class="wp-block-heading has-text-align-left">Our Services</h2>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"align":"left"} -->
                    <p class="has-text-align-left">Inspiro is the perfect solution to create a beautiful website for your portfolio or your business. If you’re looking to create a captivating presence online, then you’ve found the right tool. The theme is easy to manage, with a drag-and-drop interface and fully customizable using the Theme Customizer.</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:spacer {"height":"46px"} -->
                    <div style="height:46px" aria-hidden="true" class="wp-block-spacer"></div>
                    <!-- /wp:spacer -->

                    <!-- wp:columns -->
                    <div class="wp-block-columns"><!-- wp:column {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}}} -->
                    <div class="wp-block-column" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:cover {"url":"' . esc_url( get_template_directory_uri() ) . '/assets/images/StockSnap_356BERTH29.jpg","id":7392,"dimRatio":70,"overlayColor":"primary","contentPosition":"bottom left","style":{"spacing":{"padding":{"top":"var:preset|spacing|small","right":"var:preset|spacing|x-small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|x-small"}}}} -->
                    <div class="wp-block-cover has-custom-content-position is-position-bottom-left" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--x-small)"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-70 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-7392" alt="" src="' . esc_url( get_template_directory_uri() ) . '/assets/images/StockSnap_356BERTH29.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"left":"0","top":"0","right":"0","bottom":"0"}}},"textColor":"white","fontSize":"medium"} -->
                    <h3 class="wp-block-heading has-white-color has-text-color has-medium-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0">Video<br>Production</h3>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"style":{"spacing":{"margin":{"left":"0","top":"0","right":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}},"textColor":"secondary"} -->
                    <p class="has-secondary-color has-text-color has-link-color" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0"><a href="#">Explore more →</a></p>
                    <!-- /wp:paragraph --></div></div>
                    <!-- /wp:cover --></div>
                    <!-- /wp:column -->

                    <!-- wp:column {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}}} -->
                    <div class="wp-block-column" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:cover {"url":"' . esc_url( get_template_directory_uri() ) . '/assets/images/StockSnap_KV0WLH355C.jpg","id":7394,"dimRatio":70,"overlayColor":"primary","contentPosition":"bottom left","style":{"spacing":{"padding":{"top":"var:preset|spacing|small","right":"var:preset|spacing|x-small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|x-small"}}}} -->
                    <div class="wp-block-cover has-custom-content-position is-position-bottom-left" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--x-small)"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-70 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-7394" alt="" src="' . esc_url( get_template_directory_uri() ) . '/assets/images/StockSnap_KV0WLH355C.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"left":"0","top":"0","right":"0","bottom":"0"}}},"textColor":"white","fontSize":"medium"} -->
                    <h3 class="wp-block-heading has-white-color has-text-color has-medium-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0">Professional<br>Editing</h3>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"style":{"spacing":{"margin":{"left":"0","top":"0","right":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}},"textColor":"secondary"} -->
                    <p class="has-secondary-color has-text-color has-link-color" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0"><a href="#">Explore more →</a></p>
                    <!-- /wp:paragraph --></div></div>
                    <!-- /wp:cover --></div>
                    <!-- /wp:column -->

                    <!-- wp:column {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}}} -->
                    <div class="wp-block-column" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:cover {"url":"' . esc_url( get_template_directory_uri() ) . '/assets/images/StockSnap_M6D1GS9PSL.jpg","id":7497,"dimRatio":70,"overlayColor":"primary","contentPosition":"bottom left","style":{"spacing":{"padding":{"top":"var:preset|spacing|small","right":"var:preset|spacing|x-small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|x-small"}}}} -->
                    <div class="wp-block-cover has-custom-content-position is-position-bottom-left" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--x-small)"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-70 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-7497" alt="" src="' . esc_url( get_template_directory_uri() ) . '/assets/images/StockSnap_M6D1GS9PSL.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"left":"0","top":"0","right":"0","bottom":"0"}}},"textColor":"white","fontSize":"medium"} -->
                    <h3 class="wp-block-heading has-white-color has-text-color has-medium-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0">Aerial<br>Video</h3>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"style":{"spacing":{"margin":{"left":"0","top":"0","right":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}},"textColor":"secondary"} -->
                    <p class="has-secondary-color has-text-color has-link-color" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0"><a href="#">Explore more →</a></p>
                    <!-- /wp:paragraph --></div></div>
                    <!-- /wp:cover --></div>
                    <!-- /wp:column --></div>
                    <!-- /wp:columns -->

                    <!-- wp:spacer {"height":"103px"} -->
                    <div style="height:103px" aria-hidden="true" class="wp-block-spacer"></div>
                    <!-- /wp:spacer --></div>
                    <!-- /wp:group -->

                    <!-- wp:group {"align":"full","layout":{"type":"constrained"}} -->
                    <div class="wp-block-group alignfull"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}}},"layout":{"type":"constrained"}} -->
                    <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small)"><!-- wp:spacer {"height":"30px"} -->
                    <div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
                    <!-- /wp:spacer -->

                    <!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|small"}}}} -->
                    <div class="wp-block-columns"><!-- wp:column {"verticalAlignment":"center"} -->
                    <div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"medium"} -->
                    <h2 class="wp-block-heading has-medium-font-size" style="text-transform:uppercase">About us</h2>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph -->
                    <p>This is some dummy copy. You’re not really supposed to read this dummy copy, it is just a placeholder for people who need some type to visualize what the actual copy might look like if it were real content.</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"left","orientation":"horizontal"}} -->
                    <div class="wp-block-buttons"><!-- wp:button {"style":{"border":{"radius":"0px"}},"className":"is-style-outline"} -->
                    <div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="#" style="border-radius:0px">ABOUT US</a></div>
                    <!-- /wp:button --></div>
                    <!-- /wp:buttons -->

                    <!-- wp:paragraph -->
                    <p></p>
                    <!-- /wp:paragraph --></div>
                    <!-- /wp:column -->

                    <!-- wp:column -->
                    <div class="wp-block-column"><!-- wp:image {"id":26,"sizeSlug":"large","linkDestination":"none"} -->
                    <figure class="wp-block-image size-large"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/StockSnap_M6D1GS9PSL.jpg" alt="" class="wp-image-26"/></figure>
                    <!-- /wp:image --></div>
                    <!-- /wp:column --></div>
                    <!-- /wp:columns -->

                    <!-- wp:spacer {"height":"30px"} -->
                    <div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
                    <!-- /wp:spacer --></div>
                    <!-- /wp:group --></div>
                    <!-- /wp:group -->

                    <!-- wp:group {"layout":{"type":"constrained"}} -->
                    <div class="wp-block-group alignfull has-background"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}}},"layout":{"type":"constrained"}} -->
                    <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small)"><!-- wp:spacer {"height":"30px"} -->
                    <div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
                    <!-- /wp:spacer -->

                    <!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|small"}}}} -->
                    <div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center"} -->
                    <div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":27,"sizeSlug":"large","linkDestination":"none"} -->
                    <figure class="wp-block-image size-large"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/StockSnap_M6D1GS9PSL.jpg" alt="" class="wp-image-27"/></figure>
                    <!-- /wp:image --></div>
                    <!-- /wp:column -->

                    <!-- wp:column {"verticalAlignment":"center"} -->
                    <div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"medium"} -->
                    <h2 class="wp-block-heading has-medium-font-size" style="text-transform:uppercase">Our Services</h2>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph -->
                    <p>This is some dummy copy. You’re not really supposed to read this dummy copy, it is just a placeholder for people who need some type to visualize what the actual copy might look like if it were real content.</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:buttons -->
                    <div class="wp-block-buttons"><!-- wp:button {"style":{"border":{"radius":"0px"}},"className":"is-style-outline"} -->
                    <div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="#" style="border-radius:0px">SERVICES</a></div>
                    <!-- /wp:button --></div>
                    <!-- /wp:buttons --></div>
                    <!-- /wp:column --></div>
                    <!-- /wp:columns -->

                    <!-- wp:spacer {"height":"30px"} -->
                    <div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
                    <!-- /wp:spacer --></div>
                    <!-- /wp:group --></div>
                    <!-- /wp:group -->

                    <!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0px"}}},"backgroundColor":"black","className":"portfolio-dark","layout":{"type":"constrained"}} -->
                    <div class="wp-block-group alignfull portfolio-dark has-black-background-color has-background" id="portfolio" style="margin-top:0px"><!-- wp:spacer {"height":"122px"} -->
                    <div style="height:122px" aria-hidden="true" class="wp-block-spacer"></div>
                    <!-- /wp:spacer -->

                    <!-- wp:paragraph {"align":"left","style":{"typography":{"letterSpacing":"1px"},"color":{"text":"#0bb4aa"}}} -->
                    <p class="has-text-align-left has-text-color" style="color:#0bb4aa;letter-spacing:1px">FROM THE PORTFOLIO</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:heading {"textAlign":"left","textColor":"white","fontSize":"large"} -->
                    <h2 class="wp-block-heading has-text-align-left has-white-color has-text-color has-large-font-size">Our Work</h2>
                    <!-- /wp:heading -->

                    <!-- wp:spacer {"height":"44px"} -->
                    <div style="height:44px" aria-hidden="true" class="wp-block-spacer"></div>
                    <!-- /wp:spacer -->

                    <!-- wp:wpzoom-blocks/portfolio {"align":"full","textColor":"white","btnHoverTextColor":"#101010","btnBgColor":"#0bb4aa","btnHoverBgColor":"#ffffff"} /-->

                    <!-- wp:spacer {"height":"50px"} -->
                    <div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
                    <!-- /wp:spacer --></div>
                    <!-- /wp:group -->

                    <!-- wp:group {"layout":{"type":"constrained","contentSize":"1200px","justifyContent":"center"}} -->
                    <div id="partners" class="wp-block-group"><!-- wp:spacer {"height":"80px"} -->
                    <div style="height:80px" aria-hidden="true" class="wp-block-spacer"></div>
                    <!-- /wp:spacer -->

                    <!-- wp:group {"style":{"spacing":{"padding":{"top":"0px","bottom":"var:preset|spacing|small","right":"0","left":"0"}}},"layout":{"type":"constrained","contentSize":"","justifyContent":"left","wideSize":""}} -->
                    <div class="wp-block-group" style="padding-top:0px;padding-right:0;padding-bottom:var(--wp--preset--spacing--small);padding-left:0"><!-- wp:columns -->
                    <div class="wp-block-columns"><!-- wp:column {"width":"60%"} -->
                    <div class="wp-block-column" style="flex-basis:60%"><!-- wp:spacer {"height":"20px"} -->
                    <div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>
                    <!-- /wp:spacer -->

                    <!-- wp:paragraph {"textColor":"secondary"} -->
                    <p class="has-secondary-color has-text-color">WE WORK WITH</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:heading {"textAlign":"left"} -->
                    <h2 class="wp-block-heading has-text-align-left">Our Clients</h2>
                    <!-- /wp:heading -->

                    <!-- wp:spacer {"height":"20px"} -->
                    <div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>
                    <!-- /wp:spacer -->

                    <!-- wp:paragraph {"align":"left","textColor":"tertiary"} -->
                    <p class="has-text-align-left has-tertiary-color has-text-color">This is some dummy copy. You’re not really supposed to read this dummy copy, it is just a place holder for people who need some type to visualize.</p>
                    <!-- /wp:paragraph --></div>
                    <!-- /wp:column -->

                    <!-- wp:column {"width":"40%"} -->
                    <div class="wp-block-column" style="flex-basis:40%"></div>
                    <!-- /wp:column --></div>
                    <!-- /wp:columns --></div>
                    <!-- /wp:group -->

                    <!-- wp:group {"layout":{"type":"constrained"}} -->
                    <div class="wp-block-group"><!-- wp:columns {"verticalAlignment":"center"} -->
                    <div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"20%"} -->
                    <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:20%"><!-- wp:image {"width":"200px","sizeSlug":"full","linkDestination":"none","align":"center"} -->
                    <figure class="wp-block-image aligncenter size-full is-resized"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/logos/logo-1.svg" alt="" style="width:200px"/></figure>
                    <!-- /wp:image --></div>
                    <!-- /wp:column -->

                    <!-- wp:column {"verticalAlignment":"center","width":"20%"} -->
                    <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:20%"><!-- wp:image {"width":"105px","sizeSlug":"full","linkDestination":"none","align":"center"} -->
                    <figure class="wp-block-image aligncenter size-full is-resized"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/logos/logo-2.svg" alt="" style="width:105px"/></figure>
                    <!-- /wp:image --></div>
                    <!-- /wp:column -->

                    <!-- wp:column {"verticalAlignment":"center","width":"20%"} -->
                    <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:20%"><!-- wp:image {"width":"175px","sizeSlug":"full","linkDestination":"none","align":"center"} -->
                    <figure class="wp-block-image aligncenter size-full is-resized"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/logos/logo-3.svg" alt="" style="width:175px"/></figure>
                    <!-- /wp:image --></div>
                    <!-- /wp:column -->

                    <!-- wp:column {"verticalAlignment":"center","width":"20%"} -->
                    <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:20%"><!-- wp:image {"width":"180px","sizeSlug":"full","linkDestination":"none","align":"center"} -->
                    <figure class="wp-block-image aligncenter size-full is-resized"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/logos/logo-4.svg" alt="" style="width:180px"/></figure>
                    <!-- /wp:image --></div>
                    <!-- /wp:column -->

                    <!-- wp:column {"verticalAlignment":"center","width":"20%"} -->
                    <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:20%"><!-- wp:image {"width":"180px","sizeSlug":"full","linkDestination":"none","align":"center"} -->
                    <figure class="wp-block-image aligncenter size-full is-resized"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/logos/logo-5.svg" alt="" style="width:180px"/></figure>
                    <!-- /wp:image --></div>
                    <!-- /wp:column --></div>
                    <!-- /wp:columns --></div>
                    <!-- /wp:group -->

                    <!-- wp:spacer -->
                    <div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
                    <!-- /wp:spacer --></div>
                    <!-- /wp:group -->

                    <!-- wp:group {"layout":{"type":"constrained"}} -->
                    <div id="team" class="wp-block-group"><!-- wp:group {"layout":{"type":"default"}} -->
                    <div class="wp-block-group"><!-- wp:spacer {"height":"74px"} -->
                    <div style="height:74px" aria-hidden="true" class="wp-block-spacer"></div>
                    <!-- /wp:spacer -->

                    <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}},"textColor":"secondary"} -->
                    <p class="has-secondary-color has-text-color has-link-color">MEET US</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:heading -->
                    <h2 class="wp-block-heading">Our Team</h2>
                    <!-- /wp:heading -->

                    <!-- wp:spacer {"height":"27px"} -->
                    <div style="height:27px" aria-hidden="true" class="wp-block-spacer"></div>
                    <!-- /wp:spacer -->

                    <!-- wp:spacer {"height":"0px"} -->
                    <div style="height:0px" aria-hidden="true" class="wp-block-spacer"></div>
                    <!-- /wp:spacer -->

                    <!-- wp:columns -->
                    <div class="wp-block-columns"><!-- wp:column {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}},"border":{"width":"0px","style":"none"}},"className":"is-style-default"} -->
                    <div class="wp-block-column is-style-default" style="border-style:none;border-width:0px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:image {"id":7403,"sizeSlug":"full","linkDestination":"none","className":"is-style-default"} -->
                    <figure class="wp-block-image size-full is-style-default"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/team1.jpg" alt="" class="wp-image-7403"/></figure>
                    <!-- /wp:image -->

                    <!-- wp:heading {"level":3} -->
                    <h3 class="wp-block-heading">Cynthia Howery</h3>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|tertiary"}}}},"textColor":"tertiary"} -->
                    <p class="has-tertiary-color has-text-color has-link-color">Co-founder / CEO</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph -->
                    <p>This is some dummy copy. You’re not really supposed to read this dummy copy, it is just a place holder for people who need some type.</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:social-links {"iconColor":"primary","iconColorValue":"currentColor","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|x-small","left":"var:preset|spacing|x-small"}}},"className":"is-style-logos-only","layout":{"type":"flex","flexWrap":"wrap"}} -->
                    <ul class="wp-block-social-links has-icon-color is-style-logos-only"><!-- wp:social-link {"url":"#","service":"instagram"} /-->

                    <!-- wp:social-link {"url":"#","service":"linkedin"} /--></ul>
                    <!-- /wp:social-links --></div>
                    <!-- /wp:column -->

                    <!-- wp:column {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}},"border":{"width":"0px","style":"none"}},"className":"is-style-default"} -->
                    <div class="wp-block-column is-style-default" style="border-style:none;border-width:0px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:image {"id":7404,"sizeSlug":"full","linkDestination":"none"} -->
                    <figure class="wp-block-image size-full"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/team2.jpg" alt="" class="wp-image-7404"/></figure>
                    <!-- /wp:image -->

                    <!-- wp:heading {"level":3} -->
                    <h3 class="wp-block-heading">Jimmy Banh</h3>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|tertiary"}}}},"textColor":"tertiary"} -->
                    <p class="has-tertiary-color has-text-color has-link-color">LEAD DESIGNER</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph -->
                    <p>This is some dummy copy. You’re not really supposed to read this dummy copy, it is just a place holder for people who need some type.</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:social-links {"iconColor":"primary","iconColorValue":"currentColor","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|x-small","left":"var:preset|spacing|x-small"}}},"className":"is-style-logos-only"} -->
                    <ul class="wp-block-social-links has-icon-color is-style-logos-only"><!-- wp:social-link {"url":"#","service":"linkedin"} /-->

                    <!-- wp:social-link {"url":"#","service":"x"} /--></ul>
                    <!-- /wp:social-links --></div>
                    <!-- /wp:column -->

                    <!-- wp:column {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}},"border":{"width":"0px","style":"none"}},"className":"is-style-default"} -->
                    <div class="wp-block-column is-style-default" style="border-style:none;border-width:0px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:image {"id":7405,"sizeSlug":"full","linkDestination":"none"} -->
                    <figure class="wp-block-image size-full"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/team3.jpg" alt="" class="wp-image-7405"/></figure>
                    <!-- /wp:image -->

                    <!-- wp:heading {"level":3} -->
                    <h3 class="wp-block-heading">Leo Palmieri</h3>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|tertiary"}}}},"textColor":"tertiary"} -->
                    <p class="has-tertiary-color has-text-color has-link-color">CFO</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph -->
                    <p>This is some dummy copy. You’re not really supposed to read this dummy copy, it is just a place holder for people who need some type.</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:social-links {"iconColor":"primary","iconColorValue":"currentColor","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|x-small","left":"var:preset|spacing|x-small"}}},"className":"is-style-logos-only"} -->
                    <ul class="wp-block-social-links has-icon-color is-style-logos-only"><!-- wp:social-link {"url":"#","service":"instagram"} /-->

                    <!-- wp:social-link {"url":"#","service":"linkedin"} /--></ul>
                    <!-- /wp:social-links --></div>
                    <!-- /wp:column --></div>
                    <!-- /wp:columns -->

                    <!-- wp:spacer {"height":"63px"} -->
                    <div style="height:63px" aria-hidden="true" class="wp-block-spacer"></div>
                    <!-- /wp:spacer -->

                    <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
                    <div class="wp-block-buttons"><!-- wp:button {"style":{"border":{"radius":"0px"}},"className":"is-style-outline"} -->
                    <div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="#" style="border-radius:0px">VIEW ALL</a></div>
                    <!-- /wp:button --></div>
                    <!-- /wp:buttons -->

                    <!-- wp:spacer {"height":"81px"} -->
                    <div style="height:81px" aria-hidden="true" class="wp-block-spacer"></div>
                    <!-- /wp:spacer --></div>
                    <!-- /wp:group --></div>
                    <!-- /wp:group -->

                    <!-- wp:cover {"url":"' . esc_url( get_template_directory_uri() ) . '/assets/images/StockSnap_M6D1GS9PSL.jpg","id":24,"hasParallax":true,"dimRatio":40,"overlayColor":"black","minHeightUnit":"px","contentPosition":"center center","align":"full","style":{"border":{"radius":"0px"}},"className":"is-position-center-center"} -->
                    <div class="wp-block-cover alignfull has-parallax is-position-center-center" style="border-radius:0px"><span aria-hidden="true" class="wp-block-cover__background has-black-background-color has-background-dim-40 has-background-dim"></span><div role="img" class="wp-block-cover__image-background wp-image-24 has-parallax" style="background-position:50% 50%;background-image:url(' . esc_url( get_template_directory_uri() ) . '/assets/images/StockSnap_M6D1GS9PSL.jpg)"></div><div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"constrained"}} -->
                    <div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":3,"style":{"color":{"text":"#fffffa"},"typography":{"textTransform":"uppercase"}},"fontSize":"medium"} -->
                    <h3 class="wp-block-heading has-text-align-center has-text-color has-medium-font-size" style="color:#fffffa;text-transform:uppercase">Unleash your creativity with Inspiro</h3>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"align":"center","textColor":"white"} -->
                    <p class="has-text-align-center has-white-color has-text-color">This is some dummy copy. You’re not really supposed to read this dummy copy, it is just a placeholder for people who need some type to visualize what the actual copy might look like if it were real content.</p>
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

                    <!-- wp:paragraph {"align":"left","textColor":"secondary"} -->
                    <p class="has-text-align-left has-secondary-color has-text-color">FROM THE BLOG</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:heading {"textAlign":"left","className":"wp-block-heading"} -->
                    <h2 class="wp-block-heading has-text-align-left">Latest News</h2>
                    <!-- /wp:heading -->

                    <!-- wp:spacer {"height":"33px"} -->
                    <div style="height:33px" aria-hidden="true" class="wp-block-spacer"></div>
                    <!-- /wp:spacer -->

                    <!-- wp:query {"queryId":4,"query":{"perPage":"3","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
                    <div class="wp-block-query"><!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"grid","columnCount":3}} -->
                    <!-- wp:post-featured-image {"isLink":true,"width":"100%","height":"240px","style":{"border":{"radius":"5px"},"spacing":{"margin":{"bottom":"var:preset|spacing|x-small"}}}} /-->

                    <!-- wp:post-date {"style":{"elements":{"link":{"color":{"text":"var:preset|color|tertiary"}}},"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"tertiary"} /-->

                    <!-- wp:post-title {"level":3,"isLink":true,"style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|x-small"}}}} /-->

                    <!-- wp:post-excerpt {"excerptLength":38,"style":{"elements":{"link":{"color":{"text":"var:preset|color|tertiary"}}}},"textColor":"tertiary"} /-->

                    <!-- wp:read-more {"style":{"border":{"width":"2px"},"spacing":{"padding":{"right":"var:preset|spacing|x-small","left":"var:preset|spacing|x-small","top":"10px","bottom":"10px"}},"typography":{"textTransform":"uppercase"}},"textColor":"foreground"} /-->
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
                    <!-- /wp:group -->',
			),
            'about' => array(
                'thumbnail'    => '{{image-aerial-land}}',
                'post_type'    => 'page',
                'post_title'   => esc_html_x( 'About', 'Theme starter content', 'inspiro' ),
                'post_content' => '
                    <!-- wp:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"100"}},"fontSize":"large"} -->
                    <h2 class="has-large-font-size" id="inspiro-is-a-digital-product-agency-that-focuses-on-strategy-and-design" style="font-style:normal;font-weight:100"><strong>Inspiro is a digital product agency that focuses on strategy and design.</strong></h2>
                    <!-- /wp:heading -->

                    <!-- wp:spacer -->
                    <div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
                    <!-- /wp:spacer -->

                    <!-- wp:columns {"align":"wide"} -->
                    <div class="wp-block-columns alignwide"><!-- wp:column -->
                    <div class="wp-block-column"><!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
                    <figure class="wp-block-image size-large"><img src="' . get_stylesheet_directory_uri() . '/assets/images/video-1.jpeg" alt=""/></figure>
                    <!-- /wp:image -->

                    <!-- wp:paragraph {"textColor":"black","fontSize":"medium"} -->
                    <p class="has-black-color has-text-color has-medium-font-size"><a href="#">The Crew</a></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"style":{"color":{"text":"#7a7a7a"}}} -->
                    <p class="has-text-color" style="color:#7a7a7a">This is some dummy copy. You’re not really supposed to read this dummy copy, it is just a place holder for people who need some type to visualize what the actual copy might look like if it were real content.</p>
                    <!-- /wp:paragraph --></div>
                    <!-- /wp:column -->

                    <!-- wp:column -->
                    <div class="wp-block-column"><!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
                    <figure class="wp-block-image size-large"><img src="' . get_stylesheet_directory_uri() . '/assets/images/video-2.jpeg" alt=""/></figure>
                    <!-- /wp:image -->

                    <!-- wp:paragraph {"textColor":"black","fontSize":"medium"} -->
                    <p class="has-black-color has-text-color has-medium-font-size"><a href="#">Our Philosophy</a></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"style":{"color":{"text":"#7a7a7a"}}} -->
                    <p class="has-text-color" style="color:#7a7a7a">This is some dummy copy. You’re not really supposed to read this dummy copy, it is just a place holder for people who need some type to visualize what the actual copy might look like if it were real content.</p>
                    <!-- /wp:paragraph --></div>
                    <!-- /wp:column -->

                    <!-- wp:column -->
                    <div class="wp-block-column"><!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
                    <figure class="wp-block-image size-large"><img src="' . get_stylesheet_directory_uri() . '/assets/images/video-3.jpeg" alt=""/></figure>
                    <!-- /wp:image -->

                    <!-- wp:paragraph {"textColor":"black","fontSize":"medium"} -->
                    <p class="has-black-color has-text-color has-medium-font-size"><a href="#">Services</a></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"style":{"color":{"text":"#7a7a7a"}}} -->
                    <p class="has-text-color" style="color:#7a7a7a">This is some dummy copy. You’re not really supposed to read this dummy copy, it is just a place holder for people who need some type to visualize what the actual copy might look like if it were real content.</p>
                    <!-- /wp:paragraph --></div>
                    <!-- /wp:column --></div>
                    <!-- /wp:columns -->

                    <!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"300"}},"fontSize":"large"} -->
                    <h3 class="has-large-font-size" id="inspiro-is-a-digital-product-agency-that-focuses-on-strategy-and-desig" style="font-weight:300">Showreel</h3>
                    <!-- /wp:heading -->

                    <!-- wp:embed {"url":"https://videopress.com/v/bjvmxiQS","type":"video","providerNameSlug":"videopress","responsive":true,"align":"wide","className":"wp-embed-aspect-16-9 wp-has-aspect-ratio"} -->
                    <figure class="wp-block-embed alignwide is-type-video is-provider-videopress wp-block-embed-videopress wp-embed-aspect-16-9 wp-has-aspect-ratio"><div class="wp-block-embed__wrapper">
                    https://videopress.com/v/bjvmxiQS
                    </div></figure>
                    <!-- /wp:embed -->

                    <!-- wp:spacer -->
                    <div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
                    <!-- /wp:spacer -->

                    <!-- wp:cover {"overlayColor":"black","minHeight":316,"minHeightUnit":"px","align":"full","style":{"spacing":{"padding":{"top":"50px","right":"50px","bottom":"50px","left":"50px"}}}} -->
                    <div class="wp-block-cover alignfull" style="padding-top:50px;padding-right:50px;padding-bottom:50px;padding-left:50px;min-height:316px"><span aria-hidden="true" class="has-black-background-color has-background-dim-100 wp-block-cover__gradient-background has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:columns {"verticalAlignment":"center"} -->
                    <div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"padding":{"top":"20px","right":"0px","bottom":"20px","left":"0px"}}}} -->
                    <div class="wp-block-column is-vertically-aligned-center" style="padding-top:20px;padding-right:0px;padding-bottom:20px;padding-left:0px"><!-- wp:group {"style":{"spacing":{"blockGap":"0px"}},"layout":{"type":"flex","allowOrientation":false,"justifyContent":"space-between","flexWrap":"nowrap"}} -->
                    <div class="wp-block-group"><!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
                    <figure class="wp-block-image size-full"><img src="' . get_stylesheet_directory_uri() . '/assets/images/laurel_left.png" alt=""/></figure>
                    <!-- /wp:image -->

                    <!-- wp:group -->
                    <div class="wp-block-group"><!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1","fontSize":"18px"}},"textColor":"white"} -->
                    <p class="has-text-align-center has-white-color has-text-color" style="font-size:18px;line-height:1"><strong>' . esc_html__( '"Best Film"', 'inspiro' ) . '<br></strong>' . esc_html__( 'Winner', 'inspiro' ) . '</p>
                    <!-- /wp:paragraph --></div>
                    <!-- /wp:group -->

                    <!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
                    <figure class="wp-block-image size-full"><img src="' . get_stylesheet_directory_uri() . '/assets/images/laurel_right.png" alt=""/></figure>
                    <!-- /wp:image --></div>
                    <!-- /wp:group --></div>
                    <!-- /wp:column -->

                    <!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"padding":{"top":"20px","right":"0px","bottom":"20px","left":"0px"}}}} -->
                    <div class="wp-block-column is-vertically-aligned-center" style="padding-top:20px;padding-right:0px;padding-bottom:20px;padding-left:0px"><!-- wp:group {"style":{"spacing":{"blockGap":"0px"}},"layout":{"type":"flex","allowOrientation":false,"justifyContent":"space-between","flexWrap":"nowrap"}} -->
                    <div class="wp-block-group"><!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
                    <figure class="wp-block-image size-full"><img src="' . get_stylesheet_directory_uri() . '/assets/images/laurel_left.png" alt=""/></figure>
                    <!-- /wp:image -->

                    <!-- wp:group -->
                    <div class="wp-block-group"><!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1","fontSize":"18px"}},"textColor":"white"} -->
                    <p class="has-text-align-center has-white-color has-text-color" style="font-size:18px;line-height:1"><strong>' . esc_html__( '"New Film Festival"', 'inspiro' ) . '</strong><br>' . esc_html__( 'Winner', 'inspiro' ) . '</p>
                    <!-- /wp:paragraph --></div>
                    <!-- /wp:group -->

                    <!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
                    <figure class="wp-block-image size-full"><img src="' . get_stylesheet_directory_uri() . '/assets/images/laurel_right.png" alt=""/></figure>
                    <!-- /wp:image --></div>
                    <!-- /wp:group --></div>
                    <!-- /wp:column -->

                    <!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"padding":{"top":"20px","right":"0px","bottom":"20px","left":"0px"}}}} -->
                    <div class="wp-block-column is-vertically-aligned-center" style="padding-top:20px;padding-right:0px;padding-bottom:20px;padding-left:0px"><!-- wp:group {"style":{"spacing":{"blockGap":"0px"}},"layout":{"type":"flex","allowOrientation":false,"justifyContent":"space-between","flexWrap":"nowrap"}} -->
                    <div class="wp-block-group"><!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
                    <figure class="wp-block-image size-full"><img src="' . get_stylesheet_directory_uri() . '/assets/images/laurel_left.png" alt=""/></figure>
                    <!-- /wp:image -->

                    <!-- wp:group -->
                    <div class="wp-block-group"><!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1","fontSize":"18px"}},"textColor":"white"} -->
                    <p class="has-text-align-center has-white-color has-text-color" style="font-size:18px;line-height:1"><strong>' . esc_html__( '"Best Short"', 'inspiro' ) . '</strong><br>' . esc_html__( 'Winner', 'inspiro' ) . '</p>
                    <!-- /wp:paragraph --></div>
                    <!-- /wp:group -->

                    <!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
                    <figure class="wp-block-image size-full"><img src="' . get_stylesheet_directory_uri() . '/assets/images/laurel_right.png" alt=""/></figure>
                    <!-- /wp:image --></div>
                    <!-- /wp:group --></div>
                    <!-- /wp:column --></div>
                    <!-- /wp:columns --></div></div>
                    <!-- /wp:cover -->',
            ),
            'contact' => array(
                'thumbnail'    => '{{image-contact}}',
                'post_type'    => 'page',
                'post_title'   => esc_html_x( 'Contact', 'Theme starter content', 'inspiro' ),
                'post_content' => '
                    <!-- wp:spacer {"height":"156px"} -->
                    <div style="height:156px" aria-hidden="true" class="wp-block-spacer"></div>
                    <!-- /wp:spacer -->

                    <!-- wp:group {"layout":{"type":"constrained"}} -->
                    <div class="wp-block-group"><!-- wp:columns {"verticalAlignment":"top","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}}} -->
                    <div class="wp-block-columns are-vertically-aligned-top" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:column {"verticalAlignment":"top","width":"50%","style":{"spacing":{"padding":{"right":"7%"}}},"layout":{"type":"default"}} -->
                    <div class="wp-block-column is-vertically-aligned-top" style="padding-right:7%;flex-basis:50%"><!-- wp:paragraph {"style":{"color":{"text":"#0bb4aa"}}} -->
                    <p class="has-text-color" style="color:#0bb4aa">Let\'s Connect!</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:heading {"fontSize":"large"} -->
                    <h2 class="wp-block-heading has-large-font-size">Ready to start your next project?</h2>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph -->
                    <p>This is some dummy copy. You’re not really supposed to read this dummy copy, it is just a place holder for people who <a href="#">need some type</a> to visualize what the actual copy might look like if it were real content.<br></p>
                    <!-- /wp:paragraph --></div>
                    <!-- /wp:column -->

                    <!-- wp:column {"verticalAlignment":"top","width":"50%","layout":{"type":"default"}} -->
                    <div class="wp-block-column is-vertically-aligned-top" style="flex-basis:50%"><!-- wp:wpzoom-forms/form-block {"formId":"21"} /--></div>
                    <!-- /wp:column --></div>
                    <!-- /wp:columns -->

                    <!-- wp:spacer {"height":"135px"} -->
                    <div style="height:135px" aria-hidden="true" class="wp-block-spacer"></div>
                    <!-- /wp:spacer --></div>
                    <!-- /wp:group -->

                    <!-- wp:group {"align":"full","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
                    <div class="wp-block-group alignfull"><!-- wp:columns {"verticalAlignment":"center","align":"full","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"blockGap":{"top":"0","left":"var:preset|spacing|x-small"}}},"backgroundColor":"light-background"} -->
                    <div class="wp-block-columns alignfull are-vertically-aligned-center" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:column {"verticalAlignment":"center","width":"50%","className":"map-grayscale","layout":{"type":"default"}} -->
                    <div class="wp-block-column is-vertically-aligned-center map-grayscale" style="flex-basis:50%"><!-- wp:image {"id":7500,"sizeSlug":"large","linkDestination":"none"} -->
                    <figure class="wp-block-image size-large"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/map2.png" alt="" class="wp-image-7500"/></figure>
                    <!-- /wp:image --></div>
                    <!-- /wp:column -->

                    <!-- wp:column {"verticalAlignment":"center","width":"50%","style":{"spacing":{"padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small","right":"var:preset|spacing|small","left":"2%"}}},"layout":{"type":"default"}} -->
                    <div class="wp-block-column is-vertically-aligned-center" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:2%;flex-basis:50%"><!-- wp:heading {"level":3,"fontSize":"large"} -->
                    <h3 class="wp-block-heading has-large-font-size">Inspiro</h3>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph -->
                    <p></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:heading {"level":3} -->
                    <h3 class="wp-block-heading"><strong>Address</strong></h3>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph -->
                    <p>1500 Broadway, New York, NY 10036, United States</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:heading {"level":3} -->
                    <h3 class="wp-block-heading"><strong>Email</strong></h3>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph -->
                    <p>office@example.com</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:heading {"level":3} -->
                    <h3 class="wp-block-heading"><strong>Phone</strong></h3>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph -->
                    <p>509-394-2555</p>
                    <!-- /wp:paragraph --></div>
                    <!-- /wp:column --></div>
                    <!-- /wp:columns --></div>
                    <!-- /wp:group -->

                    <!-- wp:group {"style":{"layout":{"type":"constrained"}} -->
                    <div class="wp-block-group"><!-- wp:group {"layout":{"type":"default"}} -->
                    <div class="wp-block-group"><!-- wp:spacer {"height":"69px"} -->
                    <div style="height:69px" aria-hidden="true" class="wp-block-spacer"></div>
                    <!-- /wp:spacer -->

                    <!-- wp:columns -->
                    <div class="wp-block-columns"><!-- wp:column -->
                    <div class="wp-block-column"><!-- wp:paragraph {"align":"left","style":{"color":{"text":"#0bb4aa"}}} -->
                    <p class="has-text-align-left has-text-color" style="color:#0bb4aa">WHERE ARE WE LOCATED</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:heading {"textAlign":"left","fontSize":"large"} -->
                    <h2 class="wp-block-heading has-text-align-left has-large-font-size">Our Locations</h2>
                    <!-- /wp:heading -->

                    <!-- wp:columns -->
                    <div class="wp-block-columns"><!-- wp:column -->
                    <div class="wp-block-column"><!-- wp:paragraph {"style":{"typography":{"lineHeight":"2.5"}}} -->
                    <p style="line-height:2.5">Amsterdam<br>Munich<br>Brussels<br>Hong Kong<br>Barcelona</p>
                    <!-- /wp:paragraph --></div>
                    <!-- /wp:column -->

                    <!-- wp:column -->
                    <div class="wp-block-column"><!-- wp:paragraph {"style":{"typography":{"lineHeight":"2.5"}}} -->
                    <p style="line-height:2.5">New York<br>Paris<br>San Francisco<br>Sydney<br>Tokyo</p>
                    <!-- /wp:paragraph --></div>
                    <!-- /wp:column --></div>
                    <!-- /wp:columns --></div>
                    <!-- /wp:column -->

                    <!-- wp:column -->
                    <div class="wp-block-column"><!-- wp:image {"id":5640,"sizeSlug":"large","linkDestination":"none"} -->
                    <figure class="wp-block-image size-large"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/map.png" alt="" class="wp-image-5640"/></figure>
                    <!-- /wp:image --></div>
                    <!-- /wp:column --></div>
                    <!-- /wp:columns -->

                    <!-- wp:spacer {"height":"52px"} -->
                    <div style="height:52px" aria-hidden="true" class="wp-block-spacer"></div>
                    <!-- /wp:spacer --></div>
                    <!-- /wp:group --></div>
                    <!-- /wp:group -->

                    <!-- wp:group {"layout":{"type":"constrained"}} -->
                    <div class="wp-block-group"><!-- wp:spacer {"height":"33px"} -->
                    <div style="height:33px" aria-hidden="true" class="wp-block-spacer"></div>
                    <!-- /wp:spacer -->

                    <!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","left":"0","bottom":"var:preset|spacing|60"}}}} -->
                    <div class="wp-block-columns are-vertically-aligned-center" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60);padding-left:0"><!-- wp:column {"verticalAlignment":"center","width":"66.66%","layout":{"type":"constrained","justifyContent":"left"}} -->
                    <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:66.66%"><!-- wp:heading -->
                    <h2 class="wp-block-heading">Thinking about joining our team?</h2>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph -->
                    <p>Check out our open positions, or drop us a line, say hi.</p>
                    <!-- /wp:paragraph --></div>
                    <!-- /wp:column -->

                    <!-- wp:column {"verticalAlignment":"center","width":"33.33%"} -->
                    <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:33.33%"><!-- wp:buttons {"layout":{"type":"flex","justifyContent":"right"}} -->
                    <div class="wp-block-buttons"><!-- wp:button {"style":{"border":{"radius":"0px"},"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"600","fontSize":"14px","letterSpacing":"1px"}},"className":"is-style-fill"} -->
                    <div class="wp-block-button has-custom-font-size is-style-fill" style="font-size:14px;font-style:normal;font-weight:600;letter-spacing:1px;text-transform:uppercase"><a class="wp-block-button__link wp-element-button" style="border-radius:0px">View Job Openings</a></div>
                    <!-- /wp:button --></div>
                    <!-- /wp:buttons --></div>
                    <!-- /wp:column --></div>
                    <!-- /wp:columns -->

                    <!-- wp:spacer {"height":"45px"} -->
                    <div style="height:45px" aria-hidden="true" class="wp-block-spacer"></div>
                    <!-- /wp:spacer --></div>
                    <!-- /wp:group -->
                ',
            ),
			'blog',
		),

		// Create the custom image attachments used as post thumbnails for pages.
		'attachments' => array(
			'image-aerial-land' => array(
				'post_title' => _x( 'Aerial Land', 'Theme starter content', 'inspiro' ),
				'file'       => 'assets/images/StockSnap_M6D1GS9PSL.jpg', // URL relative to the template directory.
			),
            'image-contact' => array(
                'post_title' => _x( 'Contact', 'Theme starter content', 'inspiro' ),
                'file'       => 'assets/images/StockSnap_6O7JXC5DC5.jpg', // URL relative to the template directory.
            ),
		),

		// Default to a static front page and assign the front and posts pages.
		'options'     => array(
			'show_on_front'  => 'page',
			'page_on_front'  => '{{front}}',
			'page_for_posts' => '{{blog}}',
		),

		// Set up nav menus for each of the two areas registered in the theme.
		'nav_menus'   => array(
			// Assign a menu to the "primary" location.
			'primary' => array(
				'name'  => __( 'Main Menu', 'inspiro' ),
				'items' => array(
					'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
					'page_about',
					'page_blog',
					'page_contact',
				),
			),
		),
	);

	/**
	 * Filters Inspiro array of starter content.
	 *
	 * @since Inspiro 1.0.0
	 *
	 * @param array $starter_content Array of starter content.
	 */
	return apply_filters( 'inspiro_starter_content', $starter_content );
}
