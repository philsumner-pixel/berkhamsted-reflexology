<?php
// ==================================================================
// Widget - Sidebar 1
// ==================================================================
function ace_right_widgets_init() {
	register_sidebar(array(
		'name'          => __('Right Widget', 'ace'),
		'id'            => 'right-widget',
		'class'         => '',
		'description'   => '',
		'before_widget'	=> '<section class="side-widget widget widget %2$s" id="%1$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
}
add_action('widgets_init', 'ace_right_widgets_init');

// ==================================================================
// Widget - Featured
// ==================================================================
function ace_featured_widget_init() {
	register_sidebar(array(
		'name'          => __('Featured Widget', 'ace'),
		'id'            => 'featured-widget',
		'class'         => '',
		'description'   => 'Maximum of 3 widgets',
		'before_widget' => '<section class="featured-widget widget %2$s" id="%1$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
}
add_action('widgets_init', 'ace_featured_widget_init');

// ==================================================================
// Widget - Footer 1
// ==================================================================
function ace_footer_widgets_init() {
	register_sidebar(array(
		'name'          => __('Footer Widget', 'ace'),
		'id'            => 'footer-widget',
		'class'         => '',
		'description'   => 'Maximum of 3 widgets',
		'before_widget' => '<section class="footer-widget widget %2$s" id="%1$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h6>',
		'after_title'   => '</h6>',
	) );
}
add_action('widgets_init', 'ace_footer_widgets_init');

// ==================================================================
// Widget - Instagram
// ==================================================================
function ace_footer_widgets_instagram_init() {
	register_sidebar(array(
		'name'          => __('Instagram Widget', 'ace'),
		'id'            => 'footer-widget-instagram',
		'class'         => '',
		'description'   => '',
		'before_widget' => '<article class="footer-instagram-widget widget %2$s" id="%1$s">',
		'after_widget'  => '</article>',
		'before_title'  => '<h6>',
		'after_title'   => '</h6>',
	) );
}
add_action('widgets_init', 'ace_footer_widgets_instagram_init');
