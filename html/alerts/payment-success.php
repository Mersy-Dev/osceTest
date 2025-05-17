<?php

require "header.php";


// Function to decrypt data using AES-256-CBC
function decrypt_data($encrypted_data, $key) {
  $decoded_data = base64_decode($encrypted_data);
  $iv_length = openssl_cipher_iv_length('aes-256-cbc');
  $iv = substr($decoded_data, 0, $iv_length);
  $ciphertext = substr($decoded_data, $iv_length);
  return openssl_decrypt($ciphertext, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);
}

// Encryption key for sensitive data
$encryption_key = "the porous borders of Niger and Nigeria";

if (get('data')) {
// Decode the encrypted data from the URL
$data = json_decode(base64_decode(get('data')), true);


// Decrypt the data received as a GET parameter
$encrypted_data = get('data');
$decrypted_data = json_decode(decrypt_data($encrypted_data, $encryption_key), true);

// Check if user is logged in
if (logged_in()) {
  if($_SESSION['email'] == $decrypted_data['user_id']){

  $email = $_SESSION['email'];

  $pricing_plan = $decrypted_data['pricing_plan'];

  if ($pricing_plan==1) {
    $days = 30;
    $plan = "14.99 - 1 month";
  } elseif ($pricing_plan==2) {
    $days = 90;
    $plan = "37.98 - 3 months";
  } elseif ($pricing_plan==3) {
    $days = 365;
    $plan = "99.96 - 12 months";
  }

  $time = time();
  $expiry = $time + $days*24*3600;

  $expiry_date = date('d m Y', $expiry);
  $today = date('d m Y');

  $sql = "INSERT INTO payment_history (email, plan, time_paid, time_expiry) VALUES('$email', '$plan', '$time', '$expiry')";
  if ($query=mysqli_query($conn, $sql)) {
    $_SESSION['premium'] = true;


    // mail_content_title, mail_content_message, mail_firstname,
    // mail_target, mail_subject

    $mail_content_title = "Payment Completed Successfully";
    $mail_firstname = $_SESSION['first_name'];
    $mail_target = $email;
    $mail_subject = "Payment Completed Successfully";

    $mail_content_message = "
      Hey! Your payment has been completed successfully and we're glad to have you.
      <br>
      <br>
      Here are the details of your plan
      <br>
      Plan: <b>$plan</b>
      <br>
      Paid: <b>$today</b>
      <br>
      Expiry: <b>$expiry_date</b>

      <br>
      <br>
      You can access your dashboard here
      <br>
      <a href='https://oscetoolbox.com/dashboard'><button class='main-search-btn'> Dashboard </button></a>
    ";

    require_once "inc/mailer.php";

    header("Location: payment-info?info=success");
    exit();
  }else{
    echo "error";
    // print_r($query);
  }


?>






<?php
    }
  }
}

?>
</div>

<br>
<br>
<br>
<br>
<br>
<br>

<?php

  require "../footer.php";

?>