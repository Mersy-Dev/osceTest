<?php 


	require_once "../inc/conn.php";
	logged_in(true);


$page_title = "My Referrals";
$nav = "My Referrals";
$email = $_SESSION['email'];

require_once "header.php"; 



?>


<div class="content">



<div class="clear"></div>
<br>
<br>

<!-- filetype tittle, category, date, price, edit, delete -->

<div class="tbl1">
	<?php if(isset($is_admin) and $is_admin==true){?>
	<form method="post">
	<input type="text" value="<?php echo post('email_check_referrals'); ?>" class="form-control" name="email_check_referrals" placeholder="Enter Nickname or Email"></form><br>
		<?php }?>

	<div class="head rw1">
		<div class="itm1">Name</div>
		<div class="itm1">Join Date</div>
		<div class="itm1">Subscribed</div>
	</div>

<?php

	$nick = $user_info['nick'];
	if(isset($is_admin) and $is_admin==true){
		if (post('email_check_referrals')) {
			$nick = softSan(post('email_check_referrals'));

			// check if it is an email
			if(filter_var($nick, FILTER_VALIDATE_EMAIL)){
				$sql = "SELECT nick FROM user_info WHERE email='$nick'";
				$query = mysqli_query($conn, $sql);
				if ($query->num_rows > 0) {
					$row = mysqli_fetch_assoc($query);
					$nick = $row['nick'];
				}
			}
		}
	}

	$sql = "SELECT * FROM user_info WHERE referrer='$nick'";
	$query = mysqli_query($conn, $sql);

	
	while ($row = mysqli_fetch_assoc($query)) {
		$first_name = $row['first_name'];
		$ref_email = $row['email'];

		$sql2 = "SELECT * FROM user_login WHERE email='$ref_email'";
		$query2 = mysqli_query($conn, $sql2);
		$row2 = mysqli_fetch_assoc($query2);
		$join_date = date('d M Y', strtotime($row2['join_date']));

		$sql3 = "SELECT * FROM user_payments WHERE email='$ref_email' AND period_end_timestamp>".time();
		$query3 = mysqli_query($conn, $sql3);
		if ($query3->num_rows > 0) {
			$subscription = '<i class="bx bx-check"></i>';
		}else{
			$subscription = '<i class="bx bx-x"></i>';
		}


		
		
		?>
		<div class="rw1">
			<div class="itm1"><?php echo $first_name; ?></div>
			<div class="itm1"><?php echo $join_date; ?></div>
			<div class="itm1"><?php echo $subscription; ?></div>
		</div>
		<?php
	}
	?>


</div>

</div>

<?php require "footer.php";?>