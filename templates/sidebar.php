<?php if ( !is_single() && !is_archive() ): ?>
  <section class="illnavrow">
    <nav class="nav-greaticon" role="navigation">
      <ul>
        <li class="arc">
          <a href="<?php echo get_category_link(5); ?>">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/ill_arc.png" alt="Arc">
          Arc
          </a></li>
        <li class="mell">
          <a href="<?php echo get_category_link(3); ?>">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/ill_mell.png" alt="Mell">
            Mell
          </a></li>
        <li class="alak">
          <a href="<?php echo get_category_link(4); ?>">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/ill_alak.png" alt="Alak">
            Alak</a></li>
        <li class="kombinalt">
          <a href="<?php echo get_category_link(6); ?>">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/ill_arc.png" alt="Arc">
            Kombinált</a></li>
      </ul>
    </nav><!-- /.nav-greaticon -->
  </section>
<?php endif ?>

<aside class="sidebar" role="complementary">
  <div class="sidebar-inner">
    <?php dynamic_sidebar('sidebar-primary'); ?>
  </div>
</aside><!-- /.sidebar -->