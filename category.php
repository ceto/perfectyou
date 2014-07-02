<div class="page-header">
  <div class="ph-inner">
    <h1><?php echo roots_title(); ?><small>A plasztikai sebész tudástárából</small></h1>
      <ul class="ph-cat">
        <?php
          wp_list_categories( array(
            "title_li"  =>  "",
            "hierarchical"  =>  0,
            "child_of"  => 33,
            )
          );
          ?>
      </ul>
  </div>
</div>
<?php 
  $saved_data = get_tax_meta(get_query_var('cat'),'ba_image_field_id');
  $cat_img_id=$saved_data['id'];
  $imoci=wp_get_attachment_image_src( $cat_img_id, 'full43');
?>
<style>
  .page-header{
    background-image:url('<?php echo $imoci[0]; ?>');
  }
</style>
<?php get_template_part('templates/call','me' ); ?>
<section class="itemlist posztok" >
  <div class="itemlist-inner">
    <?php if (!have_posts()) : ?>
      <div class="alert alert-warning">
        <?php _e('Sorry, no results were found.', 'roots'); ?>
      </div>
      <?php get_search_form(); ?>
    <?php else: ?>
      <?php while (have_posts()) : the_post(); ?>
        <?php get_template_part('templates/item', get_post_type()); ?>
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
</section>


<?php //get_template_part('templates/call','me' ); ?>

