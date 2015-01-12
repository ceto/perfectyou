<?php if ( !is_page() && !is_single() && !is_archive()  && !is_front_page() && !is_home() ): ?>
  <?php get_template_part('templates/ill','nav' ); ?>
<?php endif ?>



<!-- <aside class="sidebar-contact" role="complementary">
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
</aside> -->

<aside class="sidebar" role="complementary">
  <div class="sidebar-inner">

  	<section class="widget text-2 widget_text">
		  <div class="textwidget">
				<div class="felezve">
					<h4>Perfect You konzultáció*</h4>
					<p><strong>Árkád I. Irodaház</strong><br>
					1106 Budapest, Örs vezér tere 25.<br>3. emelet<br>
					<small>*bejelentkezést követően<br><a href="#">Térkép</a></small></p>
					<p>1118 Budapest, Számadó u. 6.<br>
					<small>*bejelentkezést követően<br><a href="#">Térkép</a></small></p>
					<p><strong>Bejelentkezés telefonon<br>
					<a href="tel:+36302991122">(+36) 30 299 1122</a></strong><br>
					<small><a href="<?php echo get_permalink('2155'); ?>">vagy online</a></small></p>
				</div>
				<div class="felezve">
					<h4>Műtétek helyszíne</h4>
					<p><strong>Szt. Lukács Magánkórház</strong><br>
					1139 Budapest, Kartács u. 1-5.<br>
					<small><a href="#">Térkép</a></small></p>

					<p><strong>Kútvölgyi Klinikai Tömb</strong><br>
					1125 Budapest, Kútvölgyi út 4., 5. em.<br>
					<small><a href="#">Térkép</a></small></p>

					<p><strong>Királyerdei Szépségközpont</strong><br>
					1213 Budapest, Szent István út 248-250.<br>
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


    <?php // get_template_part('templates/call','me' ); ?>