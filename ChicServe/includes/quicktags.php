<?php
// ==================================================================
// Regsiter buttons
// ==================================================================
function register_button1($buttons) {
	array_push($buttons, '|','ace_hr','ace_2columns','ace_3columns','ace_3halfcolumns','|','ace_boxw','ace_boxd','ace_boxq');
	return $buttons;
}

// ==================================================================
// Regsiter buttons
// ==================================================================
function register_button2($buttons) {
	array_push($buttons, 'ace_dropcap','ace_full_width','ace_slider','ace_pullquote','ace_lightbox','ace_tooltips','ace_buttons','ace_accordion');
	return $buttons;
}

// ==================================================================
// Add plugin
// ==================================================================
function add_plugin($plugin_array) {
	$plugin_array[ 'ace' ] = get_template_directory_uri() .'/includes/js/editor_plugin.js';
	return $plugin_array;
}

// ==================================================================
// Add TinyMCE
// ==================================================================
function ace_button() {
	if(! current_user_can('edit_posts') && ! current_user_can('edit_pages')) { return; }
		if(get_user_option('rich_editing') == 'true') {
			add_filter('mce_external_plugins', 'add_plugin');
			add_filter('mce_buttons', 'register_button1');
			add_filter('mce_buttons_2', 'register_button2');
		}
}
add_action('init', 'ace_button');

function load_my_quicktags_inline() {
	if(wp_script_is('quicktags')) { ?>
	<script type="text/javascript" charset="utf-8">
	// <![CDATA[
	/* QTags.addButton('BUTTON_ID', 'BUTTON_NAME', 'OPENING', 'CLOSING', 'SHORTKEY'); */
	QTags.addButton('ed_full_width', 'Full Width','[full_width background="#ffffff" image=""]', '[/full_width]', '');
	QTags.addButton('ed_left', 'Left', '[left]', '[/left]', '');
	QTags.addButton('ed_right', 'Right', '[right]', '[/right]', '');
	QTags.addButton('ed_col1', 'Column 1', '[col1]', '[/col1]', '');
	QTags.addButton('ed_col2', 'Column 2', '[col2]', '[/col2]', '');
	QTags.addButton('ed_col3', 'Column 3', '[col3]', '[/col3]', '');
	QTags.addButton('ed_col3half2', 'Column 3 Half 2', '[col3_2]', '[/col3_2]', '');
	QTags.addButton('ed_col3half1', 'Column 3 Half 1', '[col3_1]', '[/col3_1]', '');
	QTags.addButton('ed_accordion', 'Accordion', '[accordion title="Title"]', '[/accordion]', '');
	QTags.addButton('ed_dropcap', 'Dropcap', '[dropcap]', '[/dropcap]', '');
	QTags.addButton('ed_button', 'Button', '[button url="URL"]', '[/button]', '');
	QTags.addButton('ed_warning', 'Warning', '[warning]', '[/warning]', '');
	QTags.addButton('ed_disclaim', 'Disclaim', '[disclaim]', '[/disclaim]', '');
	QTags.addButton('ed_question', 'Question', '[question]', '[/question]', '');
	QTags.addButton('ed_line', 'Line', '[line]', '', '');
	QTags.addButton('ed_slider', 'Slider', '[slide id="Slider_id"]', '[/slide]', '');
	QTags.addButton('ed_slider_img', 'Slider Image', '[images src="http://image.jpg" title="image title" caption="image caption" url="url"]', '');
	QTags.addButton('ed_lightbox', 'Lightbox', '[lightbox title="LightboxTitle" url="PageURL"]', '[/lightbox]', '');
	QTags.addButton('ed_tooltips', 'Tooltips', '[tooltip text="TooltipText"]', '[/tooltip]', '');
	QTags.addButton('ed_pullquote', 'Pull Quote','[pullquote width="300" float="left"]', '[/pullquote]', '');
	// ]]>
	</script>
	<?php }
}
add_action('admin_print_footer_scripts', 'load_my_quicktags_inline');

// ==================================================================
// Plugin Conflict
// ==================================================================
include_once(ABSPATH . 'wp-admin/includes/plugin.php');
if(is_plugin_active('codestyling-localization/codestyling-localization.php')) {
	remove_action('admin_enqueue_scripts', 'ace_quicktags');
	remove_action('admin_enqueue_scripts', 'ace_editor_plugin');
}
if(is_plugin_active('nextgen-gallery/nggallery.php')) {
	remove_action('admin_enqueue_scripts', 'ace_quicktags');
	remove_action('admin_enqueue_scripts', 'ace_editor_plugin');
}
