<?php 


	require_once "../inc/conn.php";
	logged_in(true);


$page_title = "Account Settings";
$nav = "Dashboard";
$email = $_SESSION['email'];

if(get('del')){
	$id = softSan(get('del'));
	mysqli_query($conn, "UPDATE uploads SET hidden=1 WHERE user_id='$email' AND id='$id'");

}

if (post('reason')) {
  $reason = softSan(post('reason'));
  $subreason = softSan(post('subreason'));

  if(mysqli_query($conn, "INSERT INTO unsubscription (email, reason, subreason) VALUES ('$email', '$reason', '$subreason')")){
      header("Location: ../subscription/pause-subscription");
      exit();
  }
}


require_once "header.php"; ?>

<style type="text/css">
  .option{
    background: #31afb4;
    color: #fff;
  }.option:hover{
    background: #EF798A;
  }


  .feature-icon{
    font-size: 80px;
/*    text-shadow: 0px 0px #EF798A;*/
  color: #EF798A;
  }

  .features-div div:hover{
    color: #000;
    transition: 0.3s;
  }
</style>



<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  
<form method="post">
<div class="content content-dark">

    <div class="row" style="width:100%;margin: auto;">


      <div class="col-sm-6">
        <center><img src="assets/img/cancel.png" class="cancel-img"></center>
      </div>

      <div class="col-sm-6 order-sm-first" >
        

        <div class="slick-slider" style="max-width: 500px;">

        <div>
            <br>
            <br>

            <center>
            <h5>Are you sure you want to leave?</h5>

            You will be missing out on:</center>

            <br>
            <br>

  <div class="row features-div" style="text-align:center;color: #00;">

    <div class="col-lg-4 col-md-6 col-sm-2">
      <div class="feature-icon"><i class='bx bx-sun'></i></div>
      Access to all scenarios, cheat sheets, videos
    </div>

    <div class="col-lg-4 col-md-6 col-sm-2">
      <!-- <div class="feature-icon"><i class="icofont-glass"></i></div> -->
      <div class="feature-icon"><i class='bx bxs-wine'></i></div>
      Access to the VIP area and specialist channels of the Discord server
    </div>
    

    <div class="col-lg-4 col-md-6 col-sm-2">
      <div class="feature-icon"><i class='bx bxl-discord'></i></div>
      Free access to all Discord events and practice sessions
    </div>

  </div>

  <br>

  <div class="row features-div" style="text-align:center;color: #00;">

    <div class="col-lg-4 col-md-6 col-sm-2">
      <div class="feature-icon"><i class='bx bx-slider'></i></div>
      Personalised progress tracker (coming soon)
    </div>

    <div class="col-lg-4 col-md-6 col-sm-2">
      <div class="feature-icon"><i class='bx bxs-message-dots' ></i></div>
      Comments 
    </div>

    <div class="col-lg-4 col-md-6 col-sm-2">
      <div class="feature-icon"><i class='bx bx-check'></i></div>
      Interactive mark schemes on all scenarios, reviewed by a qualified pharmacist
    </div>

  </div>



            <br>
            <center>

              <button type="button" class="btn btn-primary" onclick="$('.slick-slider').slick('slickNext')" style="margin-right: 20px;">
                 Yes, I'm sure I want to cancel.
              </button>

              <a href="my-payments">
              <button type="button" class="btn btn-primary">
                 Take me back.
              </button>
              </a>

            </center>
            <br>
            <br>
        </div>

        <div id="reasons">

            <br>
            <h5>Why are you unsubscribing?</h5>

              <label style="width:100%" for="option-a-input">
                <div class="option">
                    <input id="option-a-input" type="radio" name="reason" value="Content dissatisfaction">
                    <span id="option-a">Content dissatisfaction</span>
                </div>
              </label>

              <label style="width:100%" for="option-b-input">
                <div class="option">
                    <input id="option-b-input" type="radio" name="reason" value="Financial reasons">
                    <span id="option-b">Financial reasons</span>
                </div>
              </label>

              <label style="width:100%" for="option-c-input">
                <div class="option">
                    <input id="option-c-input" type="radio" name="reason" value="I am not using the service">
                    <span id="option-c">I am not using the service</span>
                </div>
              </label>

              <label style="width:100%" for="option-d-input">
                <div class="option">
                    <input id="option-d-input" type="radio" name="reason" value="Technical issues">
                    <span id="option-d">Technical issues</span>
                </div>
              </label>

              <label style="width:100%" for="option-e-input">
                <div class="option">
                    <input id="option-e-input" type="radio" name="reason" value="Privacy and Security Concerns">
                    <span id="option-e">Privacy and Security Concerns</span>
                </div>
              </label>

              <label style="width:100%" for="option-f-input">
                <div class="option">
                    <input id="option-f-input" type="radio" name="reason" value="Customer service">
                    <span id="option-e">Customer service</span>
                </div>
              </label>

              <label style="width:100%" for="option-g-input">
                <div class="option">
                    <input id="option-g-input" type="radio" name="reason" value="Temporary cancellation">
                    <span id="option-e">Temporary cancellation</span>
                </div>
              </label>



            <br>
            <br>
            <br>
            <center>
              <a href="my-payments"><button type="button" class="btn btn-primary">
                 I've changed my mind
              </button></a>
            </center>
            <br>
            <br>

        </div>

        <div id="subReason">

            <br>
            <h5>Could you provide more insight.</h5>
            <div id="subReasonOptions"></div>

            <br>
              <button onclick="$('.slick-slider').slick('slickPrev')" type="button" class="btn btn-secondary" style="float:left;">
                 <i class='bx bx-chevron-left'></i> Go Back
              </button>

              <button type="submit" class="btn btn-danger" style="float:right;">
                 Cancel Subscription
              </button>

              <div class="clearfix"></div>
        </div>

        </div>

    </div>

    </div>

</div>

</form>


    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <script>

  $('.slick-slider').slick({
    dots: false,
    prevArrow: false,
    nextArrow: false
  });

        const reasons = document.querySelectorAll('input[name="reason"]');
        const subReason = document.getElementById('subReason');
        const subReasonOptions = document.getElementById('subReasonOptions');

        // Define the sub-reasons for each initial reason
        const subReasons = {
            "Content dissatisfaction": [
                "The content is not relevant to me",
                "Content quality not up to expectations",
                "Not finding valuable content"
            ],
            "Financial reasons": [
                "The site is reasonably priced, I just can’t afford it right now",
                "The site is unreasonably priced for what it offers"
            ],
            "I am not using the service": [
                "I don’t have a need for it anymore",
                "I found an alternative solution",
                "This service does not meet my needs",
                "Change in personal or professional circumstances",
                "Achieved desired outcomes"
            ],
            "Technical issues": [
                "Slow performance",
                "Frequent glitches or errors",
                "Compatibility errors",
                "Difficulty navigating the platform"
            ],
            "Privacy and Security Concerns": [
                "Worries about data privacy",
                "Security concerns related to the service"
            ],
            "Customer service": [
                "Unresolved issues with customer support",
                "Dissatisfaction with support quality"
            ],
            "Temporary cancellation": [
              "I'm coming back"
              ]
        };

        // Function to update the sub-reason options based on the selected reason
function updateSubReasonOptions(selectedReason) {
    subReasonOptions.innerHTML = '';
    subReason.style.display = 'block';
    if (selectedReason in subReasons) {
        subReasons[selectedReason].forEach(sub => {
            const label = document.createElement('label');
            label.style.width = '100%';

            const div = document.createElement('div');
            div.classList.add('option');

            const radio = document.createElement('input');
            radio.id = `option-${sub}-input`;
            radio.type = 'radio';
            radio.name = 'subreason';
            radio.value = sub;

            const span = document.createElement('span');
            span.id = `option-${sub}`;
            span.textContent = sub;

            div.appendChild(radio);
            div.appendChild(span);
            label.appendChild(div);
            subReasonOptions.appendChild(label);
        });
    } else {
        subReason.style.display = 'none';
    }
}


        // Event listener for radio button changes
        reasons.forEach(reason => {
            reason.addEventListener('change', () => {
                updateSubReasonOptions(reason.value);
                $('.slick-slider').slick('slickNext');
            });
        });
    </script>






  <div class="clearfix"></div>

</div>



<?php require "footer.php";?>