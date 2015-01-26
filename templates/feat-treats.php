<section id="feat-treats" class="feat-treats fullscreen">
  <div class="ftreats-inner">
    <div class="ftreat-head">
      <h4><?php _e('Válasszon beavatkozásaink közül','roots'); ?></h4> 
      <ul id="myTab" class="nav nav-tabs">
        <li class="active"><a href="#fiatal" data-toggle="tab" class="fi">Fiatalodni szeretnék</a></li>
        <li class=""><a href="#szep" data-toggle="tab" class="sze">Szépülni szeretnék</a></li>
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