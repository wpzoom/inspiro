/* global inspiroCustomizePreview, jQuery */

/**
 * File customize-preview.js.
 *
 * Instantly live-update customizer settings in the preview for improved user experience.
 */

/**
 * Build <style> tag.
 *
 * @since 1.3.0
 *
 * @param {wp.customize} control The WordPress Customize API control.
 * @param {string} value The control value.
 * @param {string} cssProperty The CSS property.
 */
function inspiroBuildStyleTag(control, value, cssProperty) {
	let style = '';
	let selector = '';
	let hasMediaQuery = false;

	let fakeControl = control.replace('-' + cssProperty, '');
	fakeControl = 'typo-' + fakeControl;

	const mediaQuery = control + '-media';
	if (mediaQuery in inspiroCustomizePreview.selectors) {
		hasMediaQuery = true;
	}

	if (fakeControl in inspiroCustomizePreview.selectors) {
		if (hasMediaQuery) {
			selector += inspiroCustomizePreview.selectors[mediaQuery] + '{';
		}
		selector += inspiroCustomizePreview.selectors[fakeControl];

		if (cssProperty === 'font-size') {
			value += 'px';
		}

		// Build <style>.
		style =
			'<style id="' +
			control +
			'-' +
			cssProperty +
			'">' +
			selector +
			' { ' +
			cssProperty +
			': ' +
			value +
			' }' +
			(hasMediaQuery ? ' }' : '') +
			'</style>';
	}

	return style;
}

(function ($) {
	// General section
	wp.customize('color_general_h_tags', function (value) {
		value.bind(function (to) {
			if (to !== '') {
				// Apply the selected color to heading tags
				$('h1, h2, h3, h4, h5, h6').css({
					color: to,
				});
			} else {
				// Clear the color to revert to the default
				$('h1, h2, h3, h4, h5, h6').css({
					color: '', // This resets the color to default
				});
			}
		});
	});
	// deactivated at the moment
	// wp.customize('color_general_page_title', function (value) {
	// 	value.bind(function (to) {
	// 		if (to !== '') {
	// 			// Apply the selected color to heading tags
	// 			$('.page-title').css({
	// 				color: to,
	// 			});
	// 		} else {
	// 			// Clear the color to revert to the default
	// 			$('.page-title').css({
	// 				color: to,
	// 			});
	// 		}
	// 	});
	// });

	wp.customize('color_general_entry_excerpt_text', function (value) {
		value.bind(function (to) {
			if (to !== '') {
				// Apply the selected color to heading tags
				$('.entry-summary > p').css({
					color: to,
				});
			} else {
				// Clear the color to revert to the default
				$('.entry-summary > p').css({
					color: to,
				});
			}
		});
	});
	wp.customize('color_general_entry_content_text', function (value) {
		value.bind(function (to) {
			if (to !== '') {
				// Apply the selected color to heading tags
				$('.entry-content > p').css({
					color: to,
				});
			} else {
				// Clear the color to revert to the default
				$('.entry-content > p').css({
					color: to,
				});
			}
		});
	});

	// Header section
	// sticky header background color
	wp.customize('color-menu-background-scroll', function (value) {
		value.bind(function (to) {
			if (to === 'blank') { // restore to default
				$('.headroom--not-top .navbar').css({
					background: 'rgba(0,0,0,.9)',
				});
			} else {
				$('.headroom--not-top .navbar').css({
					background: to,
				});
			}
		});
	});
	// custom logo text content
	wp.customize('custom_logo_text', function (value) {
		value.bind(function (to) {
			$('.site-header .custom-logo-text').text(to);
		});
	});
	// custom logo text color
	wp.customize('color_header_custom_logo_text', function (value) {
		value.bind(function (to) {
			$('a.custom-logo-text').css('color', to);
		});
	});
    // menu items
    wp.customize('color_header_menu_color', function (value) {
        value.bind(function (to) {
            $('.navbar a').css('color', to);
        });
    });
    wp.customize('color_header_menu_color_hover', function (value) {
        value.bind(function (to) {
            $('.navbar-nav > li > a:hover').css('color', to);
        });
    });
	// wp.customize('color_header_custom_logo_hover_text', function (value) {
	// 	value.bind(function (tocolor_header_custom_logo_hover_text {
	// 		$('a.custom-logo-text').css('color', to);
	// 	});
	// });
	// header background
	// wp.customize( 'color_menu_background', function ( value ) {
	// 	// value.bind(function (to) {
	// 	// 	$('.navbar').css('background-color', to);
	// 	// });
	//
	// 	// seems this option to change header text color was for another option
	// 	value.bind( function ( to ) {
	// 		if ( 'blank' === to ) {
	// 			$( '.navbar' ).css( {
	// 				color: '#101010',
	// 			} );
	// 		} else {
	// 			$( '.navbar' ).css( {
	// 				color: to,
	// 			} );
	// 		}
	// 	} );
	// } );
	wp.customize('header_search_show', function (value) {
		value.bind(function (to) {
			if (to === true) {
				$('.sb-search').css('display', 'block');
			} else if (to === false) {
				$('.sb-search').css('display', 'none');
			}
		});
	});
	wp.customize('color_menu_hamburger_btn', function (value) {
		value.bind(function (to) {
			$('.navbar-toggle .icon-bar').css('background', to);
		});
	});

	// Hero section - Site title and description
	wp.customize('hero_enable', function (value) {
		value.bind(function (to) {
			if (to === true) {
				$('.custom-header').css('display', 'block');
				$(document.body).addClass('has-header-image');
			} else if (to === false) {
				$('.custom-header').css('display', 'none');
				$(document.body).removeClass('has-header-image');
			}
		});
	});
	wp.customize('header_site_title', function (value) {
		value.bind(function (to) {
			$('.site-title a').text(to);
		});
	});
	wp.customize('header_site_description', function (value) {
		value.bind(function (to) {
			$('.site-description').text(to);
		});
	});
	wp.customize('header_button_title', function (value) {
		value.bind(function (to) {
			if (to === '') {
				$('.custom-header-button').css('display', 'none');
			} else {
				$('.custom-header-button')
					.css('display', 'inline-block')
					.text(to);
			}
		});
	});
	// work with overlay option
	wp.customize('overlay_show', function (value) {
		value.bind(function (to) {
			if (to === true) {
				$(
					'.has-header-image .custom-header-media, .has-header-video .custom-header-media'
				).removeClass('hide_overlay');
			} else if (to === false) {
				$(
					'.has-header-image .custom-header-media, .has-header-video .custom-header-media'
				).addClass('hide_overlay');
			}
		});
	});
	// hero text color.
	wp.customize('header_textcolor', function (value) {
		value.bind(function (to) {
			if (to === 'blank') {
				$('.site-title, .site-description').css({
					clip: 'rect(1px, 1px, 1px, 1px)',
					position: 'absolute',
				});
				// Add class for different logo styles if title and description are hidden.
				$('body').addClass('title-tagline-hidden');
			} else {
				// Check if the text color has been removed and use default colors in theme stylesheet.
				if (!to.length) {
					$('#inspiro-custom-header-styles').remove();
				}
				$('.site-title, .site-description').css({
					clip: 'auto',
					position: 'relative',
				});
				$(
					'.site-branding-text, .site-branding-text a, .site-description, .site-description a'
				).css({
					color: to,
				});
				// Add class for different logo styles if title and description are visible.
				$('body').removeClass('title-tagline-hidden');
			}
		});
	});
	// hero button text color
	wp.customize('header_button_textcolor', function (value) {
		value.bind(function (to) {
			if (to === 'blank') {
				$('.custom-header-button').css({
					color: '#ffffff',
				});
			} else {
				$('.custom-header-button').css({
					color: to,
					borderColor: to,
				} );
			}
		});
	});
	// hero arrow color
	// improve in future
	// wp.customize('color_scroll_to_content_arrow', function (value) {
	// 	value.bind(function (to) {
	// 		if (to === 'blank') {
	// 			$('#scroll-to-content:before').css({
	// 				borderColor: '#ffffff',
	// 			});
	// 		} else {
	// 			$('#scroll-to-content:before').css({
	// 				borderColor: to,
	// 			} );
	// 		}
	// 	});
	// });

	// Sidebar widgets section
	wp.customize('color_sidebar_widgets_background', function (value) {
		value.bind(function (to) {
			$('.side-nav__scrollable-container').css('background', to);
		});
	});
	wp.customize('color_sidebar_widgets_text', function (value) {
		value.bind(function (to) {
			$('.side-nav__scrollable-container').css('color', to);
		});
	});
	wp.customize('color_sidebar_widgets_title', function (value) {
		value.bind(function (to) {
			$('.side-nav h2.wp-block-heading, .side-nav .widget .title').css('color', to);
		});
	});
	wp.customize('color_sidebar_widgets_link', function (value) {
		value.bind(function (to) {
			$(':root :where(.side-nav__wrap a:where(:not(.wp-element-button)))').css('color', to);
		});
	});


	// Footer background
	wp.customize('color_footer_background', function (value) {
		value.bind(function (to) {
			if (to === 'blank') {
				$('.site-footer').css({
					background: '#101010',
				});
			} else {
				$('.site-footer').css({
					background: to,
				});
			}
		});
	});
	// footer text color
	wp.customize('color_footer_text', function (value) {
		value.bind(function (to) {
			if (to === 'blank') {
				$('.site-footer').css({
					color: '#78787f',
				});
			} else {
				$('.site-footer').css({
					color: to,
				});
			}
		});
	});
	// copyright text
	wp.customize('color_footer_copyright_text', function (value) {
		value.bind(function (to) {
			$('.site-footer .copyright span:first-child').css('color', to);
		});
	});

	// Color scheme
	wp.customize('colorscheme', function (value) {
		value.bind(function (to) {
			// Update color body class.
			$('body')
				.removeClass('colors-light colors-dark colors-custom')
				.addClass('colors-' + to);
		});
	});

	// Custom color hex.
	wp.customize('colorscheme_hex', function (value) {
		value.bind(function (to) {
			// Update custom color CSS.
			const style = $('#custom-theme-colors');
			const hex = style.data('hex');
			let css = style.html();

			css = css.replaceAll(hex, to);
			style.html(css).data('hex', to);
		});
	});

	// Whether a header image is available.
	function hasHeaderImage() {
		const image = wp.customize('header_image')();
		return '' !== image && 'remove-header' !== image;
	}

	// Whether a header video is available.
	function hasHeaderVideo() {
		const externalVideo = wp.customize('external_header_video')(),
			video = wp.customize('header_video')();

		return '' !== externalVideo || (0 !== video && '' !== video);
	}

	// Toggle a body class if a custom header exists.
	$.each(
		['external_header_video', 'header_image', 'header_video'],
		function (index, settingId) {
			wp.customize(settingId, function (setting) {
				setting.bind(function () {
					if (hasHeaderImage()) {
						$(document.body).addClass('has-header-image');
					} else {
						$(document.body).removeClass('has-header-image');
					}

					if (!hasHeaderVideo()) {
						$(document.body).removeClass('has-header-video');
					}
				});
			});
		}
	);

	$.each(
		[
			'body-font-family',
			'logo-font-family',
			'headings-font-family',
			'slider-title-font-family',
			'slider-text-font-family',
			'slider-button-font-family',
			'mainmenu-font-family',
			'mobilemenu-font-family',
		],
		function (__, control) {
			/**
			 * Generate Font Family CSS
			 *
			 * @since 1.3.0
			 * @see https://github.com/brainstormforce/astra/blob/663761d3419f25640af9b59e64384bd07f810bc4/assets/js/unminified/customizer-preview.js#L369
			 */
			wp.customize(control, function (value) {
				value.bind(function (newValue) {
					if (newValue in inspiroCustomizePreview.systemFonts) {
						newValue = inspiroCustomizePreview.systemFonts[newValue].stack;
					}
					const cssProperty = 'font-family';
					const style = inspiroBuildStyleTag(
						control,
						newValue,
						cssProperty
					);
					let link = '';

					let fontName = newValue.split(',')[0];
					// Replace ' character with space, necessary to separate out font prop value.
					fontName = fontName.replace(/'/g, '');

					// Remove <style> first!
					$('style#' + control + '-' + cssProperty).remove();

					if (fontName in inspiroCustomizePreview.googleFonts) {
						fontName = fontName.split(' ').join('+');

						// Remove old.
						$('link#' + control).remove();
						link =
							'<link id="' +
							control +
							'" href="https://fonts.googleapis.com/css?family=' +
							fontName +
							'" rel="stylesheet">';
					}

					// Concat and append new <style> and <link>.
					$('head').append(style + link);
				});
			});
		}
	);

	$.each(
		[
			'body-font-weight',
			'logo-font-weight',
			'headings-font-weight',
			'heading1-font-weight',
			'page-title-font-weight',
			'h1-content-font-weight',
			'heading2-font-weight',
			'heading3-font-weight',
			'heading4-font-weight',
			'heading5-font-weight',
			'heading6-font-weight',
			'slider-title-font-weight',
			'slider-text-font-weight',
			'slider-button-font-weight',
			'mainmenu-font-weight',
			'mobilemenu-font-weight',
		],
		function (__, control) {
			/**
			 * Generate Font Weight CSS
			 *
			 * @since 1.3.0
			 * @see https://github.com/brainstormforce/astra/blob/663761d3419f25640af9b59e64384bd07f810bc4/assets/js/unminified/customizer-preview.js#L409
			 */
			wp.customize(control, function (value) {
				value.bind(function (newValue) {
					const cssProperty = 'font-weight';
					const style = inspiroBuildStyleTag(
						control,
						newValue,
						cssProperty
					);
					const fontControl = control.replace(
						'font-weight',
						'font-family'
					);
					let link = '';

					if (newValue) {
						let fontName =
							wp.customize._value[fontControl]._value;
						fontName = fontName.split(',');
						fontName = fontName[0].replace(/'/g, '');

						// Remove old.
						$('style#' + control + '-' + cssProperty).remove();

						if (fontName in inspiroCustomizePreview.googleFonts) {
							// Remove old.
							$('#' + fontControl).remove();

							if (newValue === 'inherit') {
								link =
									'<link id="' +
									fontControl +
									'" href="https://fonts.googleapis.com/css?family=' +
									fontName +
									'"  rel="stylesheet">';
							} else {
								link =
									'<link id="' +
									fontControl +
									'" href="https://fonts.googleapis.com/css?family=' +
									fontName +
									'%3A' +
									newValue +
									'"  rel="stylesheet">';
							}
						}

						// Concat and append new <style> and <link>.
						$('head').append(style + link);
					} else {
						// Remove old.
						$('style#' + control).remove();
					}
				});
			});
		}
	);

	$.each(
		[
			'body-font-size',
			'logo-font-size',
			'headings-font-size',
			'heading2-font-size',
			'heading3-font-size',
			'heading4-font-size',
			'heading5-font-size',
			'heading6-font-size',
			'slider-title-font-size',
			'slider-text-font-size',
			'slider-button-font-size',
			'mainmenu-font-size',
			'mobilemenu-font-size',
		],
		function (__, control) {
			/**
			 * Generate Font Size CSS
			 *
			 * @since 1.3.0
			 */
			wp.customize(control, function (value) {
				value.bind(function (newValue) {
					const cssProperty = 'font-size';
					const style = inspiroBuildStyleTag(
						control,
						newValue,
						cssProperty
					);
					// Remove old.
					$('style#' + control + '-' + cssProperty).remove();

					$('head').append(style);
				});
			});
		}
	);

	/**
	 * Handle responsive font size changes for Page & Post Titles (H1)
	 * 
	 * @since 2.0.8
	 */
	function updateResponsiveHeading1FontSize() {
		const desktopSize = wp.customize('heading1-font-size')();
		const tabletSize = wp.customize('heading1-font-size-tablet')();
		const mobileSize = wp.customize('heading1-font-size-mobile')();
		const selector = '.home.blog .entry-title, .single .entry-title, .single .entry-cover-image .entry-header .entry-title';
		
		// Remove existing responsive styles
		$('style#heading1-responsive-font-size').remove();
		
		// Build responsive CSS
		let css = '';
		
		// Mobile base styles (mobile-first)
		if (mobileSize && mobileSize >= 24 && mobileSize <= 80) {
			css += selector + ' { font-size: ' + mobileSize + 'px; }\n';
		}
		
		// Tablet styles
		if (tabletSize && tabletSize >= 24 && tabletSize <= 80) {
			css += '@media screen and (min-width: 641px) and (max-width: 1024px) {\n';
			css += '  ' + selector + ' { font-size: ' + tabletSize + 'px; }\n';
			css += '}\n';
		}
		
		// Desktop styles
		if (desktopSize && desktopSize >= 24 && desktopSize <= 80) {
			css += '@media screen and (min-width: 1025px) {\n';
			css += '  ' + selector + ' { font-size: ' + desktopSize + 'px; }\n';
			css += '}\n';
		}
		
		// Add new styles
		if (css) {
			$('head').append('<style id="heading1-responsive-font-size">' + css + '</style>');
		}
	}

	function updateResponsivePageTitleFontSize() {
		const desktopSize = wp.customize('page-title-font-size')();
		const tabletSize = wp.customize('page-title-font-size-tablet')();
		const mobileSize = wp.customize('page-title-font-size-mobile')();
		const selector = '.page .entry-title, .page-title, .page .entry-cover-image .entry-header .entry-title';
		
		// Remove existing responsive styles
		$('style#page-title-responsive-font-size').remove();
		
		// Build responsive CSS
		let css = '';
		
		// Mobile base styles (mobile-first)
		if (mobileSize && mobileSize >= 24 && mobileSize <= 80) {
			css += selector + ' { font-size: ' + mobileSize + 'px; }\n';
		}
		
		// Tablet styles
		if (tabletSize && tabletSize >= 24 && tabletSize <= 80) {
			css += '@media screen and (min-width: 641px) and (max-width: 1024px) {\n';
			css += '  ' + selector + ' { font-size: ' + tabletSize + 'px; }\n';
			css += '}\n';
		}
		
		// Desktop styles
		if (desktopSize && desktopSize >= 24 && desktopSize <= 80) {
			css += '@media screen and (min-width: 1025px) {\n';
			css += '  ' + selector + ' { font-size: ' + desktopSize + 'px; }\n';
			css += '}\n';
		}
		
		// Add new styles
		if (css) {
			$('head').append('<style id="page-title-responsive-font-size">' + css + '</style>');
		}
	}

	function updateResponsiveH1ContentFontSize() {
		const desktopSize = wp.customize('h1-content-font-size')();
		const tabletSize = wp.customize('h1-content-font-size-tablet')();
		const mobileSize = wp.customize('h1-content-font-size-mobile')();
		const selector = '.entry-content h1, .widget-area h1, h1:not(.entry-title):not(.page-title):not(.site-title)';
		
		// Remove existing responsive styles
		$('style#h1-content-responsive-font-size').remove();
		
		// Build responsive CSS
		let css = '';
		
		// Mobile base styles (mobile-first)
		if (mobileSize && mobileSize >= 24 && mobileSize <= 80) {
			css += selector + ' { font-size: ' + mobileSize + 'px; }\n';
		}
		
		// Tablet styles
		if (tabletSize && tabletSize >= 24 && tabletSize <= 80) {
			css += '@media screen and (min-width: 641px) and (max-width: 1024px) {\n';
			css += '  ' + selector + ' { font-size: ' + tabletSize + 'px; }\n';
			css += '}\n';
		}
		
		// Desktop styles
		if (desktopSize && desktopSize >= 24 && desktopSize <= 80) {
			css += '@media screen and (min-width: 1025px) {\n';
			css += '  ' + selector + ' { font-size: ' + desktopSize + 'px; }\n';
			css += '}\n';
		}
		
		// Add new styles
		if (css) {
			$('head').append('<style id="h1-content-responsive-font-size">' + css + '</style>');
		}
	}

	// Bind responsive font size handlers
	wp.customize('heading1-font-size', function (value) {
		value.bind(updateResponsiveHeading1FontSize);
	});
	
	wp.customize('heading1-font-size-tablet', function (value) {
		value.bind(updateResponsiveHeading1FontSize);
	});
	
	wp.customize('heading1-font-size-mobile', function (value) {
		value.bind(updateResponsiveHeading1FontSize);
	});

	// Page Title responsive font size handlers
	wp.customize('page-title-font-size', function (value) {
		value.bind(updateResponsivePageTitleFontSize);
	});
	
	wp.customize('page-title-font-size-tablet', function (value) {
		value.bind(updateResponsivePageTitleFontSize);
	});
	
	wp.customize('page-title-font-size-mobile', function (value) {
		value.bind(updateResponsivePageTitleFontSize);
	});

	// H1 Content responsive font size handlers
	wp.customize('h1-content-font-size', function (value) {
		value.bind(updateResponsiveH1ContentFontSize);
	});
	
	wp.customize('h1-content-font-size-tablet', function (value) {
		value.bind(updateResponsiveH1ContentFontSize);
	});
	
	wp.customize('h1-content-font-size-mobile', function (value) {
		value.bind(updateResponsiveH1ContentFontSize);
	}	);



	/**
	 * Handle page title text alignment with custom preview handler
	 * 
	 * @since 2.0.8
	 */
	wp.customize('page-title-text-align', function (value) {
		value.bind(function (newValue) {
			const selector = '.page .entry-title, .page-title, .page .entry-cover-image .entry-header .entry-title';
			const cssProperty = 'text-align';
			const controlId = 'page-title-text-align';
			
			// Remove existing styles
			$('style#' + controlId + '-' + cssProperty).remove();
			
			// Add new styles
			const style = '<style id="' + controlId + '-' + cssProperty + '">' +
				selector + ' { ' + cssProperty + ': ' + newValue + '; }' +
				'</style>';
			
			$('head').append(style);
		});
	});

	$.each(
		[
			'body-text-transform',
			'logo-text-transform',
			'headings-text-transform',
			'heading1-text-transform',
			'page-title-text-transform',
			'h1-content-text-transform',
			'heading2-text-transform',
			'heading3-text-transform',
			'heading4-text-transform',
			'heading5-text-transform',
			'heading6-text-transform',
			'slider-title-text-transform',
			'slider-text-text-transform',
			'slider-button-text-transform',
			'mainmenu-text-transform',
			'mobilemenu-text-transform',
		],
		function (__, control) {
			/**
			 * Generate Text Transform CSS
			 *
			 * @since 1.3.0
			 */
			wp.customize(control, function (value) {
				value.bind(function (newValue) {
					const cssProperty = 'text-transform';
					const style = inspiroBuildStyleTag(
						control,
						newValue,
						cssProperty
					);
					// Remove old.
					$('style#' + control + '-' + cssProperty).remove();

					$('head').append(style);
				});
			});
		}
	);

	$.each(
		[
			'body-line-height',
			'logo-line-height',
			'headings-line-height',
			'heading1-line-height',
			'page-title-line-height',
			'h1-content-line-height',
			'heading2-line-height',
			'heading3-line-height',
			'heading4-line-height',
			'heading5-line-height',
			'heading6-line-height',
			'slider-title-line-height',
			'slider-text-line-height',
			'slider-button-line-height',
			'mainmenu-line-height',
			'mobilemenu-line-height',
		],
		function (__, control) {
			/**
			 * Generate Line Height CSS
			 *
			 * @since 1.3.0
			 */
			wp.customize(control, function (value) {
				value.bind(function (newValue) {
					const cssProperty = 'line-height';
					const style = inspiroBuildStyleTag(
						control,
						newValue,
						cssProperty
					);
					// Remove old.
					$('style#' + control + '-' + cssProperty).remove();
					$('head').append(style);
				});
			});
		}
	);

	// Container Width Settings - Live Preview
	function updateContainerWidthCSS() {
		const containerWidth = wp.customize('container_width')();
		const containerWidthNarrow = wp.customize('container_width_narrow')();
		const containerWidthElementor = wp.customize('container_width_elementor')();

		// Remove existing style tag and create new one
		$('#container-width-css').remove();
		
		// Check if front page is set to display latest posts
		const showOnFront = wp.customize('show_on_front') ? wp.customize('show_on_front')() : 'posts';
		const isFrontPage = $('body').hasClass('home');
		const isFrontPageWithPosts = isFrontPage && showOnFront === 'posts';
		
		// Determine if we're on a blog-related page (single post, blog, archive, etc.)
		// For front page, only apply narrow width if it's set to display latest posts
		const isBlogContext = $('body').hasClass('single') || isFrontPageWithPosts || 
							  $('body').hasClass('archive') || $('body').hasClass('category') || 
							  $('body').hasClass('tag') || $('body').hasClass('author') || 
							  $('body').hasClass('date') || $('body').hasClass('blog');
		
		// Choose the appropriate content size based on context
		const contentSize = isBlogContext ? containerWidthNarrow : containerWidth;
		const wideSize = contentSize + 250;
		
		// Calculate responsive padding breakpoints
		const containerPadding = 30; // 30px padding
		const containerWidthBreakpoint = containerWidth + 60; // container width + 60px buffer
		const containerWidthNarrowBreakpoint = containerWidthNarrow + 60; // narrow container width + 60px buffer
		
		let css = ':root {\n';
		css += '\t--container-width: ' + containerWidth + 'px;\n';
		css += '\t--container-width-narrow: ' + containerWidthNarrow + 'px;\n';
		css += '\t--container-padding: ' + containerPadding + 'px;\n';
		
		// Update WordPress block editor variables for live preview
		css += '\t--wp--style--global--content-size: ' + contentSize + 'px;\n';
		css += '\t--wp--style--global--wide-size: ' + wideSize + 'px;\n';
		css += '}\n';
		
		// Dynamic responsive padding media queries
		css += '@media (max-width: ' + containerWidthBreakpoint + 'px) {\n';
		css += '\t.wrap,\n';
		css += '\t.inner-wrap,\n';
		css += '\t.page .entry-content,\n';
		css += '\t.page:not(.inspiro-front-page) .entry-footer,\n';
		css += '\t.single .entry-wrapper,\n';
		css += '\t.single.has-sidebar.page-layout-sidebar-right .entry-header .inner-wrap,\n';
		css += '\t.wp-block-group > .wp-block-group__inner-container {\n';
		css += '\t\tpadding-left: ' + containerPadding + 'px;\n';
		css += '\t\tpadding-right: ' + containerPadding + 'px;\n';
		css += '\t}\n';
		css += '}\n';
		
		css += '@media (max-width: ' + containerWidthNarrowBreakpoint + 'px) {\n';
		css += '\t.single .entry-header .inner-wrap,\n';
		css += '\t.single .entry-content,\n';
		css += '\t.single .entry-footer,\n';
		css += '\t#comments {\n';
		css += '\t\tpadding-left: ' + containerPadding + 'px;\n';
		css += '\t\tpadding-right: ' + containerPadding + 'px;\n';
		css += '\t}\n';
		css += '}\n';

		// Update wide alignment blocks based on context
		css += '@media (min-width: 75em) {\n';
		css += '\t.wp-block-query.alignwide,\n';
		css += '\t.single .entry-content .alignwide {\n';
		css += '\t\tmax-width: calc(' + containerWidthNarrow + 'px + 250px);\n';
		css += '\t\twidth: calc(' + containerWidthNarrow + 'px + 250px);\n';
		css += '\t}\n';
		css += '\t.page .entry-content .alignwide {\n';
		css += '\t\tmax-width: calc(' + containerWidth + 'px + 250px);\n';
		css += '\t\twidth: calc(' + containerWidth + 'px + 250px);\n';
		css += '\t}\n';
		css += '}\n';

		// Add Elementor container width override if enabled
		if (containerWidthElementor) {
			css += '.elementor-container {\n';
			css += '\tmax-width: ' + containerWidth + 'px !important;\n';
			css += '}';
		}

		$('<style id="container-width-css">' + css + '</style>').appendTo('head');
	}

	wp.customize('container_width', function (value) {
		value.bind(function (to) {
			updateContainerWidthCSS();
		});
	});

	wp.customize('container_width_narrow', function (value) {
		value.bind(function (to) {
			updateContainerWidthCSS();
		});
	});

	wp.customize('container_width_elementor', function (value) {
		value.bind(function (to) {
			updateContainerWidthCSS();
		});
	});

	// Listen for front page display setting changes
	wp.customize('show_on_front', function (value) {
		value.bind(function (to) {
			updateContainerWidthCSS();
		});
	});

})(jQuery);
