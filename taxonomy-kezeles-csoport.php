
<?php get_template_part('templates/call','me' ); ?>
<div class="page-header">
  <div class="ph-inner">
    <h1><?php echo roots_title(); ?><small><?php _e('Műtétek és beavatkozások','roots') ?></small></h1>
  </div>
</div>

<?php 
  $saved_data = get_tax_meta(get_query_var('kezeles-csoport'),'tc_image_field_id');
  $cat_img_id=$saved_data['id'];
  $imoci=wp_get_attachment_image_src( $cat_img_id, 'full43');
?>
<style>
  .main{
    background-image:url('<?php echo $imoci[0]; ?>');
  }
</style>


<?php 
 //$query->set('posts_per_page', 100);
?>

<section class="kezeleslist">
  <div class="kezeleslist-inner">
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

  </div>
</section>

<?php get_template_part('templates/ill','nav' ); ?>
<?php //get_template_part('templates/call','me' ); ?>

