<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <?php
      $taxes=wp_get_post_terms($post->ID, 'kezeles-csoport');
      $current_term = $taxes[0];
      $cat_img_id = 0;
      $saved_data = get_tax_meta($current_term->term_id,'tc_image_field_id');
      $cat_img_id=$saved_data['id'];

      $imoci=wp_get_attachment_image_src( $cat_img_id, 'full43');

    ?>
    <style>
      .treat-header{
        background-image:url('<?php echo $imoci[0]; ?>');
        /*background-image:url('<?php echo get_stylesheet_directory_uri(); ?>/assets/img/hero_home.jpg');*/
         
      }
    </style>
    <header id="trh" class="treat-header fullscreen">
        <div class="trh-inner">
          <div class="trh-one">
            <div class="treat-headcats">
            <a href="<?php echo get_permalink(2); ?>" title="<?php _e('Kezelések','roots'); ?>"><?php _e('Kezelések','roots'); ?></a>
            /
            <a href="<?php echo esc_url( get_term_link($current_term->term_id,'kezeles-csoport') ); ?>" title="<?php echo $current_term->name; ?>">
              <?php echo $current_term->name; ?>
            </a>
          </div>

          <h1 class="treat-title"><?php the_title(); ?></h1>

          <?php if ( get_post_meta( $post->ID, '_meta_lead', TURE ) ): ?>
            <div class="treat-lead"><?php echo get_post_meta( $post->ID, '_meta_lead', TURE );  ?></div>
          <?php endif ?>
          <a class="morebtn btn btn-filled" href="#lenyeg">Tovább a részletekre <i class="typcn typcn-arrow-sorted-down"></i></a>
          </div><!-- /.trh-one -->
          <div class="trh-two">
            <?php if (has_post_thumbnail()): ?>
              <?php $featimg = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); ?>
              <figure class="trh-thumb">
                <a href="<?php echo $featimg[0]; ?>" class="mfp-with-zoom mfp-img-mobile">
                  <?php the_post_thumbnail('medium169'); ?>
                </a>
                <figcaption class="caption"><?php the_title(); ?></figcaption>
              </figure>
            <?php endif; ?>
  
            <div class="treat-headaction">
              <ul class="nav">
                <?php
                  $streats = get_post_meta( $post->ID, '_meta_sections', true );  
                  $trno=1;
                  foreach ( (array) $streats as $key => $entry ) {
                ?>
                  <li><a class="" href="#subsec-<?php echo $trno++;  ?>"><?php echo esc_html( $entry['title'] ); ?></a></li>
                <?php  } ?>
                  <li><a href="#subsec-<?php echo $trno++;  ?>"><?php _e('Tippek és tanácsok a döntéshez','root') ?></a></li>
              </ul>
            </div>
            


          </div><!-- /.trh-two-->
        </div>
    </header>

    <?php get_template_part('templates/call','me' ); ?>
    
    <div id="lenyeg" class="treat-content">
      
      <div class="trc-inner shape">

        <?php if ( get_post_meta( $post->ID, '_meta_slogan', TURE ) ): ?>
         <div class="treat-slogan"><?php echo get_post_meta( $post->ID, '_meta_slogan', TURE );  ?></div>
        <?php endif ?>

        <?php the_content(); ?>
      </div>


    </div>



    <div class="subsections">
      <aside class="subsec-sidebar">
      <div class="sss-inner">
      <nav class="subsec-nav">
        <header class="subsec-navhead">
          <div class="subsec-navbread">
            <?php // the_category( ' · '); ?>
            <a href="<?php echo get_permalink(2); ?>" title="<?php _e('Kezelések','roots'); ?>"><?php _e('Kezelések','roots'); ?></a>
            /
            <a href="<?php echo esc_url( get_term_link($current_term->term_id,'kezeles-csoport') ); ?>" title="<?php echo $current_term->name; ?>">
              <?php echo $current_term->name; ?>
            </a> 
          </div>
          <h3><?php the_title(); ?></h3>
        </header>
        
        <ul class="nav">
          <?php
            reset($streats);
            $trno=1;
            foreach ( (array) $streats as $key => $entry ) {
          ?>
              <li><a href="#subsec-<?php echo $trno++;  ?>"><?php echo esc_html( $entry['title'] ); ?></a></li>
          <?php  } ?>
              <li><a href="#subsec-<?php echo $trno++;  ?>"><?php _e('Tippek és tanácsok a döntéshez','root') ?></a></li>
        </ul>
        
      </nav>

      <section class="subsec-featured">
        <div class="sidebar-inner">
            <section class="widget widget-callme">
              <h3>Felkészült a változásra?</h3>
              <p class="vege"><i class="ss-glyphish-filled ss-phone telicon"></i> Hívjon
                <a href="tel:+36707705653" class="phone">+36.70.570.5653</a><span class="or">–&nbsp;vagy&nbsp;–</span>
                <a href="#contact" data-toggle="collapse" class="btn btn-filled">
                  <i class="ss-glyphish-filled ss-write"></i> Jelentkezzen online
                </a>
              </p>
            </section>
        </div>
      </section>

      </div>
    </aside>
      <?php reset ($streats); $trno=1;
        foreach ( (array) $streats as $key => $entry ) {
      ?>
        <section id="subsec-<?php echo $trno++;  ?>" class="subsec">
          <header class="subsec-header">
            <div class="ss-hinner">
              <h2 class="subsec-title"><?php echo esc_html( $entry['title'] );  ?></h2>
            </div>
          </header>
          <div class="subsec-inner">
            <?php
              $ima = $entry['ill_id'];
              $imci = wp_get_attachment_image_src( $ima, 'medium916');
              $imciorig = wp_get_attachment_image_src( $ima, 'full916');
            ?>

            
            <div class="subsec-cont">
              <?php if ($imciorig!='') : ?>
                <figure class="subsec-figure">
                  <a href="<?php echo $imciorig[0]; ?>" class="mfp-with-zoom mfp-img-mobile">
                    <img src="<?php echo $imci[0]; ?>" width="<?php echo $imci[1]; ?>" height="<?php echo $imci[2]; ?>" alt="<?php echo esc_html( $entry['title'] );  ?>">
                  </a>
                  <figcaption class="caption"><?php echo esc_html( $entry['title'] );  ?></figcaption>
                </figure>
              <?php endif; ?>
              <?php echo apply_filters('the_content', $entry['content'] );?>
            </div>
          </div>
          <div class="subsec-action">
            <?php get_template_part('templates/call','me' ); ?>
          </div>
        </section>
      <?php  } ?>
      
      <section id="subsec-<?php echo $trno++;  ?>" class="side-related subsec">
        <header class="subsec-header">
          <div class="ss-hinner">
            <h2 class="subsec-title"><?php _e('Tippek, tanácsok a döntéshez','roots') ?></h2>
          </div>
        </header>
        <div class="subsec-inner">
          <div class="subsec-cont">
            <p>Tudástárunk kapcsolódó írásai segítségedre lesznek, a téma köröljárásában. Ha döntés előtt állsz feltétlenül tájékozódj.</p>
              <?php
                $reference_ID=get_the_id();
                yarpp_related(
                  array(
                    // Pool options: these determine the "pool" of entities which are considered
                    'post_type' => array('post', 'page' ),
                    'show_pass_post' => false, // show password-protected posts
                    'past_only' => false, // show only posts which were published before the reference post
                    'exclude' => array(), // a list of term_taxonomy_ids. entities with any of these terms will be excluded from consideration.
                    'recent' => false, // to limit to entries published recently, set to something like '15 day', '20 week', or '12 month'.
                    // Relatedness options: these determine how "relatedness" is computed
                    // Weights are used to construct the "match score" between candidates and the reference post
                    'weight' => array(
                        'body' => 2,
                        'title' => 1, // larger weights mean this criteria will be weighted more heavily
                        'tax' => array(
                            'category' => 3,
                            'post_tag' => 3 // put any taxonomies you want to consider here with their weights
                        )
                    ),
                    // Specify taxonomies and a number here to require that a certain number be shared:
                    // 'require_tax' => array(
                    //     'tag' => 1 // for example, this requires all results to have at least one 'post_tag' in common.
                    // ),  
                    // The threshold which must be met by the "match score"
                    'threshold' => 2,

                    // Display options:
                    'template' => 'yarpp-template-rp.php', // either the name of a file in your active theme or the boolean false to use the builtin template
                    'limit' => 4, // maximum number of results
                    'order' => 'score DESC'
                  ),
                  $reference_ID, // second argument: (optional) the post ID. If not included, it will use the current post.
                  true
                ); // third argument: (optional) true to echo the HTML block; false to return it
              ?>
          </div>
        </div>
      </section>
    
    </div>


    <footer>
      <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
    </footer>
    <?php comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>
