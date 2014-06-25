<?php
/*
Template Name: Homepage Template
*/
?>
<header id="homeh" class="home-header fullscreen">
    <div class="homeh-inner shape2" style="margin-top:1000px;">
      <h1 class="home-title">Plasztikai sebészeti kezelések, esztétikai- és szépészeti beavatkozások</h1>
      <?php //if ( get_post_meta( $post->ID, '_meta_lead', TURE ) ): ?>
        <div class="home-lead">
          <?php // echo get_post_meta( $post->ID, '_meta_lead', TURE );  ?>
        </div>
      <?php //endif ?>
      <div class="home-headaction">
        <a class="btn btn-filled" href="#feat-treats"><?php _e('Ugrok a kezelésekre','root') ?></a>
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
    <h3 class="cv-title">Dr. Bulyovszki István <em>Plasztikai sebész</em></h3>
    <p>A PERFECT YOU plasztikai sebésze dr. Bulyovszky István az esztétikai szakmában is az elméleti és gyakorlati tudás összhangját, együttes magas színvonalra emelését tartja vezérelvnek.</p>
    <blockquote>
      <p>A manualitás, az elmélet "kézzel fogható" gyakorlati alkalmazása motivál, mint a szobrászt, amikor a valósághoz ad hozzá valami művészit, amitől az nem más, hanem több lesz</p>
    </blockquote>
  
    <p>A folyamatos szakmai képzés elengedhetetlen ahhoz, hogy a nívós szaktudásnak köszönhetően a lehető legjobb ellátást nyújtsuk, ezért vagyunk elkötelezettek amellett, hogy pácienseinknek mindezt kizárólag up-to-date technikákkal, kiváló eszközökkel, technológiákkal és a legjobb minőségű alapanyagokkal biztosítsuk.</p>
    <a href="#" class="btn">Bővebben</a>
   </div>
</section>

<section class="callme">
  <div class="callme-inner">
    <h3>Jelentkezzen konzultációra</h3>
    <p>Weblapon történő jelentkezés esetén az első konzultáció ingyenes</p>
    <a href="#contact" data-toggle="collapse" class="btn">Jelentkezem</a>
  </div>
</section>
<section id="feat-treats" class="feat-treats fullscreen">
  <div class="ftreats-inner">
    
    <ul id="myTab" class="nav nav-tabs">
      <li class="active"><a href="#fiatal" data-toggle="tab">Fiatalodni szeretne?</a></li>
      <li class=""><a href="#szep" data-toggle="tab">Szépülni szeretne?</a></li>
      <li class=""><a href="#fan" data-toggle="tab">Páciensek kedvencei</a></li>
    </ul>
    
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane fade active in tab-fiatal" id="fiatal">
        <?php 
          $saved_data = get_tax_meta(6,'ba_image_field_id');
          $cat_img_id=$saved_data['id'];
          $imoci=wp_get_attachment_image_src( $cat_img_id, 'full43');
        ?>
        <style>
          .feat-treats .tab-fiatal{
            background-image:url('<?php echo $imoci[0]; ?>');
          }
        </style>
        <?php
          $the_kezeles = new WP_Query(array(
            'post_type' => array('kezeles'),
            'cat'  => 35,
            'posts_per_page' => -1,
          ));
        ?>

        <?php if ($the_kezeles->have_posts()) : ?>
        <section class="kezeleslist">
          <div class="kezeleslist-inner">
            <h2><?php _e('Fiatalító műtétek és beavatkozások','roots') ?></h2>
            <?php while ($the_kezeles->have_posts()) : $the_kezeles->the_post(); ?>
              <?php if (get_post_type()=='kezeles'): ?>
                  <?php get_template_part('templates/item', get_post_type()); ?>
              <?php endif ?>
            <?php endwhile; ?>
            <a href="?cat=35" class="btn">További beavatkozások</a>
          </div>
        </section>
        <?php endif; ?>
        
      </div>
      <div class="tab-pane fade tab-szep" id="szep">
        <?php 
          $saved_data = get_tax_meta(36,'ba_image_field_id');
          $cat_img_id=$saved_data['id'];
          $imoci=wp_get_attachment_image_src( $cat_img_id, 'full43');
        ?>
        <style>
          .feat-treats .tab-szep{
            background-image:url('<?php echo $imoci[0]; ?>');
          }
        </style>
        <?php
          $the_kezeles = new WP_Query(array(
            'post_type' => array('kezeles'),
            'cat'  => 36,
            'posts_per_page' => -1,
          ));
        ?>

        <?php if ($the_kezeles->have_posts()) : ?>
        <section class="kezeleslist">
          <div class="kezeleslist-inner">
            <h2><?php _e('Szépítő kezelések és esztétikai beavatkozások','roots') ?></h2>
            <?php while ($the_kezeles->have_posts()) : $the_kezeles->the_post(); ?>
              <?php if (get_post_type()=='kezeles'): ?>
                  <?php get_template_part('templates/item', get_post_type()); ?>
              <?php endif ?>
            <?php endwhile; ?>
            <a href="?cat=36" class="btn">Még több szépítő beavatkozások</a>
          </div>
        </section>
        <?php endif; ?>
      </div>
      
      <div class="tab-pane fade tab-fan" id="fan">
        <?php 
          $saved_data = get_tax_meta(33,'ba_image_field_id');
          $cat_img_id=$saved_data['id'];
          $imoci=wp_get_attachment_image_src( $cat_img_id, 'full43');
        ?>
        <style>
          .feat-treats .tab-fan{
            background-image:url('<?php echo $imoci[0]; ?>');
          }
        </style>
        <?php
          $the_kezeles = new WP_Query(array(
            'post_type' => array('kezeles'),
            'cat'  => 33,
            'posts_per_page' => 4,
          ));
        ?>

        <?php if ($the_kezeles->have_posts()) : ?>
        <section class="kezeleslist">
          <div class="kezeleslist-inner">
            <h2><?php _e('Pácienseink kedvencei','roots') ?></h2>
            <?php while ($the_kezeles->have_posts()) : $the_kezeles->the_post(); ?>
              <?php if (get_post_type()=='kezeles'): ?>
                  <?php get_template_part('templates/item', get_post_type()); ?>
              <?php endif ?>
            <?php endwhile; ?>
            <a href="?cat=33" class="btn">Mutasd mindet</a>
          </div>
        </section>
        <?php endif; ?>

      </div>
    </div>

  </div>
</section>

