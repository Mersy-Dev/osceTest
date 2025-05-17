<?php

// error_reporting(E_ALL);
// ini_set('display_errors', '1');



ob_start();
session_start(); 

date_default_timezone_set("Africa/Lagos");


$url='https://oscetoolbox.com/';
if ($_SERVER['SERVER_NAME']=='localhost') {
	$url='http://localhost/osce/osce/';
	$conn = new mysqli('localhost', 'root', '', 'osce');
}else{
	$conn = new mysqli('localhost', 'root', 'efj9238ndjsdjsdn282jsds', 'oscedb');
}

    
if (!isset($_SESSION['email']) or empty($_SESSION['email'])){

if (isset($_COOKIE['osce_id'])){
    $cookit=$_COOKIE['osce_id'];
    if($coksql=mysqli_query($conn,"SELECT email, cookie_expiry FROM user_login WHERE cookie_id='$cookit'")){

        
    if ($coksql->num_rows==1){
    $cookres = array();

    while($x=mysqli_fetch_assoc($coksql)){
    $cookres[]=$x;
        }              
    $email=$cookres[0]['email'];
    $expiry=$cookres[0]['cookie_expiry'];

    $time=time();
    if ($expiry>$time) {
      
        $last_date_cook = date("h:ia d M Y", time());
        $g = mysqli_query($conn, "UPDATE user_login SET last_login=CURRENT_TIMESTAMP WHERE email='$email'");

        $first_name = mysqli_fetch_assoc(mysqli_query($conn, "SELECT first_name FROM user_info WHERE email='$email'"))['first_name'];

        $_SESSION['email']=$email;
        $_SESSION['first_name']=$first_name;


        $query = mysqli_query($conn, "SELECT id FROM user_payments WHERE email='$email' and period_end_timestamp>$time LIMIT 0,1");

        if ($query->num_rows > 0) {
            $_SESSION['premium']=true;
        }else{
            $_SESSION['premium']=false;
            // $_SESSION['premium']=true;
        }


        // ADMIN Session
        $admins_json = json_decode(file_get_contents(dirname(__FILE__)."/admins.json"));
        $admins =array();

        $_SESSION['admin']=false;

        foreach ($admins_json as $a => $b) {
            $admins[] = $a;
            if($email == $a){
                $_SESSION['admin'] = true;
            }
        }



          }
        }

    }
}
}



function post($str, $null=false){
	if (isset($_POST[$str]) and !empty($_POST[$str])) {
		return $_POST[$str];
	}elseif ($null==true) {
		return '';
	}else{
		return false;
	}
}

function get($str, $null=false){
	if (isset($_GET[$str]) and !empty($_GET[$str])) {
		return $_GET[$str];
	}elseif ($null==true) {
		return '';
	}else{
		return false;
	}
}

function softSan($str){
  global $conn;
	return $str;
}

function checkpost($e){
		$ret = true;
    // print_r($e);
	foreach ($e as $a) {
		if (!post($a)){
			$ret = false;
			// echo $a;
		}
	}	
		return $ret;
 }

 function logged_in($r=false){
 	global $url;
 	if (isset($_SESSION['email']) and !empty($_SESSION['email'])) {
 		return true;
 	}elseif($r==true){
 		header("Location:".$url."login");
 		exit();
 	}
 	else{
 		return false;
 	}
 }


function time_elapsed_string($time) {
      $since = time() - $time;
        $chunks = array(
        array(60 * 60 * 24 * 365 , 'year'),
        array(60 * 60 * 24 * 30 , 'month'),
        array(60 * 60 * 24 * 7, 'week'),
        array(60 * 60 * 24 , 'day'),
        array(60 * 60 , 'hour'),
        array(60 , 'minute'),
        array(1 , 'second')
    );

    for ($i = 0, $j = count($chunks); $i < $j; $i++) {
        $seconds = $chunks[$i][0];
        $name = $chunks[$i][1];
        if (($count = floor($since / $seconds)) != 0) {
            break;
        }
    }

    $print = ($count == 1) ? '1 '.$name : "$count {$name}s";
    return $print;
}



function simple_crypt( $string, $action = 'e' ) {


    $secret_key = '38cLDvhotjhjv90&76767zzzragrakoloAWESOME#))!*&KD2k';
    $secret_iv = 'iv_dexter20c';
 
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $key = hash( 'sha256', $secret_key );
    $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
 
    if( $action == 'e' ) {
        $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
        return $output;
    }
    else if( $action == 'd' ){
        $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
        if ($output=='') {
          return false;
        }else{
          return $output;
        }
    }

}


function add_notification($username, $title, $message='', $url='', $icon='', $class=''){
  global $conn;
  global $username;
  $time = time();
  $meta_data = serialize(array("icon"=>$icon, "class"=>$class));

  $sql = "INSERT INTO notifications(time_added, username, title, message, url, meta_data) VALUES('$time', '$username', '$title', '$message', '$url', '$meta_data')";
  $query = mysqli_query($conn, $sql);

}  


// require_once('params.php');



if (isset($_SESSION['email']) and !empty($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $time=time();
    $query = mysqli_query($conn, "SELECT id FROM user_payments WHERE email='$email' AND period_end_timestamp>$time LIMIT 0,1");

    if ($query->num_rows > 0) {
        $_SESSION['premium']=true;
    }else{
        $_SESSION['premium']=false;
    }



// check for duplicate session
if ($_SERVER['SERVER_NAME']!=='localhost') {

    $cookit=$_COOKIE['osce_id'];
    
    if($coksql=mysqli_query($conn,"SELECT cookie_id FROM user_login WHERE email='$email'")){
        $cookie_id = mysqli_fetch_assoc($coksql)['cookie_id'];
        if ($cookit!==$cookie_id) {
            
            if($email!=='nazam3@uclan.ac.uk'){

                unset($_SESSION['first_name']);
                unset($_SESSION['email']);


                session_destroy();
                setcookie('osce_id', $_COOKIE['osce_id'], time() - 3600, '/');

                header("Location: ".$url."/alerts/duplicate-session");
                exit();

                }

            }
        }
    }
}

 ?>