<?php 

$page_title = "Cheat sheets";
$nav = "Dashboard";

require_once "header.php"; ?>




	<div class="content">

		<!-- <div class="header" style="background: url(assets/img/banner-cheatsheets.jpg) center no-repeat;background-size: cover;">Cheat Sheets</div> -->

		<div class="flex">
			<div class="left-side">

				<div class="box">
					<div class="box-icon">
						<i class="icofont-align-right"></i>
					</div>
				<div class="box-label">Cheatsheets</div>
				<br>
			<!-- 
					<label for="category" class="form-label">Category</label>
					<select id="category" class="form-control">
						<option value="all">All</option>
						<?php 
						$categories_file = file_get_contents("../inc/categories.json");
						$categories = json_decode($categories_file);

						foreach ($categories->scenario_categories as $c) {
							?>
							<option value="<?php echo $c; ?>"><?php echo $c; ?></option>
							<?php
						}
						 ?>
					</select>

					<br> -->

					<label for="university" class="form-label">University</label>
					<select id="university" class="form-control">
						<option value="all">All</option>
						<?php 
						$uni_file = file_get_contents("../inc/universities.json");
						$unis = json_decode($uni_file);

						foreach ($unis->universities as $u) {
							?>
							<option value="<?php echo $u; ?>"><?php echo $u; ?></option>
							<?php
						}
						 ?>
					</select>

					<br>

					<label for="university" class="form-label">Station</label>
					<select id="university" class="form-control" disabled>
						<option>Choose Station...</option>
					</select>

					<br>

					<label for="university" class="form-label">Module</label>
					<select id="university" class="form-control" disabled>
						<option>Choose Module...</option>
					</select>

					<br>
					<br>
					<button onclick="getResults()" style="width: 100%;" class="btn btn-primary btn-rev">APPLY FILTER</button>

				</div>



			</div>


			<div class="right-side">
				
				<div id="right">

				</div>

			</div>


		</div>




</div>

<script type="text/javascript">
	
	function getResults(){
		$("#right").fadeOut(function(){

		$("#right").html("<br><br><br><br><br><center><img src='assets/img/search-book.png'><br>Hang on..<div class='spin' style='min-width:400px;text-align:center;font-size:30px'><i class='icofont-spinner'></i></div></center>");
		});

		$("#right").fadeIn(function(){

			$.post("page-loader/page-search.php", {search:'cheatsheet', category: $("#category").val(), university: $("#university").val()}, function(result){
				$("#right").fadeOut(function(){
					$("#right").html(result);
					$("#right").fadeIn();
				});
			})
		});
	}

	getResults();

</script>

<?php require "footer.php"; ?>