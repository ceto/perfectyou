<div class="page-header">
	<div class="ph-inner">
		<h1><?php echo roots_title(); ?></h1>
		<ul class="ph-cat">
			<?php
				wp_list_categories( array(
					"title_li"	=>	"",
					"hierarchical"	=>	0,
					"child_of"	=> 33,
					)
				);
				?>
		</ul>
	</div>
</div>
