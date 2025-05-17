<?php
  
  require "header.php";

?>


<!-- carousel -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />


<link  rel="stylesheet" href="<?php echo $url;?>assets/landing.css?v=5">


<!-- REPEATED UPDATES -->
<style>
  

.group-div-text{
	text-shadow: 5px 5px 5px #000;
}

.dark-mode-arrow{
  position: fixed;
  right: 10%;
  top: 100px;
  width: 70px;
  z-index: 3;
}

<?php if($darkMode){ ?>
  .hero-mic-icon{
    background: url(<?php echo $url;?>assets/img/landing/mic-white.png) center no-repeat;
    background-size: contain;
  }
  .hero-photo-icon{
    background: url(<?php echo $url;?>assets/img/landing/photo-white.png) center no-repeat;
    background-size: contain;
  }
  .hero-sticker-icon{
    background: url(<?php echo $url;?>assets/img/landing/sticker-white.png) center no-repeat;
    background-size: contain;
  }
  .hero-add-icon{
    background: url(<?php echo $url;?>assets/img/landing/add-white.png) center no-repeat;
    background-size: contain;
  }
<?php }?>


</style>

<?php if(!$darkMode){ ?>
<img class="dark-mode-arrow" id="dark-mode-arrow" src="<?php echo $url;?>assets/img/landing/dark-mode-arrow.png">
<?php }?>

<div class="blob"></div>

<div class="flex-container">
      <div class="flex-item banner-left" style="align-self:center">
            <h1 class="hero-text1">Access <em>real</em> pharmacy <br><span style="color:#fff;font-style:italic">OSCE</span> scenarios<br>with mark schemes.</h1>
            <div class="hero-text2" style="color:#fff">Each scenario has been reviewed by a qualified pharmacist</div>
    
            <!-- <a href="login/register.php"><div class="banner-text3">GET STARTED</div></a> -->

            <br>
            <br>
      </div>

      <div class="banner-right">
      <div class="owl-flex">
        <img src="<?php echo $url;?>assets/img/landing/actual-reviews2<?php echo $darkMode ? '-white':'';?>.png" class="actual-reviews" alt="">

        <div class="owl-carousel owl-theme reviews-carousel">
          
          

        <div class="subflex-container">
        
          <div class="hero-subflex-item1">
            <div style="background: url(<?php echo $url;?>assets/img/landing/p1.png) center no-repeat;background-size:cover" class="img" alt="profile-image"></div>
          </div>
          
          <div class="hero-subflex-item2">
               <p class="hero-timestamp">14:06</p>

               <a href="#">
               <p class="hero-review white-bg" id="text">
                <span class="auto-type">
                    Thank you so much for creating this programme 👏🏼<br>I have passed my osce and got a <br>first 🥳<br> I'm so thankful for this resource and I would highly recommend it to all my lower year friends 💗
                </span>
               </p>
               </a>

                <p class="hero-tap">Tap to react</p>

                <a href="#">
                <div class="hero-message-bar">
                  <span><img src="<?php echo $url;?>assets/img/landing/icons8-camera-50.png"
                  class="hero-camera"alt="camera"></img></span>
                  <span class="hero-message">Message...</span>
                  <span><div src="<?php echo $url;?>assets/img/landing/mic.png" class="hero-mic-icon" alt="mic"></div></span>
                  <span><div src="<?php echo $url;?>assets/img/landing/photo.png" class="hero-photo-icon" alt="photo"></div></span>
                  <span><div src="<?php echo $url;?>assets/img/landing/sticker.png" class="hero-sticker-icon" alt="sticker"></div></span>
                  <span><div src="<?php echo $url;?>assets/img/landing/add.png" class="hero-add-icon" alt="add"></div></span>
                </div>
                </a>
          </div>
          
        </div>
        <!--  -->

        <div class="subflex-container">

          <div class="hero-subflex-item1">
            <div style="background: url(<?php echo $url;?>assets/img/landing/p2.png) center no-repeat;background-size:cover" class="img" alt="profile-image"></div>
          </div>
          
          <div class="hero-subflex-item2">

               <p class="hero-timestamp">22:24</p>

               <a href="#">
               <p class="hero-review white-bg">
                <span class="auto-type">Looks amazing! I'm so happy there's something like this resource available for pharmacy students! There's always been nurse and doctor OSCE practices but I could never find Pharmacy...(ps crying tears over past me who cried over OSCEs)</span>
               </p>
               </a>

                <p class="hero-tap">Tap to react</p>

                <a href="#">
                  <div class="hero-message-bar">
                    <span><img src="<?php echo $url;?>assets/img/landing/icons8-camera-50.png"
                    class="hero-camera"alt="camera"></img></span>
                    <span class="hero-message">Message...</span>
                    <span><div src="<?php echo $url;?>assets/img/landing/mic.png" class="hero-mic-icon" alt="mic"></div></span>
                    <span><div src="<?php echo $url;?>assets/img/landing/photo.png" class="hero-photo-icon" alt="photo"></div></span>
                    <span><div src="<?php echo $url;?>assets/img/landing/sticker.png" class="hero-sticker-icon" alt="sticker"></div></span>
                    <span><div src="<?php echo $url;?>assets/img/landing/add.png" class="hero-add-icon" alt="add"></div></span>
                  </div>
                  </a>
          </div>

        </div>
        <!--  -->
        
        <div class="subflex-container">

          <div class="hero-subflex-item1">
            <div style="background: url(<?php echo $url;?>assets/img/landing/p3.png) center no-repeat;background-size:cover" class="img" alt="profile-image"></div>
          </div>
          
          <div class="hero-subflex-item2">

               <p class="hero-timestamp">22:24</p>

               <a href="#">
               <p class="hero-review white-bg">
                <span class="auto-type">Hey, I just wanted to say thank you for making the OSCE Toolbox. I always found myself feeling underprepared and I used to wing my pharmacy OSCES. Also icl geekymedics was kinda limited at points cause its more specialised to medical students. Keep up the good work guys, you guys are gonna take over the pharmacy OSCE game 💪</span>
               </p>
               </a>

                <p class="hero-tap">Tap to react</p>

                <a href="#">
                  <div class="hero-message-bar">
                    <span><img src="<?php echo $url;?>assets/img/landing/icons8-camera-50.png"
                    class="hero-camera"alt="camera"></img></span>
                    <span class="hero-message">Message...</span>
                    <span><div src="<?php echo $url;?>assets/img/landing/mic.png" class="hero-mic-icon" alt="mic"></div></span>
                    <span><div src="<?php echo $url;?>assets/img/landing/photo.png" class="hero-photo-icon" alt="photo"></div></span>
                    <span><div src="<?php echo $url;?>assets/img/landing/sticker.png" class="hero-sticker-icon" alt="sticker"></div></span>
                    <span><div src="<?php echo $url;?>assets/img/landing/add.png" class="hero-add-icon" alt="add"></div></span>
                  </div>
                  </a>
          </div>

        </div>

        
        </div>

      </div>
      </div>


  </div>

  <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <script>
      setTimeout(function(){})
        var typed = new Typed(".auto-type",{
            strings: ["Thank you so much for creating this programme &#x1F44F;&#127996;<br>I have passed my osce and got a <br>first &#x1F973;<br> I'm so thankful for this resource and I would highly recommend it to all my lower year friends &#128151;  ^20000 "],
            typeSpeed: 25,
            backSpeed: 5,
            loop: true
        })


    $(document).ready(function(){
      $(".reviews-carousel").owlCarousel({
        loop: true,
        margin: 0,
        nav: true,
        dots: false,
        autoplay: true,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 1
          },
          1000: {
            items: 1
          }
        }
      });
    });
    </script>



  <div style="max-width: 1200px;margin: auto;width: 95%;">
    <br>
    <br>
    <br>
  <div class="title" style="position: relative;z-index:3;">Browse from our Top Categories</div>
    <div class="title-sub">
      <!-- All our resources have been reviewed by qualified pharmacists and <br> we have worked hard to make them as useful as possible to boost your learning! <br>  -->
    <!-- <span style="color:black;font-style: italic;font-weight: normal;font-size: 14px;">(If there are any errors, do let us know with the report button, we're only human :) )</span> -->
  </div>

  <br>

  <div class="row">

    <div class="col-lg col-sm-6" data-aos="fade-up" data-aos-duration="500">
    <a href="search?s=1&category=scenario">
      <div class="group-div" style="background: #31afb4 url(assets/img/group1.png) center no-repeat;background-size: cover;">
        <div class="group-div-rgb">
          <div class="group-div-text">Scenarios</div>
        </div>
      </div>
    </a>
    </div>


    <div class="col-lg col-sm-6" data-aos="fade-up" data-aos-duration="500" data-aos-delay="100">
    <a href="search?s=1&category=cheatsheet">
      <div class="group-div" style="background: #31afb4 url(assets/img/group2.png) center no-repeat;background-size: cover;">
        <div class="group-div-rgb">
          <div class="group-div-text">Info Capsules</div>
        </div>
      </div>
    </a>
    </div>


    <div class="col-lg col-sm-6" data-aos="fade-up" data-aos-duration="500" data-aos-delay="100">
    <a href="search?s=1&category=video">
      <div class="group-div" style="background: #31afb4 url(assets/img/group3.png) center no-repeat;background-size: cover;">
        <div class="group-div-rgb">
          <div class="group-div-text">Videos</div>
        </div>
      </div>
    </a>
    </div>


    <div class="col-lg col-sm-6" data-aos="fade-up" data-aos-duration="500" data-aos-delay="100">
    <a href="discord">
      <div class="group-div" style="background: #31afb4 url(assets/img/group4.png) center no-repeat;background-size: cover;">
        <div class="group-div-rgb">
          <div class="group-div-text">Discord</div>
        </div>
      </div>
    </a>
    </div>


  </div>
  </div>


<br>


<div style="max-width: 1200px;margin: auto;width: 95%;overflow-x: hidden;">

  <br>
  <br>
  <br>
<div class="title">All the tools you need in one place</div>
<br>
<br>
<br>
  <!-- <div class="title-sub">Our tools have been curated to make learning a fun, safe and tailored process</div> -->

  <div class="row catgroup">


  <div class="col-md">
    <div>
        <img src="assets/img/catgroup1.png" style="height: 80px"><br><br><br>
        <p>Resources specific to your university</p>
        <span> We work with Pharmacy students at each university across the UK to provide good-quality resources that will tailor your learning to your curriculum. </span>
        <br>
        <br>
        <br>
      
    </div>

    
  </div>

  <div class="col-md">
    <div>
        <img src="assets/img/catgroup2.png" style="height: 80px"><br><br><br>
        <p>Something for everyone</p>
        <span>No matter what level you are at in your education, we work hard to make sure we have something to offer everyone. Track your progress using our personalised dashboard!</span>
        <br>
        <br>
        <br>
      
    </div>

    
  </div>

  <div class="col-md">
    <div>
        <img src="assets/img/catgroup3.png" style="height: 80px"><br><br><br>
        <p>Learn with friends</p>
        <span>We want to create a community for Pharmacy students across the UK to learn together and share resources. If you are looking for someone to practice with, join one of our virtual practice sessions on Discord!</span>
      
    </div>

    
  </div>


  </div>
</div>



<!-- <div class="get-started">
<div class="get-started-img">
  <div class="get-left">Get started with a <br>Gastrointestinal history!</div>
</div>
</div> -->
<br><br><br><br>

<div style="max-width: 1200px;margin: auto;width: 95%;overflow-x: ;">
<div class="table-check-scroll">
<div class="table-check">

  <div class="table-check-col" style="background: none;">
    <div>&nbsp;</div>
    <div class="table-check-text">Pharmacist <br>Reviewed</div>
    <div class="table-check-text">Time <br>Saving</div>
    <div class="table-check-text">Model <br>Answers</div>
    <div class="table-check-text">Up to <br>Date</div>
    <div class="table-check-text">Resit <br>Cover</div>
    <div class="table-check-text">Cool <br>Octopus Mascot</div>
  </div>

  <div class="table-check-col" style="background: #97D6D9;" data-aos="fade-up" data-aos-duration="500" data-aos-delay="50">
    <div class="index-aa"><b>OSCE <br> Toolbox</b></div>
    <div class="table-check-icon">✔️</div>
    <div class="table-check-icon">✔️</div>
    <div class="table-check-icon">✔️</div>
    <div class="table-check-icon">✔️</div>
    <div class="table-check-icon">✔️</div>
    <div class="table-check-icon">✔️</div>
  </div>

  <div class="table-check-col table-check-col-dark" data-aos="fade-up" data-aos-duration="500" data-aos-delay="100">
    <div>OSCE <br>Books</div>
    <div class="table-check-icon">✔️</div>
    <div class="table-check-icon">❌</div>
    <div class="table-check-icon">✔️</div>
    <div class="table-check-icon">❌</div>
    <div class="table-check-icon">❌</div>
    <div class="table-check-icon">❌</div>
  </div>

  <div class="table-check-col table-check-col-dark" data-aos="fade-up" data-aos-duration="500" data-aos-delay="150">
    <div>Adapting <br>other scenarios</div>
    <div class="table-check-icon">❌</div>
    <div class="table-check-icon">❌</div>
    <div class="table-check-icon">❌</div>
    <div class="table-check-icon" style="font-size: 40px;">?</div>
    <div class="table-check-icon">❌</div>
    <div class="table-check-icon">❌</div>
  </div>

  <div class="table-check-col table-check-col-dark" data-aos="fade-up" data-aos-duration="500" data-aos-delay="200">
    <div>Making your <br>own scenarios</div>
    <div class="table-check-icon">❌</div>
    <div class="table-check-icon">❌</div>
    <div class="table-check-icon">❌</div>
    <div class="table-check-icon" style="font-size: 40px;">?</div>
    <div class="table-check-icon">❌</div>
    <div class="table-check-icon">❌</div>
  </div>

</div>
</div>
</div>



<br>
<br>
<br>

<div style="max-width: 1200px;margin: auto;width: 95%;overflow-x: ;">
<div class="title">Articles</div>
<br>
<br>
<br>

<div class="post-container">


<a href="articles/how-to-study-drugs">
	<div class="post">
	<div class="post-img" style="background: url(<?php echo $url;?>articles/images/66830214af76d.jpg) center no-repeat;background-size:cover"></div>
	<div class="post-content">
		<div class="post-time">14 September</div>
		<h2>How to study drugs</h2>
	</div>
</div>
</a>


<a href="https://oscetoolbox.com/articles/tips-for-writing-a-pharmacy-personal-statement">
  <div class="post">
  <div class="post-img" style="background: url(<?php echo $url;?>articles/images/669d1fbd149a1.jpg) center no-repeat;background-size:cover"></div>
  <div class="post-content">
    <div class="post-time">21 July</div>
    <h2>Tips for Writing a Pharmacy Personal Statement</h2>
  </div>
</div>
</a>

    
<a href="https://oscetoolbox.com/articles/journeys-to-pharmacy---kayode">
  <div class="post">
  <div class="post-img" style="background: url(<?php echo $url;?>articles/images/669ee12e788b3.jpeg) center no-repeat;background-size:cover"></div>
  <div class="post-content">
    <div class="post-time">21 July</div>
    <h2>Journeys to Pharmacy - Kayode</h2>
  </div>
</div>
</a>

<?php

	$sql = "SELECT * FROM articles WHERE hidden='0' ORDER BY id DESC LIMIT 0";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()) {
		$id = $row['id'];
		$title = $row['title'];
		$author = $row['author'];
		$content = $row['content'];
		$slug = $row['slug'];
		$image = $row['image'];
		$date = $row['time_added'];
		$timestamp = strtotime($date);
		$date = date("d F", $timestamp);
		$excerpt = substr($content, 0, 100);
		$excerpt = substr($excerpt, 0, strrpos($excerpt, ' '));
		$excerpt = $excerpt . "...";
		?>

		<a href="article.php?id=<?php echo $id; ?>">
			<div class="post">
			<div class="post-img" style="background: url(<?php echo $url;?>articles/images/<?php echo $image;?>) center no-repeat;background-size:cover"></div>
			<div class="post-content">
				<div class="post-time"><?php echo $date;?></div>
				<h2><?php echo $title;?></h2>
			</div>
		</div>
		</a>

		<?php
	}
?>



<br>
<br>

<center>
<a style="color:#fff" href="articles"><div class="banner-text3" style="width: 200px;">View all articles</div></a>
</center>

</div>
</div>


<!-- 

    <br>
    <br>
    <br>

    <div class="row" style="max-width: 625px;margin: auto;">
      <div class="col">
        <img src="assets/img/logo-white.png" style="float: left;margin-right: 10px;">
        <div style="float: left;">
          <div><b>OSCE Toolbox</b></div>
          <div style="font-size: 14px">All Rights Reserved. 2022.</div>
        </div>
      </div>
      <div class="col" style="text-align: right;font-weight: bolder"><a href="mailto:oscetoolbox@gmail.com" style="text-decoration: underline;">oscetoolbox@gmail.com</a></div>
    </div> -->

    <div class="aos" data-aos="fade-up" style="max-width: 95%;overflow-x: hidden;">
  <div data-aos="fade-left" class="aos-header">
    The <span style="font-family: 'Minimo', sans-serif;font-weight: 100">toolbox</span> that every Pharmacy student needs
    <!-- <br> -->
    <!-- <a href="login/register.php"><div style="color: #333;font-size: 14px !important;" class="banner-text3">CREATE YOUR FREE ACCOUNT</div></a> -->
  </div>
</div>

    <br>


    
    <br>
    <br>

  </div>


  



  <!-- <div style="max-width: 1200px;margin: auto;width: 95%;">
    
      <div class="tiktok-header">
        <div class="tiktok-dp" style="background: url(assets/img/logo.jpeg) center no-repeat; background-size:contain"></div>
        <div class="tiktok-header-content">
          <div class="tiktok-header-username">oscetoolbox</div>
          <div class="tiktok-header-stats">
            <div class="tiktok-header-stat"><b>42</b> <br>Following</div>
            <div class="tiktok-header-stat"><b>2301</b> <br>Followers</div>
            <div class="tiktok-header-stat"><b>12.3k</b> <br>Likes</div>
          </div>
        </div>
      </div>

  </div> -->

  <br>
  <br>
  <center>
  <a href="https://www.tiktok.com/@oscetoolbox" target="_blank" style="margin-right: 20px;">
    <div class="tiktok-button" style="background: #31afb4;">
      <img src="assets/img/tiktok-landing/tiktok-logo.png" alt="TikTok Logo" class="tiktok-logo">
      Follow us on TikTok
    </div>
  </a>

  
  <a href="https://www.instagram.com/oscetoolbox/" target="_blank">
    <!-- <div class="tiktok-button" style="background: #E1306C;"> -->
    <div class="tiktok-button" style="background: #EF798A;">
      <img src="assets/img/tiktok-landing/instagram.webp" alt="Instagram Logo" class="tiktok-logo">
      Follow us on Instagram
    </div>
  </a>

  </center>

  <br>
  <br>
  
  <div class="tiktok-div owl-carousel tiktok-div-carousel">

    <div class="tiktok-post" style="background: black url(assets/img/tiktok-landing/8.avif) center no-repeat;background-size:cover">
      <a href="https://www.tiktok.com/@oscetoolbox/video/7284157336011164961" target="_blank">
        <div class="tiktok-post-overlay">
          <div class="tiktok-txt"><i class='bx bx-play'></i>6108</div>
        </div>
        </a>
    </div>

    <div class="tiktok-post" style="background: black url(assets/img/tiktok-landing/7.avif) center no-repeat;background-size:cover">
      <a href="https://www.tiktok.com/@oscetoolbox/video/7363389084171029793" target="_blank">
        <div class="tiktok-post-overlay">
          <div class="tiktok-txt" style="color: black"><i class='bx bx-play'></i>7.4k</div>
        </div>
        </a>
    </div>

    <div class="tiktok-post" style="background: black url(assets/img/tiktok-landing/1.avif) center no-repeat;background-size:cover">
      <a href="https://www.tiktok.com/@oscetoolbox/video/7363034696382549281" target="_blank">
        <div class="tiktok-post-overlay">
          <div class="tiktok-txt"><i class='bx bx-play'></i>67.6k</div>
        </div>
        </a>
    </div>
    
    <div class="tiktok-post" style="background: black url(assets/img/tiktok-landing/2.jpeg) center no-repeat;background-size:contain">
      <a href="#" target="_blank">
        <div class="tiktok-post-overlay">
          <div class="tiktok-txt"><i class='bx bx-play'></i>23.4k</div>
        </div>
      </a>
    </div>

    <div class="tiktok-post" style="background: black url(assets/img/tiktok-landing/3.avif) center no-repeat;background-size:cover">
      <a href="https://www.tiktok.com/@oscetoolbox/video/7347761891428683041" target="_blank">
        <div class="tiktok-post-overlay">
          <div class="tiktok-txt"><i class='bx bx-play'></i> 12.4k</div>
        </div>
        </a>
    </div>

    <div class="tiktok-post" style="background: black url(assets/img/tiktok-landing/4.avif) center no-repeat;background-size:cover">
      <a href="https://www.tiktok.com/@oscetoolbox/video/7399385179820739873" target="_blank">
        <div class="tiktok-post-overlay">
          <div class="tiktok-txt"><i class='bx bx-play'></i> 1042</div>
        </div>
        </a>
    </div>

    <div class="tiktok-post" style="background: black url(assets/img/tiktok-landing/5.avif) center no-repeat;background-size:cover">
      <a href="https://www.tiktok.com/@oscetoolbox/video/7397460264154582304" target="_blank">
        <div class="tiktok-post-overlay">
          <div class="tiktok-txt" style="color:black"><i class='bx bx-play'></i> 2k</div>
        </div>
        </a>
    </div>
    
    <div class="tiktok-post" style="background: black url(assets/img/tiktok-landing/6.avif) center no-repeat;background-size:cover">
      <a href="https://www.tiktok.com/@oscetoolbox/video/7375230025294941472" target="_blank">
        <div class="tiktok-post-overlay">
          <div class="tiktok-txt"><i class='bx bx-play'></i> 2610</div>
        </div>
      </a>
    </div>
    
  </div>
  </div>

  

  <script>
    $(document).ready(function(){
      $(".tiktok-div-carousel").owlCarousel({
        loop: true,
        autoWidth: true,
        margin: 10,
        nav: false,
        dots: false,
        autoplay: true
      });
    });
  </script>



<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 2000, // values from 0 to 3000, with step 50ms
  });
</script>

<script>
  grecaptcha.ready(function() {
      var siteKey = '6LcGuHAnAAAAAKs8xL0Zh04H5e42y8d4Y6jfbysX';

      grecaptcha.execute(siteKey, { action: 'contact' }).then(function(response) {
          // Assign the response to the hidden input field
          document.getElementById('recaptcha_response').value = response;
      });
  });
</script>

<?php 

require "footer.php"; 

?>