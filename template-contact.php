<?php
/*
Template Name: Contact Page Template
*/
?>

<section class="home-istvan fullscreen">
  <div class="hist-inner">

  <div class="contact-body">
    <h2>Kedves leendő páciensünk</h2>
    <p>Jelentkezzen konzultációra vagy érdeklődjön a <a ref="tel: +36 30 299 11 22">(+36) 30 299 11 22</a> telefonszámon telefonszámon, ill. bármikor az alábbi űrlap kitöltésével.</p>
    <form action="#">
      <div class="cbal">
        <div class="formitem">
          <label for="name">Név*</label><input required placeholder="Adja meg nevét*" type="text" id="name" name="name">
        </div>
        <div class="formitem">
          <label for="name">Email cím*</label><input required placeholder="E-mail cím" type="email" id="email" name="email">
        </div>
        <div class="formitem">
          <label for="tel">Telefonszám*</label><input required placeholder="Telefonszám*" type="tel" id="tel" name="tel">
        </div>
      </div>
      <div class="cjobb">
        <div class="formitem">
          <label for="message">Üzenet</label><textarea name="message" id="message" cols="30" rows="6"></textarea>
        </div>
      </div>
      <div class="formactions">
        <input type="submit" class="btn btn-filled" value="Jelentkezés elküldése">
      </div>
    </form>
  </div>
   </div>
</section>
<?php get_template_part('templates/content', 'page'); ?>
