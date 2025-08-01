/**
 * Alignment Control JavaScript
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 2.0.8
 */

wp.customize.controlConstructor['inspiro-alignment'] = wp.customize.Control.extend({

	ready: function() {
		'use strict';

		var control = this;

		// Initialize the control
		control.initAlignmentControl();
	},

	/**
	 * Initialize alignment control
	 */
	initAlignmentControl: function() {
		var control = this;
		var container = control.container;

		// Handle alignment button clicks
		container.on('click', '.inspiro-alignment-buttons button', function(e) {
			e.preventDefault();
			
			var $button = jQuery(this);
			var alignment = $button.data('alignment');
			
			// Remove active class from all buttons
			container.find('.inspiro-alignment-buttons button').removeClass('active');
			
			// Add active class to clicked button
			$button.addClass('active');
			
			// Update the setting value
			control.setting.set(alignment);
		});

		// Listen for setting changes to update button states
		control.setting.bind(function(value) {
			// Remove active class from all buttons
			container.find('.inspiro-alignment-buttons button').removeClass('active');
			
			// Add active class to the button matching the current value
			container.find('.inspiro-alignment-buttons button[data-alignment="' + value + '"]').addClass('active');
		});
	}

}); 