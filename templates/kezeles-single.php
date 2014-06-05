<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
      <?php 
        $imoci = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'banner' ); 
      ?>
    <style>
      .jobbcsi{
        background-image:url('<?php echo $imoci[0]; ?>');
      }
    </style>
    <header class="treat-header fullscreen">
        <div class="trh-inner">
          <h1 class="treat-title"><?php the_title(); ?></h1>
          <?php if ( get_post_meta( $post->ID, '_meta_lead', TURE ) ): ?>
            <div class="treat-lead"><?php echo get_post_meta( $post->ID, '_meta_lead', TURE );  ?></div>
          <?php endif ?>
          <div class="treat-headaction">
            <!-- <a data-toggle="collapse" href="#contact" class="btn btn-filled">Jelentkezés</a>  -->
            <a href="#lenyeg" class="btn">Részletek</a>
          </div>
        </div>
    </header>


    
    <div id="lenyeg" class="treat-content">
      <?php if ( get_post_meta( $post->ID, '_meta_slogan', TURE ) ): ?>
       <div class="treat-slogan"><?php echo get_post_meta( $post->ID, '_meta_slogan', TURE );  ?></div>
      <?php endif ?>

      <?php the_content(); ?>

    </div>



    <div class="subsections">
      <aside class="subsec-sidebar">
      
      <nav class="subsec-nav">
        <header class="subsec-navhead">
          <!-- <a class="subsec-navlogo" href="<?php echo home_url('/') ?>"><?php bloginfo('name'); ?></a> -->
          <div class="subsec-navbread"><a href="#">Mell</a></div>
          <h3><?php the_title(); ?></h3>
        </header>
        
        <ul class="nav">
          <?php
            $streats = get_post_meta( $post->ID, '_meta_sections', true ); $trno=1; 
            $trno=1;
            foreach ( (array) $streats as $key => $entry ) {
          ?>
              <li><a href="#subsec-<?php echo $trno++;  ?>"><?php echo esc_html( $entry['title'] ); ?></a></li>
          <?php  } ?>
              <li><a href="#subsec-<?php echo $trno++;  ?>"><?php _e('Tippek és tanácsok a döntéshez','root') ?></a></li>
        </ul>
        
      </nav>

      <a class="brandi" href="#pagetop"><?php bloginfo('name'); ?></a>
    </aside>
      <?php reset ($streats); $trno=1;
        foreach ( (array) $streats as $key => $entry ) {
      ?>
        <section id="subsec-<?php echo $trno++;  ?>" class="subsec">
          <header class="subsec-header">
            <h2 class="subsec-title"><?php echo esc_html( $entry['title'] );  ?></h2>
          </header>
          <div class="subsec-inner">
            <?php
              $ima = $entry['ill_id'];
              $imci = wp_get_attachment_image_src( $ima, 'thumbnail');
            ?>
            <!--figure class="subsec-figure">
              <img src="<?php echo $imci[0]; ?>" width="<?php echo $imci[1]; ?>" height="<?php echo $imci[2]; ?>" alt="<?php echo esc_html( $entry['title'] );  ?>">
            </figure-->
            
            <div class="subsec-cont">
              <?php echo apply_filters('the_content', $entry['content'] );?>
              <div class="subsec-action">
                <a data-toggle="collapse" href="#contact" class="btn">Jelentkezés<small>06.30.707.3056</small></a>
              </div>
            
            </div>

          </div>
        </section>
      <?php  } ?>
      
      <section id="subsec-<?php echo $trno++;  ?>" class="side-related subsec">
        <header class="subsec-header">
            <h2 class="subsec-title"><?php _e('Tippek, tanácsok a döntéshez','root') ?></h2>
        </header>
        <div class="subsec-inner">
          <div class="subsec-cont">
            <p>Tudástárunk kapcsolódó írásai segítségedre lesznek, a téma köröljárásában. Ha döntés előtt állsz feltétlenül tájékozódj.</p>
              <?php
                $reference_ID=get_the_id();
                yarpp_related(
                  array(
                    // Pool options: these determine the "pool" of entities which are considered
                    'post_type' => array('kezeles' ),
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
                    'template' => 'yarpp-template-py.php', // either the name of a file in your active theme or the boolean false to use the builtin template
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
