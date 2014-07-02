<?php if ( !is_single() && !is_archive()  && !is_front_page() && !is_home() ): ?>
  <?php get_template_part('templates/ill','nav' ); ?>
<?php endif ?>

<aside class="sidebar" role="complementary">
  <div class="sidebar-inner">
    <?php dynamic_sidebar('sidebar-primary'); ?>
  </div>
</aside><!-- /.sidebar -->