<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>  data-spy="scroll" data-target=".subsec-nav" data-offset="69" >

  <!--[if lt IE 9]>
    <div class="alert alert-warning">
      <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?>
    </div>
  <![endif]-->
  <?php do_action('get_header'); ?>
  <div class="balcsi">    
    <nav class="nav-main nav-mobile" role="navigation">
      <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav nav-pills'));
        endif;
      ?>
    </nav>
  </div>
  <div class="jobbcsi">
    <?php get_template_part('templates/header'); ?>
    <div class="document" role="document">
        <main class="main <?php echo roots_main_class(); ?>" role="main">
          <?php include roots_template_path(); ?>
        </main><!-- /.main -->
        <?php if (roots_display_sidebar()) : ?>
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
          <aside class="sidebar" role="complementary">
            <?php include roots_sidebar_path(); ?>
          </aside><!-- /.sidebar -->
        <?php endif; ?>
    </div><!-- /.wrap -->
    <?php get_template_part('templates/footer'); ?>
  </div>

</body>
</html>
