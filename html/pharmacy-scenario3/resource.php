<?php 

$page_title = "Resource";
	require_once "../inc/conn.php";
	// logged_in(true);
// $email=$_SESSION['email'];

if (get('id')) {
	$id = (int)filter_var(get('id'), FILTER_SANITIZE_NUMBER_INT);
	$query = mysqli_query($conn, "SELECT * FROM uploads2 WHERE id='$id'");
	$file = mysqli_fetch_assoc($query);

	if (!empty($file)) {
		switch ($file['category']) {
			case 'scenario':
				$page_title = "Scenarios";
				break;
			case 'videos':
				$page_title = "Videos";
				break;
			case 'cheat sheets':
				$page_title = "Cheat sheets";
				break;
			
			default:
				# code...
				break;
		}
	}

}


if ($file['free']!=="yes") {
	if (logged_in()) {
		if ($_SESSION['premium']==false) {
			header("Location: ../alerts/locked");
			exit();
		}
	}else{
		header("Location: ../login/");
		exit();
	}
}


if (get('id')==54) {
	header("Location:../special-resources/lifestyle-advice");
	exit();
}
if (get('id')==55) {
	header("Location:../special-resources/controlled-drug-prescription-1");
	exit();
}


if (post('toggle_fav')) {

	if (logged_in()) {

	$fav_id = $file['id'];


		$add_like = $remove_like = false;
		$likers = $file['likers'];
		$likers_array = explode(',', $likers);

		if(!empty($likers)){
			if(!in_array($_SESSION['email'], $likers_array)){
				$add_like = true;
			}else{
				$remove_like = true;
			}
		}else{
			$add_like = true;
		}

		if ($add_like) {
			$likers .= $_SESSION['email'].',';
			$likes = $file['likes']+1;
			if(mysqli_query($conn, "UPDATE uploads2 SET likes='$likes', likers='$likers' WHERE id='$fav_id'")){
				echo 'added';
			}
		}else if($remove_like){
			$new_likers = '';
			foreach($likers_array as $liker){
				if ($_SESSION['email']!==$liker and !empty($liker)) {
				$new_likers .= $liker.',';
				}
			}
			$likes = $file['likes']-1;
				if(mysqli_query($conn, "UPDATE uploads2 SET likes='$likes', likers='$new_likers' WHERE id='$fav_id'")){
					echo 'removed';
				}
			}
		}

	exit();	
}

if (post('save_score')) {

	if(!isset($_SESSION['save_score'])){
		$_SESSION['save_score'] = uniqid();
	}


	// score could be decimal
	$score = (float)filter_var(post('score'), FILTER_SANITIZE_NUMBER_FLOAT);
	$total_score = (float)filter_var(post('total_score'), FILTER_SANITIZE_NUMBER_FLOAT);

	if($score>$total_score){
		$score = $total_score;
	}

	$email = $_SESSION['email'];
	$time = time();

	$tags = mysqli_fetch_assoc(mysqli_query($conn, "SELECT tags FROM uploads2 WHERE id='$id'"))['tags'];

	$score_sql = mysqli_query($conn, "SELECT * FROM saved_scores WHERE email='$email' AND resource_id='$id' AND session_id='".$_SESSION['save_score']."'");
	if (mysqli_num_rows($score_sql)==0) {
		mysqli_query($conn, "INSERT INTO saved_scores (email, resource_id, score, total_score, time_added, tags, session_id) VALUES ('$email', '$id', '$score', '$total_score', '$time', '$tags', '".$_SESSION['save_score']."')");
		echo 'saved';
	}else{
		mysqli_query($conn, "UPDATE saved_scores SET score='$score', total_score='$total_score', time_added='$time' WHERE email='$email' AND resource_id='$id' AND session_id='".$_SESSION['save_score']."'");
		echo 'saved';
	}

	// print_r($_POST);
	exit();
}


require_once "../header.php"; ?>


<style type="text/css">
	body{
		background: #f5f5f5;
	}

	footer{
		background: #fff;
		width: 100%;
	}

	.content{
		margin-bottom: 20px;
	}

	.slideHead{
		font-size: 20px !important;
		font-weight: bolder;
/*		border-left: 4px solid rgb(0,0,0,0.5);
		padding-left: 30px;*/
		cursor: pointer;
	}

	.slideHead:hover{
		color: #31afb4;
	}

	.instructions{display: none;}

	table{
		table-layout: auto;
	}

	table, th, td {
		padding: 10px;
		  border: 1px dashed rgb(0, 0, 0, 0.3);
		  border-collapse: collapse;
		}
		
	input[type="checkbox"] {
		font-size: 40px !important;
		background: red;
		cursor: pointer;
		width: 20px;
		height: 20px;
		color: red;
	}

	<?php if($darkMode){?>
		table, th, td {
			border: 1px dashed rgb(255, 255, 255, 0.3);
		}
	<?php } ?>
		
	.icon-right{
		float: right;
		color: #EF798A;
	}

	
	img {
	  pointer-events: none;
	}

	.chat-black{
		display: none;
		position: fixed;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		background: rgb(0,0,0,0.5);
		z-index: 4;
	}

	.chat-box{
		display: none;
		position: fixed;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		width: 90%;
		max-width: 600px;
		max-height: 600px;
		height: 90%;
		background: #fff;
		z-index: 5;
		border-radius: 10px;
		box-shadow: 0 0 10px 0 rgb(0,0,0,0.1);
	}
</style>


	<div class="content content-resource">

<?php 
$url_content = urlencode("Hello! I would like to write a review regarding this resource: oscetoolbox.com/resource?id=".$file['id'].". ");
 ?>

<br>


	<?php 
	if (empty($file)) {
		echo "Nothing Found Here!";
	}else{
	?>

		<div class="content-category">

		<?php
		if((isset($_SESSION['admin']) AND $_SESSION['admin']==true)){
		?>
			<a href="../dashboard/add-<?php echo $file['category'];?>.php?edit=<?php echo $id;?>"><div class="nav-btn" style="float:right;padding: 5px 10px;margin-top: -50px;margin-right: -30px;"><i class='bx bx-pencil' ></i></div></a>
		<?php 
		}else{
			?>
		<a href="../contact?review=true&content=<?php echo $url_content;?>"><div class="nav-btn" style="float:right;padding: 5px 10px;margin-top: -50px;margin-right: -30px;">Report a problem</div></a>
		<?php } ?>


		<a href="../search?category=<?php echo $file['category'];?>" style="color: inherit !important;border:0">
		<i class='bx bxs-beer'></i> 
		<?php
		$file_category = $file['category'];
		if ($file_category=='scenario') {
			echo "Scenarios";
		}elseif ($file_category=='cheatsheet') {
			echo "Info Capsules";
		}elseif ($file_category=='video') {
			echo "Videos";
		} 
		 ?>
		</a>
		</div>
		<br>

		<b><div class="header"><?php echo $file['title']; ?></div></b>

		<div class="content-details">
		By 
		<!-- <a href="#" style="color: #31afb4"><?php // echo mysqli_fetch_assoc(mysqli_query($conn, "SELECT first_name FROM user_info WHERE email='".$file['user_id']."'"))['first_name']; ?></a> -->
		<a href="../search?author=<?php echo $file['author']; ?>" style="color: #31afb4"><?php echo $file['author']; ?></a>
		&nbsp;
		.
		&nbsp;
		<?php echo date('F d, Y', $file['time_added']); ?>
		.
		&nbsp;
		Last reviewed:
		&nbsp;
		<?php echo $file['date_of_review']; ?>
		.
		&nbsp;
		<!-- <?php echo $file['year']; ?> -->
		<!-- . -->
		&nbsp;
		<!-- <?php echo $file['station']; ?> -->
			
		<br>
		<br>
		
		<?php if (logged_in()): 
		
		$likers = $file['likers'];
		$likers_array = explode(',', $likers);
		?>
		<a href="#" onclick="fav()" id="fav" style="border:0;color: #EF798A">
			<?php if(in_array($_SESSION['email'], $likers_array)){ ?>
			<span style='color:#EF798A'><i class='bx bxs-heart' style='color: #EF798A !important'></i> &nbsp;Added to Favourites</span>
			<?php }else{ ?>
			<i class='bx bx-heart' style='color: #EF798A !important'></i> &nbsp;<span style='border-bottom:1px dashed grey;'>Add to Favourites</span>
			<?php } ?>
		</a>
			
		<script type="text/javascript">
			function fav(){
				$.post("", {toggle_fav: <?php echo $file['id']; ?>}, function(res){
				console.log(res);
					if (res=='added') {
						$("#fav").html("<span style='color:#EF798A'><i class='bx bxs-heart' style='color: #EF798A !important'></i> &nbsp;Added to Favourites</span>");
					}else if(res=='removed'){
						$("#fav").html("<i class='bx bx-heart' style='color: #EF798A !important'></i> &nbsp;<span style='border-bottom:1px dashed grey;color:#333'>Add to Favourites</span>");
					}
				})
			}
		</script>
		<?php endif ?>

		</div>

		<br>
		<br>
		<br>

		<?php 

// SCENARIO
if ($file['category']=='scenario') {
	require_once "scenario-page.php";
}

// CHEATSHEET
else if ($file['category']=='cheatsheet'){
	require_once "cheatsheet-page.php";
}		


// VIDEO
		else if ($file['category']=='video'){
			echo $file['content'];
			?>

			<!-- Link to Plyr CSS -->
<link rel="stylesheet" href="https://cdn.plyr.io/3.6.4/plyr.css" />

<!-- Link to Plyr JavaScript -->
<script src="https://cdn.plyr.io/3.6.4/plyr.js"></script>

<video id="my-video" controls preload="auto">
  <source src="../files/videos/<?php echo trim($file['files']);?>" type="video/mp4" />
  <!-- Add more source elements for different formats if needed -->
</video>

<script type="text/javascript">
  document.addEventListener('DOMContentLoaded', () => {
    const player = new Plyr('#my-video');
  });
</script>

			<br>

			<?php 
		}
		?>

		</div>


<?php if (!empty($file['files']) and $file['category']!=='video'){ 
	$attachments = explode(' ', trim($file['files']));
	if (!empty($attachments)) {
	?>
	
<div class="content content-resource" style="margin-top:0px;background: none;">
			<div class="slideHead">
			<i class="icofont-crutch"></i>
			Downloadables
			</div>
			<br>
			<div id="attachments">
				<?php foreach ($attachments as $a): ?>
					<a href="../files/2023/<?php echo $file['category'].'/'.$a;?>" target='_blank'>
					<div class="attachment-div">
						<div class="attachment-text"><?php echo $a; ?></div>
						<div class="attachment-icon">
							<i class='bx bxs-cloud-download'></i>
						</div>
					</div>
					</a>

					<?php
					$a_type_array=explode('.', $a); 
					if (end($a_type_array)=='pdf') {
						?>
						<!-- <embed class="embedpdf" style="width:100%;height:100vh" src="<?php echo $url;?>files/2023/<?php echo $file['category'].'/'.$a;?>#toolbar=0&navpanes=0"></embed> -->

						<iframe
						    src="https://drive.google.com/viewerng/viewer?embedded=true&url=<?php echo $url;?>files/2023/<?php echo $file['category'].'/'.$a;?>#toolbar=0&scrollbar=0"
						    frameBorder="0"
						    scrolling="auto"
						    style="width: 100%;height: 100vh;"
						></iframe>
						<?php
					}
					 ?>
				<?php endforeach ?>
			</div>
</div>

<?php			
					}
		 } 
 ?>



<!-- ###################### -->
<!-- ###################### -->
<!-- ###################### -->
<!-- ###################### -->
<!-- ###################### -->


<!-- COMMENTS -->
  <div class="content" style="margin-top:0px">
		<div class="header2" style="display:inline-block;background: #EF798A;padding: 2px 5px;color: #fff;">Comments</div>
		<br>
		<br>
		<br>

<!-- PHP code for processing the form submission and displaying existing comments -->


<?php
if (logged_in() and $_SESSION['premium']==true){
	
	if (post('comment') and post('name') ){

  // Use a CSRF token to protect against CSRF attacks
  if (isset($_POST['csrf_token']) && isset($_SESSION['csrf_token']) && $_POST['csrf_token'] == $_SESSION['csrf_token']){

		// Add the new comment to the array of comments
  	$email = $_SESSION['email'];

  	$name = softSan(post('name'));
	$comment = softSan(post('comment'));
	$date = time();

	mysqli_query($conn, "INSERT INTO upload_comments (upload_id, email, comment_name, comment_text, time_added) VALUES ('$id', '$email', '$name', '$comment', '$date')");
		
		}
	}

	// If the form has been submitted, add the new comment to the JSON file
	if (get('deleteComment', true)) {

		$deleteComment = (int)filter_var(get('deleteComment', FILTER_SANITIZE_NUMBER_INT));
		mysqli_query($conn, "UPDATE upload_comments SET hidden=1 WHERE id='$deleteComment' AND email='".$_SESSION['email']."'");
		
	}



}


$comment_sql = mysqli_query($conn, "SELECT * FROM upload_comments WHERE upload_id='$id' AND hidden=0 ORDER BY time_added DESC");

// $comments = array();

	while ($comment = mysqli_fetch_assoc($comment_sql)) {

		echo "<p style='color:#EF798A'>" . $comment['comment_text'] .
		 "<br><small style='color:rgb(0,0,0,0.5)'>".$comment['comment_name']."</b> . " .time_elapsed_string($comment['time_added']) . " ago";
		 if (logged_in() and $comment['email'] == $_SESSION['email']) {
			 echo "&nbsp <a style='color:#31afb4' href='resource?id=".$id."&deleteComment=".$comment['id']."'>Delete</a>";
		 }
		 echo "</small></p><br>";

		}
?>

<?php
	// end content
	}
?>

<?php if (logged_in() and $_SESSION['premium']==true and !empty($file)){ 
	$_SESSION['csrf_token'] = bin2hex(random_bytes(32));
	
	?>
	

	Add a comment
	<br>
	<br>

	<!-- Form for adding a new comment -->
	<form method="POST">
		<input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

		<input placeholder="Name" style="background:rgb(0, 0, 0, 0.02);" type="text" class="form-control" value="<?php if(logged_in()){
			echo $_SESSION['first_name'];
		} ?>" name="name" required>

		<!-- <label for="comment">Comment:</label> -->
		<textarea maxlength="500" style="margin-top:10px;background:rgb(0, 0, 0, 0.02);" placeholder="Comment" id="comment" class="form-control" name="comment" required></textarea>
		<br>

		<input type="submit" class="nav-btn" style="float:none" value="Submit">
	</form>

<?php }else{ ?>
	<i>You need to be logged in with an <a href="../pricing">active subscription</a> to post a comment</i>
<?php } ?>



	</div>
<!-- END COMMENTS -->



</div>


<br>
<br>
<br>
<br>


<?php require "../footer.php";?>