<?php get_template_part('templates/page', 'header'); ?>
<style>
  .posztok{
    background-image: url('<?php echo get_stylesheet_directory_uri().'/assets/img/mell_bg.jpg'; ?>');
  }
</style>

<section class="kezeleslist">
  <div class="kezeleslist-inner">
    <h2><?php _e('Műtétek és beavatkozások','roots') ?></h2>
    <?php while (have_posts()) : the_post(); ?>
      <?php if (get_post_type()=='kezeles'): ?>
          <?php get_template_part('templates/item', get_post_type()); ?>
      <?php endif ?>
    <?php endwhile; ?>
  </div>

</section>


<section class="itemlist posztok" >
  <div class="itemlist-inner">
    <?php if (!have_posts()) : ?>
      <div class="alert alert-warning">
        <?php _e('Sorry, no results were found.', 'roots'); ?>
      </div>
      <?php get_search_form(); ?>
    <?php endif; ?>
  <!-- <h2><?php _e('Hasznos tartalmak, írások','roots') ?></h2> -->
    <?php rewind_posts(); ?>
    <?php while (have_posts()) : the_post(); ?>
    <?php if (get_post_type()!=='kezeles'): ?>
        <?php get_template_part('templates/item', get_post_type()); ?>
    <?php endif ?>
    <?php endwhile; ?>
  </div>
</section>


<?php if ($wp_query->max_num_pages > 1) : ?>
  <nav class="post-nav">
    <ul class="pager">
      <li class="previous"><?php next_posts_link(__('&larr; Older posts', 'roots')); ?></li>
      <li class="next"><?php previous_posts_link(__('Newer posts &rarr;', 'roots')); ?></li>
    </ul>
  </nav>
<?php endif; ?>
