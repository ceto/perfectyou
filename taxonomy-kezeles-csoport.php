<div class="page-header">
  <div class="ph-inner">
    <h1><?php echo roots_title(); ?><small><?php _e('Műtétek és beavatkozások','roots') ?></small></h1>
  </div>
</div>


<?php 

  $current_term = get_term_by( 'slug', get_query_var( 'term' ), 'kezeles-csoport' );
  $term_id = $current_term->term_id;

  $saved_data = get_tax_meta($term_id,'tc_image_field_id');
  $cat_img_id=$saved_data['id'];
  $imoci=wp_get_attachment_image_src( $cat_img_id, 'full43');
?>
<style>
  .page-header{

  background-image: -webkit-gradient(linear, left top, right top, from(rgba(255, 255, 255, 0)), color-stop(50%, rgba(255, 255, 255, 0)), to(#ffffff)), url('<?php echo $imoci[0]; ?>');
  background-image: -webkit-linear-gradient(left, rgba(255, 255, 255, 0) 0, rgba(255, 255, 255, 0) 50%, #ffffff 100%), url('<?php echo $imoci[0]; ?>');
  background-image: linear-gradient(to right, rgba(255, 255, 255, 0) 0, rgba(255, 255, 255, 0) 50%, #ffffff 100%), url('<?php echo $imoci[0]; ?>');

    
  }
</style>

<?php get_template_part('templates/ill','nav' ); ?>

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
<?php // get_template_part('templates/call','me' ); ?>

<?php // get_template_part('templates/call','me' ); ?>



