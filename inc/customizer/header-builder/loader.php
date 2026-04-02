<?php
/**
 * Header Builder loader for Inspiro Lite.
 *
 * @package Inspiro
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once INSPIRO_THEME_DIR . 'inc/customizer/header-builder/class-inspiro-lite-header-builder.php';

add_action(
	'init',
	static function() {
		Inspiro_Lite_Header_Builder::get_instance();
	}
);
