<?php

require_once "../conn.php";


$users = mysqli_query($conn, "SELECT * FROM user_login WHERE id>1651 AND id<1882");

while ($x = mysqli_fetch_assoc($users)) {
  $email = $x['email'];
//   $query = mysqli_query($conn, "SELECT id FROM user_info WHERE email='$email' LIMIT 0,1");
  if ($query->num_rows == 0) {
    echo $email . ",<br>";
  }
}



?>