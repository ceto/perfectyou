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
  <div class="hist-inner">
    
  </div>
</section>

<section class="why-us fullscreen">
  <div class="whu-inner">
    <ul id="myTab" class="nav nav-tabs">
      <li class=""><a href="#home" data-toggle="tab">Fiatalodni szeretne?</a></li>
      <li class="active"><a href="#profile" data-toggle="tab">Szépülni szeretne?</a></li>
      <li class=""><a href="#mutet" data-toggle="tab">Műtét nélkül</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane fade" id="fiatal">
        <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>
      </div>
      <div class="tab-pane fade active in" id="szep">
        <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</p>
      </div>
      <div class="tab-pane fade" id="mutet">
        <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.</p>
      </div>
    </div>
  </div>
</section>

