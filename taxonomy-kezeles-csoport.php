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
  $imoci=wp_get_attachment_image_src( $cat_img_id, 'bazi');
?>
<style>
  .page-header{

  /*background-image: url('<?php echo $imoci[0]; ?>');*/

    
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



<section class="side-related kezeleslist-related">
  <header class="subsec-header">
    <div class="ss-hinner">
      <h2 class="subsec-title"><?php _e('Kapcsolódó írások a tudástárból','roots') ?></h2>
    </div>
  </header>
  <div class="subsec-inner">
    <div class="subsec-cont">

      <?php 
        $related_posts = new Wp_Query(
          array(
            'post_type' => 'post',
            'post_per_page' => -1,
            'tax_query' => array(
              array(
                'taxonomy' => 'kezeles-csoport',
                'field'    => 'slug',
                'terms'    => $current_term
              )
            ),
          )
        );
      ?>
      <?php if ($related_posts->have_posts()):?>
        <aside class="related-entries">
          <?php while ($related_posts->have_posts()) : $related_posts->the_post(); ?>
            <?php get_template_part('templates/item', 'post'); ?>
          <?php endwhile; ?>
        </aside>
        <?php else: ?>
        <?php _e('Nincsenek kapcsolódó írások','roots') ?>
      <?php endif; ?>
      <?php $kk = get_category_by_slug($current_term->slug ); ?>
      <a href="<?php echo get_category_link( $kk->term_id ); ?> " class="">További írások a blogban</a>

    </div>
  </div>
</section>
<?php // get_template_part('templates/call','me' ); ?>

<?php // get_template_part('templates/call','me' ); ?>



