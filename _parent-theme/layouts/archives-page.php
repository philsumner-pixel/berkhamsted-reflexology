<?php
/*
Template Name: Archives
*/
if(!defined('ABSPATH')) { exit; } get_header(); ?>

<section class="container">

<main class="section">

<?php ace_breadcrumb(); ?>

	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

	<article <?php post_class('article article-page'); ?> id="post-<?php the_ID(); ?>" itemscope itemtype="https://schema.org/CreativeWork">

		<header class="page-header">
			<h1 class="page-title entry-title" itemprop="headline"><?php the_title(); ?></h1>
		</header>

		<article class="post-content entry-content" itemprop="text">

			<?php the_content(); ?>

			<?php ace_get_link_pages(); ?>

			<ul>
				<?php wp_tag_cloud('taxonomy=Artist&format=list&smallest=11px&largest11px'); ?>
			</ul>

			<?php get_search_form();?>

			<hr />

			<section class="split-columns">
				<section class="colleft">
					<h3><?php _e('Archives by month:', 'ace'); ?></h3>
					<ul>
						<?php wp_get_archives('type=monthly'); ?>
					</ul>
				</section>
				<section class="colright">
					<h3><?php _e('Archives by category:', 'ace'); ?></h3>
					<ul>
						<?php wp_list_categories('sort_column=name'); ?>
					</ul>
				</section>
			</section>

		</article><!-- .post-content -->

		<?php if(comments_open() || get_comments_number()) { comments_template(); } ?>

	</article><!-- .article -->

	<?php endwhile; endif; ?>

</main><!-- .section -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
