<?php 


	require_once "../inc/conn.php";
	logged_in(true);


$page_title = "My Resources";
$nav = "Dashboard";
$email = $_SESSION['email'];

require_once "header.php"; 


if(!isset($is_admin) or $is_admin==false){
	header("Location: index");
	exit();
}

if(get('del')){
	$id = softSan(get('del'));
	// mysqli_query($conn, "UPDATE uploads SET hidden=1 WHERE user_id='$email' AND id='$id'");
	mysqli_query($conn, "UPDATE uploads SET hidden=1 WHERE id='$id'");

}




?>


<div class="content content-dark">


		<br>
		<br>
		<div style=""><b>Add a Resource</b></div>

		<br>
		<a href="add-scenario">
		<button type="button" class="btn btn-primary">
		   <i class='bx bx-male-female'></i> Add a Scenario
		</button>
		</a>

		<a href="add-cheatsheet">
		<button type="button" class="btn btn-primary">
		   <i class='bx bxs-copy-alt' ></i> Add a Cheat Sheet
		</button>
		</a>

		<a href="add-video">
		<button type="button" class="btn btn-primary">
		   <i class='bx bxs-tv' ></i> Add a Video
		</button>
		</a>


<div class="clear"></div>
<br>
<br>

<!-- filetype tittle, category, date, price, edit, delete -->

<?php
$sql = "SELECT * FROM uploads WHERE hidden=0";
	


?>
<div class="tbl1">

	<div class="head rw1">
		<div class="itm1 itm1-file">File</div>
		<div class="itm1">Category</div>
		<div class="itm1">Time Uploaded</div>

		<?php	if(get('sortBy')=='likes'){
		$sql = "SELECT * FROM uploads WHERE hidden=0 ORDER BY likes+0 ASC";
		?>
		<div class="itm1 itm1-sm"><a href="?sortBy=none">Likes <i style="font-size: 12px;" class='bx bxs-down-arrow'></i></a></div>
		<?php }else{
			?>
		<div class="itm1 itm1-sm"><a href="?sortBy=likes" style="color:#31AFB4">Likes <i style="font-size: 12px;" class='bx bxs-up-arrow'></i></a></div>
		<?php } ?>
		
		<?php if(get('sortBy')=='review_date'){
		$sql = "SELECT * FROM uploads WHERE hidden=0 ORDER BY STR_TO_DATE(date_of_review, '%d/%m/%y') DESC";
		?>
		<div class="itm1 itm1-sm"><a href="?sortBy=none">Review Date <i style="font-size: 12px;" class='bx bxs-down-arrow'></i></a></div>
		<?php }else{
			?>
		<div class="itm1 itm1-sm"><a href="?sortBy=review_date" style="color:#31AFB4">Review Date <i style="font-size: 12px;" class='bx bxs-up-arrow'></i></a></div>
		<?php } ?>

		<div class="itm1 itm1-sm">Actions</div>
		
	</div>

<?php 

	
	$query = mysqli_query($conn, $sql);

	$res = mysqli_fetch_all ($query, MYSQLI_ASSOC);
	$res = array_reverse($res);

	foreach ($res as $r) {
?>
	<div class="rw1">
		<div class="itm1 itm1-file" style="color: #31AFB4;">
			<a href="../resource?id=<?php echo $r['id'];?>">
			<?php echo $r['file_type'] ? "<i class='bx bxs-file-image'></i>" : "<i class='bx bxs-file'></i>";?>
			<?php echo $r['title']; ?>
			</a>
		</div>
		<div class="itm1"><?php echo $r['category']; ?></div>
		<div class="itm1"><?php echo $r['time_stamp']; ?></div>
		<div class="itm1 itm1-sm"><?php echo $r['likes'];?></div>
		<div class="itm1 itm1-sm"><?php echo $r['date_of_review'];?></div>
		<div class="itm1 itm1-sm">
			<?php if($r['category']=='scenario'){?> 
			<a href="add-scenario?edit=<?php echo $r['id'];?>">Edit</a>
			<?php } ?>
			<?php if($r['category']=='cheatsheet'){?> 
			<a href="add-cheatsheet?edit=<?php echo $r['id'];?>">Edit</a>
			<?php } ?>
			<?php if($r['category']=='video'){?> 
			<a href="add-video?edit=<?php echo $r['id'];?>">Edit</a>
			<?php } ?> &nbsp; 
			<a href="?del=<?php echo $r['id'];?>">Delete</a></div>
	</div>

<?php } ?>

</div>

</div>

<?php require "footer.php";?>