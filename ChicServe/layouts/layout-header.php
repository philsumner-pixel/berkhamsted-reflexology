  <section class="header-inner">

    <?php echo ace_heading(); ?>

    <form role="search" method="get" class="header-search-form" action="<?php echo esc_url(home_url()); ?>">
      <label>
        <span class="screen-reader-text"><?php _e('Search', 'ace'); ?>:</span>
        <input type="search" class="header-search-text" placeholder="<?php _e('Search', 'ace'); ?>" value="" name="s" />
    	  <button type="submit" class="header-search-button ease-in-out"><i class="fas fa-search sideform-button"></i></button>
      </label>
    </form>

    <nav class="nav nav-default" itemscope itemtype="https://schema.org/SiteNavigationElement">
      <?php wp_nav_menu('theme_location=top_menu&container_class=menu&menu_class=main-menu&fallback_cb=wp_page_menu&show_home=1&items_wrap=<ul id="%1$s" class="%2$s menu">%3$s</ul>'); ?>
    </nav><!-- .nav -->

  </section>
