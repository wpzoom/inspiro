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

		/**
		 * Zone label + Pro-locked .ihb-zone-controls (markup only, no behavior).
		 *
		 * @param {string} zoneLabel Localized Left / Center / Right.
		 * @return {string}
		 */
		buildZoneHeaderHtml: function (zoneLabel) {
			var s = inspiroLiteHeaderBuilder.strings || {};
			var hint = HeaderBuilderLite.escapeAttr(s.zoneControlsProHint || s.lockProFeature || '');
			var hideLabel = HeaderBuilderLite.escapeAttr(s.zoneHideZone || '');
			var hTitle = HeaderBuilderLite.escapeAttr(s.zoneHorizontal || '');
			var vTitle = HeaderBuilderLite.escapeAttr(s.zoneVertical || '');
			var lTitle = HeaderBuilderLite.escapeAttr(s.zoneAlignLeft || '');
			var cTitle = HeaderBuilderLite.escapeAttr(s.zoneAlignCenter || '');
			var rTitle = HeaderBuilderLite.escapeAttr(s.zoneAlignRight || '');
			var proBadge = HeaderBuilderLite.escapeAttr(s.zoneProBadge || 'Pro');
			return '' +
				'<div class="ihb-zone-header">' +
				'  <div class="ihb-zone-label">' + zoneLabel + '</div>' +
				'  <div class="ihb-zone-controls ihb-zone-controls--pro-locked" aria-disabled="true" title="' + hint + '" aria-label="' + hint + '">' +
				'    <div class="ihb-zone-controls-toolbar">' +
				'      <div class="ihb-zone-segment ihb-zone-segment--hide">' +
				'        <button type="button" class="ihb-zone-hide-btn" disabled tabindex="-1" title="' + hideLabel + '" aria-label="' + hideLabel + '">' +
				'          <span class="dashicons dashicons-hidden" aria-hidden="true"></span>' +
				'        </button>' +
				'      </div>' +
				'      <div class="ihb-zone-segment ihb-zone-segment--axis">' +
				'        <button type="button" class="ihb-zone-axis-btn ihb-zone-axis-horizontal" disabled tabindex="-1" aria-label="' + hTitle + '">' +
				'          <svg aria-hidden="true" focusable="false" fill="none" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M12.0519 14.8285L13.4661 16.2427L17.7087 12L13.4661 7.7574L12.0519 9.17161L13.8803 11H6.34318V13H13.8803L12.0519 14.8285Z" fill="currentColor"></path><path clip-rule="evenodd" d="M1 19C1 21.2091 2.79086 23 5 23H19C21.2091 23 23 21.2091 23 19V5C23 2.79086 21.2091 1 19 1H5C2.79086 1 1 2.79086 1 5V19ZM5 21H19C20.1046 21 21 20.1046 21 19V5C21 3.89543 20.1046 3 19 3H5C3.89543 3 3 3.89543 3 5V19C3 20.1046 3.89543 21 5 21Z" fill="currentColor" fill-rule="evenodd"></path></svg>' +
				'        </button>' +
				'        <button type="button" class="ihb-zone-axis-btn ihb-zone-axis-vertical" disabled tabindex="-1" aria-label="' + vTitle + '">' +
				'          <svg aria-hidden="true" focusable="false" fill="none" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M14.8284 12.0259L16.2426 13.4402L12 17.6828L7.75733 13.4402L9.17155 12.0259L11 13.8544V6.31724H13V13.8544L14.8284 12.0259Z" fill="currentColor"></path><path clip-rule="evenodd" d="M1 5C1 2.79086 2.79086 1 5 1H19C21.2091 1 23 2.79086 23 5V19C23 21.2091 21.2091 23 19 23H5C2.79086 23 1 21.2091 1 19V5ZM5 3H19C20.1046 3 21 3.89543 21 5V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19V5C3 3.89543 3.89543 3 5 3Z" fill="currentColor" fill-rule="evenodd"></path></svg>' +
				'        </button>' +
				'      </div>' +
				'      <div class="ihb-zone-segment ihb-zone-segment--align">' +
				'        <button type="button" class="ihb-zone-align-btn" disabled tabindex="-1" aria-label="' + lTitle + '">' +
				'          <span class="dashicons dashicons-editor-alignleft" aria-hidden="true"></span>' +
				'        </button>' +
				'        <button type="button" class="ihb-zone-align-btn ihb-zone-align-btn--active" disabled tabindex="-1" aria-pressed="true" aria-label="' + cTitle + '">' +
				'          <span class="dashicons dashicons-editor-aligncenter" aria-hidden="true"></span>' +
				'        </button>' +
				'        <button type="button" class="ihb-zone-align-btn" disabled tabindex="-1" aria-label="' + rTitle + '">' +
				'          <span class="dashicons dashicons-editor-alignright" aria-hidden="true"></span>' +
				'        </button>' +
				'      </div>' +
				'      <div class="ihb-zone-pro-lock">' +
				'        <span class="dashicons dashicons-lock ihb-zone-pro-lock-icon" aria-hidden="true"></span>' +
				'        <span class="ihb-zone-pro-badge">' + proBadge + '</span>' +
				'      </div>' +
				'    </div>' +
				'  </div>' +
				'</div>';
		},

		mountUI: function () {
			if ($('#inspiro-lite-header-builder-ui').length) {
				return;
			}

			var html = '' +
				'<div id="inspiro-lite-header-builder-ui" class="inspiro-lite-header-builder-ui ihb-lite-panel">' +
				'  <div class="ihb-lite-panel-header">' +
				'    <h4>' + inspiroLiteHeaderBuilder.strings.builderTitle + '</h4>' +
				'    <div class="ihb-row-switcher ihb-row-switcher-lite" role="group" aria-label="' + HeaderBuilderLite.escapeAttr(inspiroLiteHeaderBuilder.strings.builderTitle) + '">' +
				'      <button type="button" class="ihb-row-switcher-btn ihb-row-switcher-btn-topbar" disabled aria-disabled="true" title="' + HeaderBuilderLite.escapeAttr(inspiroLiteHeaderBuilder.strings.topBarProHint || inspiroLiteHeaderBuilder.strings.lockProFeature || '') + '">' +
				'        <span class="ihb-row-switcher-label">' + HeaderBuilderLite.escapeAttr(inspiroLiteHeaderBuilder.strings.topBar || 'Top Bar') + '</span>' +
				'        <span class="ihb-row-switcher-lock" aria-hidden="true">' +
				'          <svg class="ihb-row-switcher-lock-svg" width="12" height="12" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7 11V7a5 5 0 0 1 10 0v4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path><rect x="3" y="11" width="18" height="11" rx="2" ry="2" stroke="currentColor" stroke-width="2" fill="none"></rect></svg>' +
				'        </span>' +
				'      </button>' +
				'      <button type="button" class="ihb-row-switcher-btn ihb-row-switcher-btn-main active" aria-pressed="true" tabindex="-1">' +
				'        <span class="ihb-row-switcher-label">' + HeaderBuilderLite.escapeAttr(inspiroLiteHeaderBuilder.strings.mainRow || 'Main Row') + '</span>' +
				'      </button>' +
				'    </div>' +
				'    <button type="button" class="ihb-colors-link" title="' + inspiroLiteHeaderBuilder.strings.colorsLinkTitle + '" aria-label="' + inspiroLiteHeaderBuilder.strings.colorsLinkAria + '">' +
				'      <span class="dashicons dashicons-admin-appearance" aria-hidden="true"></span>' +
				'      <span class="ihb-toolbar-label">' + (inspiroLiteHeaderBuilder.strings.colorsLinkLabel || 'Colors') + '</span>' +
				'    </button>' +
				'    <button type="button" class="ihb-open-header-columns" title="' + inspiroLiteHeaderBuilder.strings.columnsLinkTitle + '" aria-label="' + inspiroLiteHeaderBuilder.strings.columnsLinkAria + '">' +
				'      <span class="dashicons dashicons-schedule" aria-hidden="true"></span>' +
				'      <span class="ihb-toolbar-label">' + (inspiroLiteHeaderBuilder.strings.columnsLinkLabel || 'Columns') + '</span>' +
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
				HeaderBuilderLite.buildZoneHeaderHtml(inspiroLiteHeaderBuilder.strings.leftZone) +
				'          <ul class="ihb-zone-items" data-zone="left"></ul>' +
				'        </div>' +
				'        <div class="ihb-lite-zone-wrap">' +
				HeaderBuilderLite.buildZoneHeaderHtml(inspiroLiteHeaderBuilder.strings.centerZone) +
				'          <ul class="ihb-zone-items" data-zone="center"></ul>' +
				'        </div>' +
				'        <div class="ihb-lite-zone-wrap">' +
				HeaderBuilderLite.buildZoneHeaderHtml(inspiroLiteHeaderBuilder.strings.rightZone) +
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

			$('#inspiro-lite-header-builder-ui').on('click', '.ihb-open-header-columns', function (e) {
				e.preventDefault();
				try {
					var headerSection = wp.customize.section('header-area');
					if (headerSection && typeof headerSection.focus === 'function') {
						headerSection.focus({
							completeCallback: HeaderBuilderLite.afterFocusLayout
						});
					}

					window.setTimeout(function () {
						var $accordion = $('#customize-control-header_rows_layout_accordion');
						if ($accordion.length && !$accordion.hasClass('expanded')) {
							$accordion.find('.inspiro-accordion-header-ui').trigger('click');
						}
					}, 120);
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
			if ($('#inspiro-header-builder-toggle').length) {
				return;
			}

			var buttonHTML = '' +
				'<div id="inspiro-header-builder-toggle" class="inspiro-builder-toggle inspiro-builder-toggle-header">' +
				'  <button type="button" class="inspiro-builder-toggle-btn inspiro-header-builder-toggle-btn" title="' + inspiroLiteHeaderBuilder.strings.openBuilder + '">' +
				'    <span class="dashicons dashicons-admin-customizer"></span>' +
				'    <span class="inspiro-builder-toggle-text">' + inspiroLiteHeaderBuilder.strings.builderTitle + '</span>' +
				'  </button>' +
				'</div>';

			$('body').append(buttonHTML);

			$(document).on('click', '.inspiro-header-builder-toggle-btn', function (e) {
				e.preventDefault();
				HeaderBuilderLite.showBuilder();
			});
		},

		showBuilder: function () {
			this.isVisible = true;
			$('#inspiro-lite-header-builder-ui').addClass('ihb-visible');
			$('#inspiro-header-builder-toggle').hide();
			$('#inspiro-footer-builder-toggle').hide();
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
			if (wp.customize('inspiro_header_builder_enable')() && !HeaderBuilderLite.isFooterBuilderVisible()) {
				$('#inspiro-header-builder-toggle').show();
			}
			if (wp.customize('inspiro_footer_builder_enable') && wp.customize('inspiro_footer_builder_enable')() && !$('#inspiro-lite-footer-builder-ui').hasClass('ifb-visible')) {
				$('#inspiro-footer-builder-toggle').show();
			}
		},

		bindEnableToggle: function () {
			wp.customize('inspiro_header_builder_enable', function (value) {
				var $ui = $('#inspiro-lite-header-builder-ui');
				if (!$ui.length) {
					return;
				}

				var applyEnableState = function (rawValue) {
					var visible = HeaderBuilderLite.isEnabledValue(rawValue);
					HeaderBuilderLite.toggleHeaderLayoutDropdown(visible);
					if (visible) {
						HeaderBuilderLite.hideBuilder();
						if (!HeaderBuilderLite.isFooterBuilderVisible()) {
							$('#inspiro-header-builder-toggle').show();
						}
					} else {
						HeaderBuilderLite.hideBuilder();
						$('#inspiro-header-builder-toggle').hide();
					}
				};

				// Initial state.
				applyEnableState(value.get());

				// Live updates while checkbox is toggled.
				value.bind(function (newValue) {
					applyEnableState(newValue);
				});
			});

			var enabled = this.isEnabledValue(wp.customize('inspiro_header_builder_enable')());
			this.toggleHeaderLayoutDropdown(enabled);
			if (enabled) {
				this.hideBuilder();
				if (!HeaderBuilderLite.isFooterBuilderVisible()) {
					$('#inspiro-header-builder-toggle').show();
				}
			} else {
				this.hideBuilder();
				$('#inspiro-header-builder-toggle').hide();
			}
		},

		isFooterBuilderVisible: function () {
			return $('#inspiro-lite-footer-builder-ui').hasClass('ifb-visible');
		},

		/**
		 * Normalize customize checkbox value to strict boolean.
		 *
		 * @param {*} value Checkbox setting value.
		 * @return {boolean}
		 */
		isEnabledValue: function (value) {
			return value === true || value === 1 || value === '1';
		},

		/**
		 * Hide "Header Layout" dropdown group while Lite header builder is enabled.
		 *
		 * @param {boolean} enabled True when header builder is enabled.
		 */
		toggleHeaderLayoutDropdown: function (enabled) {
			var method = enabled ? 'hide' : 'show';
			$('#customize-control-for-predefined-layout')[method]();
			$('#customize-control-header-menu-style')[method]();
			$('#customize-control-header-menu-pro-style')[method]();
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
