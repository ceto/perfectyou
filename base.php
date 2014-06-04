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
          <aside class="sidebar" role="complementary">
            <?php include roots_sidebar_path(); ?>
          </aside><!-- /.sidebar -->
        <?php endif; ?>
    </div><!-- /.wrap -->
    <?php get_template_part('templates/footer'); ?>
  </div>

</body>
</html>
