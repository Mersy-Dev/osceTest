<pre>

<?php 

require "../inc/conn.php";
require_once 'stripe/init.php';


require_once 'config.php'; 


 
// Set API key 
\Stripe\Stripe::setApiKey(STRIPE_API_KEY);


if (get('p') and is_numeric(get('p')) and get('p')<4) {
  $pricing_plan = get('p');

  if ($pricing_plan==1) {
    // test
    // $price_id = 'price_1Ngu5gJlrn82pmw81pHIlPmS';
    // live
    $price_id = 'price_1OQyRWJlrn82pmw8K29lidt2';
    $amount = '14.99';
  } elseif ($pricing_plan==2) {
    // $price_id = 'price_1MoYXCJlrn82pmw83JjVGv8n';
    // live
    $price_id = 'price_1OQyTfJlrn82pmw8eKeiDntq';
    $amount = '37.98';
  } elseif ($pricing_plan==3) {
    // live
    $price_id = 'price_1OQyUQJlrn82pmw8ZXn6Txdw';
    $amount = '99.96';
  }

  if (logged_in()) {
    // Code to handle logged-in users
  } else {
    header("Location: ../payment-info?info=login");
    exit();
  }


  $email = $_SESSION['email'];
  $current_time = time();
  $query = mysqli_query($conn, "SELECT id FROM user_payments WHERE email='$email' AND period_end_timestamp>$current_time AND status='active'");

  if ($query->num_rows > 0) {
    header("Location: ../payment-info?info=paid");
    exit();
  }

  // Encryption key for sensitive data
$encryption_key = "the porous borders of Niger and Nigeria";

  $payment_id = md5($email.uniqid());



  $checkout_session = \Stripe\Checkout\Session::create([
    'line_items' => [[
      'price' => $price_id,
      'quantity' => 1,
    ]],
    'mode' => 'subscription',
    'allow_promotion_codes' => true,
    // Success URL with encrypted data as a GET parameter
    'success_url' => $url . 'subscription/success?payment_id=' . $payment_id,
    'cancel_url' => $url . 'payment-info?info=cancelled',
  ]);

  $session_id = $checkout_session->id;

  mysqli_query($conn, "INSERT INTO user_payments (email, payment_id, session_id, source, status, price_id) VALUES ('$email', '$payment_id', '$session_id', 'first payment', 'awaiting payment', '$price_id')");
  // print_r($checkout_session);



  // Redirect to the Stripe Checkout page
  header("HTTP/1.1 303 See Other");
  header("Location: " . $checkout_session->url);
  exit();
}

else{
  header("HTTP/1.1 303 See Other");
  header("Location: ../pricing");
  exit();
}
?>
