
<header class="banner" role="banner" id="pagetop">
    <?php get_template_part('templates/contact','form' ); ?>
  <a class="brand" href="<?php echo home_url('/') ?>"><?php bloginfo('name'); ?></a>
  <nav class="nav-main" role="navigation">
    <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav nav-pills'));
      endif;
    ?>
      <a data-toggle="collapse" href="#contact" class="btn-main"><?php _e('<small>Bejelentkezés</small>06.70.770.5653','root') ?></a>
  </nav>
</header>
