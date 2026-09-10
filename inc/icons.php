<?php
/**
 * Registers the theme's SVG icon collections with the WordPress Icons API.
 *
 * WordPress 7.1 added wp_register_icon_collection() / wp_register_icon(), which
 * feed the core Icon block (core/icon). Registering here means the demos no
 * longer need the third-party Icon Block plugin to supply their SVGs.
 *
 * Two collections are registered:
 *
 * - "inspiro", the general icon set, kept in sync with Inspiro Pro so patterns
 *   and demo content move between the two themes unchanged. The icons are
 *   Heroicons (solid, 24px) by Tailwind Labs, MIT licensed.
 * - "social", the social network icons from Simple Icons, CC0 licensed.
 *
 * Core sanitises registered SVGs with wp_kses() and strips `stroke`, so only
 * fill-based artwork survives intact.
 *
 * Everything is behind a function_exists() guard, so on WordPress < 7.1 this
 * file loads and does nothing.
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 2.2.4
 */

// Prevent direct access.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The general icon collection slug. Icons register as "inspiro/<slug>".
 */
if ( ! defined( 'INSPIRO_ICON_COLLECTION' ) ) {
	define( 'INSPIRO_ICON_COLLECTION', 'inspiro' );
}

/**
 * The social icon collection slug. Icons register as "social/<slug>".
 */
if ( ! defined( 'INSPIRO_SOCIAL_ICON_COLLECTION' ) ) {
	define( 'INSPIRO_SOCIAL_ICON_COLLECTION', 'social' );
}

if ( ! function_exists( 'inspiro_get_registered_icons' ) ) {
	/**
	 * Returns the registered icons as a map of slug => translated label.
	 *
	 * The array keys match the SVG file names in assets/icons/.
	 *
	 * @since Inspiro 2.2.4
	 *
	 * @return array<string, string> Icon slugs mapped to their labels.
	 */
	function inspiro_get_registered_icons() {
		$icons = array(
			// Navigation.
			'arrow-right'      => __( 'Arrow Right', 'inspiro' ),
			'arrow-left'       => __( 'Arrow Left', 'inspiro' ),
			'arrow-up-right'   => __( 'Arrow Up Right', 'inspiro' ),
			'arrow-down'       => __( 'Arrow Down', 'inspiro' ),
			'arrow-long-right' => __( 'Long Arrow Right', 'inspiro' ),
			'chevron-right'    => __( 'Chevron Right', 'inspiro' ),
			'chevron-down'     => __( 'Chevron Down', 'inspiro' ),
			'chevron-left'     => __( 'Chevron Left', 'inspiro' ),
			'close'            => __( 'Close', 'inspiro' ),
			'menu'             => __( 'Menu', 'inspiro' ),
			'search'           => __( 'Search', 'inspiro' ),
			'external-link'    => __( 'External Link', 'inspiro' ),
			// Feedback.
			'check'            => __( 'Check', 'inspiro' ),
			'check-circle'     => __( 'Check Circle', 'inspiro' ),
			'check-badge'      => __( 'Verified', 'inspiro' ),
			'minus'            => __( 'Minus', 'inspiro' ),
			'plus-circle'      => __( 'Plus Circle', 'inspiro' ),
			'star'             => __( 'Star', 'inspiro' ),
			'sparkles'         => __( 'Sparkles', 'inspiro' ),
			'smile'            => __( 'Smile', 'inspiro' ),
			// Contact.
			'email'            => __( 'Email', 'inspiro' ),
			'phone'            => __( 'Phone', 'inspiro' ),
			'map-pin'          => __( 'Map Pin', 'inspiro' ),
			'clock'            => __( 'Clock', 'inspiro' ),
			'calendar'         => __( 'Calendar', 'inspiro' ),
			'send'             => __( 'Send', 'inspiro' ),
			'chat'             => __( 'Chat', 'inspiro' ),
			'conversation'     => __( 'Conversation', 'inspiro' ),
			// People.
			'user'             => __( 'User', 'inspiro' ),
			'users'            => __( 'Users', 'inspiro' ),
			'user-group'       => __( 'User Group', 'inspiro' ),
			'user-circle'      => __( 'User Circle', 'inspiro' ),
			'hand-raised'      => __( 'Hand Raised', 'inspiro' ),
			// Trust.
			'shield-check'     => __( 'Shield Check', 'inspiro' ),
			'lock'             => __( 'Lock', 'inspiro' ),
			'info'             => __( 'Info', 'inspiro' ),
			'trophy'           => __( 'Trophy', 'inspiro' ),
			// Business.
			'briefcase'        => __( 'Briefcase', 'inspiro' ),
			'chart-bar'        => __( 'Bar Chart', 'inspiro' ),
			'chart-pie'        => __( 'Pie Chart', 'inspiro' ),
			'presentation'     => __( 'Presentation', 'inspiro' ),
			'trending-up'      => __( 'Trending Up', 'inspiro' ),
			'clipboard-list'   => __( 'Clipboard List', 'inspiro' ),
			'document'         => __( 'Document', 'inspiro' ),
			'document-check'   => __( 'Document Check', 'inspiro' ),
			'lightbulb'        => __( 'Lightbulb', 'inspiro' ),
			'bolt'             => __( 'Bolt', 'inspiro' ),
			// Commerce.
			'shopping-cart'    => __( 'Shopping Cart', 'inspiro' ),
			'shopping-bag'     => __( 'Shopping Bag', 'inspiro' ),
			'credit-card'      => __( 'Credit Card', 'inspiro' ),
			'banknotes'        => __( 'Banknotes', 'inspiro' ),
			'wallet'           => __( 'Wallet', 'inspiro' ),
			'currency-dollar'  => __( 'Currency Dollar', 'inspiro' ),
			'tag'              => __( 'Tag', 'inspiro' ),
			'truck'            => __( 'Truck', 'inspiro' ),
			'gift'             => __( 'Gift', 'inspiro' ),
			'receipt-percent'  => __( 'Receipt Percent', 'inspiro' ),
			// Media.
			'camera'           => __( 'Camera', 'inspiro' ),
			'photo'            => __( 'Photo', 'inspiro' ),
			'video-camera'     => __( 'Video Camera', 'inspiro' ),
			'music'            => __( 'Music', 'inspiro' ),
			'microphone'       => __( 'Microphone', 'inspiro' ),
			'paint-brush'      => __( 'Paint Brush', 'inspiro' ),
			'play'             => __( 'Play', 'inspiro' ),
			'megaphone'        => __( 'Megaphone', 'inspiro' ),
			// Places.
			'building'         => __( 'Building', 'inspiro' ),
			'storefront'       => __( 'Storefront', 'inspiro' ),
			'library'          => __( 'Library', 'inspiro' ),
			'home'             => __( 'Home', 'inspiro' ),
			'globe'            => __( 'Globe', 'inspiro' ),
			'academic-cap'     => __( 'Academic Cap', 'inspiro' ),
			'book-open'        => __( 'Open Book', 'inspiro' ),
			'cake'             => __( 'Cake', 'inspiro' ),
			'fire'             => __( 'Fire', 'inspiro' ),
			'sun'              => __( 'Sun', 'inspiro' ),
			'heart'            => __( 'Heart', 'inspiro' ),
			// Layout.
			'grid'             => __( 'Grid', 'inspiro' ),
			'rectangle-group'  => __( 'Rectangle Group', 'inspiro' ),
			'share'            => __( 'Share', 'inspiro' ),
			'rocket'           => __( 'Rocket', 'inspiro' ),
		);

		/**
		 * Filters the icons the theme registers with the WordPress Icons API.
		 *
		 * Removing an entry unregisters nothing that is already registered; filter
		 * early (before init) to take effect. Added entries need a matching SVG in
		 * the theme's assets/icons directory.
		 *
		 * @since Inspiro 2.2.4
		 *
		 * @param array<string, string> $icons Icon slugs mapped to their labels.
		 */
		return apply_filters( 'inspiro_registered_icons', $icons );
	}
}

if ( ! function_exists( 'inspiro_get_registered_social_icons' ) ) {
	/**
	 * Returns the registered social icons as a map of slug => translated label.
	 *
	 * The array keys match the SVG file names in assets/icons/social/.
	 *
	 * @since Inspiro 2.2.4
	 *
	 * @return array<string, string> Icon slugs mapped to their labels.
	 */
	function inspiro_get_registered_social_icons() {
		$icons = array(
			'dribbble'  => __( 'Dribbble', 'inspiro' ),
			'etsy'      => __( 'Etsy', 'inspiro' ),
			'facebook'  => __( 'Facebook', 'inspiro' ),
			'github'    => __( 'GitHub', 'inspiro' ),
			'google'    => __( 'Google', 'inspiro' ),
			'instagram' => __( 'Instagram', 'inspiro' ),
			'maildotru' => __( 'Mail.ru', 'inspiro' ),
			'medium'    => __( 'Medium', 'inspiro' ),
			'patreon'   => __( 'Patreon', 'inspiro' ),
			'pinterest' => __( 'Pinterest', 'inspiro' ),
			'reddit'    => __( 'Reddit', 'inspiro' ),
			'telegram'  => __( 'Telegram', 'inspiro' ),
			'tiktok'    => __( 'TikTok', 'inspiro' ),
			'twitch'    => __( 'Twitch', 'inspiro' ),
			'vimeo'     => __( 'Vimeo', 'inspiro' ),
			'whatsapp'  => __( 'WhatsApp', 'inspiro' ),
			'wordpress' => __( 'WordPress', 'inspiro' ),
			'x'         => __( 'X', 'inspiro' ),
			'youtube'   => __( 'YouTube', 'inspiro' ),
		);

		/**
		 * Filters the social icons the theme registers with the Icons API.
		 *
		 * Added entries need a matching SVG in the theme's assets/icons/social
		 * directory.
		 *
		 * @since Inspiro 2.2.4
		 *
		 * @param array<string, string> $icons Icon slugs mapped to their labels.
		 */
		return apply_filters( 'inspiro_registered_social_icons', $icons );
	}
}

if ( ! function_exists( 'inspiro_register_icon_collection' ) ) {
	/**
	 * Registers one icon collection and the icons belonging to it.
	 *
	 * @since Inspiro 2.2.4
	 *
	 * @param string                $collection Collection slug.
	 * @param array                 $args       Arguments passed to wp_register_icon_collection().
	 * @param string                $icons_dir  Absolute path to the directory holding the SVGs,
	 *                                          with a trailing slash.
	 * @param array<string, string> $icons      Icon slugs mapped to their labels.
	 * @return void
	 */
	function inspiro_register_icon_collection( $collection, $args, $icons_dir, $icons ) {
		// A child theme or plugin may have registered the collection already.
		$collection_exists = class_exists( 'WP_Icon_Collections_Registry' )
			&& WP_Icon_Collections_Registry::get_instance()->is_registered( $collection );

		if ( ! $collection_exists && ! wp_register_icon_collection( $collection, $args ) ) {
			return;
		}

		$registry = class_exists( 'WP_Icons_Registry' ) ? WP_Icons_Registry::get_instance() : null;

		foreach ( $icons as $slug => $label ) {
			$name = $collection . '/' . $slug;

			// Registering twice triggers a _doing_it_wrong() notice, so skip duplicates.
			if ( $registry && $registry->is_registered( $name ) ) {
				continue;
			}

			// The file is not read here; core reads it lazily on first render.
			wp_register_icon(
				$name,
				array(
					'label'     => $label,
					'file_path' => $icons_dir . $slug . '.svg',
				)
			);
		}
	}
}

if ( ! function_exists( 'inspiro_register_icons' ) ) {
	/**
	 * Registers the Inspiro and Social icon collections and their icons.
	 *
	 * Runs on init at the default priority, after core has registered its own
	 * collections on the same hook at priority 0.
	 *
	 * @since Inspiro 2.2.4
	 *
	 * @return void
	 */
	function inspiro_register_icons() {
		// WordPress < 7.1 has no Icons API; nothing to do.
		if ( ! function_exists( 'wp_register_icon' ) || ! function_exists( 'wp_register_icon_collection' ) ) {
			return;
		}

		inspiro_register_icon_collection(
			INSPIRO_ICON_COLLECTION,
			array(
				'label'       => __( 'Inspiro', 'inspiro' ),
				'description' => __( 'Icon set for Inspiro', 'inspiro' ),
			),
			INSPIRO_THEME_DIR . 'assets/icons/',
			inspiro_get_registered_icons()
		);

		inspiro_register_icon_collection(
			INSPIRO_SOCIAL_ICON_COLLECTION,
			array(
				'label'       => __( 'Social', 'inspiro' ),
				'description' => __( 'Social network icons for Inspiro', 'inspiro' ),
			),
			INSPIRO_THEME_DIR . 'assets/icons/social/',
			inspiro_get_registered_social_icons()
		);
	}
}
add_action( 'init', 'inspiro_register_icons' );
