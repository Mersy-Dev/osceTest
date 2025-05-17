<?php

require_once "../../inc/conn.php";

// Path to your CSV file
$csvFile = '../../../mcq.csv';

// Fallback for missing file
if (!file_exists($csvFile)) {
    http_response_code(500);
    exit(json_encode(['error' => 'MCQ file not found']));
}

// Ensure mcq-count.txt exists
$counterFile = "mcq-count.txt";
if (!file_exists($counterFile)) {
    file_put_contents($counterFile, "0");
}

$currentDay = (int)file_get_contents($counterFile) + date('j');

// Read the CSV
$questionDataArray = [];
if (($handle = fopen($csvFile, "r")) !== false) {
    while (($data = fgetcsv($handle, 1000, ",")) !== false) {
        if (count($data) < 8) continue; // Skip incomplete rows

        $questionDataArray[] = [
            'question' => $data[0],
            'options' => [
                'A' => $data[1],
                'B' => $data[2],
                'C' => $data[3],
                'D' => $data[4],
                'E' => $data[5]
            ],
            'correctAnswer' => trim($data[6]),
            'explanation' => $data[7]
        ];
    }
    fclose($handle);
}

$totalQuestions = count($questionDataArray);
if ($totalQuestions === 0) {
    http_response_code(500);
    exit(json_encode(['error' => 'No questions available']));
}

$selectedQuestionIndex = ($currentDay - 1) % $totalQuestions;
$selectedQuestionData = $questionDataArray[$selectedQuestionIndex];

// If user is submitting an answer
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['streak']) && !empty($_POST['streak'])) {
    // session_start();

    if (!isset($_SESSION['email'], $_SESSION['first_name'])) {
        http_response_code(401);
        exit("Unauthorized");
    }

    $ans = trim($_POST['streak']);
    $email = $_SESSION['email'];
    $first_name = $_SESSION['first_name'];
    $today = date("Y-m-d");
    $yesterday = date("Y-m-d", strtotime("yesterday"));

    $sql = "SELECT * FROM daily_streak WHERE email='$email'";
    $query = mysqli_query($conn, $sql);

    if ($query->num_rows === 0) {
        $streak_count = 1;
        mysqli_query($conn, "INSERT INTO daily_streak (email, first_name, last_date, streak_count) VALUES ('$email', '$first_name', '$today', $streak_count)");
    } else {
        $streak = mysqli_fetch_assoc($query);

        if ($streak['last_date'] === $yesterday) {
            $streak_count = $streak['streak_count'] + 1;
        } else if ($streak['last_date'] !== $today) {
            $streak_count = 1;
        } else {
            $streak_count = $streak['streak_count']; // already submitted today
        }

        mysqli_query($conn, "UPDATE daily_streak SET last_date='$today', streak_count=$streak_count WHERE email='$email'");
    }

    echo $streak_count;
    exit();
}

// Output question JSON
header('Content-Type: application/json');
echo json_encode($selectedQuestionData);
exit();
?>
