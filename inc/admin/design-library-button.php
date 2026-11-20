<?php
/**
 * "Design Library" placeholder button in the block editor toolbar.
 *
 * The Design Library (the theme's patterns and an AI page builder in one
 * window) ships with the free Inspiro Starter Sites plugin, which puts its
 * own button in this spot. While that plugin is not active, this button
 * offers to install and activate it — only after the user confirms — with
 * the same AJAX action as the theme's dashboard pages.
 *
 * @package Inspiro
 * @since   Inspiro 2.3.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Print the placeholder button on the page and post editor screens.
 */
function inspiro_design_library_placeholder_button() {
	$screen = function_exists( 'get_current_screen' ) ? get_current_screen() : null;
	if ( ! $screen || ! method_exists( $screen, 'is_block_editor' ) || ! $screen->is_block_editor() ) {
		return;
	}
	// The plugin's button shows on pages and posts.
	if ( ! in_array( $screen->post_type, array( 'page', 'post' ), true ) ) {
		return;
	}
	if ( ! current_user_can( 'install_plugins' ) || ! current_user_can( 'activate_plugins' ) ) {
		return;
	}
	if ( ! function_exists( 'inspiro_check_plugin_status' ) ) {
		return;
	}

	$status = inspiro_check_plugin_status( 'inspiro-starter-sites/inspiro-starter-sites.php' );
	if ( 'active' === $status ) {
		return;
	}

	$strings = array(
		'label'   => __( 'Design Library', 'inspiro' ),
		'title'   => 'installed' === $status
			? __( 'Activate the free Inspiro Starter Sites plugin to open the Design Library', 'inspiro' )
			: __( 'Install the free Inspiro Starter Sites plugin to open the Design Library', 'inspiro' ),
		'confirm' => 'installed' === $status
			? __( 'The Design Library (ready-made patterns and an AI page builder) is part of the free Inspiro Starter Sites plugin. Activate it now?', 'inspiro' )
			: __( 'The Design Library (ready-made patterns and an AI page builder) is part of the free Inspiro Starter Sites plugin. Install and activate it now?', 'inspiro' ),
		'working' => 'installed' === $status ? __( 'Activating…', 'inspiro' ) : __( 'Installing…', 'inspiro' ),
		'reload'  => __( 'Reload to open', 'inspiro' ),
		'ready'   => __( 'Inspiro Starter Sites is active. Save your changes, then reload the editor to open the Design Library.', 'inspiro' ),
		'action'  => __( 'Reload now', 'inspiro' ),
		'error'   => __( 'Something went wrong. Please try again, or install Inspiro Starter Sites from the Plugins page.', 'inspiro' ),
	);
	?>
	<style>
		.inspiro-design-library-placeholder {
			display: inline-flex;
			align-items: center;
			margin-left: 8px;
		}
		.inspiro-design-library-placeholder button {
			display: flex;
			align-items: center;
			gap: 6px;
			height: 33px;
			padding: 0 10px;
			border: 0;
			border-radius: 4px;
			background: #000;
			color: #fff;
			font-size: 13px;
			font-weight: 500;
			white-space: nowrap;
			cursor: pointer;
		}
		.inspiro-design-library-placeholder button:hover:not(:disabled),
		.inspiro-design-library-placeholder button:focus:not(:disabled) {
			background: #2c2c2e;
			color: #fff;
			box-shadow: none;
			outline: none;
		}
		.inspiro-design-library-placeholder button:disabled {
			opacity: 0.7;
			cursor: default;
		}
	</style>
	<script>
	( function () {
		var strings = <?php echo wp_json_encode( $strings ); ?>;
		var nonce   = <?php echo wp_json_encode( wp_create_nonce( 'inspiro-admin-pages' ) ); ?>;
		var icon    = '<svg width="20" height="20" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false"><path fill-rule="evenodd" clip-rule="evenodd" d="M16 32C24.8366 32 32 24.8366 32 16C32 7.16344 24.8366 0 16 0C7.16344 0 0 7.16344 0 16C0 24.8366 7.16344 32 16 32ZM13.4982 7.17576C13.4982 5.78333 14.627 4.65455 16.0194 4.65455H18.2885C18.4277 4.65455 18.5406 4.76742 18.5406 4.90667V9.39303C18.5406 9.47618 18.4962 9.55301 18.4242 9.59458L13.8473 12.2371C13.6921 12.3267 13.4982 12.2147 13.4982 12.0355V7.17576ZM13.6145 16.7383L18.1915 14.0958C18.3467 14.0062 18.5406 14.1182 18.5406 14.2974V24.8242C18.5406 26.2167 17.4118 27.3455 16.0194 27.3455H13.7503C13.6111 27.3455 13.4982 27.2326 13.4982 27.0933V16.9399C13.4982 16.8567 13.5425 16.7799 13.6145 16.7383Z" fill="currentColor"></path></svg>';

		// One button for the whole session: the editor re-renders its toolbar,
		// and the same element (with its state) is put back each time.
		var container = document.createElement( 'div' );
		var button    = document.createElement( 'button' );
		var label     = document.createElement( 'span' );
		var state     = 'idle'; // idle | working | ready
		container.className = 'inspiro-design-library-placeholder';
		button.type         = 'button';
		button.title        = strings.title;
		button.innerHTML    = icon;
		label.textContent   = strings.label;
		button.appendChild( label );
		container.appendChild( button );

		function notices() {
			return window.wp && wp.data && wp.data.dispatch ? wp.data.dispatch( 'core/notices' ) : null;
		}

		function fail( message ) {
			state             = 'idle';
			button.disabled   = false;
			label.textContent = strings.label;
			var n = notices();
			if ( n ) {
				n.createErrorNotice( message || strings.error );
			} else {
				window.alert( message || strings.error );
			}
		}

		function done() {
			var editor = window.wp && wp.data && wp.data.select ? wp.data.select( 'core/editor' ) : null;
			if ( ! editor || ! editor.isEditedPostDirty() ) {
				window.location.reload();
				return;
			}
			// Unsaved changes: never reload on our own.
			state             = 'ready';
			button.disabled   = false;
			label.textContent = strings.reload;
			var n = notices();
			if ( n ) {
				n.createSuccessNotice( strings.ready, {
					actions: [ { label: strings.action, onClick: function () { window.location.reload(); } } ]
				} );
			}
		}

		// The installer may print its progress before the JSON answer.
		function answer( text ) {
			var at = text.lastIndexOf( '{"success"' );
			if ( at < 0 ) {
				return null;
			}
			try {
				return JSON.parse( text.slice( at ) );
			} catch ( e ) {
				return null;
			}
		}

		button.addEventListener( 'click', function () {
			if ( 'working' === state ) {
				return;
			}
			if ( 'ready' === state ) {
				window.location.reload();
				return;
			}
			if ( ! window.confirm( strings.confirm ) ) {
				return;
			}
			state             = 'working';
			button.disabled   = true;
			label.textContent = strings.working;

			var body = new URLSearchParams();
			body.append( 'action', 'install_activate_inspiro_starter_sites_plugin' );
			body.append( 'security', nonce );
			body.append( 'plugin_slug', 'inspiro-starter-sites' );
			window.fetch( window.ajaxurl, { method: 'POST', credentials: 'same-origin', body: body } )
				.then( function ( response ) { return response.text(); } )
				.then( function ( text ) {
					var res = answer( text );
					if ( res && res.success ) {
						done();
					} else {
						fail( res && res.data && res.data.message );
					}
				} )
				.catch( function () { fail(); } );
		} );

		function mount() {
			var toolbar = document.querySelector( '.editor-document-tools__left, .edit-post-header-toolbar__left' );
			if ( toolbar && ! toolbar.contains( container ) ) {
				toolbar.appendChild( container );
			}
			return !! toolbar;
		}

		var wait = window.setInterval( function () {
			if ( ! mount() ) {
				return;
			}
			window.clearInterval( wait );
			var target = document.querySelector( '#editor' ) || document.body;
			new window.MutationObserver( mount ).observe( target, { childList: true, subtree: true } );
		}, 500 );
	} )();
	</script>
	<?php
}
add_action( 'admin_footer', 'inspiro_design_library_placeholder_button' );
