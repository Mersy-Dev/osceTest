<?php 


	require_once "../inc/conn.php";
	require_once "../inc/variables.php";
	logged_in(true);

	function fillform($e){
		if (isset($_POST[$e])) {
			echo $_POST[$e];
		}
	}

	$admins_json = json_decode(file_get_contents("../inc/admins.json"));
	$admins =array();
	$is_admin = false;

	foreach ($admins_json as $a => $b) {
		$admins[] = $a;
		if($_SESSION['email'] == $a){
			$is_admin = true;
		}
	}

	if(!isset($is_admin) or $is_admin==false){
		header("Location: index");
		exit();
	}

// print_r($_POST);



$files = "";
$errors = array();

$filename = $filetype = "";


if (!empty($_FILES)) {
	// print_r($_FILES['file']);
  // $fileCount = count($_FILES['file']['name']);

  	$u = uniqid();

    // Validate the file
    $filesize = $_FILES['file']['size'];
    $filetmp = $_FILES['file']['tmp_name'];
    $filetype = mime_content_type($filetmp);
    $filename = $u.".".pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    if ($filesize < 10000000) {

	// CHECK FILE TYPE

		  $upload_path = '../files/images/';
		  if (!file_exists($upload_path)) {
			mkdir($upload_path, 0777, true);
		  }
		  $upload_file = $upload_path . $filename;
		  if (move_uploaded_file($filetmp, $upload_file)) {
		  	// ! potential file name clash
		  	$files = $files.' '.$filename;
		  	$result = array("location"=>$url.'files/images/'.$filename);
		  	header('Content-type: application/json');
			echo json_encode($result);

		  } else {
		    array_push($errors, "There was an error uploading the file.");
		  }
		} else {
		    array_push($errors, "File is greater than 10mb");
		  }

}


?>
