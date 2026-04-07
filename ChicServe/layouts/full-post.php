<?php
/*
Template Name: Full width
Template Post Type: post
*/
if(!defined('ABSPATH')) { exit; } get_header(); ?>

<section class="container">

<main class="section-wide">

	<?php ace_breadcrumb(); ?>

	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

		<?php get_template_part( 'content', get_post_format() ); ?>

	<?php endwhile; endif; ?>

</main><!-- .section -->

<?php get_footer(); ?>
