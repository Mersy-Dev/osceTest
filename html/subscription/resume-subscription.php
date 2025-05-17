<pre>

<?php 

require "../inc/conn.php";
require_once 'stripe/init.php';

logged_in(true);
require_once 'config.php'; 


 
// Set API key 
\Stripe\Stripe::setApiKey(STRIPE_API_KEY);

try {

    $email = $_SESSION['email'];
    $time = time();
    $subscription_query = mysqli_query($conn, "SELECT subscription_id FROM user_payments WHERE email='$email' and period_end_timestamp>$time AND status='paused' ORDER BY id DESC LIMIT 0,1");


      $subscription_id = mysqli_fetch_assoc($subscription_query)['subscription_id'];

      // $subscription = \Stripe\Subscription::retrieve($subscription_id);
      
      // Set the pause_collection parameter to pause the subscription
        $subscription = \Stripe\Subscription::update($subscription_id, [
            'pause_collection' => null
        ]);
      
      // Save the changes
      $subscription->save();

      $sql = "UPDATE `user_payments` SET `status`='active' WHERE subscription_id='$subscription_id'";
      mysqli_query($conn, $sql);

      echo "success";


} catch (\Exception $e) {
    // Handle errors
    echo "An error occurred: " . $e->getMessage();
}



    header("HTTP/1.1 303 See Other");
    header("Location: ../dashboard/my-payments");
    exit();

?>
