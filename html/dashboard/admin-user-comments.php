<?php 


	require_once "../inc/conn.php";
	logged_in(true);


$page_title = "User Comments";
$nav = "Dashboard";
$email = $_SESSION['email'];

require_once "header.php"; 

if(!isset($is_admin) or $is_admin==false){
	header("Location: index");
	exit();
}

if(get('del')){
	$id = softSan(get('del'));
	mysqli_query($conn, "UPDATE upload_comments SET hidden=1 WHERE id='$id'");
}


?>


<div class="content">



<div class="clear"></div>
<br>
<br>

<!-- filetype tittle, category, date, price, edit, delete -->

<div class="tbl1">

	<div class="head rw1">
		<div class="itm1 itm1-file">Comment</div>
		<div class="itm1">Name</div>
		<div class="itm1">Time Added</div>
		<div class="itm1">Email</div>
		<div class="itm1 itm1-sm">Delete</div>
		
	</div>

<?php 
	$sql = "SELECT * FROM upload_comments WHERE hidden=0"; 
	$query = mysqli_query($conn, $sql);

	$res = mysqli_fetch_all ($query, MYSQLI_ASSOC);
	$res = array_reverse($res);

	foreach ($res as $r) {
?>
	<div class="rw1">
		<div class="itm1 itm1-file" style="color: #31AFB4;">
			<a target="_blank" href="../resource?id=<?php echo $r['upload_id'];?>">
			<?php echo $r['comment_text']; ?>
			</a>
		</div>
		<div class="itm1"><?php echo $r['comment_name']; ?></div>
		<div class="itm1"><?php echo date("j F H:i", $r['time_added']); ?></div>
		<div class="itm1" style="text-wrap:wrap"><?php echo $r['email']; ?></div>
		<div class="itm1 itm1-sm"><a href="?del=<?php echo $r['id'];?>">Delete</a></div>
	</div>

<?php } ?>

</div>

</div>

<?php require "footer.php";?>