

<div class="footer-div">
  <footer class="py-5">
    <div class="row">
      <div class="col-6 col-md-2 mb-3">
        <!-- <h5>Section</h5> -->
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="<?php echo $url; ?>login" class="nav-link p-0 text-muted">Login</a></li>
          <li class="nav-item mb-2"><a href="<?php echo $url; ?>login/register" class="nav-link p-0 text-muted">Create Account</a></li>
          <li class="nav-item mb-2"><a href="<?php echo $url; ?>contact" class="nav-link p-0 text-muted">Contact</a></li>
          <li class="nav-item mb-2"><a href="<?php echo $url; ?>about" class="nav-link p-0 text-muted">About Us</a></li>
          <li class="nav-item mb-2"><a href="<?php echo $url; ?>faqs" class="nav-link p-0 text-muted">FAQs</a></li>
        </ul>
      </div>

      <div class="col-6 col-md-2 mb-3">
        <!-- <h5>Section</h5> -->
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="<?php echo $url; ?>search?category=scenario" class="nav-link p-0 text-muted">Scenarios</a></li>
          <li class="nav-item mb-2"><a href="<?php echo $url; ?>search?category=cheatsheet" class="nav-link p-0 text-muted">Info Capsules</a></li>
          <li class="nav-item mb-2"><a href="<?php echo $url; ?>search?category=video" class="nav-link p-0 text-muted">Videos</a></li>
          <li class="nav-item mb-2"><a href="<?php echo $url; ?>discord" class="nav-link p-0 text-muted">Discord</a></li>
        </ul>
      </div>

      <div class="col-6 col-md-2 mb-3">
        <!-- <h5>Section</h5> -->
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="<?php echo $url; ?>pricing" class="nav-link p-0 text-muted">Pricing</a></li>
          <li class="nav-item mb-2"><a href="<?php echo $url; ?>work-with-us" class="nav-link p-0 text-muted">Work with us</a></li>
          <!-- <li class="nav-item mb-2"><a href="privacy" class="nav-link p-0 text-muted">Privacy Policy</a></li> -->
          <li class="nav-item mb-2"><a href="<?php echo $url; ?>terms" class="nav-link p-0 text-muted">Terms and Conditions</a></li>
          <!-- <li class="nav-item mb-2"><a href="disclaimer" class="nav-link p-0 text-muted">Disclaimer</a></li> -->
          <li class="nav-item mb-2"><a href="<?php echo $url; ?>refund-policy" class="nav-link p-0 text-muted">Refund Policy</a></li>
        </ul>
      </div>

      <div class="col-md-5 offset-md-1 mb-3">
        <form>
          <h5>Subscribe to our newsletter</h5>
          <p>There are always new and exciting things from us.</p>
          <div id="showNL">
<!--           <div class="d-flex flex-column flex-sm-row w-100 gap-2">
              <label for="newsletter1" class="visually-hidden">Email address</label>
              <input id="newsletter" type="text" class="form-control" placeholder="Email address">
              <div class="btn btn-primary" onclick="subscribeNews()">Subscribe</div>
          </div> -->
              <a href="https://oscetoolbox.us21.list-manage.com/subscribe/post?u=e35f3ec3cf5ff662229e194c3&amp;id=cf2ce7769e&amp;f_id=00fdede6f0"><div class="btn btn-primary">Subscribe</div></a>
          </div>


            <script type="text/javascript">
              function subscribeNews() {
              var email = document.getElementById("newsletter").value;
              var url = "<?php echo $url; ?>?subscribeEmail=" + email;

              fetch(url)
              .then(response => response.text())
              .then(data => {
                  document.getElementById("showNL").style.display = "none";
                  console.log(data);
                  document.getElementById("hideNL").style.display = "block";
                if (data=='subscribed') {
                }
                
              })

              document.cookie = "subscribedNewsletter=true; expires=Thu, 01 Jan 2025 00:00:00 UTC; path=/";
            }

            if (document.cookie.indexOf("subscribedNewsletter=true") === -1) {
              // document.getElementById("c-popup").style.display = "block";
            }
            </script>

          <div id="hideNL" style="display:none">
          <div class="d-flex flex-column flex-sm-row w-100 gap-2">
            Subscribed!
          </div>
          </div>


        </form>
      </div>
    </div>

    <div style="margin:10px 0 10px 0;">
      <div style="float: left;">
      <a style="font-size:30px;margin-left:10px" href="medicine" class="nav-link p-0 text-muted"><i class='bx bx-pulse'></i></a>
      </div>

      <!-- <div style="float: right;">
        <label style="cursor:pointer">
          <label class="switch footer-switch">
            <input type="checkbox" id="toggleMode" <?php echo $darkMode ? 'checked' : ''; ?>>
            <span class="slider round"></span>
          </label> 
          <i class='bx bx-moon' style="transform:translateY(2px)"></i> Dark Mode
        </label>
      </div> -->

      <div class="clear"></div>
    </div>

    <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
      <p>
        © 2024 OSCE Toolbox. All rights reserved. <br>
        CRN: 15724937
        <?php
        // last item of page
        $page = explode('/', $_SERVER['REQUEST_URI']);
        $page = end($page);

        if($page=='contact'){
            echo "<br> 24 Asha Margh, Leicester, England, LE45LE";
        }
        ?>
      </p>
      <ul class="list-unstyled d-flex">
        <li class="ms-3"><a target="_blank" style="text-decoration:none" class="link-dark" href="https://twitter.com/oscetoolbox"><i class='bx bxl-twitter' style="font-size: 23px;"></i></a></li>
        <li class="ms-3"><a target="_blank" style="text-decoration:none" class="link-dark" href="https://www.instagram.com/oscetoolbox/"><i class='bx bxl-instagram' style="font-size: 23px;"></i></a></li>
        <li class="ms-3"><a target="_blank" style="text-decoration:none" class="link-dark" href="https://www.facebook.com/profile.php?id=100088965690695"><i style="font-size: 23px;" class='bx bxl-facebook'></i></a></li>
      </ul>
    </div>
    <a href="work-with-us"><small>Work with Us</small></a>
    &nbsp;
    <a href="privacy"><small>Privacy Policy</small></a>
    &nbsp;
    <a href="disclaimer"><small>Disclaimer</small></a>


    <br>

    
  <center style="font-size: 12px;font-weight: 700">
<form action="https://www.paypal.com/donate" method="post" target="_top">
    <label for="donate" style="cursor: pointer;">
      <img src="assets/img/like-1.png"> Make a Donation
    </label>

  <input type="hidden" name="hosted_button_id" value="5FG8YWB7MRH4N" />
  <input id="donate" style="display: none" type="image"/>
</form>

    </center>
  </footer>


</div>


<script>

$('#searchInput').blur(function() {
  $('#search-result-div').fadeOut('fast');

});

$('#searchInput').focus(function() {
  $('#search-result-div').fadeIn('fast');
});

$('#searchInput').on("input", function() {

  if($("#searchInput").val()!=''){
  $.post("dashboard/page-loader/page-search-count.php", {q: $("#searchInput").val()}, function(result){
    $("#search-result-div").html(result);
  });
}else{
    $("#search-result-div").html("<i class='bx bx-search-alt' ></i> &nbsp; Search Files ");
  }
  
});

$('#toggleMode').change(function() {
    let darkMode = this.checked ? 'true' : 'false';
    document.cookie = "darkmode=" + darkMode + "; path=/; max-age=31536000";
    $.post("<?php echo $url; ?>index", {darkmode: darkMode}, function(result){
        location.reload();
    });
});

</script>


</body>



<?php if ($url!=='http://localhost/osce/osce/'): ?>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-J26F6SQR8L"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-J26F6SQR8L');
</script>
  
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/640c8fcc4247f20fefe54ba1/1gr8h3e2b';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

<?php endif ?>

<?php
if (isset($_COOKIE["acceptedCookies"])) {
?>


<?php
} else {
    // Show cookie disclaimer popup.
?>

<div id="c-popup">
  <div class="c-icon"><i class='bx bx-cookie'></i></div>
  <p>This website uses cookies to ensure you get the best experience
    <br><a href="privacy">Learn more</a></p> 
  <button class="nav-btn" style="float:none;" onclick="acceptCookies()">Accept</button>
</div>
<script type="text/javascript">
  function acceptCookies() {
  document.getElementById("c-popup").style.display = "none";
  document.cookie = "acceptedCookies=true; expires=Thu, 01 Jan 2025 00:00:00 UTC; path=/";
}

if (document.cookie.indexOf("acceptedCookies=true") === -1) {
  document.getElementById("c-popup").style.display = "block";
}


window.Tawk_API.onLoad = function(){
    window.Tawk_API.hideWidget();
};

</script>

<?php
}
?>

<script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/e35f3ec3cf5ff662229e194c3/0a237cf9175d5c39ced9c1ead.js");</script>


</html>