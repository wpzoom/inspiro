/**
 * Inspiro Theme Deactivation Survey Modal
 *
 * @package Inspiro
 */

( function( $ ) {
	'use strict';

	$( document ).ready( function() {
		
		console.log( 'Inspiro deactivation script loaded' );
		
		if ( typeof inspiroThemeDeactivateData === 'undefined' ) {
			console.log( 'inspiroThemeDeactivateData not found' );
			return;
		}
		
		console.log( 'inspiroThemeDeactivateData:', inspiroThemeDeactivateData );
		
		// Add a test function to manually trigger modal
		window.testInspiroModal = function() {
			console.log( 'Testing Inspiro modal...' );
			showModal();
		};

		var modal = null;
		var formData = {
			choices: [],
			domain: inspiroThemeDeactivateData.domain,
			hostname: inspiroThemeDeactivateData.hostname,
			inspiro_theme_version: inspiroThemeDeactivateData.inspiroThemeVersion,
			wp_version: inspiroThemeDeactivateData.wpVersion,
			language: document.documentElement.getAttribute( 'lang' ) || 'en-US',
			php_version: inspiroThemeDeactivateData.phpVersion || 'Unknown',
			is_multisite: inspiroThemeDeactivateData.isMultisite || false,
			active_plugins_count: inspiroThemeDeactivateData.activePluginsCount || 0,
			admin_email: inspiroThemeDeactivateData.adminEmail || '',
			timezone_offset: new Date().getTimezoneOffset(),
			user_agent: navigator.userAgent,
			referrer: document.referrer || 'Direct',
			user_consent: true // Default to true (checkbox checked by default)
		};

		// Initialize text fields for choices that have them.
		inspiroThemeDeactivateData.choices.forEach( function( choice ) {
			if ( choice.text_field ) {
				formData[ choice.text_field ] = '';
			}
		});

		/**
		 * Create the modal HTML.
		 */
		function createModal() {
			var modalHtml = '<div class="inspiro-deactivation-modal-overlay">';
			modalHtml += '<div class="inspiro-deactivation-modal">';
			modalHtml += '<div class="inspiro-deactivation-modal-header">';
			modalHtml += '<h2>' + inspiroThemeDeactivateData.labels.title + '</h2>';
			modalHtml += '<button class="inspiro-deactivation-modal-close">&times;</button>';
			modalHtml += '</div>';
			modalHtml += '<div class="inspiro-deactivation-modal-body">';
			modalHtml += '<form id="inspiro-deactivation-form">';

			// Add choices.
			inspiroThemeDeactivateData.choices.forEach( function( choice ) {
				modalHtml += '<div class="inspiro-choice-wrapper">';
				modalHtml += '<label class="inspiro-choice-label">';
				modalHtml += '<input type="checkbox" name="deactivation_reason" value="' + choice.slug + '" /> ';
				modalHtml += choice.label;
				modalHtml += '</label>';
				
				if ( choice.text_field ) {
					modalHtml += '<textarea name="' + choice.text_field + '" class="inspiro-choice-text" placeholder="Please specify..." rows="2"></textarea>';
				}
				modalHtml += '</div>';
			});

			modalHtml += '</form>';
			modalHtml += '</div>';
			modalHtml += '<div class="inspiro-deactivation-modal-footer">';
			modalHtml += '<div class="inspiro-consent-section">';
			modalHtml += '<label class="inspiro-consent-label">';
			modalHtml += '<input type="checkbox" id="inspiro-consent-checkbox" checked /> ';
			modalHtml += inspiroThemeDeactivateData.labels.consent_checkbox;
			modalHtml += '</label>';
			modalHtml += '</div>';
			modalHtml += '<div class="inspiro-privacy-notice">';
			modalHtml += inspiroThemeDeactivateData.labels.privacy_disclaimer;
			modalHtml += '</div>';
			modalHtml += '<div class="inspiro-modal-buttons">';
			modalHtml += '<button class="inspiro-btn inspiro-btn-secondary" id="inspiro-skip-survey">'; 
			modalHtml += inspiroThemeDeactivateData.labels.skip_deactivate;
			modalHtml += '</button>';
			modalHtml += '<button class="inspiro-btn inspiro-btn-primary" id="inspiro-submit-survey">'; 
			modalHtml += inspiroThemeDeactivateData.labels.submit_deactivate;
			modalHtml += '</button>';
			modalHtml += '</div>';
			modalHtml += '</div>';
			modalHtml += '</div>';
			modalHtml += '</div>';

			return modalHtml;
		}

		/**
		 * Show the modal.
		 */
		function showModal() {
			if ( modal ) {
				modal.show();
				return;
			}

			var modalHtml = createModal();
			modal = $( modalHtml );
			$( 'body' ).append( modal );

			// Handle close button.
			modal.find( '.inspiro-deactivation-modal-close' ).on( 'click', function() {
				hideModal();
			});

			// Handle overlay click.
			modal.find( '.inspiro-deactivation-modal-overlay' ).on( 'click', function( e ) {
				if ( e.target === this ) {
					hideModal();
				}
			});

			// Handle checkbox changes.
			modal.find( 'input[type="checkbox"]' ).on( 'change', function() {
				var choice = $( this ).val();
				var isChecked = $( this ).is( ':checked' );
				var textField = $( this ).closest( '.inspiro-choice-wrapper' ).find( '.inspiro-choice-text' );

				if ( isChecked ) {
					if ( formData.choices.indexOf( choice ) === -1 ) {
						formData.choices.push( choice );
					}
					textField.show();
				} else {
					var index = formData.choices.indexOf( choice );
					if ( index !== -1 ) {
						formData.choices.splice( index, 1 );
					}
					textField.hide().val( '' );
				}
			});

			// Handle text field changes.
			modal.find( '.inspiro-choice-text' ).on( 'input', function() {
				var fieldName = $( this ).attr( 'name' );
				formData[ fieldName ] = $( this ).val();
			});

			// Handle consent checkbox changes.
			modal.find( '#inspiro-consent-checkbox' ).on( 'change', function() {
				formData.user_consent = $( this ).is( ':checked' );
			});

			// Handle skip button.
			modal.find( '#inspiro-skip-survey' ).on( 'click', function() {
				proceedWithDeactivation();
			});

			// Handle submit button.
			modal.find( '#inspiro-submit-survey' ).on( 'click', function() {
				submitSurvey();
			});

			// Hide text fields initially.
			modal.find( '.inspiro-choice-text' ).hide();
		}

		/**
		 * Hide the modal.
		 */
		function hideModal() {
			if ( modal ) {
				modal.remove();
				modal = null;
			}
		}

		/**
		 * Submit the survey data.
		 */
		function submitSurvey() {
			var submitButton = $( '#inspiro-submit-survey' );
			submitButton.prop( 'disabled', true ).text( 'Submitting...' );

			// Prepare survey data
			var surveyData = {
				choices: formData.choices.join( ',' ),
				choice_other_text: formData.choice_other_text || '',
				choice_not_enough_features_text: formData.choice_not_enough_features_text || '',
				domain: formData.domain,
				hostname: formData.hostname,
				inspiro_theme_version: formData.inspiro_theme_version,
				wp_version: formData.wp_version,
				language: formData.language,
				php_version: formData.php_version,
				is_multisite: formData.is_multisite,
				active_plugins_count: formData.active_plugins_count,
				timezone_offset: formData.timezone_offset,
				user_agent: formData.user_agent,
				referrer: formData.referrer,
				switching_to_theme: window.inspiroDestinationTheme || 'Unknown',
				user_consent: formData.user_consent
			};

			// Only include admin email if user consented
			if ( formData.user_consent ) {
				surveyData.admin_email = formData.admin_email;
			}

			// Submit to local WordPress (for backup)
			$.ajax({
				url: inspiroThemeDeactivateData.ajaxUrl,
				type: 'POST',
				data: {
					action: 'inspiro_theme_deactivation_survey',
					nonce: inspiroThemeDeactivateData.nonce,
					...surveyData
				}
			});

			// Submit to remote WPZOOM server (primary collection)
			// Use FormData to avoid CORS preflight completely
			var formDataToSend = new FormData();
			for ( var key in surveyData ) {
				if ( surveyData.hasOwnProperty( key ) ) {
					if ( Array.isArray( surveyData[key] ) ) {
						formDataToSend.append( key, JSON.stringify( surveyData[key] ) );
					} else {
						formDataToSend.append( key, surveyData[key] );
					}
				}
			}
			
			$.ajax({
				url: inspiroThemeDeactivateData.remoteApiUrl,
				type: 'POST',
				data: formDataToSend,
				processData: false,
				contentType: false, // This prevents jQuery from setting content-type
				timeout: 5000,
				success: function( response ) {
					console.log( 'Survey submitted successfully to WPZOOM' );
					console.log( 'Server response:', response );
					try {
						var responseData = typeof response === 'string' ? JSON.parse( response ) : response;
						console.log( 'Response data:', responseData );
					} catch ( e ) {
						console.log( 'Could not parse response:', e );
					}
					proceedWithDeactivation();
				},
				error: function( xhr, status, error ) {
					console.log( 'Failed to submit to remote server:', error );
					console.log( 'XHR status:', xhr.status );
					console.log( 'Response text:', xhr.responseText );
					// Even if remote submission fails, proceed with deactivation
					proceedWithDeactivation();
				}
			});
		}

		/**
		 * Proceed with theme deactivation.
		 */
		function proceedWithDeactivation() {
			hideModal();
			if ( window.inspiroDeactivationHref ) {
				window.location.href = window.inspiroDeactivationHref;
			}
		}

		/**
		 * Check if Inspiro is currently active theme.
		 */
		function isInspiroActive() {
			// Check for current theme indicators
			var currentTheme = $( '.current-theme .theme-name' ).text();
			var activeTheme = $( '.theme.active .theme-name' ).text();
			
			// Also check body class
			var bodyClass = $( 'body' ).attr( 'class' ) || '';
			
			return (
				( currentTheme && currentTheme.toLowerCase().indexOf( 'inspiro' ) !== -1 ) ||
				( activeTheme && activeTheme.toLowerCase().indexOf( 'inspiro' ) !== -1 ) ||
				bodyClass.indexOf( 'inspiro' ) !== -1
			);
		}

		/**
		 * Get the name of the theme being switched to
		 */
		function getDestinationTheme( element ) {
			// Try to find theme name from clicked element
			var themeName = $( element ).closest( '.theme' ).find( '.theme-name, .theme-title' ).text().trim();
			
			// If not found, try from URL parameters
			if ( !themeName ) {
				var href = $( element ).attr( 'href' );
				var urlParams = new URLSearchParams( href.split( '?' )[1] );
				var stylesheet = urlParams.get( 'stylesheet' ) || urlParams.get( 'template' );
				if ( stylesheet ) {
					themeName = stylesheet.replace( /-/g, ' ' ).replace( /\b\w/g, l => l.toUpperCase() );
				}
			}
			
			return themeName || 'Unknown Theme';
		}

		/**
		 * Intercept theme activation clicks (when switching away from Inspiro).
		 */
		$( document ).on( 'click', '.theme-actions .activate, .theme .theme-actions .button-primary, a[href*="action=activate"]', function( e ) {
			// Only show survey if Inspiro is currently active
			if ( isInspiroActive() ) {
				var href = $( this ).attr( 'href' );
				
				// Don't intercept if clicking on Inspiro itself
				var clickedTheme = $( this ).closest( '.theme' ).find( '.theme-name' ).text();
				if ( clickedTheme && clickedTheme.toLowerCase().indexOf( 'inspiro' ) !== -1 ) {
					return; // Don't show survey when reactivating Inspiro
				}
				
				// Store destination theme info
				window.inspiroDestinationTheme = getDestinationTheme( this );
				
				console.log( 'Inspiro deactivation intercepted:', href );
				console.log( 'Switching to theme:', window.inspiroDestinationTheme );
				e.preventDefault();
				window.inspiroDeactivationHref = href;
				showModal();
			}
		});

		// Also handle delete actions
		$( document ).on( 'click', 'a[href*="action=delete"]', function( e ) {
			var href = $( this ).attr( 'href' );
			
			// Check if this is for the Inspiro theme.
			if ( href.indexOf( 'stylesheet=inspiro' ) !== -1 || href.indexOf( 'template=inspiro' ) !== -1 ) {
				console.log( 'Inspiro deletion intercepted:', href );
				e.preventDefault();
				window.inspiroDeactivationHref = href;
				showModal();
			}
		});

	});

})( jQuery );