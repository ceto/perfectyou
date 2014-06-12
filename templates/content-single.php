<div class="subsections">
  <aside class="subsec-sidebar">
    <div class="sss-inner">
    <h3>Ez az oldalsav</h3>
    <p>
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui, reiciendis distinctio neque amet numquam beatae.
    </p>
    <p>
      Expedita, illum vel saepe quia dolorem! Velit, quasi quaerat placeat quia molestias id quos nostrum!
    </p>
  </div>
  </aside>
  <section id="subsec-article" class="subsec">
    <?php while (have_posts()) : the_post(); ?>
        <?php 
          $bg = wp_get_attachment_image_src( get_post_thumbnail_id(),'large' );
        ?>
        <style>
          .subsec-sidebar{
            background-image: url('<?php echo $bg[0]; ?>');
          }
        </style>
      
        <article <?php post_class(); ?>>
          <header class="subsec-header">
            <h1 class="subsec-title"><?php the_title(); ?></h1>
            <div class="subsec-meta"><?php get_template_part('templates/entry-meta'); ?></div>
          </header>
          <div class="subsec-inner">
            <div class="subsec-cont">
              <figure class="entry-figure">
                <?php the_post_thumbnail(); ?>
              </figure>
              <?php the_content(); ?>
              <footer>
                <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
              </footer>
              <?php comments_template('/templates/comments.php'); ?>
            </div>
          </div>
        </article>

    <?php endwhile; ?>
  </section>
</div>