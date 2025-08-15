/**
 * Inspiro Theme Deactivation Survey Modal
 *
 * @package Inspiro
 */

( function( $ ) {
	'use strict';

	$( document ).ready( function() {
		
		if ( typeof inspiroThemeDeactivateData === 'undefined' ) {
			return;
		}

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
			user_consent: true, // Default to true (checkbox checked by default)
			usage_duration_seconds: inspiroThemeDeactivateData.usageData ? inspiroThemeDeactivateData.usageData.usage_seconds : 0,
			usage_duration_days: inspiroThemeDeactivateData.usageData ? inspiroThemeDeactivateData.usageData.usage_days : 0,
			usage_duration_formatted: inspiroThemeDeactivateData.usageData ? inspiroThemeDeactivateData.usageData.formatted : 'Unknown',
			theme_activated_at: inspiroThemeDeactivateData.usageData ? inspiroThemeDeactivateData.usageData.activated_at : null,
			nps_score: null // NPS score from 0-10
		};

		// Initialize text fields for choices that have them.
		inspiroThemeDeactivateData.choices.forEach( function( choice ) {
			if ( choice.text_field ) {
				formData[ choice.text_field ] = '';
			}
			if ( choice.features_options ) {
				formData.choice_missing_features = '';
				formData.choice_missing_features_other_text = '';
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
			modalHtml += '<p class="inspiro-deactivation-intro">Please tell us why you\'re switching themes. Your feedback will help us make Inspiro Lite better for everyone!</p>';
			modalHtml += '<form id="inspiro-deactivation-form">';

			// Add choices.
			inspiroThemeDeactivateData.choices.forEach( function( choice ) {
				modalHtml += '<div class="inspiro-choice-wrapper">';
				modalHtml += '<label class="inspiro-choice-label">';
				modalHtml += '<input type="checkbox" name="deactivation_reason" value="' + choice.slug + '" /> ';
				modalHtml += choice.label;
				modalHtml += '</label>';
				
				// Handle features options (multi-select)
				if ( choice.features_options ) {
					modalHtml += '<div class="inspiro-features-options" style="margin-top: 12px; padding-left: 25px;">';
					modalHtml += '<div style="margin-bottom: 8px; font-size: 13px; color: #111;">Which features? (Select all that apply)</div>';
					
					for ( var featureKey in choice.features_options ) {
						modalHtml += '<label class="inspiro-feature-label" style="display: block; margin-bottom: 6px; font-size: 13px;">';
						modalHtml += '<input type="checkbox" name="missing_features" value="' + featureKey + '" style="margin-right: 8px;" /> ';
						modalHtml += choice.features_options[featureKey];
						modalHtml += '</label>';
						
						// Add text field for "Other" option
						if ( featureKey === 'other-feature' ) {
							modalHtml += '<textarea name="choice_missing_features_other_text" class="inspiro-feature-other-text" placeholder="Please specify..." rows="2" style="width: 100%; margin-top: 6px; margin-left: 20px; display: none;"></textarea>';
						}
					}
					modalHtml += '</div>';
				}
				// Handle regular text field
				else if ( choice.text_field ) {
					modalHtml += '<textarea name="' + choice.text_field + '" class="inspiro-choice-text" placeholder="Please specify..." rows="2"></textarea>';
				}
				modalHtml += '</div>';
			});

			// Add NPS Section
			modalHtml += '<div class="inspiro-nps-section">';
			modalHtml += '<h3 style="margin: 20px 0 10px 0; font-size: 16px; color: #333;">One more quick question:</h3>';
			modalHtml += '<p style="margin-bottom: 15px; color: #555;">How likely are you to recommend Inspiro to a friend or colleague?</p>';
			modalHtml += '<div class="inspiro-nps-scale" style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 10px;">';
			modalHtml += '<span style="flex: 0 0 auto; font-size: 12px; color: #666; margin-right: 15px;">Not at all likely</span>';
			modalHtml += '<div class="inspiro-nps-buttons" style="display: flex; gap: 8px;">';
			for (var i = 0; i <= 5; i++) {
				modalHtml += '<button type="button" class="inspiro-nps-btn" data-score="' + i + '" style="';
				modalHtml += 'width: 40px; height: 40px; border: 1px solid #ddd; background: #fff; ';
				modalHtml += 'border-radius: 6px; font-size: 16px; font-weight: 600; cursor: pointer; transition: all 0.2s;';
				modalHtml += '">' + i + '</button>';
			}
			modalHtml += '</div>';
			modalHtml += '<span style="flex: 0 0 auto; font-size: 12px; color: #666; margin-left: 15px;">Extremely likely</span>';
			modalHtml += '</div>';
			modalHtml += '<div class="inspiro-nps-labels" style="display: flex; justify-content: space-between; font-size: 11px; color: #999; margin-bottom: 15px;">';
			modalHtml += '<span>Unsatisfied</span><span>Neutral</span><span>Satisfied</span>';
			modalHtml += '</div>';
			modalHtml += '</div>';

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

			// Handle main choice checkbox changes.
			modal.find( 'input[name="deactivation_reason"]' ).on( 'change', function() {
				var choice = $( this ).val();
				var isChecked = $( this ).is( ':checked' );
				var choiceWrapper = $( this ).closest( '.inspiro-choice-wrapper' );
				var textField = choiceWrapper.find( '.inspiro-choice-text' );
				var featuresOptions = choiceWrapper.find( '.inspiro-features-options' );

				if ( isChecked ) {
					if ( formData.choices.indexOf( choice ) === -1 ) {
						formData.choices.push( choice );
					}
					textField.show();
					featuresOptions.show();
				} else {
					var index = formData.choices.indexOf( choice );
					if ( index !== -1 ) {
						formData.choices.splice( index, 1 );
					}
					textField.hide().val( '' );
					featuresOptions.hide();
					// Clear features selections
					featuresOptions.find( 'input[type="checkbox"]' ).prop( 'checked', false );
					featuresOptions.find( '.inspiro-feature-other-text' ).hide().val( '' );
					formData.choice_missing_features = '';
					formData.choice_missing_features_other_text = '';
				}
			});

			// Handle features checkbox changes.
			modal.find( 'input[name="missing_features"]' ).on( 'change', function() {
				var selectedFeatures = [];
				modal.find( 'input[name="missing_features"]:checked' ).each( function() {
					selectedFeatures.push( $( this ).val() );
				});
				formData.choice_missing_features = selectedFeatures.join( ',' );

				// Show/hide "Other" text field
				var otherChecked = $( this ).val() === 'other-feature' && $( this ).is( ':checked' );
				var otherTextField = $( this ).closest( '.inspiro-features-options' ).find( '.inspiro-feature-other-text' );
				if ( otherChecked ) {
					otherTextField.show();
				} else if ( $( this ).val() === 'other-feature' ) {
					otherTextField.hide().val( '' );
					formData.choice_missing_features_other_text = '';
				}
			});

			// Handle text field changes.
			modal.find( '.inspiro-choice-text, .inspiro-feature-other-text' ).on( 'input', function() {
				var fieldName = $( this ).attr( 'name' );
				formData[ fieldName ] = $( this ).val();
			});

			// Handle consent checkbox changes.
			modal.find( '#inspiro-consent-checkbox' ).on( 'change', function() {
				formData.user_consent = $( this ).is( ':checked' );
			});

			// Handle NPS button clicks.
			modal.find( '.inspiro-nps-btn' ).on( 'click', function() {
				var score = parseInt( $( this ).attr( 'data-score' ) );
				formData.nps_score = score;
				
				// Update button styles
				modal.find( '.inspiro-nps-btn' ).css({
					'background': '#fff',
					'border-color': '#ddd',
					'color': '#333'
				});
				
				// Highlight selected button with appropriate color for 0-5 scale
				var buttonColor = '#007cba'; // Default blue
				if ( score <= 2 ) {
					buttonColor = '#dc3545'; // Red for unsatisfied (0-2)
				} else if ( score <= 3 ) {
					buttonColor = '#ffc107'; // Yellow for neutral (3)
				} else {
					buttonColor = '#28a745'; // Green for satisfied (4-5)
				}
				
				$( this ).css({
					'background': buttonColor,
					'border-color': buttonColor,
					'color': '#fff'
				});
			});

			// Handle skip button.
			modal.find( '#inspiro-skip-survey' ).on( 'click', function() {
				proceedWithDeactivation();
			});

			// Handle submit button.
			modal.find( '#inspiro-submit-survey' ).on( 'click', function() {
				submitSurvey();
			});

			// Hide text fields and features options initially.
			modal.find( '.inspiro-choice-text, .inspiro-features-options' ).hide();
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
				choice_technical_issues_text: formData.choice_technical_issues_text || '',
				choice_plugin_compatibility_text: formData.choice_plugin_compatibility_text || '',
				choice_missing_features: formData.choice_missing_features || '',
				choice_missing_features_other_text: formData.choice_missing_features_other_text || '',
				choice_lack_of_support_text: formData.choice_lack_of_support_text || '',
				choice_other_text: formData.choice_other_text || '',
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
				user_consent: formData.user_consent,
				usage_duration_seconds: formData.usage_duration_seconds,
				usage_duration_days: formData.usage_duration_days,
				usage_duration_formatted: formData.usage_duration_formatted,
				theme_activated_at: formData.theme_activated_at,
				nps_score: formData.nps_score
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
					proceedWithDeactivation();
				},
				error: function( xhr, status, error ) {
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
				if ( href ) {
					var urlParams = new URLSearchParams( href.split( '?' )[1] );
					var stylesheet = urlParams.get( 'stylesheet' ) || urlParams.get( 'template' );
					if ( stylesheet ) {
						themeName = stylesheet.replace( /-/g, ' ' ).replace( /\b\w/g, l => l.toUpperCase() );
					}
				}
			}
			
			return themeName || 'Unknown Theme';
		}

		/**
		 * Intercept theme activation clicks (when switching away from Inspiro).
		 */
		$( document ).on( 'click', '.theme-actions .activate, a[href*="action=activate"]', function( e ) {
			// Only show survey if Inspiro is currently active
			if ( isInspiroActive() ) {
				var href = $( this ).attr( 'href' );
				
				// Skip if this is an install action (not activate)
				if ( href && href.indexOf( 'action=install' ) !== -1 ) {
					return; // Don't intercept install actions
				}
				
				// Skip if this is a live preview action
				if ( href && ( href.indexOf( 'customize.php' ) !== -1 || href.indexOf( 'return=' ) !== -1 ) ) {
					return; // Don't intercept live preview actions
				}
				
				// Skip if this button has preview-related classes or text
				var buttonText = $( this ).text().trim().toLowerCase();
				var buttonClass = $( this ).attr( 'class' ) || '';
				if ( buttonText.indexOf( 'preview' ) !== -1 || 
					 buttonText.indexOf( 'live preview' ) !== -1 ||
					 buttonText.indexOf( 'customize' ) !== -1 ||
					 buttonClass.indexOf( 'preview' ) !== -1 ) {
					return; // Don't intercept preview buttons
				}
				
				// Don't intercept if clicking on Inspiro itself
				var clickedTheme = $( this ).closest( '.theme' ).find( '.theme-name' ).text();
				if ( clickedTheme && clickedTheme.toLowerCase().indexOf( 'inspiro' ) !== -1 ) {
					return; // Don't show survey when reactivating Inspiro
				}
				
				// Store destination theme info
				window.inspiroDestinationTheme = getDestinationTheme( this );
				
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
				e.preventDefault();
				window.inspiroDeactivationHref = href;
				showModal();
			}
		});

	});

})( jQuery );