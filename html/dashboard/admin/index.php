<?php 

$page_title = "Admin";
$nav = "Dashboard";

require_once "../../inc/conn.php"; 
require_once "../header.php"; 


if(!isset($is_admin) or $is_admin==false){
	// header("Location: ../");
	exit();
}

if (post("categories")) {
	file_put_contents("../../inc/categories.json", post("categories"));
}

if (post("admin")) {
	file_put_contents("../../inc/admins.json", post("admin"));
}

if (post("tags")) {
	file_put_contents("../../inc/tags.json", post("tags"));
}


?>

<style type="text/css">
	.form-label{
		font-size: 14px
	}	
</style>


	<div class="content">


		<div class="flex">
			<div class="left-side">

				<div class="box">

					<a><div data-tab="info" class="left-tab left-tab-active">Overview</div></a>
					<a href="user-growth"><div class="left-tab">Site Stats</div></a>
					<a href="stats/unsubscription-data.php"><div class="left-tab">Unsubscription Stats</div></a>
					<a href="admin-user-comments"><div class="left-tab">User Comments <i class="icofont-external-link"></i></div></a>
					<a href="my-resources"><div class="left-tab">View My Resources <i class="icofont-external-link"></i></div></a>
					<a href="add-resource"><div class="left-tab">Add a Resource <i class="icofont-external-link"></i></div></a>
					<div data-tab="edit-tags" class="left-tab">Edit Tags</div>
					<div data-tab="edit-categories" class="left-tab">Edit Categories</div>
					<a href="https://dashboard.tawk.to"><div class="left-tab">Chat <i class="icofont-external-link"></i></div></a>
					<a href="articles"><div class="left-tab">Articles</div></a>

				</div>



			</div>


			<div class="right-side">


				<div class="admin-tab" id="info">
					Overview
					<br>
					<br>

					<div class="dbox-total" style="">

					<div class="dbox">
						<div class="dbox-pad">
							<img src="../assets/img/rec1.png">
							<div class="dbox-title">CHEAT SHEETS</div>	
							<div class="dbox-number"><?php echo mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS count FROM uploads WHERE category = 'cheatsheet' AND hidden=0;"))['count'];?></div>	
							<div class="dbox-link">Cheat Sheets</div>	
						</div>
					</div>

					<div class="dbox">
						<img src="assets/img/plants.png" class="dbox-plant">
						<div class="dbox-pad">
							<img src="assets/img/rec2.png">
							<div class="dbox-title">SCENARIOS</div>	
							<div class="dbox-number"><?php echo mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS count FROM uploads WHERE category = 'scenario' AND hidden=0;"))['count'];?></div>	
							<div class="dbox-link" style="color: red">View all Scenarios</div>	
						</div>
					</div>

					<div class="dbox">
						<div class="dbox-pad">
							<img src="assets/img/rec3.png">
							<div class="dbox-title">Videos</div>	
							<div class="dbox-number"><?php echo mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS count FROM uploads WHERE category = 'video' AND hidden=0;"))['count'];?></div>	
							<div class="dbox-link">View Videos</div>	
						</div>
					</div>

					<div class="dbox" style="border: 0">
						<img class="svg" src="assets/img/user-dashboard.png">
						
					</div>


					<div class="clear"></div>

					</div>


				</div>


				<div class="admin-tab" id="edit-admin">
					<form method="post">
					<textarea name="admin" style="min-height: 500px" class="form-control"><?php include "../inc/admins.json"; ?></textarea>
					<button class="btn-primary" type="submit">SAVE</button>
					</form>
				</div>


				<div class="admin-tab" id="edit-tags">
					<form method="post">
					<textarea name="tags" style="min-height: 500px" class="form-control"><?php include "../inc/tags.json"; ?></textarea>
					<button class="btn-primary" type="submit">SAVE</button>
					</form>
				</div>


				<div class="admin-tab" id="edit-categories">
					<form method="post">
					<textarea name="categories" style="min-height: 500px" class="form-control"><?php include "../inc/categories.json"; ?></textarea>
					<button class="btn-primary" type="submit">SAVE</button>
					</form>
				</div>


			</div>


	</div>


	<script type="text/javascript">
		$(".left-tab").on("click", function () {
			var e = $(this).attr('data-tab');
			console.log(e);
			$(".admin-tab").fadeOut(function(){
				$("#"+e).fadeIn();
			});
			$('.left-tab').removeClass("left-tab-active");
			$(this).addClass("left-tab-active");
		})

			$("#info").fadeIn();
	</script>




</div>



<?php require "footer.php"; ?>