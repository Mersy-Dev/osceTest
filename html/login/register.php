<?php 

  require_once "../inc/conn.php";
  require "../inc/variables.php";
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>OSCE Toolbox | Register</title>
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

  <form>

<?php $_SESSION['csrf_token'] = bin2hex(random_bytes(32));?>

  <div class="box">
    <div class="header">Create Account</div>
    <div class="txt">
    <div style="font-weight: 600">Already registered? <a href="../login">Login</a></div></div>
    
    <div class="error"></div>
    <br>
    <input id="first_name" class="form-control" placeholder="First Name">

    <input id="last_name" class="form-control" placeholder="Last Name">

    <input type="email" id="email" class="form-control" placeholder="Email Address">

    <!-- <input id="university" class="form-control" placeholder="University"> -->
    <select class="form-control" id="university">
      <option value="">Select University</option>
      <?php 
      foreach ($pharmacy_schools as $p) {
        ?>
      <option value="<?php echo $p;?>"><?php echo $p;?></option>
        <?php
      }
       ?>
      <option value="other">Other</option>
    </select>

    <input type="text" id="other_university" class="form-control" placeholder="Enter Name of University">

    <div style="font-size: 12px;line-height: 1.2em;margin-left: 5px;text-align: left;display: one;" id="rules">
      <b style="line-height: 2em;">Password must be:</b> 
      <br>
      <ul>
        <li id="rule1">At least 8 characters</li>
        <li id="rule2">A mixture of letters and numbers.</li>
        <li id="rule3">A mixture of both uppercase and lowercase letters.</li>
      </ul>

    <input type="password" id="password_1" class="form-control" placeholder="Password">

    <input type="password" id="password_2" class="form-control" placeholder="Confirm Password">


    <br>
    
    <!-- <input id="refer" class="form-control" placeholder="Referred by (optional)" value="<?php echo get('r');?>"> -->

      <div class="clear"></div>
    </div>


    <br>
    <br>
    
    
    <label style="cursor:pointer">
      <input type="checkbox" id="agree" value="1" name="terms" style="transform: translateY(2px);"> 
      I agree to the <a href="../terms">Terms and Conditions</a> and <a href="../privacy">Privacy Policy</a>
    </label>
    <br>
    <label style="cursor:pointer;margin-top: 5px;">
      <input type="checkbox" id="subscribe" value="1" name="subscribe" style="transform: translateY(2px);"> 
      I would like to subscribe to receive important updates
    </label>
    
    <div class="clear"></div>
    
    <br>
    <br>
    <div class="btn" id="btn">Create Account</div>
    <br>
    <div class="error"></div>
    <br>
    <div>By registering you confirm you are 18 or above</div>

  </div>

  </form>

  <br>
  <br>
  <br>
  <br>


</body>





<script type="text/javascript">
  // $('.btn').hide();
  $('form').submit(false);

  $('#agree').on('input', function(){
    console.log($('#agree').val());
    if($('#agree').is(":checked")){
      $('.btn').show();
    }else{
      $('.btn').hide();
    }
  })

  $('.btn').on('click', function(){
    
    if($('#agree').is(":checked")){

    if(validatePassword()){
    console.log('df');


    $('.btn').html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> &nbsp;SUBMITTING');

    setTimeout(function(){
      $.post("post-login.php", {first_name: $('#first_name').val(), last_name: $('#last_name').val(), university: $('#university').val(), other_university: $('#other_university').val(), email: $('#email').val(), password_1: $('#password_1').val(), password_2: $('#password_2').val(), type: "register", csrf_token: '<?php echo $_SESSION['csrf_token']; ?>'}, function(res){

          if (res==1) {
            $('.btn').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> &nbsp;PREPARING YOUR DASHBOARD');
            $(".error").html('');
            setTimeout(function(){

            if($('#subscribe').is(":checked")){
              $.get("<?php echo $url;?>", {subscribeEmail: $("#email").val(), source:"signup"}, function(finish){
                window.location.href ="../dashboard/";
              });
            }else{
              window.location.href ="../dashboard/";
            }

            },1000);

          }else{
            $(".error").html(res);
            // if(res=='Referral not found'){
              // $("#refer").css('border','1px solid red');
            // }
            $(".error").fadeIn('slow');
            $('.btn').html('<i class="mdi mdi-reload"></i> &nbsp;TRY AGAIN');
          }

      });
    }, 500);

  }else{
    $("#rules").slideDown();
    $('.error').html('Check Password');
  }

  }else{
    $('.error').html('You must agree to the Terms');
  }
  });



  $("#university").on("change", function(){
    var unival = $("#university").val();
    if (unival=='other') {
      $("#other_university").show();
    }else{
      $("#other_university").hide();
    }
  })

  $("#other_university").hide();


function validatePassword() {
  const passwordInput = document.getElementById('password_1');
const confirmInput = document.getElementById('password_2');

  const password = passwordInput.value;
  const confirm = confirmInput.value;

    $("li").css('color','black');

  if (password.length < 8) {
    passwordInput.setCustomValidity('Password must be at least 8 characters');
    $("#rule1").css('color','red');
    return false;
  }

  else if (!/\d/.test(password)) {
    passwordInput.setCustomValidity('Password must contain at least one number');
    $("#rule2").css('color','red');
    return false;
  }

  else if (!/[a-z]/.test(password) || !/[A-Z]/.test(password)) {
    passwordInput.setCustomValidity('Password must contain both upper and lowercase letters');
    $("#rule3").css('color','red');
    return false;
  }

  else if (password !== confirm) {
    confirmInput.setCustomValidity('Passwords do not match');
    return false;
  }
  else{
    return true;
    $("#rules").slideUp();
  }

}
</script>