
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Arithmetic Quiz</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f4f8; /* Light gray-blue background */
            color: #1a73e8; /* Primary blue color for text */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h1 {
            color: #1a73e8; /* GibJohn primary blue */
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .hidden {
            display: none;
        }

        #quiz, #result {
            background: #ffffff; /* Clean white background */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Soft shadow */
            border-radius: 8px;
            padding: 20px;
            width: 90%;
            max-width: 400px;
            text-align: center;
        }

        .question {
            margin-bottom: 15px;
            font-size: 1.2rem;
            font-weight: bold;
            color: #333; /* Neutral dark text for questions */
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 1rem;
            color: #5f6368; /* Subtle gray for labels */
        }


        input[type="number"] {
            width: 100%;
            padding: 10px 0px 10px 10px; /* Top, Right, Bottom, Left */
            font-size: 1rem;
            border: 1px solid #d1d1d1; /* Light border */
            border-radius: 4px;
            margin-bottom: 20px;
            margin: right 20px;
        }

        input[type="number"]:focus {
            border-color: #1a73e8; /* Primary blue focus border */
            outline: none;
            box-shadow: 0 0 5px rgba(26, 115, 232, 0.4);
        }

        button {
            background-color: #1a73e8; /* Primary blue button */
            color: white;
            padding: 10px 15px;
            font-size: 1rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #1558b0; /* Darker blue for hover */
        }

        #result h2 {
            font-size: 1.8rem;
            color: #333;
        }

        #final-score {
            font-size: 1.2rem;
            color: #5f6368;
            margin-top: 10px;
        }

        .button {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 20px;
            background-color: #1a73e8; /* Primary blue link button */
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-size: 1rem;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #1558b0;
        }
    </style>    <script>
        let score = 0;
        let currentQuestionIndex = 0;
        const questions = [
    { question: "Solve for x: 2x + 5 = 15", answer: 5 },
    { question: "Solve for y: y - 3 = 7", answer: 10 },
    { question: "What is the value of x in x^2 = 16?", answer: 4 },
    { question: "If 3x = 12, what is x?", answer: 4 },
];

        function loadQuestion() {
            if (currentQuestionIndex < questions.length) {
                document.getElementById('question-text').innerText = questions[currentQuestionIndex].question;
                document.getElementById('answer').value = '';
            } else {
                document.getElementById('quiz').classList.add('hidden');
                document.getElementById('result').classList.remove('hidden');
                document.getElementById('final-score').innerText = `Your score is ${score} out of ${questions.length}`;
            }
        }

        function submitAnswer() {
            const userAnswer = parseInt(document.getElementById('answer').value, 10);
            if (userAnswer === questions[currentQuestionIndex].answer) {
                score++;
            }
            currentQuestionIndex++;
            loadQuestion();
        }
    </script>
</head>
<body>
    <h1>Basic Arithmetic Quiz</h1>
    <div id="quiz">
        <div class="question">
            <p id="question-text"></p>
        </div>
        <div>
            <label for="answer">Your Answer:</label>
            <input type="number" id="answer">
        </div>
        <button onclick="submitAnswer()">Submit</button>
    </div>
    <div id="result" class="hidden">
        <h2>Quiz Complete!</h2>
        <p id="final-score"></p>
        <a href="course-math.php" class="button">Return to Course</a>
    </div>
    <script>
        loadQuestion();
    </script>
</body>
</html>
