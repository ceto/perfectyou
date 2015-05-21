<?php //get_template_part('templates/call','me' ); ?>
<?php while (have_posts()) : the_post(); ?>
<?php
  $taxes=wp_get_post_terms($post->ID, 'kezeles-csoport');
  //$current_term = $taxes[0];
?>

<div class="subsections">

  <aside class="subsec-sidebar">

    <div class="sss-inner">
      <nav class="subsec-nav">
        <header class="subsec-navhead">
          <div class="subsec-navbread">
              <?php /* $iterka=0; ?>            
              <?php foreach ($taxes as $current_term): ?>
                <?php if ($iterka++!=0) echo '·'; ?>
                <a href="<?php echo esc_url( get_term_link($current_term->term_id,'kezeles-csoport') ); ?>" title="<?php echo $current_term->name; ?>">
                  <?php echo $current_term->name; ?>
                </a>
                
              <?php endforeach; */ ?>
              Kapcsolódó kezelések

          </div>
          <h3>Válasszon bevatkozást</h3>
        </header>
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
                      'kezeles-csoport' => 3,
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
              'template' => 'yarpp-template-rt.php', // either the name of a file in your active theme or the boolean false to use the builtin template
              'limit' => 5, // maximum number of results
              'order' => 'score DESC'
            ),
            $reference_ID, // second argument: (optional) the post ID. If not included, it will use the current post.
            true
          ); // third argument: (optional) true to echo the HTML block; false to return it
        ?>
      </nav>
      <section class="subsec-featured">
        <div class="sidebar-inner">
            <section class="widget widget-callme">
              <h3>Felkészült a változásra?</h3>
              <p class="vege">Hívjon
                <a href="tel:+36302991122" class="phone">(+36) 30 299 1122</a><span class="or">–&nbsp;vagy&nbsp;–</span>
                <a href="<?php echo get_permalink('2155'); ?>" class="btn btn-filled">
                  Jelentkezzen online
                </a>
              </p>
            </section>
        </div>
      </section>
    </div>
  </aside>
  <section id="subsec-article" class="subsec">

        <?php 
          $bg = wp_get_attachment_image_src( get_post_thumbnail_id(),'large' );
        ?>
        <style>
          .subsec-sidebar{
            background-image: url('<?php echo $bg[0]; ?>');
          }
        </style>
      
        <article <?php post_class(); ?>>
          <header class="subsec-header">
            <div class="ss-hinner">
              <h1 class="subsec-title"><?php the_title(); ?></h1>
              <!--div class="subsec-meta"><?php get_template_part('templates/entry-meta'); ?></div-->
            </div>
          </header>
          <div class="subsec-inner">
            <div class="subsec-cont">
              <?php if (has_post_thumbnail()) :?>
                <figure class="entry-figure">
                  <?php the_post_thumbnail('medium916'); ?>
                </figure>
              <?php endif; ?>              
              <?php the_content(); ?>


              <?php get_template_part('templates/sharer'); ?>
              
              <footer>
                <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
              </footer>
              <?php //comments_template('/templates/comments.php'); ?>
            </div>
          </div>
        </article>
  </section>

</div>
<?php endwhile; ?>
<?php get_template_part('templates/related','treats'); ?>




  <section class="posts-related posts-lista">
    <div class="wrapper wrapper--normal">
      <h2 class="related-title"><?php _e('Kapcsolódó írások a tudástárból','roots') ?></h2>
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
  </section>
