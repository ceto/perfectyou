<?php 
/*
YARPP Template: Perfect You Related Entries
Author: Gabor Szabo
Description: A simple YARPP template.
*/
?>
<?php if (have_posts()):?>
<aside class="related-entries">
	<?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/item', 'post'); ?>
	<?php endwhile; ?>
</aside>
<?php else: ?>
<p><?php _e('Nincsenek kapcsolódó írások','roots') ?></p>
<?php endif; ?>
