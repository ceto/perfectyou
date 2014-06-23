<?php
/*
Template Name: Homepage Template
*/
?>
<header id="homeh" class="home-header fullscreen">
    <div class="homeh-inner" style="margin-top:1000px;">
      <h1 class="home-title"><?php the_title(); ?></h1>
      <?php if ( get_post_meta( $post->ID, '_meta_lead', TURE ) ): ?>
        <div class="home-lead"><?php echo get_post_meta( $post->ID, '_meta_lead', TURE );  ?></div>
      <?php endif ?>
      <div class="home-headaction">
        <a class="btn" href="?cat=33"><?php _e('Ugrok a kezelésekre','root') ?></a>
      </div>
    </div>
</header>
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
<section class="home-istvan fullscreen">
  
</section>

