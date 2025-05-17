<?php

require_once "../conn.php";


$users = mysqli_query($conn, "SELECT * FROM user_login WHERE id>1652 AND id<1882");

while ($x = mysqli_fetch_assoc($users)) {
    $email = $x['email'];
    
    // check if exists in user_info and insert
    $query = mysqli_query($conn, "SELECT id FROM user_info WHERE email='$email' LIMIT 0,1");
    if ($query->num_rows == 0) {
        // $query = mysqli_query($conn, "INSERT INTO missed_users (email) VALUES ('$email')");
        echo $email . ",<br>";
    }
}



?>