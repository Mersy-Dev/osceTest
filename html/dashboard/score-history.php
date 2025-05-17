<?php

use Stripe\Terminal\Location;

	require_once "../inc/conn.php";
	logged_in(true);




$page_title = "My Scores";
$nav = "My Scores";
$email = $_SESSION['email'];

if(get('del')){
	$id = softSan(get('del'));
  mysqli_query($conn, "UPDATE saved_scores SET hidden=1 WHERE id='$id' AND email='$email'");
  header("Location: score-history");
  exit();
}

$scores_sql = mysqli_query($conn, "SELECT * FROM saved_scores WHERE email='$email' AND hidden=0");
$score_sum = 0;
$total_score_sum = 0;
$tag = array();




require_once "header.php"; ?>


<div class="content content-dark">

<?php

if ($scores_sql->num_rows == 0) {
?>
<br>
<br>

<h5 style="padding-left: 20px;">You haven't saved any scenario scores yet!</h5>
<br>

<?php
  }else{
?>
  <br>
  <br>

  <h5 style="padding-left: 20px;">Score History</h5>
  <br>


<?php
    while ($x = mysqli_fetch_assoc($scores_sql)) {
      $scores[] = $x;
      $score_sum += $x['score'];
      $total_score_sum += $x['total_score'];
      
      // check for Ear, nose and throat in $x['tags'] before exploding with ,
      if (strpos($x['tags'], 'Ear, nose and throat') !== false) {
        $x['tags'] = str_replace('Ear, nose and throat', 'Ear nose and throat', $x['tags']);
      }


      $tags = explode(",", $x['tags']);
      foreach ($tags as $t) {
        // check if tag exists
        if (!isset($tag[$t])) {
          $tag[$t] = array('score'=>0, 'total_score'=>0, 'name'=>$t);
        }
        $tag[$t]['score'] = $tag[$t]['score'] + $x['score'];
        $tag[$t]['total_score'] = $tag[$t]['total_score'] + $x['total_score']; 
      }
    }

    // average in %
    $average_score = round($score_sum/$total_score_sum*100, 2);

    // get count distinct resource_id
    $scenario_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(DISTINCT resource_id) as count FROM saved_scores WHERE email='$email' AND hidden=0"))['count'];


    // get count of last week
    $last_week = time()-604800;
    $last_week_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(DISTINCT resource_id) as count FROM saved_scores WHERE email='$email' AND hidden=0 AND time_added>$last_week"))['count'];

    ?>

  <div class="row">

    <div class="col-md">

      <div style="background:#31afb4;color: #fff;" class="payment-card">
          <small>Number of Scenarios Practised</small>
          <h1 style="font-weight:bolder;margin-bottom:0px;margin-top: 5px"><?php echo $scenario_count; ?></h1>
          <small style="margin-top:0px">
            <?php echo $last_week_count; ?> in the last week
            </small>
        <div class="clearfix"></div>
      </div>
    </div>


    <div class="col-md">
      <div class="payment-card">

        <div class="payment-card-left">
          <small>Average Scenario Score</small>
          <h1 style="font-weight:bolder;margin-bottom:0px;margin-top: 5px"><?php echo number_format($average_score, 1); ?>%</h1>
          <!-- <small> </small> -->
        </div>

        <div class="payment-card-right">
          <div class="pie" style="--p:<?php echo number_format($average_score); ?>;--c:#EF798A;--b:10px"> 
            <!-- <?php echo $score_sum.'/'.$total_score_sum; ?> -->
          </div>
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
        }
        </style>

        <div class="clearfix"></div>
      </div>
    </div>


    
    <div class="col-md">

      <div class="payment-card">
          <small> </small>
          <h1 style="font-weight:bolder;margin-bottom:0px;margin-top: 5px"> </h1>
            <small> </small>
        <div class="clearfix"></div>
      </div>
    </div>



  </div>

  <div class="clearfix"></div>

  <br>
  <br>

  <h5>Categories</h5>
  
  <div class="row content">
    <?php
    foreach ($tag as $t => $v) {
      $average_score = round($v['score']/$v['total_score']*100, 2);
      ?>
		  <div style="padding: 20px;" id="exam_date">
        <small><?php echo $v['name']; ?></small>
		    <br>
		    <span style="font-size: 40px;font-weight: bolder;"><span id='myCounter'>
          <?php echo number_format($v['score']*100/$v['total_score'], 1);?>%
        </span></span> 
		    <div class="progress">
          <div class="progress-bar" role="progressbar" style="width: <?php echo number_format($v['score']/$v['total_score']*100); ?>%; background:#5d576b"  aria-valuemin="0" aria-valuemax="100"></div>
		    </div>
        
		  </div>
      <?php } ?>
      
      
      
      <div class="clearfix"></div>
      
      
      
      <!-- table showing list -->
      <br>
      <br>
      <br>
      <br>
      <h5>History</h5>
      
  <div class="tbl1">

    <div class="head rw1">
      <div class="itm1 itm1-sm">#</div>
      <div class="itm1 itm1-file">Scenario</div>
      <div class="itm1">Time</div>
      <div class="itm1">Score</div>
      <!-- <div class="itm1 itm1-sm"> </div> -->
      <div class="itm1">Action</div>
      
    </div>

    <?php
    $i = 1;
    foreach ($scores as $s) {
      ?>
      <div class="rw1">
        <div class="itm1 itm1-sm"><?php echo $i; ?></div>
        <div class="itm1 itm1-file">
          <a target="blank" href="../resource?id=<?php echo $s['resource_id'];?>"><?php 
            // get name from uploads table
            $resource = mysqli_fetch_assoc(mysqli_query($conn, "SELECT title FROM uploads WHERE id=".$s['resource_id']));
            echo trim($resource['title']);
            ?></a>
        </div>
        <div class="itm1"><?php echo time_elapsed_string($s['time_added']); ?> ago</div>
        <div class="itm1"><?php echo number_format($s['score']*100/$s['total_score']); ?>%</div>
        <!-- <div class="itm1 itm1-sm"></div> -->
        <div class="itm1 itm1-sm"><a onclick="return confirm('Are you sure you want to delete this?')" href="?del=<?php echo $s['id'];?>"><i class='bx bx-trash'></i></a></div>
      </div>
      <?php
      $i++;
    }

    ?>


  </div>

  <div class="clearfix"></div>

  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>


  <?php } ?>


</div>

<?php require "footer.php";?>