<?php get_template_part('templates/page', 'header'); ?>
<?php //get_template_part('templates/ill','nav' ); ?>
<?php 
  $saved_data = get_tax_meta(get_query_var('cat'),'ba_image_field_id');
  $cat_img_id=$saved_data['id'];
  $imoci=wp_get_attachment_image_src( $cat_img_id, 'full43');
?>
<style>
  .main{
    background-image:url('<?php echo $imoci[0]; ?>');
  }
</style>

<?php
  $the_kezeles = new WP_Query(array(
    'post_type' => array('kezeles'),
    'cat'  => get_query_var('cat'),
    'posts_per_page' => -1,
  ));

  $oldal = (get_query_var('paged'))?get_query_var('paged'):1; 
?>

<?php if (  ($oldal<2) &&  $the_kezeles->have_posts()) : ?>
<section class="kezeleslist">
  <div class="kezeleslist-inner">
    <h2><?php _e('Műtétek és beavatkozások','roots') ?></h2>
    <?php while ($the_kezeles->have_posts()) : $the_kezeles->the_post(); ?>
      <?php if (get_post_type()=='kezeles'): ?>
          <?php get_template_part('templates/item', get_post_type()); ?>
      <?php endif ?>
    <?php endwhile; ?>
  </div>
</section>
<?php endif; ?>



<section class="itemlist posztok" >
  <div class="itemlist-inner">
    <?php if (!have_posts()) : ?>
      <div class="alert alert-warning">
        <?php _e('Sorry, no results were found.', 'roots'); ?>
      </div>
      <?php get_search_form(); ?>
    <?php else: ?>
      <h2><?php _e('Tudástár','roots') ?></h2>
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

