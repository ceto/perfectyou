<div class="subsections">

  <aside class="subsec-sidebar">

    <div class="sss-inner">
      <nav class="subsec-nav">
        <header class="subsec-navhead">
          <div class="subsec-navbread">
            <?php the_category( ' · '); ?> 
          </div>
          <h3>Plasztikai Sebészet</h3>
        </header>
     		<?php	if (has_nav_menu('footer_navigation')) : ?>
	        <?php wp_nav_menu(array('theme_location' => 'footer_navigation', 'menu_class' => 'nav nav-pills')); ?>
				<?php endif; ?>
      </nav>
      <section class="subsec-featured">
        <div class="sidebar-inner">
            <section class="widget widget-callme">
              <h3>Felkészült a változásra?</h3>
              <p class="vege">Hívjon
                <a href="tel:+36302991122" class="phone">(+36) 30 299 1122</a><span class="or">–&nbsp;vagy&nbsp;–</span>
                <a href="<?php echo get_permalink('2155'); ?>" class="btn btn-filled">
                  Jelentkezzen online
                </a>
              </p>
            </section>
        </div>
      </section>
    </div>
  </aside>
  <section id="subsec-article" class="subsec">
    <?php while (have_posts()) : the_post(); ?>
        <?php 
          $bg = wp_get_attachment_image_src( get_post_thumbnail_id(),'full916' );
        ?>
        <style>
          .subsec-sidebar{
            background-image: url('<?php echo $bg[0]; ?>');
          }
        </style>
      
        <article <?php post_class(); ?>>
          <header class="subsec-header">
            <div class="ss-hinner">
              <h1 class="subsec-title"><?php the_title(); ?></h1>
            </div>
          </header>
          <div class="subsec-inner">
            <div class="subsec-cont">
              <?php if (has_post_thumbnail()) :?>
                <figure class="entry-figure">
                  <?php the_post_thumbnail('medium916'); ?>
                </figure>
              <?php endif; ?>              
              <?php the_content(); ?>
              <footer>
                <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
              </footer>
              <?php //comments_template('/templates/comments.php'); ?>
            </div>
          </div>
        </article>

    <?php endwhile; ?>
  </section>
</div>