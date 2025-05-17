<?php 


	require_once "../inc/conn.php";
	require_once "../inc/variables.php";
	logged_in(true);



	if (!isset($_SESSION['admin']) OR $_SESSION['admin']==false) {
		header("Location: index");
		exit();
	}




if (post("title")) {
	// echo '<pre>';

	// print_r($_FILES);

  // Use a CSRF token to protect against CSRF attacks
  // if (isset($_POST['csrf_token']) && isset($_SESSION['csrf_token']) && $_POST['csrf_token'] == $_SESSION['csrf_token']){

	if(1){

	  $title = post("title");

	  $category = 'video';
	  $free = post("free");
	  $tags = post("tags");

	  $tags_file = "../inc/tags.json";
    $existingTags = [];
    if (file_exists($tags_file)) {
        $existingTags = json_decode(file_get_contents($tags_file), true);
    }
    $newTags = array_map('strtolower', array_filter(array_map('trim', explode(",", $tags))));

    // Remove duplicate tags
    $newTags = array_unique($newTags);

    $existingTags["tags"] = array_merge($existingTags["tags"], $newTags);
    file_put_contents($tags_file, json_encode($existingTags, JSON_PRETTY_PRINT));

	  $university = post("university");
	  $author = post("author");
	  $reviewer = post("reviewer");
	  $date_of_review = post("date_of_review");
	  $year = post("year");
	  $content = post('content');


	  $files = "";

	  $filename = $filetype = "";
	  $errors = array();


	if (post('add_new')) {
	if (!empty($_FILES)) {
	  $fileCount = count($_FILES['uploaded_file']['name']);
	  for ($i = 0; $i < $fileCount; $i++) {
	  	$u = uniqid();

	    // Validate the file
	    $filesize = $_FILES['uploaded_file']['size'][$i];
	    $filetmp = $_FILES['uploaded_file']['tmp_name'][$i];
	    $filetype = mime_content_type($filetmp);
	    $filename = $u.".".pathinfo($_FILES['uploaded_file']['name'][$i], PATHINFO_EXTENSION);
	    if ($filesize < 1000000000) {


			  $upload_path = '../files/videos/';
			  if (!file_exists($upload_path)) {
				mkdir($upload_path, 0777, true);
			  }
			  $upload_file = $upload_path . $filename;
			  if (move_uploaded_file($filetmp, $upload_file)) {
			  	// ! potential file name clash
			  	$files = $files.' '.$filename;
			  } else {
			    array_push($errors, "There was an error uploading the file.");
			  }
			} else {
			    array_push($errors, "File is greater than 10gb");
			  }

	    $filetype = mime_content_type($upload_file);
	    }
	}
	}

	if (count($errors) == 0) {
	    $user_id = $_SESSION['email'];
	    $time = time();


			if (post('add_new')) {
			// Prepare the SQL statement
			$sql = "INSERT INTO uploads (user_id, time_added, category, title, university, author, tags, reviewer, date_of_review, content, files, file_type, free) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
			$stmt = $conn->prepare($sql);

			// Bind the values to the parameters
			$stmt->bind_param("sssssssssssss", $user_id, $time, $category, $title, $university, $author, $tags, $reviewer, $date_of_review, $content, $files, $filetype, $free);

			// Execute the statement and check for errors
			if ($stmt->execute()) {
					
					$inserted_id = mysqli_insert_id($conn);
		    	header("Location: ?upload=success&edit=".$inserted_id);
		    	exit();

			} else {
			    array_push($errors, "Error inserting record: " . $mysqli->error);
			}

			}else if(post('edit')){

				$edit_id = get('edit');
				$sql = "UPDATE uploads SET time_added=?, category=?, title=?, university=?, author=?, tags=?, reviewer=?, date_of_review=?, content=?, free=? WHERE id=?";
				$stmt = $conn->prepare($sql);

				// Bind the values to the parameters
				$stmt->bind_param("sssssssssss", $time, $category, $title, $university, $author, $tags, $reviewer, $date_of_review, $content, $free, $edit_id);

				// Execute the statement and check for errors
				if ($stmt->execute()) {
				    if ($stmt->affected_rows > 0) {
				        array_push($errors, "Update Successful!");
				    } else {
				        array_push($errors, "No records were updated.");
				    }
				} else {
				    array_push($errors, "Error updating record: " . $mysqli->error);
				}

			}

	}else{
		print_r($errors);
	}

	// CSRF TOKEN 
		} else {
		  die('Invalid request.');
		}
  
  }


if (get('edit')) {
	$id = (int)filter_var(get('edit'), FILTER_SANITIZE_NUMBER_INT);
	$sql = "SELECT * FROM uploads WHERE id='$id'";
	$query = mysqli_query($conn, $sql);
	$file = mysqli_fetch_assoc($query);
}


	function fillform($e){
		global $file;
		if(get('edit')){
			echo $file[$e];
		}else if (isset($_POST[$e])) {
			echo $_POST[$e];
		}
	}

// check for duplicate uploads

$page_title = "Add Resource";
$nav = "Dashboard";

require_once "header.php"; 


$_SESSION['csrf_token'] = bin2hex(random_bytes(32));


?>


<div class="content content-dark">


<br>


<?php if (isset($errors)){foreach ($errors as $e) {?>
<div class="callout"><?php echo $e; ?></div>
<?php }} ?>

<?php if (get('upload')=='success'){?>
<div class="callout">Upload Successful! <a href="../resource?id=<?php echo $id;?>" style="border-bottom: 1px dashed rgb(0, 0, 0, 0.8);">View</a></div>
<?php } ?>



<form method="post" enctype="multipart/form-data">
<div style="max-width: 1200px;" class="row">

	<div class="col-sm-6">
		<div style="background: rgb(217,217,217,0.3);padding: 20px">

		<input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
			

		<?php if (get('edit')){ ?>
			<input type="hidden" name="edit" value="<?php echo softSan(get('edit')); ?>">
			<p><b>Edit Video</b></p>
		<?php } else{ ?>
			<input type="hidden" name="add_new" value="1">
			<p><b>Add a Video</b></p>
		<?php }?>

		<br>

		<p>Title of Video</p>
		<input class="form-control" name="title" value="<?php fillform('title')?>" required>

	    <br>

	    <div>Select Category  <a style="float: right;color: #31afb4;font-size: 12px;margin-top: 5px">Edit Categories</a></div>
	    <br>
	    <select class="form-control" name="category" required>
			<option value="video">Video</option>
	    </select>

		<br>
    
	    <p>Video Text Content</p>
	    
		  <script src="https://cdn.tiny.cloud/1/m3g5dx3oqe9t04rx2imglf5ohh8bdzgbcnybnwg3r50eag1s/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
	    <textarea style="height: 300px" name="content" class="form-control"><?php fillform('content')?></textarea>
			  <script>
			    tinymce.init({
			      selector: 'textarea',
			      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
			      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
			    });
			  </script>

	    <br>
	    
	<?php if (!get('edit')): ?>
		
	    <p>Add Video</p>

		<div id="upload-form">
		  <div class="drop-area">
		    <input type="file" name="uploaded_file[]" multiple id="file-input">
		    <p>Drag and drop files here or click to select files</p>
		  </div>
		  <div id="preview-area"></div>
		</div>



		<script type="text/javascript">
		const form = document.getElementById("upload-form");
		const fileInput = document.getElementById("file-input");
		const previewArea = document.getElementById("preview-area");

		const handlePreview = (file) => {
  if (file.type.match(/image.*/)) {
    const reader = new FileReader();
    reader.addEventListener("load", (e) => {
      const previewImage = document.createElement("img");
      previewImage.src = e.target.result;
      previewImage.classList.add("preview-image");
      const deleteButton = document.createElement("button");
	  deleteButton.classList.add("deleteprev");
      deleteButton.innerHTML = "<i class='icofont icofont-trash'></i>";
      deleteButton.addEventListener("click", () => {
        previewArea.removeChild(previewImage);
        deleteButton.remove();
      });
      previewArea.appendChild(previewImage);
      previewArea.appendChild(deleteButton);
    });
    reader.readAsDataURL(file);
  } else {
    const fileInfo = document.createElement("div");
    fileInfo.innerHTML = `${file.name} (${file.type})`;
    fileInfo.classList.add("filetype");
    const deleteButton = document.createElement("button");
    deleteButton.innerHTML = "<i class='icofont icofont-trash'></i>";
    deleteButton.addEventListener("click", () => {
      previewArea.removeChild(fileInfo);
      deleteButton.remove();
    });
    previewArea.appendChild(fileInfo);
    previewArea.appendChild(deleteButton);
  }
};


		form.addEventListener("drop", (e) => {
		  e.preventDefault();
		  fileInput.files = e.dataTransfer.files;
		  const files = fileInput.files;
		  for (let i = 0; i < files.length; i++) {
		    handlePreview(files[i]);
		  }
		});

		form.addEventListener("dragover", (e) => {
		  e.preventDefault();
		});

		fileInput.addEventListener("change", () => {
		  const files = fileInput.files;
		  for (let i = 0; i < files.length; i++) {
		    handlePreview(files[i]);
		  }
		});

		</script>

	<?php endif ?>

		<br>
		
		</div>

	</div>	
	

	<div class="col-sm-6">
		<div style="background: rgb(217,217,217,0.3);padding: 20px">

		<p>File Details</p>
		<br>
	    
<!-- 	    <p>free</p>
	    <div class="input-group mb-3">
		  <div class="input-group-prepend">
		    <span class="input-group-text">£</span>
		  </div>
		  <input type="text" class="form-control" aria-label="Amount" name="free" required>
		  <div class="input-group-append">
		    <span class="input-group-text">.00</span>
		  </div>
		</div> -->


	    <p>Which University is this from?</p>
	    <select class="form-control" name="university" required>
	      <option value="all">All Universities</option>
	      <?php 
	      foreach ($pharmacy_schools as $p) {
	        ?>
	      <option value="<?php echo $p;?>"><?php echo $p;?></option>
	        <?php
	      }
	       ?>
	    </select>

		<br>
	    <br>

	    <p>Tags</p>
	    <input type="" class="form-control" name="tags" value="<?php fillform('tags')?>">
	    </select>

	    <br>

	    <p>Author</p>
	    <input type="" class="form-control" name="author" value="<?php fillform('author')?>">

	    <br>

	    <p>Reviewer</p>
	    <input type="" class="form-control" name="reviewer" value="<?php fillform('reviewer')?>">

	    <br>

	    <p>Date of Review</p>
	    <input type="" class="form-control" name="date_of_review" value="<?php fillform('date_of_review')?>">


		</div>	

	    <br>
	    Free?
	    <br>
	    <label for="yes" style="cursor: pointer;"><input type="radio" name="free" value="yes" id="yes" <?php if(get('edit')){if($file['free']=="yes"){echo "checked";}}?>> Yes</label>
	    &nbsp;&nbsp;&nbsp;&nbsp;
	    <label for="no" style="cursor: pointer;"><input type="radio" name="free" value="no" id="no" <?php if(get('edit')){if($file['free']=="no"){echo "checked";}}else{echo "checked";}?>> No</label>
	    <br>
	    <br>


<?php if (get('edit')){ ?>
  <button class="btn btn-secondary" type="submit" style="padding: 10px 0;width: 100%">UPDATE</button>
<?php } else{?>
  <button class="btn btn-secondary" type="submit" style="padding: 10px 0;width: 100%">UPLOAD</button>
<?php } ?>

	</div>	


</div>
</form>


<br>
<br>
<br>


</div>

<?php require "footer.php";?>