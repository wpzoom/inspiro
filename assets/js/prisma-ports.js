/**
 * Tiny script powering back-to-top + preloader.
 *
 * No dependencies. Loaded only when at least one feature is enabled.
 *
 * @package Inspiro
 * @since   2.2.0
 */
( function () {
	'use strict';

	function initBackToTop() {
		var btn = document.getElementById( 'inspiro-back-to-top' );
		if ( ! btn ) {
			return;
		}

		var threshold = 300;
		var ticking = false;

		function updateVisibility() {
			if ( window.scrollY > threshold ) {
				btn.classList.add( 'is-visible' );
			} else {
				btn.classList.remove( 'is-visible' );
			}
			ticking = false;
		}

		window.addEventListener( 'scroll', function () {
			if ( ! ticking ) {
				window.requestAnimationFrame( updateVisibility );
				ticking = true;
			}
		}, { passive: true } );

		btn.addEventListener( 'click', function ( e ) {
			e.preventDefault();
			var prefersReduced = window.matchMedia && window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches;
			window.scrollTo( {
				top: 0,
				behavior: prefersReduced ? 'auto' : 'smooth'
			} );
		} );

		updateVisibility();
	}

	function initPreloader() {
		var preloader = document.getElementById( 'inspiro-preloader' );
		if ( ! preloader ) {
			return;
		}

		function hide() {
			preloader.classList.add( 'is-hidden' );
			window.setTimeout( function () {
				if ( preloader.parentNode ) {
					preloader.parentNode.removeChild( preloader );
				}
			}, 500 );
		}

		// Fallback in case 'load' fired before script ran.
		if ( document.readyState === 'complete' ) {
			hide();
		} else {
			window.addEventListener( 'load', hide );
			// Safety net: never leave the preloader on top for more than 8s.
			window.setTimeout( hide, 8000 );
		}
	}

	if ( document.readyState === 'loading' ) {
		document.addEventListener( 'DOMContentLoaded', function () {
			initBackToTop();
			initPreloader();
		} );
	} else {
		initBackToTop();
		initPreloader();
	}
}() );
