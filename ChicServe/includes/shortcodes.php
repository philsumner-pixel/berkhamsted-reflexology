<?php
// ==================================================================
// Shortcodes auto formatting
// ==================================================================
function parse_shortcode_content($content) {
	$content = trim(wpautop(do_shortcode($content)));
	if(substr($content, 0, 4) == '</p>')
		$content = substr( $content, 4);
	if(substr($content, -3, 3) == '<p>')
		$content = substr($content, 0, -3);
		$content = str_replace(array('<p></p>'), '', $content);
		$content = str_replace(array('<p>  </p>'), '', $content);
	return $content;
}
add_filter('the_content', 'shortcode_unautop', 100);

// ==================================================================
// Slider
// ==================================================================
function slide($atts, $content = null) {
	$content = parse_shortcode_content($content);
	extract(shortcode_atts(array('id'  => 'Slide_ID'), $atts));

	$output = '';
	$output .= '
		<section class="sc-flexslider">
		<ul class="'.$id.'">
			'.do_shortcode($content).'
		</ul>
		</section>
	';
	$output .= '
		<script type="text/javascript">
		/* <![CDATA[ */
		var $ = jQuery.noConflict();
		jQuery( document ).ready( function( $ ) {
			$(".sc-flexslider").flexslider({
				namespace:		"sc-flex-",
				selector:		".'.$id.' > li",
				smoothHeight:	true,
				animation:		"fade",
				prevText:		"<i class=\"fas fa-angle-left fa-2x\"></i>",
				nextText:		"<i class=\"fas fa-angle-right fa-2x\"></i>",
			});
		});
		/* ]]> */
		</script>
	';
	return $output;

}
add_shortcode('slide', 'slide');

// ==================================================================
// Slider images
// ==================================================================
function slide_image($atts, $content = null) {
	$content = parse_shortcode_content($content);
	extract(shortcode_atts(array(
		'src'     => 'http://image.jpg',
		'title'   => 'image title',
		'caption' => 'image caption',
		'url'     => 'url',
	), $atts));

	$output = '';
	$output .= '<li>';

	if($url == ''):
		$output .= '';
	elseif($url !== ''):
		$output .= '<a href="'.$url.'">';
	endif;

	$output .= '<img src="'.$src.'" alt="'.$title.'" />';

	if($url == ''):
		$output .= '';
	elseif($url !== ''):
		$output .= '</a>';
	endif;

	if($caption == ''):
		$output .= '';
	elseif($caption !== ''):
		$output .= '<p class="caption">'.$caption.'</p>';
	endif;

	$output .= '</li>';
	return $output;
//return '<li><img src="'.$src.'" alt="'.$title.'" /><p class="caption">'.$caption.'</p></li>';
}
add_shortcode('images', 'slide_image');

// ==================================================================
// Full width
// ==================================================================
function full_width_code($atts, $content = null) {
	extract(shortcode_atts(array(
		'background' => 'ffffff',
		'image' => ''
	), $atts));
	$content = parse_shortcode_content($content);
	return '<section style="background-color:'.$background.'; background-image:url('.$image.');" class="full-width-bar"><article class="full-width-content" style="background-color:'.$background.';">'.do_shortcode($content).'</article></section>';
}
add_shortcode('full_width', 'full_width_code');

// ==================================================================
// Split content left/right
// ==================================================================
function column_left($atts, $content = null) {
	// $content = parse_shortcode_content($content);
	return '<div class="split-columns"><div class="colleft">'.do_shortcode($content).'</div>';
}
function column_right($atts, $content = null) {
	// $content = parse_shortcode_content($content);
	return '<div class="colright">'.do_shortcode($content).'</div></div>';
}
add_shortcode('left', 'column_left');
add_shortcode('right', 'column_right');

// ==================================================================
// Split content 3 columns
// ==================================================================
function column_1($atts, $content = null) {
	// $content = parse_shortcode_content($content);
	return '<div class="split-columns"><div class="col1">'.do_shortcode($content).'</div>';
}
function column_2($atts, $content = null) {
	// $content = parse_shortcode_content($content);
	return '<div class="col2">'.do_shortcode($content).'</div>';
}
function column_3($atts, $content = null) {
	// $content = parse_shortcode_content($content);
	return '<div class="col3">'.do_shortcode($content).'</div></div>';
}
add_shortcode('col1', 'column_1');
add_shortcode('col2', 'column_2');
add_shortcode('col3', 'column_3');

// ==================================================================
// Split content 3 half columns
// ==================================================================
function column_3_2($atts, $content = null) {
	// $content = parse_shortcode_content($content);
	return '<div class="split-columns"><div class="col3-2">'.do_shortcode($content).'</div>';
}
function column_3_1($atts, $content = null) {
	// $content = parse_shortcode_content($content);
	return '<div class="col3-1">'.do_shortcode($content).'</div></div>';
}
add_shortcode('col3_2', 'column_3_2');
add_shortcode('col3_1', 'column_3_1');

// ==================================================================
// Split content 4 columns
// ==================================================================
function column_4_1($atts, $content = null) {
	// $content = parse_shortcode_content($content);
	return '<div class="split-columns"><div class="col4-1">'.do_shortcode($content).'</div>';
}
function column_4_2($atts, $content = null) {
	// $content = parse_shortcode_content($content);
	return '<div class="col4-2">'.do_shortcode($content).'</div>';
}
function column_4_3($atts, $content = null) {
	// $content = parse_shortcode_content($content);
	return '<div class="col4-3">'.do_shortcode($content).'</div>';
}
function column_4_4($atts, $content = null) {
	// $content = parse_shortcode_content($content);
	return '<div class="col4-4">'.do_shortcode($content).'</div></div>';
}
add_shortcode('col4_1', 'column_4_1');
add_shortcode('col4_2', 'column_4_2');
add_shortcode('col4_3', 'column_4_3');
add_shortcode('col4_4', 'column_4_4');

// ==================================================================
// Split content 5 columns
// ==================================================================
function column_5_1($atts, $content = null) {
	// $content = parse_shortcode_content($content);
	return '<div class="split-columns"><div class="col5-1">'.do_shortcode($content).'</div>';
}
function column_5_2($atts, $content = null) {
	// $content = parse_shortcode_content($content);
	return '<div class="col5-2">'.do_shortcode($content).'</div>';
}
function column_5_3($atts, $content = null) {
	// $content = parse_shortcode_content($content);
	return '<div class="col5-3">'.do_shortcode($content).'</div>';
}
function column_5_4($atts, $content = null) {
	// $content = parse_shortcode_content($content);
	return '<div class="col5-4">'.do_shortcode($content).'</div>';
}
function column_5_5($atts, $content = null) {
	// $content = parse_shortcode_content($content);
	return '<div class="col5-5">'.do_shortcode($content).'</div></div>';
}
add_shortcode('col5_1', 'column_5_1');
add_shortcode('col5_2', 'column_5_2');
add_shortcode('col5_3', 'column_5_3');
add_shortcode('col5_4', 'column_5_4');
add_shortcode('col5_5', 'column_5_5');

// ==================================================================
// Tooltip
// ==================================================================
function tooltip($atts, $content = null) {
	extract(shortcode_atts(array("text" => null ), $atts));
	return '<span class="tooltip">'.do_shortcode($content).'<span class="tip">'.$text.'</span></span>';
}
add_shortcode('tooltip', 'tooltip');

// ==================================================================
// Break line
// ==================================================================
function line() {
	return '<hr class="line" />';
}
add_shortcode('line', 'line');

// ==================================================================
// Warning box
// ==================================================================
function warning($atts, $content = null) {
	// $content = parse_shortcode_content($content);
	return '<div class="warning"><i class="fas fa-times-circle"></i> '.do_shortcode($content).'</div>';
}
add_shortcode('warning', 'warning');

// ==================================================================
// Querstion box
// ==================================================================
function question($atts, $content = null) {
	// $content = parse_shortcode_content($content);
	return '<div class="question"><i class="fas fa-question-circle"></i> '.do_shortcode($content).'</div>';
}
add_shortcode('question', 'question');

// ==================================================================
// Disclaimer box
// ==================================================================
function disclaim($atts, $content = null) {
	// $content = parse_shortcode_content($content);
	return '<div class="disclaim"><i class="fas fa-exclamation-circle"></i> '.do_shortcode($content).'</div>';
}
add_shortcode('disclaim', 'disclaim');

// ==================================================================
// Button
// ==================================================================
function button_code($atts, $content = null) {
	extract(shortcode_atts(array(
		'url'	=> 'http://',
	), $atts));
	return '<a href="'.$url.'" class="post-button">'.do_shortcode($content).'</a>';
}
add_shortcode('button', 'button_code');

// ==================================================================
// Lightbox
// ==================================================================
function lightbox($atts, $content = null) {
	extract(shortcode_atts(array(
		'title' => 'TITLE',
		'url'   => 'URL',
	), $atts));
	return '<a class="colorbox-iframe" href="'.$url.'" title="'.$title.'">'.do_shortcode($content).'</a>';
}
add_shortcode('lightbox', 'lightbox');

// ==================================================================
// Pullquote
// ==================================================================
function pullquote($atts, $content = null) {
	extract(shortcode_atts(array(
		'width' => '300',
		'float' => 'left',
	), $atts));
	// $content = parse_shortcode_content($content);
	return '<blockquote class="pullquote" style="float:'.$float.'; width:'.$width.'px">'.do_shortcode($content).'</blockquote>';
}
add_shortcode('pullquote', 'pullquote');

// ==================================================================
// Accordion
// ==================================================================
function accordion_code($atts, $content = null) {
	extract(shortcode_atts(array('title' => 'TITLE'), $atts));
	// $content = parse_shortcode_content($content);
	return '<div class="accordion-wrap"><div class="accordion-title">'.$title.'</div><div class="accordion-content">'.do_shortcode($content).'</div></div>';
}
add_shortcode('accordion', 'accordion_code');

// ==================================================================
// Dropcap
// ==================================================================
function dropcap($atts, $content = null) {
	// $content = parse_shortcode_content($content);
	return '<span class="dropcap-letter">'.do_shortcode($content).'</span>';
}
add_shortcode('dropcap', 'dropcap');

// ==================================================================
// Recent blog post listing
// ==================================================================
function ace_recent_blog($atts, $content = null) {
	ob_start(); ?>
	<section class="split-columns">
		<?php $the_query = new WP_Query( 'posts_per_page=3&ignore_sticky_posts=1'); ?>
		<?php $counter = 0; while ($the_query -> have_posts()) : $the_query -> the_post(); $counter++; ?>
		<article class="col<?php echo $counter; ?>">
			<article class="ace-blog-sc-list">
			<?php if(has_post_thumbnail()) { ?>
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
			<?php } ?>
			<?php if(!get_option('ace_hide_date')) { ?><div class="post-date"><span itemprop="dateModified"><time itemprop="datePublished" content="<?php the_time( get_option('date_format')); ?>" class="updated"><?php the_time( get_option('date_format')); ?></time></span></div><?php } ?>
			<h3 class="post-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
			</article>
		</article>
		<?php endwhile; wp_reset_query(); ?>
	</section>
	<?php $output = ob_get_clean();
	return $output;
}
add_shortcode('recent_blog', 'ace_recent_blog');
