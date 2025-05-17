<?php


error_reporting(E_ALL);
ini_set('display_errors', '1');

  require "header.php";


if (post('name') and post('email') and post('message') and post('recaptcha_response')) {


  $secretKey = '6LcGuHAnAAAAAFbN99vQQ33MmAIIsPgHS45Fbg0p';
  $recaptchaResponse = $_POST['recaptcha_response'];

  // Make a POST request to the reCAPTCHA API to verify the response
  $verificationUrl = 'https://www.google.com/recaptcha/api/siteverify';
  $data = array(
      'secret' => $secretKey,
      'response' => $recaptchaResponse
  );

  $options = array(
      'http' => array(
          'header' => "Content-type: application/x-www-form-urlencoded\r\n",
          'method' => 'POST',
          'content' => http_build_query($data)
      )
  );

  $context = stream_context_create($options);
  $response = file_get_contents($verificationUrl, false, $context);
  $recaptchaResult = json_decode($response);

  // Check if the reCAPTCHA verification succeeded
  if (!$recaptchaResult->success) {
      die('<center>reCAPTCHA verification failed. Please try again.</center>');
  }else{

    // die('We got your mail bruh');

    $mail_content_title = "Contact Form OSCE Toolbox";
    $mail_firstname = softSan(post('name'));
    $mail_target = "oscetoolbox@gmail.com";
    $mail_subject = "Contact Form OSCE Toolbox";

    $mail_content_message = "
    A User Filled the Contact form on /contact
    <br>
    <br>
    <b>Name:</b> &nbsp; &nbsp;".post('name')."
    <br>
    <b>Email:</b> &nbsp; &nbsp;".post('email')."
    <br>
    <b>Subject:</b> &nbsp; &nbsp;".post('subject')."
    <br>
    <br>
    <b>Message:</b> &nbsp; &nbsp;".post('message')."
    ";

    require_once "inc/mailer.php";
           
   // if ($retval = mail ($mail_to,$mail_subject,$mail_message,$mail_header)){
    header("Location: mail-sent");
    exit();
   // }

  }

}


?>

<style>
  a{
    text-decoration:underline
  }
</style>


<body>

  <!-- <div class="title">Contact</div> -->

  <br>
  <!-- <br> -->
  <br>

    <p style="width:90%;max-width:1000px;margin:auto">



    <div class="touch">
      <div class="header">Contact</div>  


      <br>
      <div class="row">
        <div class="col-sm">
            <form action="" method="post">
          <input class="form" type="" placeholder="Full Name" name="name" <?php if (get('review') AND isset($_SESSION['first_name'])): ?>
            value="<?php echo $_SESSION['first_name'];?>"
          <?php endif ?>>

          <input class="form" type="" placeholder="Email" name="email" <?php if (get('review') AND isset($_SESSION['email'])): ?>
            value="<?php echo $_SESSION['email'];?>"
          <?php endif ?>>
          <textarea style="height:150px" class="form" placeholder="Message" name="message"><?php if (get('content')) {
            echo softSan(get('content'));
          } ?></textarea>
          <input type="hidden" id="recaptcha_response" name="recaptcha_response">
          <br>
          <button type="send" class="btn" id="send" disabled>SEND</button>
          </form>

          <br>

          <div class="disclaimer" style="width:100%"><i class='bx bxs-florist' ></i> We are currently a small team and therefore may be slow to respond. We appreciate your patience!</div>
        </div>
        <!-- <div class="col-sm"></div> -->
        
        
      </div>

      <script src="https://www.google.com/recaptcha/api.js?render=6LcGuHAnAAAAAKs8xL0Zh04H5e42y8d4Y6jfbysX"></script>

      <script>
        grecaptcha.ready(function() {
            var siteKey = '6LcGuHAnAAAAAKs8xL0Zh04H5e42y8d4Y6jfbysX';

            grecaptcha.execute(siteKey, { action: 'contact' }).then(function(response) {
                // Assign the response to the hidden input field
                console.log(response);
                document.getElementById('recaptcha_response').value = response;
                document.getElementById("send").disabled = false;
            });
        });
      </script>

        <br>
        <br>
        Alternatively, you can email us at 
        <a href="mailto:oscetoolbox@gmail.com">oscetoolbox@gmail.com</a> or reach out to our social media channels and we will endeavour to respond to you as soon as possible. 
        <br>
        <br>
        If you would like to submit a complaint, please do so using our <a href="https://forms.gle/thjueMv4wWvLDY668">complaints form</a>
        <br>
        <br>
        <i class="icofont-instagram" style="color:#EF798A"></i> Instagram @<a target="_blank" href="https://www.instagram.com/oscetoolbox/">oscetoolbox</a>
        <br>
        <i class="icofont-twitter" style="color:#EF798A"></i> Twitter @<a target="_blank" href="https://twitter.com/oscetoolbox">oscetoolbox</a>
        <br>
        <i class="icofont-facebook" style="color:#EF798A"></i> Facebook @<a target="_blank" href="https://web.facebook.com/people/OSCE-Toolbox/100088965690695/">OSCE-Toolbox</a>
    </div>

    
      
    </p>


  <br>
  <br>
  <br>

  </body>

<?php 

require "footer.php"; 

?>