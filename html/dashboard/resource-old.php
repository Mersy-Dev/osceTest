<?php 

$page_title = "Resource";
	require_once "../inc/conn.php";
	logged_in(true);


if (get('id')) {
	$id = (int)filter_var(get('id'), FILTER_SANITIZE_NUMBER_INT);
	$sql = "SELECT * FROM uploads WHERE id='$id'";
	$query = mysqli_query($conn, $sql);
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

$nav = "Dashboard";

require_once "header.php"; ?>


	<div class="content">

		<?php 
		if (empty($file)) {
			echo "Nothing Found Here!";
		}else{
		?>

		<div style="text-transform: capitalize;" class="">Files <i class="icofont-arrow-right"></i> &nbsp;
			<?php if ($file['category']=='scenario'): ?>
				<a href="#" style="color:#31afb4;text-decoration: underline;">Scenario</a>&nbsp; 
				<i class="icofont-arrow-right"></i>&nbsp; 
				<a href="#" style="color:#31afb4;text-decoration: underline;"><?php echo $file['sub_category']; ?></a>
			<?php endif ?>
		</div>

		<br>


		<div class="row">
			<div class="col-md-8">

			<div class="res-row">

				<?php 
				$files = explode(' ', trim($file['files']));
				foreach ($files as $f) {
				if(!empty($f)) {
					$file_type = explode('.', $f);
					if(end($file_type)=='pdf'){

				 ?>
				<a target="_blank" href="../files/2023/<?php echo $file['category']."/".$f; ?>">
				<div class="res-div">
				<div class="res-hover">
					<i class="bx bxs-res-pdf"></i>
				</div>
				</div></a>
				<?php  } else{ ?>
				<a target="_blank" href="../files/2023/<?php echo $file['category']."/".$f; ?>"><div class="res-div" style="background:url('../files/2023/<?php echo $file['category']."/".$f; ?>');background-size: cover;">
				<div class="res-hover"></div>
				</div></a>
				<?php 
						}
					} 
					} 
				?>

			</div>

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
				<br>
				<br>
			</div>	

			<div class="col-md-4">
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
				
			</div>	


		</div>



		<?php

		}

		 ?>

	</div>




</div>


<?php require "footer.php";?>