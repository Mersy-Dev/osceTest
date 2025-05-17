<?php

  require_once "inc/conn.php";
  require "inc/variables.php";

  
  if (get('r')) {
    $refer = get('r');
    // check if refer is an integer
    if (!is_numeric($refer)) {
      die("Invalid Referral");
    }

    if(get('plan')){

      $plan = get('plan');

      if(in_array($plan, ['monthly', 'termly', 'yearly'])){

        $email = $_SESSION['email'];
        $current_time = time();
        
        if (logged_in()) {

          $query = mysqli_query($conn, "SELECT id FROM user_payments WHERE email='$email' AND period_end_timestamp>$current_time AND status='active'");
          $active_subscription = ($query->num_rows > 0);

          if ($active_subscription) {
            echo "You already have an active subscription";
          } else {
            
            $user_info = mysqli_fetch_assoc(mysqli_query($conn, "SELECT id, email, first_name, last_name FROM user_info WHERE email='$email'"));
            $self_ref = $user_info['id'];
            $customer_email = $user_info['email'];
            $customer_name = $user_info['first_name'] . " " . $user_info['last_name'];

            if ($self_ref == $refer) {
              echo "You can't refer yourself";
            } else {

              // check if user has been referred before
              $ref_info_query = mysqli_query($conn, "SELECT referral_name FROM referrals WHERE customer_email='$email'");
              if($ref_info_query->num_rows > 0){
                $ref_info = mysqli_fetch_assoc($ref_info_query)['referral_name'];
                  echo "You already have a referral.";
              }else{

                $ref_info = mysqli_fetch_assoc(mysqli_query($conn, "SELECT email, first_name, last_name FROM user_info WHERE id='$refer'"));
                $ref_email = $ref_info['email'];
                $ref_name = $ref_info['first_name'] . " " . $ref_info['last_name'];

                   if(mysqli_query($conn, "INSERT INTO `referrals` (`referral_id`, `referral_email`, `referral_name`, `customer_email`, `customer_name`, `time_added`, `plan`) VALUES ('$refer', '$ref_email', '$ref_name', '$customer_email', '$customer_name', CURRENT_TIMESTAMP, '$plan')")){
                    echo 1;
                   }

                }

            }
          }
        }
          
        }else{die("Invalid Plan");}
        
        exit();
      }
    } else{die("Referral not found");}

  
  require "header.php";

?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<style>
  a{
    text-decoration:underline
  }

  h5{
    font-weight:bolder;
    color:#31afb4;
  }

  .title{
    /* color: #EF798A; */
    text-align: left;
  }

  .price-div{
    border: 4px solid rgb(0, 0, 0, 0.2);
    border-radius: 10px;
    padding: 20px;
    background: #fff;
    transition: 0.3s;
    margin-bottom: 20px;
  }

  .price-div:hover{
    cursor: pointer;
    box-shadow: 0px 0px 20px rgb(0, 0, 0, 0.2);
  }

  .price-div-price{
    font-size: 40px;
    font-weight: bold;
    color: #31afb4;
  }

  #prices{
    /* display: none; */
  }

  .pill-top-divs{
    display: flex;
    justify-content: center;
  }

  .pill-top-div{
    padding: 15px;
    /* transition: 0.3s; */
  }

  .pill-top-div:hover{
    cursor: pointer;
  }

  .pill-top-div-active{
    border-bottom: 2px solid #31afb4;
  }

  .form-control{
    background: rgb(0, 0, 0, 0.05);
    max-width: 400px;
    margin: 10px 0;
    padding: 10px 20px;
  }

  .formdiv{
    max-width: 600px;
    margin: auto;
    margin-top: 20px;
    display: none;
  }

  #logger, #success{
    display: none;
  }

  <?php

  if(!empty($_COOKIE['osce_id'])){

  ?>
  #loginDiv{
    display: block;
  }
  <?php }else{ ?>
  #registerDiv{
    display: block;
  }
  <?php } ?>

  #registerDiv .form-control{
    width: 47.5%;
    float: left;
  }

  .error{
    color:red
  }

  
@media only screen and (max-width: 500px) {
    .price-div-price{
        font-size: 30px;
    }

    .title{
        font-size: 24px !important;
    }
}
</style>

  <br>
  <br>
  
  <center>
  <div class="title" style="text-align: center;color: #EF798A;">Join through an ambassador</div>
  </center>
  <?php //echo $email;?>
  <br>
  <br>
  <br>
  
  <div style="width:95%;max-width:1200px;margin:auto">

    
  <div class="row">
      
      <div class="col-md-5">

      <center>
      <div style="width: 357px;height:395px;background:url(assets/img/boxes.png) center no-repeat;background-size:cover;max-width:85%"></div>

      <br>
      <?php

      $ref = mysqli_fetch_assoc(mysqli_query($conn, "SELECT first_name FROM user_info WHERE id='$refer'"));
      $ref_name = $ref['first_name'];

      ?>
        <!-- <div style="width: 100px;height:100px;background:red;border-radius:200px"></div> -->
        <div class="header" style="font-size: 40px !important;"><?php echo $ref_name;?>'s Account</div>
        <div>The real exams are friends we made along the way.</div>

      </center>

        <br>
        <br>
        <br>
        <br>
        

    </div>

    <div class="col-md-7">
    
    <div id="prices" class="animate__animated">

        <div class="price-div" onclick="setPlan('monthly');hidePrices()">
            <div class="row">
                <div class="col-sm-3">
                    <div class="price-div-price">14.99</div>
                </div>
                <div class="col">
                    <h5 class="price-div-header">Monthly</h5>
                    <div class="price-div-desc">Renews <?php echo date('j F', strtotime('+30 days'));?>.</div>
                </div>
            </div>
        </div>
        
        <div class="price-div" onclick="setPlan('termly');hidePrices()">
            <div class="row">
                <div class="col-sm-3">
                    <div class="price-div-price">12.66 <div style="font-size: 14px;margin-top:-10px">per month</div></div>
                </div>
                <div class="col">
                    <h5 class="price-div-header">Termly</h5>
                    <div class="price-div-desc">Billed as £37.98. Renews <?php echo date('j F', strtotime('+3 months'));?>.</div>
                </div>
            </div>
        </div>
        
        <div class="price-div" onclick="setPlan('yearly');hidePrices()">
            <div class="row">
                <div class="col-sm-3">
                    <div class="price-div-price">8.33 <div style="font-size: 14px;margin-top:-10px">per month</div></div>
                </div>
                <div class="col">
                    <h5 class="price-div-header">Yearly</h5>
                    <div class="price-div-desc">Billed as £99.96. Renews <?php echo date('j F', strtotime('+1 year'));?>.</div>
                </div>
            </div>
        </div>
        
    </div>

    <div id="logger" class="animate__animated">

      <!-- <center>Just a quick minute to get some information so we can get you started. </center><br> -->
      
      <div style="color:#31afb4;font-size:14px;text-decoration:underline;text-align:center;cursor:pointer" onclick="showPrices()">Back to Plans</div>

      <br>

        <div class="pill-top-divs">
            <div class="pill-top-div <?php if(!empty($_COOKIE['osce_id'])){?>pill-top-div-active<?php }?>" onclick="view('login')">Login</div>
            <div class="pill-top-div <?php if(empty($_COOKIE['osce_id'])){?>pill-top-div-active<?php }?>" onclick="view('register')">Register</div>
        </div>

        <?php $_SESSION['csrf_token'] = bin2hex(random_bytes(32));?>


        <div class="formdiv" id="loginDiv">

          <center>
            <div class="error"></div>

            <form action="pay-referral.php" method="post">
                <input type="text" name="email" placeholder="Email" id="loginEmail" class="form-control">
                <input type="password" name="password" placeholder="Password" id="loginPassword" class="form-control">
                <button type="submit" style="width: auto;" class="btn banner-text3" id="loginBtn">Login</button>
            </form>
          </center>

        </div>

        <div class="formdiv" id="registerDiv">

                <form>

                <div>
                    
                    <center><div class="error"></div>
                    </center>

                    <br>
                    <input id="first_name" class="form-control" placeholder="First Name" style="margin-right: 5px;">

                    <input id="last_name" class="form-control" placeholder="Last Name">

                    <input type="email" id="email" class="form-control" placeholder="Email Address" style="margin-right: 5px;">

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

                    <div class="clear"></div>
                    <br>
                    
                    <div style="width: 100%;height:2px;background:rgb(0, 0, 0, 0.05)"></div>
                    
                    <br>
                    
                    <input type="password" id="password_1" class="form-control" placeholder="Password">
                    
                    <input type="password" id="password_2" class="form-control" placeholder="Confirm Password">
                    
                    <div class="clear"></div>
                    
                    <div style="font-size: 12px;line-height: 1.2em;margin-left: 5px;text-align: left;display: one;" id="rules">
                      <b style="line-height: 2em;">Password must be:</b> 
                      <br>
                      
                      <ul>
                        <li id="rule1">At least 8 characters</li>
                        <li id="rule2">A mixture of letters and numbers.</li>
                        <li id="rule3">A mixture of both uppercase and lowercase letters.</li>
                      </ul>

                    <br>
                    
                    <div class="clear"></div>
                    </div>


                    <br>
                    
                    
                    <label style="cursor:pointer">
                    <input type="checkbox" id="agree" value="1" name="terms" style="transform: translateY(2px);"> 
                    I agree to the <a href="../terms">Terms and Conditions</a> and <a href="../privacy">Privacy Policy</a>
                    </label>
                    <br>
                    <label style="cursor:pointer;margin-top: 5px;">
                    <input type="checkbox" id="subscribe" value="1" name="subscribe" style="transform: translateY(2px);" checked> 
                    I would like to subscribe to receive important updates
                    </label>
                    
                    <div class="clear"></div>
                    
                    <br>

                    <center>
                    <button class="btn banner-text3" id="registerBtn">Create Account</button>
                    <br>
                    <br>
                    <div class="error"></div>
                    <br>
                    <div>By registering you confirm you are 18 or above</div>
                    </center>

                </div>

                </form>


        </div>

    </div>

    <div id="success" class="animate__animated">

      <center>

        <script src="https://cdn.lordicon.com/lordicon.js"></script>
        <lord-icon
          src="https://cdn.lordicon.com/rmdufxni.json"
          trigger="loop"
          style="width:150px;height:150px" id="lordicon">
        </lord-icon>

        <div class="title" id="firstMsg" style="text-align: center;margin-top:10px"></div>
        <div id="finalMsg"></div>
      
      </center>
      

    </div>

    </div>
  </div>


</div>


<br>
<br>
<br>

<script>
  var plan;


  function redirectPayment(){
    $('#logger').hide();
    $('#success').show();
    $('#success').addClass('animate__fadeIn');

    $('#firstMsg').html("Y'all have been linked!");
    $('#finalMsg').html('Redirecting to the payment page...');
    
    setTimeout(function(){
      if (plan=='monthly') {
        window.location.href ="subscription/process?p=1";
      }else if(plan=='termly'){
        window.location.href ="subscription/process?p=2";
      }else if(plan=='yearly'){
        window.location.href ="subscription/process?p=3";
      }
    }, 2000);

  }


  $('.price-div').click(function(){
      $('.price-div').css('border', '4px solid rgb(0, 0, 0, 0.2)');
      $(this).css('border', '4px solid #31afb4');
  });

    

  function view(v){
    $('.error').html('');
    if(v=='login'){
      $('#registerDiv').fadeOut();
      setTimeout(function(){
        $('#loginDiv').fadeIn();
      }, 500);

      $('.pill-top-div').removeClass('pill-top-div-active');
      $('.pill-top-div').eq(0).addClass('pill-top-div-active');
    }else{
      $('#loginDiv').fadeOut();
      setTimeout(function(){
        $('#registerDiv').fadeIn();
      }, 500);
      
      $('.pill-top-div').removeClass('pill-top-div-active');
      $('.pill-top-div').eq(1).addClass('pill-top-div-active');
    }
  }


  function hidePrices(){
    if (logged_in) {
      $('#prices').hide();
      submitReferral();
    }else{
      setTimeout(function(){
        $('#prices').hide();
        $('#logger').show();
        $('#logger').addClass('animate__flipInY');
      }, 500);
    }
  }

  function showPrices(){
    $('#logger').hide();
    $('#prices').show();
    $('#prices').addClass('animate__flipInX');
  }

  function setPlan(p){
    plan = p;
    console.log(plan);
  }

  function submitReferral(){
    var refer = "<?php echo $refer;?>";
    $('#logger').hide();
    $('#prices').hide();
    $('#success').show();
    $('#firstMsg').html("Working on it...");
    $('#success').addClass('animate__fadeIn');
    
    $.post("referral?r="+refer+"&plan="+plan, {}, function(res){
      console.log(res);

      setTimeout(function(){

        if (1==1) {
          $('#firstMsg').html(res);
          
          if (res=="1") {
            redirectPayment();
          }
        }else{
          $('.error').html(res);
        }

      }, 3000);
        
    });
  }


//LOGGED IN REDIRECT
<?php

    if (logged_in()) {
      echo "var logged_in = true;";
    
    // check if referring thermselves
    $self_ref = mysqli_fetch_assoc(mysqli_query($conn, "SELECT id FROM user_info WHERE email='$email'"))['id'];
    if($self_ref == $refer){ ?>

      $('#logger').hide();
      $("#prices").hide();
      $('#success').show();

      $('#firstMsg').html("Your ambassador link works!");
      $('#finalMsg').html("Now go ahead and share this with someone.");
      <?php
    }

  }else{
    echo "var logged_in = false;";
  }

?>



// Login and register

  $('form').submit(false);

  // LOGIN
  $('#loginBtn').on('click', function(){
    $('#loginBtn').html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> &nbsp;SUBMITTING');

    setTimeout(function(){
      $.post("login/post-login.php", {password: $('#loginPassword').val(), email: $('#loginEmail').val(), type: "login"}, function(res){

          if (res==1) {
            $('#loginBtn').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> &nbsp;LOGIN SUCCESSFUL');
            $(".error").html('');

            submitReferral();

          }else{
            $(".error").html(res);
            $(".error").fadeIn('slow');
          $('#loginBtn').html('<i class="mdi mdi-reload"></i> &nbsp;TRY AGAIN');
          }

      });
    }, 500);

  });



  // REGISTER
  $("#university").on("change", function(){
    var unival = $("#university").val();
    if (unival=='other') {
      $("#other_university").show();
    }else{
      $("#other_university").hide();
    }
  })

  $("#other_university").hide();


  $('#agree').on('input', function(){
    if($('#agree').is(":checked")){
      $('#registerBtn').show();
    }else{
      $('#registerBtn').hide();
    }
  })

  $('#registerBtn').on('click', function(){
    
    if($('#agree').is(":checked")){

    if(validatePassword()){

    $('#registerBtn').html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> &nbsp;SUBMITTING');

    setTimeout(function(){
      $.post("login/post-login.php", {first_name: $('#first_name').val(), last_name: $('#last_name').val(), university: $('#university').val(), other_university: $('#other_university').val(), email: $('#email').val(), password_1: $('#password_1').val(), password_2: $('#password_2').val(), type: "register", csrf_token: '<?php echo $_SESSION['csrf_token']; ?>'}, function(res){

          if (res==1) {

            $('#registerBtn').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> &nbsp;PREPARING YOUR DASHBOARD');
            $(".error").html('');
            setTimeout(function(){

            if($('#subscribe').is(":checked")){
              $.get("<?php echo $url;?>", {subscribeEmail: $("#email").val(), source:"signup"}, function(finish){
                submitReferral();
              });
            }else{
              submitReferral();
            }

            },1000);

          }else{
            $(".error").html(res);
            if(res=='Referral not found'){
              $("#refer").css('border','1px solid red');
            }
            $(".error").fadeIn('slow');
            $('#registerBtn').html('<i class="mdi mdi-reload"></i> &nbsp;TRY AGAIN');
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

</body>

<?php require "footer.php"; ?>