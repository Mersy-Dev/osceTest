<pre>

<?php 


// error_reporting(E_ALL);
// ini_set('display_errors', '1');

require "../inc/conn.php";
require_once 'stripe/init.php';

logged_in(true);
require_once 'config.php'; 


 
// Set API key 
\Stripe\Stripe::setApiKey(STRIPE_API_KEY);

try {

    $email = $_SESSION['email'];
    $time = time();
    $subscription_query = mysqli_query($conn, "SELECT subscription_id, customer_id FROM user_payments WHERE email='$email' and period_end_timestamp>$time AND status='active'");

    while($x=mysqli_fetch_assoc($subscription_query)){

      $subscription_id = $x['subscription_id'];
      $customer_id = $x['customer_id'];


    // Retrieve the customer
    $customer = \Stripe\Customer::retrieve($customer_id);

    // Create a billing portal session
    $billingPortalSession = \Stripe\BillingPortal\Session::create([
        'customer' => $customer->id,
        'return_url' => $url.'dashboard/my-payments', // Replace with your return URL
    ]);

    // Get the URL to the billing portal session
    $billingPortalUrl = $billingPortalSession->url;

    // Provide the URL to the user for managing their subscription
    echo "Click the link to manage your subscription: <a href='$billingPortalUrl' target='_blank'>Manage Subscription</a>";


    }

    header("HTTP/1.1 303 See Other");
    header("Location: ".$billingPortalUrl);
    exit();

} catch (\Exception $e) {
    // Handle errors
    // echo "An error occurred: " . $e->getMessage();
}



?>
