<?php 
/*
YARPP Template: Perfect You Related Entries
Author: Gabor Szabo
Description: A simple YARPP template.
*/
?>
<?php if (have_posts()):?>
<ol class="related-entries">
    <li>
    <h4>
      <a href="#" rel="bookmark">
        Mi a teendő a lorem ipsum dolor sit amet esetén
      </a><!-- (<?php the_score(); ?>)-->
    </h4>
    <p>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, architecto, ipsam illo nulla ratione cupiditate voluptatibus itaque dolorum odio deserunt? Nam, fuga voluptatum ducimus voluptates sequi similique nobis. Ratione, non.
    </p>
  </li>
	<?php while (have_posts()) : the_post(); ?>
	<li>
    <h4><a href="<?php the_permalink() ?>" rel="bookmark">
        <?php the_title(); ?> <?php the_score(); ?> lorem ipsum
    </a><!-- (<?php the_score(); ?>)--></h4>
    <p>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, architecto, ipsam illo nulla ratione cupiditate voluptatibus itaque dolorum odio deserunt? Nam, fuga voluptatum ducimus voluptates sequi similique nobis. Ratione, non.
    </p>
  </li>
	<?php endwhile; ?>
</ol>
<?php else: ?>
<p><?php _e('Nincsenek kapcsolódó írások','roots') ?></p>
<?php endif; ?>
