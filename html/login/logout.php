<?php 
require "../inc/conn.php";

if (isset($_SESSION['email'])) {
	$email = $_SESSION['email'];
	$sql = mysqli_query($conn, "UPDATE user_login SET cookie_id='1' WHERE email='$email'");

}

unset($_SESSION['first_name']);
unset($_SESSION['email']);


session_destroy();
setcookie('osce_id', $_COOKIE['osce_id'], time() - 3600, '/');

header("Location: ../");
exit();

?>