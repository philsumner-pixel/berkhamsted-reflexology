<?php
/*
Template Name: Default without title
Template Post Type: post
*/
if(!defined('ABSPATH')) { exit; } get_header(); ?>

<section class="container">

<main class="section">

	<?php ace_breadcrumb(); ?>

	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

		<article <?php post_class('article'); ?> id="post-<?php the_ID(); ?>" itemscope itemtype="https://schema.org/CreativeWork">

			<article class="post-content entry-content" itemprop="text">

				<?php the_content(); ?>

				<?php echo ace_get_link_pages(); ?>

				<?php if(get_option('ace_post_signature')) { ?>
				<figure><img src="<?php echo esc_url( get_option('ace_post_signature')); ?>" alt="<?php the_author(); ?>" class="post-signature" /></figure>
				<?php } ?>

				<?php if(function_exists('ace_post_author_bio')) { echo ace_post_author_bio(); } ?>

			</article><!-- .post-content -->

			<footer class="post-footer">

				<?php if(!get_option('ace_hide_tag')) { the_tags('<p class="post-tags">Tags: ', ', ', '</p>'); } ?>

				<ul class="footer-navi">
					<?php previous_post_link(__('<li class="previous" rel="prev">&laquo; %link</li>', 'ace')); ?>
					<?php next_post_link(__('<li class="next" rel="next">%link &raquo;</li>', 'ace')); ?>
				</ul>

				<?php if(get_option('ace_post_banner')) { ?>
				<section class="post-banner">
					<?php echo stripslashes( get_option('ace_post_banner')); ?>
				</section>
				<?php } ?>

				<?php if(get_option('ace_enable_related')) { get_template_part('layouts/related'); } ?>

			</footer><!-- .post-footer -->

			<?php if(comments_open() || get_comments_number()) { comments_template(); } ?>

		</article><!-- .article -->

	<?php endwhile; endif; ?>

</main><!-- .section -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
