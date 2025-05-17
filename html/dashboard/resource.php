<?php 

$page_title = "Resource";
	require_once "../inc/conn.php";
	// logged_in(true);


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
			case 'video':
				$page_title = "Videos";
				break;
			case 'cheatsheet':
				$page_title = "Cheat sheets";
				break;
			
			default:
				# code...
				break;
		}
	}

}

echo $page_title;



if (!$file['free']) {
	if (logged_in()) {
		if (!$_SESSION['premium']) {
			header("Location: pricing");
			exit();
		}
	}else{
		header("Location: login/");
		exit();
	}
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
			if(mysqli_query($conn, "UPDATE uploads SET likes='$likes', likers='$likers' WHERE id='$fav_id'")){
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
				if(mysqli_query($conn, "UPDATE uploads SET likes='$likes', likers='$new_likers' WHERE id='$fav_id'")){
					echo 'removed';
				}
			}
		}

	exit();	
}


require_once "header.php"; ?>


<style type="text/css">
	body{
		background: #f5f5f5;
		color: black;
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
		  border: 1px solid black;
		  border-collapse: collapse;
		}

		tr td:nth-of-type(2){
/*			display: inline-block;*/
/*			max-width: 100px;*/
/*			text-align: right;*/
		}

	input[type="checkbox"] {
		font-size: 40px !important;
		background: red;
		cursor: pointer;
		width: 20px;
		height: 20px;
		color: red;
	}

	.icon-right{
		float: right;
		color: #EF798A;
	}

	
	img {
	  pointer-events: none;
	}
</style>




	<div class="content content-resource" >

	<?php 
	if (empty($file)) {
		echo "Nothing Found Here!";
	}else{
	?>

		<div class="content-category">

		<a href="search?category=<?php echo $file['category'];?>" style="color: inherit !important;border:0">
		<i class="icofont-hill"></i> <?php echo $file['category']; ?>s
		</a>
		</div>
		<br>

		<b><div class="header"><?php echo $file['title']; ?></div></b>

		<div class="content-details" style="font-size: 14px;color: rgb(0, 0, 0, 0.6);">
		By 
		<a href="#" style="color: #31afb4"><?php echo mysqli_fetch_assoc(mysqli_query($conn, "SELECT first_name FROM user_info WHERE email='".$file['user_id']."'"))['first_name']; ?></a>
		&nbsp;
		.
		&nbsp;
		<?php echo date('F d, Y', $file['time_added']); ?>
		.
		&nbsp;
		<a href="#"><?php echo $file['university']; ?></a>
		.
		&nbsp;
		<?php echo $file['year']; ?>
		.
		&nbsp;
		<?php echo $file['station']; ?>
			
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
			<i class='bx bx-heart' style='color: #EF798A !important'></i> &nbsp;<span style='border-bottom:1px dashed grey;color:#333'>Add to Favourites</span>
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

if ($file['category']=='scenario') {
	$c = unserialize($file['content']);
	echo "<b>Summary</b> <br> ".$c['summary'];
	echo '</div> 
			<div class="content content-resource" style="margin-top:0px"> 
			<div class="slideHead" onclick="$(\'#student_instructions\').slideToggle(\'fast\')">
			<i class="icofont-read-book-alt"></i>
			Student Instructions
			<div class="icon-right"><i class="icofont-ui-add"></i></div>
			</div>
			<div class="instructions" id="student_instructions"> <br>'.$c['student_instructions'].'
			</div>';
	echo '';


	echo ' </div> <div class="content content-resource" style="margin-top:0px">
			<div class="slideHead" onclick="$(\'#patient_instructions\').slideToggle(\'fast\')">
			<i class="icofont-crutch"></i>
			Patient Instructions
			<div class="icon-right"><i class="icofont-ui-add"></i></div>
			</div>
			<div class="instructions" id="patient_instructions"> <br>'.$c['patient_instructions'].'
			</div>';
	echo '</div>';


	echo ' <div class="content content-resource" style="margin-top:0px">
			<div class="slideHead" onclick="$(\'#mark_scheme\').slideToggle(\'fast\')">
			<i class="icofont-doctor"></i>
			Mark Scheme
			<div class="icon-right"><i class="icofont-ui-add"></i></div>
			</div>
			<div class="instructions" id="mark_scheme"> <br>'.$c['mark_scheme'];
			?>

			<br>
			<br>
		  <div style="background: #fff;padding: 20px;" id="exam_date">
		    <small>Score</small>
		    <br>
		    <span style="font-size: 40px;font-weight: bolder;"><span id='myCounter'>0</span>/<span id="totalScore">40</span></span> 
		    <div class="progress">
		      <div class="progress-bar" role="progressbar" style="width: 50%"  aria-valuemin="0" aria-valuemax="100"></div>
		    </div>

		  </div>
		  </div>
				  

<script type="text/javascript">
// table counter
var count = 0;
var counter = document.getElementById('myCounter');

function replaceNumericWithCheckbox() {
// var table = document.getElementById(tableId);
var tdList = document.getElementsByTagName('td');
var count = 0;
var totalScore = 0;

for (var i = 0; i < tdList.length; i++) {
	var tdValue = parseInt(tdList[i].innerHTML);
	if (!isNaN(tdValue)) {
	  tdList[i].innerHTML = '<input type="checkbox" onchange="updateCounter(this, ' + tdValue + ')" />';
	    totalScore += tdValue;
	}
}
document.getElementById('totalScore').innerHTML = totalScore;
}

function updateCounter(checkbox, value) {
  if (checkbox.checked) {
    count += value;
   } else {
      count -= value;
 }
   counter.innerHTML = count;
}

replaceNumericWithCheckbox();
</script>

					<?php

		}else if ($file['category']=='cheatsheet'){
			?>

			<style>
  .table-header {
    cursor: pointer;
    font-weight: bold;
  }

  .table-header i{
  	color: #EF798A;
  }


  .table-content {
    display: none;
    margin-top: 20px;
    padding: 30px;
    padding-left: 30px;
    background: rgb(0, 0, 0, 0.01);
  }
</style>

<?php echo $file['content']; ?>


<script>
  $(document).ready(function() {
    $('div table').each(function() {
      var $table = $(this);
      var $rows = $table.find('tbody tr');
      var $headerRow = $rows.eq(0);
      var $contentRow = $rows.eq(1);
      var $headerText = $headerRow.find('td').text();
      var $contentText = $contentRow.find('td').html();
      var $header = $('<div>').addClass('table-header').text($headerText);
      $header.html(" <i class='icofont-caret-right'></i> " + $headerText);
      var $content = $('<div>').addClass('table-content').html($contentText);
      
      $table.replaceWith([$header, $content]);
      
      $header.on('click', function() {
        $content.slideToggle('medium');
      });
    });
  });
</script>

			<?php

		}else if ($file['category']=='video'){
			?>
			<video width="100%" controls>
			  <source src="files/videos/<?php echo trim($file['files']);?>" type="video/mp4">
			Your browser does not support the video tag.
			</video>
			<?php 
		}
		?>

		</div>



<!-- COMMENTS -->
  <div class="content" style="margin-top:0px">
		<div class="header">Comments</div>
		<br>

<!-- PHP code for processing the form submission and displaying existing comments -->
	<?php

	$comments = json_decode($file['comments']);


if (logged_in()){
	// If the form has been submitted, add the new comment to the JSON file
	if (post('name') and post('comment')) {

  // Use a CSRF token to protect against CSRF attacks
  if (isset($_POST['csrf_token']) && isset($_SESSION['csrf_token']) && $_POST['csrf_token'] == $_SESSION['csrf_token']){

		// Add the new comment to the array of comments
		$comment = array(
			"email" => $_SESSION['email'],
			"name" => softSan(post('name')),
			"comment" => softSan(post("comment")),
			"date" => time()
		);
		$comments[] = $comment;

		// Save the updated comments to the JSON file
		$id = $file['id'];
		$comment_data = json_encode($comments);
		mysqli_query($conn, "UPDATE uploads SET comments='$comment_data' WHERE id ='$id'");
		$comments = json_decode($comment_data);
		
		}
	}
}

	if (!empty($comments)) {
	// Display the comments in reverse chronological order
	$comments = array_reverse($comments);
	// print_r($comments);
	foreach ($comments as $comment) {
		echo "<p style='color:#EF798A'>" . $comment->comment .
		 "<br><small style='color:rgb(0,0,0,0.5)'>".$comment->name."</b> . " .time_elapsed_string($comment->date) . " ago</small></p><br>";
				}

		}

$_SESSION['csrf_token'] = bin2hex(random_bytes(32));
	?>

<?php if (logged_in()){ ?>
	
	Add a comment
	<br>
	<br>

	<!-- Form for adding a new comment -->
	<form method="POST">
		<input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

		<!-- <label for="name">Name:</label> -->
		<input placeholder="Name" style="background:rgb(0, 0, 0, 0.02);" type="text" class="form-control" name="name" required>

		<!-- <label for="comment">Comment:</label> -->
		<textarea style="margin-top:10px;background:rgb(0, 0, 0, 0.02);" placeholder="Comment" id="comment" class="form-control" name="comment" required></textarea>
		<br>

		<input type="submit" class="nav-btn" style="float:none" value="Submit">
	</form>

<?php }else{ ?>
	<i>You need to be logged in to post a comment</i>
<?php } ?>


		<?php
// end if file not empty
}
?>

	</div>
<!-- END COMMENTS -->



</div>


<br>
<br>
<br>
<br>


<?php require "footer.php";?>