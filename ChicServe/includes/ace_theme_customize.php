<?php
/**
* Customizer: Sanitization Callbacks
* This file demonstrates how to define sanitization callback functions for various data types.
* @package   code-examples
* @copyright Copyright (c) 2015, WordPress Theme Review Team
* @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License, v2 (or newer)
*/
/********** Checkbox sanitization **********/
function ace_sanitize_checkbox($checked) {
	// Boolean check.
	return ((isset($checked) && true == $checked) ? true : false);
}

/********** Select  sanitization **********/
function ace_sanitize_select( $input, $setting ) {
	// Ensure input is a slug.
	$input = sanitize_key( $input );
	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;
	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

function ace_sanitize_select_site_layout( $input ) {
	$valid = array(
		'Content-Sidebar' => 'Content-Sidebar',
		'Sidebar-Content' => 'Sidebar-Content',
	);
	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	} else {
		return '';
	}
}

function ace_sanitize_select_list_layout( $input ) {
	$valid = array(
		'Classic' => 'Classic',
		'Classic-Odd' => 'Classic-Odd',
		'Card-2' => 'Card-2',
		'Card-3' => 'Card-3',
		'Grid-2' => 'Grid-2',
		'Grid-3' => 'Grid-3',
	);
	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	} else {
		return '';
	}
}

function ace_sanitize_select_thumb_align( $input ) {
	$valid = array(
		'alignleft' => 'alignleft',
		'aligncenter' => 'aligncenter',
		'alignright' => 'alignright',
	);
	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	} else {
		return '';
	}
}

function ace_sanitize_select_newsletter_location( $input ) {
	$valid = array(
		'Top' => 'Top',
		'Bottom' => 'Bottom',
		'Both' => 'Both',
	);
	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	} else {
		return '';
	}
}

function ace_sanitize_select_featured_location( $input ) {
	$valid = array(
		'Top' => 'Top',
		'Bottom' => 'Bottom',
	);
	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	} else {
		return '';
	}
}

function ace_sanitize_select_cookie( $input ) {
	$valid = array(
			'7' => '7',
			'14' => '14',
			'30' => '30',
			'60' => '60',
			'90' => '90',
			'365' => '365',
	);
	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	} else {
		return '';
	}
}

function ace_sanitize_select_slide_pause( $input ) {
	$valid = array(
		'1000' => '1000',
		'2000' => '2000',
		'3000' => '3000',
		'4000' => '4000',
		'5000' => '5000',
		'6000' => '6000',
		'7000' => '7000',
		'8000' => '8000',
		'9000' => '8000',
		'10000' => '10000',
	);
	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	} else {
		return '';
	}
}

function ace_sanitize_select_slide_speed( $input ) {
	$valid = array(
			'100'	=> '100',
			'200'	=> '200',
			'300'	=> '300',
			'400'	=> '400',
			'500'	=> '500',
			'1000' => '1000',
	);
	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	} else {
		return '';
	}
}



// ==================================================================
// Register new control for layout post type
// ==================================================================
if(class_exists('WP_Customize_Control')):
  class WP_Customize_Latest_Post_Control extends WP_Customize_Control {
    public $type = 'latest_post_dropdown';
		public $post_type = 'layout';
    public function render_content() {
      $latest = new WP_Query(array(
        'post_type' => 'layout',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'DESC'
     ));
      ?>
      <label>
      	<span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
      	<select <?php $this->link(); ?>>
          <option value="Default"><?php echo _e('Default', 'ace'); ?></option>
      		<?php
      		while($latest->have_posts()) {
      			$latest->the_post();
      			echo "<option " . selected($this->value(), get_the_ID()) . " value='" . get_post_field('post_name', get_post()) . "'>" . the_title('', '', false) . "</option>";
      		}
      		?>
      	</select>
      </label>
    <?php }
  }
endif;


// ==================================================================
// START register theme customize
// ==================================================================
function ace_customize_register($wp_customize) {

	// ====================================================================================================================================
	// Register customize panel
	// ====================================================================================================================================
	$wp_customize->add_panel('ace_theme_panel', array(
		'title' => 'Bluchic Theme',
		'description' => '',
		'priority' => 1000,
	));

	// ====================================================================================================================================
	// Register theme customize section
	// ====================================================================================================================================
	$wp_customize->add_section('ace_theme_setup', array(
		'title' => __('General settings', 'ace'),
		'priority' => 1001,
		'description' => '',
		'panel' => 'ace_theme_panel',
	));
	// ================================================================== Site layout
	$wp_customize->add_setting('ace_site_layout', array(
    'capability' => 'edit_theme_options',
		'type' => 'option',
    'default' => 'Content-Sidebar',
		'sanitize_callback' => 'ace_sanitize_select_site_layout',
	));
	$wp_customize->add_control('ace_site_layout', array(
		'section' => 'ace_theme_setup',
		'label' => __('Site layout', 'ace'),
		'settings' => 'ace_site_layout',
		'type' => 'select',
		'default' => 'Content-Sidebar',
		'choices' => array(
			'Content-Sidebar' => 'Content-Sidebar',
			'Sidebar-Content' => 'Sidebar-Content',
		),
	));
  // ================================================================== Header layout
  $wp_customize->add_setting('ace_header_layout', array(
    'capability' => 'edit_theme_options',
    'type' => 'option',
    'default' => 'Default',
		'sanitize_callback' => '',
 ));
  $wp_customize->add_control(new WP_Customize_Latest_Post_Control ($wp_customize, 'ace_header_layout', array(
    'label' => __('Select a header', 'ace'),
    'section' => 'ace_theme_setup',
    'settings' => 'ace_header_layout',
    'post_type' => 'page'
 )));
  // ================================================================== Footer layout
  $wp_customize->add_setting('ace_footer_layout', array(
    'capability' => 'edit_theme_options',
    'type' => 'option',
    'default' => 'Default',
		'sanitize_callback' => '',
 ));
  $wp_customize->add_control(new WP_Customize_Latest_Post_Control ($wp_customize, 'ace_footer_layout', array(
    'label' => __('Select a footer', 'ace'),
    'section' => 'ace_theme_setup',
    'settings' => 'ace_footer_layout',
    'post_type' => 'page'
 )));
	// ================================================================== Disable Colorbox
	$wp_customize->add_setting('ace_disable_colorbox', array(
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'ace_sanitize_checkbox',
	));
	$wp_customize->add_control('ace_disable_colorbox', array(
		'settings' => 'ace_disable_colorbox',
		'label' => __('Disable Colorbox pop-up', 'ace'),
		'section' => 'ace_theme_setup',
		'type' => 'checkbox',
	));
	// ================================================================== Featured widget location
	$wp_customize->add_setting('ace_featured_location', array(
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'default' => 'Top',
		'sanitize_callback' => 'ace_sanitize_select_featured_location',
	));
	$wp_customize->add_control('ace_featured_location', array(
		'settings' => 'ace_featured_location',
		'label' => __('Featured widget location', 'ace'),
		'section' => 'ace_theme_setup',
		'type' => 'select',
		'default' => 'Top',
		'choices' => array(
			'Top' => 'Top',
			'Bottom' => 'Bottom',
		),
	));
	// ================================================================== Show Featured widgets on homepage only
	$wp_customize->add_setting('ace_featured_home', array(
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'ace_sanitize_checkbox',
	));
	$wp_customize->add_control('ace_featured_home', array(
		'settings' => 'ace_featured_home',
		'label' => __('Show Featured widgets on homepage only', 'ace'),
		'section' => 'ace_theme_setup',
		'type' => 'checkbox',
	));
	// ================================================================== Footer credit
	$wp_customize->add_setting('ace_footer_credit', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => '',
		'type' => 'option',
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'ace_footer_credit', array(
		'label' => __('Footer credit', 'ace'),
		'section' => 'ace_theme_setup',
		'settings' => 'ace_footer_credit',
		'type' => 'textarea',
	)));
	// ================================================================== Footer privacy link
	$wp_customize->add_setting('ace_privacy', array(
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'ace_sanitize_checkbox',
	));
	$wp_customize->add_control('ace_privacy', array(
		'settings' => 'ace_privacy',
		'label' => __('Disable privacy link at footer', 'ace'),
		'section' => 'ace_theme_setup',
		'type' => 'checkbox',
	));


// ====================================================================================================================================
// Register theme customize section
// ====================================================================================================================================
	$wp_customize->add_section('ace_theme_post', array(
		'title' => __('Post settings', 'ace'),
		'priority' => 1002,
		'description' => '',
		'panel' => 'ace_theme_panel',
	));
	// ================================================================== Enable Breadcrumb navigation
	$wp_customize->add_setting('ace_enable_breadcrumb', array(
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'ace_sanitize_checkbox',
	));
	$wp_customize->add_control('ace_enable_breadcrumb', array(
		'settings' => 'ace_enable_breadcrumb',
		'label' => __('Enable breadcrumb navigation', 'ace'),
		'section' => 'ace_theme_post',
		'type' => 'checkbox',
	));
	// ================================================================== Hide post meta
	$wp_customize->add_setting('ace_hide_post_meta', array(
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'ace_sanitize_checkbox',
	));
	$wp_customize->add_control('ace_hide_post_meta', array(
		'settings' => 'ace_hide_post_meta',
		'label' => __('Hide post meta', 'ace'),
		'section' => 'ace_theme_post',
		'type' => 'checkbox',
		'description' => __('Hide all the post meta (author, date, comment, category etc)', 'ace'),
	));
	// ================================================================== Hide post date
	$wp_customize->add_setting('ace_hide_date', array(
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'ace_sanitize_checkbox',
	));
	$wp_customize->add_control('ace_hide_date', array(
		'settings' => 'ace_hide_date',
		'label' => __('Hide post date', 'ace'),
		'section' => 'ace_theme_post',
		'type' => 'checkbox',
	));
	// ================================================================== Hide post category
	$wp_customize->add_setting('ace_hide_category', array(
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'ace_sanitize_checkbox',
	));
	$wp_customize->add_control('ace_hide_category', array(
		'settings' => 'ace_hide_category',
		'label' => __('Hide post category', 'ace'),
		'section' => 'ace_theme_post',
		'type' => 'checkbox',
	));
	// ================================================================== Hide post comment
	$wp_customize->add_setting('ace_hide_comment', array(
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'ace_sanitize_checkbox',
	));
	$wp_customize->add_control('ace_hide_comment', array(
		'settings' => 'ace_hide_comment',
		'label' => __('Hide post comment', 'ace'),
		'section' => 'ace_theme_post',
		'type' => 'checkbox',
	));
	// ================================================================== Hide post tags
	$wp_customize->add_setting('ace_hide_tag', array(
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'ace_sanitize_checkbox',
	));
	$wp_customize->add_control('ace_hide_tag', array(
		'settings' => 'ace_hide_tag',
		'label' => __('Hide post tags', 'ace'),
		'section' => 'ace_theme_post',
		'type' => 'checkbox',
	));
	// ================================================================== Blog author
	$wp_customize->add_setting('ace_blog_author', array(
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback'  => 'ace_sanitize_checkbox',
	));
	$wp_customize->add_control('ace_blog_author', array(
		'settings' => 'ace_blog_author',
		'label' => __('Hide blog author', 'ace'),
		'section' => 'ace_theme_post',
		'type' => 'checkbox',
	));
	// ================================================================== Blog author biography
	$wp_customize->add_setting('ace_blog_author_bio', array(
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'ace_sanitize_checkbox',
	));
	$wp_customize->add_control('ace_blog_author_bio', array(
		'settings' => 'ace_blog_author_bio',
		'label' => __('Show blog author biography', 'ace'),
		'section' => 'ace_theme_post',
		'type' => 'checkbox',
	));
	// ================================================================== Author signature
	$wp_customize->add_setting('ace_post_signature', array(
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'ace_sanitize_image',
	));
	$wp_customize->add_control(new WP_Customize_Upload_Control($wp_customize, 'ace_post_signature', array(
		'label' => __('Author signature', 'ace'),
		'section' => 'ace_theme_post',
		'settings' => 'ace_post_signature',
	)));
	// ================================================================== Enable related post
	$wp_customize->add_setting('ace_enable_related', array(
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'ace_sanitize_checkbox',
	));
	$wp_customize->add_control('ace_enable_related', array(
		'settings' => 'ace_enable_related',
		'label' => __('Enable related post', 'ace'),
		'section' => 'ace_theme_post',
		'type' => 'checkbox',
	));
	// ================================================================== Post banner
	$wp_customize->add_setting('ace_post_banner', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => '',
		'type' => 'option',
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'ace_post_banner', array(
		'label' => __('Post banner', 'ace'),
		'section' => 'ace_theme_post',
		'settings' => 'ace_post_banner',
		'type' => 'textarea',
		'description' => __('Insert banner at the bottom of a blog post', 'ace'),
	)));
	// ================================================================== Text before comment
	$wp_customize->add_setting('ace_comment_text', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_kses',
		'type' => 'option',
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'ace_comment_text', array(
		'label' => __('Text before comment', 'ace'),
		'section' => 'ace_theme_post',
		'settings' => 'ace_comment_text',
		'type' => 'textarea',
		'description' => __('Text before comment. You can place privacy concern or terms before the comment form', 'ace'),
	)));


// ====================================================================================================================================
// Register theme customize section
// ====================================================================================================================================
	$wp_customize->add_section('ace_theme_blog', array(
		'title' => __('Blog page settings', 'ace'),
		'priority' => 1003,
		'description' => '',
		'panel' => 'ace_theme_panel',
	));
	// ================================================================== Remove sidebar
	$wp_customize->add_setting('ace_full_blog', array(
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'ace_sanitize_checkbox',
	));
	$wp_customize->add_control('ace_full_blog', array(
		'settings' => 'ace_full_blog',
		'label' => __('Remove sidebar on blog page', 'ace'),
		'section' => 'ace_theme_blog',
		'type' => 'checkbox',
	));
	// ================================================================== Blog listing
	$wp_customize->add_setting('ace_blog_list_layout', array(
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'default' => '',
		'sanitize_callback' => 'ace_sanitize_select_list_layout',
	));
	$wp_customize->add_control('ace_blog_list_layout', array(
		'settings' => 'ace_blog_list_layout',
		'label' => __('Blog listing layout', 'ace'),
		'section' => 'ace_theme_blog',
		'type' => 'select',
		'default' => '',
		'choices' => array(
			'Classic' => 'Classic',
			'Classic-Odd' => 'Classic-Odd',
			'Card-2' => 'Card-2',
			'Card-3' => 'Card-3',
			'Grid-2' => 'Grid-2',
			'Grid-3' => 'Grid-3',
		),
	));
	// ================================================================== Open new windows
	$wp_customize->add_setting('ace_new_window', array(
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'ace_sanitize_checkbox',
	));
	$wp_customize->add_control('ace_new_window', array(
		'settings' => 'ace_new_window',
		'label' => __('Open blog link in new windows', 'ace'),
		'section' => 'ace_theme_blog',
		'type' => 'checkbox',
	));
	// ================================================================== Blog title
	$wp_customize->add_setting('ace_blog_layout', array(
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'ace_sanitize_checkbox',
	));
	$wp_customize->add_control('ace_blog_layout', array(
		'settings' => 'ace_blog_layout',
		'label' => __('Blog title on top', 'ace'),
		'section' => 'ace_theme_blog',
		'description' => __('Apply on Grid and Card layout only', 'ace'),
		'type' => 'checkbox',
	));
	// ================================================================== Use excerpt summary
	$wp_customize->add_setting('ace_enable_excerpt', array(
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'ace_sanitize_checkbox',
	));
	$wp_customize->add_control('ace_enable_excerpt', array(
		'settings' => 'ace_enable_excerpt',
		'label' => __('Use excerpt summary post', 'ace'),
		'section' => 'ace_theme_blog',
		'type' => 'checkbox',
	));
	// ================================================================== Hide read more button
	$wp_customize->add_setting('ace_enable_excerpt_button', array(
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'ace_sanitize_checkbox',
	));
	$wp_customize->add_control('ace_enable_excerpt_button', array(
		'settings' => 'ace_enable_excerpt_button',
		'label' => __('Display read more button', 'ace'),
		'section' => 'ace_theme_blog',
		'type' => 'checkbox',
	));
	// ================================================================== Read more text
	$wp_customize->add_setting('ace_read_more_text', array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
	));
	$wp_customize->add_control('ace_read_more_text', array(
		'label' => __('Read more button text', 'ace'),
		'section' => 'ace_theme_blog',
		'settings' => 'ace_read_more_text',
	));

	// ================================================================== Enable feature thumbnail
	$wp_customize->add_setting('ace_enable_post_thumbnail', array(
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'ace_sanitize_checkbox',
	));
	$wp_customize->add_control('ace_enable_post_thumbnail', array(
		'settings' => 'ace_enable_post_thumbnail',
		'label' => __('Enable feature thumbnail', 'ace'),
		'section' => 'ace_theme_blog',
		'type' => 'checkbox',
	));
	// ================================================================== Width
	$wp_customize->add_setting('ace_thumb_width', array(
		'capability' => 'edit_theme_options',
    'sanitize_callback' => 'absint',
		'type' => 'option',
		'default' => '',
	));
	$wp_customize->add_control('ace_thumb_width', array(
		'label' => __('Width', 'ace'),
		'section' => 'ace_theme_blog',
		'settings' => 'ace_thumb_width',
	));
	// ================================================================== Height
	$wp_customize->add_setting('ace_thumb_height', array(
		'capability' => 'edit_theme_options',
    'sanitize_callback' => 'absint',
		'type' => 'option',
		'default' => '',
	));
	$wp_customize->add_control('ace_thumb_height', array(
		'label' => __('Height', 'ace'),
		'section' => 'ace_theme_blog',
		'settings' => 'ace_thumb_height',
	));
	// ================================================================== Thumbnail alignment
	$wp_customize->add_setting('ace_thumb_align', array(
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'default' => '',
		'sanitize_callback' => 'ace_sanitize_select_thumb_align',
	));
	$wp_customize->add_control('ace_thumb_align', array(
		'settings' => 'ace_thumb_align',
		'label' => __('Thumbnail alignment', 'ace'),
		'section' => 'ace_theme_blog',
		'type' => 'select',
		'default' => '',
    'description' => __('Apply on Classic layout only', 'ace'),
		'choices' => array(
			'alignleft' => 'alignleft',
			'aligncenter' => 'aligncenter',
			'alignright' => 'alignright',
		),
	));


// ====================================================================================================================================
// Register theme customize section
// ====================================================================================================================================
	$wp_customize->add_section('ace_theme_archive', array(
		'title' => __('Archive page settings', 'ace'),
		'priority' => 1004,
		'description' => '',
		'panel' => 'ace_theme_panel',
	));
	// ================================================================== Remove sidebar
	$wp_customize->add_setting('ace_full_archive', array(
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'ace_sanitize_checkbox',
	));
	$wp_customize->add_control('ace_full_archive', array(
		'settings' => 'ace_full_archive',
		'label' => __('Remove sidebar on archive page', 'ace'),
		'section' => 'ace_theme_archive',
		'type' => 'checkbox',
	));
	// ================================================================== Archive listing
	$wp_customize->add_setting('ace_archive_list_layout', array(
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'default' => '',
		'sanitize_callback' => 'ace_sanitize_select_list_layout',
	));
	$wp_customize->add_control('ace_archive_list_layout', array(
		'settings' => 'ace_archive_list_layout',
		'label' => __('Archive listing layout', 'ace'),
		'section' => 'ace_theme_archive',
		'type' => 'select',
		'default' => '',
		'choices' => array(
			'Classic' => 'Classic',
			'Classic-Odd' => 'Classic-Odd',
			'Card-2' => 'Card-2',
			'Card-3' => 'Card-3',
			'Grid-2' => 'Grid-2',
			'Grid-3' => 'Grid-3',
		),
	));
	// ================================================================== Blog title
	$wp_customize->add_setting('ace_archive_layout', array(
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'ace_sanitize_checkbox',
	));
	$wp_customize->add_control('ace_archive_layout', array(
		'settings' => 'ace_archive_layout',
		'label' => __('Blog title on top', 'ace'),
		'section' => 'ace_theme_archive',
		'description' => __('Apply on Grid and Card layout only', 'ace'),
		'type' => 'checkbox',
	));
	// ================================================================== Use excerpt summary
	$wp_customize->add_setting('ace_archive_enable_excerpt', array(
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'ace_sanitize_checkbox',
	));
	$wp_customize->add_control('ace_archive_enable_excerpt', array(
		'settings' => 'ace_archive_enable_excerpt',
		'label' => __('Use excerpt summary post', 'ace'),
		'section' => 'ace_theme_archive',
		'type' => 'checkbox',
	));
	// ================================================================== Enable feature thumbnail
	$wp_customize->add_setting('ace_enable_archive_thumbnail', array(
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'ace_sanitize_checkbox',
	));
	$wp_customize->add_control('ace_enable_archive_thumbnail', array(
		'settings' => 'ace_enable_archive_thumbnail',
		'label' => __('Enable feature thumbnail', 'ace'),
		'section' => 'ace_theme_archive',
		'type' => 'checkbox',
	));
	// ================================================================== Width
	$wp_customize->add_setting('ace_archive_thumb_width', array(
		'capability' => 'edit_theme_options',
    'sanitize_callback' => 'absint',
		'type' => 'option',
		'default' => '',
	));
	$wp_customize->add_control('ace_archive_thumb_width', array(
		'label' => __('Width', 'ace'),
		'section' => 'ace_theme_archive',
		'settings' => 'ace_archive_thumb_width',
	));
	// ================================================================== Height
	$wp_customize->add_setting('ace_archive_thumb_height', array(
		'capability' => 'edit_theme_options',
    'sanitize_callback' => 'absint',
		'type' => 'option',
		'default' => '',
	));
	$wp_customize->add_control('ace_archive_thumb_height', array(
		'label' => __('Height', 'ace'),
		'section' => 'ace_theme_archive',
		'settings' => 'ace_archive_thumb_height',
	));
	// ================================================================== Thumbnail alignment
	$wp_customize->add_setting('ace_archive_thumb_align', array(
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'default' => '',
		'sanitize_callback' => 'ace_sanitize_select_thumb_align',
	));
	$wp_customize->add_control('ace_archive_thumb_align', array(
		'settings' => 'ace_archive_thumb_align',
		'label' => __('Thumbnail alignment', 'ace'),
		'section' => 'ace_theme_archive',
		'type' => 'select',
		'default' => '',
    'description' => __('Apply on Classic layout only', 'ace'),
		'choices' => array(
			'alignleft' => 'alignleft',
			'aligncenter' => 'aligncenter',
			'alignright' => 'alignright',
		),
	));


// ====================================================================================================================================
// Register theme customize section
// ====================================================================================================================================
	$wp_customize->add_section('ace_theme_search', array(
		'title' => __('Search page settings', 'ace'),
		'priority' => 1005,
		'description' => '',
		'panel' => 'ace_theme_panel',
	));
	// ================================================================== Remove sidebar
	$wp_customize->add_setting('ace_full_search', array(
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'ace_sanitize_checkbox',
	));
	$wp_customize->add_control('ace_full_search', array(
		'settings' => 'ace_full_search',
		'label' => __('Remove sidebar on search page', 'ace'),
		'section' => 'ace_theme_search',
		'type' => 'checkbox',
	));
	// ================================================================== Search listing
	$wp_customize->add_setting('ace_search_list_layout', array(
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'default' => '',
		'sanitize_callback' => 'ace_sanitize_select_list_layout',
	));
	$wp_customize->add_control('ace_search_list_layout', array(
		'settings' => 'ace_search_list_layout',
		'label' => __('Search listing layout', 'ace'),
		'section' => 'ace_theme_search',
		'type' => 'select',
		'default' => '',
		'choices' => array(
			'Classic' => 'Classic',
			'Classic-Odd' => 'Classic-Odd',
			'Card-2' => 'Card-2',
			'Card-3' => 'Card-3',
			'Grid-2' => 'Grid-2',
			'Grid-3' => 'Grid-3',
		),
	));
	// ================================================================== Blog title
	$wp_customize->add_setting('ace_search_layout', array(
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'ace_sanitize_checkbox',
	));
	$wp_customize->add_control('ace_search_layout', array(
		'settings' => 'ace_search_layout',
		'label' => __('Blog title on top', 'ace'),
		'section' => 'ace_theme_search',
    'description' => __('Apply on Grid and Card layout only', 'ace'),
		'type' => 'checkbox',
	));
	// ================================================================== Use excerpt summary
	$wp_customize->add_setting('ace_search_enable_excerpt', array(
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'ace_sanitize_checkbox',
	));
	$wp_customize->add_control('ace_search_enable_excerpt', array(
		'settings' => 'ace_search_enable_excerpt',
		'label' => __('Use excerpt summary post', 'ace'),
		'section' => 'ace_theme_search',
		'type' => 'checkbox',
	));
	// ================================================================== Enable feature thumbnail
	$wp_customize->add_setting('ace_enable_search_thumbnail', array(
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'ace_sanitize_checkbox',
	));
	$wp_customize->add_control('ace_enable_search_thumbnail', array(
		'settings' => 'ace_enable_search_thumbnail',
		'label' => __('Enable feature thumbnail', 'ace'),
		'section' => 'ace_theme_search',
		'type' => 'checkbox',
	));
	// ================================================================== Width
	$wp_customize->add_setting('ace_search_thumb_width', array(
		'capability' => 'edit_theme_options',
    'sanitize_callback' => 'absint',
		'type' => 'option',
		'default' => '',
	));
	$wp_customize->add_control('ace_search_thumb_width', array(
		'label' => __('Width', 'ace'),
		'section' => 'ace_theme_search',
		'settings' => 'ace_search_thumb_width',
	));
	// ================================================================== Height
	$wp_customize->add_setting('ace_search_thumb_height', array(
		'capability' => 'edit_theme_options',
    'sanitize_callback' => 'absint',
		'type' => 'option',
		'default' => '',
	));
	$wp_customize->add_control('ace_search_thumb_height', array(
		'label' => __('Height', 'ace'),
		'section' => 'ace_theme_search',
		'settings' => 'ace_search_thumb_height',
	));
	// ================================================================== Thumbnail alignment
	$wp_customize->add_setting('ace_search_thumb_align', array(
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'default' => '',
		'sanitize_callback' => 'ace_sanitize_select_thumb_align',
	));
	$wp_customize->add_control('ace_search_thumb_align', array(
		'settings' => 'ace_search_thumb_align',
		'label' => __('Thumbnail alignment', 'ace'),
		'section' => 'ace_theme_search',
		'type' => 'select',
		'default' => '',
    'description' => __('Apply on Classic layout only', 'ace'),
		'choices' => array(
			'alignleft' => 'alignleft',
			'aligncenter' => 'aligncenter',
			'alignright' => 'alignright',
		),
	));


// ====================================================================================================================================
// Register theme customize section
// ====================================================================================================================================
	$wp_customize->add_section('ace_theme_404', array(
		'title' => __('Not found page settings', 'ace'),
		'priority' => 1006,
		'description' => '',
		'panel' => 'ace_theme_panel',
	));
	// ================================================================== 404 Error
	$wp_customize->add_setting('ace_404_page', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_kses_post',
		'type' => 'option',
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'ace_404_page', array(
		'label' => __('404 Page Content', 'ace'),
		'section' => 'ace_theme_404',
		'settings' => 'ace_404_page',
		'type' => 'textarea',
	)));


// ====================================================================================================================================
// Register theme customize section
// ====================================================================================================================================
	$wp_customize->add_section('ace_theme_color', array(
		'title' => __('Colors settings', 'ace'),
		'priority' => 1007,
		'description' => '',
		'panel' => 'ace_theme_panel',
	));
	// ==================================================================
	// Overall
	// ==================================================================
	// ================================================================== Text
	$wp_customize->add_setting('ace_text_color', array(
		'default' => '#444444',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_text_color', array(
		'label' => __('Text color', 'ace'),
		'section' => 'ace_theme_color',
		'settings' => 'ace_text_color',
	)));
	// ================================================================== Border
	$wp_customize->add_setting('ace_border_color', array(
		'default' => '#dddddd',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_border_color', array(
		'label' => __('Border color', 'ace'),
		'section' => 'ace_theme_color',
		'settings' => 'ace_border_color',
	)));
	// ================================================================== Border
	$wp_customize->add_setting('ace_container_bg', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_container_bg', array(
		'label' => __('Container background color', 'ace'),
		'section' => 'ace_theme_color',
		'settings' => 'ace_container_bg',
	)));
	// ==================================================================
	// Menu
	// ==================================================================
	// ================================================================== Menu
	$wp_customize->add_setting('ace_nav_link', array(
		'default' => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_nav_link', array(
		'label' => __('Menu link color', 'ace'),
		'section' => 'ace_theme_color',
		'settings' => 'ace_nav_link',
	)));
	// ================================================================== Menu
	$wp_customize->add_setting('ace_nav_link_hover', array(
		'default' => '#C77D81',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_nav_link_hover', array(
		'label' => __('Menu link hover color', 'ace'),
		'section' => 'ace_theme_color',
		'settings' => 'ace_nav_link_hover',
	)));
	// ================================================================== Menu
	$wp_customize->add_setting('ace_nav_bar', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_nav_bar', array(
		'label' => __('Menu background', 'ace'),
		'section' => 'ace_theme_color',
		'settings' => 'ace_nav_bar',
	)));

	// ==================================================================
	// Slider
	// ==================================================================
	// ================================================================== Slider
	$wp_customize->add_setting('ace_arrow_bg', array(
		'default' => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_arrow_bg', array(
		'label' => __('Slider arrow color', 'ace'),
		'section' => 'ace_theme_color',
		'settings' => 'ace_arrow_bg',
	)));
	// ================================================================== Slider
	$wp_customize->add_setting('ace_caption_text', array(
		'default' => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_caption_text', array(
		'label' => __('Slider caption text color', 'ace'),
		'section' => 'ace_theme_color',
		'settings' => 'ace_caption_text',
	)));
	// ================================================================== Slider
	$wp_customize->add_setting('ace_caption_bg', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_caption_bg', array(
		'label' => __('Slider caption background color', 'ace'),
		'section' => 'ace_theme_color',
		'settings' => 'ace_caption_bg',
	)));

	// ==================================================================
	// Page/Post Title
	// ==================================================================
	// ================================================================== Page Title
	$wp_customize->add_setting('ace_page_page_title', array(
		'default' => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_page_page_title', array(
		'label' => __('Page title color', 'ace'),
		'section' => 'ace_theme_color',
		'settings' => 'ace_page_page_title',
	)));
	// ================================================================== Post Title
	$wp_customize->add_setting('ace_page_post_title', array(
		'default' => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_page_post_title', array(
		'label' => __('Post title link color', 'ace'),
		'section' => 'ace_theme_color',
		'settings' => 'ace_page_post_title',
	)));

	// ==================================================================
	// Sidebar
	// ==================================================================
	// ================================================================== Sidebar
	$wp_customize->add_setting('ace_sidebar_widget_title', array(
		'default' => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_sidebar_widget_title', array(
		'label' => __('Sidebar widget title color', 'ace'),
		'section' => 'ace_theme_color',
		'settings' => 'ace_sidebar_widget_title',
	)));

	// ==================================================================
	// Footer
	// ==================================================================
	// ================================================================== Footer
	$wp_customize->add_setting('ace_footer_widget_title', array(
		'default' => '#666666',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_footer_widget_title', array(
		'label' => __('Footer widget title color', 'ace'),
		'section' => 'ace_theme_color',
		'settings' => 'ace_footer_widget_title',
	)));

	// ==================================================================
	// Link
	// ==================================================================
	// ================================================================== Link
	$wp_customize->add_setting('ace_link', array(
		'default' => '#C77D81',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_link', array(
		'label' => __('Link color', 'ace'),
		'section' => 'ace_theme_color',
		'settings' => 'ace_link',
	)));
	// ================================================================== Link
	$wp_customize->add_setting('ace_link_hover', array(
		'default' => '#666666',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_link_hover', array(
		'label' => __('Link hover color', 'ace'),
		'section' => 'ace_theme_color',
		'settings' => 'ace_link_hover',
	)));

	// ==================================================================
	// Heading
	// ==================================================================
	// ================================================================== Heading
	$wp_customize->add_setting('ace_h1', array(
		'default' => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_h1', array(
		'label' => __('H1 color', 'ace'),
		'section' => 'ace_theme_color',
		'settings' => 'ace_h1',
	)));
	// ================================================================== Heading
	$wp_customize->add_setting('ace_h2', array(
		'default' => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_h2', array(
		'label' => __('H2 color', 'ace'),
		'section' => 'ace_theme_color',
		'settings' => 'ace_h2',
	)));
	// ================================================================== Heading
	$wp_customize->add_setting('ace_h3', array(
		'default' => '#333333',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_h3', array(
		'label' => __('H3 color', 'ace'),
		'section' => 'ace_theme_color',
		'settings' => 'ace_h3',
	)));
	// ================================================================== Heading
	$wp_customize->add_setting('ace_h4', array(
		'default' => '#333333',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_h4', array(
		'label' => __('H4 color', 'ace'),
		'section' => 'ace_theme_color',
		'settings' => 'ace_h4',
	)));
	// ================================================================== Heading
	$wp_customize->add_setting('ace_h5', array(
		'default' => '#555555',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_h5', array(
		'label' => __('H5 color', 'ace'),
		'section' => 'ace_theme_color',
		'settings' => 'ace_h5',
	)));
	// ================================================================== Heading
	$wp_customize->add_setting('ace_h6', array(
		'default' => '#555555',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_h6', array(
		'label' => __('H6 color', 'ace'),
		'section' => 'ace_theme_color',
		'settings' => 'ace_h6',
	)));

	// ==================================================================
	// Button
	// ==================================================================
	// ================================================================== Button
	$wp_customize->add_setting('ace_button_bg', array(
		'default' => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_button_bg', array(
		'label' => __('Button background color', 'ace'),
		'section' => 'ace_theme_color',
		'settings' => 'ace_button_bg',
	)));
	// ================================================================== Button
	$wp_customize->add_setting('ace_button_border', array(
		'default' => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_button_border', array(
		'label' => __('Button border color', 'ace'),
		'section' => 'ace_theme_color',
		'settings' => 'ace_button_border',
	)));
	// ================================================================== Button
	$wp_customize->add_setting('ace_button_text', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_button_text', array(
		'label' => __('Button text color', 'ace'),
		'section' => 'ace_theme_color',
		'settings' => 'ace_button_text',
	)));
	// ================================================================== Button
	$wp_customize->add_setting('ace_button_bg_hover', array(
		'default' => '#C77D81',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_button_bg_hover', array(
		'label' => __('Button hover background color', 'ace'),
		'section' => 'ace_theme_color',
		'settings' => 'ace_button_bg_hover',
	)));
	// ================================================================== Button
	$wp_customize->add_setting('ace_button_border_hover', array(
		'default' => '#C77D81',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_button_border_hover', array(
		'label' => __('Button hover border color', 'ace'),
		'section' => 'ace_theme_color',
		'settings' => 'ace_button_border_hover',
	)));
	// ================================================================== Button
	$wp_customize->add_setting('ace_button_text_hover', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_button_text_hover', array(
		'label' => __('Button hover text color', 'ace'),
		'section' => 'ace_theme_color',
		'settings' => 'ace_button_text_hover',
	)));

	// ==================================================================
	// Socail Media
	// ==================================================================
	// ================================================================== Social Media
	$wp_customize->add_setting('ace_widget_twitter_bg', array(
		'default' => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_widget_twitter_bg', array(
		'label' => __('(Widget) Twitter color', 'ace'),
		'section' => 'ace_theme_color',
		'settings' => 'ace_widget_twitter_bg',
	)));
	// ================================================================== Social Media
	$wp_customize->add_setting('ace_widget_twitter_bg_hover', array(
		'default' => '#269dd5',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_widget_twitter_bg_hover', array(
		'label' => __('(Widget) Twitter hover color', 'ace'),
		'section' => 'ace_theme_color',
		'settings' => 'ace_widget_twitter_bg_hover',
	)));
	// ================================================================== Social Media
	$wp_customize->add_setting('ace_widget_fb_bg', array(
		'default' => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_widget_fb_bg', array(
		'label' => __('(Widget) Facebook color', 'ace'),
		'section' => 'ace_theme_color',
		'settings' => 'ace_widget_fb_bg',
	)));
	// ================================================================== Social Media
	$wp_customize->add_setting('ace_widget_fb_bg_hover', array(
		'default' => '#0c42b2',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_widget_fb_bg_hover', array(
		'label' => __('(Widget) Facebook hover color', 'ace'),
		'section' => 'ace_theme_color',
		'settings' => 'ace_widget_fb_bg_hover',
	)));
	// ================================================================== Social Media
	$wp_customize->add_setting('ace_widget_email_bg', array(
		'default' => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_widget_email_bg', array(
		'label' => __('(Widget) Email color', 'ace'),
		'section' => 'ace_theme_color',
		'settings' => 'ace_widget_email_bg',
	)));
	// ================================================================== Social Media
	$wp_customize->add_setting('ace_widget_email_bg_hover', array(
		'default' => '#aaaaaa',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_widget_email_bg_hover', array(
		'label' => __('(Widget) Email hover color', 'ace'),
		'section' => 'ace_theme_color',
		'settings' => 'ace_widget_email_bg_hover',
	)));
	// ================================================================== Social Media
	$wp_customize->add_setting('ace_widget_rss_bg', array(
		'default' => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_widget_rss_bg', array(
		'label' => __('(Widget) RSS Feed color', 'ace'),
		'section' => 'ace_theme_color',
		'settings' => 'ace_widget_rss_bg',
	)));
	// ================================================================== Social Media
	$wp_customize->add_setting('ace_widget_rss_bg_hover', array(
		'default' => '#f49000',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_widget_rss_bg_hover', array(
		'label' => __('(Widget) RSS Feed hover color', 'ace'),
		'section' => 'ace_theme_color',
		'settings' => 'ace_widget_rss_bg_hover',
	)));
	// ================================================================== Social Media
	$wp_customize->add_setting('ace_widget_linkedin_bg', array(
		'default' => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_widget_linkedin_bg', array(
		'label' => __('(Widget) LinkedIn color', 'ace'),
		'section' => 'ace_theme_color',
		'settings' => 'ace_widget_linkedin_bg',
	)));
	// ================================================================== Social Media
	$wp_customize->add_setting('ace_widget_linkedin_bg_hover', array(
		'default' => '#0d5a7b',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_widget_linkedin_bg_hover', array(
		'label' => __('(Widget) LinkedIn hover color', 'ace'),
		'section' => 'ace_theme_color',
		'settings' => 'ace_widget_linkedin_bg_hover',
	)));
	// ================================================================== Social Media
	$wp_customize->add_setting('ace_widget_youtube_bg', array(
		'default' => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_widget_youtube_bg', array(
		'label' => __('(Widget) YouTube color', 'ace'),
		'section' => 'ace_theme_color',
		'settings' => 'ace_widget_youtube_bg',
	)));
	// ================================================================== Social Media
	$wp_customize->add_setting('ace_widget_youtube_bg_hover', array(
		'default' => '#ff0000',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_widget_youtube_bg_hover', array(
		'label' => __('(Widget) YouTube hover color', 'ace'),
		'section' => 'ace_theme_color',
		'settings' => 'ace_widget_youtube_bg_hover',
	)));
	// ================================================================== Social Media
	$wp_customize->add_setting('ace_widget_vimeo_bg', array(
		'default' => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_widget_vimeo_bg', array(
		'label' => __('(Widget) Vimeo color', 'ace'),
		'section' => 'ace_theme_color',
		'settings' => 'ace_widget_vimeo_bg',
	)));
	// ================================================================== Social Media
	$wp_customize->add_setting('ace_widget_vimeo_bg_hover', array(
		'default' => '#00c1f8',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_widget_vimeo_bg_hover', array(
		'label' => __('(Widget) Vimeo hover color', 'ace'),
		'section' => 'ace_theme_color',
		'settings' => 'ace_widget_vimeo_bg_hover',
	)));
	// ================================================================== Social Media
	$wp_customize->add_setting('ace_widget_tiktok_bg', array(
		'default' => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_widget_tiktok_bg', array(
		'label' => __('(Widget) TikTok color', 'ace'),
		'section' => 'ace_theme_color',
		'settings' => 'ace_widget_tiktok_bg',
	)));
	// ================================================================== Social Media
	$wp_customize->add_setting('ace_widget_tiktok_bg_hover', array(
		'default' => '#69c9d0',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_widget_tiktok_bg_hover', array(
		'label' => __('(Widget) TikTok hover color', 'ace'),
		'section' => 'ace_theme_color',
		'settings' => 'ace_widget_tiktok_bg_hover',
	)));
	// ================================================================== Social Media
	$wp_customize->add_setting('ace_widget_instagram_bg', array(
		'default' => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_widget_instagram_bg', array(
		'label' => __('(Widget) Instagram color', 'ace'),
		'section' => 'ace_theme_color',
		'settings' => 'ace_widget_instagram_bg',
	)));
	// ================================================================== Social Media
	$wp_customize->add_setting('ace_widget_instagram_bg_hover', array(
		'default' => '#194f7a',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_widget_instagram_bg_hover', array(
		'label' => __('(Widget) Instagram hover color', 'ace'),
		'section' => 'ace_theme_color',
		'settings' => 'ace_widget_instagram_bg_hover',
	)));
	// ================================================================== Social Media
	$wp_customize->add_setting('ace_widget_bloglovin_bg', array(
		'default' => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_widget_bloglovin_bg', array(
		'label' => __('(Widget) BlogLovin color', 'ace'),
		'section' => 'ace_theme_color',
		'settings' => 'ace_widget_bloglovin_bg',
	)));
	// ================================================================== Social Media
	$wp_customize->add_setting('ace_widget_bloglovin_bg_hover', array(
		'default' => '#00c4fd',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_widget_bloglovin_bg_hover', array(
		'label' => __('(Widget) BlogLovin hover color', 'ace'),
		'section' => 'ace_theme_color',
		'settings' => 'ace_widget_bloglovin_bg_hover',
	)));
	// ================================================================== Social Media
	$wp_customize->add_setting('ace_widget_pinterest_bg', array(
		'default' => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_widget_pinterest_bg', array(
		'label' => __('(Widget) Pinterest color', 'ace'),
		'section' => 'ace_theme_color',
		'settings' => 'ace_widget_pinterest_bg',
	)));
	// ================================================================== Social Media
	$wp_customize->add_setting('ace_widget_pinterest_bg_hover', array(
		'default' => '#c70505',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_widget_pinterest_bg_hover', array(
		'label' => __('(Widget) Pinterest hover color', 'ace'),
		'section' => 'ace_theme_color',
		'settings' => 'ace_widget_pinterest_bg_hover',
	)));
	// ================================================================== Social Media
	$wp_customize->add_setting('ace_widget_tumblr_bg', array(
		'default' => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_widget_tumblr_bg', array(
		'label' => __('(Widget) Tumblr color', 'ace'),
		'section' => 'ace_theme_color',
		'settings' => 'ace_widget_tumblr_bg',
	)));
	// ================================================================== Social Media
	$wp_customize->add_setting('ace_widget_tumblr_bg_hover', array(
		'default' => '#304d6b',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_widget_tumblr_bg_hover', array(
		'label' => __('(Widget) Tumblr hover color', 'ace'),
		'section' => 'ace_theme_color',
		'settings' => 'ace_widget_tumblr_bg_hover',
	)));
	// ================================================================== Social Media
	$wp_customize->add_setting('ace_widget_houzz_bg', array(
		'default' => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_widget_houzz_bg', array(
		'label' => __('(Widget) Houzz color', 'ace'),
		'section' => 'ace_theme_color',
		'settings' => 'ace_widget_houzz_bg',
	)));
	// ================================================================== Social Media
	$wp_customize->add_setting('ace_widget_houzz_bg_hover', array(
		'default' => '#7ac142',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_widget_houzz_bg_hover', array(
		'label' => __('(Widget) Houzz hover color', 'ace'),
		'section' => 'ace_theme_color',
		'settings' => 'ace_widget_houzz_bg_hover',
	)));


	// ====================================================================================================================================
	// Register theme customize section
	// ====================================================================================================================================
	$wp_customize->add_section('ace_theme_slider', array(
		'title' => __('Slider settings', 'ace'),
		'priority' => 1008,
		'description' => '',
		'panel' => 'ace_theme_panel',
	));
	// ================================================================== Enable slider
	$wp_customize->add_setting('ace_feature_enable', array(
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'ace_sanitize_checkbox',
	));
	$wp_customize->add_control('ace_feature_enable', array(
		'settings' => 'ace_feature_enable',
		'label' => __('Enable slider', 'ace'),
		'section' => 'ace_theme_slider',
		'type' => 'checkbox',
	));
	// ================================================================== Full-width slider
	$wp_customize->add_setting('ace_feature_full_width', array(
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'ace_sanitize_checkbox',
	));
	$wp_customize->add_control('ace_feature_full_width', array(
		'settings' => 'ace_feature_full_width',
		'label' => __('Full-width slider', 'ace'),
		'section' => 'ace_theme_slider',
		'type' => 'checkbox',
	));
	// ================================================================== Show slider on homepage only
	$wp_customize->add_setting('ace_feature_enable_home', array(
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'ace_sanitize_checkbox',
	));
	$wp_customize->add_control('ace_feature_enable_home', array(
		'settings' => 'ace_feature_enable_home',
		'label' => __('Show slider on homepage only', 'ace'),
		'section' => 'ace_theme_slider',
		'type' => 'checkbox',
	));
	// ================================================================== Show Title
	$wp_customize->add_setting('ace_feature_title_enable', array(
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'ace_sanitize_checkbox',
	));
	$wp_customize->add_control('ace_feature_title_enable', array(
		'settings' => 'ace_feature_title_enable',
		'label' => __('Show caption on slider', 'ace'),
		'section' => 'ace_theme_slider',
		'type' => 'checkbox',
	));
	// ================================================================== Pause
	$wp_customize->add_setting('ace_featured_slide_pause', array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'ace_sanitize_select_slide_pause',
	));
	$wp_customize->add_control('ace_featured_slide_pause', array(
		'settings' => 'ace_featured_slide_pause',
		'label' => __('Pause', 'ace'),
		'section' => 'ace_theme_slider',
		'type' => 'select',
		'default' => '5000',
		'choices' => array(
			'1000' => '1000',
			'2000' => '2000',
			'3000' => '3000',
			'4000' => '4000',
			'5000' => '5000',
			'6000' => '6000',
			'7000' => '7000',
			'8000' => '8000',
			'9000' => '8000',
			'10000' => '10000',
		),
	));
	// ================================================================== Speed
	$wp_customize->add_setting('ace_featured_slide_speed', array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'ace_sanitize_select_slide_speed',
	));
	$wp_customize->add_control('ace_featured_slide_speed', array(
		'settings' => 'ace_featured_slide_speed',
		'label' => __('Speed', 'ace'),
		'section' => 'ace_theme_slider',
		'type' => 'select',
		'default' => '500',
		'choices' => array(
			'100'	=> '100',
			'200'	=> '200',
			'300'	=> '300',
			'400'	=> '400',
			'500'	=> '500',
			'1000' => '1000',
		),
	));
	// ================================================================== Auto slider
	$wp_customize->add_setting('ace_featured_slide_sliding', array(
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'ace_sanitize_checkbox',
	));
	$wp_customize->add_control('ace_featured_slide_sliding', array(
		'settings' => 'ace_featured_slide_sliding',
		'label' => __('Auto slide the slider', 'ace'),
		'section' => 'ace_theme_slider',
		'type' => 'checkbox',
	));
	// ================================================================== Pager navigation
	$wp_customize->add_setting('ace_featured_slide_pager_nav', array(
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'ace_sanitize_checkbox',
	));
	$wp_customize->add_control('ace_featured_slide_pager_nav', array(
		'settings' => 'ace_featured_slide_pager_nav',
		'label' => __('Show pager navigation (the little dots)', 'ace'),
		'section' => 'ace_theme_slider',
		'type' => 'checkbox',
	));
	// ================================================================== Slider navigation
	$wp_customize->add_setting('ace_featured_slide_nav', array(
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'ace_sanitize_checkbox',
	));
	$wp_customize->add_control('ace_featured_slide_nav', array(
		'settings' => 'ace_featured_slide_nav',
		'label' => __('Show slider next and previous navigation', 'ace'),
		'section' => 'ace_theme_slider',
		'type' => 'checkbox',
	));


// ====================================================================================================================================
// Register theme customize section
// ====================================================================================================================================
	$wp_customize->add_section('ace_theme_newsletter', array(
		'title' => __('Newsletter settings', 'ace'),
		'priority' => 1009,
		'description' => '',
		'panel' => 'ace_theme_panel',
	));
	// ================================================================== Newsletter location
	$wp_customize->add_setting('ace_newsletter_location', array(
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'default' => 'Top',
		'sanitize_callback' => 'ace_sanitize_select_newsletter_location',
	));
	$wp_customize->add_control('ace_newsletter_location', array(
		'settings' => 'ace_newsletter_location',
		'label' => __('Newsletter location', 'ace'),
		'section' => 'ace_theme_newsletter',
		'type' => 'select',
		'default' => 'Top',
		'choices' => array(
			'Top' => 'Top',
			'Bottom' => 'Bottom',
			'Both' => 'Both',
		),
	));
	// ================================================================== Newsletter background
	$wp_customize->add_setting('ace_newsletter_bg', array(
		'default' => '#f5eae7',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_newsletter_bg', array(
		'label' => __('Newsletter bar background color', 'ace'),
		'section' => 'ace_theme_newsletter',
		'settings' => 'ace_newsletter_bg',
	)));
	// ================================================================== Newsletter text
	$wp_customize->add_setting('ace_newsletter_text', array(
		'default' => '#333333',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_newsletter_text', array(
		'label' => __('Newsletter text color', 'ace'),
		'section' => 'ace_theme_newsletter',
		'settings' => 'ace_newsletter_text',
	)));
	// ================================================================== Show newsletter on homepage only
	$wp_customize->add_setting('ace_newsletter_home', array(
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'ace_sanitize_checkbox',
	));
	$wp_customize->add_control('ace_newsletter_home', array(
		'settings' => 'ace_newsletter_home',
		'label' => __('Show newsletter on homepage only', 'ace'),
		'section' => 'ace_theme_newsletter',
		'type' => 'checkbox',
	));
	// ================================================================== Newsletter code
	$wp_customize->add_setting('ace_newsletter', array(
    'capability' => 'edit_theme_options',
    'type' => 'option',
		'sanitize_callback' => '',
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'ace_newsletter', array(
		'label' => __('Newsletter', 'ace'),
		'section' => 'ace_theme_newsletter',
		'settings' => 'ace_newsletter',
		'type' => 'textarea',
	)));


if(class_exists('WooCommerce')) {
// ====================================================================================================================================
// Register theme customize section
// ====================================================================================================================================
	$wp_customize->add_section('ace_theme_woocommerce', array(
		'title' => __('WooCommerce settings', 'ace'),
		'priority' => 1010,
		'description' => '',
		'panel' => 'ace_theme_panel',
	));
	// ================================================================== WooCommerce menu cart
  /*
	$wp_customize->add_setting('ace_woo_cart_menu', array(
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'ace_sanitize_checkbox',
	));
	$wp_customize->add_control('ace_woo_cart_menu', array(
		'settings' => 'ace_woo_cart_menu',
		'label' => __('Show cart icon on menu', 'ace'),
		'section' => 'ace_theme_woocommerce',
		'type' => 'checkbox',
	));
  */

	// ================================================================== WooCommerce cart
	$wp_customize->add_setting('ace_woo_cart_float', array(
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'ace_sanitize_checkbox',
	));
	$wp_customize->add_control('ace_woo_cart_float', array(
		'settings' => 'ace_woo_cart_float',
		'label' => __('Show floating cart icon on top right', 'ace'),
		'section' => 'ace_theme_woocommerce',
		'type' => 'checkbox',
	));
	// ================================================================== WooCommerce breadcrumb
	$wp_customize->add_setting('ace_woo_breadcrumb', array(
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'ace_sanitize_checkbox',
	));
	$wp_customize->add_control('ace_woo_breadcrumb', array(
		'settings' => 'ace_woo_breadcrumb',
		'label' => __('Display shop page breadcrumb', 'ace'),
		'section' => 'ace_theme_woocommerce',
		'type' => 'checkbox',
	));
	// ================================================================== WooCommerce layout
	$wp_customize->add_setting('ace_woo_full_width', array(
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'ace_sanitize_checkbox',
	));
	$wp_customize->add_control('ace_woo_full_width', array(
		'settings' => 'ace_woo_full_width',
		'label' => __('Remove sidebar on product page', 'ace'),
		'section' => 'ace_theme_woocommerce',
		'type' => 'checkbox',
	));
}


if(class_exists('LifterLMS')) {
// ====================================================================================================================================
// Register theme customize section
// ====================================================================================================================================
	$wp_customize->add_section('ace_theme_lifterlms', array(
		'title' => __('LifterLMS settings', 'ace'),
		'priority' => 1011,
		'description' => '',
		'panel' => 'ace_theme_panel',
	));
	// ================================================================== WooCommerce menu cart
	$wp_customize->add_setting('ace_lifterlms_course_width', array(
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'ace_sanitize_checkbox',
	));
	$wp_customize->add_control('ace_lifterlms_course_width', array(
		'settings' => 'ace_lifterlms_course_width',
		'label' => __('Show full width on course page', 'ace'),
		'section' => 'ace_theme_lifterlms',
		'type' => 'checkbox',
	));
	// ================================================================== WooCommerce menu cart
	$wp_customize->add_setting('ace_lifterlms_lesson_width', array(
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'ace_sanitize_checkbox',
	));
	$wp_customize->add_control('ace_lifterlms_lesson_width', array(
		'settings' => 'ace_lifterlms_lesson_width',
		'label' => __('Show full width on lesson page', 'ace'),
		'section' => 'ace_theme_lifterlms',
		'type' => 'checkbox',
	));
}


// ====================================================================================================================================
// Register theme customize section
// ====================================================================================================================================
	$wp_customize->add_section('ace_theme_extra', array(
		'title' => __('Extra inputs settings', 'ace'),
		'priority' => 1040,
		'description' => '',
		'panel' => 'ace_theme_panel',
	));
	// ================================================================== Header script(s)
	$wp_customize->add_setting('ace_header_scripts', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => '',
		'type' => 'option',
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'ace_header_scripts', array(
		'label' => __('Header script(s)', 'ace'),
		'section' => 'ace_theme_extra',
		'settings' => 'ace_header_scripts',
		'type' => 'textarea',
	)));
	// ================================================================== Footer script(s)
	$wp_customize->add_setting('ace_footer_scripts', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => '',
		'type' => 'option',
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'ace_footer_scripts', array(
		'label' => __('Footer script(s)', 'ace'),
		'section' => 'ace_theme_extra',
		'settings' => 'ace_footer_scripts',
		'type' => 'textarea',
	)));
	// ================================================================== Header banner
	$wp_customize->add_setting('ace_header_banner', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => '',
		'type' => 'option',
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'ace_header_banner', array(
		'label' => __('Header banner', 'ace'),
		'section' => 'ace_theme_extra',
		'settings' => 'ace_header_banner',
		'type' => 'textarea',
	)));
	// ================================================================== Header notice
	$wp_customize->add_setting('ace_header_notice', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_kses_post',
		'type' => 'option',
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'ace_header_notice', array(
		'label' => __('Header notice bar', 'ace'),
		'section' => 'ace_theme_extra',
		'settings' => 'ace_header_notice',
		'type' => 'textarea',
	)));
	// ================================================================== Header notice background
	$wp_customize->add_setting('ace_header_notice_bg', array(
		'default' => '#f6f3f0',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_header_notice_bg', array(
		'label' => __('Header sticky notice bar background color', 'ace'),
		'section' => 'ace_theme_extra',
		'settings' => 'ace_header_notice_bg',
	)));
	// ================================================================== Header notice text
	$wp_customize->add_setting('ace_header_notice_text', array(
		'default' => '#444444',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_header_notice_text', array(
		'label' => __('Header sticky notice bar text color', 'ace'),
		'section' => 'ace_theme_extra',
		'settings' => 'ace_header_notice_text',
	)));


	// ====================================================================================================================================
	// Register theme customize section
	// ====================================================================================================================================
	$wp_customize->add_section('ace_cookie_consent', array(
		'title' => __('Cookie consent settings', 'ace'),
		'priority' => 1050,
		'description' => '',
		'panel' => 'ace_theme_panel',
	));
	// ================================================================== Enable cookie consent bar
	$wp_customize->add_setting('ace_enable_consent', array(
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'ace_sanitize_checkbox',
	));
	$wp_customize->add_control('ace_enable_consent', array(
		'settings' => 'ace_enable_consent',
		'label' => __('Enable cookie consent bar', 'ace'),
		'section' => 'ace_cookie_consent',
		'type' => 'checkbox',
	));
	// ================================================================== Cookie expire day
	$wp_customize->add_setting('ace_cookie_expire', array(
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'default' => '',
		'sanitize_callback' => 'ace_sanitize_select_cookie',
	));
	$wp_customize->add_control('ace_cookie_expire', array(
		'settings' => 'ace_cookie_expire',
		'label' => __('Cookie expire day', 'ace'),
		'section' => 'ace_cookie_consent',
		'type' => 'select',
		'default' => '7',
		'choices' => array(
			'7' => '7',
			'14' => '14',
			'30' => '30',
			'60' => '60',
			'90' => '90',
			'365' => '365',
		),
	));
	// ================================================================== Cookie content
	$wp_customize->add_setting('ace_cookie_content', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'wp_kses_post',
        'type' => 'option',
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'ace_cookie_content', array(
		'label' => __('Cookie consent', 'ace'),
		'section' => 'ace_cookie_consent',
		'settings' => 'ace_cookie_content',
		'type' => 'textarea',
	)));
	// ================================================================== Close button text
	$wp_customize->add_setting('ace_cookie_dismiss', array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_kses_post',
		'type' => 'option',
	));
	$wp_customize->add_control('ace_cookie_dismiss', array(
		'label' => __('Close button text', 'ace'),
		'section' => 'ace_cookie_consent',
		'settings' => 'ace_cookie_dismiss',
	));
	// ================================================================== Read more text
	$wp_customize->add_setting('ace_cookie_read', array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
	));
	$wp_customize->add_control('ace_cookie_read', array(
		'label' => __('Read more text', 'ace'),
		'section' => 'ace_cookie_consent',
		'settings' => 'ace_cookie_read',
	));
	// ================================================================== Cookie policy page
	$wp_customize->add_setting('ace_cookie_read_link', array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
		'type' => 'option',
	));
	$wp_customize->add_control('ace_cookie_read_link', array(
		'label' => __('Cookie policy page', 'ace'),
		'section' => 'ace_cookie_consent',
		'settings' => 'ace_cookie_read_link',
	));
	// ================================================================== Cookie bar background colour
	$wp_customize->add_setting('ace_cookie_bg', array(
		'default' => '#222222',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_cookie_bg', array(
		'label' => __('Cookie bar background colour', 'ace'),
		'section' => 'ace_cookie_consent',
		'settings' => 'ace_cookie_bg',
	)));
	// ================================================================== Cookie bar background colour
	$wp_customize->add_setting('ace_cookie_text', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_cookie_text', array(
		'label' => __('Cookie bar text colour', 'ace'),
		'section' => 'ace_cookie_consent',
		'settings' => 'ace_cookie_text',
	)));
	// ================================================================== Cookie bar button colour
	$wp_customize->add_setting('ace_cookie_button', array(
		'default' => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_cookie_button', array(
		'label' => __('Cookie bar button colour', 'ace'),
		'section' => 'ace_cookie_consent',
		'settings' => 'ace_cookie_button',
	)));
	// ================================================================== Cookie bar button text colour
	$wp_customize->add_setting('ace_cookie_button_text', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ace_cookie_button_text', array(
		'label' => __('Cookie bar background colour', 'ace'),
		'section' => 'ace_cookie_consent',
		'settings' => 'ace_cookie_button_text',
	)));

// ==================================================================
// END register theme customize
// ==================================================================
}
add_action('customize_register', 'ace_customize_register');
