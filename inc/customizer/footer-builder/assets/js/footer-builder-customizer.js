(function ($) {
	'use strict';

	var FooterBuilderLite = {
		currentDevice: 'desktop',
		currentRow: 'main',
		isVisible: false,

		afterFocusLayout: function () {
			window.setTimeout(function () {
				$(window).trigger('resize');
			}, 100);
		},

		/**
		 * @param {Object} target From inspiroLiteFooterBuilder.editTargets[ componentId ]: type, id, optional fallback_section, fallback_panel.
		 */
		focusCustomizerTarget: function (target) {
			if (!target || !target.type || !target.id) {
				return;
			}
			var after = FooterBuilderLite.afterFocusLayout;
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
			if (typeof wp === 'undefined' || !wp.customize || typeof inspiroLiteFooterBuilder === 'undefined') {
				return;
			}

			wp.customize.bind('ready', function () {
				FooterBuilderLite.mountUI();
				FooterBuilderLite.bindEnableToggle();
			});
		},

		buildZoneHeaderHtml: function (zoneLabel) {
			var s = inspiroLiteFooterBuilder.strings || {};
			var hint = FooterBuilderLite.escapeAttr(s.zoneControlsProHint || s.lockProFeature || '');
			var hideLabel = FooterBuilderLite.escapeAttr(s.zoneHideZone || '');
			var hTitle = FooterBuilderLite.escapeAttr(s.zoneHorizontal || '');
			var vTitle = FooterBuilderLite.escapeAttr(s.zoneVertical || '');
			var lTitle = FooterBuilderLite.escapeAttr(s.zoneAlignLeft || '');
			var cTitle = FooterBuilderLite.escapeAttr(s.zoneAlignCenter || '');
			var rTitle = FooterBuilderLite.escapeAttr(s.zoneAlignRight || '');
			var proBadge = FooterBuilderLite.escapeAttr(s.zoneProBadge || 'Pro');
			return '' +
				'<div class="ifb-zone-header">' +
				'  <div class="ifb-zone-label">' + zoneLabel + '</div>' +
				'  <div class="ifb-zone-controls ifb-zone-controls--pro-locked" aria-disabled="true" title="' + hint + '" aria-label="' + hint + '">' +
				'    <div class="ifb-zone-controls-toolbar">' +
				'      <div class="ifb-zone-segment ifb-zone-segment--hide">' +
				'        <button type="button" class="ifb-zone-hide-btn" disabled tabindex="-1" title="' + hideLabel + '" aria-label="' + hideLabel + '">' +
				'          <span class="dashicons dashicons-hidden" aria-hidden="true"></span>' +
				'        </button>' +
				'      </div>' +
				'      <div class="ifb-zone-segment ifb-zone-segment--axis">' +
				'        <button type="button" class="ifb-zone-axis-btn ifb-zone-axis-horizontal" disabled tabindex="-1" aria-label="' + hTitle + '">' +
				'          <svg aria-hidden="true" focusable="false" fill="none" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M12.0519 14.8285L13.4661 16.2427L17.7087 12L13.4661 7.7574L12.0519 9.17161L13.8803 11H6.34318V13H13.8803L12.0519 14.8285Z" fill="currentColor"></path><path clip-rule="evenodd" d="M1 19C1 21.2091 2.79086 23 5 23H19C21.2091 23 23 21.2091 23 19V5C23 2.79086 21.2091 1 19 1H5C2.79086 1 1 2.79086 1 5V19ZM5 21H19C20.1046 21 21 20.1046 21 19V5C21 3.89543 20.1046 3 19 3H5C3.89543 3 3 3.89543 3 5V19C3 20.1046 3.89543 21 5 21Z" fill="currentColor" fill-rule="evenodd"></path></svg>' +
				'        </button>' +
				'        <button type="button" class="ifb-zone-axis-btn ifb-zone-axis-vertical" disabled tabindex="-1" aria-label="' + vTitle + '">' +
				'          <svg aria-hidden="true" focusable="false" fill="none" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M14.8284 12.0259L16.2426 13.4402L12 17.6828L7.75733 13.4402L9.17155 12.0259L11 13.8544V6.31724H13V13.8544L14.8284 12.0259Z" fill="currentColor"></path><path clip-rule="evenodd" d="M1 5C1 2.79086 2.79086 1 5 1H19C21.2091 1 23 2.79086 23 5V19C23 21.2091 21.2091 23 19 23H5C2.79086 23 1 21.2091 1 19V5ZM5 3H19C20.1046 3 21 3.89543 21 5V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19V5C3 3.89543 3.89543 3 5 3Z" fill="currentColor" fill-rule="evenodd"></path></svg>' +
				'        </button>' +
				'      </div>' +
				'      <div class="ifb-zone-segment ifb-zone-segment--align">' +
				'        <button type="button" class="ifb-zone-align-btn" disabled tabindex="-1" aria-label="' + lTitle + '">' +
				'          <span class="dashicons dashicons-editor-alignleft" aria-hidden="true"></span>' +
				'        </button>' +
				'        <button type="button" class="ifb-zone-align-btn ifb-zone-align-btn--active" disabled tabindex="-1" aria-pressed="true" aria-label="' + cTitle + '">' +
				'          <span class="dashicons dashicons-editor-aligncenter" aria-hidden="true"></span>' +
				'        </button>' +
				'        <button type="button" class="ifb-zone-align-btn" disabled tabindex="-1" aria-label="' + rTitle + '">' +
				'          <span class="dashicons dashicons-editor-alignright" aria-hidden="true"></span>' +
				'        </button>' +
				'      </div>' +
				'      <div class="ifb-zone-pro-lock">' +
				'        <span class="dashicons dashicons-lock ifb-zone-pro-lock-icon" aria-hidden="true"></span>' +
				'        <span class="ifb-zone-pro-badge">' + proBadge + '</span>' +
				'      </div>' +
				'    </div>' +
				'  </div>' +
				'</div>';
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
				'      <div class="ifb-zone-wrap">' + FooterBuilderLite.buildZoneHeaderHtml(FooterBuilderLite.escapeAttr(s.leftZone || 'Left')) + '<ul class="ifb-zone-items" data-zone="left"></ul></div>' +
				'      <div class="ifb-zone-wrap ifb-zone-wrap--center">' + FooterBuilderLite.buildZoneHeaderHtml(FooterBuilderLite.escapeAttr(s.centerZone || 'Center')) + '<ul class="ifb-zone-items" data-zone="center"></ul></div>' +
				'      <div class="ifb-zone-wrap">' + FooterBuilderLite.buildZoneHeaderHtml(FooterBuilderLite.escapeAttr(s.rightZone || 'Right')) + '<ul class="ifb-zone-items" data-zone="right"></ul></div>' +
				'    </div>' +
				'    <div class="ifb-available"><strong>' + FooterBuilderLite.escapeAttr(s.availableComponents || 'Available Components') + '</strong><ul class="ifb-components-list"></ul></div>' +
				'  </div>' +
				'</div>' +
				'<div id="inspiro-footer-builder-toggle" class="inspiro-builder-toggle inspiro-builder-toggle-footer"><button type="button" class="inspiro-builder-toggle-btn inspiro-footer-builder-toggle-btn"><span class="dashicons dashicons-layout"></span><span class="inspiro-builder-toggle-text">' + FooterBuilderLite.escapeAttr(s.openBuilder || 'Open Footer Builder') + '</span></button></div>';

			$('.wp-full-overlay').append(html);
			FooterBuilderLite.bindEvents();
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
				window.setTimeout(function () {
					var $accordion = $('#customize-control-footer_rows_layout_accordion');
					if ($accordion.length && !$accordion.hasClass('expanded')) {
						$accordion.find('.inspiro-accordion-header-ui').trigger('click');
					}
				}, 120);
			});

			$(document).on('click', '#inspiro-lite-footer-builder-ui .ifb-component-edit', function (e) {
				e.preventDefault();
				e.stopPropagation();
				var $li = $(this).closest('li');
				var componentId = $li.data('componentId');
				if (!componentId || !inspiroLiteFooterBuilder.editTargets) {
					return;
				}
				var target = inspiroLiteFooterBuilder.editTargets[componentId];
				if (!target) {
					return;
				}
				FooterBuilderLite.focusCustomizerTarget(target);
			});

			$(document).on('click', '#inspiro-lite-footer-builder-ui .ifb-remove-component', function (e) {
				e.preventDefault();
				e.stopPropagation();
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

		/**
		 * Zones editable for the current row (bottom row: left + right only).
		 */
		zonesForCurrentRow: function () {
			return FooterBuilderLite.currentRow === 'bottom' ? ['left', 'right'] : ['left', 'center', 'right'];
		},

		mergeDedupeIds: function (primary, extra) {
			var seen = {};
			var out = [];
			(primary || []).concat(extra || []).forEach(function (id) {
				if (!id || seen[id]) {
					return;
				}
				seen[id] = true;
				out.push(id);
			});
			return out;
		},

		updateZoneColumnsForRow: function () {
			var two = FooterBuilderLite.currentRow === 'bottom';
			$('#inspiro-lite-footer-builder-ui .ifb-zones').toggleClass('ifb-zones--bottom-two', two);
		},

		destroySortable: function () {
			$('#inspiro-lite-footer-builder-ui').find('.ifb-zone-items, .ifb-components-list').each(function () {
				var $el = $(this);
				if ($el.data('ui-sortable')) {
					$el.sortable('destroy');
				}
			});
		},

		initSortable: function () {
			var $root = $('#inspiro-lite-footer-builder-ui');
			$root.find('.ifb-sortable-target').removeClass('ifb-sortable-target');
			var $zones = $root.find('.ifb-zone-items').filter(':visible').addClass('ifb-sortable-target');
			var $connect = $zones.add($root.find('.ifb-components-list').addClass('ifb-sortable-target'));
			if (!$connect.length) {
				return;
			}
			var connectSel = '#inspiro-lite-footer-builder-ui .ifb-sortable-target';
			$connect.sortable({
				connectWith: connectSel,
				items: '> li:not(.ifb-component-locked)',
				placeholder: 'ifb-placeholder',
				receive: function (event, ui) {
					if ($(this).is('.ifb-components-list') && ui.item.hasClass('ifb-component-pinned')) {
						$(ui.sender).sortable('cancel');
					}
				},
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

		/**
		 * Ensure pinned module (custom_html) appears once per device; inject bottom/right if missing.
		 *
		 * @param {Object} layout Layout object (mutated).
		 * @return {Object} layout
		 */
		normalizePinnedLayout: function (layout) {
			var defaults = inspiroLiteFooterBuilder.defaults || {};
			var pinnedId = 'custom_html';
			['desktop', 'tablet', 'mobile'].forEach(function (device) {
				if (!layout[device] || typeof layout[device] !== 'object') {
					layout[device] = defaults[device] ? $.extend(true, {}, defaults[device]) : {};
				}
				var found = false;
				['top', 'main', 'bottom'].forEach(function (row) {
					if (!layout[device][row] || typeof layout[device][row] !== 'object') {
						return;
					}
					['left', 'center', 'right'].forEach(function (zone) {
						var ids = layout[device][row][zone];
						if (!ids || !Array.isArray(ids)) {
							return;
						}
						var next = [];
						ids.forEach(function (id) {
							if (id !== pinnedId) {
								next.push(id);
								return;
							}
							if (!found) {
								next.push(id);
								found = true;
							}
						});
						layout[device][row][zone] = next;
					});
				});
				if (!found) {
					if (!layout[device].bottom || typeof layout[device].bottom !== 'object') {
						layout[device].bottom = { left: [], center: [], right: [] };
					}
					if (!Array.isArray(layout[device].bottom.right)) {
						layout[device].bottom.right = [];
					}
					layout[device].bottom.right.push(pinnedId);
				}
			});
			return layout;
		},

		/**
		 * Collect component ids placed in any of the given rows for a device (shared pool for Available list).
		 *
		 * @param {Object} layout Full layout object.
		 * @param {string} device desktop|tablet|mobile
		 * @param {string[]} rows Row keys to scan (e.g. main, bottom).
		 * @return {string[]} Deduped component ids.
		 */
		collectUsedComponentIds: function (layout, device, rows) {
			var seen = {};
			var out = [];
			if (!layout || !layout[device] || !rows || !rows.length) {
				return out;
			}
			rows.forEach(function (rowKey) {
				var row = layout[device][rowKey];
				if (!row || typeof row !== 'object') {
					return;
				}
				['left', 'center', 'right'].forEach(function (zone) {
					var ids = row[zone];
					if (!ids || !Array.isArray(ids)) {
						return;
					}
					ids.forEach(function (id) {
						if (id && !seen[id]) {
							seen[id] = true;
							out.push(id);
						}
					});
				});
			});
			return out;
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

			FooterBuilderLite.zonesForCurrentRow().forEach(function (zone) {
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

			if (row === 'bottom') {
				layout[device][row].center = [];
			}

			FooterBuilderLite.normalizePinnedLayout(layout);
			wp.customize('inspiro_footer_builder_settings').set(JSON.stringify(layout));
		},

		renderFromSetting: function () {
			var layout = $.extend(true, {}, FooterBuilderLite.getLayout());
			layout = FooterBuilderLite.normalizePinnedLayout(layout);
			var persisted = FooterBuilderLite.getLayout();
			if (JSON.stringify(layout) !== JSON.stringify(persisted)) {
				wp.customize('inspiro_footer_builder_settings').set(JSON.stringify(layout));
			}
			var row = FooterBuilderLite.currentRow;
			var device = FooterBuilderLite.currentDevice;
			var rowData = (((layout || {})[device] || {})[row]) || { left: [], center: [], right: [] };
			if (row === 'bottom') {
				var orphanCenter = rowData.center || [];
				if (orphanCenter.length) {
					rowData = $.extend(true, {}, rowData);
					rowData.left = FooterBuilderLite.mergeDedupeIds(rowData.left || [], orphanCenter);
					rowData.center = [];
				}
			}
			var usedAcrossRows = FooterBuilderLite.collectUsedComponentIds(layout, device, ['top', 'main', 'bottom']);

			['left', 'center', 'right'].forEach(function (zone) {
				var $zone = $('.ifb-zone-items[data-zone="' + zone + '"]');
				$zone.empty();
				(rowData[zone] || []).forEach(function (id) {
					var html = FooterBuilderLite.componentHTML(id, true);
					if (html) {
						$zone.append(html);
					}
				});
			});

			FooterBuilderLite.updateZoneColumnsForRow();
			FooterBuilderLite.destroySortable();
			FooterBuilderLite.initSortable();

			var $list = $('.ifb-components-list');
			$list.empty();
			(inspiroLiteFooterBuilder.components || []).forEach(function (component) {
				if (!component.locked && !component.pinned && usedAcrossRows.indexOf(component.id) === -1) {
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

			var actionsHTML = '';
			if (inZone) {
				var editTitle = FooterBuilderLite.escapeAttr((inspiroLiteFooterBuilder.strings || {}).editComponentSettings || '');
				var showEdit = inspiroLiteFooterBuilder.editTargets && inspiroLiteFooterBuilder.editTargets[componentId];
				var actionParts = [];
				if (showEdit) {
					actionParts.push(
						'<button type="button" class="ifb-component-edit" title="' + editTitle + '" aria-label="' + editTitle + '">' +
						'<span class="dashicons dashicons-edit"></span>' +
						'</button>'
					);
				}
				if (!component.pinned) {
					actionParts.push(
						'<button type="button" class="ifb-remove-component" title="' + FooterBuilderLite.escapeAttr(inspiroLiteFooterBuilder.strings.remove || 'Remove') + '">' +
						'<span class="dashicons dashicons-no-alt"></span>' +
						'</button>'
					);
				}
				if (actionParts.length) {
					actionsHTML = '<div class="ifb-component-actions">' + actionParts.join('') + '</div>';
				}
			}

			var cls = inZone ? 'ifb-component-item ifb-zone-component' : 'ifb-component-item';
			if (inZone && component.pinned) {
				cls += ' ifb-component-pinned';
			}

			return '<li class="' + cls + '" data-component-id="' + component.id + '">' +
				'<span class="dashicons ' + component.icon + ' ifb-component-icon"></span>' +
				'<span class="ifb-component-label">' + component.label + '</span>' +
				actionsHTML +
				'</li>';
		},

		lockedComponentHTML: function (component) {
			var lockSvg = '<svg class="ifb-lock-svg" width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M7 11V7a5 5 0 0 1 10 0v4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><rect x="3" y="11" width="18" height="11" rx="2" ry="2" stroke="currentColor" stroke-width="2" fill="none"/></svg>';
			return '<li class="ifb-component-item ifb-component-locked" data-component-id="' + component.id + '">' +
				'<span class="dashicons ' + component.icon + ' ifb-component-icon"></span>' +
				'<span class="ifb-component-label">' + component.label + '</span>' +
				'<span class="ifb-lock-wrap">' + lockSvg + '</span>' +
				'<a class="ifb-pro-upgrade-link" href="' + (inspiroLiteFooterBuilder.proUrl || '#') + '" target="_blank" rel="noopener noreferrer">' + FooterBuilderLite.escapeAttr(inspiroLiteFooterBuilder.strings.upgrade || 'Upgrade') + '</a>' +
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
			if (FooterBuilderLite.isEnabledValue(wp.customize('inspiro_footer_builder_enable')()) && !FooterBuilderLite.isHeaderBuilderVisible()) {
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
					if (enabled && !FooterBuilderLite.isHeaderBuilderVisible()) {
						$('#inspiro-footer-builder-toggle').show();
					} else {
						$('#inspiro-footer-builder-toggle').hide();
					}
					syncToggleOffsetWithHeaderBuilder();
				};
				applyState(value.get());
				value.bind(applyState);
			});

			var enabled = this.isEnabledValue(wp.customize('inspiro_footer_builder_enable')());
			this.toggleLegacyFooterControls(enabled);
			if (enabled && !FooterBuilderLite.isHeaderBuilderVisible()) {
				$('#inspiro-footer-builder-toggle').show();
			} else {
				$('#inspiro-footer-builder-toggle').hide();
			}
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
		},

		isEnabledValue: function (value) {
			return value === true || value === 1 || value === '1';
		},

		isHeaderBuilderVisible: function () {
			return $('#inspiro-lite-header-builder-ui').hasClass('ihb-visible');
		},

		escapeAttr: function (str) {
			return String(str || '').replace(/&/g, '&amp;').replace(/"/g, '&quot;').replace(/</g, '&lt;');
		}
	};

	FooterBuilderLite.init();
})(jQuery);
