<?php
/**
 * Title: Case Study
 * Slug: wpzoom/case-study
 * Description: A featured case-study layout with a large image, key metrics, and a result statement.
 * Categories: inspiro, featured, portfolio
 * Keywords: case study, project, client, results, success
 * Viewport Width: 1280
 * Inserter: true
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"80px","right":"20px","bottom":"80px","left":"20px"}},"color":{"background":"#f6f6f6"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#f6f6f6;padding-top:80px;padding-right:20px;padding-bottom:80px;padding-left:20px"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"13px","letterSpacing":"2px","textTransform":"uppercase","fontStyle":"normal","fontWeight":"600"}}} -->
<p class="has-text-align-center" style="font-size:13px;font-style:normal;font-weight:600;letter-spacing:2px;text-transform:uppercase"><?php esc_html_e( 'Case Study', 'inspiro' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","level":2,"style":{"typography":{"fontSize":"42px","lineHeight":"1.15"},"spacing":{"margin":{"top":"8px","bottom":"40px"}}}} -->
<h2 class="wp-block-heading has-text-align-center" style="margin-top:8px;margin-bottom:40px;font-size:42px;line-height:1.15"><?php esc_html_e( 'How Acme Co. cut deployment time by 80%', 'inspiro' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:image {"sizeSlug":"large","linkDestination":"none","align":"center","style":{"border":{"radius":"4px"}}} -->
<figure class="wp-block-image aligncenter size-large has-custom-border"><img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/images/laurel_left.png" alt="" style="border-radius:4px"/></figure>
<!-- /wp:image -->

<!-- wp:columns {"style":{"spacing":{"margin":{"top":"40px"},"blockGap":{"left":"40px"}}}} -->
<div class="wp-block-columns" style="margin-top:40px"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"48px","fontStyle":"normal","fontWeight":"700","lineHeight":"1"}}} -->
<h3 class="wp-block-heading" style="font-size:48px;font-style:normal;font-weight:700;line-height:1">80%</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"4px"}}}} -->
<p style="margin-top:4px"><?php esc_html_e( 'Faster deployments', 'inspiro' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"48px","fontStyle":"normal","fontWeight":"700","lineHeight":"1"}}} -->
<h3 class="wp-block-heading" style="font-size:48px;font-style:normal;font-weight:700;line-height:1">3x</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"4px"}}}} -->
<p style="margin-top:4px"><?php esc_html_e( 'Engineering velocity', 'inspiro' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"48px","fontStyle":"normal","fontWeight":"700","lineHeight":"1"}}} -->
<h3 class="wp-block-heading" style="font-size:48px;font-style:normal;font-weight:700;line-height:1">$2M</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"4px"}}}} -->
<p style="margin-top:4px"><?php esc_html_e( 'Annualised cost saved', 'inspiro' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"20px","fontStyle":"italic","lineHeight":"1.5"},"spacing":{"margin":{"top":"40px"}}}} -->
<p class="has-text-align-center" style="margin-top:40px;font-size:20px;font-style:italic;line-height:1.5">“<?php esc_html_e( 'They delivered a result we’d been chasing for two years. Worth every penny.', 'inspiro' ); ?>”</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"14px"}}} -->
<p class="has-text-align-center" style="font-size:14px"><strong><?php esc_html_e( 'Jane Cooper', 'inspiro' ); ?></strong> · <?php esc_html_e( 'VP Engineering, Acme Co.', 'inspiro' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"30px"}}}} -->
<div class="wp-block-buttons" style="margin-top:30px"><!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="#"><?php esc_html_e( 'Read the full case study', 'inspiro' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
