<?php
session_start();
include 'db_connection.php'; // Database connection

// Check if user is logged in
if (!isset($_SESSION['userAuth']) || $_SESSION['userAuth'] !== true) {
    header("Location: signup_login.php");
    exit();
}

$userId = $_SESSION['userId'];
$quizId = isset($_GET['id']) ? (int)$_GET['id'] : null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $answers = $_POST['answers'];
    $correctAnswers = ['A', 'C', 'B', 'D']; // Replace with actual correct answers
    $score = 0;

    foreach ($answers as $index => $answer) {
        if ($answer === $correctAnswers[$index]) {
            $score++;
        }
    }

    $percentage = ($score / count($correctAnswers)) * 100;

    // Save or update the progress in the database
    $query = "INSERT INTO user_progress (user_id, quiz_id, progress)
              VALUES ($1, $2, $3)
              ON CONFLICT (user_id, quiz_id) 
              DO UPDATE SET progress = $3"; // Insert or update progress
    pg_query_params($dbConnection, $query, [$userId, $quizId, $percentage]);

    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars($quiz['title']); ?></title>
</head>
<body>
  <header>
    <h1><?php echo htmlspecialchars($quiz['title']); ?></h1>
  </header>

  <form method="POST">
    <h2>Answer the following questions:</h2>
    <ol>
      <?php foreach ($questions as $index => $question): ?>
        <li>
          <p><?php echo htmlspecialchars($question['question']); ?></p>
          <?php 
            $options = json_decode($question['options'], true); 
            foreach ($options as $option => $value):
          ?>
            <label><input type="radio" name="answers[<?php echo $index; ?>]" value="<?php echo $option; ?>" required> <?php echo htmlspecialchars($value); ?></label>
            <br>
          <?php endforeach; ?>
        </li>
      <?php endforeach; ?>
    </ol>
    <button type="submit">Submit Quiz</button>
  </form>
</body>
</html>
