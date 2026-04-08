<!DOCTYPE html>
<!--[if IE 7]><html id="ie7" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8]><html id="ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!--><html <?php language_attributes(); ?>><!--<![endif]-->
<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope itemtype="https://schema.org/WebPage">

<?php if(function_exists('wp_body_open')) wp_body_open(); ?>

<span class="back-top"><i class="fas fa-angle-up"></i></span>

<?php ace_header_sticky_notice(); ?>

<?php if(get_option('ace_header_banner')) { echo '<section class="header-banner">'; echo stripslashes_deep(get_option('ace_header_banner')); echo '</section>'; } ?>

<?php if(get_option('ace_woo_cart_float')) { echo ace_woo_cart_count(); } ?>

<section class="wrap">

  <?php echo '<header class="header" id="header" itemscope itemtype="https://schema.org/WPHeader">'; ?>
  <?php if(!get_option('ace_header_layout')) {
  } elseif(get_option('ace_header_layout') == 'Default') {
  } else { ?>
	<div class="hidden">
		<?php if(is_home() || is_front_page()) { echo "<h1 class=\"site-title\">"; } else { echo "<h2 class=\"site-title\">"; } ;?><a href="<?php echo esc_url( home_url()); ?>" rel="home" itemprop="url"><?php bloginfo('name'); ?></a><?php if(is_home() || is_front_page()) { echo "</h1>"; } else { echo "</h2>"; } ;?>
		<p class="site-description"><?php get_bloginfo('description', 'display'); ?></p>
	</div>
  <?php } ?>
  <?php ace_theme_header(); ?>
  <?php echo '</header>';
  ace_theme_slider();
  ace_newsletter_top();
  ?>

  <?php ace_featured_top(); ?>
