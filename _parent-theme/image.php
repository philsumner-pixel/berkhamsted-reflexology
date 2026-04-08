<?php if(!defined('ABSPATH')) { exit; } get_header(); ?>

<section class="container">

<main class="section-wide">

<?php if(have_posts()) : while( have_posts()) : the_post(); ?>

	<article <?php post_class('article article-page'); ?> id="post-<?php the_ID(); ?>" itemscope itemtype="https://schema.org/CreativeWork">

		<header class="page-header">
			<h1 class="page-title entry-title" itemprop="headline"><?php the_title(); ?></h1>
		</header>

		<article class="post-content entry-content" itemprop="text">

			<img src="<?php echo esc_url(wp_get_attachment_url( $post->ID )); ?>" alt="<?php the_title(); ?>" class="aligncenter" />

			<article class="attachment-desc"><?php the_content(); ?></article>

		</article><!-- .post-content -->

	</article><!-- .article -->

<?php endwhile; endif; ?>

</main><!-- .section -->

<?php get_footer(); ?>
