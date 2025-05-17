<?php


require_once "../inc/conn.php";

$errors=array();

function login($e){
  global $conn;
  $val=uniqid();
  $time = time();
  $exppp=$time+34608000;
  
  session_destroy();
  if (isset($_COOKIE['osce_id'])) {
    setcookie('osce_id', $_COOKIE['osce_id'], time() - 3600, "/");
  }
  
  setcookie('osce_id', $val, "$exppp", "/");
  $query = mysqli_query($conn, "UPDATE user_login SET cookie_id='$val', cookie_expiry='$exppp' WHERE email='$e'");


  $first_name = mysqli_fetch_assoc(mysqli_query($conn, "SELECT first_name FROM user_info WHERE email='$e'"))['first_name'];

  $_SESSION['first_name']=$first_name;
  $_SESSION['email']=$e;

  $query = mysqli_query($conn, "SELECT id FROM user_payments WHERE email='$e' and period_end_timestamp>$time LIMIT 0,1");

  if ($query->num_rows > 0) {
    $_SESSION['premium']=true;
  }else{
    $_SESSION['premium']=false;
    // $_SESSION['premium']=true;
  }


    // ADMIN Session
    $admins_json = json_decode(file_get_contents("../inc/admins.json"));
    $admins =array();

    $_SESSION['admin']=false;

    foreach ($admins_json as $a => $b) {
        $admins[] = $a;
        if($e == $a){
            $_SESSION['admin'] = true;
        }
    }


  echo 1;
}


// %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%



if (post('email') and post('type')=='login') {

  $email = softSan(strtolower($_POST['email']));
  $email=filter_var($email, FILTER_SANITIZE_EMAIL);

  $password = md5($_POST['password']);

  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }

  $user_check_query = "SELECT * FROM user_login WHERE email='$email' AND password='$password'";
  $query = mysqli_query($conn, $user_check_query);
  
  if ($query->num_rows==1) {
        $g = mysqli_query($conn, "UPDATE user_login SET last_login=CURRENT_TIMESTAMP WHERE email='$email'");

      if (count($errors)==0) {
        login($email);
      }

      

  }else{
      array_push($errors, "Invalid Email/Password");
  }

}




// %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%


if (post('email') and post('type')=='register') {

  // Use a CSRF token to protect against CSRF attacks
  if (isset($_POST['csrf_token']) && isset($_SESSION['csrf_token']) && $_POST['csrf_token'] == $_SESSION['csrf_token']){

  $first_name = softSan(post('first_name'));
  $last_name = softSan(post('last_name'));
  $university = softSan(post('university'));

  if ($university=='other') {
    $university = softSan(post('other_university'));
  }

  $email = softSan(strtolower($_POST['email']));

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    array_push($errors, "Invalid email format");
  }

  if (strlen($email)>64) {
    array_push($errors, "Email is too long");
  }

  $password_1 = softSan($_POST['password_1']);
  $password_2 = softSan($_POST['password_2']);

  
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }

  if (empty($first_name)) { array_push($errors, "First name is required"); }
  if (empty($last_name)) { array_push($errors, "Last name is required"); }
  if (empty($university)) { array_push($errors, "University is required"); }


  if ($password_1 != $password_2) {
  array_push($errors, "PASSWORDS DON'T MATCH");
  }

  $user_check_query = "SELECT * FROM user_login WHERE email='$email' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  
  if ($user) { // if user exists
    if ($user['email'] === $email) {
      array_push($errors, "Email already exists");
    }
  }

  if (count($errors) == 0) {
    $password = md5($password_1);


    if (mysqli_query($conn, "INSERT INTO user_login (email, password, last_login) VALUES('$email', '$password', CURRENT_TIMESTAMP)")) {

      if(mysqli_query($conn, "INSERT INTO user_info (email, first_name, last_name, university) VALUES ('$email', '$first_name', '$last_name', '$university')")){

          login($email);


              $mail_content_title = "Welcome to OSCE Toolbox - Your Account is Ready";
              $mail_firstname = '';
              $mail_target=$email;
              $mail_subject="Welcome to OSCE Toolbox - Your Account is Ready";
              $mail_content_message= "
              
                
              Dear $first_name,
              <br>
              <br>

              We are thrilled to welcome you to OSCE Toolbox! We appreciate your decision to join our platform and look forward to providing you with the necessary resources to excel in your OSCE assessments.
              <br>
              Your account is now set up and ready to go! To begin your OSCE preparation journey, please click the button below to visit your dashboard and explore our resource library.

              <br>
              <br>

              <a href='https://oscetoolbox.com/dashboard'><button style='background: #31AFB4;color: #fff;border-radius: 5px;
              border: 2px solid #31afb4;
              font-size: 14px !important;
              padding: 8px 16px;
              font-weight: 400;
              transition: 0.3s;'>View my OSCE Toolbox dashboard</button></a>
              
              <br>
              <br>
              <br>
              We understand that preparing for OSCEs can be challenging, and we are here to help. If you have any questions or concerns, please feel free to contact our friendly support team at oscetoolbox@gmail.com - we are always happy to help.

              <br>
              <br>
              Thank you for choosing OSCE Toolbox, and we wish you all the best in your OSCE preparations!

              <br>
              <br>
              Kind regards,

              <br>
              The OSCE Toolbox Team.

              ";
                require_once "../inc/mailer.php";

        }

    }else{
      array_push($errors, "Could not login");
    }
  }

}else{
      array_push($errors, "No csrf");
}

}



// %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%


foreach ($errors as $e) {
  echo $e.'<br>';
}

?>