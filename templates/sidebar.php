<?php if ( !is_page() && !is_single() && !is_archive()  && !is_front_page() && !is_home() ): ?>
  <?php get_template_part('templates/ill','nav' ); ?>
<?php endif ?>

<aside class="sidebar-contact" role="complementary">
  <div class="sidebar-inner">
  	<a href="<?php echo get_bloginfo('home'); ?>" class="clogo">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo_arany_footer.png" alt="Perfect You - Plasztikai Sebészet">
  	</a>
  	<div class="kozepe">
  		<a href="mailto:info@perfectyou.hu" class="cemail">info@perfectyou.hu</a>
  		<a href="tel:0036707705653" class="ctel">00 36 70 770 5653</a>
  	</div>
  	<a href="#contact" data-toggle="collapse" class="btn btn-filled">Online jelentkezés</a>
    
  </div>
</aside><!-- /.sidebar-contact -->

<aside class="sidebar" role="complementary">
  <div class="sidebar-inner">

  	<section class="widget text-2 widget_text">
		  <div class="textwidget">
				<div class="felezve">
					<h4>Betegfelvétel, rendelő*</h4>
					<p><strong>Perfect You - Plasztikai Sebészet</strong><br>
					1021 Budapest, Medve u. 34.<br>
					<small>*időpontegyeztetés szükséges<br><a href="#">Térkép</a></small></p>
				</div>
				<div class="felezve">
					<h4>Műtétek helyszíne</h4>
					<p><strong>Kútvölgyi Klinikai Tömb</strong><br>
					1125 Budapest, Kútvölgyi út 4., 5. em.<br>
					<small><a href="#">Térkép</a></small></p>
					<p><strong>Szt. Lukács Magánkórház</strong><br>
					1139 Budapest, Kartács u. 1-5.<br>
					<small><a href="#">Térkép</a></small></p>
				</div>

			</div>
		</section>
		

		<?php	if (has_nav_menu('footer_navigation')) : ?>
		<section class="widget widget-menu">
			<h3 class="widget-title"><?php _e('Jó tudni, ha hozzánk fordul','roots'); ?></h3>
		  <nav class="nav-footer" role="navigation">
        <?php wp_nav_menu(array('theme_location' => 'footer_navigation', 'menu_class' => 'nav nav-pills')); ?>
	    </nav>
		</section>
		<?php endif; ?>

    <?php // dynamic_sidebar('sidebar-primary'); ?>
  </div>
</aside><!-- /.sidebar -->

<aside class="sidebar-search" role="complementary">
  <div class="sidebar-inner">
  <div class="social-icons">
  	<a href="#" title="LinkedIn"><i class="typcn typcn-social-linkedin-circular"></i></a>
  	<a href="#" title="Facebook"><i class="typcn typcn-social-facebook-circular"></i></a>
  	<a href="#" title="Google+"><i class="typcn typcn-social-google-plus-circular"></i></a>  	
  </div>
    <?php get_search_form(); ?>
  </div>
</aside><!-- /.sidebar-contact -->