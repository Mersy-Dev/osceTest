
<br>
<br>
<br>
<br>


<form method="post">
    <input type="text" name="email" placeholder="Enter email">
    <br>
    <input type="submit" value="Submit">
</form>


<?php





require_once '../inc/conn.php';
require_once 'config.php';  
require_once 'stripe/init.php'; 


logged_in(true);
$admins_json = json_decode(file_get_contents("../inc/admins.json"));
$admins =array();
$is_admin = false;



foreach ($admins_json as $a => $b) {
    $admins[] = $a;
    if($_SESSION['email'] == $a){
        $is_admin = true;
    }
}

if($is_admin==false){
    header('Location: ../');
    exit('You are not an admin');
}

if(post('email')){
    $user_email = post('email');
 
    // Set API key 
    \Stripe\Stripe::setApiKey(STRIPE_API_KEY);
    try {
        $customer = \Stripe\Customer::all([
            'email' => $user_email,
            'limit' => 1,
        ]);

        if (count($customer->data) > 0) {
            $customer_id = $customer->data[0]->id;

            $subscriptions = \Stripe\Subscription::all([
                'customer' => $customer_id,
            ]);

            $subscription = $subscriptions->data[0];
            
            if (count($subscriptions->data) > 0 and $subscriptions->data[0]->status == 'active') {
                
                // Get subscription details
                $plan = $subscription->plan->nickname;
                $status = $subscription->status;
                $current_period_start = date('Y-m-d H:i:s', $subscription->current_period_start);
                $current_period_end = date('Y-m-d H:i:s', $subscription->current_period_end);
                
                // Print subscription details
                echo "User with email $user_email has an active subscription<br>";
                echo "Status: $status<br>";
                echo "Current Period Start: $current_period_start<br>";
                echo "Current Period End: $current_period_end<br>";
                

            } else {
                // User does not have an active subscription
                echo "User with email $user_email does not have an active subscription.";
            }
            
            echo "<pre>";
            print_r($subscription);

        } else {
            // User with the specified email does not exist
            echo "User with email $user_email does not exist.";
        }
    } catch (Exception $e) {
        // Handle any exceptions
        echo 'Error: ' . $e->getMessage();
    }

}
?>

