jQuery(document).ready(function ($) {
	// Check if the target element exists.
	let pointerTarget = $(customAdminPointer.pointer_target);

	if (pointerTarget.length) {
		pointerTarget.pointer({
			content: customAdminPointer.pointer_text,
			position: {
				edge: 'left', // Positioning of the pointer relative to the target.
				align: 'center' // Align the pointer.
			},
			close: function () {
				// Perform any action after the pointer is closed (like updating user meta to avoid showing it again).
				$.post(ajaxurl, {
					action: 'dismiss_wp_pointer',
					pointer: 'custom_admin_pointer', // Unique identifier for the pointer.
					security: customAdminPointer.nonce
				})
				.done(function (response) {
					console.log('Success:', response);
				})
				.fail(function (jqXHR, textStatus, errorThrown) {
					console.log('Error:', textStatus, errorThrown);
				});
			}
		}).pointer('open');
	}
});
