<?php
/**
 * Pre-footer wrapper template.
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! inspiro_is_pre_footer_cta_displayed() ) {
	return;
}
?>

<div id="inspiro-pre-footer">
	<?php get_template_part( 'template-parts/pre-footer/call-to-action' ); ?>
</div>
