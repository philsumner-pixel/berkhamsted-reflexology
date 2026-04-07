<?php if(!defined('ABSPATH')) { exit; } get_header(); ?>
<section class="container">

<?php if(have_posts()) : while(have_posts()) : the_post(); the_content(); endwhile; endif; ?>

<?php get_footer(); ?>
