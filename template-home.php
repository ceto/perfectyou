<?php
/*
Template Name: Homepage Template
*/
?>




   
<header class="home-hero">
  <div class="homehero-inner">
    <img class="signo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/drbulyovszky.png" alt="dr. Bulyovszky">
    <h1>Plasztikai sebész<small>A tökéletes megjelenésért</small></h1>
    <div class="action-block">
      <a href="#feat-treats" class="btn" id="szep-ctrl">Szépülni szeretne?</a>
      <a href="#feat-treats" class="btn btn-filled" id="fiatal-ctrl">Fiatalítodni szeretne?</a>
    </div>
  </div>
</header>




<?php get_template_part('templates/call','me' ); ?>



<section class="home-istvan fullscreen">
  <div class="hist-inner">
    <h3 class="cv-title">dr. Bulyovszky István <em>Plasztikai sebész</em></h3>
    <p>A PERFECT YOU plasztikai sebésze, dr. Bulyovszky István az elméleti és gyakorlati tudás összhangját, együttes magas színvonalra emelését tartja vezérelvnek.
    </p>
    <blockquote>
      <p>Engem a manualitás - az elmélet "kézzel fogható", gyakorlati alkalmazása - motivál. Valahogy úgy, mint a szobrászt, amikor a valósághoz hozzáad valami művészit, amivel a mű több lesz, de a lényege nem változik meg.</p>
    </blockquote>
  
    <p>A folyamatos szakmai képzés elengedhetetlen ahhoz, hogy a színvonalas szaktudásnak köszönhetően a lehető legjobb ellátást nyújtsuk. Ezért vagyunk elkötelezettek amellett, hogy pácienseinknek mindezt a legújabb technikákkal, kiváló eszközökkel, technológiákkal és a legjobb minőségű alapanyagokkal biztosítsuk.</p>
    <a href="<?php echo get_permalink(790); ?>" class="btn">Bővebben</a>
   </div>
</section>

<?php get_template_part('templates/ill','nav' ); ?>


<?php get_template_part('templates/feat','treats' ); ?>




















