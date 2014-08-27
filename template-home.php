<?php
/*
Template Name: Homepage Template
*/
?>




   
<header class="home-hero">
  <div class="homehero-inner">
    <img class="signo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/drbulyovszky.png" alt="dr. Bulyovszky">
    <h1>Plasztikai sebész<small>A tökéletes megjelenésért</small></h1>
    <div class="action-block">
      <a href="#feat-treats" class="btn" id="fiatal-ctrl">Szépülni szeretne?</a>
      <a href="#feat-treats" class="btn btn-filled" id="oreg-ctrl">Fiatalítodni szeretne?</a>
    </div>
  </div>
</header>




<?php get_template_part('templates/call','me' ); ?>
<header id="homeh" class="home-header fullscreen" style="display:none">
    <div class="homeh-inner" style="margin-top:1000px;">
      <h1 class="home-title">
        Plasztikai műtétek, esztétikai- és szépészeti beavatkozások Budapesten
      </h1>
      <p class="home-lead shape">
        <?php // echo get_post_meta( $post->ID, '_meta_lead', TURE );  ?>
        Dr. Bulyovszky a valósághoz ad hozzá valami művészit, amitől az nem más, hanem több lesz
      </p>

      <div class="home-headaction">
        <a class="btn btn-filled" href="#feat-treats"><?php _e('Ugrok a kezelésekre','root') ?></a>
      </div>
    </div>
</header>





<section class="home-istvan fullscreen">
  <div class="hist-inner">
    <h3 class="cv-title">Dr. Bulyovszki István <em>Plasztikai sebész</em></h3>
    <p>A PERFECT YOU plasztikai sebésze dr. Bulyovszky István az esztétikai szakmában is az elméleti és gyakorlati tudás összhangját, együttes magas színvonalra emelését tartja vezérelvnek.</p>
    <blockquote>
      <p>A manualitás, az elmélet "kézzel fogható" gyakorlati alkalmazása motivál, mint a szobrászt, amikor a valósághoz ad hozzá valami művészit, amitől az nem más, hanem több lesz</p>
    </blockquote>
  
    <p>A folyamatos szakmai képzés elengedhetetlen ahhoz, hogy a nívós szaktudásnak köszönhetően a lehető legjobb ellátást nyújtsuk, ezért vagyunk elkötelezettek amellett, hogy pácienseinknek mindezt kizárólag up-to-date technikákkal, kiváló eszközökkel, technológiákkal és a legjobb minőségű alapanyagokkal biztosítsuk.</p>
    <a href="<?php echo get_permalink(790); ?>" class="btn">Bővebben</a>
   </div>
</section>

<?php get_template_part('templates/ill','nav' ); ?>


<?php // get_template_part('templates/call','me' ); ?>








<section id="feat-treats" class="feat-treats fullscreen">
  <div class="ftreats-inner">
    <div class="ftreat-head">
      <h4><?php _e('Válasszon beavatkozásaink közül','roots'); ?></h4> 
      <ul id="myTab" class="nav nav-tabs">
        <li class="active"><a href="#fiatal" data-toggle="tab">Fiatalodni szeretnék</a></li>
        <li class=""><a href="#szep" data-toggle="tab">Szépülni szeretnék</a></li>
        <li class=""><a href="#fan" data-toggle="tab">Páciensek kedvencei</a></li>
      </ul>
    </div>
    
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane fade active in tab-fiatal" id="fiatal">
        <?php 
          $saved_data = get_tax_meta(6,'ba_image_field_id');
          $cat_img_id=$saved_data['id'];
          $imoci=wp_get_attachment_image_src( $cat_img_id, 'full43');
        ?>
        <!--style>
          .feat-treats .tab-fiatal{
            background-image:url('<?php echo get_stylesheet_directory_uri(); ?>/assets/img/pattern-x.png'), url('<?php echo $imoci[0]; ?>');
          }
        </style-->
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
        <!--style>
          .feat-treats .tab-szep{
            background-image:url('<?php echo get_stylesheet_directory_uri(); ?>/assets/img/pattern-x.png'), url('<?php echo $imoci[0]; ?>');
          }
        </style-->
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
        <!--style>
          .feat-treats .tab-fan{
            background-image:url('<?php echo get_stylesheet_directory_uri(); ?>/assets/img/pattern-x.png'), url('<?php echo $imoci[0]; ?>');
          }
        </style-->
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
          </div>
        </section>
        <?php endif; ?>

      </div>
    </div>

  </div>
</section>











