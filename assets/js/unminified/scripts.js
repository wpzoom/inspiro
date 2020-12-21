/*! WPZOOM
 * inspiro-lite - v1.0.0
 * Author website: https://wpzoom.com/
 * Updated: 2020-12-21
 * This file is automatically created! Do not edit this file directly! */
(function( $ ) {

    // Variables and DOM Caching.
    var $body = $('body'),
        $customHeader = $body.find('.custom-header'),
        $branding = $customHeader.find('.site-branding'),
        $navigation = $body.find('#site-navigation'),
        $menuScrollDown = $body.find('#scroll-to-content'),
        $siteContent = $body.find('#content'),
        $sidebar = $body.find('#secondary'),
        $entryContent = $body.find('.entry-content'),
        $formatQuote = $body.find('.format-quote blockquote'),
        hasCustomHeaderMedia = $body.hasClass('has-header-image') || $body.hasClass('has-header-video'),
        isFrontPage = $body.hasClass( 'inspiro-front-page' ) || $body.hasClass( 'home blog' ),
        menuTop = 0,
        resizeTimer,
        navigationHeight,
        navigationOuterHeight;

    // Set properties of navigation.
    function setNavProps() {
        navigationHeight = $navigation.height();
        navigationOuterHeight = $navigation.outerHeight();

        // If Admin bar is present on page, update navigationOuterHeight value.
        if ( $( '#wpadminbar' ).length ) {
            navigationOuterHeight += $( '#wpadminbar' ).outerHeight();
        }
    }

    // Set margins of custom header.
    function adjustHeaderSpacing() {
        if ( $(window).outerWidth() >= 768 ) {
            if ( ! hasCustomHeaderMedia ) {
                $customHeader.css('padding-top', navigationOuterHeight);
                $siteContent.css('padding-top', navigationOuterHeight);
            }
        } else {
            $customHeader.css('padding-top', '0');
            $siteContent.css('padding-top', '2.5em');
        }
    }

    // Add 'below-entry-meta' class to elements.
    function belowEntryMetaClass( param ) {
        var sidebarPos, sidebarPosBottom;

        if ( ! $sidebar.length ) {
            return;
        }

        if ( ! $body.hasClass( 'has-sidebar' ) || (
            $body.hasClass( 'search' ) ||
            $body.hasClass( 'single-attachment' ) ||
            $body.hasClass( 'error404' ) ||
            $body.hasClass( 'inspiro-front-page' )
        ) ) {
            return;
        }

        sidebarPos       = $sidebar.offset();
        sidebarPosBottom = sidebarPos.top + ( $sidebar.height() + 28 );

        $entryContent.find( param ).each( function() {
            var $element = $( this ),
                elementPos = $element.offset(),
                elementPosTop = elementPos.top;

            // Add 'below-entry-meta' to elements below the entry meta.
            if ( elementPosTop > sidebarPosBottom ) {
                $element.addClass( 'below-entry-meta' );
            } else {
                $element.removeClass( 'below-entry-meta' );
            }
        });
    }

    /**
     * Test if an iOS device.
    */
    function checkiOS() {
        return /iPad|iPhone|iPod/.test(navigator.userAgent) && ! window.MSStream;
    }

    /*
     * Test if background-attachment: fixed is supported.
     * @link http://stackoverflow.com/questions/14115080/detect-support-for-background-attachment-fixed
     */
    function supportsFixedBackground() {
        var el = document.createElement('div'),
            isSupported;

        try {
            if ( ! ( 'backgroundAttachment' in el.style ) || checkiOS() ) {
                return false;
            }
            el.style.backgroundAttachment = 'fixed';
            isSupported = ( 'fixed' === el.style.backgroundAttachment );
            return isSupported;
        }
        catch (e) {
            return false;
        }
    }

    // Fire on document ready.
    $( document ).ready( function() {

        // If navigation menu is present on page, setNavProps.
        if ( $navigation.length ) {
            setNavProps();
        }

        // If 'Scroll Down' arrow in present on page, calculate scroll offset and bind an event handler to the click event.
        if ( $menuScrollDown.length ) {

            if ( $( 'body' ).hasClass( 'admin-bar' ) ) {
                menuTop -= 32;
            }
            if ( $navigation.length ) {
                menuTop -= 24; // top & bottom padding space when headroom is pinned
            } else {
                navigationHeight = 0;
            }

            $menuScrollDown.on('click', function(e) {
                e.preventDefault();
                $( window ).scrollTo( '#content', {
                    duration: 600,
                    offset: { top: menuTop - navigationHeight }
                });
            });
        }

        adjustHeaderSpacing();
        belowEntryMetaClass( 'blockquote.alignleft, blockquote.alignright' );

        if ( true === supportsFixedBackground() ) {
            document.documentElement.className += ' background-fixed';
        }
    });

    // If navigation menu is present on page, adjust it on screen resize.
    if ( $navigation.length ) {
        // We want to make sure the navigation is where it should be on resize.
        $( window ).on( 'resize', function() {
            setNavProps();
            adjustHeaderSpacing();
        });
    }

    $( window ).on( 'resize', function() {
        clearTimeout( resizeTimer );
        resizeTimer = setTimeout( function() {
            belowEntryMetaClass( 'blockquote.alignleft, blockquote.alignright' );
        }, 300 );
    });

    $(window).on('load', function() {
        $body.addClass('inspiro-page-loaded');
    });

    // Add header video class after the video is loaded.
    $( document ).on( 'wp-custom-header-video-loaded', function() {
        $body.addClass( 'has-header-video' );
    });

})( jQuery );

/* global UISearch */
/**
 * Theme functions file.
 *
 * Contains handlers for navigation and widget area.
 */

(function( $ ) {
	'use strict';

	var $document = $(document);
	var $window = $(window);

	$.fn.TopMenuMargin = function() {
		$(window).on('resize orientationchange', update);

		function update() {

			var windowWidth = $(window).width();

			var $header = $('.site-header');
			var $main_content = $('#main');

			$main_content.css('paddingTop', $header.outerHeight());

			var $adminbar = $('#wpadminbar');

			var isHidden = true;
			var size = [$(window).width(), $(window).height()];

		}

		update();
	};

	$.fn.sideNav = function() {
	    var wasPlaying = false;

	    function toggleNav() {
	        $(document.body).toggleClass('side-nav-open').addClass('side-nav-transitioning');

	        var flex = $('#slider').data('flexslider');
	        if (flex) {
				if ($(document.body).hasClass('side-nav-open')) {
	                wasPlaying = flex.playing;
	                if (flex.playing)  {
	                    flex.pause();
	                }
	            } else {
	                if (wasPlaying) {
	                    flex.play();
	                }
	            }
	        }

	        var called = false;
	        $('.site').one('transitionend', function () {
	            $(document.body).removeClass('side-nav-transitioning');
	            called = true;
	        });

	        setTimeout(function() {
	            if (!called) {
	                $(document.body).removeClass('side-nav-transitioning');
	            }

	            $window.trigger('resize');
	        }, 230);
	    }

	    /* touchstart: do not allow scrolling main section then overlay is enabled (this is done via css) */
	    $('.navbar-toggle, .side-nav-overlay').on('click touchend', function (event) {
			if ($(document.body).hasClass('side-nav-transitioning')) {
	            return;
	        }

	        toggleNav();
	    });

	    /* allow closing sidenav with escape key */
		$document.on('keyup', function(event) {
			if (event.keyCode === 27 && $(document.body).hasClass('side-nav-open')) {
	            toggleNav();
	        }
	    });

	    /**
	     * ScrollFix
	     *
	     * https://github.com/joelambert/ScrollFix
	     */
	    $('.side-nav__scrollable-container').on('touchstart', function (event) {
	        var startTopScroll = this.scrollTop;

	        if (startTopScroll <= 0) {
	            this.scrollTop = 1;
	        }

	        if (startTopScroll + this.offsetHeight >= this.scrollHeight) {
	            this.scrollTop = this.scrollHeight - this.offsetHeight - 1;
	        }
	    });
	};

	$.fn.sbSearch = function() {
		/* allow closing sidenav with escape key */
		$document.on('keyup', function(event) {
		    if (event.keyCode === 27 && $('#sb-search').hasClass('sb-search-open')) {
				$("#sb-search").removeClass("sb-search-open");
		    }
		});

	   	return this.each(function() {
			new UISearch( this );
	   	});
	};

	$(function() {
		$.fn.sideNav();

		/**
		 * Search form in header.
		 */
		$("#sb-search").sbSearch();

		/**
		 * FitVids - Responsive Videos in posts
		 */
		$(".wpzlb-layout, .builder-wrap, .entry-content, .video_cover, .featured_page_content").fitVids();

		/**
		 * Activate superfish menu.
		 */
		$('.sf-menu').superfish({
			'speed': 'fast',
			'animation': {
				'height': 'show'
			},
			'animationOut': {
				'height': 'hide'
			}
		});

		// TODO: check if option is enanled
		if (true) {
			// $.fn.TopMenuMargin();

			/**
			 * Activate Headroom.
			 */
			$('.site-header').headroom({
				tolerance: {
					up: 0,
					down: 0
				},
				offset: 70
			});
		}

		$('.side-nav .navbar-nav li.menu-item-has-children > a .svg-icon')
			.on( 'click', function(e) {
				e.preventDefault();

				var $li = $(this).closest('li'),
					$sub = $li.find('> ul');

				if ($sub.is(':visible')) {
					$sub.slideUp();
					$li.removeClass('open');
				} else {
					$sub.slideDown();
					$li.addClass('open');
				}
			});
	});
})( jQuery );

/**
 * Plugin Name: Custom Header Handler for Vimeo
 * Description: Adds support for Vimeo to the video headers feature introduced in WordPress 4.7.
 * Version: 1.0.0
 * Author: Brady Vercher
 * Author URI: https://www.cedaro.com/
 * License: GPL-2.0+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

(function( window ) {

    window.wp = window.wp || false;

    if ( ! window.wp ) {
        return;
    }

    if ( ! window.wp.customHeader ) {
        return;
    }

    var VimeoHandler = window.wp.customHeader.BaseVideoHandler.extend({
        test: function( settings ) {
            return 'video/x-vimeo' === settings.mimeType;
        },

        ready: function() {
            var handler = this;

            if ( 'Vimeo' in window ) {
                handler.loadVideo();
            } else {
                var tag = document.createElement( 'script' );
                tag.src = 'https://player.vimeo.com/api/player.js';
                tag.onload = function () { handler.loadVideo(); };
                document.getElementsByTagName( 'head' )[0].appendChild( tag );
            }
        },

        loadVideo: function() {
            var player,
                handler = this;

            // Track the paused state since the getPaused() method is asynchronous.
            this._paused = true;

            this.player = player = new Vimeo.Player( this.container, {
                autopause: false,
                autoplay: true,
                // Background isn't currently supported in Vimeo's player library:
                // https://github.com/vimeo/player.js/issues/39
                background: true,
                byline: false,
                height: this.settings.height,
                loop: true,
                portrait: false,
                title: false,
                url: this.settings.videoUrl,
                width: this.settings.width,
                id: this.settings.id
            });

            player.on( 'play', function() {
                handler._paused = false;
                handler.trigger( 'play' );
            });

            player.on( 'pause', function() {
                handler._paused = true;
                handler.trigger( 'pause' );
            });

            player.ready().then(function() {
                var poster = handler.container.getElementsByTagName( 'img' )[0];

                if ( poster.src === handler.settings.posterUrl ) {
                    // Remove poster
                    handler.container.removeChild( poster );
                }

                handler.showControls();

                // Autoplay doesn't trigger a play event, so check the video
                // state when ready is triggered.
                player.getPaused().then(function( paused ) {
                    handler._paused = paused;

                    if ( ! paused ) {
                        handler.trigger( 'play' );
                    }
                });
            });

            player.setVolume( 0 );
        },

        isPaused: function() {
            return this._paused;
        },

        pause: function() {
            this.player.pause();
        },

        play: function() {
            this.player.play();
        },
    });

    var VimeoLegacyHandler = window.wp.customHeader.BaseVideoHandler.extend({
        origin: 'https://player.vimeo.com',

        test: function( settings ) {
            return 'video/x-vimeo' === settings.mimeType;
        },

        ready: function() {
            var handler = this,
                videoId = this.settings.videoUrl.split( '/' ).pop(),
                iframe = document.createElement( 'iframe' );

            this._paused = true;
            handler.setVideo( iframe );

            iframe.id = 'wp-custom-header-video';
            iframe.src = 'https://player.vimeo.com/video/' + videoId + '?api=1&autopause=0&autoplay=0&background=1&badge=0&byline=0&loop=1&player_id=' + iframe.id + '&portrait=0&title=0';
            this.iframe = iframe;

            window.addEventListener( 'message', function( e ) {
                var data;

                if ( handler.origin !== e.origin ) {
                    return;
                }

                try {
                    data = JSON.parse( e.data );
                } catch ( ex ) {
                    return;
                }

                if ( 'wp-custom-header-video' !== data.player_id ) {
                    return;
                }

                if ( 'ready' === data.event ) {
                    handler.postMessage( 'addEventListener', 'pause' );
                    handler.postMessage( 'addEventListener', 'play' );
                    handler.postMessage( 'setVolume', 0 );
                    handler.play();
                    handler.showControls();
                } else if ( 'pause' === data.event ) {
                    handler._paused = true;
                    handler.trigger( data.event );
                } else if ( 'play' === data.event ) {
                    handler._paused = false;
                    handler.trigger( data.event );
                }
            });
        },

        isPaused: function() {
            return this._paused;
        },

        pause: function() {
            this.postMessage( 'pause' );
        },

        play: function() {
            this.postMessage( 'play' );
        },

        postMessage: function( method, params ) {
            var data = JSON.stringify({
                method: method,
                value: params
            });

            this.iframe.contentWindow.postMessage( data, this.origin );
        }
    });

    window.wp.customHeader.handlers.vimeo = new VimeoHandler();

})( window );