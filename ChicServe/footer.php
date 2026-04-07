  <?php ace_featured_bottom(); ?>

  </section><!-- .container -->

  <?php ace_newsletter_bottom(); ?>

<?php echo '<footer class="footer" id="footer" itemscope itemtype="https://schema.org/WPFooter">'; ace_theme_footer(); echo '</footer>'; ?>

</section><!-- .wrap -->

<?php if(is_active_sidebar('footer-widget-instagram')) : ?>
<footer class="footer-instagram" role="complementary">
	<?php dynamic_sidebar('footer-widget-instagram'); ?>
</footer><!-- .footer-instagram -->
<?php endif; ?>


<section class="footer-copy" role="contentinfo">
  <?php if(get_option('ace_footer_credit')) { echo stripslashes_deep( get_option('ace_footer_credit')); } else { ?>&copy; <?php _e('Copyright', 'ace'); ?> <a href="<?php esc_url( home_url()); ?>" itemtype="copyrightHolder"><?php bloginfo('name'); ?></a> <span itemtype="copyrightYear" content="<?php echo date('Y'); ?>"><?php echo date('Y'); ?></span>. <?php _e('Theme by', 'ace'); ?> <a href="<?php echo esc_url('https://www.bluchic.com'); ?>">Bluchic</a>.<?php } ?>
  <?php ace_footer_privacy(); ?>
</section>

</section><!-- .wrap -->

<?php wp_footer(); ?>

</body>
</html>
