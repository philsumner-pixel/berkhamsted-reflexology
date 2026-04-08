<?php if(!defined('ABSPATH')) { exit; } get_header(); ?>

<section class="container">

<main class="section">

	<?php ace_breadcrumb(); ?>

	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

	  <article <?php post_class('article'); ?> id="post-<?php the_ID(); ?>" itemscope itemtype="https://schema.org/CreativeWork">

			<?php ace_post_meta_category(); ?>
			<?php ace_post_meta_data(); ?>

			<article class="post-content entry-content" itemprop="text">

				<?php if(has_post_thumbnail()) { ?>
					<a href="<?php the_permalink(); ?>" <?php echo ace_new_window(); ?>><?php the_post_thumbnail('full', array('class' => 'alignleft')); ?></a>
				<?php } ?>

				<?php the_content(); ?>

				<?php echo ace_get_link_pages(); ?>

			</article><!-- .post-content -->

	  </article><!-- .article -->

	<?php endwhile; else: get_template_part('content', 'none'); endif; ?>

</main><!-- .section -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
