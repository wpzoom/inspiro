(function ($) {
	'use strict';

	var HeaderBuilderLite = {
		currentDevice: 'desktop',
		isVisible: false,
		init: function () {
			if (typeof wp === 'undefined' || !wp.customize || typeof inspiroLiteHeaderBuilder === 'undefined') {
				return;
			}

			wp.customize.bind('ready', function () {
				HeaderBuilderLite.mountUI();
				HeaderBuilderLite.bindEnableToggle();
			});
		},

		mountUI: function () {
			if ($('#inspiro-lite-header-builder-ui').length) {
				return;
			}

			var html = '' +
				'<div id="inspiro-lite-header-builder-ui" class="inspiro-lite-header-builder-ui ihb-lite-panel">' +
				'  <div class="ihb-lite-panel-header">' +
				'    <h4>' + inspiroLiteHeaderBuilder.strings.builderTitle + '</h4>' +
				'    <div class="ihb-lite-device-switcher">' +
				'      <button type="button" class="ihb-lite-device-btn active" data-device="desktop" title="' + inspiroLiteHeaderBuilder.strings.desktop + '"><span class="dashicons dashicons-desktop"></span></button>' +
				'      <button type="button" class="ihb-lite-device-btn" data-device="tablet" title="' + inspiroLiteHeaderBuilder.strings.tablet + '"><span class="dashicons dashicons-tablet"></span></button>' +
				'      <button type="button" class="ihb-lite-device-btn" data-device="mobile" title="' + inspiroLiteHeaderBuilder.strings.mobile + '"><span class="dashicons dashicons-smartphone"></span></button>' +
				'    </div>' +
				'    <button type="button" class="ihb-lite-toggle-btn" title="Hide Header Builder"><span class="dashicons dashicons-arrow-down-alt2"></span></button>' +
				'  </div>' +
				'  <div class="ihb-lite-panel-body">' +
				'    <div class="ihb-lite-builder-content">' +
				'      <div class="ihb-lite-zones">' +
				'        <div class="ihb-lite-zone-wrap">' +
				'          <div class="ihb-zone-header"><div class="ihb-zone-label">' + inspiroLiteHeaderBuilder.strings.leftZone + '</div></div>' +
				'          <ul class="ihb-zone-items" data-zone="left"></ul>' +
				'        </div>' +
				'        <div class="ihb-lite-zone-wrap">' +
				'          <div class="ihb-zone-header"><div class="ihb-zone-label">' + inspiroLiteHeaderBuilder.strings.centerZone + '</div></div>' +
				'          <ul class="ihb-zone-items" data-zone="center"></ul>' +
				'        </div>' +
				'        <div class="ihb-lite-zone-wrap">' +
				'          <div class="ihb-zone-header"><div class="ihb-zone-label">' + inspiroLiteHeaderBuilder.strings.rightZone + '</div></div>' +
				'          <ul class="ihb-zone-items" data-zone="right"></ul>' +
				'        </div>' +
				'      </div>' +
				'      <div class="ihb-lite-available">' +
				'        <strong>' + inspiroLiteHeaderBuilder.strings.availableComponents + '</strong>' +
				'        <ul class="ihb-components-list"></ul>' +
				'      </div>' +
				'    </div>' +
				'  </div>' +
				'</div>';

			$('.wp-full-overlay').append(html);
			HeaderBuilderLite.createExternalToggleButton();

			$('#inspiro-lite-header-builder-ui').on('click', '.ihb-lite-device-btn', function () {
				var device = $(this).data('device');
				HeaderBuilderLite.setDevice(device, true);
				if (wp.customize.previewedDevice) {
					wp.customize.previewedDevice.set(device);
				}
			});
			HeaderBuilderLite.bindPreviewDeviceSync();
			HeaderBuilderLite.setDevice(HeaderBuilderLite.currentDevice, true);
			$('#inspiro-lite-header-builder-ui').on('click', '.ihb-lite-toggle-btn', function () {
				HeaderBuilderLite.hideBuilder();
			});

			HeaderBuilderLite.initSortable();
			HeaderBuilderLite.renderFromSetting();
		},

		bindPreviewDeviceSync: function () {
			if (!wp.customize.previewedDevice) {
				return;
			}

			var initialDevice = wp.customize.previewedDevice.get();
			if (initialDevice) {
				this.setDevice(initialDevice, true);
			}

			wp.customize.previewedDevice.bind(function (device) {
				HeaderBuilderLite.setDevice(device, false);
			});
		},

		setDevice: function (device, rerender) {
			$('#inspiro-lite-header-builder-ui .ihb-lite-device-btn').removeClass('active');
			$('#inspiro-lite-header-builder-ui .ihb-lite-device-btn[data-device="' + device + '"]').addClass('active');
			HeaderBuilderLite.currentDevice = device;
			if (rerender) {
				HeaderBuilderLite.renderFromSetting();
			}
		},

		createExternalToggleButton: function () {
			if ($('#ihb-lite-external-toggle').length) {
				return;
			}

			var buttonHTML = '' +
				'<div id="ihb-lite-external-toggle" class="ihb-lite-external-toggle">' +
				'  <button type="button" class="ihb-lite-external-toggle-btn" title="' + inspiroLiteHeaderBuilder.strings.openBuilder + '">' +
				'    <span class="dashicons dashicons-admin-customizer"></span>' +
				'    <span class="ihb-lite-external-toggle-text">' + inspiroLiteHeaderBuilder.strings.builderTitle + '</span>' +
				'  </button>' +
				'</div>';

			$('body').append(buttonHTML);

			$(document).on('click', '.ihb-lite-external-toggle-btn', function (e) {
				e.preventDefault();
				HeaderBuilderLite.showBuilder();
			});
		},

		showBuilder: function () {
			this.isVisible = true;
			$('#inspiro-lite-header-builder-ui').addClass('ihb-visible');
			$('#ihb-lite-external-toggle').hide();
			$('body').addClass('ihb-lite-builder-active');
			$('.ihb-lite-toggle-btn').attr('title', 'Hide Header Builder');
			$('.ihb-lite-toggle-btn .dashicons').removeClass('dashicons-arrow-up-alt2').addClass('dashicons-arrow-down-alt2');
		},

		hideBuilder: function () {
			this.isVisible = false;
			$('#inspiro-lite-header-builder-ui').removeClass('ihb-visible');
			$('body').removeClass('ihb-lite-builder-active');
			$('.ihb-lite-toggle-btn').attr('title', 'Show Header Builder');
			$('.ihb-lite-toggle-btn .dashicons').removeClass('dashicons-arrow-down-alt2').addClass('dashicons-arrow-up-alt2');
			if (wp.customize('inspiro_header_builder_enable')()) {
				$('#ihb-lite-external-toggle').show();
			}
		},

		bindEnableToggle: function () {
			wp.customize('inspiro_header_builder_enable', function (value) {
				var $ui = $('#inspiro-lite-header-builder-ui');
				if (!$ui.length) {
					return;
				}

				var visible = value.get();
				if (visible) {
					HeaderBuilderLite.hideBuilder();
					$('#ihb-lite-external-toggle').show();
				} else {
					HeaderBuilderLite.hideBuilder();
					$('#ihb-lite-external-toggle').hide();
				}
			});

			var enabled = wp.customize('inspiro_header_builder_enable')();
			if (enabled) {
				this.hideBuilder();
				$('#ihb-lite-external-toggle').show();
			} else {
				this.hideBuilder();
				$('#ihb-lite-external-toggle').hide();
			}
		},

		initSortable: function () {
			$('.ihb-zone-items, .ihb-components-list').sortable({
				connectWith: '.ihb-zone-items, .ihb-components-list',
				placeholder: 'ihb-placeholder',
				stop: function () {
					HeaderBuilderLite.saveLayout();
				}
			}).disableSelection();
		},

		getLayout: function () {
			var raw = wp.customize('inspiro_header_builder_header_main_header_row')();
			if (!raw) {
				return $.extend(true, {}, inspiroLiteHeaderBuilder.defaults);
			}

			if (typeof raw === 'string') {
				try {
					return JSON.parse(raw);
				} catch (e) {
					return $.extend(true, {}, inspiroLiteHeaderBuilder.defaults);
				}
			}

			return raw;
		},

		saveLayout: function () {
			var layout = HeaderBuilderLite.getLayout();
			if (!layout[HeaderBuilderLite.currentDevice]) {
				layout[HeaderBuilderLite.currentDevice] = { left: [], center: [], right: [] };
			}

			['left', 'center', 'right'].forEach(function (zone) {
				var ids = [];
				$('.ihb-zone-items[data-zone="' + zone + '"] li').each(function () {
					ids.push($(this).data('componentId'));
				});
				layout[HeaderBuilderLite.currentDevice][zone] = ids;
			});

			wp.customize('inspiro_header_builder_header_main_header_row').set(JSON.stringify(layout));
		},

		renderFromSetting: function () {
			var layout = HeaderBuilderLite.getLayout();
			var deviceData = layout[HeaderBuilderLite.currentDevice] || { left: [], center: [], right: [] };
			var used = [];

			['left', 'center', 'right'].forEach(function (zone) {
				var zoneItems = deviceData[zone] || [];
				var $zone = $('.ihb-zone-items[data-zone="' + zone + '"]');
				$zone.empty();
				zoneItems.forEach(function (componentId) {
					$zone.append(HeaderBuilderLite.componentHTML(componentId));
					used.push(componentId);
				});
			});

			var $list = $('.ihb-components-list');
			$list.empty();
			inspiroLiteHeaderBuilder.components.forEach(function (component) {
				if (used.indexOf(component.id) === -1) {
					$list.append(HeaderBuilderLite.componentHTML(component.id));
				}
			});
		},

		componentHTML: function (componentId) {
			var component = inspiroLiteHeaderBuilder.components.find(function (item) {
				return item.id === componentId;
			});
			if (!component) {
				return '';
			}

			return '<li data-component-id="' + component.id + '">' +
				'<span class="dashicons ' + component.icon + '"></span>' +
				'<span>' + component.label + '</span>' +
				'</li>';
		}
	};

	HeaderBuilderLite.init();
})(jQuery);
