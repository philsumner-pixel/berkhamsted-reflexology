<?php if(!defined('ABSPATH')) { exit; }
// ==================================================================
// Included libraries
// ==================================================================
require_once(get_template_directory() . '/includes/ace_functions.php');
require_once(get_template_directory() . '/includes/ace_import_export.php');
require_once(get_template_directory() . '/includes/ace_pattern.php');
require_once(get_template_directory() . '/includes/ace_theme_customize.php');
require_once(get_template_directory() . '/includes/custom_post.php');
require_once(get_template_directory() . '/includes/custom_widgets.php');
require_once(get_template_directory() . '/includes/meta_boxes.php');
require_once(get_template_directory() . '/includes/modules.php');
require_once(get_template_directory() . '/includes/quicktags.php');
require_once(get_template_directory() . '/includes/shortcodes.php');
require_once(get_template_directory() . '/includes/widgets.php');
require_once(get_template_directory() . '/includes/plugins/ace_edd.php');
require_once(get_template_directory() . '/includes/plugins/ace_woocommerce.php');
require_once(get_template_directory() . '/includes/options-importer.php');

// ==================================================================
// Disable Gutenberg in Post and Page
// ==================================================================
//add_filter('use_block_editor_for_post', '__return_false', 1);
//add_filter('use_block_editor_for_page', '__return_false', 10);

// ==================================================================
// WordPress dashicons
// ==================================================================
function load_dashicons_front_end() {
	wp_enqueue_style('dashicons');
}
//add_action('wp_enqueue_scripts', 'load_dashicons_front_end');

// ==================================================================
// Gettting started
// ==================================================================
//if(is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php") wp_redirect('themes.php?page=ace_started.php');

// ==================================================================
// Theme activate notice bar
// ==================================================================
function ace_theme_admin_notice(){
	global $pagenow;
	if ( $pagenow == 'themes.php' ) {
		echo '<div class="notice notice-success is-dismissible">
		<p><strong>Bluchic theme activated.</strong> Follow our <strong><a href="'.esc_url('http://help.bluchic.com/?utm_source=getting-started&utm_medium=theme-options&utm_campaign=theme-options-getting-started').'" target="_blank">documentation</a></strong> to get your theme set up. If you run into any difficulty, we\'re here to help with direct, personal support! Just <strong><a href="'.esc_url('http://help.bluchic.com/submit-a-ticket?utm_source=getting-started&utm_medium=theme-options&utm_campaign=theme-options-getting-started').'" target="_blank">submit a support ticket</a></strong>.</p>
		</div>';
	}
}
add_action('admin_notices', 'ace_theme_admin_notice');
