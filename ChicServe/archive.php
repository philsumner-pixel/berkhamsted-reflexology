<?php if(!defined('ABSPATH')) { exit; } get_header(); ?>

<section class="container">

<?php if(get_option('ace_full_archive')) { echo '<main role="main" class="section-wide" id="section">'; } else { echo '<main role="main" class="section" id="section">'; } ?>

	<?php ace_breadcrumb(); ?>

	<?php if(have_posts() ) : ?>

    <section class="archive-page-title">
        <?php the_archive_title('<h3 class="pagetitle">', '</h3>'); ?>
        <?php the_archive_description('<p class="pagetitle-desc">', '</p>'); ?>
    </section>

		<ul class="articles-listing">
		<?php while(have_posts()) : the_post(); ?>

			<?php get_template_part('archive', 'list'); ?>

		<?php endwhile; ?>
		</ul>

		<?php ace_get_pagination_links(); ?>

		<?php else : get_template_part('content', 'none'); endif; ?>

</main><!-- .section -->

<?php if(!get_option('ace_full_archive')) { get_sidebar(); } ?>

<?php get_footer(); ?>
