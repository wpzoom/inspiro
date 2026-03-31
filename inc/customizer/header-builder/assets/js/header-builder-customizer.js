(function ($) {
	'use strict';

	var HeaderBuilderLite = {
		currentDevice: 'desktop',
		isVisible: false,

		afterFocusLayout: function () {
			window.setTimeout(function () {
				$(window).trigger('resize');
			}, 100);
		},

		/**
		 * @param {Object} target From inspiroLiteHeaderBuilder.editTargets[ componentId ]: type, id, optional fallback_section, fallback_panel.
		 */
		focusCustomizerTarget: function (target) {
			if (!target || !target.type || !target.id) {
				return;
			}
			var after = HeaderBuilderLite.afterFocusLayout;
			try {
				if (target.type === 'control') {
					var ctl = wp.customize.control(target.id);
					if (ctl && typeof ctl.focus === 'function') {
						ctl.focus({ completeCallback: after });
						return;
					}
					if (target.fallback_section) {
						var sec = wp.customize.section(target.fallback_section);
						if (sec && typeof sec.focus === 'function') {
							sec.focus({ completeCallback: after });
							return;
						}
					}
					if (target.fallback_panel) {
						var pan = wp.customize.panel(target.fallback_panel);
						if (pan && typeof pan.focus === 'function') {
							pan.focus({ completeCallback: after });
						}
					}
					return;
				}
				if (target.type === 'section') {
					var section = wp.customize.section(target.id);
					if (section && typeof section.focus === 'function') {
						section.focus({ completeCallback: after });
					}
				}
			} catch (err) {
				// ignore
			}
		},

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
				'    <button type="button" class="ihb-colors-link" title="' + inspiroLiteHeaderBuilder.strings.colorsLinkTitle + '" aria-label="' + inspiroLiteHeaderBuilder.strings.colorsLinkAria + '">' +
				'      <svg height="18" width="18" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">' +
				'        <path d="M24 6c-9.94 0-18 8.06-18 18s8.06 18 18 18c1.66 0 3-1.34 3-3 0-.78-.29-1.48-.78-2.01-.47-.53-.75-1.22-.75-1.99 0-1.66 1.34-3 3-3h3.53c5.52 0 10-4.48 10-10 0-8.84-8.06-16-18-16zm-11 18c-1.66 0-3-1.34-3-3s1.34-3 3-3 3 1.34 3 3-1.34 3-3 3zm6-8c-1.66 0-3-1.34-3-3s1.34-3 3-3 3 1.34 3 3-1.34 3-3 3zm10 0c-1.66 0-3-1.34-3-3s1.34-3 3-3 3 1.34 3 3-1.34 3-3 3zm6 8c-1.66 0-3-1.34-3-3s1.34-3 3-3 3 1.34 3 3-1.34 3-3 3z"/>' +
				'        <path d="M0 0h48v48h-48z" fill="none"/>' +
				'      </svg>' +
				'    </button>' +
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

			$('#inspiro-lite-header-builder-ui').on('click', '.ihb-colors-link', function (e) {
				e.preventDefault();
				try {
					var menuColorsControl = wp.customize.control('for_color_header_navbar_menu_options');
					// Use Control.prototype.focus only — it expands the parent section in the right order.
					// Calling section.expand + section.focus + control.focus caused the sidebar to stay half off-screen (translateX) on first click.
					if (menuColorsControl && typeof menuColorsControl.focus === 'function') {
						menuColorsControl.focus({
							completeCallback: HeaderBuilderLite.afterFocusLayout
						});
					} else {
						var colorsSection = wp.customize.section('colors');
						if (colorsSection && typeof colorsSection.focus === 'function') {
							colorsSection.focus({
								completeCallback: HeaderBuilderLite.afterFocusLayout
							});
						}
					}
				} catch (err) {
					// ignore
				}
			});

			$('#inspiro-lite-header-builder-ui').on('click', '.ihb-component-edit', function (e) {
				e.preventDefault();
				e.stopPropagation();
				var $li = $(this).closest('li');
				var componentId = $li.data('componentId');
				if (!componentId || !inspiroLiteHeaderBuilder.editTargets) {
					return;
				}
				var target = inspiroLiteHeaderBuilder.editTargets[componentId];
				if (!target) {
					return;
				}
				HeaderBuilderLite.focusCustomizerTarget(target);
			});

			HeaderBuilderLite.initSortable();
			HeaderBuilderLite.bindRemoveComponent();
			HeaderBuilderLite.renderFromSetting();
		},

		bindRemoveComponent: function () {
			$(document).on('click', '#inspiro-lite-header-builder-ui .ihb-remove-component', function (e) {
				e.preventDefault();
				e.stopPropagation();
				$(this).closest('li').remove();
				HeaderBuilderLite.saveLayout();
				HeaderBuilderLite.renderFromSetting();
			});
		},

		refreshSortable: function () {
			try {
				$('.ihb-zone-items, .ihb-components-list').sortable('refresh');
			} catch (err) {
				// ignore
			}
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
				items: '> li:not(.ihb-component-locked)',
				placeholder: 'ihb-placeholder',
				stop: function () {
					HeaderBuilderLite.normalizeItemsAfterDrag();
					HeaderBuilderLite.saveLayout();
					HeaderBuilderLite.refreshSortable();
				}
			}).disableSelection();
		},

		/**
		 * After jQuery UI moves nodes between lists, markup can be wrong (e.g. X still on available items).
		 * Rebuild each row from component id so zone vs. available HTML matches.
		 */
		normalizeItemsAfterDrag: function () {
			$('.ihb-components-list li').each(function () {
				var $li = $(this);
				var id = $li.data('componentId');
				if (!id) {
					return;
				}
				var comp = HeaderBuilderLite.getComponentById(id);
				if (comp && comp.locked) {
					var lockedHtml = HeaderBuilderLite.lockedComponentHTML(comp);
					if (lockedHtml) {
						$li.replaceWith(lockedHtml);
					}
					return;
				}
				var html = HeaderBuilderLite.componentHTML(id, false);
				if (html) {
					$li.replaceWith(html);
				}
			});

			$('.ihb-zone-items li').each(function () {
				var id = $(this).data('componentId');
				if (!id) {
					return;
				}
				var html = HeaderBuilderLite.componentHTML(id, true);
				if (html) {
					$(this).replaceWith(html);
				}
			});
		},

		getComponentById: function (id) {
			var list = inspiroLiteHeaderBuilder.components || [];
			for (var i = 0; i < list.length; i++) {
				if (list[i].id === id) {
					return list[i];
				}
			}
			return null;
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
					var $row = $(this);
					if ($row.hasClass('ihb-component-locked')) {
						return;
					}
					var cid = $row.data('componentId');
					if (cid) {
						ids.push(cid);
					}
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
					var html = HeaderBuilderLite.componentHTML(componentId, true);
					if (html) {
						$zone.append(html);
						used.push(componentId);
					}
				});
			});

			var $list = $('.ihb-components-list');
			$list.empty();
			inspiroLiteHeaderBuilder.components.forEach(function (component) {
				if (component.locked) {
					return;
				}
				if (used.indexOf(component.id) === -1) {
					$list.append(HeaderBuilderLite.componentHTML(component.id, false));
				}
			});
			inspiroLiteHeaderBuilder.components.forEach(function (component) {
				if (component.locked) {
					var locked = HeaderBuilderLite.lockedComponentHTML(component);
					if (locked) {
						$list.append(locked);
					}
				}
			});

			HeaderBuilderLite.refreshSortable();
		},

		escapeAttr: function (str) {
			return String(str || '')
				.replace(/&/g, '&amp;')
				.replace(/"/g, '&quot;')
				.replace(/</g, '&lt;');
		},

		lockedComponentHTML: function (component) {
			if (!component || !component.locked) {
				return '';
			}
			var proUrl = inspiroLiteHeaderBuilder.proUrl || '#';
			var lockTitle = HeaderBuilderLite.escapeAttr(inspiroLiteHeaderBuilder.strings.lockProFeature);
			var upgradeText = inspiroLiteHeaderBuilder.strings.upgrade;
			var lockSvg = '<svg class="ihb-lock-svg" width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M7 11V7a5 5 0 0 1 10 0v4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><rect x="3" y="11" width="18" height="11" rx="2" ry="2" stroke="currentColor" stroke-width="2" fill="none"/></svg>';
			return '<li class="ihb-component-item ihb-component-locked ihb-pro-locked" data-component-id="' + component.id + '" aria-disabled="true" title="' + lockTitle + '">' +
				'<span class="dashicons ' + component.icon + ' ihb-component-icon"></span>' +
				'<span class="ihb-component-label">' + component.label + '</span>' +
				'<span class="ihb-lock-wrap">' + lockSvg + '</span>' +
				'<a class="ihb-pro-upgrade-link" href="' + proUrl + '" target="_blank" rel="noopener noreferrer">' + upgradeText + '</a>' +
				'</li>';
		},

		componentHTML: function (componentId, inZone) {
			var component = HeaderBuilderLite.getComponentById(componentId);
			if (!component) {
				return '';
			}

			if (component.locked) {
				if (inZone) {
					return '';
				}
				return HeaderBuilderLite.lockedComponentHTML(component);
			}

			var actionsHTML = '';
			if (inZone) {
				var editTitle = HeaderBuilderLite.escapeAttr(inspiroLiteHeaderBuilder.strings.editComponentSettings || '');
				var showEdit = componentId !== 'search' && componentId !== 'hamburger';
				actionsHTML = '<div class="ihb-component-actions">';
				if (showEdit) {
					actionsHTML +=
						'<button type="button" class="ihb-component-edit" title="' + editTitle + '" aria-label="' + editTitle + '">' +
						'<span class="dashicons dashicons-edit"></span>' +
						'</button>';
				}
				actionsHTML +=
					'<button type="button" class="ihb-remove-component" title="' + inspiroLiteHeaderBuilder.strings.remove + '">' +
					'<span class="dashicons dashicons-no-alt"></span>' +
					'</button>' +
					'</div>';
			}

			var itemClasses = 'ihb-component-item' + (inZone ? ' ihb-zone-component' : ' ihb-available');

			return '<li class="' + itemClasses + '" data-component-id="' + component.id + '">' +
				'<span class="dashicons ' + component.icon + ' ihb-component-icon"></span>' +
				'<span class="ihb-component-label">' + component.label + '</span>' +
				actionsHTML +
				'</li>';
		}
	};

	HeaderBuilderLite.init();
})(jQuery);
