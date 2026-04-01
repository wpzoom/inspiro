(function ($) {
	'use strict';

	var FooterBuilderLite = {
		currentDevice: 'desktop',
		currentRow: 'main',
		isVisible: false,

		init: function () {
			if (typeof wp === 'undefined' || !wp.customize || typeof inspiroLiteFooterBuilder === 'undefined') {
				return;
			}

			wp.customize.bind('ready', function () {
				FooterBuilderLite.mountUI();
				FooterBuilderLite.bindEnableToggle();
			});
		},

		mountUI: function () {
			if ($('#inspiro-lite-footer-builder-ui').length) {
				return;
			}

			var s = inspiroLiteFooterBuilder.strings || {};
			var html = '' +
				'<div id="inspiro-lite-footer-builder-ui" class="ifb-lite-panel">' +
				'  <div class="ifb-lite-panel-header">' +
				'    <h4>' + (s.builderTitle || 'Footer Builder (Lite)') + '</h4>' +
				'    <div class="ifb-row-switcher">' +
				'      <button type="button" class="ifb-row-btn ifb-row-btn-locked" data-row="top" disabled title="' + FooterBuilderLite.escapeAttr(s.lockedRowHint || s.lockProFeature || '') + '">' +
				'        <span class="ifb-row-switcher-label">' + FooterBuilderLite.escapeAttr(s.topRow || 'Top Row') + '</span>' +
				'        <span class="ifb-row-switcher-lock" aria-hidden="true">' +
				'          <svg class="ifb-row-switcher-lock-svg" width="12" height="12" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7 11V7a5 5 0 0 1 10 0v4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path><rect x="3" y="11" width="18" height="11" rx="2" ry="2" stroke="currentColor" stroke-width="2" fill="none"></rect></svg>' +
				'        </span>' +
				'      </button>' +
				'      <button type="button" class="ifb-row-btn is-active" data-row="main"><span class="ifb-row-switcher-label">' + FooterBuilderLite.escapeAttr(s.mainRow || 'Main Row') + '</span></button>' +
				'      <button type="button" class="ifb-row-btn" data-row="bottom"><span class="ifb-row-switcher-label">' + FooterBuilderLite.escapeAttr(s.bottomRow || 'Bottom Row') + '</span></button>' +
				'    </div>' +
				'    <div class="ifb-header-actions">' +
				'      <button type="button" class="ifb-open-footer-colors"><span class="dashicons dashicons-admin-appearance"></span><span>' + FooterBuilderLite.escapeAttr(s.colorsLinkLabel || 'Colors') + '</span></button>' +
				'      <button type="button" class="ifb-open-footer-layout"><span class="dashicons dashicons-schedule"></span><span>' + FooterBuilderLite.escapeAttr(s.columnsLinkLabel || s.layoutLinkLabel || 'Columns') + '</span></button>' +
				'      <div class="ifb-device-switcher">' +
				'        <button type="button" class="ifb-device-btn is-active" data-device="desktop" title="' + FooterBuilderLite.escapeAttr(s.desktop || 'Desktop') + '"><span class="dashicons dashicons-desktop"></span></button>' +
				'        <button type="button" class="ifb-device-btn" data-device="tablet" title="' + FooterBuilderLite.escapeAttr(s.tablet || 'Tablet') + '"><span class="dashicons dashicons-tablet"></span></button>' +
				'        <button type="button" class="ifb-device-btn" data-device="mobile" title="' + FooterBuilderLite.escapeAttr(s.mobile || 'Mobile') + '"><span class="dashicons dashicons-smartphone"></span></button>' +
				'      </div>' +
				'      <button type="button" class="ifb-hide-builder"><span class="dashicons dashicons-arrow-down-alt2"></span></button>' +
				'    </div>' +
				'  </div>' +
				'  <div class="ifb-lite-panel-body">' +
				'    <div class="ifb-zones">' +
				'      <div class="ifb-zone-wrap"><div class="ifb-zone-label">' + FooterBuilderLite.escapeAttr(s.leftZone || 'Left') + '</div><ul class="ifb-zone-items" data-zone="left"></ul></div>' +
				'      <div class="ifb-zone-wrap"><div class="ifb-zone-label">' + FooterBuilderLite.escapeAttr(s.centerZone || 'Center') + '</div><ul class="ifb-zone-items" data-zone="center"></ul></div>' +
				'      <div class="ifb-zone-wrap"><div class="ifb-zone-label">' + FooterBuilderLite.escapeAttr(s.rightZone || 'Right') + '</div><ul class="ifb-zone-items" data-zone="right"></ul></div>' +
				'    </div>' +
				'    <div class="ifb-available"><strong>' + FooterBuilderLite.escapeAttr(s.availableComponents || 'Available Components') + '</strong><ul class="ifb-components-list"></ul></div>' +
				'  </div>' +
				'</div>' +
				'<div id="inspiro-footer-builder-toggle" class="inspiro-builder-toggle inspiro-builder-toggle-footer"><button type="button" class="inspiro-builder-toggle-btn inspiro-footer-builder-toggle-btn"><span class="dashicons dashicons-layout"></span><span class="inspiro-builder-toggle-text">' + FooterBuilderLite.escapeAttr(s.openBuilder || 'Open Footer Builder') + '</span></button></div>';

			$('.wp-full-overlay').append(html);
			FooterBuilderLite.bindEvents();
			FooterBuilderLite.initSortable();
			FooterBuilderLite.renderFromSetting();
		},

		bindEvents: function () {
			$(document).on('click', '.inspiro-footer-builder-toggle-btn', function (e) {
				e.preventDefault();
				FooterBuilderLite.showBuilder();
			});

			$(document).on('click', '#inspiro-lite-footer-builder-ui .ifb-hide-builder', function () {
				FooterBuilderLite.hideBuilder();
			});

			$(document).on('click', '#inspiro-lite-footer-builder-ui .ifb-device-btn', function () {
				var device = $(this).data('device');
				FooterBuilderLite.currentDevice = device;
				$('#inspiro-lite-footer-builder-ui .ifb-device-btn').removeClass('is-active');
				$(this).addClass('is-active');
				if (wp.customize.previewedDevice) {
					wp.customize.previewedDevice.set(device);
				}
				FooterBuilderLite.renderFromSetting();
			});

			$(document).on('click', '#inspiro-lite-footer-builder-ui .ifb-row-btn:not(.ifb-row-btn-locked)', function () {
				var row = $(this).data('row');
				if (!row || row === 'top') {
					return;
				}
				FooterBuilderLite.currentRow = row;
				$('#inspiro-lite-footer-builder-ui .ifb-row-btn').removeClass('is-active');
				$(this).addClass('is-active');
				FooterBuilderLite.renderFromSetting();
			});

			$(document).on('click', '#inspiro-lite-footer-builder-ui .ifb-open-footer-colors', function (e) {
				e.preventDefault();
				var section = wp.customize.section('colors');
				if (section && typeof section.focus === 'function') {
					section.focus();
				}
			});

			$(document).on('click', '#inspiro-lite-footer-builder-ui .ifb-open-footer-layout', function (e) {
				e.preventDefault();
				var section = wp.customize.section('footer-area');
				if (section && typeof section.focus === 'function') {
					section.focus();
				}
			});

			$(document).on('click', '#inspiro-lite-footer-builder-ui .ifb-remove-component', function (e) {
				e.preventDefault();
				$(this).closest('li').remove();
				FooterBuilderLite.saveLayout();
				FooterBuilderLite.renderFromSetting();
			});

			if (wp.customize.previewedDevice) {
				wp.customize.previewedDevice.bind(function (device) {
					FooterBuilderLite.currentDevice = device;
					$('#inspiro-lite-footer-builder-ui .ifb-device-btn').removeClass('is-active');
					$('#inspiro-lite-footer-builder-ui .ifb-device-btn[data-device="' + device + '"]').addClass('is-active');
					FooterBuilderLite.renderFromSetting();
				});
			}
		},

		initSortable: function () {
			$('.ifb-zone-items, .ifb-components-list').sortable({
				connectWith: '.ifb-zone-items, .ifb-components-list',
				items: '> li:not(.ifb-component-locked)',
				placeholder: 'ifb-placeholder',
				stop: function () {
					FooterBuilderLite.normalizeItemsAfterDrag();
					FooterBuilderLite.saveLayout();
					FooterBuilderLite.renderFromSetting();
				}
			}).disableSelection();
		},

		normalizeItemsAfterDrag: function () {
			$('.ifb-zone-items li').each(function () {
				var id = $(this).data('componentId');
				var html = FooterBuilderLite.componentHTML(id, true);
				if (html) {
					$(this).replaceWith(html);
				}
			});
			$('.ifb-components-list li').each(function () {
				var id = $(this).data('componentId');
				var component = FooterBuilderLite.getComponentById(id);
				if (!component) {
					return;
				}
				if (component.locked) {
					$(this).replaceWith(FooterBuilderLite.lockedComponentHTML(component));
				} else {
					$(this).replaceWith(FooterBuilderLite.componentHTML(id, false));
				}
			});
		},

		getLayout: function () {
			var raw = wp.customize('inspiro_footer_builder_settings')();
			if (!raw) {
				return $.extend(true, {}, inspiroLiteFooterBuilder.defaults);
			}
			if (typeof raw === 'string') {
				try {
					return JSON.parse(raw);
				} catch (err) {
					return $.extend(true, {}, inspiroLiteFooterBuilder.defaults);
				}
			}
			return raw;
		},

		saveLayout: function () {
			var layout = FooterBuilderLite.getLayout();
			var row = FooterBuilderLite.currentRow;
			var device = FooterBuilderLite.currentDevice;

			if (!layout[device]) {
				layout[device] = {};
			}
			if (!layout[device][row]) {
				layout[device][row] = { left: [], center: [], right: [] };
			}

			['left', 'center', 'right'].forEach(function (zone) {
				var ids = [];
				$('.ifb-zone-items[data-zone="' + zone + '"] li').each(function () {
					if ($(this).hasClass('ifb-component-locked')) {
						return;
					}
					var id = $(this).data('componentId');
					if (id) {
						ids.push(id);
					}
				});
				layout[device][row][zone] = ids;
			});

			wp.customize('inspiro_footer_builder_settings').set(JSON.stringify(layout));
		},

		renderFromSetting: function () {
			var layout = FooterBuilderLite.getLayout();
			var row = FooterBuilderLite.currentRow;
			var device = FooterBuilderLite.currentDevice;
			var rowData = (((layout || {})[device] || {})[row]) || { left: [], center: [], right: [] };
			var used = [];

			['left', 'center', 'right'].forEach(function (zone) {
				var $zone = $('.ifb-zone-items[data-zone="' + zone + '"]');
				$zone.empty();
				(rowData[zone] || []).forEach(function (id) {
					var html = FooterBuilderLite.componentHTML(id, true);
					if (html) {
						$zone.append(html);
						used.push(id);
					}
				});
			});

			var $list = $('.ifb-components-list');
			$list.empty();
			(inspiroLiteFooterBuilder.components || []).forEach(function (component) {
				if (!component.locked && used.indexOf(component.id) === -1) {
					$list.append(FooterBuilderLite.componentHTML(component.id, false));
				}
			});
			(inspiroLiteFooterBuilder.components || []).forEach(function (component) {
				if (component.locked) {
					$list.append(FooterBuilderLite.lockedComponentHTML(component));
				}
			});
		},

		getComponentById: function (id) {
			var list = inspiroLiteFooterBuilder.components || [];
			for (var i = 0; i < list.length; i++) {
				if (list[i].id === id) {
					return list[i];
				}
			}
			return null;
		},

		componentHTML: function (componentId, inZone) {
			var component = FooterBuilderLite.getComponentById(componentId);
			if (!component || component.locked) {
				return '';
			}
			var actions = inZone
				? '<button type="button" class="ifb-remove-component" title="' + FooterBuilderLite.escapeAttr(inspiroLiteFooterBuilder.strings.remove || 'Remove') + '"><span class="dashicons dashicons-no-alt"></span></button>'
				: '';
			var cls = inZone ? 'ifb-component-item ifb-zone-component' : 'ifb-component-item';

			return '<li class="' + cls + '" data-component-id="' + component.id + '">' +
				'<span class="dashicons ' + component.icon + '"></span>' +
				'<span class="ifb-component-label">' + component.label + '</span>' +
				actions +
				'</li>';
		},

		lockedComponentHTML: function (component) {
			return '<li class="ifb-component-item ifb-component-locked" data-component-id="' + component.id + '">' +
				'<span class="dashicons ' + component.icon + '"></span>' +
				'<span class="ifb-component-label">' + component.label + '</span>' +
				'<a href="' + (inspiroLiteFooterBuilder.proUrl || '#') + '" target="_blank" rel="noopener noreferrer">' + FooterBuilderLite.escapeAttr(inspiroLiteFooterBuilder.strings.upgrade || 'Upgrade') + '</a>' +
				'</li>';
		},

		showBuilder: function () {
			this.isVisible = true;
			$('#inspiro-lite-footer-builder-ui').addClass('ifb-visible');
			$('#inspiro-footer-builder-toggle').hide();
			$('#inspiro-header-builder-toggle').hide();
			$('body').addClass('ifb-lite-builder-active');
		},

		hideBuilder: function () {
			this.isVisible = false;
			$('#inspiro-lite-footer-builder-ui').removeClass('ifb-visible');
			$('body').removeClass('ifb-lite-builder-active');
			if (FooterBuilderLite.isEnabledValue(wp.customize('inspiro_footer_builder_enable')())) {
				$('#inspiro-footer-builder-toggle').show();
			}
			if (wp.customize('inspiro_header_builder_enable') && FooterBuilderLite.isEnabledValue(wp.customize('inspiro_header_builder_enable')()) && !$('#inspiro-lite-header-builder-ui').hasClass('ihb-visible')) {
				$('#inspiro-header-builder-toggle').show();
			}
		},

		bindEnableToggle: function () {
			var syncToggleOffsetWithHeaderBuilder = function () {
				var enabled = false;
				if (wp.customize && wp.customize('inspiro_header_builder_enable')) {
					enabled = FooterBuilderLite.isEnabledValue(wp.customize('inspiro_header_builder_enable')());
				}
				$('#inspiro-footer-builder-toggle').toggleClass('has-header-builder', enabled);
			};

			wp.customize('inspiro_footer_builder_enable', function (value) {
				var applyState = function (raw) {
					var enabled = FooterBuilderLite.isEnabledValue(raw);
					FooterBuilderLite.toggleLegacyFooterControls(enabled);
					FooterBuilderLite.hideBuilder();
					$('#inspiro-footer-builder-toggle')[enabled ? 'show' : 'hide']();
					syncToggleOffsetWithHeaderBuilder();
				};
				applyState(value.get());
				value.bind(applyState);
			});

			var enabled = this.isEnabledValue(wp.customize('inspiro_footer_builder_enable')());
			this.toggleLegacyFooterControls(enabled);
			$('#inspiro-footer-builder-toggle')[enabled ? 'show' : 'hide']();
			syncToggleOffsetWithHeaderBuilder();

			if (wp.customize && wp.customize('inspiro_header_builder_enable')) {
				wp.customize('inspiro_header_builder_enable', function (headerValue) {
					headerValue.bind(function () {
						syncToggleOffsetWithHeaderBuilder();
					});
				});
			}
		},

		toggleLegacyFooterControls: function (enabled) {
			var method = enabled ? 'hide' : 'show';
			$('#customize-control-for_footer_widget_areas')[method]();
			$('#customize-control-footer-widget-areas')[method]();
			$('#customize-control-footer-pro-styles')[method]();
			$('#customize-control-footer_builder_upgrade')[method]();
		},

		isEnabledValue: function (value) {
			return value === true || value === 1 || value === '1';
		},

		escapeAttr: function (str) {
			return String(str || '').replace(/&/g, '&amp;').replace(/"/g, '&quot;').replace(/</g, '&lt;');
		}
	};

	FooterBuilderLite.init();
})(jQuery);
