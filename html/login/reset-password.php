<?php 
$page_title = "OSCEToolbox | Reset Password";
require_once "../inc/conn.php"; 


if (get('reset')) {
  $reset= get('reset');
}else{
  header("Location: register");
  exit();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>OSCE Toolbox | Reset Password</title>
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



  <a href=".."><img src="../assets/img/logo-white.png" class="logo"></a>

  <div class="box">

<?php

$pass=1;


$reset = urldecode($reset);
$reset = simple_crypt($reset, 'd');

$explode = explode('-', $reset);

$first = $explode[0];
$email = $explode[1];
$time = $explode[2];
$second = $explode[3];


$email = filter_var($email, FILTER_SANITIZE_EMAIL);

if (isset($_SESSION['reset_password'])) {
  $reset_sess = $_SESSION['reset_password'];
  if ($reset_sess==md5('22rfrgfr'.$email)) {
    if (post('password_1') and post('password_2')) {
      $password_1 = post('password_1');
      $password_2 = post('password_2');

      if ($password_1==$password_2) {
        $new_pass = md5($password_1);
        $sql= "UPDATE user_login SET password='$new_pass' WHERE email='$email'";
        if (mysqli_query($conn, $sql)) {
          $pass=0;?>
        <div class="header">Your password has been updated</div>
        <div class="dontb" style="text-align: center;font-size: 12px !important;font-family: sans-serif;">
          <br>
          Go back to <a href="login" style="color: #162d65;font-weight: bolder;font-family: sans-serif;font-size: 12px !important;">Login</a></div>
          <?php
              unset($_SESSION['reset_password']);
              session_destroy();
              $pass=0;

              $mail_content_title = "Password Reset";
              $mail_firstname = '';
              $mail_target=$email;
              $mail_subject="Password Reset";
              $mail_content_message= '
              Your password has been reset. Kindly send a message if this was not you.
              <br>
              oscetoolbox@gmail.com

              <br>
              <br>
              <br>
              <br>
              Sincerely, 
              <br>
              The OSCE Toolbox.

              ';
                require_once "../inc/mailer.php";
        }
      }else{
        $error = "Passwords do not match";
      }

    }
  }
}


if ($first!=='909(*Wuuwu^&!&!bbXDFD') {
    $pass=0;
}
if ($second!=='OOOOii****zaq2') {
    $pass=0;
}


  if ($pass) {

if ( ($time+1800) < time()) {?>
    <form class="form-signin fade-class" method="post">
    <h5>This link has expired</h5>
    </form>
<?php

}else{
    $_SESSION['reset_password'] = md5('22rfrgfr'.$email);
?>

  <form class="form-signin fade-class" method="post">
  <div class="header">Reset Your Password</div>
  <br>
  <br>

  <div class="error"><?php if(isset($error)){echo $error;} ?></div>



  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" name="password_1" id="inputPassword1" class="form-control" placeholder="Password" required>

  <label for="inputPassword" class="sr-only">Confirm Password</label>
  <input type="password" id="inputPassword2" name="password_2" class="form-control" placeholder="Confirm Password" required>

  <br>
  <button class="btn" type="submit">RESET</button>
  <br>
  <br>

  <div class="dontb" style="text-align: center;font-size: 12px !important;font-family: sans-serif;">Go back to <a href="../login" style="color: #162d65;font-weight: bolder;font-family: sans-serif;font-size: 12px !important;">Login Page</a></div>
</form>
<?php 

        }
    }


 ?>
