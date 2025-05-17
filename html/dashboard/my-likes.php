<?php 


	require_once "../inc/conn.php";
	logged_in(true);


$page_title = "My Likes";
$nav = "Dashboard";
$email = $_SESSION['email'];

if(get('del')){
	$id = softSan(get('del'));
	mysqli_query($conn, "UPDATE uploads SET hidden=1 WHERE user_id='$email' AND id='$id'");

}
require_once "header.php"; ?>


<div class="content content-dark">


  <br>
  <br>

  <h5 style="padding-left: 20px;">My Likes</h5>
    
<?php
    $email = $_SESSION['email'];
    $sql = "SELECT * from uploads WHERE hidden=0 AND likers LIKE '%$email%'";

    // print_r($_POST);
    // echo $sql;


    $query = mysqli_query($conn, $sql);
    $res = mysqli_fetch_all ($query, MYSQLI_ASSOC);

    if (!empty($res)) {

    foreach ($res as $r) {
      ?>
          
        <div class="file">
        <a href="../resource?id=<?php echo $r['id'];?>">
          <div class="file-icon">
            <?php if (!$r['free']): ?>
            <i class="icofont-ui-lock"></i>
            <?php endif ?>
          </div>
          <div class="file-header"><?php echo time_elapsed_string($r['time_added']);?> ago</div>
          <div style="display: flex;">

          <?php if ($r['category']=='cheatsheet'){ ?>
          <div class="file-type"><i class="icofont-notebook"></i></div>
              
            <?php }elseif ($r['category']=='scenario') {?>
          <div class="file-type"><i class="icofont-hill"></i></div>

            <?php }elseif ($r['category']=='video') {?>
          <div class="file-type"><i class="icofont-ui-video-chat"></i></div>
          <?php } ?>  
            <div class="file-content">
              <div class="file-title"><?php echo $r['title'];?></div>
              <div class="file-text"><?php echo $r['author'];?></div>
            </div>
          </div>
        </a>
        </div>

      <?php
      }
    }
?>

  <div class="clearfix"></div>

</div>

<?php require "footer.php";?>