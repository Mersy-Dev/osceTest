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
    $subscription_query = mysqli_query($conn, "SELECT subscription_id FROM user_payments WHERE email='$email' and period_end_timestamp>$time AND status='active'");

    while($x=mysqli_fetch_assoc($subscription_query)){

      $subscription_id = $x['subscription_id'];

      $subscription = \Stripe\Subscription::retrieve($subscription_id);
      
      // Set the pause_collection parameter to pause the subscription
      $subscription->pause_collection = ["behavior" => "void"];
      
      // Save the changes
      $subscription->save();

      $sql = "UPDATE `user_payments` SET `status`='paused' WHERE subscription_id='$subscription_id'";
      mysqli_query($conn, $sql);

      $mail_content_title = "Subscription Cancelled";
      $mail_firstname = $_SESSION['first_name'];
      $mail_target=$_SESSION['email'];
      $mail_subject="Subscription Cancellation";
      $mail_content_message= "
      We're sorry to see you go.
      <br>
      <br>
      <a href='https://oscetoolbox.com/contact'><button style='background: #31AFB4;color: #fff;border-radius: 5px;
      border: 2px solid #31afb4;
      font-size: 14px !important;
      padding: 8px 16px;
      font-weight: 400;
      transition: 0.3s;'>TELL US WHY</button></a>

      <br>
      <br>
      <br>
      <br>
      Sincerely, 
      <br>
      The OSCE Toolbox Team.

      ";
      require_once "../inc/mailer.php";

    }

    header("HTTP/1.1 303 See Other");
    header("Location: ../dashboard/my-payments");
    exit();

} catch (\Exception $e) {
    // Handle errors
    echo "An error occurred: " . $e->getMessage();
}



?>
