<article <?php post_class(); ?>>
  <header>
    <div class="entry-cat">
      <?php the_category( ' · ', 'multiple'); ?> 
    </div>

    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <div class="entry-time">
        <time class="published" datetime="<?php echo get_the_time('c'); ?>"><?php echo get_the_date(); ?></time>
    </div>
  </header>
  <div class="entry-summary">
    <?php the_excerpt(); ?>
    <a href="<?php the_permalink(); ?>" class="btn">Elolvasom</a>
  </div>
</article>
