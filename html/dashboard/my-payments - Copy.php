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
    // $query = mysqli_query($conn, "SELECT * FROM user_payments WHERE email='$email' and period_end_timestamp>$time LIMIT 0,1");
    $query = mysqli_query($conn, "SELECT * FROM payment_history WHERE email='$email' LIMIT 0,1");
    if ($query->num_rows > 0) {
      $plan = mysqli_fetch_assoc($query);
         ?>
  <div class="row">

    <div class="col-md">

      <div style="background:#31afb4;color: #fff;" class="payment-card">
          <small>Subscription Plan</small>
          <h1 style="font-weight:bolder;margin-bottom:0px;margin-top: 5px">£<?php echo $amount = trim(explode('-', $plan['plan'])[0]); ?></h1>
          <small style="margin-top:0px">
            <?php 
            if ($amount=='12.99') {
              echo '£12.99 / month';
            }else if($amount == '29.97'){
              echo '£9.99 / month';
            }else if($amount == '£83.88'){
              echo '£6.99 / month';
            }

            ?>
            </small>
        <div class="clearfix"></div>
      </div>
    </div>

    <div class="col-md">

      <div class="payment-card">
          <small>Duration</small>
          <h1 style="font-weight:bolder;margin-bottom:0px;margin-top: 5px"><?php echo $duration = trim(explode('-', $plan['plan'])[1]); ?></h1>
            <small>
              <?php 
            if ($duration =='1 month') {
              echo $days = 30;
            }else if($amount == '3 months'){
              echo $days = 90;
            }else if($amount == '1 year'){
              echo $days = 365;
            }
            ?> days
            </small>
        <div class="clearfix"></div>
      </div>
    </div>

    <div class="col-md">
      <div class="payment-card">

        <div class="payment-card-left">
          <small>Days Left</small>
          <h1 style="font-weight:bolder;margin-bottom:0px;margin-top: 5px"><?php echo $remaining = number_format(($plan['time_expiry']-$time)/86400); ?></h1>
          <small><?php echo date('d F, Y', $plan['time_expiry']); ?></small>
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
<?php } ?>
  <div class="clearfix"></div>


  <br>
  <br>

  <h5 style="padding-left: 0px;">My Payment History</h5>
  
  <br>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Plan Details</th>
        <th scope="col">Time Paid</th>
        <th scope="col">Expiry</th>
        <th scope="col">Payment Agent</th>
      </tr>
    </thead>
    <tbody>

    <?php

        $email = $_SESSION['email'];
        $sql = "SELECT * from payment_history WHERE email='$email'";

        $query = mysqli_query($conn, $sql);
        $res = mysqli_fetch_all ($query, MYSQLI_ASSOC);

        if (!empty($res)) {

        foreach ($res as $r) {
          ?>
              
          <tr>
            <th scope="row">£<?php echo $r['plan']; ?></th>
            <td><?php echo date('H:i d F, Y', $r['time_paid']); ?></td>
            <td><?php echo date('d F, Y', $r['time_expiry']); ?></td>
            <td>Stripe</td>
          </tr>

          <?php
          }
        }
    ?>
    </tbody>
  </table>

  <div class="clearfix"></div>

  <br>
  <br>




</div>



<?php require "footer.php";?>