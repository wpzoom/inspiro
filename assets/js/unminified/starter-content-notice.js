/**
 * Starter Content Notice Script
 *
 * @package Inspiro
 * @since 2.1.1
 */

( function( $, api ) {
	'use strict';

	// Wait for the customizer to be ready
	api.bind( 'ready', function() {
		// Handle button clicks in the starter content section
		$( document ).on( 'click', '.inspiro-starter-content-buttons button', function( e ) {
			e.preventDefault();
			
			var action = $( this ).data( 'action' );
			
			if ( 'clean' === action ) {
				// Confirm before removing starter content
				if ( ! confirm( 'Are you sure you want to remove all starter content? This action cannot be undone.' ) ) {
					return;
				}
			}
			
			handleStarterContentDecision( action );
		} );
	} );

	// Handle the decision
	function handleStarterContentDecision( action ) {
		var $buttons = $( '.inspiro-starter-content-buttons button' );
		var $section = $( '#accordion-section-inspiro_starter_content_notice' );

		// Show loading state
		$buttons.prop( 'disabled', true ).addClass( 'updating-message' );
		$section.addClass( 'busy' );

		// If keeping starter content, publish the customizer first
		if ( 'keep' === action ) {
			// Trigger the publish action to save starter content
			api.previewer.save().done( function() {
				// After successful publish, dismiss the notice
				dismissStarterContentNotice( action, $buttons, $section );
			} ).fail( function() {
				// Re-enable buttons on publish failure
				$buttons.prop( 'disabled', false ).removeClass( 'updating-message' );
				$section.removeClass( 'busy' );
				alert( 'Failed to publish starter content. Please try again.' );
			} );
		} else {
			// For clean slate, just dismiss the notice and clean up
			dismissStarterContentNotice( action, $buttons, $section );
		}
	}

	// Dismiss the starter content notice via AJAX
	function dismissStarterContentNotice( action, $buttons, $section ) {
		// Send AJAX request
		$.post( inspiroStarterContent.ajaxUrl, {
			action: 'inspiro_dismiss_starter_content',
			starter_action: action,
			nonce: inspiroStarterContent.nonce
		}, function( response ) {
			if ( response.success ) {
				// Hide the entire section
				$section.fadeOut( 400, function() {
					$section.remove();
				} );

				// If clean slate was chosen, refresh the preview and customizer
				if ( 'clean' === action ) {
					// Refresh the preview first
					api.previewer.refresh();

					// Then reload the entire customizer after a brief delay
					setTimeout( function() {
						window.location.reload();
					}, 1000 );
				}
			} else {
				// Re-enable buttons on error
				$buttons.prop( 'disabled', false ).removeClass( 'updating-message' );
				$section.removeClass( 'busy' );
				alert( 'Something went wrong. Please try again.' );
			}
		} ).fail( function() {
			// Re-enable buttons on AJAX failure
			$buttons.prop( 'disabled', false ).removeClass( 'updating-message' );
			$section.removeClass( 'busy' );
			alert( 'Something went wrong. Please try again.' );
		} );
	}

} )( jQuery, wp.customize );