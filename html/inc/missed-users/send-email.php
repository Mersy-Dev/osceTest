<?php

// show errors
ini_set('display_errors', 1);
error_reporting(E_ALL);


require_once "../conn.php";


$users = mysqli_query($conn, "SELECT * FROM missed_users WHERE email_sent=0 LIMIT 0,1");

while ($user = mysqli_fetch_assoc($users)) {

    $email = $user['email'];    

    $mail_firstname = '';
    $mail_target=$email;
    $mail_subject="We made a mistake.";
    $mail_content_title = "We made a mistake.";
    $mail_content_message= "
    
      
    Hey, did you try to register?
    <br>
    <br>

    If you're getting this email it means that you previously tried to register but we made a mistake and didn't create your account. That was on us and we're really sorry about that.

    <br>
    <br>

    But we would like to make it right. If you're still interested in using OSCE Toolbox, we've made a special discount code just for you. Use the code <b>ERROR20</b> at checkout, you'll get 20% off your first purchase. This code is expires at the end of September so if you're interested, you should act fast.

    <br>
    <br>
    <br>

    <a href='https://oscetoolbox.com/login/register'><button style='background: #31AFB4;color: #fff;border-radius: 5px;
    border: 2px solid #31afb4;
    font-size: 14px !important;
    padding: 8px 16px;
    font-weight: 400;
    transition: 0.3s;'>REGISTER</button></a>
    

    <br>
    <br>
    Kind regards,

    <br>
    The OSCE Toolbox Team.

    ";

    // echo $email . "<br>";
    require_once "../mailer.php";

    // update email as sent 
    mysqli_query($conn, "UPDATE missed_users SET email_sent=1 WHERE email='$email'");

    echo "Email sent to: " . $email . ", ID: " . $user['id'] . "<br>";


}



?>