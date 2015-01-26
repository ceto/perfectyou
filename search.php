<div class="page-header">
  <div class="ph-inner">
    <h1><?php echo roots_title(); ?><small>A plasztikai sebész írásaiból</small></h1>
  </div>
</div>
<?php //get_template_part('templates/ill','nav' ); ?>
<section class="itemlist posztok side-related" >
  <div class="subsec-inner">
    <div class="subsec-cont">
      <div class="related-entries">
        <?php if (!have_posts()) : ?>
          <div class="alert alert-warning">
            <?php _e('Sorry, no results were found.', 'roots'); ?>
          </div>
          <?php get_search_form(); ?>
        <?php else: ?>
          <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part('templates/item', 'post'); ?>
          <?php endwhile; ?>
        <?php endif; ?>

        <?php if ($wp_query->max_num_pages > 1) : ?>
          <nav class="post-nav">
            <ul class="pager">
              <li class="previous"><?php next_posts_link(__('&larr; Older posts', 'roots')); ?></li>
              <li class="next"><?php previous_posts_link(__('Newer posts &rarr;', 'roots')); ?></li>
            </ul>
          </nav>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>


<?php //get_template_part('templates/call','me' ); ?>

