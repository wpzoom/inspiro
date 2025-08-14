//Init tabs
jQuery(document).ready(($) => {	

	var $tabs = $("#tabs").tabs({
		activate: function (event, ui) {
			var newHash = ui.newTab.find("a").attr("href");
			history.replaceState(null, null, newHash); // Update the URL with the new hash
		}
	});

	const ACTION_NAME = 'install_activate_inspiro_starter_sites_plugin';
	const PLUGIN_SLUG = 'inspiro-starter-sites';

	const handleAjaxRequest = (btn, btnTextContainer, originalText, spinIcon) => {
		$.ajax({
			url: ajaxurl,
			type: 'POST',
			data: {
				action: ACTION_NAME,
				plugin_slug: PLUGIN_SLUG,
				security: inspiro_admin_pages_vars.nonce,
			},
			success: () => {
				spinIcon.addClass('hidden-element');
				btn.removeClass('button-disabled');
				btnTextContainer.text(originalText);  // Restore original button text
				window.location.reload();  // Reload page
			},
			error: (error) => {
				// console.log('Error:', error);
				btnTextContainer.text(originalText);  // Restore original button text on error
			}
		});
	};

	$('#install-inspiro-starter-sites-btn').on('click', function() {
		const btn = $(this);
		btn.addClass('button-disabled');

		const btnTextContainer = btn.find('#install-inspiro-starter-sites-btn-text');
		const originalText = btnTextContainer.text();
		const installingText = btnTextContainer.data('installing-text');

		btnTextContainer.text(installingText);

		const spinIcon = btn.find('.dashicons-update.spin-icon');
		spinIcon.removeClass('hidden-element');

		handleAjaxRequest(btn, btnTextContainer, originalText, spinIcon);
	} );

	$('#wpz-notice-inspiro-plugin-handle').on( 'click', function( e ) {
		
		const btn = $(this);
		const dataPluginStatus = btn.data('plugin-status');
		
		if ( dataPluginStatus === 'active' ) {
			return;
		}

		e.preventDefault();

		const originalText = btn.text();
		const installingText = inspiro_admin_pages_vars.installingText;
		const redirectingText = inspiro_admin_pages_vars.redirectingText;

		btn.text( installingText );

		$.ajax({
			url: ajaxurl,
			type: 'POST',
			data: {
				action: ACTION_NAME,
				plugin_slug: 'inspiro-starter-sites',
				security: inspiro_admin_pages_vars.nonce,
			},
			success: () => {
				btn.text( redirectingText );  // Restore original button text
				window.location = inspiro_admin_pages_vars.import_url;  // Redirect to the URL
			},
			error: (error) => {
				// console.log('Error:', error);
				btn.text(originalText);  // Restore original button text on error
			}
		} );

	} );

	// Install plugin item
	$('.js-inspiro-plugin-item-button').on('click', function( event ) {
		event.preventDefault();

		const btn = $(this);
		var pluginsToInstall = btn.closest( '.section_footer' ).find( 'input[type=checkbox]' ).serializeArray();

		console.log( pluginsToInstall );

		if ( pluginsToInstall.length === 0 ) {
			return false;
		}

		inspiroInstallPluginsAjaxCall( pluginsToInstall, 0, btn, false );

		
	} );

	var pluginsToInstall = $( '.wpz-grid-wrap .inspiro-plugin-item .section_footer input[type=checkbox]' ).serializeArray();
	if ( pluginsToInstall.length === 0 ) {
		$('.js-inspiro-install-all-plugins').addClass( 'button-disabled' );
	}

	// Install all plugins
	$('.js-inspiro-install-all-plugins').on('click', function( event ) {
		event.preventDefault();

		var $button = $( this );
		var pluginsToInstall = $( '.wpz-grid-wrap .inspiro-plugin-item .section_footer input[type=checkbox]' ).serializeArray();
		
		if ( pluginsToInstall.length === 0 ) {
			return false;
		}

		$button.addClass( 'button-disabled' );

		inspiroInstallPluginsAjaxCall( pluginsToInstall, 0, $button, false );
	} );

	/**
	 * Install plugins via AJAX
	 *
	 * @param {Object[]} plugins The array of plugin objects with name and value pairs.
	 * @param {int} counter, The counter of the plugin to import from the list above.
	 * @param {Object} $button The jQuery object of the submit button.
	 * @param {bool} pluginInstallFailed If there were any failed plugin installs.
	 */
	function inspiroInstallPluginsAjaxCall( plugins, counter, $button, pluginInstallFailed ) {
		var plugin = plugins[ counter ],
		slug = plugin.name;

		$.ajax({
			method: 'POST',
			url: ajaxurl,
			data:        {
				action: 'inspiro_install_plugin',
				security: inspiro_admin_pages_vars.nonce,
				slug: slug,
			},
			beforeSend:  function() {
				var $currentPluginItem = $( '.plugin-item-' + slug );
				$currentPluginItem.addClass( 'plugin-item--loading' );
				$currentPluginItem.find( 'a.button' ).text( 'Installing...' );
			}
		} )
		.done( function( response ) {
			var $currentPluginItem = $( '.plugin-item-' + slug );
			
			$currentPluginItem.removeClass( 'plugin-item--loading' );


			if ( response.success ) {
				$currentPluginItem.addClass( 'plugin-item--active' );
				$currentPluginItem.find( 'input[type=checkbox]' ).prop( 'disabled', true );
				$currentPluginItem.find( 'a.button' ).text( 'Active' );
				$currentPluginItem.find( 'a.button' ).addClass( 'button-disabled' );
			} else {

				if ( -1 === response.data.indexOf( '<p>' ) ) {
					response.data = '<p>' + response.data + '</p>';
				}

				$currentPluginItem.find( '.js-inspiro-plugin-item-error' ).append( response.data );
				$currentPluginItem.find( 'input[type=checkbox]' ).prop( 'checked', false );
				pluginInstallFailed = true;
			}
		})
		.fail( function( error ) {
			var $currentPluginItem = $( '.plugin-item-' + slug );
			$currentPluginItem.removeClass( 'plugin-item--loading' );
			$currentPluginItem.find( '.js-inpiro-plugin-item-error' ).append( '<p>' + error.statusText + ' (' + error.status + ')</p>' );
			pluginInstallFailed = true;
		})
		.always( function() {
			counter++;
			if ( counter === plugins.length ) {

				$button.removeClass( 'inspiro-button-disabled' );
			} else {
				inspiroInstallPluginsAjaxCall( plugins, counter, $button, pluginInstallFailed );
			}
		} );

	}

	$( '.theme-buttons.filters a' ).on( 'click', function( event ) {
		event.preventDefault();

		const $this = $( this );

		//Active class
		$('.theme-buttons.filters a').removeClass('active');
		$this.addClass('active');

		var filter = $(this).data('filter'); // Get the filter value

		var $allDemos = $(".wpz-onboard_content-main-step-content.premium ul li[data-design-id]");
		var $blockDemos = $(".wpz-onboard_content-main-step-content.premium ul li[data-design-id].gutenberg");
		var $elementorDemos = $(".wpz-onboard_content-main-step-content.premium ul li[data-design-id].elementor");

		if( '*' === filter  ) {
			$allDemos.removeClass('fade-out').addClass('fade-in');
		} else if( 'gutenberg' === filter ) {
			$elementorDemos.removeClass('fade-in').addClass('fade-out');
			$blockDemos.removeClass('fade-out').addClass('fade-in');
		} else if( 'elementor' === filter ) {
			$blockDemos.removeClass('fade-in').addClass('fade-out');
			$elementorDemos.removeClass('fade-out').addClass('fade-in');
		}
		

	} );

});


( function( $ ) {
	const $wrapper = $('.wpz-onboard_wrapper');
	const activePlugins = [];
	const requiredPlugins = [];
	const recommendedPlugins = [];

	/**
	 * Hook up functionality when the document loads.
	 */
	$( function( $ ) {
		if ( window.location.hash ) {
			setDashboardTab( window.location.hash );
		}

	} );

	/**
		 * Sets the selected tab to the tab with the given ID.
		 *
		 * @param {string} id The ID of the tab to set as selected.
		 */
	function setDashboardTab( id, updateHash = false ) {
		if ( id ) {
			const $target = $wrapper.find( '#wpz-onboard_tabs .wpz-onboard_tab a[href="' + id + '"]' ),
				$tabs   = $target.closest( '.wpz-onboard_wrapper' ).find( '.wpz-onboard_content .wpz-onboard_content-main .wpz-onboard_content-main-tab' );

			$target.closest( '#wpz-onboard_tabs' ).find( '.wpz-onboard_tab' ).removeClass( 'active' );
			$target.closest( '.wpz-onboard_tab' ).addClass( 'active' );

			$tabs.removeClass( 'active' );
			$tabs.filter( '[data-id="' + id + '"]' ).addClass( 'active' );

		}
	}


} )( jQuery );

