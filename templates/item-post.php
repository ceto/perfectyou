<?php 
  $taxes=wp_get_post_terms($post->ID, 'kezeles-csoport');
?>
<article <?php post_class(); ?>>
  <header>
    <div class="entry-cat">
      <?php $iterka=0; ?>            
      <?php foreach ($taxes as $current_term): ?>
        <?php if ($iterka++!=0) echo '·'; ?>
        <a href="<?php echo esc_url( get_term_link($current_term->term_id,'kezeles-csoport') ); ?>" title="<?php echo $current_term->name; ?>">
          <?php echo $current_term->name; ?>
        </a>
        
      <?php endforeach ?>
    </div>

    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <!--div class="entry-time">
        <time class="published" datetime="<?php echo get_the_time('c'); ?>"><?php echo get_the_date(); ?></time>
    </div-->
  </header>
  <div class="entry-summary">
    <?php the_excerpt(); ?>
    <a href="<?php the_permalink(); ?>" class="btn">Elolvasom</a>
  </div>
</article>
