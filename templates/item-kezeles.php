<article <?php post_class(); ?>>
  <header>
    <figure class="entry-thumb">
    <a href="<?php the_permalink(); ?>">
      <?php if (has_post_thumbnail()): ?>
        <?php the_post_thumbnail('thumb169'); ?>
      <?php else : ?>
      <img src="http://placehold.it/240x135/fff7ed/50496b" alt="<?php the_title(); ?>">
      <?php endif; ?>
    </a>
    <h3 class="entry-subtitle"><a href="<?php the_permalink(); ?>"><?php echo get_post_meta( $post->ID, '_meta_slogan', TURE );  ?></a></h3>
    </figure>
    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
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
