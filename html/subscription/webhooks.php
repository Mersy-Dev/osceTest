<?php
// webhook.php
//
// Use this sample code to handle webhook events in your integration.
//
// 1) Paste this code into a new file (webhook.php)
//
// 2) Install dependencies
//   composer require stripe/stripe-php
//
// 3) Run the server on http://localhost:4242
//   php -S localhost:4242


// error_reporting(E_ALL);
// ini_set('display_errors', '1');
require_once '../inc/conn.php';
require_once 'config.php';  
require_once 'stripe/init.php'; 


\Stripe\Stripe::setApiKey(STRIPE_API_KEY);

// The library needs to be configured with your account's secret key.
// Ensure the key is kept out of any version control system you might be using.
// $stripe = new \Stripe\StripeClient('sk_test_...');

// This is your Stripe CLI webhook secret for testing your endpoint locally.
// $endpoint_secret = 'whsec_cecece98eddce3cde8a8d1cc6d6da8a50d0eede920f63e76338416dd3250ef79';
$endpoint_secret = 'whsec_7D4W2pMzNBADQBS0TPCb9qm546wF1X58';


$payload = @file_get_contents('php://input');
// $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
$event = null;
$response = '';

// print_r($_SERVER);
// exit('here');

// try {
//   $event = \Stripe\Webhook::constructEvent(
//     $payload, $sig_header, $endpoint_secret
//   );
// } catch(\UnexpectedValueException $e) {
//   // Invalid payload
//   http_response_code(400);
//   exit();
// } catch(\Stripe\Exception\SignatureVerificationException $e) {
//   // Invalid signature
//   http_response_code(400);
//   exit();
// }

$event = json_decode($payload);
// print_r($event->type);

if ($event->type === 'customer.subscription.resumed') {
    $subscription_id = $event->data->object->id;
    $sql = "UPDATE `user_payments` SET `status`='active' WHERE subscription_id='$subscription_id'";
    mysqli_query($conn, $sql);

    $response = 'ok';
}

if ($event->type === 'customer.subscription.paused') {
    $subscription_id = $event->data->object->id;
    $sql = "UPDATE `user_payments` SET `status`='paused' WHERE subscription_id='$subscription_id'";
    mysqli_query($conn, $sql);
    $response = 'ok';
}


if ($event->type === 'customer.subscription.deleted') {
    $subscription_id = $event->data->object->id;
    $sql = "UPDATE `user_payments` SET `status`='deleted' WHERE subscription_id='$subscription_id'";
    mysqli_query($conn, $sql);
    $response = 'ok';
}


if ($event->type === 'customer.subscription.updated' or $event->type === 'customer.subscription.created') {
  
  // file_put_contents('log.txt', json_encode($event), FILE_APPEND);
  
  $subscription_id = $event->data->object->id;
  $subscriptionData = \Stripe\Subscription::retrieve($subscription_id);  
  
  
  $email = '';
  $email_query = mysqli_query($conn, "SELECT email FROM user_payments WHERE subscription_id='$subscription_id' LIMIT 0,1");
  if ($email_query->num_rows > 0 ) {
    $email = mysqli_fetch_assoc($email_query)['email'];
  }
  
  if($email == ''){
    $customer_id = $subscriptionData->customer;
    $email = \Stripe\Customer::retrieve($customer_id)->email;
  }

    $plan_obj = $subscriptionData->plan; 
    $plan_price_id = $plan_obj->id; 
    $plan_interval = $plan_obj->interval; 
    $plan_interval_count = $plan_obj->interval_count; 
    
    $currency = $subscriptionData->currency;
    $status = $subscriptionData->status;
    
    $customer_id = $subscriptionData->customer;
    
    $current_period_start = $current_period_end = ''; 
    $created = date("Y-m-d H:i:s", $subscriptionData->created); 
    $current_period_start = date("Y-m-d H:i:s", $subscriptionData->current_period_start); 
    $current_period_end = date("Y-m-d H:i:s", $subscriptionData->current_period_end); 
    $period_end_timestamp = $subscriptionData->current_period_end;
    
    $amount = $plan_obj->amount;
    $amount = ($amount/100);

    if($status !== 'incomplete' and $status !== 'incomplete_expired' and $status !== 'trialing' and $status !== 'past_due' and $status !== 'unpaid' and  $status !== 'incomplete_expired'){

      $sql = "INSERT INTO `user_payments`(`email`, `subscription_id`, `source`, `amount`, `plan_interval`, `interval_count`, `period_start`, `period_end`, `period_end_timestamp`, `status`, `price_id`, `created`, `customer_id`) VALUES ('$email', '$subscription_id', 'stripe', '$amount', '$plan_interval', '$plan_interval_count', '$current_period_start', '$current_period_end', '$period_end_timestamp', '$status', '$plan_price_id', '$created', '$customer_id')";
      file_put_contents('log.txt', $sql);
      mysqli_query($conn, $sql);

      file_put_contents('log.txt', $sql."\n", FILE_APPEND);

    }

    $response = 'ok';
}



if ($event->type === 'checkout.session.completed') {
  // https://dashboard.stripe.com/test/events/
  // 'id' => $event->data->object->id;
    $subscription_id = $event->data->object->subscription;
    $payment_id = explode('=', $event->data->object->success_url);

    $subscriptionData = \Stripe\Subscription::retrieve($subscription_id);  

    $customer_id = $subscriptionData->customer;
          
    $plan_obj = $subscriptionData->plan; 
    $plan_price_id = $plan_obj->id; 
    $plan_interval = $plan_obj->interval; 
    $plan_interval_count = $plan_obj->interval_count; 
    
    $currency = $subscriptionData->currency;
    $status = $subscriptionData->status;

    $current_period_start = $current_period_end = ''; 
      $created = date("Y-m-d H:i:s", $subscriptionData->created); 
      $current_period_start = date("Y-m-d H:i:s", $subscriptionData->current_period_start); 
      $current_period_end = date("Y-m-d H:i:s", $subscriptionData->current_period_end); 
    $period_end_timestamp = $subscriptionData->current_period_end;

    $amount = $plan_obj->amount;
    $amount = ($amount/100);

    $sql = "UPDATE `user_payments` SET `subscription_id`='$subscription_id', `amount`='$amount', `plan_interval`='$plan_interval', `interval_count`='$plan_interval_count',`period_start`='$current_period_start',`period_end`='$current_period_end',`period_end_timestamp`='$period_end_timestamp',`status`='$status',`created`='$created', `customer_id`='$customer_id' WHERE payment_id='$payment_id'";
    mysqli_query($conn, $sql);

    $response = 'ok';
}

if($response == 'ok'){
  http_response_code(200);
  exit();
}else{
  http_response_code(400);
  exit();
}