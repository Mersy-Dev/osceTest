<pre>
<?php 

require "../inc/conn.php";
require_once 'stripe/init.php';


require_once 'config.php'; 

logged_in(true);

// Set API key 
\Stripe\Stripe::setApiKey(STRIPE_API_KEY);


if(get('payment_id')){

	$email = $_SESSION['email'];
	$payment_id = softSan(get('payment_id'));

	$session_id = mysqli_fetch_assoc(mysqli_query($conn, "SELECT session_id FROM user_payments WHERE payment_id='$payment_id' AND email='$email'"))['session_id'];


	try {
		$sub = \Stripe\Checkout\Session::retrieve($session_id);

		$subscription_id = $sub->subscription;
		$session_id = $sub->id;

        try {   
            $subscriptionData = \Stripe\Subscription::retrieve($subscription_id);  

			// $subscriptionData = json_decode(file_get_contents("fake-event.txt"));
			// echo $subscriptionData;

	        if(!empty($subscriptionData)){ 

        	// print_r($subscriptionData);
        	// exit();
	        
	        $plan_obj = $subscriptionData->plan; 
	        $plan_price_id = $plan_obj->id; 
	        $plan_interval = $plan_obj->interval; 
	        $plan_interval_count = $plan_obj->interval_count; 
		    $customer_id = $subscriptionData->customer;
	        
	        $currency = $subscriptionData->currency;
	        $status = $subscriptionData->status;
	 
	        $current_period_start = $current_period_end = ''; 
            $created = date("Y-m-d H:i:s", $subscriptionData->created); 
            $current_period_start = date("Y-m-d H:i:s", $subscriptionData->current_period_start); 
            $current_period_end = date("Y-m-d H:i:s", $subscriptionData->current_period_end); 
	        $period_end_timestamp = $subscriptionData->current_period_end;

            $amount = $plan_obj->amount_total;
            $amount = ($amount/100);

			
			// REFERALL PROGRAM
			// check if this is a first time payment
			$first_time_payment = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user_payments WHERE email='$email' AND `status`='active'"));

			if(empty($first_time_payment)){
				// check if time_pais is already set

				$referral = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM referrals WHERE customer_email='$email'"));

				if(empty($referral)){
					mysqli_query($conn, "UPDATE referrals SET `amount`='$amount', subscription_id='$subscription_id', `time_paid`=CURRENT_TIMESTAMP WHERE customer_email='$email'"); 
				}
			}


			$sql = "UPDATE `user_payments` SET `subscription_id`='$subscription_id', `amount`='$amount', `currency`='$currency', `plan_interval`='$plan_interval', `interval_count`='$plan_interval_count',`period_start`='$current_period_start',`period_end`='$current_period_end',`period_end_timestamp`='$period_end_timestamp',`status`='$status', `created`='$created', `customer_id`='$customer_id'  WHERE session_id='$session_id'";
			if(mysqli_query($conn, $sql)){


			    $mail_content_title = "Payment Completed Successfully";
			    $mail_firstname = $_SESSION['first_name'];
			    $mail_target = $email;
			    $mail_subject = "Payment Completed Successfully";

			    $mail_content_message = "
			      Hey $mail_firstname! Your payment has been completed successfully and we're glad to have you.
			      <br>
			      <br>
			      Here are the details of your plan
			      <br>
			      Plan: <b>£$amount / $plan_interval_count $plan_interval(s)</b>
			      <br>
			      Created: <b>$current_period_start</b>
			      <br>
			      Renews: <b>$current_period_end</b>

			      <br>
			      <br>
			      You can access your dashboard here
			      <br>
			      <a href='https://oscetoolbox.com/dashboard'><button class='main-search-btn'> Dashboard </button></a>
			    ";

			    require_once "../inc/mailer.php";
						

				// check if email is in missed_users
				mysqli_query($conn, "UPDATE missed_users SET paid=CURRENT_TIMESTAMP WHERE email='$email'");


			    header("Location: ../payment-info?info=success");
			    exit();

			}else{
				die("Could not Insert");
			}

	        }else{
	        	die('No subscription Found');
	        }

        }catch(Exception $e) {   
            $api_error = $e->getMessage();   
        } 


	} catch (Error $e) {
	  http_response_code(500);
	  echo json_encode(['error' => $e->getMessage()]);
	}

}
 ?>