<?php 

// header(("Location: alerts/temporary-maintenance.html"));
// exit();

require_once "inc/conn.php";



if(post('darkmode')){
  if (post('darkmode')=='true') {
    mysqli_query($conn, "UPDATE meta SET value=value+1 WHERE key_index='darkmode_tracker'");
  }else{
    mysqli_query($conn, "UPDATE meta SET value=value-1 WHERE key_index='darkmode_tracker'");
  }
  echo 1;
  exit();
}


if (get('subscribeEmail')) {


  $newsletter = 1;
  $marketing = 1;
  $billing = 1;

  if (get('source')=='signup') {
    $source = 'signup';
  }else{
    $source = 'homepage';
  }

  $email = softSan(get('subscribeEmail'));

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo 'invalid email';
  }else{

  if(mysqli_query($conn, "SELECT id from user_notifications WHERE email='$email'")->num_rows==1){
    mysqli_query($conn, "UPDATE user_notifications SET newsletter='$newsletter', marketing='$marketing', billing_expiry='$billing', source='$source' WHERE email='$email'");
  }else{
    mysqli_query($conn, "INSERT INTO user_notifications(email, newsletter, marketing, billing_expiry, source) VALUES ('$email', '$newsletter', '$marketing', '$billing', '$source')");

  }

  echo 'subscribed';

  }

  exit();

}

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>OSCE Toolbox</title>

  <!-- meta description -->
  <meta content="OSCE Toolbox is a resource library for pharmacy students to help them prepare for their OSCE exams." name="description">
  <meta content="OSCE, Pharmacy, Revise, Pharmacy OSCE Scenarios, Stations, Practice, UK, Exams" name="keywords">


  <meta property="og:title" content="OSCE Toolbox">
  <meta property="og:description" content="OSCE Toolbox is a resource library for pharmacy students  to help them prepare for their OSCE exams.">
  <meta property="og:image" content="<?php echo $url; ?>assets/img/logo.png">
  <meta property="og:url" content="<?php echo $url; ?>">
  <meta name="twitter:card" content="summary_large_image">
  <meta property="og:site_name" content="OSCE Toolbox">
  <meta name="twitter:image:alt" content="OSCE Toolbox">
  <meta property="og:type" content="website">
  <meta name="twitter:site" content="@oscetoolbox">


  <!-- Favicons -->
  <link href="<?php echo $url; ?>assets/img/favicon.png" rel="icon">
  <link href="<?php echo $url; ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">


  <!-- Vendor CSS Files -->
  <link href="<?php echo $url; ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <!-- CSS File -->
  <link href="<?php echo $url; ?>assets/search.css?v=24" rel="stylesheet">
  <link href="<?php echo $url; ?>assets/index.css?v=17" rel="stylesheet">


  <script type="text/javascript" src="<?php echo $url; ?>assets/jquery/jquery.min.js"></script>


  <!-- Google Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,400;0,500;1,500&family=Roboto:wght@300;400&family=Nunito:wght@300;400&display=swap" rel="stylesheet">

<!-- Minimo font -->
<link href="https://fonts.cdnfonts.com/css/minimo" rel="stylesheet">


<?php    
  $darkMode = false;
  if (isset($_COOKIE['darkmode']) && $_COOKIE['darkmode'] == 'true') {
    $darkMode = true;
?>
  <link rel="stylesheet" href="<?php echo $url; ?>assets/dark.css">
<?php } ?>

</head>


<body>



<div id="topMsg" style="background:#EF798A;color: #fff;padding: 15px;font-size: 14px;text-align: center;">
  <i class='bx bxs-magic-wand'></i> 
  New content released every week! 
  <!-- <a href="https://forms.gle/vYJ316bdUkCfT2EY9" style="color:#fff !important;text-decoration: underline;" target="_blank">HERE</a> -->

</div>


  <div class="custom-nav">

      <div style="float: right;margin-top:8px" class="top-toggle">
        <label style="cursor:pointer;">
          <label class="switch footer-switch">
            <input type="checkbox" id="toggleMode" <?php echo $darkMode ? 'checked' : ''; ?>>
            <span class="slider round"></span>
          </label> 
          <i class='bx bx-moon' style="transform:translateY(2px)"></i>
        </label>
      </div>


    <a href="<?php echo $url;?>"><div class="logo">
      <img src="<?php echo $url; ?>assets/img/logo.png">
      <div class="logo-text">osce toolbox <?php echo isset($_SESSION['premium']) ? $_SESSION['premium'] ? "<div class='premium-badge'>PREMIUM</div>" : '' : '';?></div>
    </div>
    </a>
    
    <form method="get" action="search.php">
      <div class="search" onclick="$('#searchInput').focus();">
        <input id="searchInput" name="q" class="search-input" placeholder="Search resource library..." type="text">
        <button class="submit-search"><img src="<?php echo $url; ?>assets/img/search-logo.png"></button>
        <div class="clear"></div>
      </div>
    </form>

    <div class="right-nav">

      <a href="<?php echo $url; ?>search"><div class="search-icon only-mobile"><i class="icofont-search-2"></i></div></a>

      <?php if (logged_in()): ?>
        <!-- <button id="accountCircle"><i class='bx bx-user-circle'></i></button> -->
      <?php endif ?>
    

      <a href="<?php echo $url; ?>articles/">
      <button class="browse" style="color:inherit">
        <span class="only-desktop">Articles</span>
        <i class='bx bx-news only-mobile' style="font-size:20px"></i>
      </button>
      </a> 

      <button id="browse" class="browse" style="color:inherit">
        <i class='bx bx-library only-mobile' style="font-size:20px"></i>
        <span class="only-desktop">Browse</span>
        <i class='bx bxs-chevron-down'></i>
      </button>

      <?php 
      if(isset($_SESSION['premium']) && $_SESSION['premium']){
        ?>
      <a href="<?php echo $url; ?>discord">
      <button class="browse" style="float:right;margin-right:-20px;color:inherit">
        <i class='bx bxl-discord-alt' style="font-size:20px"></i>
      </button>
      </a>

        <?php } else{?>
          <a href="<?php echo $url; ?>pricing">
            <button class="browse" style="float:right;margin-right:-20px;font-size:20px">
              
              <script src="https://cdn.lordicon.com/lordicon.js"></script>
              <lord-icon
              src="https://cdn.lordicon.com/jtiihjyw.json"
              trigger="loop"
              style="width:30px;height:30px">
            </lord-icon>
            
          </button>
        </a> 
        <?php }?>

      
      <?php if (logged_in()){ ?>
        <a href="<?php echo $url; ?>dashboard"><div class="nav-btn">
          <i class='bx bxs-dashboard only-mobile' style="font-size:20px"></i>
          <span class="only-desktop">Dashboard</span>
        </div></a> 
      </a> 
      <?php }else{ ?>
        <a href="<?php echo $url; ?>login/register"><div class="nav-btn">
          <i class='bx bx-user-circle only-mobile' style="font-size:20px"></i>
          <span class="only-desktop">Register</span>
        </div></a>      
      <?php } ?>

    </div>

    <div id="browseContent">
    <div class="browseContent">
      <a style="text-decoration:none" href="<?php echo $url; ?>search?category=scenario"><div><i class='bx bx-male-female'></i> <br>Scenarios</div></a>
      <a style="text-decoration:none" href="<?php echo $url; ?>search?category=cheatsheet"><div><i class='bx bxs-copy-alt' ></i> <br>Info Capsules</div></a>
      <a style="text-decoration:none" href="<?php echo $url; ?>search?category=video"><div><i class='bx bxs-tv' ></i> <br>Videos</div></a>
      <a style="text-decoration:none" href="<?php echo $url; ?>search"><div><i class='bx bxs-directions' ></i> <br>All Files</div></a>
    </div>
    </div>

    <div id="accountContent">
      <a href="<?php echo $url; ?>home"><div>Home</div></a>
      <a href="<?php echo $url; ?>account-settings"><div>Account Settings</div></a>
      <!-- <a href="my-payments"><div>My Payments</div></a> -->
    </div>


    <div class="clear"></div>
  </div>

<script type="text/javascript">
  window.addEventListener('scroll', function() {
  const scrollPosition = window.scrollY;
  const navBar = document.querySelector('.custom-nav');

  if (scrollPosition > 0) {
    navBar.classList.add('nav-shadow');
    $('#dark-mode-arrow').fadeOut();
  } else {
    navBar.classList.remove('nav-shadow');
    $('#dark-mode-arrow').fadeIn();
  }
});


var browseClicked = true;
var browseBtn = $("#browse");

$(document).on('click', function(event) {

  if (!browseBtn.is(event.target) && !browseBtn.has(event.target).length) {
    $("#browseContent").hide();
    browseClicked = true;
  }else{
    if (browseClicked) {
      $('#browseContent').fadeIn('fast');
      browseClicked = false;
    }else{
      $('#browseContent').hide('fast');
      browseClicked = true;
    }
  }

});


</script>


  <br>
  <br>
  <br>
  <!--  -->

<div class="subscription-embed" id="subup" style="display:none">
  <div class="close-subup" onclick="closePopup()">x</div>
  
<div id="mc_embed_shell">
      <link href="//cdn-images.mailchimp.com/embedcode/classic-061523.css" rel="stylesheet" type="text/css">
  <style type="text/css">
        #mc_embed_signup{background:#fff;clear:left; font:14px Helvetica,Arial,sans-serif;}
        /* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
           We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
</style>
<div id="mc_embed_signup">
    <form action="https://oscetoolbox.us21.list-manage.com/subscribe/post?u=e35f3ec3cf5ff662229e194c3&amp;id=cf2ce7769e&amp;f_id=00fdede6f0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank">
        <div id="mc_embed_signup_scroll"><h2 style="color:#31afb4">SIGN UP TO OUR NEWSLETTER</h2>
            7 days of <b>high quality free content</b> until launch
            <br>
            Be the <b>first to know</b> to know when we launch and grab one of our <b>limited spaces</b> and <b>exclusive discount</b> for our website once we launch only available to people who sign up now!
            <div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
            <div class="mc-field-group"><label for="mce-EMAIL">Email Address <span class="asterisk">*</span></label><input type="email" name="EMAIL" class="required email" id="mce-EMAIL" required="" value=""></div><div class="mc-field-group"><label for="mce-FNAME">First Name <span class="asterisk">*</span></label><input type="text" name="FNAME" class="required text" id="mce-FNAME" value="" required=""></div><div class="mc-field-group"><label for="mce-LNAME">Last Name </label><input type="text" name="LNAME" class=" text" id="mce-LNAME" value=""></div>
        <div id="mce-responses" class="clear">
            <div class="response" id="mce-error-response" style="display: none;"></div>
            <div class="response" id="mce-success-response" style="display: none;"></div>
        </div><div aria-hidden="true" style="position: absolute; left: -5000px;"><input type="text" name="b_e35f3ec3cf5ff662229e194c3_cf2ce7769e" tabindex="-1" value=""></div><div class="clear"><input type="submit" name="subscribe" id="mc-embedded-subscribe" class="button" value="Subscribe" style="background:#31afb4"></div>
    </div>
</form>
</div>
<script type="text/javascript" src="//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js"></script><script type="text/javascript">(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[5]='BIRTHDAY';ftypes[5]='birthday';}(jQuery));var $mcj = jQuery.noConflict(true);</script></div>


<script>
  // // Check if the user has closed the pop-up before
  // if (!localStorage.getItem('popupClosed')) {
  //   // If not closed, show the pop-up
  //   document.getElementById('subup').style.display = 'block';
  // }

  // console.log(localStorage);

  // function closePopup() {
  //   // Close the pop-up
  //   document.getElementById('subup').style.display = 'none';
  //   // Set a flag in local storage to indicate that the pop-up has been closed
  //   localStorage.setItem('popupClosed', 'true');
  // }
</script>

</div>