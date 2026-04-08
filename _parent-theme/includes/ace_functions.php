<?php
// ==================================================================
// Theme header
// ==================================================================
function ace_theme_header() {
  if(!get_option('ace_header_layout')) {
    echo get_template_part('layouts/layout-header');
  } elseif(get_option('ace_header_layout') == 'Default') {
    echo get_template_part('layouts/layout-header');
  } else {
    $the_query = new WP_Query('post_type=layout&pagename='.get_option('ace_header_layout').'');
    while($the_query->have_posts()) : $the_query->the_post(); the_content(); endwhile; wp_reset_postdata();
  }
}

// ==================================================================
// Theme footer
// ==================================================================
function ace_theme_footer() {
  if(!get_option('ace_footer_layout'))  {
    echo get_template_part('layouts/layout-footer');
  } elseif(get_option('ace_footer_layout') == 'Default')  {
    echo get_template_part('layouts/layout-footer');
  } else {
    $the_query = new WP_Query('post_type=layout&pagename='.get_option('ace_footer_layout').'');
    while( $the_query->have_posts()) : $the_query->the_post(); the_content(); endwhile; wp_reset_postdata();
  }
}

// ==================================================================
// Article listing
// ==================================================================
function ace_article_list() {
  if(get_option('ace_blog_list_layout') == 'Grid-2') {
    echo 'article-list-2';
  } elseif(get_option('ace_blog_list_layout') == 'Grid-3') {
    echo 'article-list-3';
  } elseif(get_option('ace_blog_list_layout') == 'Grid-4') {
    echo 'article-list-4';
  } elseif(get_option('ace_blog_list_layout') == 'Card-2') {
    echo 'article-list-2 article-card radius-4';
  } elseif(get_option('ace_blog_list_layout') == 'Card-3') {
    echo 'article-list-3 article-card radius-4';
  } elseif(get_option('ace_blog_list_layout') == 'Card-4') {
    echo 'article-list-4 article-card radius-4';
  } elseif(get_option('ace_blog_list_layout') == 'Classic-Odd') {
    echo 'article-list-odd';
  } else {
  }
}

// ==================================================================
// Archive listing
// ==================================================================
function ace_archive_list() {
  if(get_option('ace_archive_list_layout') == 'Grid-2') {
    echo 'article-list-2';
  } elseif(get_option('ace_archive_list_layout') == 'Grid-3') {
    echo 'article-list-3';
  } elseif(get_option('ace_archive_list_layout') == 'Grid-4') {
    echo 'article-list-4';
  } elseif(get_option('ace_archive_list_layout') == 'Card-2') {
    echo 'article-list-2 article-card radius-4';
  } elseif(get_option('ace_archive_list_layout') == 'Card-3') {
    echo 'article-list-3 article-card radius-4';
  } elseif(get_option('ace_archive_list_layout') == 'Card-4') {
    echo 'article-list-4 article-card radius-4';
  } elseif(get_option('ace_archive_list_layout') == 'Classic-Odd') {
    echo 'article-list-odd';
  } else {
  }
}

// ==================================================================
// Search listing
// ==================================================================
function ace_search_list() {
  if(get_option('ace_search_list_layout') == 'Grid-2') {
    echo 'article-list-2';
  } elseif(get_option('ace_search_list_layout') == 'Grid-3') {
    echo 'article-list-3';
  } elseif(get_option('ace_search_list_layout') == 'Grid-4') {
    echo 'article-list-4';
  } elseif(get_option('ace_search_list_layout') == 'Card-2') {
    echo 'article-list-2 article-card radius-8';
  } elseif(get_option('ace_search_list_layout') == 'Card-3') {
    echo 'article-list-3 article-card radius-8';
  } elseif(get_option('ace_search_list_layout') == 'Card-4') {
    echo 'article-list-4 article-card radius-8';
  } elseif(get_option('ace_search_list_layout') == 'Classic-Odd') {
    echo 'article-list-odd';
  } else {
  }
}

// ==================================================================
// Open new windows
// ==================================================================
function ace_new_window() {
  if(get_option('ace_new_window')) { echo 'target="_blank"'; }
}

// ==================================================================
// Post author biography
// ==================================================================
function ace_post_author_bio() {
	if(get_option('ace_blog_author_bio')) { ?>
	<section class="post-author-bio">
		<?php echo get_avatar( get_the_author_meta('email') , 128); ?>
		<h4><?php _e('About', 'ace'); ?> <?php echo get_the_author_meta('nickname'); ?></h4>
		<?php echo get_the_author_meta('description'); ?>
	</section>
	<?php }
}

// ==================================================================
// Theme slider
// ==================================================================
function ace_theme_slider() {
	if(get_option('ace_feature_enable')) {
		if(get_option('ace_feature_enable_home')) {
			if(is_front_page()) {
			echo get_template_part('layouts/slide');
			}
		} else {
			echo get_template_part('layouts/slide');
		}
	}
}

// ==================================================================
// Slider width
// ==================================================================
function ace_full_width_slider() {
	if(get_option('ace_feature_full_width')) { echo 'style="width:100%;"'; }
}

// ==================================================================
// Post meta
// ==================================================================
function ace_post_meta_category() { ?>
  <?php if(get_post_type() == 'post') {
    if(!get_option('ace_hide_post_meta')) { ?>
      <?php if(!get_option('ace_hide_category')) { ?><div class="post-category"><?php the_category(', '); ?></div><?php } ?>
    <?php }
  }
}

// ==================================================================
// Post meta
// ==================================================================
function ace_post_meta_data() { ?>
  <header class="post-header">
    <h2 class="post-title entry-title" itemprop="headline"><a itemscope itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage" href="<?php the_permalink(); ?>" rel="<?php esc_attr_e('bookmark', 'ace'); ?>" title="<?php the_title_attribute(); ?>" <?php echo ace_new_window(); ?>><?php the_title(); ?></a></h2>
    <?php if(get_post_type() == 'post') {
    if(!get_option('ace_hide_post_meta')) { ?>
    <ul class="post-meta">
      <?php if(!get_option('ace_hide_date')) { ?><li class="post-date"><span itemprop="dateModified"><time itemprop="datePublished" content="<?php the_time(get_option('date_format')); ?>" class="updated"><?php the_time(get_option('date_format')); ?></time></span></li><?php } ?>
      <!--<?php if(!get_option('ace_hide_category')) { ?><li class="post-category"><?php the_category(', '); ?></li><?php } ?>-->
      <?php if(!get_option('ace_hide_comment')) { ?><li class="post-comment"><?php comments_popup_link( __('0 comments', 'ace'), __('1 Comment', 'ace'), __('% Comments', 'ace')); ?></li><?php } ?>
      <?php if(!get_option('ace_blog_author')) { ?><li class="post-author"><?php _e('by', 'ace'); ?> <span itemprop="author" itemscope itemtype="https://schema.org/Person" class="author vcard"><span itemprop="name" class="fn"><?php the_author(); ?></span></span></li><?php } ?>
    </ul><!-- .post-meta -->
    <?php }
    } ?>
  </header>
<?php }

// ==================================================================
// Mobile menu
// ==================================================================
function ace_mobile_menu() { ?>

  <script type="text/javascript">
  /* <![CDATA[ */
  var $ = jQuery.noConflict();
  jQuery( document ).ready( function() { // START
    jQuery('<div class="checkbox-menu"><span></span><span></span><span></span></div>').insertBefore(".nav ul.menu");
    jQuery('.nav ul.menu').wrap('<div class="menu-wrap">');

    $('.checkbox-menu').click(function(){
      $(this).toggleClass('open');
      $('.menu-wrap').toggleClass('open');
    });

  }); // END
  /* ]]> */
  </script>

<?php }
add_action('wp_head', 'ace_mobile_menu', 100);

// ==================================================================
// Theme options colors
// ==================================================================
function ace_theme_css() { ?>
	<style type="text/css">

  	<?php if(get_option('ace_h1')) { ?>h1 {color: <?php echo get_option('ace_h1'); ?>;}<?php } ?>
  	<?php if(get_option('ace_h2')) { ?>h2 {color: <?php echo get_option('ace_h2'); ?>;}<?php } ?>
  	<?php if(get_option('ace_h3')) { ?>h3 {color: <?php echo get_option('ace_h3'); ?>;}<?php } ?>
  	<?php if(get_option('ace_h4')) { ?>h4 {color: <?php echo get_option('ace_h4'); ?>;}<?php } ?>
  	<?php if(get_option('ace_h5')) { ?>h5 {color: <?php echo get_option('ace_h5'); ?>;}<?php } ?>
  	<?php if(get_option('ace_h6')) { ?>h6 {color: <?php echo get_option('ace_h6'); ?>;}<?php } ?>

  	<?php if(get_option('ace_link')) { ?>a {color: <?php echo get_option('ace_link'); ?>;} <?php } ?>
  	<?php if(get_option('ace_link_hover')) { ?>a:hover {color: <?php echo get_option('ace_link_hover'); ?>;}<?php } ?>

  	<?php if(get_option('ace_nav_link')) { ?>
  	.nav a,
  	.nav ul li.has-sub > a:after,
  	.nav ul ul li.has-sub > a:after,
  	.nav ul li.page_item_has_children > a:after,
  	.nav ul ul li.menu-item-has-children > a:after,
  	.menu-click,
  	.menu-click:before {color: <?php echo get_option('ace_nav_link'); ?>;}
  	.checkbox-menu span {background: <?php echo get_option('ace_nav_link'); ?>;}
  	<?php } ?>

  	<?php if(get_option('ace_nav_link_hover')) { ?>
  	.nav a:hover,
  	.nav .current-menu-item > a,
  	.nav .current-menu-ancestor > a,
  	.nav .current_page_item > a,
  	.nav .current_page_ancestor > a,
  	.menu-open:before {color: <?php echo get_option('ace_nav_link_hover'); ?>;}
  	<?php } ?>

  	<?php if(get_option('ace_nav_bar')) { ?>
  	.nav ul, .nav ul ul {background: <?php echo get_option('ace_nav_bar'); ?>;}
  	<?php } ?>

  	<?php if(get_option('ace_button_bg')) { ?>
  	button, .post-button,
  	.article .post-read-more a,
  	.pagination a:hover, .pagination .current,
  	.input-button,
  	input[type=submit],
  	div.wpforms-container-full .wpforms-form button {
  		background: <?php echo get_option('ace_button_bg'); ?>;
  		<?php if(get_option('ace_button_border')) { ?>border: 1px solid <?php echo get_option('ace_button_border'); ?>;<?php } ?>
  		<?php if(get_option('ace_button_text')) { ?>color: <?php echo get_option('ace_button_text'); ?>;<?php } ?>
  	}
  	#cancel-comment-reply-link, a.comment-reply-link,
  	.flex-control-nav li a:hover, .flex-control-nav li a.flex-active {background: <?php echo get_option('ace_button_bg'); ?>; <?php if(get_option('ace_button_text')) { ?>color: <?php echo get_option('ace_button_text'); ?>;<?php } ?>}
  	<?php } ?>

  	<?php if(get_option('ace_button_bg_hover')) { ?>
  	button:hover, .post-button:hover,
  	.article .post-read-more a:hover,
  	.input-button:hover,
  	input[type=submit]:hover,
  	div.wpforms-container-full .wpforms-form button:hover {
  		background: <?php echo get_option('ace_button_bg_hover'); ?>;
  		<?php if(get_option('ace_button_border_hover')) { ?>border: 1px solid <?php echo get_option('ace_button_border_hover'); ?>;<?php } ?>
  		<?php if(get_option('ace_button_text_hover')) { ?>color: <?php echo get_option('ace_button_text_hover'); ?>;<?php } ?>
  	}
  	<?php } ?>

    <?php if(get_option('ace_button_bg')) { ?>.side-search-form .sideform-button  {color: <?php echo get_option('ace_button_bg'); ?>;}<?php } ?>
    <?php if(get_option('ace_button_bg_hover')) { ?>.side-search-form .sideform-button:hover {color: <?php echo get_option('ace_button_bg_hover'); ?>;}<?php } ?>

    <?php if(get_option('ace_button_bg')) { ?>
    .nav li.nav-button a {
      background: <?php echo get_option('ace_button_bg'); ?>;
      <?php if(get_option('ace_button_text')) { ?>color: <?php echo get_option('ace_button_text'); ?>;<?php } ?>
    }
    <?php } ?>
  	<?php if(get_option('ace_button_bg_hover')) { ?>
    .nav li.nav-button a:hover,
		.nav li.nav-button .current-menu-item > a,
		.nav li.nav-button .current-menu-ancestor > a,
		.nav li.nav-button .current_page_item > a,
		.nav li.nav-button .current_page_ancestor > a {
      background: <?php echo get_option('ace_button_bg_hover'); ?>;
      <?php if(get_option('ace_button_text_hover')) { ?>color: <?php echo get_option('ace_button_text_hover'); ?>;<?php } ?>
    }
    <?php } ?>

  	<?php if(get_option('ace_text_color')) { ?>body {color: <?php echo get_option('ace_text_color'); ?>;}<?php } ?>
  	<?php if(get_option('ace_border_color')) { ?>.article .post-header:after, .side-widget {border-color: <?php echo get_option('ace_border_color'); ?>;}<?php } ?>

    <?php if(get_option('ace_header_notice_bg')) { ?>.header-notice {background: <?php echo get_option('ace_header_notice_bg'); ?>;}<?php } ?>
    <?php if(get_option('ace_header_notice_text')) { ?>.header-notice, .header-notice a {color: <?php echo get_option('ace_header_notice_text'); ?>;}<?php } ?>

  	<?php if(get_option('ace_caption_bg')) { ?>.flex-caption {background: <?php echo get_option('ace_caption_bg'); ?>;}<?php } ?>
  	<?php if(get_option('ace_caption_text')) { ?>.flex-caption h3 {color: <?php echo get_option('ace_caption_text'); ?>;}<?php } ?>
  	<?php if(get_option('ace_arrow_bg')) { ?>.flex-direction-nav li a.flex-next .fas, .flex-direction-nav li a.flex-prev .fas {color: <?php echo get_option('ace_arrow_bg'); ?>;}<?php } ?>

  	<?php if(get_option('ace_page_page_title')) { ?>.article .page-title {color: <?php echo get_option('ace_page_page_title'); ?>;}<?php } ?>
  	<?php if(get_option('ace_page_post_title')) { ?>.article .post-title a, .article .post-title a:hover {color: <?php echo get_option('ace_page_post_title'); ?>;}<?php } ?>

  	<?php if(get_option('ace_sidebar_widget_title')) { ?>.side-widget h5 {color: <?php echo get_option('ace_sidebar_widget_title'); ?>;}<?php } ?>
  	<?php if(get_option('ace_footer_widget_title')) { ?>.footer-widget h6 {color: <?php echo get_option('ace_footer_widget_title'); ?>;}<?php } ?>

  	<?php if(get_option('ace_widget_twitter_bg')) { ?>.ace-social-icons .fa-twitter {color: <?php echo get_option('ace_widget_twitter_bg'); ?>;}<?php } ?>
  	<?php if(get_option('ace_widget_fb_bg')) { ?>.ace-social-icons .fa-facebook-f {color: <?php echo get_option('ace_widget_fb_bg'); ?>;}<?php } ?>
    <?php if(get_option('ace_widget_instagram_bg')) { ?>.ace-social-icons .fa-instagram {color: <?php echo get_option('ace_widget_instagram_bg'); ?>;}<?php } ?>
    <?php if(get_option('ace_widget_pinterest_bg')) { ?>.ace-social-icons .fa-pinterest-p {color: <?php echo get_option('ace_widget_pinterest_bg'); ?>;}<?php } ?>
    <?php if(get_option('ace_widget_youtube_bg')) { ?>.ace-social-icons .fa-youtube {color: <?php echo get_option('ace_widget_youtube_bg'); ?>;}<?php } ?>
  	<?php if(get_option('ace_widget_vimeo_bg')) { ?>.ace-social-icons .fa-vimeo-v {color: <?php echo get_option('ace_widget_vimeo_bg'); ?>;}<?php } ?>
  	<?php if(get_option('ace_widget_tiktok_bg')) { ?>.ace-social-icons .fa-tiktok {color: <?php echo get_option('ace_widget_tiktok_bg'); ?>;}<?php } ?>
  	<?php if(get_option('ace_widget_google_bg')) { ?>.ace-social-icons .fa-google-plus-g {color: <?php echo get_option('ace_widget_google_bg'); ?>;}<?php } ?>
  	<?php if(get_option('ace_widget_flickr_bg')) { ?>.ace-social-icons .fa-flickr {color: <?php echo get_option('ace_widget_flickr_bg'); ?>;}<?php } ?>
  	<?php if(get_option('ace_widget_linkedin_bg')) { ?>.ace-social-icons .fa-linkedin-in {color: <?php echo get_option('ace_widget_linkedin_bg'); ?>;}<?php } ?>
  	<?php if(get_option('ace_widget_bloglovin_bg')) { ?>.ace-social-icons .fa-plus {color: <?php echo get_option('ace_widget_bloglovin_bg'); ?>;}<?php } ?>
  	<?php if(get_option('ace_widget_tumblr_bg')) { ?>.ace-social-icons .fa-tumblr {color: <?php echo get_option('ace_widget_tumblr_bg'); ?>;}<?php } ?>
  	<?php if(get_option('ace_widget_houzz_bg')) { ?>.ace-social-icons .fa-houzz {color: <?php echo get_option('ace_widget_houzz_bg'); ?>;}<?php } ?>
  	<?php if(get_option('ace_widget_rss_bg')) { ?>.ace-social-icons .fa-rss {color: <?php echo get_option('ace_widget_rss_bg'); ?>;}<?php } ?>
    <?php if(get_option('ace_widget_email_bg')) { ?>.ace-social-icons .fa-envelope {color: <?php echo get_option('ace_widget_email_bg'); ?>;}<?php } ?>

  	<?php if(get_option('ace_widget_twitter_bg_hover')) { ?>.ace-social-icons .fa-twitter:hover {color: <?php echo get_option('ace_widget_twitter_bg_hover'); ?>;}<?php } ?>
  	<?php if(get_option('ace_widget_fb_bg_hover')) { ?>.ace-social-icons .fa-facebook-f:hover {color: <?php echo get_option('ace_widget_fb_bg_hover'); ?>;}<?php } ?>
    <?php if(get_option('ace_widget_instagram_bg_hover')) { ?>.ace-social-icons .fa-instagram:hover {color: <?php echo get_option('ace_widget_instagram_bg_hover'); ?>;}<?php } ?>
    <?php if(get_option('ace_widget_pinterest_bg_hover')) { ?>.ace-social-icons .fa-pinterest-p:hover {color: <?php echo get_option('ace_widget_pinterest_bg_hover'); ?>;}<?php } ?>
    <?php if(get_option('ace_widget_youtube_bg_hover')) { ?>.ace-social-icons .fa-youtube:hover {color: <?php echo get_option('ace_widget_youtube_bg_hover'); ?>;}<?php } ?>
  	<?php if(get_option('ace_widget_vimeo_bg_hover')) { ?>.ace-social-icons .fa-vimeo-v:hover {color: <?php echo get_option('ace_widget_vimeo_bg_hover'); ?>;}<?php } ?>
  	<?php if(get_option('ace_widget_tiktok_bg_hover')) { ?>.ace-social-icons .fa-tiktok:hover {color: <?php echo get_option('ace_widget_tiktok_bg_hover'); ?>;}<?php } ?>
  	<?php if(get_option('ace_widget_google_bg_hover')) { ?>.ace-social-icons .fa-google-plus-g:hover {color: <?php echo get_option('ace_widget_google_bg_hover'); ?>;}<?php } ?>
  	<?php if(get_option('ace_widget_flickr_bg_hover')) { ?>.ace-social-icons .fa-flickr:hover {color: <?php echo get_option('ace_widget_flickr_bg_hover'); ?>;}<?php } ?>
  	<?php if(get_option('ace_widget_linkedin_bg_hover')) { ?>.ace-social-icons .fa-linkedin-in:hover {color: <?php echo get_option('ace_widget_linkedin_bg_hover'); ?>;}<?php } ?>
  	<?php if(get_option('ace_widget_bloglovin_bg_hover')) { ?>.ace-social-icons .fa-plus:hover {color: <?php echo get_option('ace_widget_bloglovin_bg_hover'); ?>;}<?php } ?>
  	<?php if(get_option('ace_widget_tumblr_bg_hover')) { ?>.ace-social-icons .fa-tumblr:hover {color: <?php echo get_option('ace_widget_tumblr_bg_hover'); ?>;}<?php } ?>
  	<?php if(get_option('ace_widget_houzz_bg_hover')) { ?>.ace-social-icons .fa-houzz:hover {color: <?php echo get_option('ace_widget_houzz_bg_hover'); ?>;}<?php } ?>
    <?php if(get_option('ace_widget_rss_bg_hover')) { ?>.ace-social-icons .fa-rss:hover {color: <?php echo get_option('ace_widget_rss_bg_hover'); ?>;}<?php } ?>
    <?php if(get_option('ace_widget_email_bg_hover')) { ?>.ace-social-icons .fa-envelope:hover {color: <?php echo get_option('ace_widget_email_bg_hover'); ?>;}<?php } ?>

  	<?php if(get_option('ace_icons_border')) { ?>.footer-icons {border-color: <?php echo get_option('ace_icons_border'); ?>;}<?php } ?>

  	<?php if(get_option('ace_newsletter_bg')) { ?>.newsletter-section {background: <?php echo get_option('ace_newsletter_bg'); ?>;}<?php } ?>
  	<?php if(get_option('ace_newsletter_text')) { ?>.newsletter-section {color: <?php echo get_option('ace_newsletter_text'); ?>;}<?php } ?>

  	<?php if(get_option('ace_container_bg')) { ?>.container {background: <?php echo get_option('ace_container_bg'); ?>;}<?php } ?>

  	<?php if(get_option('ace_hide_comment')) { ?>.nocomments {display: none;}<?php } ?>
  	<?php if(get_option('ace_site_layout') == 'Sidebar-Content') { ?>.section {float: right;}.aside {float: left;}<?php } ?>

  	<?php if(class_exists('Jetpack') && Jetpack::is_module_active('infinite-scroll')) : ?>
  	.pagination {display: none !important;}
  	.infinite-scroll .woocommerce-pagination {display: block !important;}
  	<?php endif; ?>

  	<?php if(get_option('ace_button_bg_hover')) { ?>
  	.wp-block-button .wp-block-button__link:hover {
  		background: <?php echo get_option('ace_button_bg_hover'); ?>;
  		<?php if(get_option('ace_button_text_hover')) { ?>color: <?php echo get_option('ace_button_text_hover'); ?>;<?php } ?>
  	}
  	.wp-block-button.is-style-outline .wp-block-button__link:hover {
  		background: transparent;
  		border-color: <?php echo get_option('ace_button_bg_hover'); ?>;
  		color: <?php echo get_option('ace_button_bg_hover'); ?>;
  	}
  	<?php } ?>

  </style>
<?php }
add_action('wp_head', 'ace_theme_css');

// ==================================================================
// Breadcrumb
// ==================================================================
function ace_breadcrumb() {
	if(get_option('ace_enable_breadcrumb')) { echo get_breadcrumb(); }
}

// ==================================================================
// Sticky menu
// ==================================================================
if(get_option('ace_sticky_menu')) {
	function ace_sticky_menu_script(){ ?>
		<script type="text/javascript">
		/* <![CDATA[ */
		var $ = jQuery.noConflict();
		jQuery( document ).ready( function( $ ){ // START

      if($('.nav').length ){

    		var stickyMenu = document.querySelector(".nav");
    		var navPosition = $('.nav').offset();
    		window.onscroll = function() {
    			if($( window ).scrollTop() > navPosition.top ){
    				stickyMenu.classList.add("fixed-menu");
    		  	} else {
    				stickyMenu.classList.remove("fixed-menu");
    		  	};
    		}

      }

		}); // END
		/* ]]> */
		</script>
	<?php }
	add_action('wp_footer', 'ace_sticky_menu_script', 100);
}

// ==================================================================
// Heading
// ==================================================================
function ace_heading() {
  if(has_custom_logo()) {
    $site_logo = wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full'); ?>
    <a href="<?php echo esc_url( home_url()); ?>" rel="home" itemprop="url"><img src="<?php echo $site_logo[0]; ?>" class="header-title-logo" style="width:calc(<?php echo absint( $site_logo[1] ) ?>px/2); height:auto;" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" /></a>
  <?php }
  if(is_home() || is_front_page()) { ?>
    <h1 class="site-title"><a href="<?php echo esc_url( home_url()); ?>" rel="home" itemprop="url"><?php bloginfo('name'); ?></a></h1>
    <?php $description = get_bloginfo('description', 'display'); if($description || is_customize_preview()) : ?>
      <p class="site-description"><?php echo $description; ?></p>
    <?php endif; ?>
  <?php } else { ?>
    <h1 class="site-title"><a href="<?php echo esc_url( home_url()); ?>" rel="home" itemprop="url"><?php bloginfo('name'); ?></a></h1>
    <?php $description = get_bloginfo('description', 'display'); if($description || is_customize_preview()) : ?>
      <p class="site-description"><?php echo $description; ?></p>
    <?php endif; ?>
  <?php }
}

// ==================================================================
// Header scripts
// ==================================================================
function ace_header_scripts() {
	if(get_option('ace_header_scripts')) { echo stripslashes_deep(get_option('ace_header_scripts')); }
}
add_action('wp_head', 'ace_header_scripts');

// ==================================================================
// Footer scripts
// ==================================================================
function ace_footer_scripts() {
	if(get_option('ace_footer_scripts')) { echo stripslashes_deep(get_option('ace_footer_scripts')); }
}
add_action('wp_footer', 'ace_footer_scripts');

// ==================================================================
// Header notice
// ==================================================================
function ace_header_sticky_notice() {
	if(get_option('ace_header_notice')) { ?>
	<section class="header-notice">
		<?php echo do_shortcode(stripslashes(get_option('ace_header_notice'))); ?>
	</section>
	<?php }
}

// ==================================================================
// Newsletter
// ==================================================================
function ace_newsletter_section() { ?>
	<section class="newsletter-section">
    <?php echo do_shortcode(stripslashes_deep(get_option('ace_newsletter'))); ?>
	</section>
<?php }

// ==================================================================
// Newsletter on top
// ==================================================================
function ace_newsletter_top() {
	if(get_option('ace_newsletter_location') == 'Top') {
		if(get_option('ace_newsletter_home')) {
			if(is_front_page()) {
				if(get_option('ace_newsletter')) {
					ace_newsletter_section();
				}
			}
		} else {
			if(get_option('ace_newsletter')) {
				ace_newsletter_section();
			}
		}
	} elseif(get_option('ace_newsletter_location') == 'Both') {
		if(get_option('ace_newsletter_home')) {
			if(is_front_page()) {
				if(get_option('ace_newsletter')) {
					ace_newsletter_section();
				}
			}
		} else {
			if(get_option('ace_newsletter')) {
				ace_newsletter_section();
			}
		}
	}


}

// ==================================================================
// Newsletter on bottom
// ==================================================================
function ace_newsletter_bottom() {
	if(get_option('ace_newsletter_location') == 'Bottom') {
		if(get_option('ace_newsletter_home')) {
			if(is_front_page()) {
				if(get_option('ace_newsletter')) {
					ace_newsletter_section();
				}
			}
		} else {
			if(get_option('ace_newsletter')) {
				ace_newsletter_section();
			}
		}
	} elseif(get_option('ace_newsletter_location') == 'Both') {
		if(get_option('ace_newsletter_home')) {
			if(is_front_page()) {
				if(get_option('ace_newsletter')) {
					ace_newsletter_section();
				}
			}
		} else {
			if(get_option('ace_newsletter')) {
				ace_newsletter_section();
			}
		}
	}
}

// ==================================================================
// Featured widget
// ==================================================================
function ace_featured_section() {
	if(is_active_sidebar('featured-widget')) : ?>
	<section class="featured-widget-area" role="complementary">
		<?php dynamic_sidebar('featured-widget'); ?>
	</section><!-- .featured-widget-area -->
	<?php endif;
}

// ==================================================================
// Featured widget on top
// ==================================================================
function ace_featured_top() {
	if(get_option('ace_featured_location') == 'Top') {
		if(get_option('ace_featured_home')) {
			if(is_front_page()) {
				ace_featured_section();
			}
		} else {
			ace_featured_section();
		}
	}
}
// ==================================================================
// Featured widget on bottom
// ==================================================================
function ace_featured_bottom() {
	if(get_option('ace_featured_location') == 'Bottom') {
		if(get_option('ace_featured_home')) {
			if(is_front_page()) {
				ace_featured_section();
			}
		} else {
			ace_featured_section();
		}
	}
}

// ==================================================================
// Privacy policy
// ==================================================================
function ace_footer_privacy() {
	if(function_exists('the_privacy_policy_link')) {
		if(!get_option('ace_privacy')) {
			the_privacy_policy_link('', '&nbsp;');
		}
	}
}

// ==================================================================
// Add terms before comment
// ==================================================================
if(get_option('ace_comment_text')) {

	function ace_text_before_comment_form() {
		$text_before_comment = stripslashes_deep(get_option('ace_comment_text'));
		$commenter = wp_get_current_commenter();
		echo '<div class="disclaim comment-disclaim"><i class="fas fa-exclamation-circle"></i>&nbsp;' .$text_before_comment. '</div>';
	}
	add_action('comment_form_after_fields', 'ace_text_before_comment_form');
  add_action('comment_form_logged_in_after', 'ace_text_before_comment_form');

}

// ==================================================================
// LifterLMS support
// ==================================================================
function ace_llms_theme_support(){
	add_theme_support('lifterlms-sidebars');
}
add_action('after_setup_theme', 'ace_llms_theme_support');

// ==================================================================
// LifterLMS sidebar
// ==================================================================
function ace_llms_sidebar_function( $id ) {
	$my_sidebar_id = 'right-widget'; // replace this with your theme's sidebar ID
	return $my_sidebar_id;
}
add_filter('llms_get_theme_default_sidebar', 'ace_llms_sidebar_function');

// ==================================================================
// LifterLMS container
// ==================================================================
function my_content_wrapper_open() {
	echo '<main class="section" id="section">';
}
add_action('lifterlms_before_main_content', 'my_content_wrapper_open', 10);

function my_content_wrapper_close() {
	echo '</main>';
}
add_action('lifterlms_after_main_content', 'my_content_wrapper_close', 10);

// ==================================================================
// Load Elementor CSS on <head>
// ==================================================================
function get_id_by_slug($page_slug) {
	$page = get_page_by_path($page_slug, null, 'layout');
	if ($page) {
		return $page->ID;
	} else {
		return null;
	}
}

if(get_option('ace_header_layout')) {
	add_action( 'wp_enqueue_scripts', function() {
		if ( ! class_exists( '\Elementor\Core\Files\CSS\Post' ) ) {
			return;
		}
		$template_id = get_id_by_slug(get_option('ace_header_layout'));
		$css_file = new \Elementor\Core\Files\CSS\Post( $template_id );
		$css_file->enqueue();
	}, 100 );
}

if(get_option('ace_footer_layout')) {
	add_action( 'wp_enqueue_scripts', function() {
		if ( ! class_exists( '\Elementor\Core\Files\CSS\Post' ) ) {
			return;
		}
		$template_id = get_id_by_slug(get_option('ace_footer_layout'));
		$css_file = new \Elementor\Core\Files\CSS\Post( $template_id );
		$css_file->enqueue();
	}, 100 );
}

// ==================================================================
// Cookie consent
// ==================================================================
if(get_option('ace_enable_consent')) {

	function ace_cookieconsent(){
		wp_enqueue_style('cookieconsent-style', get_template_directory_uri() . '/js/cookieconsent.min.css', null, array(), 'all');
		wp_enqueue_script('cookieconsent-js', get_template_directory_uri() . '/js/cookieconsent.min.js', array('jquery'), null, false);
	}
	//add_action('wp_enqueue_scripts', 'ace_cookieconsent', 1);

  function ace_cookie() { ?>

    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.css" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js"></script>
    <script type="text/javascript">
    window.addEventListener( "load", function() {
    window.cookieconsent.initialise({

        "palette": {
            "popup": {
                "background": "<?php if(get_option('ace_cookie_bg')) { echo get_option('ace_cookie_bg'); } else { echo '#222'; } ?>",
                "text": "<?php if(get_option('ace_cookie_text')) { echo get_option('ace_cookie_text'); } else { echo '#fff'; } ?>"
            },
            "button": {
                "background": "<?php if(get_option('ace_cookie_button')) { echo get_option('ace_cookie_button'); } else { echo '#000'; } ?>",
                "text": "<?php if(get_option('ace_cookie_button_text')) { echo get_option('ace_cookie_button_text'); } else { echo '#fff'; } ?>"
            }
        },

        "theme": "edgeless",
        "position": "bottom",

        "content": {
            "message": "<?php if(get_option('ace_cookie_content')) { echo get_option('ace_cookie_content'); } ?>",
            "dismiss": "<?php if(get_option('ace_cookie_dismiss')) { echo get_option('ace_cookie_dismiss'); } ?>",
            "link": "<?php if(get_option('ace_cookie_read')) { echo get_option('ace_cookie_read'); } ?>",
            "href": "<?php if(get_option('ace_cookie_read_link')) { echo get_option('ace_cookie_read_link'); } ?>"
        },

        "cookie": {
            "expiryDays": <?php if(get_option('ace_cookie_expire')) { echo get_option('ace_cookie_expire'); } ?>,
        },


    })
    });
    </script>

  <?php }
  add_action('wp_footer', 'ace_cookie');

}
