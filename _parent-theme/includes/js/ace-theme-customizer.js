/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and
 * then make any necessary changes to the page using jQuery.
 */
( function($) {


	wp.customize('ace_border_color', function(value) {
		value.bind(function(newval) {
			$('.container').css('border-color', newval);
		});
	});
	wp.customize('ace_text_color', function(value) {
		value.bind(function(newval) {
			$('body').css('color', newval);
		});
	});

	wp.customize('ace_nav_bar', function(value) {
		value.bind(function(newval) {
			$('.nav, .nav ul ul').css('background-color', newval);
		});
	});
	wp.customize('ace_nav_link', function(value) {
		value.bind(function(newval) {
			$('.nav a, .nav ul li.has-sub > a:after, .nav ul ul li.has-sub > a:after').css('color', newval);
		});
	});
	wp.customize('ace_nav_link_hover', function(value) {
		value.bind(function(newval) {
			$('.nav a:hover, .nav .current-menu-item > a, .nav .current-menu-ancestor > a, .nav .current_page_item > a, .nav .current_page_ancestor > a').css('color', newval);
		});
	});

	wp.customize('ace_arrow_bg', function(value) {
		value.bind(function(newval) {
			$('.responsiveslides .next, .responsiveslides .prev').css('background-color', newval);
		});
	});
	wp.customize('ace_caption_text', function(value) {
		value.bind(function(newval) {
			$('.responsiveslides-slide li .responsiveslides-caption h3').css('color', newval);
		});
	});
	wp.customize('ace_caption_bg', function(value) {
		value.bind(function(newval) {
			$('.responsiveslides-slide li .responsiveslides-caption').css('background-color', newval);
		});
	});

	wp.customize('ace_page_post_title', function(value) {
		value.bind(function(newval) {
			$('.article .page-title').css('color', newval);
		});
	});
	wp.customize('ace_page_post_title_link', function(value) {
		value.bind(function(newval) {
			$('.article .post-title a').css('color', newval);
		});
	});
	wp.customize('ace_page_post_title_link_hover', function(value) {
		value.bind(function(newval) {
			$('.article .post-title a:hover').css('color', newval);
		});
	});

	wp.customize('ace_sidebar_widget_text', function(value) {
		value.bind(function(newval) {
			$('.side-widget h3').css('color', newval);
		});
	});
	wp.customize('ace_sidebar_widget_border', function(value) {
		value.bind(function(newval) {
			$('.side-widget').css('border-color', newval);
		});
	});

	wp.customize('ace_footer_widget_title', function(value) {
		value.bind(function(newval) {
			$('.footer-widget h4').css('color', newval);
		});
	});
	wp.customize('ace_footer_text', function(value) {
		value.bind(function(newval) {
			$('.footer').css('color', newval);
		});
	});
	wp.customize('ace_footer_credit_border', function(value) {
		value.bind(function(newval) {
			$('p.footer-copy').css('border-color', newval);
		});
	});
	wp.customize('ace_footer_credit_background', function(value) {
		value.bind(function(newval) {
			$('p.footer-copy').css('background-color', newval);
		});
	});
	wp.customize('ace_footer_credit_text', function(value) {
		value.bind(function(newval) {
			$('p.footer-copy').css('color', newval);
		});
	});

	wp.customize('ace_link', function(value) {
		value.bind(function(newval) {
			$('a').css('color', newval);
		});
	});
	wp.customize('ace_link_hover', function(value) {
		value.bind(function(newval) {
			$('a:hover').css('color', newval);
		});
	});

	wp.customize('ace_h1', function(value) {
		value.bind(function(newval) {
			$('h1').css('color', newval);
		});
	});
	wp.customize('ace_h2', function(value) {
		value.bind(function(newval) {
			$('h2').css('color', newval);
		});
	});
	wp.customize('ace_h3', function(value) {
		value.bind(function(newval) {
			$('h3').css('color', newval);
		});
	});
	wp.customize('ace_h4', function(value) {
		value.bind(function(newval) {
			$('h4').css('color', newval);
		});
	});
	wp.customize('ace_h5', function(value) {
		value.bind(function(newval) {
			$('h5').css('color', newval);
		});
	});
	wp.customize('ace_h6', function(value) {
		value.bind(function(newval) {
			$('h6').css('color', newval);
		});
	});

	wp.customize('ace_button_bg', function(value) {
		value.bind(function(newval) {
			$('.post-button, .input-button, input[type=submit]').css('background', newval);
		});
	});
	wp.customize('ace_button_border', function(value) {
		value.bind(function(newval) {
			$('.post-button, .input-button, input[type=submit]').css('border-color', newval);
		});
	});
	wp.customize('ace_button_text', function(value) {
		value.bind(function(newval) {
			$('.post-button, .input-button, input[type=submit]').css('color', newval);
		});
	});
	wp.customize('ace_button_bg_hover', function(value) {
		value.bind(function(newval) {
			$('.post-button:hover, .input-button:hover, input[type=submit]:hover').css('background', newval);
		});
	});
	wp.customize('ace_button_border_hover', function(value) {
		value.bind(function(newval) {
			$('.post-button:hover, .input-button:hover, input[type=submit]:hover').css('border-color', newval);
		});
	});
	wp.customize('ace_button_text_hover', function(value) {
		value.bind(function(newval) {
			$('.post-button:hover, .input-button:hover, input[type=submit]:hover').css('color', newval);
		});
	});

	wp.customize('ace_accordion_bg', function(value) {
		value.bind(function(newval) {
			$('.accordion-title').css('background-color', newval);
		});
	});
	wp.customize('ace_accordion_text', function(value) {
		value.bind(function(newval) {
			$('.accordion-title').css('color', newval);
		});
	});
	wp.customize('ace_accordion_bg_hover', function(value) {
		value.bind(function(newval) {
			$('.accordion-open').css('background-color', newval);
		});
	});
	wp.customize('ace_accordion_text_hover', function(value) {
		value.bind(function(newval) {
			$('.accordion-open').css('color', newval);
		});
	});

	wp.customize('ace_widget_twitter_bg', function(value) {
		value.bind(function(newval) {
			$('ul.social-icons .fa-twitter').css('background', newval);
		});
	});
	wp.customize('ace_widget_twitter_bg_hover', function(value) {
		value.bind(function(newval) {
			$('ul.social-icons .fa-twitter:hover').css('background', newval);
		});
	});
	wp.customize('ace_widget_fb_bg', function(value) {
		value.bind(function(newval) {
			$('ul.social-icons .fa-facebook').css('background', newval);
		});
	});
	wp.customize('ace_widget_fb_bg_hover', function(value) {
		value.bind(function(newval) {
			$('ul.social-icons .fa-facebook:hover').css('background', newval);
		});
	});
	wp.customize('ace_widget_email_bg', function(value) {
		value.bind(function(newval) {
			$('ul.social-icons .fa-envelope').css('background', newval);
		});
	});
	wp.customize('ace_widget_email_bg_hover', function(value) {
		value.bind(function(newval) {
			$('ul.social-icons .fa-envelope:hover').css('background', newval);
		});
	});
	wp.customize('ace_widget_rss_bg', function(value) {
		value.bind(function(newval) {
			$('ul.social-icons .fa-rss').css('background', newval);
		});
	});
	wp.customize('ace_widget_rss_bg_hover', function(value) {
		value.bind(function(newval) {
			$('ul.social-icons .fa-rss:hover').css('background', newval);
		});
	});
	wp.customize('ace_widget_google_bg', function(value) {
		value.bind(function(newval) {
			$('ul.social-icons .fa-google-plus').css('background', newval);
		});
	});
	wp.customize('ace_widget_google_bg_hover', function(value) {
		value.bind(function(newval) {
			$('ul.social-icons .fa-google-plus:hover').css('background', newval);
		});
	});
	wp.customize('ace_widget_flickr_bg', function(value) {
		value.bind(function(newval) {
			$('ul.social-icons .fa-flickr').css('background', newval);
		});
	});
	wp.customize('ace_widget_flickr_bg_hover', function(value) {
		value.bind(function(newval) {
			$('ul.social-icons .fa-flickr:hover').css('background', newval);
		});
	});
	wp.customize('ace_widget_linkedin_bg', function(value) {
		value.bind(function(newval) {
			$('ul.social-icons .fa-linkedin').css('background', newval);
		});
	});
	wp.customize('ace_widget_linkedin_bg_hover', function(value) {
		value.bind(function(newval) {
			$('ul.social-icons .fa-linkedin:hover').css('background', newval);
		});
	});
	wp.customize('ace_widget_youtube_bg', function(value) {
		value.bind(function(newval) {
			$('ul.social-icons .fa-youtube').css('background', newval);
		});
	});
	wp.customize('ace_widget_youtube_bg_hover', function(value) {
		value.bind(function(newval) {
			$('ul.social-icons .fa-youtube:hover').css('background', newval);
		});
	});
	wp.customize('ace_widget_vimeo_bg', function(value) {
		value.bind(function(newval) {
			$('ul.social-icons .fa-vimeo-square').css('background', newval);
		});
	});
	wp.customize('ace_widget_vimeo_bg_hover', function(value) {
		value.bind(function(newval) {
			$('ul.social-icons .fa-vimeo-square:hover').css('background', newval);
		});
	});
	wp.customize('ace_widget_instagram_bg', function(value) {
		value.bind(function(newval) {
			$('ul.social-icons .fa-instagram').css('background', newval);
		});
	});
	wp.customize('ace_widget_instagram_bg_hover', function(value) {
		value.bind(function(newval) {
			$('ul.social-icons .fa-instagram:hover').css('background', newval);
		});
	});
	wp.customize('ace_widget_bloglovin_bg', function(value) {
		value.bind(function(newval) {
			$('ul.social-icons .fa-plus').css('background', newval);
		});
	});
	wp.customize('ace_widget_bloglovin_bg_hover', function(value) {
		value.bind(function(newval) {
			$('ul.social-icons .fa-plus:hover').css('background', newval);
		});
	});
	wp.customize('ace_widget_pinterest_bg', function(value) {
		value.bind(function(newval) {
			$('ul.social-icons .fa-pinterest').css('background', newval);
		});
	});
	wp.customize('ace_widget_pinterest_bg_hover', function(value) {
		value.bind(function(newval) {
			$('ul.social-icons .fa-pinterest:hover').css('background', newval);
		});
	});
	wp.customize('ace_widget_tumblr_bg', function(value) {
		value.bind(function(newval) {
			$('ul.social-icons .fa-tumblr').css('background', newval);
		});
	});
	wp.customize('ace_widget_tumblr_bg_hover', function(value) {
		value.bind(function(newval) {
			$('ul.social-icons .fa-tumblr:hover').css('background', newval);
		});
	});




	wp.customize('ace_twitter_bg', function(value) {
		value.bind(function(newval) {
			$('ul.footer-icons-wrap .fa-twitter').css('background', newval);
		});
	});
	wp.customize('ace_twitter_bg_hover', function(value) {
		value.bind(function(newval) {
			$('ul.footer-icons-wrap .fa-twitter:hover').css('background', newval);
		});
	});
	wp.customize('ace_facebook_bg', function(value) {
		value.bind(function(newval) {
			$('ul.footer-icons-wrap .fa-facebook').css('background', newval);
		});
	});
	wp.customize('ace_facebook_bg_hover', function(value) {
		value.bind(function(newval) {
			$('ul.footer-icons-wrap .fa-facebook:hover').css('background', newval);
		});
	});
	wp.customize('ace_pinterest_bg', function(value) {
		value.bind(function(newval) {
			$('ul.footer-icons-wrap .fa-pinterest').css('background', newval);
		});
	});
	wp.customize('ace_pinterest_bg_hover', function(value) {
		value.bind(function(newval) {
			$('ul.footer-icons-wrap .fa-pinterest:hover').css('background', newval);
		});
	});
	wp.customize('ace_instagram_bg', function(value) {
		value.bind(function(newval) {
			$('ul.footer-icons-wrap .fa-instagram').css('background', newval);
		});
	});
	wp.customize('ace_instagram_bg_hover', function(value) {
		value.bind(function(newval) {
			$('ul.footer-icons-wrap .fa-instagram:hover').css('background', newval);
		});
	});
	wp.customize('ace_google_plus_bg', function(value) {
		value.bind(function(newval) {
			$('ul.footer-icons-wrap .fa-google-plus').css('background', newval);
		});
	});
	wp.customize('ace_google_plus_bg_hover', function(value) {
		value.bind(function(newval) {
			$('ul.footer-icons-wrap .fa-google-plus:hover').css('background', newval);
		});
	});
	wp.customize('ace_flickr_bg', function(value) {
		value.bind(function(newval) {
			$('ul.footer-icons-wrap .fa-flickr').css('background', newval);
		});
	});
	wp.customize('ace_flickr_bg_hover', function(value) {
		value.bind(function(newval) {
			$('ul.footer-icons-wrap .fa-flickr:hover').css('background', newval);
		});
	});
	wp.customize('ace_linkedin_bg', function(value) {
		value.bind(function(newval) {
			$('ul.footer-icons-wrap .fa-linkedin').css('background', newval);
		});
	});
	wp.customize('ace_linkedin_bg_hover', function(value) {
		value.bind(function(newval) {
			$('ul.footer-icons-wrap .fa-linkedin:hover').css('background', newval);
		});
	});
	wp.customize('ace_youtube_bg', function(value) {
		value.bind(function(newval) {
			$('ul.footer-icons-wrap .fa-youtube').css('background', newval);
		});
	});
	wp.customize('ace_youtube_bg_hover', function(value) {
		value.bind(function(newval) {
			$('ul.footer-icons-wrap .fa-youtube:hover').css('background', newval);
		});
	});
	wp.customize('ace_vimeo_bg', function(value) {
		value.bind(function(newval) {
			$('ul.footer-icons-wrap .fa-vimeo-square').css('background', newval);
		});
	});
	wp.customize('ace_vimeo_bg_hover', function(value) {
		value.bind(function(newval) {
			$('ul.footer-icons-wrap .fa-vimeo-square:hover').css('background', newval);
		});
	});
	wp.customize('ace_bloglovin_bg', function(value) {
		value.bind(function(newval) {
			$('ul.footer-icons-wrap .fa-plus').css('background', newval);
		});
	});
	wp.customize('ace_bloglovin_bg_hover', function(value) {
		value.bind(function(newval) {
			$('ul.footer-icons-wrap .fa-plus:hover').css('background', newval);
		});
	});
	wp.customize('ace_tumblr_bg', function(value) {
		value.bind(function(newval) {
			$('ul.footer-icons-wrap .fa-tumblr').css('background', newval);
		});
	});
	wp.customize('ace_tumblr_bg_hover', function(value) {
		value.bind(function(newval) {
			$('ul.footer-icons-wrap .fa-tumblr:hover').css('background', newval);
		});
	});
	wp.customize('ace_rss_bg', function(value) {
		value.bind(function(newval) {
			$('ul.footer-icons-wrap .fa-rss').css('background', newval);
		});
	});
	wp.customize('ace_rss_bg_hover', function(value) {
		value.bind(function(newval) {
			$('ul.footer-icons-wrap .fa-rss:hover').css('background', newval);
		});
	});
	wp.customize('ace_email_bg', function(value) {
		value.bind(function(newval) {
			$('ul.footer-icons-wrap .fa-envelope').css('background', newval);
		});
	});
	wp.customize('ace_email_bg_hover', function(value) {
		value.bind(function(newval) {
			$('ul.footer-icons-wrap .fa-envelope:hover').css('background', newval);
		});
	});


} )( jQuery);
