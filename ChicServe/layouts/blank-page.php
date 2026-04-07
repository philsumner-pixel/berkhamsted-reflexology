<?php
/*
Template Name: Blank
Template Post Type: page, post

*/
if(!defined('ABSPATH')) { exit; } ?>
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

	<?php if(have_posts()) : while( have_posts()) : the_post(); ?>

			<?php the_content(); ?>

		<?php if(comments_open() || get_comments_number()) { comments_template(); } ?>

	<?php endwhile; endif; ?>

<?php wp_footer(); ?>

</body>
</html>
