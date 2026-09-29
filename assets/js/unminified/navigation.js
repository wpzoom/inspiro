/* global jQuery, UISearch */

/**
 * Theme functions file.
 *
 * Contains handlers for navigation and widget area.
 */

( function ( $ ) {
	'use strict';

	const $document = $( document );
	const $window = $( window );

	$.fn.TopMenuMargin = function () {
		$( window ).on( 'resize orientationchange', update );

		function update() {
			// eslint-disable-next-line no-unused-vars
			const windowWidth = $( window ).width();

			const $header = $( '.site-header' );
			const $mainContent = $( '#main' );

			$mainContent.css( 'paddingTop', $header.outerHeight() );

			// eslint-disable-next-line no-unused-vars
			const $adminbar = $( '#wpadminbar' );

			// eslint-disable-next-line no-unused-vars
			const isHidden = true;
			// eslint-disable-next-line no-unused-vars
			const size = [ $( window ).width(), $( window ).height() ];
		}

		update();
	};

	$.fn.sideNav = function () {
		let wasPlaying = false;

		function toggleNav() {
			$( document.body )
				.toggleClass( 'side-nav-open' )
				.addClass( 'side-nav-transitioning' );

			const flex = $( '#slider' ).data( 'flexslider' );
			if ( flex ) {
				if ( $( document.body ).hasClass( 'side-nav-open' ) ) {
					wasPlaying = flex.playing;
					if ( flex.playing ) {
						flex.pause();
					}
				} else if ( wasPlaying ) {
					flex.play();
				}
			}

			let called = false;
			$( '.side-nav__scrollable-container' ).one( 'transitionend', function () {
				$( document.body ).removeClass( 'side-nav-transitioning' );
				called = true;
			} );

			setTimeout( function () {
				if ( ! called ) {
					$( document.body ).removeClass( 'side-nav-transitioning' );
				}

				$window.trigger( 'resize' );
			}, 230 );
		}

		/* touchstart: do not allow scrolling main section then overlay is enabled (this is done via css) */
		$( '.navbar-toggle, .side-nav-overlay' ).on(
			'click touchend',
			function () {
				if ( $( document.body ).hasClass( 'side-nav-transitioning' ) ) {
					return;
				}

				toggleNav();

				$.fn.keepFocusInMobileSidebar();
			}
		);

		/* allow closing sidenav with escape key */
		$document.on( 'keyup', function ( event ) {
			if (
				event.keyCode === 27 &&
				$( document.body ).hasClass( 'side-nav-open' )
			) {
				toggleNav();
			}
		} );

		/**
		 * ScrollFix
		 *
		 * https://github.com/joelambert/ScrollFix
		 */
		$( '.side-nav__scrollable-container' ).on( 'touchstart', function () {
			const startTopScroll = this.scrollTop;

			if ( startTopScroll <= 0 ) {
				this.scrollTop = 1;
			}

			if ( startTopScroll + this.offsetHeight >= this.scrollHeight ) {
				this.scrollTop = this.scrollHeight - this.offsetHeight - 1;
			}
		} );
	};

	$.fn.sbSearch = function () {
		/* allow closing sidenav with escape key */
		$document.on( 'keyup', function ( event ) {
			if (
				event.keyCode === 27 &&
				$( '#sb-search' ).hasClass( 'sb-search-open' )
			) {
				$( '#sb-search' ).removeClass( 'sb-search-open' );
			}
		} );

		return this.each( function () {
			const el = this,
				buttons = el.querySelectorAll( '.sb-search-button-open, .sb-search-button-close' ),
				opener = el.querySelector( '.sb-search-button-open' );

			new UISearch( this );

			/* Keep aria-expanded in sync with the open state and hand focus back
			   to the opener when the overlay closes (Escape, close button, click outside). */
			if ( window.MutationObserver && buttons.length ) {
				new MutationObserver( function () {
					const isOpen = el.classList.contains( 'sb-search-open' );
					buttons.forEach( function ( button ) {
						button.setAttribute( 'aria-expanded', isOpen ? 'true' : 'false' );
					} );
					/* UISearch blurs the field before removing the class, so focus may already sit on <body>. */
					if ( ! isOpen && opener && ( document.activeElement === document.body || el.contains( document.activeElement ) ) ) {
						opener.focus( { preventScroll: true } );
					}
				} ).observe( el, { attributes: true, attributeFilter: [ 'class' ] } );
			}
		} );
	};

	$.fn.keepFocusInSearchModal = function () {
		$document.on( 'keydown', function ( event ) {
			let modal,
				selectors,
				elements,
				activeEl,
				lastEl,
				firstEl,
				tabKey,
				shiftKey;

			if ( $( '#sb-search' ).hasClass( 'sb-search-open' ) ) {
				selectors = 'input, a, button';
				modal = $document.find( '#sb-search' );

				elements = modal.find( selectors );
				elements = Array.prototype.slice.call( elements );

				lastEl = elements[ elements.length - 1 ];
				firstEl = elements[ 0 ];
				// eslint-disable-next-line @wordpress/no-global-active-element
				activeEl = document.activeElement;
				tabKey = event.keyCode === 9;
				shiftKey = event.shiftKey;

				if ( ! shiftKey && tabKey && lastEl === activeEl ) {
					event.preventDefault();
					firstEl.focus();
				}

				if ( shiftKey && tabKey && firstEl === activeEl ) {
					event.preventDefault();
					lastEl.focus();
				}
			}
		} );
	};

	$.fn.keepFocusInMobileSidebar = function () {
		$document.on( 'keydown', function ( event ) {
			let sidebar,
				selectors,
				elements,
				activeEl,
				lastEl,
				firstEl,
				tabKey,
				shiftKey;

			if ( $( document.body ).hasClass( 'side-nav-open' ) ) {
				selectors = 'input, a, button';
				sidebar = $document.find( 'aside#side-nav' );

				elements = sidebar.find( selectors );
				elements = Array.prototype.slice.call( elements );

				lastEl = elements[ elements.length - 1 ];
				firstEl = elements[ 0 ];
				// eslint-disable-next-line @wordpress/no-global-active-element
				activeEl = document.activeElement;
				tabKey = event.keyCode === 9;
				shiftKey = event.shiftKey;

				if ( ! shiftKey && tabKey && lastEl === activeEl ) {
					event.preventDefault();
					firstEl.focus();
				}

				if ( shiftKey && tabKey && firstEl === activeEl ) {
					event.preventDefault();
					lastEl.focus();
				}
			}
		} );
	};

	$( function () {
		$.fn.sideNav();

		/**
		 * Search form in header.
		 */
		$( '#sb-search' ).sbSearch();
		$.fn.keepFocusInSearchModal();

		/**
		 * Activate superfish menu.
		 */
		$( '.sf-menu' ).superfish( {
			speed: 'fast',
			animation: {
				height: 'show',
			},
			animationOut: {
				height: 'hide',
			},
		} );

		// TODO: check if option is enanled
		if ( true ) {
			// $.fn.TopMenuMargin();

			/**
			 * Activate Headroom.
			 */
			$( '.site-header' ).headroom( {
				tolerance: {
					up: 0,
					down: 0,
				},
				offset: 70,
			} );
		}

		$( '.side-nav .navbar-nav li.menu-item-has-children > a .svg-icon' ).on(
			'click',
			function ( e ) {
				e.preventDefault();

				const $li = $( this ).closest( 'li' ),
					$sub = $li.find( '> ul' );

				if ( $sub.is( ':visible' ) ) {
					$sub.slideUp();
					$li.removeClass( 'open' );
				} else {
					$sub.slideDown();
					$li.addClass( 'open' );
				}
			}
		);
	} );
} )( jQuery );
