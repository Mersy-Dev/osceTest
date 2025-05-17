<?php 

$page_title = "Videos";
$nav = "Dashboard";

require_once "header.php"; ?>


<div class="content">


	<div class="header" style="background: url(assets/img/banner-video.jpg) center no-repeat;background-size: cover;">Videos</div>

	<br>

		
	<div class="video-container">		

	<?php

	$query = mysqli_query($conn, "SELECT * FROM uploads WHERE category='video'");
	$videos = mysqli_fetch_all ($query, MYSQLI_ASSOC);

	foreach ($videos as $v) {
	?>
	<div class="video-div">
		<a href="video?id=<?php echo $v['id'];?>">
		<div class="video-img"></div>
		<div class="video-txt"><?php echo $v['title'];?></div>
		</a>
	</div>
	<?php }?>

	</div>
			


	</div>


<br>
<br>
<br>
<br>
<br>

</div>
<!-- end content -->


<?php require "footer.php";?>