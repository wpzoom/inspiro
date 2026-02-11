(function (wp) {
	var registerPlugin = wp.plugins.registerPlugin;
	var PluginDocumentSettingPanel = wp.editPost.PluginDocumentSettingPanel;
	var el = wp.element.createElement;
	var PanelRow = wp.components.PanelRow;
	var ToggleControl = wp.components.ToggleControl;
	var useSelect = wp.data.useSelect;
	var useDispatch = wp.data.useDispatch;

	var InspiroPageSettings = function () {
		// Fetch the meta value
		var postMeta = useSelect(function (select) {
			return select("core/editor").getEditedPostAttribute("meta");
		});

		var editPost = useDispatch("core/editor").editPost;
		var isTitleHidden = postMeta
			? !!postMeta["inspiro_hide_title"]
			: false;

		// Apply class to the editor body so CSS can dim the title
		if (isTitleHidden) {
			document.body.classList.add("inspiro-hide-page-title");
		} else {
			document.body.classList.remove("inspiro-hide-page-title");
		}

		return el(
			PluginDocumentSettingPanel,
			{
				name: "inspiro-settings-panel",
				title: "Page Settings",
			},
			[
				el(
					PanelRow,
					{},
					el(ToggleControl, {
						label: "Hide Page Title",
						checked: isTitleHidden,
						onChange: function (value) {
							editPost({
								meta: {
									...postMeta,
									inspiro_hide_title: value,
								},
							});
						},
					}),
				),
			],
		);
	};

	registerPlugin("inspiro-sidebar-panel", {
		render: InspiroPageSettings,
	});
})(window.wp);
