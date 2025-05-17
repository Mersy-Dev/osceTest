<?php 

$page_title = "Resource";
	require_once "inc/conn.php";
	// logged_in(true);
// $email=$_SESSION['email'];

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

if ($file['free']!=="yes") {
	if (logged_in()) {
		if ($_SESSION['premium']==false) {
			header("Location: locked");
			exit();
		}
	}else{
		header("Location: login/");
		exit();
	}
}


if (get('id')==54) {
	header("Location:special-resources/lifestyle-advice");
	exit();
}
if (get('id')==55) {
	header("Location:special-resources/controlled-drug-prescription-1");
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

	$tags = mysqli_fetch_assoc(mysqli_query($conn, "SELECT tags FROM uploads WHERE id='$id'"))['tags'];

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


require_once "header.php"; ?>


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
<!-- <a href="contact?review=true&content=<?php echo $url_content;?>"><div class="disclaimer" style="width:100%"><i class='bx bx-paragraph' ></i> Do you have some feedback regarding this <?php echo $file['category']?>?. Leave a review</div> -->

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
			<a href="dashboard/add-<?php echo $file['category'];?>.php?edit=<?php echo $id;?>"><div class="nav-btn" style="float:right;padding: 5px 10px;margin-top: -50px;margin-right: -30px;"><i class='bx bx-pencil' ></i></div></a>
		<?php 
		}else{
			?>
		<a href="contact?review=true&content=<?php echo $url_content;?>"><div class="nav-btn" style="float:right;padding: 5px 10px;margin-top: -50px;margin-right: -30px;">Report a problem</div></a>
		<?php } ?>


		<a href="search?category=<?php echo $file['category'];?>" style="color: inherit !important;border:0">
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
		<a href="search?author=<?php echo $file['author']; ?>" style="color: #31afb4"><?php echo $file['author']; ?></a>
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

if ($file['category']=='scenario') {

	?>


<div class="chat-black" id="chat-black" onclick="$('#chat-black, #chat-box').fadeOut()"></div>
<div class="chat-box" id="chat-box">
	<iframe id="chat-iframe" src="api/chatbot/?id=<?php echo $id;?>" style="width:100%;height:100%;border:40px"></iframe>
</div>


<?php
	$c = unserialize($file['content']);
	echo "<b>Summary</b> <br> ";
	echo $c['summary'];
	echo '</div> 
			<div class="content content-resource" style="margin-top:0px"> 
			<div class="slideHead" onclick="$(\'#student_instructions\').slideToggle(\'fast\')">
			<i class="icofont-read-book-alt"></i>
			Student Instructions
			<div class="icon-right">+</div>
			</div>
			<div class="instructions" id="student_instructions"> <br>'.$c['student_instructions'].'
			</div>';
	echo '</div> ';

	if(!empty($c['actor_instructions'])){

		if($file['ai']=="yes"){
	echo '
	<center><div class="nav-btn"  onclick="$(\'#chat-black, #chat-box\').fadeIn()" style="display:inline-block;margin:40px 0;padding:10px;float:none;font-size:16px !important;cursor:pointer">Actor AI 🤖 (Beta)</div></center>';
		}

	echo ' <div class="content content-resource" style="margin-top:0px">
			<div class="slideHead" onclick="$(\'#actor_instructions\').slideToggle(\'fast\')">
			<i class="icofont-crutch"></i>
			Actor Instructions
			<div class="icon-right">+</div>
			</div>
			<div class="instructions" id="actor_instructions"> <br>'.$c['actor_instructions'].'
			</div>';
	echo '</div>';
	}


	echo ' <div class="content content-resource" style="margin-top:0px">
			<div class="slideHead" onclick="$(\'#mark_scheme\').slideToggle(\'fast\')">
			<i class="icofont-doctor"></i>
			Mark Scheme
			<div class="icon-right">+</div>
			</div>
			<div class="instructions" id="mark_scheme"> <br>'.$c['mark_scheme'];
			?>

			<br>
		  <div style="padding: 20px;">
		    <small>Score</small>
		    <br>
		    <span style="font-size: 40px;font-weight: bolder;"><span id='myCounter'>0</span>/<span id="totalScore">40</span></span> 
		    <div class="progress">
		      <div class="progress-bar" id="progressbar" role="progressbar" style="width: 0%"  aria-valuemin="0" aria-valuemax="100"></div>
		    </div>

		  </div>

		  
		  <?php 
		  if (logged_in()) {
		  	?>
		  	<div style="display: flex;justify-content:space-between;background:rgb(0,0,0,0.05);padding:20px">
				<div>
					<?php
					// check if user has saved score
					$score_sql = mysqli_query($conn, "SELECT * FROM saved_scores WHERE email='".$_SESSION['email']."' AND resource_id='$id'");
					$score = mysqli_num_rows($score_sql);
					if ($score>0) {
						$score = mysqli_fetch_assoc($score_sql);
						echo "<div style='margin-bottom: 5px;'><span id='text1'>Your previous score was ".$score['score'].".</span> <a href='dashboard/score-history'>View Score History</a></b></div>";
						echo "<b id='text2'>Update this score</b>";
					}else{
						echo "<b id='text2'>Would you like to save this score?</b>";
						echo "<div style='margin-top: 5px;'><a href='dashboard/score-history'>View Score History</a></b></div>";
					}
					?>

				</div>

			<div>
				<div class="banner-text3" onclick="submitScore('like2')" id="like2" style="cursor:pointer;margin-top: 0px;">
					<?php if ($score>0) {
						echo "Update Score";
					}else{
						echo "Save Score";
					} ?>
					<i class='bx bxs-bar-chart-alt-2'></i>
				</div>

			</div>
			</div>

			<script type="text/javascript">
				function submitScore(e){
					$.post("", {save_score: <?php echo $id; ?>, score: count, total_score: totalScore}, function(res){
						console.log(res);
						if (res=='saved') {
							$("#"+e).css("background", "none");
							$("#"+e).css("box-shadow", "none");
							$("#"+e).html("Saved! <i class='bx bxs-like' ></i>");


							$("#text1").html("");
						}
						$("#text1").html("");
						$("#text2").html("Your score has been updated.");
					})
				}
			</script>
			<?php }else{
				echo "<div class='disclaimer'>Please <a href='login'>login</a> to save your score.</div>";
			} ?>




		  </div>
				  

<script type="text/javascript">
// table counter
var count = 0;
var counter = document.getElementById('myCounter');
var totalScore = 0;

function replaceNumericWithCheckboxes() {
    var tdList = document.getElementsByTagName('td');

    for (var i = 0; i < tdList.length; i++) {
        var tdContent = tdList[i].innerHTML;
        var numericValues = tdContent.split(',').map(function (value) {
            var numericValue = parseFloat(value.trim());
            return !isNaN(numericValue) ? numericValue : null;
        }).filter(function (value) {
            return value !== null;
        });

        if (numericValues.length > 0) {
            var checkboxesHTML = '';
            for (var j = 0; j < numericValues.length; j++) {
                var numericValue = numericValues[j];
                checkboxesHTML += '<input type="checkbox" onchange="updateCounter(this, ' + numericValue + ')" />';
                totalScore += numericValue;
            }

            tdList[i].innerHTML = checkboxesHTML;
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
    var per = (count / totalScore) * 100;
    document.getElementById("progressbar").style.width = per + '%';

	// change update score text
	$("#like2").css("background", "#fff");
	$("#like2").css("box-shadow", "5px 5px 0 0 #EF798A");
	$("#like2").html("Update Score <i class='bx bxs-bar-chart-alt-2'></i>");
	$("#text2").html("Update this score");


}

replaceNumericWithCheckboxes();

</script>

					<?php

		}





		// CHEATSHEET
		else if ($file['category']=='cheatsheet'){

			?>
</div>



<?php if (!empty(unserialize($file['content'])['flashcards'])){ ?>
<div class="content" style="margin-top:0;padding: 0;background: none;">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<style type="text/css">
	.owl-nav{
		text-align: center;
	}

    .owl-carousel .nav-button {
      height: 50px;
      width: 50px;
      cursor: pointer;
/*      position: absolute;*/
/*      top: 110px !important;*/
      background: #fff;
      border:2px solid black;
      color: black;
      font-size: 30px;
      margin: 10px;
      box-shadow: 5px 5px 0 0 #EF798A;
      font-weight: bolder;
    }

    .owl-carousel .owl-prev.disabled,
    .owl-carousel .owl-next.disabled {
      pointer-events: none;
      opacity: 0.25;
    }

    .owl-carousel .prev-carousel:hover {
      background-position: 0px -53px;
    }
    .owl-carousel .next-carousel:hover {
      background-position: -24px -53px;
    }

</style>


<?php 

$flashcards = array();
preg_match_all('/<table.*?>(.*?)<\/table>/s', unserialize($file['content'])['flashcards'], $matches);
 ?>

<div class="owl-carousel">

<?php 

$flash_n=1;
foreach ($matches[1] as $match) {
    preg_match_all('/<tr.*?>(.*?)<\/tr>/s', $match, $rows);
    $front = strip_tags($rows[1][0]);
    $back = strip_tags($rows[1][1]);
    // array_push($flashcards, array($front, $back));

 ?>
	<div onclick="flipCard(<?php echo $flash_n; ?>)" id="card<?php echo $flash_n; ?>" class="item content-flashcard">
		<input type="hidden" id="cardFlip<?php echo $flash_n; ?>" value="no">
		<div class="card-owl" id="cardFront<?php echo $flash_n; ?>"><?php echo $front;?></div>
		<div class="card-owl card-owl2" id="cardBack<?php echo $flash_n ?>"><?php echo $back; ?></div>
	</div>
<?php 
	$flash_n++;
	} ?>

</div>




<script>

    $('.owl-carousel').owlCarousel({
      loop:false,
      margin:10,
      nav:true,
      navText: ["<div class='nav-button owl-prev'>‹</div>", "<div class='nav-button owl-next'>›</div>"],
      responsive:{
          0:{
              items:1
          }
      }
    });

  function flipCard(e){
    if ($("#cardFlip"+e).val()=='no') {
      $("#cardFront"+e).css("transform","perspective(700px) rotateX(90deg)");

    	setTimeout(function(){
	      $("#cardFront"+e).css("display","none");
	      $("#cardBack"+e).css("display","flex");

	    	setTimeout(function(){
	      $("#cardBack"+e).css("transform","perspective(700px) rotateX(0deg)");
	    	}, 100);

    	}, 500);

      $("#cardFlip"+e).val('yes');
    } else {    	
      $("#cardBack"+e).css("transform","perspective(700px) rotateX(-90deg)");

    	setTimeout(function(){
	      $("#cardFront"+e).css("display","flex");
	      $("#cardBack"+e).css("display","none");

	    	setTimeout(function(){
	      $("#cardFront"+e).css("transform","perspective(700px) rotateX(0deg)");
	    	}, 100);

    	}, 500);

      $("#cardFlip"+e).val('no');
    }
  }


</script>

<br>
</div>

<?php } ?>


<div class="content" style="margin-top:0">

<style>
  .table-header {
    cursor: pointer;
    font-weight: bold;
  }

  .table-header i{
  	color: #EF798A;
    margin-bottom: 30px;
  }


  .table-content {
    display: none;
    margin-bottom: 30px;
    padding: 30px;
    padding-left: 30px;
    background: rgb(0, 0, 0, 0.01);
  }
</style>

<div id="cheatsheetContent">
	
<?php 
echo unserialize($file['content'])['content']; 
?>
</div>


<script>
  $(document).ready(function() {
    $('div #cheatsheetContent table').each(function() {
      var $table = $(this);
      var $rows = $table.find('tbody tr');
      var $headerRow = $rows.eq(0);
      var $contentRow = $rows.eq(1);
      var $headerText = $headerRow.find('td').text();
      var $contentText = $contentRow.find('td').html();
      var $header = $('<div>').addClass('table-header').text($headerText);
      $header.html(" <i class='bx bxs-right-arrow'></i> &nbsp; " + $headerText);
      var $content = $('<div>').addClass('table-content').html($contentText);
      
      $table.replaceWith([$header, $content]);
      
      $header.on('click', function() {
        $content.slideToggle('medium');
      });
    });
  });
</script>

			<?php

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
  <source src="files/videos/<?php echo trim($file['files']);?>" type="video/mp4" />
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
					<a href="files/2023/<?php echo $file['category'].'/'.$a;?>" target='_blank'>
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

<?php if (logged_in() and $_SESSION['premium']==true){ 
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
	<i>You need to be logged in with an <a href="pricing">active subscription</a> to post a comment</i>
<?php } ?>



	</div>
<!-- END COMMENTS -->



</div>


<br>
<br>
<br>
<br>


<?php require "footer.php";?>