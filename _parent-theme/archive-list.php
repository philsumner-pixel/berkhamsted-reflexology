	<li class="articles <?php ace_archive_list(); ?>">
	<article <?php post_class('article'); ?> id="post-<?php the_ID(); ?>" itemscope itemtype="https://schema.org/CreativeWork">

		<?php if((get_option('ace_archive_list_layout') == 'Grid-2') or (get_option('ace_archive_list_layout') == 'Grid-3') or (get_option('ace_archive_list_layout') == 'Grid-4') or (get_option('ace_archive_list_layout') == 'Card-2') or (get_option('ace_archive_list_layout') == 'Card-3') or (get_option('ace_archive_list_layout') == 'Card-4')) {} else { ace_post_meta_category(); } ?>

		<?php if((get_option('ace_archive_list_layout') == 'Grid-2') or (get_option('ace_archive_list_layout') == 'Grid-3') or (get_option('ace_archive_list_layout') == 'Grid-4') or (get_option('ace_archive_list_layout') == 'Card-2') or (get_option('ace_archive_list_layout') == 'Card-3') or (get_option('ace_archive_list_layout') == 'Card-4')) {} else { ace_post_meta_data(); } ?>

		<?php if((get_option('ace_archive_list_layout') == 'Grid-2') or (get_option('ace_archive_list_layout') == 'Grid-3') or (get_option('ace_archive_list_layout') == 'Grid-4') or (get_option('ace_archive_list_layout') == 'Card-2') or (get_option('ace_archive_list_layout') == 'Card-3') or (get_option('ace_archive_list_layout') == 'Card-4')) { if(get_option('ace_archive_layout')) { echo ace_post_meta_category(); echo ace_post_meta_data();} } ?>

		<?php
		$thumb_alignment = get_option('ace_archive_thumb_align');
		if(get_option('ace_archive_list_layout') == 'Classic-Odd') {
			if(get_option('ace_enable_archive_thumbnail')) {
				if( has_post_thumbnail()) { ?>
					<a href="<?php the_permalink(); ?>" <?php echo ace_new_window(); ?>><?php the_post_thumbnail('post_archive_thumb', array('class' => 'odd-post-thumb')); ?></a>
				<?php }
			}
		} elseif(get_option('ace_archive_list_layout') == 'Classic') {
			if(get_option('ace_enable_archive_thumbnail')) {
				if( has_post_thumbnail()) { ?>
					<a href="<?php the_permalink(); ?>" <?php echo ace_new_window(); ?>><?php the_post_thumbnail('post_archive_thumb', array('class' => $thumb_alignment)); ?></a>
				<?php }
			}
		} else {
			if(get_option('ace_enable_archive_thumbnail')) {
				if( has_post_thumbnail()) { ?>
					<a href="<?php the_permalink(); ?>" <?php echo ace_new_window(); ?>><?php the_post_thumbnail('post_archive_thumb', array('class' => 'aligncenter')); ?></a>
				<?php }
			}
		} ?>

		<?php if((get_option('ace_archive_list_layout') == 'Grid-2') or (get_option('ace_archive_list_layout') == 'Grid-3') or (get_option('ace_archive_list_layout') == 'Card-2') or (get_option('ace_archive_list_layout') == 'Card-3')) { if( !get_option('ace_archive_layout')) { echo ace_post_meta_category(); echo ace_post_meta_data(); } } ?>

    <?php if(get_option('ace_archive_enable_excerpt')) { the_excerpt(); } else { the_content(); } ?>

    <?php if(get_option('ace_enable_excerpt_button')) { echo '<p class="post-read-more"><a href="'. get_permalink() . '">' . get_option('ace_read_more_text'). '</a></p>'; } ?>

	</article><!-- .article -->
	</li>
