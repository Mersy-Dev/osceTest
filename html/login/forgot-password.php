<?php 

require_once "../inc/conn.php"; 




?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>OSCE Toolbox | Forgot Password</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">


  <!-- Vendor CSS Files -->
  <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/icofont/icofont.min.css" rel="stylesheet">
  <link href="../assets/boxicons/css/boxicons.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/login.css" rel="stylesheet">
  <script type="text/javascript" src="../assets/jquery/jquery.min.js"></script>


  <!-- Google Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,400;0,500;1,500&family=Roboto:wght@300;400&display=swap" rel="stylesheet">



</head>

<body>




<?php

if (post('reset_email')) {
  $user_email = post('reset_email');
  $user_email = filter_var($user_email, FILTER_SANITIZE_EMAIL);

  if(mysqli_query($conn, "SELECT id FROM user_login WHERE email='$user_email'")->num_rows == 1){


  $time = time();
  $data = "909(*Wuuwu^&!&!bbXDFD-$user_email-$time-OOOOii****zaq2";
  $data = simple_crypt($data);
  $link = urlencode($data);


  // echo $link;
  // exit();

  $mail_content_title = "Reset Password";
  $mail_firstname = '';
  $mail_target=$user_email;
  $mail_subject="Reset Password";
  $mail_content_message= "
  Here is your password reset link.
  <br>
  <br>
  <a href='https://oscetoolbox.com/login/reset-password?reset=$link'><button style='background: #31AFB4;color: #fff;border-radius: 5px;
  border: 2px solid #31afb4;
  font-size: 14px !important;
  padding: 8px 16px;
  font-weight: 400;
  transition: 0.3s;'>RESET</button></a>

  <br>
  Please note that this link expires in 30 minutes.

  <br>
  <br>
  <br>
  <br>
  Sincerely, 
  <br>
  The OSCE Toolbox Team.

  ";
  require_once "../inc/mailer.php";
  ?>

<a href=".."><img src="../assets/img/logo-white.png" class="logo"></a>

<div class="box">
<div class="header">Reset Email has been sent</div>
</div>

<div class="clearfix"></div>
<br>
<br>
<br>

  <?php
  exit();
  }else{
    $error = "Email not found";
  }

}

?>

<a href=".."><img src="../assets/img/logo-white.png" class="logo"></a>

<div class="box">

    <form class="form-signin fade-class" method="post">
  <div class="header">Reset Password</div>
  <br>

  <div class="error"><?php echo isset($error) ? $error : ''; ?></div>

  <br>
  <br>
  <label for="inputEmail" class="sr-only">Email address</label>
  <input type="email" id="email" name="reset_email" class="form-control" placeholder="Email address" required autofocus>
  <br>

  <button class="btn" type="submit">Send Reset Link</button>
  <br>
  <br>
  <br>
  <br>
  <br>

  <div class="dontb" style="text-align: center;font-size: 12px !important;font-family: sans-serif;">Go back to <a href="../login" style="color: #162d65;font-weight: bolder;font-family: sans-serif;font-size: 12px !important;">Login Page</a></div>
</form>


</div>

<div class="clearfix"></div>
<br>
<br>
<br>