<?php

require_once '../../inc/conn.php';

if (get('id')) {
	$id = (int)filter_var(get('id'), FILTER_SANITIZE_NUMBER_INT);
	$sql = "SELECT category, free FROM uploads WHERE id='$id'";
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



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>OSCE Practice Chatbot</title>
    <style>
        body { 
        margin: 0;
        font-family: 'Nunito', sans-serif;
        width: 100vw;
        overflow: hidden;
        }


        .chatbox { width: calc(100vw - 45px); margin: auto; padding: 20px; height: 100vh;background: re;}
        .messages { height: calc(90vh - 70px);overflow-y: scroll; }
        .chat-div{position: fixed;bottom:0;width: 100vw;background:blu;left:0}
        .chat-div-pad{padding: 20px;}
        .message { margin: 5px 0; padding-right: 50px;}
        .user { color: #EF798A;font-weight: bold; }
        .bot { color: #5d576b; margin-bottom: 20px;line-height: 1.3em; font-size: 18px;}
        .question { width:50%; border-radius: 20px; padding: 10px 20px; border: 1px solid #ccc; }
        .mic { cursor: pointer; float: right;transition:0.3s}
        .mic:hover{transform: scale(1.2);}
        .top { display: flex;}
        .send-btn{border-radius: 20px; padding: 10px 20px; border: 0; background: #3651d4; color: white; cursor: pointer; transition: 0.3s;}
    </style>

    <!-- jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="chatbox">
        <div class="top"><img src="unmuted.png" id="mute" class="mic" alt="mute" width="20"></div>
        <br>
        <div class="messages" id="messages">
            <h3 style="text-align: center;">Chat with the Patient</h3>
            <br>
        </div>

        <div class="chat-div">
        <div class="chat-div-pad">
            <form id="chat-form">
                <input class="question" type="text" id="user-input" placeholder="Ask the patient a question..." autocomplete="off" required value="Hello, how are you feeling today?">
                <button class="send-btn" type="submit">Send</button>
                <img src="mic.png" id="mic" class="mic" alt="mic" style="margin-top: 10px;" width="15">
            </form>
        </div>
        </div>
    </div>

    <script>
        var mute = false;

        document.getElementById('chat-form').addEventListener('submit', async function(event) {
            event.preventDefault();
            const userInput = document.getElementById('user-input').value;
            addMessage(userInput, 'user');
            document.getElementById('user-input').value = '';

            $.post('chatbot.php?id=<?php echo $id;?>', { message: userInput, mute : mute }, function(response) {
                console.log(response);
                const data = JSON.parse(response);
                var botMessage = data.message;

                addMessage(botMessage, 'bot');
                
                if (mute) {
                    return;
                }

                // check if audio is empty
                if (data.audio == '') {
                    // play text to speech
                    var msg = new SpeechSynthesisUtterance(botMessage);
                    window.speechSynthesis.speak(msg);
                }else{   
                    // play mp3 from link
                    $mp3_file = 'audios/'+data.audio;
                    var audio = new Audio($mp3_file);
                    audio.play();
                }



            });
        });

        function addMessage(message, type) {
            const messageElement = document.createElement('div');
            messageElement.className = 'message ' + type;
            messageElement.textContent = message;
            document.getElementById('messages').appendChild(messageElement);
            document.getElementById('messages').scrollTop = document.getElementById('messages').scrollHeight;
        }

        // Speech to Text functionality
        const micButton = document.getElementById('mic');
        const userInput = document.getElementById('user-input');
        const recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition)();

        micButton.addEventListener('click', () => {
            // check if audio is playing
            if (window.speechSynthesis.speaking) {
            }else{
                recognition.start();
                micButton.src = 'mic-red.png';
            }
        });

        recognition.onresult = (event) => {
            const transcript = event.results[0][0].transcript;
            userInput.value = transcript;
            document.getElementById('chat-form').dispatchEvent(new Event('submit'));
            micButton.src = 'mic.png';

        };

        recognition.onerror = (event) => {
            console.error(event.error);
        };

        document.getElementById('mute').addEventListener('click', () => {
            mute = !mute;
            if (mute) {
                document.getElementById('mute').src = 'muted.png';
                if (window.speechSynthesis.speaking) {
                    window.speechSynthesis.cancel();
                }
            } else {
                document.getElementById('mute').src = 'unmuted.png';
            }
        });
    </script>
</body>
</html>
