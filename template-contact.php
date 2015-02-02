<?php
/*
Template Name: Contact Page Template
*/
?>

<?php
  $response = '';

  function gen_response($type, $uzi){
    if($type == 'success') {
      return $response = '<div id="contacresponse" class="contact-response wrapper wrapper-fullwidth"><p class="success">'.$uzi.'</p></div>';
    } else {
      return $response = '<div id="contacresponse" class="contact-response contact-response wrapper wrapper-fullwidth"><p class="error">'.$uzi.'</p></div>';
    }
  }

  $not_human       = 'Authentication failed';
  $missing_content = 'Missing fields are required';
  $email_invalid   = 'Invalid e-mail address';
  $message_unsent  = 'Error message';
  $message_sent    = '<strong>Köszönjük.</strong><br>Munkatársunk hamarosan jelentkezik.';

  $contact_name = isset($_POST['contact_name'])?$_POST['contact_name']:'';
  $contact_email = isset($_POST['contact_email'])?$_POST['contact_email']:'';
  $contact_tel = isset($_POST['contact_tel'])?$_POST['contact_tel']:'';
  $contact_message = isset($_POST['contact_message'])?$_POST['contact_message']:'';
  $contact_human = isset($_POST['contact_human'])?$_POST['contact_human']:'';


  $to = 'info@perfectyou.hu';
  $subject = "Message from ".get_bloginfo('name');
  
  $headers = "From: " . strip_tags($contact_email) . "\r\n";
  $headers .= "Reply-To: ". strip_tags($contact_email) . "\r\n";
  $headers .= "CC: szabogabi@gmail.com\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
  
if(!$contact_human == 0){
    if($contact_human != 2) gen_response('error', $not_human);
    else {
      
      //validate email
      if(!filter_var($contact_email, FILTER_VALIDATE_EMAIL))
        $response = gen_response('error', $email_invalid);
      else 
      {
        if(empty($contact_name) || empty($contact_message) || empty($contact_tel)){
          $response = gen_response('error', $missing_content);
        }
        else //ready to go!
        {
          $contact_message='Név: '.$contact_name.'<br/>'.'Tel: '.$contact_tel.'<br />'.'Üzenet: <br />'.$contact_message.'<br>---<br>'.$message_sent;
          $sent = wp_mail($to, $subject, $contact_message, $headers);
            if($sent) {
              $sent = wp_mail($contact_email, $subject, $contact_message, $headers);
              $response = gen_response('success', $message_sent);
            } else {
                $response = gen_response('error', $message_unsent);
              }
        }
      }
    }
  } 
  else 
    if (isset($_POST['submitted']) && $_POST['submitted']) { $response = gen_response('error', $missing_content);}

?>
<?php get_template_part('templates/content', 'page'); ?>
<?php echo $response; ?>
<section id="contactblock" class="home-istvan fullscreen">
  <div class="hist-inner">

  <div class="contact-body">
    <h2>Kedves leendő páciensünk</h2>
    <p>Jelentkezzen konzultációra vagy érdeklődjön a <a ref="tel: +36 30 299 11 22">(+36) 30 299 11 22</a> telefonszámon, ill. az alábbi űrlap kitöltésével.</p>
    <form action="<?php the_permalink(); ?>#contacresponse" method="post">
      <div class="cbal">
        <div class="formitem">
          <label for="contact_name">Név*</label><input required placeholder="Adja meg nevét*" type="text" id="contact_name" name="contact_name">
        </div>
        <div class="formitem">
          <label for="contact_email">Email cím*</label><input required placeholder="E-mail cím" type="email" id="contact_email" name="contact_email">
        </div>
        <div class="formitem">
          <label for="contact_tel">Telefonszám*</label><input required placeholder="Telefonszám*" type="tel" id="contact_tel" name="contact_tel">
        </div>
      </div>
      <div class="cjobb">
        <div class="formitem">
          <label for="contact_message">Üzenet</label><textarea name="contact_message" id="contact_message" cols="30" rows="6"></textarea>
        </div>
      </div>
      <div class="formactions">
        <input type="hidden" name="contact_human" value="2">
        <input type="hidden" name="submitted" value="1">
        <input type="submit" class="btn btn-filled" value="Jelentkezés elküldése">
      </div>
    </form>
  </div>
   </div>
</section>

