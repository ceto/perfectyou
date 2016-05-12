<?php if ( !is_page() && !is_single()  && !is_archive()  && !is_front_page() && !is_home() ): ?>
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
					<h4>Konzultáció és rendelés*</h4>
					<p><strong>dr. Bulyovszky István<br>Mona Lisa Esztétika és Plasztika</strong><br>
					1024 Budapest, Retek u. 10.<br><small>Mammut üzletközpont mellett</small><br>
					<small>*bejelentkezést követően<br><a target="_blank" href="https://goo.gl/maps/GRxtwAzrZ962">Térkép</a></small></p>

          <p><strong>Szt. Lukács Magánkórház</strong><br>
					1139 Budapest, Kartács u. 1-5.<br>
					<small><a target="_blank" href="https://www.google.hu/maps/place/Kart%C3%A1cs+u.+1,+Budapest,+1139/@47.529471,19.074451,17z/data=!3m1!4b1!4m2!3m1!1s0x4741db936ac9e1a7:0x8aa7abadb1034c55">Térkép</a></small></p>

				</div>
				<div class="felezve">
					<h4>Műtétek helyszíne</h4>
					<p><strong>Szt. Lukács Magánkórház</strong><br>
					1139 Budapest, Kartács u. 1-5.<br>
					<small><a target="_blank" href="https://www.google.hu/maps/place/Kart%C3%A1cs+u.+1,+Budapest,+1139/@47.529471,19.074451,17z/data=!3m1!4b1!4m2!3m1!1s0x4741db936ac9e1a7:0x8aa7abadb1034c55">Térkép</a></small></p>

          <p><strong>Mona Lisa Esztétika és Plasztika</strong><br>
          1024 Budapest, Retek u. 10.<br>
          <small><a target="_blank" href="https://goo.gl/maps/GRxtwAzrZ962">Térkép</a></small></p>


					<p><strong>Bejelentkezés telefonon<br>
					<a href="tel:+36302991122">(+36) 30 299 1122</a></strong><br>
					<small><a href="<?php echo get_permalink('810'); ?>/#contactblock">vagy online</a></small></p>
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
  	<a href="https://www.facebook.com/DrBulyovszkyIstvanPlasztikaiSebesz" target="_blank" title="Facebook"><i class="typcn typcn-social-facebook-circular"></i></a>
  	<a href="https://plus.google.com/+BulyovszkyIstván/" target="_blank" title="Google+"><i class="typcn typcn-social-google-plus-circular"></i></a>
  	<a href="https://hu.linkedin.com/pub/istvan-bulyovszky/38/264/a46" target="_blank" title="LinkedIn"><i class="typcn typcn-social-linkedin-circular"></i></a>
  </div>
    <?php get_search_form(); ?>
  </div>
</aside><!-- /.sidebar-contact -->


    <?php // get_template_part('templates/call','me' ); ?>
