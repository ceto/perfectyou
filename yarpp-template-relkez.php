<?php 
/*
YARPP Template: Perfect You Related Entries
Author: Gabor Szabo
Description: A simple YARPP template.
*/
?>
<?php if (have_posts()):?>
<aside class="related-treats">
	<?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/item', 'kezeles'); ?>
	<?php endwhile; ?>
</aside>
<?php else: ?>
<p><?php _e('Nincsenek kapcsolódó kezelések','roots') ?></p>
<?php endif; ?>
