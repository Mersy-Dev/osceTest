<?php

  $page_title = 'Account Settings';

  require "header.php";
  logged_in(true);
  $email = $_SESSION['email'];

  // print_r($_POST);

  $show = "account-info";

  if (post('notifications')) {

    $newsletter = 0;
    $marketing = 0;
    $billing = 0;

    if (!empty(post('newsletter'))) {
      $newsletter=1;
    }
    if (!empty(post('marketing'))) {
      $marketing=1;
    }
    if (!empty(post('billing'))) {
      $billing=1;
    }

    if(mysqli_query($conn, "SELECT id from user_notifications WHERE email='$email'")->num_rows==1){
      mysqli_query($conn, "UPDATE user_notifications SET newsletter='$newsletter', marketing='$marketing', billing_expiry='$billing' WHERE email='$email'");
    }else{
      mysqli_query($conn, "INSERT INTO user_notifications(email, newsletter, marketing, billing_expiry) VALUES ('$email', '$newsletter', '$marketing', '$billing')");

    }

    $show = "notifications";
  }





?>


  <link href="assets/account.css" rel="stylesheet">

  <br>


<div style="width:90%;max-width:1100px;margin:auto;margin-top: 30px;">



    <div class="flex">
      <div class="left-side">

      <div class="box">
        <div style="padding: 0 20px;padding-bottom: 20px;" onclick="$('#slide').slideToggle()">
          <div class="box-icon" style="color:#333">
            <i class="icofont-rounded-down"></i>
          </div>

    
        <div class="box-label">Account Settings</div>
        </div>
        <div id="slide">

          <div data-tab="account-info" class="tab tab-active">
            <div class="i"><i class='bx bxs-user-detail'></i></div>
            <div>Account Info</div>
            <div class="clearfix"></div>
          </div>

          <div data-tab="notifications" class="tab">
            <div class="i"><i class="icofont-bell"></i></div>
            <div>Notifications</div>
            <div class="clearfix"></div>
          </div>

          <div data-tab="password" class="tab">
            <div class="i"><i class="icofont-ui-password"></i></div>
            <div>Password</div>
            <div class="clearfix"></div>
          </div>

          <a href="my-payments">
          <div class="tab">
            <div class="i"><i class="icofont-credit-card"></i></div>
            <div>My Payments</div>
            <div class="clearfix"></div>
          </div>
          </a>

          <div class="clearfix"></div>
        </div>

      </div>

      </div>


      <div class="right-side">

        <div class="right-fff" style="">

          <div class="fadeout" id="account-info">
          <h4>Profile</h4>
          <br>
          <style type="text/css">
            td{
              padding: 30px
            }
          </style>
          <?php 
          $email = $_SESSION['email'];
          $info = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user_info WHERE email='$email'"));
           ?>
          <table class="table table-responsive <?php echo $darkMode ? 'table-dark':''; ?>">

          <tbody>
            <tr>
              <td>First Name</td>
              <td><b><?php echo $info['first_name']; ?></b></td>
            </tr>
            <tr>
              <td>Last Name</td>
              <td><b><?php echo $info['last_name']; ?></b></td>
            </tr>
            <tr>
              <td>University</td>
              <td><b><?php echo $info['university']; ?></b></td>
            </tr>
            <tr>
              <td>Email</td>
              <td><b><?php echo $email; ?></b></td>
            </tr>
          </tbody>

          </table>
          </div>


          <!--  -->
          <!--  -->
          <div class="fadeout" id="notifications">
            <h4>Notifications</h4>

            <?php 
            $not = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user_notifications WHERE email='$email'"));
             ?>
            <form method="post">
              <input type="hidden" name="notifications" value="1">
            <input type="checkbox" name="newsletter" value="1" <?php if (!empty($not) and $not['newsletter']==1) {echo 'checked';} ?>> &nbsp;Newsletters
            <br>
            <input type="checkbox" name="marketing" value="1" <?php if (!empty($not) and $not['marketing']==1) {echo 'checked';} ?>> &nbsp;Marketing Emails
            <br>
            <input type="checkbox" name="billing" value="1" <?php if (!empty($not) and $not['billing_expiry']==1) {echo 'checked';} ?>> &nbsp;Billing Expiration Reminder
            <br>
            <br>

            <button class="main-search-btn" type="submit">UPDATE</button> 
            </form>
          </div>

          <!--  -->
          <!--  -->


          <!--  -->
          <!--  -->
          <div class="fadeout" id="password">
<?php 

    if(post('old_password') and post('new_password') and post('confirm_password')){
      $old_password = md5(post('old_password'));
      $new_password = softSan(post('new_password'));
      $confirm_password = softSan(post('confirm_password'));


      if ($new_password != $confirm_password) {
      echo "<div style='color:red'>PASSWORDS DON'T MATCH</div><br>";
      }else{

        $user_check_query = "SELECT * FROM user_login WHERE email='$email' AND password='$old_password'";
        $query = mysqli_query($conn, $user_check_query);
        
        if ($query->num_rows==1) {
          if (strlen($new_password)>7) {
            $pass = md5($new_password);
            mysqli_query($conn, "UPDATE user_login SET password='$pass' WHERE email='$email'");
            echo "<div>Password Updated</div>";
          }else{
            echo "<div style='color:red'>Must be at least 8 characters</div><br>"; 
          }
        }else{
          echo "<div style='color:red'>Wrong Password</div><br>"; 
        }

      }

      $show = 'password';
    }
?>

            <h4>Update Password</h4>
            <br>
            <br>
            <form method="post">
            <input placeholder="Old password" style="background:rgb(0, 0, 0, 0.02);" type="password" class="form-control" name="old_password" required>
            <br>

            <input placeholder="New Password" style="background:rgb(0, 0, 0, 0.02);" type="password" class="form-control" name="new_password" required>
            <br>

            <input placeholder="Confirm Password" style="background:rgb(0, 0, 0, 0.02);" type="password" class="form-control" name="confirm_password" required>

            <br>
            <br>

            <button class="main-search-btn" type="submit">UPDATE</button> 
            </form>
          </div>

          <!--  -->
          <!--  -->
        </div>

      </div>

    </div>

</div>  

  <br>
  <br>
  <br>

  <script type="text/javascript">
    $(".tab").on("click", function () {

      if ($(window).width()<701) {
        $("#slide").slideToggle();
      }

      var e = $(this).attr('data-tab');
      console.log(e);
      $('.tab').removeClass("tab-active");
      $(this).addClass("tab-active");

      $(".fadeout").fadeOut(function(){
        setTimeout(function(){$("#"+e).fadeIn();
      }, 300);
      });

    })

    if ($(window).width()<701) {
      $("#slide").slideToggle();
    }

      $("#<?php echo $show;?>").fadeIn();
  </script>


<?php 

require "footer.php"; 

?>