<?php
/**
 * Helper functions for misc features.
 *
 * Pre-Footer CTA, Topbar, Back-to-Top, Preloader.
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/* ---------------------------------------------------------------------------
 * Pattern cache invalidator
 *
 * WP_Theme caches the list of block patterns in /patterns/ as a site_transient
 * keyed on the theme version. New pattern files added between cache refreshes
 * stay invisible to the inserter until the cache expires (~24h) or the theme
 * version bumps. We bump invalidation off a fingerprint of pattern filenames
 * so newly-added patterns appear immediately in dev environments.
 * ------------------------------------------------------------------------- */

if ( ! function_exists( 'inspiro_maybe_flush_pattern_cache' ) ) {
	/**
	 * Compare a fingerprint of pattern filenames against the stored one and
	 * flush the WP_Theme pattern cache when they diverge.
	 */
	function inspiro_maybe_flush_pattern_cache() {
		if ( ! is_admin() && ! ( defined( 'REST_REQUEST' ) && REST_REQUEST ) ) {
			return;
		}
		$dir = INSPIRO_THEME_DIR . 'patterns';
		if ( ! is_dir( $dir ) ) {
			return;
		}
		$files = glob( $dir . '/*.php' );
		if ( ! is_array( $files ) ) {
			return;
		}
		$fingerprint = md5( implode( '|', array_map( 'basename', $files ) ) );
		$stored      = get_option( 'inspiro_patterns_fingerprint' );
		if ( $stored === $fingerprint ) {
			return;
		}
		$theme = wp_get_theme();
		if ( method_exists( $theme, 'delete_pattern_cache' ) ) {
			$theme->delete_pattern_cache();
		}
		update_option( 'inspiro_patterns_fingerprint', $fingerprint, false );
	}
}
add_action( 'init', 'inspiro_maybe_flush_pattern_cache', 1 );

/* ---------------------------------------------------------------------------
 * Pre-Footer CTA
 * ------------------------------------------------------------------------- */

if ( ! function_exists( 'inspiro_is_pre_footer_cta_enabled' ) ) {
	/**
	 * Whether the pre-footer CTA is enabled at all.
	 *
	 * @return bool
	 */
	function inspiro_is_pre_footer_cta_enabled() {
		return (bool) inspiro_get_theme_mod( 'pre_footer_cta_enable' );
	}
}

if ( ! function_exists( 'inspiro_is_pre_footer_cta_displayed' ) ) {
	/**
	 * Whether the pre-footer CTA should render on the current view.
	 *
	 * @return bool
	 */
	function inspiro_is_pre_footer_cta_displayed() {
		if ( ! inspiro_is_pre_footer_cta_enabled() ) {
			return false;
		}

		$visibility = inspiro_get_theme_mod( 'pre_footer_cta_visibility' );

		switch ( $visibility ) {
			case 'home':
				$display = is_front_page();
				break;
			case 'singular':
				$display = is_singular();
				break;
			case 'all':
			default:
				$display = true;
				break;
		}

		return (bool) apply_filters( 'inspiro_pre_footer_cta_displayed', $display );
	}
}

if ( ! function_exists( 'inspiro_render_pre_footer_cta_text' ) ) {
	/**
	 * Selective refresh callback for the CTA headline.
	 */
	function inspiro_render_pre_footer_cta_text() {
		echo wp_kses_post( wpautop( inspiro_get_theme_mod( 'pre_footer_cta_text' ) ) );
	}
}

if ( ! function_exists( 'inspiro_render_pre_footer_cta_button_text' ) ) {
	/**
	 * Selective refresh callback for the CTA button text.
	 */
	function inspiro_render_pre_footer_cta_button_text() {
		echo esc_html( inspiro_get_theme_mod( 'pre_footer_cta_btn_text' ) );
	}
}

if ( ! function_exists( 'inspiro_pre_footer_cta' ) ) {
	/**
	 * Action callback that renders the pre-footer CTA.
	 */
	function inspiro_pre_footer_cta() {
		get_template_part( 'template-parts/pre-footer/base' );
	}
}
add_action( 'inspiro_before_footer', 'inspiro_pre_footer_cta' );

/* ---------------------------------------------------------------------------
 * Topbar
 * ------------------------------------------------------------------------- */

if ( ! function_exists( 'inspiro_is_topbar_enabled' ) ) {
	/**
	 * Whether the topbar should render.
	 *
	 * @return bool
	 */
	function inspiro_is_topbar_enabled() {
		return (bool) inspiro_get_theme_mod( 'topbar_enable' );
	}
}

if ( ! function_exists( 'inspiro_render_topbar_left' ) ) {
	/**
	 * Selective refresh callback for the topbar left content.
	 */
	function inspiro_render_topbar_left() {
		echo wp_kses_post( inspiro_get_theme_mod( 'topbar_left_text' ) );
	}
}

if ( ! function_exists( 'inspiro_render_topbar_right' ) ) {
	/**
	 * Selective refresh callback for the topbar right content.
	 */
	function inspiro_render_topbar_right() {
		echo wp_kses_post( inspiro_get_theme_mod( 'topbar_right_text' ) );
	}
}

if ( ! function_exists( 'inspiro_topbar' ) ) {
	/**
	 * Action callback that renders the topbar.
	 *
	 * Rendered INSIDE <header id="masthead"> so it shares the navbar's
	 * positioning, transparency rules (on transparent-header templates), and
	 * sticky-header behavior. No separate position:sticky needed — when
	 * headroom.js pins the masthead, the topbar pins with it.
	 */
	function inspiro_topbar() {
		get_template_part( 'template-parts/topbar/topbar' );
	}
}
add_action( 'inspiro_masthead_start', 'inspiro_topbar' );

/* ---------------------------------------------------------------------------
 * Back-to-Top
 * ------------------------------------------------------------------------- */

if ( ! function_exists( 'inspiro_is_back_to_top_enabled' ) ) {
	/**
	 * Whether the back-to-top button should render.
	 *
	 * @return bool
	 */
	function inspiro_is_back_to_top_enabled() {
		return (bool) inspiro_get_theme_mod( 'back_to_top_enable' );
	}
}

if ( ! function_exists( 'inspiro_back_to_top' ) ) {
	/**
	 * Action callback that renders the back-to-top button.
	 */
	function inspiro_back_to_top() {
		get_template_part( 'template-parts/misc/back-to-top' );
	}
}
add_action( 'wp_footer', 'inspiro_back_to_top', 5 );

/* ---------------------------------------------------------------------------
 * Preloader
 * ------------------------------------------------------------------------- */

if ( ! function_exists( 'inspiro_is_preloader_enabled' ) ) {
	/**
	 * Whether the page preloader should render.
	 *
	 * @return bool
	 */
	function inspiro_is_preloader_enabled() {
		return (bool) inspiro_get_theme_mod( 'preloader_enable' );
	}
}

if ( ! function_exists( 'inspiro_preloader' ) ) {
	/**
	 * Action callback that renders the preloader.
	 */
	function inspiro_preloader() {
		get_template_part( 'template-parts/preloader/preloader' );
	}
}
add_action( 'inspiro_after_body_open', 'inspiro_preloader' );

/* ---------------------------------------------------------------------------
 * Enqueue the small companion script.
 * ------------------------------------------------------------------------- */

if ( ! function_exists( 'inspiro_misc_enqueue' ) ) {
	function inspiro_misc_enqueue() {
		if (
			inspiro_is_back_to_top_enabled()
			|| inspiro_is_preloader_enabled()
			|| is_customize_preview()
		) {
			wp_enqueue_script(
				'inspiro-misc',
				INSPIRO_THEME_URI . 'assets/js/inspiro-misc.js',
				array(),
				INSPIRO_THEME_VERSION,
				true
			);
		}
	}
}
add_action( 'wp_enqueue_scripts', 'inspiro_misc_enqueue' );

