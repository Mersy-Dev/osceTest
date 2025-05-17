<?php


require_once '../../inc/conn.php';

if (get('id')) {
	$id = (int)filter_var(get('id'), FILTER_SANITIZE_NUMBER_INT);
	$sql = "SELECT category, free, content FROM uploads WHERE id='$id'";
	$query = mysqli_query($conn, $sql);
	$file = mysqli_fetch_assoc($query);

	if (!empty($file)) {
		if ($file['category']!=='scenario') {
            die();
        }
	}

}else{
    die();
}


if ($file['free']!=="yes") {
	if (logged_in()) {
		if ($_SESSION['premium']==false) {
			die();
		}
	}else{
        die();
	}
}


$c = unserialize($file['content']);


if(!empty($c['actor_instructions'])){
    $actor_instructions = $c['actor_instructions'];
    $actor_instructions = strip_tags($actor_instructions);
}else{
    die();
}


$api_key = 'sk';
$endpoint = 'https://api.openai.com/v1/chat/completions';

$patient_profile = [
    "role" => "system",
    "content" => "
    I am a UK Pharmacy student. I need you to help practice for my OSCE exam and so I want you to play the role of a patient. I am going to describe your patient profile and I need you to strictly play this character. This is a fictional patient profile that you must use to guide the conversation. 
    Never ask me how you can assist me. It is me that will assist you.  If I ask a question that is not in the profile, you should respond with a general answer that a real life patient may give. Do not provide any medical advice or information that is not in the profile. Do not give lengthy responses. Do not help me with any knowledge or information. I am playing the role of a pharmacist. You are playing the role of a patient NOT the pharmacist so do not ask me questions that are not in your character brief. 

    
    Here is your character:
    $actor_instructions"
];

function getChatResponse($user_message) {
    global $api_key, $endpoint, $patient_profile;

    $data = [
        'model' => 'gpt-4o',
        'messages' => [
            $patient_profile,
            ["role" => "user", "content" => $user_message]
        ],
        'max_tokens' => 150,
        'temperature' => 1
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $endpoint);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Authorization: Bearer ' . $api_key
    ]);

    $result = curl_exec($ch);
    curl_close($ch);

    return json_decode($result, true);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_message = $_POST['message'];
    $response = getChatResponse($user_message);
    // echo json_encode($response);

    $message = $response['choices'][0]['message']['content'];

    // replace string 'How can I assist you today?' in botMessage
    $message = str_replace('How can I assist you today?', 'Do you have any questions for me?', $message);
    $message = str_replace('How can I assist you today,', 'Do you have any questions for me?', $message);
    $message = str_replace('How can I assist you today.', 'Do you have any questions for me?', $message);

    $response = [
        'message' => $message,
        'audio' => ''
    ];
    // echo json_encode(['message' => $message]);
    // use OPEN AI API to turn text to speech

    if(1){
        if($_POST['mute'] != 'true'){
            
            $endpoint = 'https://api.openai.com/v1/audio/speech';
            
            $data = [
                'model' => 'tts-1',
                'input' => $message,
                'voice' => 'alloy',
            ];
            
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $endpoint);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
                'Authorization: Bearer ' . $api_key
            ]);
            
            $result = curl_exec($ch);
            curl_close($ch);
            
            // the response is an mp3 file
            // loop through folder and delete all mp3 files that are older than 2 minutes
            $files = glob('audios/*.mp3');
            foreach($files as $file){
                if(is_file($file)){
                    if(time() - filemtime($file) >= 120){
                        unlink($file);
                    }
                }
            }
            
            // save the mp3 file to the server
            $mp3_id = uniqid();
            $mp3_file = $mp3_id . '.mp3';
            file_put_contents('audios/'.$mp3_file, $result);

            $response['audio'] = $mp3_file;

        }
    }

    echo json_encode($response);

        
}
?>
