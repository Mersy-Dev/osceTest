<?php

require_once "../../inc/conn.php";

// error_reporting(E_ALL);
// ini_set('display_errors', '1');


// Path to your CSV file
$csvFile = '../../../mcq.csv';



// Get the current day as a counter or randomize it
$currentDay = file_get_contents("mcq-count.txt") + date('j'); // Use the day of the month as the counter
// $currentDay = rand(0, 90);
// $currentDay = 6;



// Read the CSV file
if (($handle = fopen($csvFile, "r")) !== false) {
    // Read the CSV file row by row
    while (($data = fgetcsv($handle, 1000, ",")) !== false) {
        // Extract the relevant fields from the CSV row
        $question = $data[0];
        $options = [
            'A' => $data[1],
            'B' => $data[2],
            'C' => $data[3],
            'D' => $data[4],
            'E' => $data[5]
        ];
        $correctAnswer = $data[6];
        $explanation = $data[7];

        // Store the extracted data in an associative array
        $questionData = [
            'question' => $question,
            'options' => $options,
            'correctAnswer' => $correctAnswer,
            'explanation' => $explanation
        ];

        // Add the question data to the array
        $questionDataArray[] = $questionData;
    }

    // Close the CSV file
    fclose($handle);
}

// Total number of questions
$totalQuestions = count($questionDataArray);

// Select the question for the current day
$selectedQuestionIndex = ($currentDay - 1) % $totalQuestions;
$selectedQuestionData = $questionDataArray[$selectedQuestionIndex];

// Encode the selected question data as JSON and return it
$response = json_encode($selectedQuestionData);


if (isset($_POST['streak']) and !empty($_POST['streak'])) {


    logged_in(true);

    $ans = post('streak');
    if ($ans==$selectedQuestionData['correctAnswer']) {
        // echo "string";
    }

    $email = $_SESSION['email'];
    $first_name = $_SESSION['first_name'];
    $today = date("Y-m-d");
    $streak_count=1;

    $yesterday = date("Y-m-d", strtotime("yesterday"));
    $sql = "SELECT * FROM daily_streak WHERE email='$email'";
    $query = mysqli_query($conn, $sql);

    if ($query->num_rows == 0) {
        
        mysqli_query($conn, "INSERT INTO daily_streak (email, first_name, last_date, streak_count) VALUES ('$email', '$first_name', '$today', 1)");
    }else{
        $streak = mysqli_fetch_assoc($query);

        if ($streak['last_date']==$yesterday) {
            $streak_count = $streak['streak_count']+1;
            mysqli_query($conn, "UPDATE daily_streak SET last_date='$today', streak_count='$streak_count' WHERE email='$email'");
        }else if ($streak['last_date']!==$today){
            $streak_count = 1;
            mysqli_query($conn, "UPDATE daily_streak SET last_date='$today', streak_count='$streak_count' WHERE email='$email'");
        }
    }

    echo $streak_count;





    exit();
}

echo $response;
?>
