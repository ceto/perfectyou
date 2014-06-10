<article <?php post_class(); ?>>
  <figure class="entry-thumb">
  	<a href="<?php the_permalink(); ?>">
  		<img src="http://placehold.it/480x360" alt="<?php the_title(); ?>">
  	</a>
  </figure>
  <header>
    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <!-- <h3 class="entry-subtitle"><?php echo get_post_meta( $post->ID, '_meta_slogan', TURE );  ?></h3> -->
  </header>
  <div class="entry-summary">
    <ul class="nav">
      <?php
        $streats = get_post_meta( $post->ID, '_meta_sections', true ); $trno=1; 
        $trno=1;
        foreach ( (array) $streats as $key => $entry ) {
      ?>
          <li><a href="<?php the_permalink(); ?>#subsec-<?php echo $trno++;  ?>"><?php echo esc_html( $entry['title'] ); ?></a></li>
      <?php  } ?>
          <li><a href="<?php the_permalink(); ?>#subsec-<?php echo $trno++;  ?>"><?php _e('Tippek és tanácsok a döntéshez','root') ?></a></li>
    </ul>
  </div>
</article>
