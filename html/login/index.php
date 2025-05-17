<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>OSCE Toolbox</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">


  <!-- Vendor CSS Files -->
  <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- <link href="../assets/icofont/icofont.min.css" rel="stylesheet"> -->
  <!-- <link href="../assets/boxicons/css/boxicons.min.css" rel="stylesheet"> -->

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
    <div class="header">Login <br> Not registered yet? </div>
    <div class="txt">
    <div style="font-weight: 600"><a href="register.php">Create an Account</a></div></div>

    <div class="error"></div>

    <br>
    <input type="email" class="form-control" placeholder="Email Address" id="email" autofocus>

    <input type="password" class="form-control" placeholder="Password" id="password">

    <div style="font-size: 12px;font-weight: 500">
      <div style="float: left"><input type="checkbox" name=""> Remember Me</div>
      <a href="forgot-password"><div style="float: right">Forgot Password?</div></a>
      <div class="clear"></div>
    </div>

    <br>
    <br>
    <div class="btn">Login</div>

    <br>
    <br>

  </div>





<script type="text/javascript">
  $('form').submit(false);

  $('.btn').on('click', function(){
    $('.btn').html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> &nbsp;SUBMITTING');

    setTimeout(function(){
      $.post("post-login.php", {password: $('#password').val(), email: $('#email').val(), type: "login"}, function(res){

          if (res==1) {
            $('.btn').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> &nbsp;PREPARING YOUR DASHBOARD');
            $(".error").html('');
            setTimeout(function(){
              window.location.href ="../dashboard/";
            },1000);

          }else{
            $(".error").html(res);
            $(".error").fadeIn('slow');
          $('.btn').html('<i class="mdi mdi-reload"></i> &nbsp;TRY AGAIN');
          }

      });
    }, 500);

  });
</script>


</body>