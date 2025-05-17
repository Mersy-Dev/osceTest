<?php 

require_once "../inc/conn.php";
require_once "../header.php";

logged_in(true);

$admins_json = json_decode(file_get_contents("../inc/admins.json"));
$admins =array();
$is_admin = false;

// SQL format
// INSERT INTO `articles`(`id`, `title`, `author`, `time_added`, `content`, `slug`, `views`, `image`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]')


foreach ($admins_json as $a => $b) {
    $admins[] = $a;
    if($_SESSION['email'] == $a){
        $is_admin = true;
    }
}

if(!isset($is_admin) or $is_admin==false){
	header("Location: ../");
	exit();
}


$errors = array();

if (post("title")) {

	// if (isset($_POST['csrf_token']) && isset($_SESSION['csrf_token']) && $_POST['csrf_token'] == $_SESSION['csrf_token']){
	

	$title = softSan(post("title"));
	$content = mysqli_real_escape_string($conn, (post("content")));
	$author = softSan(post("author"));
	$image = "none";
	$views = 0;

	$style = post("style");
	// style should be 1 or 2
	if ($style != 1 && $style != 2) {
		$style = 1;
	}


	$slug = strtolower(str_replace(" ", "-", $title));
	$slug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug);

	
	if (!empty($_FILES['uploaded_file']['name'][0])) {
		
		// Validate the file
		$filesize = $_FILES['uploaded_file']['size'][0];
		$filetmp = $_FILES['uploaded_file']['tmp_name'][0];
		$filetype = mime_content_type($filetmp);
		$filename = uniqid(). "." . pathinfo($_FILES['uploaded_file']['name'][0], PATHINFO_EXTENSION);;


		if (in_array($filetype, ['image/jpeg', 'image/png', 'image/gif', 'application/pdf'])) {

			if ($filesize < 1000000) {

				$upload_path = 'images/';
				if (!file_exists($upload_path)) {
					mkdir($upload_path, 0777, true);
				}
				$upload_file = $upload_path . $filename;
				// echo $filetmp;
				echo $upload_file;
				if (move_uploaded_file($filetmp, $upload_file)) {
					// echo "File uploaded successfully";

				} else {
					// get error
					array_push($errors, "There was an error uploading the file.");
			}

			} else {
				array_push($errors, "File is greater than 1mb");
			}

		} else {
			array_push($errors, "Unsupported file format: $filetype");
		}
	}else{
		if (post('filename')) {
			$filename = softSan(post('filename'));
		}else{
			$filename = "";
		}
	}

	if (count($errors) == 0) {

		
		if (post('add_new')) {

			$sql = "INSERT INTO `articles`(`title`, `author`, `content`, `slug`, `style`, `views`, `image`) VALUES ('$title','$author','$content','$slug','$style','$views','$filename')";
			$result = $conn->query($sql);
			if ($result) {
				// echo "Article uploaded successfully";
			} else {
				array_push($errors, "There was an error uploading the article");
			}
		
		}else if(post('edit')){
			$id = (int)filter_var(get('edit'), FILTER_SANITIZE_NUMBER_INT);
			$sql = "UPDATE `articles` SET `title`='$title',`author`='$author',`content`='$content',`slug`='$slug',`style`='$style',`image`='$filename' WHERE id='$id'";
			$result = $conn->query($sql);
			if ($result) {
				// echo "Article updated successfully";
			} else {
				array_push($errors, "There was an error updating the article");
			}
		}
	}

	// }else{
	// 	array_push($errors, "CSRF token mismatch");
	// }

}



if (get('edit')) {
	$id = (int)filter_var(get('edit'), FILTER_SANITIZE_NUMBER_INT);
	$sql = "SELECT * FROM articles WHERE id='$id'";
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
 ?>

<link href="articles.css" rel="stylesheet">


<form method="post" enctype="multipart/form-data">
<div style="width:85%;max-width: 1200px;margin:auto">

<br>
<br>
<br>
<br>


<?php if (isset($errors) and count($errors)>0){?>
	<div class="callout">Not uploaded</div>
	<?php foreach ($errors as $e) {?>
<div class="callout"><?php echo $e; ?></div>
<?php }} ?>



<?php if (get('edit')){ ?>
	<input type="hidden" name="edit" value="<?php echo softSan(get('edit')); ?>">
	<div class="title">Edit Article</div>
	<?php } else{ ?>
		<input type="hidden" name="add_new" value="1">
		<div class="title">Add New Article</div>
<?php }?>
<br><br>

<p>Add Featured Image</p>

<div id="upload-form">
	<div class="drop-area" id="drop-area">
	<input type="file" name="uploaded_file[]" multiple id="file-input">
	<p>Drag and drop files here or click to select files</p>
	</div>
	<div id="preview-area"></div>
</div>

<?php if(get('edit')){
	if($file['image'] != "none"){?>
		<br><br><br>

		<div class="preview-area">
			<img src="images/<?php echo $file['image']; ?>" class="preview-image">
			<button class="deleteprev"><i class='bx bx-trash'></i></button>
		</div>
		<input type="hidden" name="filename" value="<?php fillform('image');?>" hidden>

	<?php }
}?>


<br><br><br>





<p>Title of Article</p>
<input class="form-control" name="title" id="title" value="<?php fillform('title')?>" required>
<div style="font-style: italic;margin-top:10px;font-size:14px"><?php echo $url;?>articles/<span id="slug"><?php fillform('slug');?></span></div>

<br>
<br>


<p>Author</p>
<input class="form-control" name="author" value="<?php fillform('author')?>" required>

<br>
<br>

<p>Content</p>
<textarea name="content"><?php fillform('content');?></textarea>

<br>
<br>
<br>

<p>Article Style</p>

<?php 
$style = 1;
if(get('edit')){
	$style = $file['style'];
}
if (isset($_POST['style'])) {
	$style = $_POST['style'];
}
?>	

<label style="cursor:pointer">
<input type="radio" name="style" value="1" <?php if($style==1){echo 'checked';}?>> Style 1
</label>

&nbsp;&nbsp;&nbsp;&nbsp;

<label style="cursor:pointer">
<input type="radio" name="style" value="2" <?php if($style==2){echo 'checked';}?>> Style 2
</label>

<br>
<br>
<br>
<br>
<br>


<?php if (get('edit')){ ?>
  <button class="btn btn-secondary" id="submit" type="submit" style="padding: 10px 0;width: 100%">UPDATE</button>
<?php } else{?>
  <button class="btn btn-secondary" id="submit" type="submit" style="padding: 10px 0;width: 100%">UPLOAD</button>
<?php } ?>


<br>
<br>
<br>
<br>
<br>
<br>

</div>
<?php $_SESSION['csrf_token'] = bin2hex(random_bytes(32));?>
<input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
</form>



<script>
	$('#title').on('input', function() {
		var title = $('#title').val();
		var slug = title.replace(/\s+/g, '-').toLowerCase();
		$('#slug').html(slug);
		console.log(slug);
	});

	$('#submit').on('click', function() {
		// submit form
		form.submit();
	});
</script>



<!-- <script src="https://cdn.tiny.cloud/1/m3g5dx3oqe9t04rx2imglf5ohh8bdzgbcnybnwg3r50eag1s/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script> -->

<script src="../dashboard/tinymce.min.js"></script>
<script>
	tinymce.init({
		selector: 'textarea',
		plugins: 'anchor autolink charmap codesample emoticons link lists image media searchreplace table visualblocks wordcount',
		toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
		document_base_url : '<?php echo $url;?>',
		images_upload_url: 'imageAcceptor.php',

	});
</script>



<script>

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
      deleteButton.innerHTML = "<i class='bx bx-trash'></i>";
      deleteButton.addEventListener("click", () => {
        previewArea.removeChild(previewImage);
        deleteButton.remove();
		document.getElementById("drop-area").style.display = "block";
      });
      previewArea.appendChild(previewImage);
      previewArea.appendChild(deleteButton);
	  document.getElementById("drop-area").style.display = "none";
    });
    reader.readAsDataURL(file);
  } else {
    const fileInfo = document.createElement("div");
    fileInfo.innerHTML = `${file.name} (${file.type})`;
    fileInfo.classList.add("filetype");
    const deleteButton = document.createElement("button");
    deleteButton.innerHTML = "<i class='bx bx-trash'></i>";
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


<script>
	$(document).ready(function(){
		setTimeout(function(){
			$('.tox-notifications-container').hide();
		}, 1000);
	});
</script>


<?php require_once "../footer.php"; ?>