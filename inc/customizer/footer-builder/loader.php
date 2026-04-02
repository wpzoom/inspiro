<?php
/**
 * Footer Builder loader for Inspiro Lite.
 *
 * @package Inspiro
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once INSPIRO_THEME_DIR . 'inc/customizer/footer-builder/class-inspiro-lite-footer-builder.php';

add_action(
	'init',
	static function() {
		Inspiro_Lite_Footer_Builder::get_instance();
	}
);
