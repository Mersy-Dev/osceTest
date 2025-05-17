<?php 


	require_once "../inc/conn.php";
	require_once "../inc/variables.php";


	logged_in(true);

// echo $_SESSION['admin'];
	if (!isset($_SESSION['admin']) OR $_SESSION['admin']==false) {
		header("Location: index");
		exit();
	}
	



	// print_r($_POST);
	// exit();


if (post("title")) {
	// echo '<pre>';

	// print_r($_FILES);

  // Use a CSRF token to protect against CSRF attacks
  // if (isset($_POST['csrf_token']) && isset($_SESSION['csrf_token']) && $_POST['csrf_token'] == $_SESSION['csrf_token']){

	if(1){

	  $title = post("title");

	  // this is a disaster waiting to happen
	  // $content = post("content");
	  $content_array = array(
	  	"summary" => post('summary'),
	  	"student_instructions" => post('student_instructions'),
	  	"actor_instructions" => post('actor_instructions'),
	  	"mark_scheme" => post('mark_scheme')
	  );
	  $content = serialize($content_array);



	  $category = 'scenario';
	  $free = softSan(post("free"));
	  $ai = softSan(post("ai"));
	  $tags = softSan(post("tags"));

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

	  $university = softSan(post("university"));
	  $author = softSan(post("author"));
	  $reviewer = softSan(post("reviewer"));
	  $date_of_review = softSan(post("date_of_review"));
	  $year = softSan(post("year"));
	  $difficulty = softSan(post("difficulty", true));
	  $diagnosis = softSan(post("diagnosis"), true);

	  if (empty($difficulty)) {
	  	$difficulty = 1;
	  }

		$files = "";

		$files_old = post('files_old');

		// $files_old_array = implode(' ', $files_old);
		if (!empty($files_old)) {
			foreach ($files_old as $f_o) {
				$files .= " ".trim(softSan($f_o));
			}
		}


		$filename = $filetype = "";
		$errors = array();

		if (!empty($_FILES['uploaded_file']['name'][0])) {
		    $fileCount = count($_FILES['uploaded_file']['name']);
		    for ($i = 0; $i < $fileCount; $i++) {
		        $u = uniqid();

		        // Validate the file
		        $filesize = $_FILES['uploaded_file']['size'][$i];
		        $filetmp = $_FILES['uploaded_file']['tmp_name'][$i];
		        $filetype = mime_content_type($filetmp);
		        $filename_i = str_replace(' ', '_', (trim($_FILES['uploaded_file']['name'][$i])));
		        $filename = $filename_i."_".$u . "." . pathinfo($_FILES['uploaded_file']['name'][$i], PATHINFO_EXTENSION);

		        // if (in_array($filetype, ['image/jpeg', 'image/png', 'image/gif', 'application/pdf'])) {
		        if (1) {
		            if ($filesize < 50000000) {
		                $upload_path = '../files/2023/scenario/';
		                if (!file_exists($upload_path)) {
		                    mkdir($upload_path, 0777, true);
		                }
		                $upload_file = $upload_path . $filename;
		                if (move_uploaded_file($filetmp, $upload_file)) {
		                    // ! potential file name clash
		                    $files = $files . ' ' . $filename;
		                } else {
		                    array_push($errors, "There was an error uploading the file.");
		                }
		            } else {
		                array_push($errors, "File is greater than 50mb");
		            }
		        } else {
		            array_push($errors, "Unsupported file format: $filetype");
		        }
		    }
		}

		$filetype = "";

	if (count($errors) == 0) {
	    $user_id = $_SESSION['email'];
	    $time = time();

			if (post('add_new')) {
					// code...
				// Prepare the SQL statement
				$sql = "INSERT INTO uploads (user_id, time_added, category, title, diagnosis, university, author, tags, reviewer, date_of_review, content, files, file_type, free, ai, difficulty) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
				$stmt = $conn->prepare($sql);

				// Bind the values to the parameters
				$stmt->bind_param("sssssssssssssss", $user_id, $time, $category, $title, $diagnosis, $university, $author, $tags, $reviewer, $date_of_review, $content, $files, $filetype, $free, $ai, $difficulty);

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
				$sql = "UPDATE uploads SET category=?, title=?, diagnosis=?, university=?, author=?, tags=?, reviewer=?, date_of_review=?, content=?, files=?, file_type=?, free=?, ai=?, difficulty=? WHERE id=?";
				$stmt = $conn->prepare($sql);

				// Bind the values to the parameters
				$stmt->bind_param("sssssssssssssss", $category, $title, $diagnosis, $university, $author, $tags, $reviewer, $date_of_review, $content, $files, $filetype, $free, $ai, $difficulty, $edit_id);

				// Execute the statement and check for errors
				if ($stmt->execute()) {
				    if ($stmt->affected_rows > 0) {
				        array_push($errors, "Update Successful! <br><a target='blank' href='../resource?id=$edit_id' style='border-bottom: 1px dashed rgb(0, 0, 0, 0.8);'>View</a>");
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
		  // die('Invalid request.');
		}
  
  }

$_SESSION['csrf_token'] = bin2hex(random_bytes(32));





if (get('edit')) {
	$id = (int)filter_var(get('edit'), FILTER_SANITIZE_NUMBER_INT);
	$sql = "SELECT * FROM uploads WHERE id='$id'";
	$query = mysqli_query($conn, $sql);
	$file = mysqli_fetch_assoc($query);

	$c = unserialize($file['content']);
	$file['summary'] = $c['summary'];
	$file['student_instructions'] = $c['student_instructions'];
	$file['actor_instructions'] = $c['actor_instructions'];
	$file['mark_scheme'] = $c['mark_scheme'];

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


// print_r($_POST);

?>


<div class="content content-dark" style="max-width:1500px;">



<br>

<?php if (isset($errors)){foreach ($errors as $e) {?>
<div class="callout"><?php echo $e; ?></div>
<?php }} ?>


<?php if (get('upload')=='success'){?>
<div class="callout">Upload Successful! <a href="../resource?id=<?php echo $id;?>" style="border-bottom: 1px dashed rgb(0, 0, 0, 0.8);">View</a></div>
<?php } ?>

<br>
<br>

<form method="post" enctype="multipart/form-data">
<div style="max-width: 1500px;margin: auto;background: rgb(217,217,217,0.3);padding: 40px" class="row">

		<div style="">

		<input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">


		<?php if (get('edit')){ ?>
			<input type="hidden" name="edit" value="<?php echo softSan(get('edit')); ?>">
			<p><b>Edit Scenario</b></p>
		<?php } else{ ?>
			<input type="hidden" name="add_new" value="1">
			<p><b>Add a Scenario</b></p>
		<?php }?>


			

		<br>

		<p>Title of Scenario</p>
		<input class="form-control" name="title" value="<?php fillform('title')?>" required>

		<br>

		<p>Diagnosis</p>
		<input class="form-control" name="diagnosis" value="<?php fillform('diagnosis')?>">

		<br>
	    


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


	    <br>
    
	    <p>Scenario Content</p>

	    <br>

	    <p>Summary</p>
	    <textarea name="summary"><?php fillform('summary');?></textarea>

	    <br>
	    <br>

	    <p>Student Instructions</p>
	    <textarea name="student_instructions"><?php fillform('student_instructions');?></textarea>

	    <br>
	    <br>

	    <p>Actor Instructions</p>
	    <textarea name="actor_instructions"><?php fillform('actor_instructions');?></textarea>

	    <br>
	    <br>

	    <p>Mark Scheme</p>
	    <textarea name="mark_scheme"><?php fillform('mark_scheme');?></textarea>


	    <br>

		  <!-- <script src="https://cdn.tiny.cloud/1/m3g5dx3oqe9t04rx2imglf5ohh8bdzgbcnybnwg3r50eag1s/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script> -->
		  <script src="tinymce.min.js" referrerpolicy="origin"></script>
	    <!-- <textarea style="height: 300px" name="content" class="form-control"><?php fillform('content')?></textarea> -->
		<script>
		tinymce.init({
			selector: 'textarea',
			plugins: 'anchor autolink charmap codesample emoticons link lists image media searchreplace table visualblocks wordcount',
			toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
			document_base_url : '<?php echo $url;?>',
			images_upload_url: 'imageAcceptor.php',
			relative_urls : false,
			remove_script_host : false,
			convert_urls : true,

		});
		</script>


	    <br>
	    Free?
	    <br>
	    <label for="yes1" style="cursor: pointer;"><input type="radio" name="free" value="yes" id="yes1" <?php if(get('edit')){if($file['free']=='yes'){echo "checked";}}?>> Yes</label>
	    &nbsp;&nbsp;&nbsp;&nbsp;
	    <label for="no1" style="cursor: pointer;"><input type="radio" name="free" value="no" id="no1" <?php if(get('edit')){if($file['free']=="no"){echo "checked";}}else{echo "checked";}?>> No</label>
	    <br>
	    <br>

	    AI?
	    <br>
	    <label for="yes2" style="cursor: pointer;"><input type="radio" name="ai" value="yes" id="yes2" <?php if(get('edit')){if($file['ai']=='yes'){echo "checked";}}?>> Yes</label>
	    &nbsp;&nbsp;&nbsp;&nbsp;
	    <label for="no2" style="cursor: pointer;"><input type="radio" name="ai" value="no" id="no2" <?php if(get('edit')){if($file['ai']=="no"){echo "checked";}}else{echo "checked";}?>> No</label>
	    <br>
	    <br>

	    Difficulty 
		<!-- (Beginner (1), Intermediate (2), Advanced (3)) -->
	    <br>
	    <label for="diff1" style="cursor: pointer;"><input type="radio" name="difficulty" value="1" id="diff1" <?php if(get('edit')){if($file['difficulty']=='1'){echo "checked";}}?>> Beginner</label>
	    &nbsp;&nbsp;&nbsp;&nbsp;
	    <label for="diff2" style="cursor: pointer;"><input type="radio" name="difficulty" value="2" id="diff2" <?php if(get('edit')){if($file['difficulty']=='2'){echo "checked";}}?>> Intermediate</label>
	    &nbsp;&nbsp;&nbsp;&nbsp;
	    <label for="diff3" style="cursor: pointer;"><input type="radio" name="difficulty" value="3" id="diff3" <?php if(get('edit')){if($file['difficulty']=='3'){echo "checked";}}?>> Expert</label>
	    <br>
	    <br>



<p> Attachments</p>

<!-- <div id="upload-form">
  <div class="drop-area">
    <input type="file" name="uploaded_file[]" multiple id="file-input">
    <p>Drag and drop files here or click to select files</p>
  </div>
  <div id="preview-area"></div>
</div> -->

<?php if (get('edit')){ 

	$files = explode(' ', trim($file['files']));

	foreach ($files as $a) {
		if (!empty($a)) {
		?>
			<div class="attachment-div" id="files_old_<?php echo explode('.', $a)[0];?>">
				<a style="color:#fff" href="../files/2023/<?php echo $file['category'].'/'.$a;?>" target='_blank'><div class="attachment-text"><?php echo $a; ?></div></a>
				<div class="attachment-icon">
					<i class='bx bxs-trash' onclick="$('#files_old_<?php echo explode('.', $a)[0];?>').remove()"></i>
				</div>
				<input type="hidden" value="<?php echo $a;?>" name="files_old[]">
			</div>
	<?php 
				}
			}
	}
	?>


    <div id="imageInputs">
      <input type="file" name="uploaded_file[]" id="imageUpload">
    </div>

    <br>
    <button type="button" class="btn" onclick="addImageInput()">+ Add</button>
    <button type="button" class="btn" onclick="removeImageInput()">- Delete</button>


  <script>
    function addImageInput() {
      var imageInputs = document.getElementById('imageInputs');
      if (imageInputs.childElementCount < 10) {
        var newInput = document.createElement('input');
        newInput.type = 'file';
        newInput.name = 'uploaded_file[]';
        imageInputs.appendChild(newInput);
      } else {
        // alert('You can upload up to 10 files only.');
      }
    }

    function removeImageInput() {
      var imageInputs = document.getElementById('imageInputs');
      var inputs = imageInputs.getElementsByTagName('input');
      if (inputs.length > 1) {
        imageInputs.removeChild(inputs[inputs.length - 1]);
      }
    }
  </script>



		<br>


		</div>	
		</div>	

	    <br>
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

<script>
	$(document).ready(function(){
		setTimeout(function(){
			$('.tox-notifications-container').hide();
		}, 1000);
	});
</script>
<?php require "footer.php";?>