<?php 

$page_title = "Add Resource";
$nav = "Dashboard";

require_once "header.php"; 

if(!isset($is_admin) or $is_admin==false){
	header("Location: index");
	exit();
}

?>


	<div class="content content-dark">

		<div style="text-align: center;background:none" class="header" >Add Resource</div>

		<br>
		<div style="max-width: 444px;margin: auto;">
			
			<a href="add-scenario.php">
			<div class="add-r-box">
				<img src="assets/img/pyramid-one.png">
				<div>Scenario</div>
			</div>
			</a>
			
			<a href="add-video">
			<div class="add-r-box">
				<img src="assets/img/vr-glasses.png">
				<div>Video</div>
			</div>
			</a>
			

			<a href="add-cheatsheet.php">
			<div class="add-r-box" style="padding-top: 30px;">
				<img src="assets/img/notes.png">
				<div style="margin-top:13px">Cheatsheet</div>
			</div>
			</a>

		</div>


	</div>




</div>




<?php require "footer.php";?>