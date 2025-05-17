<?php 

require_once "../inc/conn.php";
require_once "../header.php";

 ?>


<style>
  a{
    text-decoration:underline
  }

  h5{
    font-weight:bolder;
    color:#31afb4;
  }

  .title{
    color: #EF798A;
  }

.container {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
}

.post {
    padding: 20px;
    flex: 1 1 calc(33.333% - 20px);
	transition: 0.3s;
}

.post-img{
	width: 100%;
	height: 250px;
	background: grey;
	border-radius: 20px;
}

.post h2 {
	margin-bottom: 10px;
	transition: 0.3s;
}

.post-time{
	border-radius: 30px;
	border: 1px solid #31afb4;
	display: inline-block;
	padding: 5px 20px;
	font-size: 14px;
	margin-bottom: 20px;
}

.post-content{
	padding: 20px 10px;
}

.post:hover h2{
	color: #31afb4;
}

a{
	text-decoration: none;
	color: #000;
}

/* Responsive Styles */
@media (max-width: 992px) {
    .container {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .container {
        grid-template-columns: 1fr;
    }
}

</style>

  <br>
  <br>
  <div class="title">Articles</div>



<br>
<br>
<br>
<div class="container">


<?php

	$sql = "SELECT * FROM articles WHERE hidden='0' ORDER BY id DESC";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()) {
		$id = $row['id'];
		$title = $row['title'];
		$author = $row['author'];
		$content = $row['content'];
		$slug = $row['slug'];
		$image = $row['image'];
		$date = $row['time_added'];
		$timestamp = strtotime($date);
		$date = date("d F", $timestamp);
		$excerpt = substr($content, 0, 100);
		$excerpt = substr($excerpt, 0, strrpos($excerpt, ' '));
		$excerpt = $excerpt . "...";
		?>

		<a href="<?php echo $slug;?>">
			<div class="post">
			<div class="post-img" style="background: url(images/<?php echo $image;?>) center no-repeat;background-size:cover"></div>
			<div class="post-content">
				<div class="post-time"><?php echo $date;?></div>
				<h2><?php echo $title;?></h2>
			</div>
		</div>
		</a>

		<?php
	}
?>





<a href="how-to-study-drugs">
	<div class="post">
	<div class="post-img" style="background: url(images/66830214af76d.jpg) center no-repeat;background-size:cover"></div>
	<div class="post-content">
		<div class="post-time">01 July</div>
		<h2>How to study drugs</h2>
	</div>
</div>
</a>


</div>


<br>
<br>
<br>
<br>
<br>
<br>
<br>




 <?php require "../footer.php"; ?>