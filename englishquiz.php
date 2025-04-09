<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>English Quiz</title>
    <link rel="stylesheet" type="text/css" href="css.css">
    <script>
        let score = 0;
        let currentQuestionIndex = 0;
        const questions = [
            { question: "What is the synonym of 'happy'?", answer: "joyful" },
            { question: "What is the antonym of 'hot'?", answer: "cold" },
            { question: "What is the plural form of 'child'?", answer: "children" },
            { question: "What is the past tense of 'run'?", answer: "ran" },
            { question: "What is the noun form of 'beautiful'?", answer: "beauty" },
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
    <h1>Math Quiz</h1>
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
    </div>
    <script>
        loadQuestion();
    </script>
</body>
</html>