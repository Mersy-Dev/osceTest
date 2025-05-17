<pre>
	<?php 

require "inc/conn.php";

// $time = date()
$sql = "SELECT * FROM user_payments WHERE period_end>CURRENT_TIMESTAMP";
$q = mysqli_query($conn, $sql);


while ($x=mysqli_fetch_assoc($q)) {
	print_r($x);
}
 ?>