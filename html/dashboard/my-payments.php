<?php 

$page_title = "My Payments";
// $nav = "Dashboard";

require_once "header.php"; ?>

	


<br>
<br>
<br>
<div class="content" style="max-width:1000px">


<?php 
$email = $_SESSION['email'];
$time= time();
    $query = mysqli_query($conn, "SELECT * FROM user_payments WHERE email='$email' and period_end_timestamp>$time LIMIT 0,1");
    // $query = mysqli_query($conn, "SELECT * FROM payment_history WHERE email='$email' LIMIT 0,1");
    if ($query->num_rows > 0) {
      $plan = mysqli_fetch_assoc($query);
         ?>
  <div class="renew-box">
    <div class="renew-box-left">
      <div><b>Auto Renew</b></div>
      <?php if ($plan['status']=='active'){ ?>
      <div>Your subscription will renew on <?php echo date('F d, Y.', $plan['period_end_timestamp']); ?></div>
      <?php }elseif($plan['status']=='paused'){ ?>
      <div>Auto renewal is turned off</div>
      <?php } ?>
    </div>   
    <div class="renew-box-right">
      <a href="<?php echo $plan['status']=='active'?'confirm-pause':'../subscription/resume-subscription'; ?>">
        <label class="switch">
          <span class="slider round <?php echo $plan['status']=='active'?'checked':''; ?>"></span>
        </label>
      </a>
    </div>

    <div class="clear"></div>
  </div>

<!--   <div style="float:right;color: red;font-size: 12px;">Cancel Subscription</div>

  <br>
  <br> -->

  <div class="row">

    <div class="col-md">

      <div style="background:#31afb4;color: #fff;" class="payment-card">
          <small>Subscription Plan</small>
          <h1 style="font-weight:bolder;margin-bottom:0px;margin-top: 5px">£<?php echo $plan['amount']; ?></h1>
          <small style="margin-top:0px">
            <?php 
            $days = $duration = "";
            if ($plan['amount']=='14.99') {
              echo '£14.99 / month';
              $days = 30;
              $duration = '1 month';
            }else if($plan['amount'] == '37.98'){
              echo '£12.66 / month';
              $days = 90;
              $duration = '3 months';
            }else if($plan['amount'] == '£99.96'){
              echo '£8.33 / month';
              $duration = '12 months';
              $days = 365;
            }

            ?>
            </small>
        <div class="clearfix"></div>
      </div>
    </div>

    <div class="col-md">

      <div class="payment-card">
          <small>Duration</small>
          <h1 style="font-weight:bolder;margin-bottom:0px;margin-top: 5px"><?php echo $duration; ?></h1>
            <small>
              <?php 
              echo $days;
            ?> days
            </small>
        <div class="clearfix"></div>
      </div>
    </div>

    <div class="col-md">
      <div class="payment-card">

        <div class="payment-card-left">
          <small>Days Left</small>
          <h1 style="font-weight:bolder;margin-bottom:0px;margin-top: 5px"><?php echo $remaining = number_format(($plan['period_end_timestamp']-$time)/86400)-1; ?></h1>
          <small><?php echo date('d F, Y', $plan['period_end_timestamp']); ?></small>
        </div>

        <div class="payment-card-right">
          <div class="pie" style="--p:<?php echo number_format($remaining/$days*100); ?>;--c:#EF798A;--b:10px"> <?php echo $remaining.'/'.$days; ?></div>
        </div>

        <style type="text/css">
          @property --p{
          syntax: '<number>';
          inherits: true;
          initial-value: 0;
        }

        .pie {
          --p:20;
          --b:22px;
          --c:darkred;
          --w:100px;
          
          width:var(--w);
          aspect-ratio:1;
          position:relative;
          display:inline-grid;
/*          margin:5px;*/
          place-content:center;
/*          font-size:25px;*/
          font-weight:bold;
          font-family:sans-serif;
        }
        .pie:before,
        .pie:after {
          content:"";
          position:absolute;
          border-radius:50%;
        }
        .pie:before {
          inset:0;
          background:
            radial-gradient(farthest-side,var(--c) 98%,#0000) top/var(--b) var(--b) no-repeat,
            conic-gradient(var(--c) calc(var(--p)*1%),#0000 0);
          -webkit-mask:radial-gradient(farthest-side,#0000 calc(99% - var(--b)),#000 calc(100% - var(--b)));
                  mask:radial-gradient(farthest-side,#0000 calc(99% - var(--b)),#000 calc(100% - var(--b)));
        }
        .pie:after {
          inset:calc(50% - var(--b)/2);
          background:var(--c);
          transform:rotate(calc(var(--p)*3.6deg)) translateY(calc(50% - var(--w)/2));
        }
        .animate {
          animation:p 1s .5s both;
        }
        .no-round:before {
          background-size:0 0,auto;
        }
        .no-round:after {
          content:none;
        }
        @keyframes p {
          from{--p:0}
        }
        </style>

        <div class="clearfix"></div>
      </div>
    </div>



  </div>
  <div class="clearfix"></div>


  <br>
  <br>


  <div class="renew-box" style="background:rgb(0, 0, 0, 0.4);color: #fff;">
    <div class="renew-box-left">
      <div><b>Card Details</b></div>
      
      <a href="../subscription/edit-subscription" style="font-size:12px;">Change Billing Information <i class='bx bxs-edit'></i></a>
    </div>  
    <div class="renew-box-right">
      XXXX.XXXX.XXXX.XXXX
    </div>  

    <div class="clear"></div>
  </div>


  <br>

  <h5 style="padding-left: 0px;">My Payment History</h5>
  
  <br>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Plan Details</th>
        <th scope="col">Start</th>
        <th scope="col">End</th>
        <th scope="col">Status</th>
      </tr>
    </thead>
    <tbody>

    <?php

        $email = $_SESSION['email'];
        $sql = "SELECT * from user_payments WHERE email='$email' ORDER BY id DESC";

        $query = mysqli_query($conn, $sql);
        $res = mysqli_fetch_all ($query, MYSQLI_ASSOC);

        if (!empty($res)) {

        foreach ($res as $r) {
          ?>
              
          <tr>
            <th scope="row">£<?php echo $r['amount'].' - '.$r['interval_count'].' '.$r['plan_interval']; ?></th>
            <td><?php echo $r['period_start']; ?></td>
            <td><?php echo $r['period_end']; ?></td>
            <td><?php echo $r['status']; ?></td>
          </tr>

          <?php
          }
        }
    ?>
    </tbody>
  </table>

<?php }else{ ?>

  <center>
    You don't seem to have a plan yet.
  <br>
  <br>
  <a href="../pricing"><button class="btn btn-primary">Check out our awesome pricing</button></a>
  </center>

  <?php
} ?>

  <div class="clearfix"></div>

  <br>
  <br>

</div>



<?php require "footer.php";?>