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
    </nav>
    

    <div class="treat-content">
      <?php the_content(); ?>
    </div>



    <div class="subsections">
      <?php reset ($streats); $trno=1;
        foreach ( (array) $streats as $key => $entry ) {
      ?>
        <section id="subsec-<?php echo $trno++;  ?>" class="subsec">
          <?php
            $ima = $entry['ill_id'];
            $imci = wp_get_attachment_image_src( $ima, 'thumbnail');
          ?>
          <figure class="subsec-figure">
            <img src="<?php echo $imci[0]; ?>" width="<?php echo $imci[1]; ?>" height="<?php echo $imci[2]; ?>" alt="<?php echo esc_html( $entry['title'] );  ?>">
          </figure>
          <h2 class="subsec-title"><?php echo esc_html( $entry['title'] );  ?></h2>
          <div class="subsec-cont">
            <?php echo apply_filters('the_content', $entry['content'] );?>
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
