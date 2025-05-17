<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Flashcards App</title>
</head>

<style type="text/css">


body {
    font-family: Arial, sans-serif;
    text-align: center;
    margin: 0;
    padding: 0;
    background-color: #f2f2f2;
}

.flashcard-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 20px;
}

.flashcard {
    width: 300px;
    height: 200px;
    perspective: 1000px;
}

.card {
    width: 100%;
    height: 100%;
    background-color: #3498db;
    display: flex;
    justify-content: center;
    align-items: center;
    position: absolute;
    transition: transform 0.5s;
    transform-style: preserve-3d;
}

.back {
    background-color: #e74c3c;
    transform: rotateY(180deg);
}

.controls {
    margin-top: 20px;
}

button {
    background-color: #3498db;
    color: white;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
    margin: 0 10px;
    border-radius: 5px;
    font-size: 16px;
}

button:hover {
    background-color: #2980b9;
}




</style>
<body>



    <div class="flashcard-container">
        <div class="flashcard">
            <div class="card front">
                <h2>Front of Card 1</h2>
            </div>
            <div class="card back">
                <h2>Back of Card 1</h2>
            </div>
        </div>
        <div class="controls">
            <button id="prevBtn">Previous</button>
            <button id="nextBtn">Next</button>
        </div>
    </div>




    <script>

const flashcards = [
    {
        front: "Front of Card 1",
        back: "Back of Card 1"
    },
    {
        front: "Front of Card 2",
        back: "Back of Card 2"
    },
    {
        front: "Front of Card 3",
        back: "Back of Card 3"
    }
];

const flashcard = document.querySelector('.flashcard');
const nextBtn = document.getElementById('nextBtn');
const prevBtn = document.getElementById('prevBtn');

let currentCardIndex = 0;

function updateFlashcard() {
    const card = flashcards[currentCardIndex];
    const frontContent = card.front;
    const backContent = card.back;

    flashcard.querySelector('.front h2').textContent = frontContent;
    flashcard.querySelector('.back h2').textContent = backContent;
}

nextBtn.addEventListener('click', function () {
    if (currentCardIndex < flashcards.length - 1) {
        currentCardIndex++;
        flashcard.style.transform = 'rotateY(0deg)';
        setTimeout(updateFlashcard, 250); // Wait for the flip animation to complete
    }
});

prevBtn.addEventListener('click', function () {
    if (currentCardIndex > 0) {
        currentCardIndex--;
        flashcard.style.transform = 'rotateY(0deg)';
        setTimeout(updateFlashcard, 250); // Wait for the flip animation to complete
    }
});

updateFlashcard();


    </script>
</body>


</html>
