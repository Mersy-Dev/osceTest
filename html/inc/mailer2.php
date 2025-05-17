<?php 

// requires
// mail_content_title, mail_content_message, mail_firstname,
// mail_target, mail_subject

$mail_message = "
<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<title>OSCE Toolbox</title>

	<link href='https://fonts.googleapis.com/css2?family=Nunito:wght@300;400&display=swap' rel='stylesheet'>
</head>

<style type='text/css'>
	
.main-search-btn{
	background: #31AFB4;
	color: #fff;
	border-radius: 5px;
	border: 2px solid #31afb4;
	padding: 8px 16px;
	font-weight: 400;
	transition: 0.3s;
}.main-search-btn:hover{
	background: #EF798A;
	color: #000;
	border-color: #000;
}

a{
	color: #EF798A;
	font-weight: bolder;
	text-decoration: none;
}
</style>
<body style=\"background: #31afb4;color: #fff;font-size:20px;font-family: 'Nunito', sans-serif;\">

	<br>
	<br>
	<br>

	<div style='margin:auto;width:80%;max-width:600px;background: #fff;padding: 50px;padding-right: 70px;border-radius: 20px;'>

	<a href='$url'><img src='.$url.'assets/img/logo-full-white.png' style='height: 30px;'></a>

	<div style='color: #EF798A;font-size: 26px;margin-top: 30px;font-weight: bolder;'>$mail_content_title</div>

	<div style='margin-top: 20px;line-height: 1.3em;color: rgb(0,0,0,0.7);'>
	$mail_content_message
	</div>
	</div>

	<br>
	<br>
	<div style='text-align:center;font-size: 12px;color: #fff;'>
	Want to change how you receive emails?
	You can <a href='https://oscetoolbox.com/dashboard/account-settings' style='color:#fff;text-decoration:underline;font-weight: normal;'>unsubscribe here</a></div>

	<br>
	<br>
	<br>
	<br>
	<br>

	&nbsp;
</body>
</html>
";

// To send HTML mail, the Content-type header must be set
$mail_headers  = 'MIME-Version: 1.0' . "\r\n";
$mail_headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
if (isset($mail_firstname) AND $mail_firstname!=='') {
	$mail_headers .= "To: $mail_firstname <$mail_target>" . "\r\n";
}
$mail_headers .= "From: OSCE Toolbox <noreply@oscetoolbox.com>" . "\r\n";

// Mail it
mail($mail_target, $mail_subject, $mail_message, $mail_headers);


 ?>