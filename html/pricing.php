<?php

  require "header.php";

?>

<style type="text/css">
  .main-search-btn{
    padding: 7px;
/*    min-width: 20px;*/
    font-size: 15px !important;
    margin-bottom: 20px;
  }

  .card{
    color: #000;
    padding-left: 10px;
    padding-right: 10px;
    text-align: center;
  }
</style>

    <link rel="stylesheet" type="text/css" href="/css/result-light.css">

      <!-- <link rel="stylesheet" type="text/css" href="//stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"> -->
      <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">



<body>

<!-- Modal -->
<div id="myModal" class="modal" style="display: bloc;background: rgb(0,0,0,0.1);"  onclick="$('#myModal').hide()">
  <div class="modal-dialog" style="max-width: 500px;">
    <div class="modal-content" style="border-radius:20px;background:#31afb4;color:#fff;padding:30px">
    
      <!-- Modal Header -->
      <!-- <div class="modal-header"> -->
        <!-- <button type="button" class="close" data-dismiss="modal" onclick="$('#myModal').hide()">&times;</button> -->
      <!-- </div> -->
      
      <!-- Modal body -->
      <div class="modal-body" style="text-align:center">

        <h4 class="modal-title">🌟 <br>
        RESIT COVER</h4>
        <br>
        
        <p> OSCE Toolbox has got your back, even if things don't go as planned on exam day.
          <br>
          Our resit cover means that if you need to resit your OSCEs we will either extend your access for an extra 30 days free of charge or reactivate your subscription for 30 days, provided it was ended within the last 3 months. 
          <br>
          <br>
          Full information can be found in our <a href="terms#resit" style="text-decoration: underline;">T&Cs</a></p>
      </div>
      
    </div>
  </div>
</div>



<div class="pricing-blue">

  <br>

  <div class="title">Pricing Plans</div>
  <br>
  <br>
  <br>
  <br>

  <div class="container-fluid" style="">
    <div style="max-width: 1200px;width:80%;margin:auto">
      <div class="row" style="background">
        
        <div class="col-lg-4 col-md-12 mb-4">

          <div class="card h-100" style="border-radius: 20px">
          <!-- <img src="assets/img/coffee-cup.png" style="position: absolute;width: 50px;right:50px;top: 180px;"> -->
            <div class="card-body">
              <div class="text-center p-3">
                <h5 class="card-title">Monthly</h5>
                <small>Billed every month</small>
                <br><br>
                <div class="dark-glow"><span class="h2"><b>14.99</b></span>/month</div>
                <br>
                <br>
              </div>
              <p class="card-text">The price of <b>5</b> cups of coffee a month for exam success!</p>
            </div>

            <div class="card-body text-center">
              <a href="subscription/process?p=1"><button class="main-search-btn">Select Plan</button></a>
            </div>

            <center>
                <img src="assets/img/no-resit.png" width="100px">
            </center>
            <br>
            
          </div>

        </div>

        <div style="z-index: 2;transform: scale(1.2);" class="col-lg-4 col-md-12 mb-4">
          <div class="card h-100 shadow-lg" style="border-radius: 20px">
            <img src="assets/img/most-popular.png" style="position: absolute;width: 80px;right:20px;top: -5.6px;">
            <!-- <img src="assets/img/coffee-cup.png" style="position: absolute;width: 50px;right:50px;top: 200px;"> -->
            <div class="card-body">
              <div class="text-center p-3">
                <h5 class="card-title" style="color:#EF798A;font-weight: bolder;">Termly</h5>
                <small>Every 3 months</small>
                <br><br>
                <div class="dark-glow"><span class="h2"><b>12.66</b></span>/month</div> 
                <br><br>
              </div>
              <p class="card-text">Billed as <b>£37.98</b> every 3 months <br> The price of <b>4</b> cups of coffee a month for exam success!</p>
            </div>

            <div class="card-body text-center">
              <a href="subscription/process?p=2"><button class="main-search-btn">Select Plan</button></a>
            </div>
            <center>
                <img onclick="showModal()" style="cursor:pointer" src="assets/img/resit.png" width="100px">
            </center>
            <br>
          </div>
        </div>


        <div class="col-lg-4 col-md-12 mb-4">
          <div class="card h-100 " style="border-radius: 20px">
          <!--  <img src="assets/img/coffee-cup.png" style="position: absolute;width: 50px;right:50px;top: 200px;"> -->
            <div class="card-body">
              <div class="text-center p-3">
                <h5 class="card-title">Annually</h5>
                <small>Every 12 months</small>
                <br><br>
                <div class="dark-glow"><span class="h2"><b>8.33</b></span>/month</div>
                <br><br>
              </div>
              <p class="card-text">
              Billed as <b>£99.96</b> every 12 months <br> The price of <b>3</b> cups of coffee a month for exam success!</p>
            </div>

            <div class="card-body text-center">
              <a href="subscription/process?p=3"><button class="main-search-btn">Select Plan</button></a>
            </div>
            <center>
                <img onclick="showModal()" style="cursor:pointer" src="assets/img/resit.png" width="100px">
            </center>
            <br>
          </div>
        </div>
      </div>    
    </div>

  <br>
  <br>
  <div style="width:90%;max-width:1000px;margin:auto">
  <div class="title">Here's what you get</div>
  <br>
  <br>

<style type="text/css">
  .feature-icon{
    font-size: 80px;
/*    text-shadow: 0px 0px #EF798A;*/
  }

  .features-div div:hover{
    color: #000;
    transition: 0.3s;
  }
</style>

  <div class="row features-div" style="text-align:center;color: #00;">

    <div class="col-lg-2 col-md-4 col-6">
      <div class="feature-icon"><i class='bx bx-sun'></i></div>
      Access to all scenarios, info capsules, videos
    </div>

    <div class="col-lg-2 col-md-4 col-6">
      <!-- <div class="feature-icon"><i class="icofont-glass"></i></div> -->
      <div class="feature-icon"><i class='bx bxs-wine'></i></div>
      Access to the VIP area and specialist channels of the Discord server
    </div>
    

    <div class="col-lg-2 col-md-4 col-6">
      <div class="feature-icon"><i class='bx bxl-discord'></i></div>
      Free access to all Discord events and practice sessions
    </div>

    <div class="col-lg-2 col-md-4 col-6">
      <div class="feature-icon"><i class='bx bx-slider'></i></div>
      Personalised progress tracker (coming soon)
    </div>

    <div class="col-lg-2 col-md-4 col-6">
      <div class="feature-icon"><i class='bx bxs-message-dots' ></i></div>
      Share your comments 
    </div>

    <div class="col-lg-2 col-md-4 col-6">
      <div class="feature-icon"><i class='bx bx-check'></i></div>
      Interactive mark schemes on all scenarios, reviewed by a qualified pharmacist
    </div>

  </div>


  <br>
  </div>



</div>




<section class="pt-5 pb-5">
  <div class="container">
        <div class="col-12">
            <div class="title">What people are saying</div>
            <br>
            <br>
        </div>
    <div class="row" style="width:90%;">
        <!-- <div class="col-12"> -->
            <!-- <div class="card-columns"> -->

                <div class="card col-lg-4 col-sm-12" style="padding:20px;">
                    <div class="card-body">
                        <blockquote class=" ">

                            <i class="fa fa-quote-right fa-2x text-muted pull-right mt-3 mb-3" aria-hidden="true"></i>
                            <p class=" m-0 text-muted ">
                                OSCE toolbox is a great and <b>interactive</b> way to practice and <b>improve</b> consultation skills, equipping you with scenarios and mark schemes. It gives pharmacy students the <b>support</b> needed to achieve the <b>confidence</b> they need to answer patient questions about medications promptly - providing safe pharmacological advice
                            </p>
                            <br>
                            <footer class="blockquote-footer small p-1">
                                <span class="small">Glaysa Gealon
                                  <br>
                          <cite class="font-weight-bold">Second Year Pharmacy Student at Cardiff</cite>
                        </span>
                            </footer>

                        </blockquote>
                    </div>
                </div>

                <div class="card col-lg-4 col-sm-12" style="padding:20px;">
                    <div class="card-body">
                        <blockquote class=" ">

                            <i class="fa fa-quote-right fa-2x text-muted pull-right mt-3 mb-3" aria-hidden="true"></i>
                            <p class=" m-0 text-muted ">
                                As a final year student, I have seen a large <b>gap</b> in the resources available for pharmacy OSCEs as compared to medic OSCEs. It has always been a struggle to study for them and I’m glad that pharmacy students in the future would be able to benefit from OSCE Toolbox as I would have during my degree
                            </p>
                            <br>
                            <footer class="blockquote-footer small p-1">
                                <span class="small">@Pharmacister
                                  <br>
                          <cite class="font-weight-bold"></cite>
                        </span>
                            </footer>

                        </blockquote>
                    </div>
                </div>

                <div class="card col-lg-4 col-sm-12" style="padding:20px;">
                    <div class="card-body">
                        <blockquote class=" ">

                            <i class="fa fa-quote-right fa-2x text-muted pull-right mt-3 mb-3" aria-hidden="true"></i>
                            <p class=" m-0 text-muted ">
                                OSCE Toolbox builds students' <b>confidence</b> in asking the right questions. The scenarios <b>challenge</b> them to think <b>outside the box</b> and allow them to demonstrate a <b>depth of knowledge</b>. It allows students to practice, practice, practice, and <b>practice makes perfect</b>!
                            </p>
                            <br>
                            <footer class="blockquote-footer small p-1">
                                <span class="small">Edna Adomako
                                  <br>
                          <cite class="font-weight-bold">Second Year Pharmacy Student at Greenwich</cite>
                        </span>
                            </footer>

                        </blockquote>
                    </div>
                </div>

    </div>
</div>
</section>


</div>

<style>
  
@media only screen and (max-width: 900px) {
.card{
  width: 105%;
}
}
</style>

<?php 

require "footer.php"; 

?>


<script>
  function showModal(){
    $('#myModal').show()
  }
</script>