<?php
// ==================================================================
// Add Colorpicker
// ==================================================================
function ace_color_picker() {
	wp_enqueue_script('wp-color-picker');
	wp_enqueue_style('wp-color-picker');
}
add_action('admin_enqueue_scripts', 'ace_color_picker');

// ==================================================================
// About author
// ==================================================================
class ace_author extends WP_Widget {

	function __construct() {
		$widget_ops = array('description' => __('Show a short biography of author', 'ace'));
		WP_Widget::__construct(false, __('Ace Blog Author', 'ace'), $widget_ops);
	}

	function widget($args, $data) {
		extract($args);
		$title          = $data['title'];
		$bio            = $data['bio'];
		$pic            = $data['pic'];
		$read_more_text = $data['read_more_text'];
		$read_more_url  = $data['read_more_url'];

		echo $before_widget; ?>

		<?php if($title) { echo $before_title . $title . $after_title; } ?>

		<?php if($data['pic']) { ?><img src="<?php echo $pic; ?>" class="aligncenter" alt="<?php echo $title; ?>" /><?php } ?>
		<p class="ace-author-widget-text"><?php echo $bio; ?>&nbsp;<?php if($data['read_more_url']) echo '<a href="' . $read_more_url . '">' . $read_more_text . '</a>'; ?></p>
		<div class="clearfix">&nbsp;</div>

		<?php echo $after_widget; }

	function update($new_data, $old_data) { return $new_data; }

	function form($data) {
		$title          = isset($data['title']) ? esc_attr($data['title']) : '';
		$bio            = isset($data['bio']) ? esc_attr($data['bio']) : '';
		$pic            = isset($data['pic']) ? esc_attr($data['pic']) : '';
		$read_more_text = isset($data['read_more_text']) ? esc_attr($data['read_more_text']) : '';
		$read_more_url  = isset($data['read_more_url']) ? esc_attr($data['read_more_url']) : '';
		?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'ace'); ?>:</label>
			<input type="text" name="<?php echo $this->get_field_name('title'); ?>"  value="<?php echo esc_attr($title); ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('pic'); ?>"><?php _e('Picture', 'ace'); ?>:</label>
			<p><em><?php _e('Please upload image via Media -> Add New and get the image file URL', 'ace'); ?></em></p>
			<input type="text" name="<?php echo $this->get_field_name('pic'); ?>"  value="<?php echo esc_attr($pic); ?>" class="widefat" id="<?php echo $this->get_field_id('pic'); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('bio'); ?>"><?php _e('Short Description', 'ace'); ?>:</label>
			<textarea name="<?php echo $this->get_field_name('bio'); ?>" class="widefat" rows="5" id="<?php echo $this->get_field_id('bio'); ?>"><?php echo $bio; ?></textarea>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('read_more_text'); ?>"><?php _e('Read More Text (optional)', 'ace'); ?>:</label>
			<input type="text" name="<?php echo $this->get_field_name('read_more_text'); ?>"  value="<?php echo esc_attr($read_more_text); ?>" class="widefat" id="<?php echo $this->get_field_id('read_more_text'); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('read_more_url'); ?>"><?php _e('Read More URL (optional)', 'ace'); ?>:</label>
			<input type="text" name="<?php echo $this->get_field_name('read_more_url'); ?>"  value="<?php echo esc_attr($read_more_url); ?>" class="widefat" id="<?php echo $this->get_field_id('read_more_url'); ?>" />
		</p>

	<?php }

}

function ace_author() {
	register_widget('ace_author');
}
add_action('widgets_init','ace_author');

// ==================================================================
// Location
// ==================================================================
class ace_contact_location extends WP_Widget {

	function __construct() {
		$widget_ops = array('description' => __('This is a contact and location widget', 'ace'));
		WP_Widget::__construct(false, __('Ace Contact Location', 'ace'), $widget_ops);
	}

	function widget($args, $data) {
		extract($args);
		$title    = $data['title'];
		$location = $data['location'];
		$email    = $data['email'];
		$phone    = $data['phone'];
		$fax      = $data['fax'];

		echo $before_widget;

		if($title) { echo $before_title . $title . $after_title; } ?>

		<ul class="location">
			<?php if($data['location']) { ?><li><span class="fas fa-home"></span> <?php $line_break = nl2br($data['location']); echo $line_break; ?></li><?php } ?>
			<?php if($data['email']) echo '<li><span class="fas fa-envelope"></span> ' . antispambot($email) . '</li>'; ?>
			<?php if($data['phone']) echo '<li><span class="fas fa-phone"></span> ' . $phone . '</li>'; ?>
			<?php if($data['fax']) echo '<li><span class="fas fa-fax"></span> ' . $fax . '</li>'; ?>
		</ul>
		<div class="clearfix">&nbsp;</div>

		<?php echo $after_widget; }

	function update($new_data, $old_data) { return $new_data; }

	function form($data) {
		$title    = isset($data['title']) ? esc_attr($data['title']) : '';
		$location = isset($data['location']) ? esc_attr($data['location']) : '';
		$email    = isset($data['email']) ? esc_attr($data['email']) : '';
		$phone    = isset($data['phone']) ? esc_attr($data['phone']) : '';
		$fax      = isset($data['fax']) ? esc_attr($data['fax']) : '';
		?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'ace'); ?>:</label>
			<input type="text" name="<?php echo $this->get_field_name('title'); ?>"  value="<?php echo esc_attr($title); ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('location'); ?>"><?php _e('Address', 'ace'); ?>:</label>
			<textarea name="<?php echo $this->get_field_name('location'); ?>" class="widefat" rows="5" id="<?php echo $this->get_field_id('location'); ?>"><?php echo $location; ?></textarea>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('email'); ?>"><?php _e('Email address', 'ace'); ?>:</label>
			<input type="text" name="<?php echo $this->get_field_name('email'); ?>"  value="<?php echo esc_attr($email); ?>" class="widefat" id="<?php echo $this->get_field_id('email'); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('phone'); ?>"><?php _e('Phone number', 'ace'); ?>:</label>
			<input type="text" name="<?php echo $this->get_field_name('phone'); ?>"  value="<?php echo esc_attr($phone); ?>" class="widefat" id="<?php echo $this->get_field_id('phone'); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('fax'); ?>"><?php _e('Fax number', 'ace'); ?>:</label>
			<input type="text" name="<?php echo $this->get_field_name('fax'); ?>"  value="<?php echo esc_attr($fax); ?>" class="widefat" id="<?php echo $this->get_field_id('fax'); ?>" />
		</p>

	<?php }

}

function ace_contact_location() {
	register_widget('ace_contact_location');
}
add_action('widgets_init','ace_contact_location');

// ==================================================================
// Ace Featured
// ==================================================================
class ace_featured extends WP_Widget {

	function __construct() {
		$widget_ops = array('description' => __('Featured widget', 'ace'));
		WP_Widget::__construct(false, __('Ace Featured', 'ace'), $widget_ops);
	}

	function widget($args, $data) {
		extract($args);
		$title  = $data['title'];
		$pic    = $data['pic'];
		$url    = $data['url'];

		echo $before_widget; ?>

		<section class="featured-widgets">

		<?php if($url) { echo '<a href="' . $url . '">'; } ?>
			<?php if($pic) { ?><img src="<?php echo $pic; ?>" alt="<?php if($title) { echo $title; } ?>" /><?php } ?>
		<?php if($url) { echo '</a>'; } ?>

		<?php if($url) { echo '<a href="' . $url . '">'; } ?>
			<?php if($title) { echo '<h6 class="featured-widgets-title">' . $title . '</h6>'; } ?>
		<?php if($url) { echo '</a>'; } ?>

		</section>

		<?php echo $after_widget; }

	function update($new_data, $old_data) { return $new_data; }

	function form($data) {
		$title  = isset($data['title']) ? esc_attr($data['title']) : '';
		$pic    = isset($data['pic']) ? esc_attr($data['pic']) : '';
		$url    = isset($data['url']) ? esc_attr($data['url']) : '';
		?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'ace'); ?>:</label>
			<input type="text" name="<?php echo $this->get_field_name('title'); ?>"  value="<?php echo esc_attr($title); ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('pic'); ?>"><?php _e('Picture', 'ace'); ?>:</label>
			<input type="text" name="<?php echo $this->get_field_name('pic'); ?>"  value="<?php echo esc_attr($pic); ?>" class="widefat" id="<?php echo $this->get_field_id('pic'); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('url'); ?>"><?php _e('Image/Title URL (optional)', 'ace'); ?>:</label>
			<input type="text" name="<?php echo $this->get_field_name('url'); ?>"  value="<?php echo esc_attr($url); ?>" class="widefat" id="<?php echo $this->get_field_id('url'); ?>" />
		</p>

	<?php }

}

function ace_featured() {
	register_widget('ace_featured');
}
add_action('widgets_init','ace_featured');

// ==================================================================
// Ace testimonial
// ==================================================================
class ace_testimonial extends WP_Widget {

	function __construct() {
		$widget_ops = array('description' => __('Testimonial widget', 'ace'));
		WP_Widget::__construct(false, __('Ace Testimonial', 'ace'), $widget_ops);
	}

	function widget($args, $data) {
		extract($args);
			$title                = $data['title'];
			$testimonial          = $data['testimonial'];
			$name                 = $data['name'];
			$url                  = $data['url'];
			$testimonial_url_text = $data['testimonial_url_text'];
			$testimonial_url      = $data['testimonial_url'];
			$bg_color             = $data['bg_color'];

		echo $before_widget; ?>

		<section class="testimonial-widgets" style="background:<?php if($bg_color) { echo $bg_color; } else { echo '#fff9f3'; } ?>">
			<section class="testimonial-widgets-inner">

				<?php if($title) { echo '<h3 class="testimonial-widgets-title">' . $title . '</h3>'; } ?>

				<?php if($testimonial) { echo '<p>' . $testimonial . '</p>'; } ?>
				<?php if($url) { echo '<p><a href="' . $url . '">'; } ?><?php if($name) { echo $name; } ?><?php if($url) { echo '</a></p>'; } ?>

				<?php if($testimonial_url) { echo '<p><a href="' . $testimonial_url . '" class="post-button">'; } ?>
				<?php if($testimonial_url_text) { echo $testimonial_url_text; } ?>
				<?php if($testimonial_url) { echo '</a></p>'; } ?>

			</section>
		</section>

	<?php echo $after_widget; }

	function update($new_data, $old_data) { return $new_data; }

	function form($data) {
		$title                = isset($data['title']) ? esc_attr($data['title']) : '';
		$testimonial          = isset($data['testimonial']) ? esc_attr($data['testimonial']) : '';
		$name                 = isset($data['name']) ? esc_attr($data['name']) : '';
		$url                  = isset($data['url']) ? esc_attr($data['url']) : '';
		$testimonial_url_text = isset($data['testimonial_url_text']) ? esc_attr($data['testimonial_url_text']) : '';
		$testimonial_url      = isset($data['testimonial_url']) ? esc_attr($data['testimonial_url']) : '';
		$bg_color             = isset($data['bg_color']) ? esc_attr($data['bg_color']) : '';
		?>

		<script type='text/javascript'>
		jQuery(document).ready(function($) {
			$('.testi-bg').wpColorPicker();
		});
		</script>

		<p>
			<label for="<?php echo $this->get_field_id('bg_color'); ?>"><?php _e('Background color', 'ace'); ?>:</label><br />
			<input type="text" class="testi-bg" name="<?php echo $this->get_field_name('bg_color'); ?>"  value="<?php if($bg_color) { echo esc_attr($bg_color); } else { echo '#fff9f3'; } ?>" class="widefat" id="<?php echo $this->get_field_id('bg_color'); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'ace'); ?>:</label>
			<input type="text" name="<?php echo $this->get_field_name('title'); ?>"  value="<?php echo esc_attr($title); ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('testimonial'); ?>"><?php _e('Testimonial', 'ace'); ?>:</label>
			<textarea name="<?php echo $this->get_field_name('testimonial'); ?>" class="widefat" rows="5" id="<?php echo $this->get_field_id('testimonial'); ?>"><?php echo $testimonial; ?></textarea>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('name'); ?>"><?php _e('Name', 'ace'); ?>:</label>
			<input type="text" name="<?php echo $this->get_field_name('name'); ?>"  value="<?php echo esc_attr($name); ?>" class="widefat" id="<?php echo $this->get_field_id('name'); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('url'); ?>"><?php _e('URL', 'ace'); ?>:</label>
			<input type="text" name="<?php echo $this->get_field_name('url'); ?>"  value="<?php echo esc_attr($url); ?>" class="widefat" id="<?php echo $this->get_field_id('url'); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('testimonial_url_text'); ?>"><?php _e('Testimonial button text', 'ace'); ?>:</label>
			<input type="text" name="<?php echo $this->get_field_name('testimonial_url_text'); ?>"  value="<?php echo esc_attr($testimonial_url_text); ?>" class="widefat" id="<?php echo $this->get_field_id('testimonial_url_text'); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('testimonial_url'); ?>"><?php _e('Testimonial page URL', 'ace'); ?>:</label>
			<input type="text" name="<?php echo $this->get_field_name('testimonial_url'); ?>"  value="<?php echo esc_attr($testimonial_url); ?>" class="widefat" id="<?php echo $this->get_field_id('testimonial_url'); ?>" />
		</p>

	<?php }

}

function ace_testimonial() {
	register_widget('ace_testimonial');
}
add_action('widgets_init','ace_testimonial');

// ==================================================================
// Social network
// ==================================================================
class ace_social extends WP_Widget {

	function __construct() {
		$widget_ops = array('description' => __('Show social network like Twitter, Facebook, RSS, etc.', 'ace'));
		WP_Widget::__construct(false, __('Ace Social Networks', 'ace'), $widget_ops);
	}

	function widget($args, $data) {
		extract($args);
			$title				= isset($data['title']) ? $data['title'] : '';
			$new_windows	= isset($data['new_windows']) ? $data['new_windows'] : '';
			$rss					= isset($data['rss']) ? $data['rss'] : '';
			$email				= isset($data['email']) ? $data['email'] : '';
			$google				= isset($data['google']) ? $data['google'] : '';
			$facebook			= isset($data['facebook']) ? $data['facebook'] : '';
			$twitter			= isset($data['twitter']) ? $data['twitter'] : '';
			$tiktok				= isset($data['tiktok']) ? $data['tiktok'] : '';
			$linkedin			= isset($data['linkedin']) ? $data['linkedin'] : '';
			$youtube			= isset($data['youtube']) ? $data['youtube'] : '';
			$vimeo				= isset($data['vimeo']) ? $data['vimeo'] : '';
			$instagram		= isset($data['instagram']) ? $data['instagram'] : '';
			$bloglovin		= isset($data['bloglovin']) ? $data['bloglovin'] : '';
			$pinterest		= isset($data['pinterest']) ? $data['pinterest'] : '';
			$tumblr				= isset($data['tumblr']) ? $data['tumblr'] : '';
			$houzz				= isset($data['houzz']) ? $data['houzz'] : '';

		echo $before_widget;

		if($title) { echo $before_title . $title . $after_title; } ?>

		<div class="textwidget social-icons-wrap">
			<div class="ace-social-icons">
				<?php if(isset($data['twitter']) ? $data['twitter'] : '') { ?><a href="<?php echo esc_url($twitter); ?>" class="fab fa-twitter radius-50" <?php if(isset($data['new_windows'])) echo 'target="_blank"'; ?>><span>Twitter</span></a><?php } ?>
				<?php if(isset($data['facebook']) ? $data['facebook'] : '') { ?><a href="<?php echo esc_url($facebook); ?>" class="fab fa-facebook-f radius-50" <?php if(isset($data['new_windows'])) echo 'target="_blank"'; ?>><span>Facebook</span></a><?php } ?>
				<?php if(isset($data['instagram']) ? $data['instagram'] : '') { ?><a href="<?php echo esc_url($instagram); ?>" class="fab fa-instagram radius-50" <?php if(isset($data['new_windows'])) echo 'target="_blank"'; ?>><span>Instagram</span></a><?php } ?>
				<?php if(isset($data['pinterest']) ? $data['pinterest'] : '') { ?><a href="<?php echo esc_url($pinterest); ?>" class="fab fa-pinterest-p radius-50" <?php if(isset($data['new_windows'])) echo 'target="_blank"'; ?>><span>Pinterest</span></a><?php } ?>
				<?php if(isset($data['youtube']) ? $data['youtube'] : '') { ?><a href="<?php echo esc_url($youtube); ?>" class="fab fa-youtube radius-50" <?php if(isset($data['new_windows'])) echo 'target="_blank"'; ?>><span>YouTube</span></a><?php } ?>
				<?php if(isset($data['vimeo']) ? $data['vimeo'] : '') { ?><a href="<?php echo esc_url($vimeo); ?>" class="fab fa-vimeo-v radius-50" <?php if(isset($data['new_windows'])) echo 'target="_blank"'; ?>><span>Vimeo</span></a><?php } ?>
				<?php if(isset($data['tiktok']) ? $data['tiktok'] : '') { ?><a href="<?php echo esc_url($tiktok); ?>" class="fab fa-tiktok radius-50" <?php if(isset($data['new_windows'])) echo 'target="_blank"'; ?>><span>TikTok</span></a><?php } ?>
				<?php if(isset($data['google']) ? $data['google'] : '') { ?><a href="<?php echo esc_url($google); ?>" class="fab fa-google-plus-g radius-50" <?php if(isset($data['new_windows'])) echo 'target="_blank"'; ?>><span>Google Plus</span></a><?php } ?>
				<?php if(isset($data['linkedin']) ? $data['linkedin'] : '') { ?><a href="<?php echo esc_url($linkedin); ?>" class="fab fa-linkedin-in radius-50" <?php if(isset($data['new_windows'])) echo 'target="_blank"'; ?>><span>LinkedIn</span></a><?php } ?>
				<?php if(isset($data['bloglovin']) ? $data['bloglovin'] : '') { ?><a href="<?php echo esc_url($bloglovin); ?>" class="fas fa-plus radius-50" <?php if(isset($data['new_windows'])) echo 'target="_blank"'; ?>><span>BlogLovin</span></a><?php } ?>
				<?php if(isset($data['tumblr']) ? $data['tumblr'] : '') { ?><a href="<?php echo esc_url($tumblr); ?>" class="fab fa-tumblr radius-50" <?php if(isset($data['new_windows'])) echo 'target="_blank"'; ?>><span>Tumblr</span></a><?php } ?>
				<?php if(isset($data['houzz']) ? $data['houzz'] : '') { ?><a href="<?php echo esc_url($houzz); ?>" class="fab fa-houzz radius-50" <?php if(isset($data['new_windows'])) echo 'target="_blank"'; ?>><span>Houzz</span></a><?php } ?>
				<?php if(isset($data['rss']) ? $data['rss'] : '') { ?><a href="<?php echo esc_url($rss); ?>" class="fas fa-rss radius-50" <?php if(isset($data['new_windows'])) echo 'target="_blank"'; ?>><span>Twitter</span></a><?php } ?>
				<?php if(isset($data['email']) ? $data['email'] : '') { ?><a href="mailto:<?php echo antispambot($email); ?>" class="fas fa-envelope radius-50" <?php if(isset($data['new_windows'])) echo 'target="_blank"'; ?>><span>Email</span></a><?php } ?>
			</div>
		</div>

	<?php echo $after_widget; }

	function update($new_data, $old_data) { return $new_data; }

	function form($data) {
		$title				= isset($data['title']) ? esc_attr($data['title']) : '';
		$new_windows	= isset($data['new_windows']) ? esc_attr($data['new_windows']) : '';
		$rss					= isset($data['rss']) ? esc_attr($data['rss']) : '';
		$email				= isset($data['email']) ? esc_attr($data['email']) : '';
		$facebook			= isset($data['facebook']) ? esc_attr($data['facebook']) : '';
		$google				= isset($data['google']) ? esc_attr($data['google']) : '';
		$twitter			= isset($data['twitter']) ? esc_attr($data['twitter']) : '';
		$tiktok				= isset($data['tiktok']) ? esc_attr($data['tiktok']) : '';
		$linkedin			= isset($data['linkedin']) ? esc_attr($data['linkedin']) : '';
		$youtube			= isset($data['youtube']) ? esc_attr($data['youtube']) : '';
		$vimeo				= isset($data['vimeo']) ? esc_attr($data['vimeo']) : '';
		$instagram		= isset($data['instagram']) ? esc_attr($data['instagram']) : '';
		$bloglovin		= isset($data['bloglovin']) ? esc_attr($data['bloglovin']) : '';
		$pinterest		= isset($data['pinterest']) ? esc_attr($data['pinterest']) : '';
		$tumblr				= isset($data['tumblr']) ? esc_attr($data['tumblr']) : '';
		$houzz				= isset($data['houzz']) ? esc_attr($data['houzz']) : '';
		?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'ace'); ?>:</label>
			<input type="text" name="<?php echo $this->get_field_name('title'); ?>"  value="<?php echo esc_attr($title); ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('new_windows'); ?>">
			<?php if(isset($data['new_windows'])){ $checked = "checked=\"checked\""; } else { $checked = ""; } ?>
			<input type="checkbox" name="<?php echo $this->get_field_name('new_windows'); ?>" value="true" id="<?php echo $this->get_field_id('new_windows'); ?>"  <?php echo $checked; ?> />
			<?php _e('Open links in new windows', 'ace'); ?></label>
		</p>
		<p style="background:#fcf8e3; color:#c09853; border:1px solid #fbeee0; padding:5px;"><em><?php _e('Insert full URL include http:// except for email', 'ace'); ?></em></p>
		<p>
			<label for="<?php echo $this->get_field_id('email'); ?>"><?php _e('Email', 'ace'); ?>:</label>
			<input type="text" name="<?php echo $this->get_field_name('email'); ?>"  value="<?php echo esc_attr($email); ?>" class="widefat" id="<?php echo $this->get_field_id('email'); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('rss'); ?>"><?php _e('Custom RSS feed', 'ace'); ?>:</label>
			<input type="text" name="<?php echo $this->get_field_name('rss'); ?>"  value="<?php echo esc_attr($rss); ?>" class="widefat" id="<?php echo $this->get_field_id('rss'); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('facebook'); ?>"><?php _e('Facebook', 'ace'); ?>:</label>
			<input type="text" name="<?php echo $this->get_field_name('facebook'); ?>"  value="<?php echo esc_attr($facebook); ?>" class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('twitter'); ?>"><?php _e('Twitter', 'ace'); ?>:</label>
			<input type="text" name="<?php echo $this->get_field_name('twitter'); ?>"  value="<?php echo esc_attr($twitter); ?>" class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('tiktok'); ?>"><?php _e('TikTok', 'ace'); ?>:</label>
			<input type="text" name="<?php echo $this->get_field_name('tiktok'); ?>"  value="<?php echo esc_attr($tiktok); ?>" class="widefat" id="<?php echo $this->get_field_id('tiktok'); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('google'); ?>"><?php _e('Google Plus', 'ace'); ?>:</label>
			<input type="text" name="<?php echo $this->get_field_name('google'); ?>"  value="<?php echo esc_attr($google); ?>" class="widefat" id="<?php echo $this->get_field_id('google'); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('linkedin'); ?>"><?php _e('Linkedin', 'ace'); ?>:</label>
			<input type="text" name="<?php echo $this->get_field_name('linkedin'); ?>"  value="<?php echo esc_attr($linkedin); ?>" class="widefat" id="<?php echo $this->get_field_id('linkedin'); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('youtube'); ?>"><?php _e('YouTube', 'ace'); ?>:</label>
			<input type="text" name="<?php echo $this->get_field_name('youtube'); ?>"  value="<?php echo esc_attr($youtube); ?>" class="widefat" id="<?php echo $this->get_field_id('youtube'); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('vimeo'); ?>"><?php _e('Vimeo', 'ace'); ?>:</label>
			<input type="text" name="<?php echo $this->get_field_name('vimeo'); ?>"  value="<?php echo esc_attr($vimeo); ?>" class="widefat" id="<?php echo $this->get_field_id('vimeo'); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('instagram'); ?>"><?php _e('Instagram', 'ace'); ?>:</label>
			<input type="text" name="<?php echo $this->get_field_name('instagram'); ?>"  value="<?php echo esc_attr($instagram); ?>" class="widefat" id="<?php echo $this->get_field_id('instagram'); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('pinterest'); ?>"><?php _e('Pinterest', 'ace'); ?>:</label>
			<input type="text" name="<?php echo $this->get_field_name('pinterest'); ?>"  value="<?php echo esc_attr($pinterest); ?>" class="widefat" id="<?php echo $this->get_field_id('pinterest'); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('houzz'); ?>"><?php _e('Houzz', 'ace'); ?>:</label>
			<input type="text" name="<?php echo $this->get_field_name('houzz'); ?>"  value="<?php echo esc_attr($houzz); ?>" class="widefat" id="<?php echo $this->get_field_id('houzz'); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('tumblr'); ?>"><?php _e('Tumblr', 'ace'); ?>:</label>
			<input type="text" name="<?php echo $this->get_field_name('tumblr'); ?>"  value="<?php echo esc_attr($tumblr); ?>" class="widefat" id="<?php echo $this->get_field_id('tumblr'); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('bloglovin'); ?>"><?php _e('Bloglovin', 'ace'); ?>:</label>
			<input type="text" name="<?php echo $this->get_field_name('bloglovin'); ?>"  value="<?php echo esc_attr($bloglovin); ?>" class="widefat" id="<?php echo $this->get_field_id('bloglovin'); ?>" />
		</p>

	<?php }

}

function ace_social() {
	register_widget('ace_social');
}
add_action('widgets_init','ace_social');
