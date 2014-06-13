<?php 
/*
YARPP Template: Perfect You Related Treatments
Author: Gabor Szabo
Description: A simple YARPP template.
*/
?>
<?php if (have_posts()):?>
<ul class="nav">
	<?php while (have_posts()) : the_post(); ?>
	<li>
    <a href="<?php the_permalink() ?>" rel="bookmark">
        <?php the_title(); ?>
    </a><!-- (<?php the_score(); ?>)-->
  </li>
	<?php endwhile; ?>
</ul>
<?php else: ?>
<p><?php _e('Nincsenek kapcsolódó beavatkozások','roots') ?></p>
<?php endif; ?>
