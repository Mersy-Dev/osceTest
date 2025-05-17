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
	mysqli_query($conn, "UPDATE articles SET hidden=1 WHERE id='$id'");

}




?>


<div class="content content-dark">


		<br>
		<br>
		<div style=""><b>Articles</b></div>

		<br>
		<a href="../articles/content-writer">
		<button type="button" class="btn btn-primary">
		   Add an Article
		</button>
		</a>


<div class="clear"></div>
<br>
<br>

<!-- filetype tittle, category, date, price, edit, delete -->

<div class="tbl1">

	<div class="head rw1">
		<div class="itm1 itm1-file">Title</div>
		<div class="itm1">Author</div>
		<div class="itm1">Time Uploaded</div>
		<div class="itm1 itm1-sm">Views</div>
		<div class="itm1 itm1-sm">Actions</div>
		
	</div>

<?php 
	$sql = "SELECT * FROM articles WHERE hidden=0"; 
	$query = mysqli_query($conn, $sql);

	$res = mysqli_fetch_all ($query, MYSQLI_ASSOC);
	$res = array_reverse($res);

	foreach ($res as $r) {
?>
	<div class="rw1">
		<div class="itm1 itm1-file" style="color: #31AFB4;">
			<a target="_blank" href="<?php echo $url;?>articles/<?php echo $r['slug'];?>">
			<?php echo $r['title']; ?>
			</a>
		</div>
		<div class="itm1"><?php echo $r['author']; ?></div>
		<div class="itm1"><?php echo $r['time_added']; ?></div>
		<div class="itm1 itm1-sm">0</div>
		<div class="itm1 itm1-sm">
		<a target="_blank" href="../articles/content-writer?edit=<?php echo $r['id'];?>">Edit</a>
			&nbsp; 
			<a href="?del=<?php echo $r['id'];?>">Delete</a></div>
	</div>

<?php } ?>

</div>

</div>

<?php require "footer.php";?>