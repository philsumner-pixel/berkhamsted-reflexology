<?php
/*
Template Name: Full width
Template Post Type: portfolio
*/
if(!defined('ABSPATH')) { exit; } get_header(); ?>

<section class="container">

<main class="section-wide">

	<?php ace_breadcrumb(); ?>

	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

		<article <?php post_class('article'); ?> id="post-<?php the_ID(); ?>" itemscope itemtype="https://schema.org/CreativeWork">

			<article class="post-content entry-content" itemprop="text">

                <?php ace_post_meta_data(); ?>

				<?php the_content(); ?>

				<?php echo ace_get_link_pages(); ?>

			</article><!-- .post-content -->

			<footer class="post-footer">

				<ul class="footer-navi">
					<?php previous_post_link(__('<li class="previous" rel="prev">&laquo; %link</li>', 'ace')); ?>
					<?php next_post_link(__('<li class="next" rel="next">%link &raquo;</li>', 'ace')); ?>
				</ul>

			</footer><!-- .post-footer -->

			<?php if(comments_open() || get_comments_number()) { comments_template(); } ?>

		</article><!-- .article -->

	<?php endwhile; endif; ?>

</main><!-- .section -->

<?php get_footer(); ?>
