<?php 

$page_title = "Videos";
	require_once "../inc/conn.php";
	logged_in(true);


if (get('id')) {
	$id = (int)filter_var(get('id'), FILTER_SANITIZE_NUMBER_INT);
	$sql = "SELECT * FROM uploads WHERE id='$id' and category='video'";
	$query = mysqli_query($conn, $sql);
	$file = mysqli_fetch_assoc($query);

}

$nav = "Dashboard";

require_once "header.php"; ?>


	<div class="content">

		<?php 
		if (empty($file)) {
			echo "Nothing Found Here!";
		}else{
		?>


		<br>
		<br>
		<div class="row">
			<div class="col-md-8" style="margin:auto">

			<div class="video-frame"></div>

			<br>

			<div class="title2"><?php echo $file['title']; ?></div>
			<a href="#"><i class="bx bx-heart"></i> &nbsp;Add to Favourites</a>
			<br>
			<br>
			<div class="resource-content">
				
			<?php echo $file['content']; ?>

			</div>


				<br>
				<br>

				Uploaded by
				<a href="#" style="color: #31afb4">
					<?php echo mysqli_fetch_assoc(mysqli_query($conn, "SELECT first_name FROM user_info WHERE email='".$file['user_id']."'"))['first_name']; ?>
				</a>
				<br>
				Module
				<a href="#" style="color: #31afb4">
					<?php echo $file['module']; ?>
				</a>
				<br>
				Year
				<a href="#" style="color: #31afb4">
					<?php echo $file['year']; ?>
				</a>
				<br>
				University
				<a href="#" style="color: #31afb4">
					<?php echo $file['university']; ?>
				</a>


				<br>
				<br>
				<div class="title">Comments</div>

				<br>
				<br>
				<br>
				<br>
				<br>
				
			</div>	


		</div>



		<?php

		}

		 ?>

	</div>




</div>


<?php require "footer.php";?>