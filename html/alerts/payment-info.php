<?php

  require "../header.php";

?>

<br>
<br>

<?php if (get('info')=='paid'): ?>
  
  <br><br>
  <center>
  <script src="https://cdn.lordicon.com/lordicon.js"></script>
  <lord-icon
      src="https://cdn.lordicon.com/jtiihjyw.json"
      trigger="hover"
      style="width:150px;height:150px">
  </lord-icon>
  </center>
<div class="title" style="margin-top:20px">It seems you already have an active subscription plan</div>

<br>
<div style="display:flex;justify-content: center;">
<a href="../dashboard"><div class="nav-btn" style="float:none;margin-right: 10px;">Back to dashboard</div></a>
</div>
<?php endif ?>



<?php if (get('info')=='login'): ?>

<?php 
setcookie("redirect_url", $url."/pricing", time() + 1800);
 ?> 
<div class="title">You're not logged in yet</div>

<br>

<div style="display:flex;justify-content: center;">
<a href="../login/?redirect=pricing"><div class="nav-btn" style="float:none;margin-right: 10px;">Login</div></a>
<a href="../login/register?redirect=pricing"><div class="nav-btn" style="float:none;">Create Account</div></a>
</div>
<?php endif ?>


<?php if (get('info')=='cancelled'): ?>
  
<div class="giant-icon"><i class="icofont-error"></i></div>
<div class="title">Payment Cancelled</div>

<br>

<div style="display:flex;justify-content: center;">
<a href="../pricing"><div class="nav-btn" style="float:none;margin-right: 10px;">Try Again</div></a>
</div>
<?php endif ?>


<?php if (get('info')=='success'){

// Check if the "redirect_url" cookie exists
if(isset($_COOKIE["redirect_url"])) {
  // Get the redirect URL from the cookie
  $redirect_url = $_COOKIE["redirect_url"];
  
  // Verify that the URL is valid
  if(filter_var($redirect_url, FILTER_VALIDATE_URL)) {
    // Clear the cookie
    setcookie("redirect_url", "", time() - 3600);
  
    // Redirect the user to the URL
    header("Location: $redirect_url");
    exit();
  } else {
    // If the URL is not valid, delete the cookie and show an error message
    setcookie("redirect_url", "", time() - 3600);
    echo "Error: Invalid URL";
    exit();
  }
}else{

  ?>
  
<div class="giant-icon"><i class="icofont-check-circled"></i></div>
<div class="title">Payment Successful</div>

<br>

<div style="display:flex;justify-content: center;">
<a href="../dashboard"><div class="nav-btn" style="float:none;margin-right: 10px;">Go to dashboard</div></a>
</div>
<?php } } ?>



</div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<?php

  require "../footer.php";

?>