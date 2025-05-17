<?php 

	require_once "../../inc/conn.php";


	if (post('q')) {
        $q2 = urlencode(post('q'));
        $q = softSan(post('q'));

		$sql = "SELECT COUNT(*) as count from uploads WHERE title LIKE '%$q%' AND hidden=0";

        $c = mysqli_fetch_assoc(mysqli_query($conn, $sql))['count'];

        if ($c==0){
            echo "No results found.";
        }elseif($c==1){
            echo "<a style='color:#31afb4' href='".$url."search?q=$q2'><b>1</b> result found</a>";
        }else{
            echo "<a style='color:#31afb4' href='".$url."search?q=$q2'><b>$c</b> results found</a>";
        }


    }



?>