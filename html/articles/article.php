<?php 

require_once "../inc/conn.php";


// Get the slug from the URL
$slug = isset($_GET['slug']) ? $_GET['slug'] : '';

if(!empty($slug)){

  $slug = softSan($slug);

	$sql = "SELECT * FROM articles WHERE slug = '$slug'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
      $id = $row['id'];
			$title = $row['title'];
			$author = $row['author'];
			$time_added = $row['time_added'];
			$content = $row['content'];
			$slug = $row['slug'];
			$views = $row['views'];
			$image = $row['image'];
			$style = $row['style'];
		}
	}else {
        header("Location: not-found.php");
        exit();
      }
    } else {
      header("Location: not-found.php");
      exit();
}



require_once "../header.php";
 ?>



<?php

if($style == "2"){

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

  .blue{
	background: rgb(0, 0, 0, 0.05);
	padding: 70px 0;
  }

  .blog-content{
	font-size: 20px;
	max-width: 1200px;
	margin: auto;
  }

  
/* Responsive Styles */
@media (max-width: 575px) {
    .header-central {
		text-align: center;
    }
}


</style>

  <div class="blue">
	<div class="container">
		<div class="row">
		<div class="col-sm-6 header-central">
			<br>
			<br>
			<br>
			<br>
			<h1><?php echo $title; ?></h1>
			<h5 style="font-style: italic;"><?php echo $author; ?></h5>
			<br>
			<br>
			<br>
		</div>
		<div class="col-sm-6">
			<img src="images/<?php echo $image;?>" style='width:95%'>
		</div>
		</div>
	</div>
  </div>


<br>
<br>
<br>

    
<div class="container blog-content">
  

<?php if((isset($_SESSION['admin']) AND $_SESSION['admin']==true)){?>
			<a href="content-writer?edit=<?php echo $id;?>"><div class="nav-btn" style="float:right;padding: 5px 10px;margin-right: -30px;">Edit <i class='bx bx-pencil' ></i></div></a>
		<?php } ?>


<?php echo $content; ?>


</div>

<?php }else{ ?>

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

  body{
/*    background: #f5f5f5;*/
  }

  b{
  	color: #EF798A;
  }

</style>

	

	<br>
  <br>
  <div class="title"><?php echo $title;?></div>
  <div style="text-align:center;font-weight: bolder;color: rgb(0, 0, 0, 0.4);"><?php echo date('d F Y', strtotime($time_added)); ?></div>


  

<br>
<br>
<br>


<div style="width:90%;max-width:1000px;margin:auto;" class="content-resource">
    
  <?php if((isset($_SESSION['admin']) AND $_SESSION['admin']==true)){?>
        <a href="content-writer?edit=<?php echo $id;?>"><div class="nav-btn" style="padding: 5px 10px;margin:auto">Edit <i class='bx bx-pencil' ></i></div></a>
        <div class="clear"></div><br><br>
      <?php } ?>
    
  <?php echo $content; ?>

</div>


<?php } ?>



<br>
<br>
<br>
<br>
<br>
<br>
<br>




 <?php require "../footer.php"; ?>