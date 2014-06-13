<article <?php post_class(); ?>>
  <header>
    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <div class="entry-meta">
      <?php get_template_part('templates/entry-meta'); ?>
    </div>
  </header>
  <div class="entry-summary">
    <?php the_excerpt(); ?>
    <a href="<?php the_permalink(); ?>" class="btn">Elolvasom</a>
  </div>
</article>
