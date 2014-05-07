<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
      <?php 
        $imoci = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'banner' ); 
      ?>
    <style>
      body{
        background-image:url('<?php echo $imoci[0]; ?>');
      }
    </style>
    <header class="treat-header">
      
            <h1 class="treat-title"><?php the_title(); ?></h1>
        <?php if ( get_post_meta( $post->ID, '_meta_slogan', TURE ) ): ?>
        <div class="treat-slogan"><?php echo get_post_meta( $post->ID, '_meta_slogan', TURE );  ?></div>
      <?php endif ?>

      
      <?php if ( get_post_meta( $post->ID, '_meta_lead', TURE ) ): ?>
        <div class="treat-lead"><?php echo get_post_meta( $post->ID, '_meta_lead', TURE );  ?></div>
      <?php endif ?>
    </header>



    <nav class="contentnav">
      <ul>
      <?php 
        $streats = get_post_meta( $post->ID, '_meta_sections', true ); $trno=1;
        foreach ( (array) $streats as $key => $entry ) {
        ?>
        <li><a href="#subsec-<?php echo $trno++;  ?>"><?php echo esc_html( $entry['title'] ); ?></a></li>
        <?php  } ?>
      </ul>
        <a href="#" class="bigbtn">Bejelentkezés<br/><span>0036707705653</span></a>
    </nav>
    


    <div class="treat-content">

      <?php the_content(); ?>
    </div>



    <div class="subsections">
      <aside class="subsec-sidebar">
      <a class="brand" href="<?php echo home_url('/') ?>"><?php bloginfo('name'); ?></a>
      <nav class="subsec-nav">
        <ul>
          <?php 
            reset ($streats); $trno=1;
            foreach ( (array) $streats as $key => $entry ) {
          ?>
              <li><a href="#subsec-<?php echo $trno++;  ?>"><?php echo esc_html( $entry['title'] ); ?></a></li>
          <?php  } ?>
        </ul>
        
      </nav>
      <section class="side-related">
        <h3>Kapcsolódó tartalmak</h3>
        <ul>
          <li><a href="#">Hogyan válasszunk szilikont a mellünkbe</a></li>
          <li><a href="#">Mi a különbség a melfelvarrás és nagyobbítsá között</a></li>
          <li><a href="#">Mikor nem ajánlott a mellnagyobbító műtét</a></li>
          <li><a href="#">A gyógyulás menete melnagyobbítás után</a></li>
          <li><a href="#">Felkészülés a mellnagyobbító műtétre</a></li>
          
        </ul>
      </section>
      <a href="#" class="nyomjad">Bejelentkezés<br/><span>0036707705653</span></a>
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
            </div>
          </div>
        </section>
      <?php  } ?>

    
    </div>

    <footer>
      <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
    </footer>
    <?php comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>
