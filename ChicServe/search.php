<?php if(!defined('ABSPATH')) { exit; } get_header(); ?>

<section class="container">

<?php if(get_option('ace_full_search')) { echo '<main role="main" class="section-wide" id="section">'; } else { echo '<main role="main" class="section" id="section">'; } ?>

	<?php if(have_posts()) : ?>

    <section class="search-page-title">
			<h2 class="pagetitle"><?php _e('Searching for', 'ace'); ?> &quot;<em><?php the_search_query(); ?></em>&quot;</h2>
			<p class="pagetitle-desc"><?php _e('Number of results', 'ace'); ?> <?php global $wp_query; $total_results = $wp_query->found_posts; echo $total_results; ?></p>
    </section>

		<ul class="articles-listing">
		<?php while( have_posts()) : the_post(); ?>
			<?php get_template_part('search', 'list'); ?>
		<?php endwhile; ?>
		</ul>

		<?php ace_get_pagination_links(); ?>

	<?php else : get_template_part('content', 'none'); endif; ?>

</main><!-- .section -->

<?php if(!get_option('ace_full_search')) { get_sidebar(); } ?>

<?php get_footer(); ?>
