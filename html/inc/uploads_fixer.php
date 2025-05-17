<?php

require_once 'conn.php';

// show errors
ini_set('display_errors', 1);
error_reporting(E_ALL);


// increase the memory limit and execution time



// $sample = "SELECT * FROM uploads WHERE id=57";
// $sample = mysqli_query($conn, $sample);
// $sample = mysqli_fetch_assoc($sample);
// echo $sample = unserialize($sample['content']);
// echo '<br>';
// echo $sample = json_encode($sample);
// echo '<br>';

// exit();


$start = 7;
$limit = 80;

// if (get('id')) {
	// $id = (int)filter_var(get('id'), FILTER_SANITIZE_NUMBER_INT);
	// $query = mysqli_query($conn, "SELECT * FROM uploads WHERE id='$id'");
	// $file = mysqli_fetch_assoc($query);



    $query = "SELECT * FROM uploads";
    $result = mysqli_query($conn, $query);
    // $row = mysqli_fetch_assoc($result);
    // echo $row['content'];

    // echo number of rows
    // echo mysqli_num_rows($result);
    
    while ($row = mysqli_fetch_assoc($result)) {
        
    $id = $row['id'];
    
    if ($c === false) {
        echo 'Failed to unserialize content for id '.$id.'<br>';
    }else{        
        
        if ($row['category'] == 'scenario') {
            $c = unserialize($row['content']);
            
            // summary, student_instructions, actor_instructions, mark_scheme
            $new_text = $c['summary'].'+++***~~~'.$c['student_instructions'].'+++***~~~'.$c['actor_instructions'].'+++***~~~'.$c['mark_scheme'];
            // echo $new_text.'<br>';
            
        }
        
        if($row['category'] == 'cheatsheet'){
            $c = unserialize($row['content']);
            
            // content, flashcards
            $new_text = $c['content'].'+++***~~~'.$c['flashcards'];

        } if($row['category'] == 'video'){
            $new_text = $row['content'];
        }           
            
            $new_text = mysqli_real_escape_string($conn, $new_text);
            
            $query = "UPDATE uploads3 SET content='$new_text' WHERE id=$id";
            mysqli_query($conn, $query);
            echo 'Updated content for id '.$id.'<br>';

        }
    }


    $start++;
// }


?>