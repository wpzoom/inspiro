<?php
/**
 * Inspiro Lite icon registration.
 *
 * Registers the "Inspiro" icon collection and its icons with the WordPress
 * Icons API introduced in WordPress 7.1, which makes them selectable in the
 * Icon block and available to templates through wp_get_icon().
 *
 * The SVG files live in assets/icons/ and are sanitized by core on
 * registration: only <svg>, <path> and <polygon> survive, and stroke
 * attributes are stripped, so the icons are filled paths without a hard-coded
 * fill in order to inherit the Icon block's color settings.
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 2.2.4
 */

if ( ! function_exists( 'inspiro_get_icons' ) ) {
	/**
	 * Returns the icons bundled with the theme.
	 *
	 * The array keys match the SVG file names in assets/icons/.
	 *
	 * @since Inspiro 2.2.4
	 *
	 * @return array Associative array of icon slug => human-readable label.
	 */
	function inspiro_get_icons() {
		return array(
			'bolt'         => __( 'Lightning Bolt', 'inspiro' ),
			'briefcase'    => __( 'Briefcase', 'inspiro' ),
			'chat'         => __( 'Chat', 'inspiro' ),
			'clock'        => __( 'Clock', 'inspiro' ),
			'code'         => __( 'Code', 'inspiro' ),
			'education'    => __( 'Education', 'inspiro' ),
			'film'         => __( 'Film', 'inspiro' ),
			'fire'         => __( 'Fire', 'inspiro' ),
			'gift'         => __( 'Gift', 'inspiro' ),
			'globe'        => __( 'Globe', 'inspiro' ),
			'heart'        => __( 'Heart', 'inspiro' ),
			'megaphone'    => __( 'Megaphone', 'inspiro' ),
			'music'        => __( 'Music', 'inspiro' ),
			'office'       => __( 'Office Building', 'inspiro' ),
			'paint-brush'  => __( 'Paint Brush', 'inspiro' ),
			'paper-plane'  => __( 'Paper Plane', 'inspiro' ),
			'phone'        => __( 'Phone', 'inspiro' ),
			'play'         => __( 'Play', 'inspiro' ),
			'presentation' => __( 'Presentation', 'inspiro' ),
			'puzzle-piece' => __( 'Puzzle Piece', 'inspiro' ),
			'rocket'       => __( 'Rocket', 'inspiro' ),
			'shopping-bag' => __( 'Shopping Bag', 'inspiro' ),
			'sparkles'     => __( 'Sparkles', 'inspiro' ),
			'support'      => __( 'Support', 'inspiro' ),
			'ticket'       => __( 'Ticket', 'inspiro' ),
			'tools'        => __( 'Tools', 'inspiro' ),
			'trending-up'  => __( 'Trending Up', 'inspiro' ),
			'trophy'       => __( 'Trophy', 'inspiro' ),
			'truck'        => __( 'Truck', 'inspiro' ),
			'verified'     => __( 'Verified Badge', 'inspiro' ),
		);
	}
}

if ( ! function_exists( 'inspiro_register_icons' ) ) {
	/**
	 * Registers the Inspiro icon collection and its icons.
	 *
	 * Does nothing on WordPress versions older than 7.1, where the Icons API
	 * is not available.
	 *
	 * @since Inspiro 2.2.4
	 *
	 * @return void
	 */
	function inspiro_register_icons() {
		if ( ! function_exists( 'wp_register_icon_collection' ) || ! function_exists( 'wp_register_icon' ) ) {
			return;
		}

		$is_registered = wp_register_icon_collection(
			'inspiro',
			array(
				'label'       => __( 'Inspiro', 'inspiro' ),
				'description' => __( 'Icons bundled with the Inspiro theme.', 'inspiro' ),
			)
		);

		if ( ! $is_registered ) {
			return;
		}

		$icons_dir = INSPIRO_THEME_DIR . 'assets/icons/';

		foreach ( inspiro_get_icons() as $slug => $label ) {
			wp_register_icon(
				'inspiro/' . $slug,
				array(
					'label'     => $label,
					'file_path' => $icons_dir . $slug . '.svg',
				)
			);
		}
	}
}
add_action( 'init', 'inspiro_register_icons' );
