<?php if(!defined('ABSPATH')) { exit; } get_header(); ?>

<section class="container">
	
<?php if(get_option('ace_full_blog')) { echo '<main role="main" class="section-wide" id="section">'; } else { echo '<main role="main" class="section" id="section">'; } ?>

	<?php ace_breadcrumb(); ?>

		<ul class="articles-listing">
		<?php if(have_posts()) : while( have_posts()) : the_post(); ?>

			<?php get_template_part('content', 'list'); ?>

		<?php endwhile; ?>
		</ul>

	<?php ace_get_pagination_links(); ?>

	<?php else : get_template_part('content', 'none'); endif; ?>

</main><!-- .section -->

<?php if(!get_option('ace_full_blog')) { get_sidebar(); } ?>

<?php get_footer(); ?>
