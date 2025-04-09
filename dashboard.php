<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['userAuth']) || $_SESSION['userAuth'] !== true) {
    header("Location: login.php");
    exit();
}

// Initialize quizzes if not already set in session
if (!isset($_SESSION['mathsQuizzes'])) {
    $_SESSION['mathsQuizzes'] = [
        ['id' => 1, 'title' => 'Quiz 1: Algebra Basics', 'progress' => 0],
        ['id' => 2, 'title' => 'Quiz 2: Geometry Fundamentals', 'progress' => 0],
        ['id' => 3, 'title' => 'Quiz 3: Trigonometry', 'progress' => 0],
        ['id' => 4, 'title' => 'Quiz 4: Calculus Introduction', 'progress' => 0],
    ];
}

// Handle progress update when a quiz is started
if (isset($_GET['quizId'])) {
    $quizId = (int)$_GET['quizId'];
    
    // Find the quiz and increment progress
    foreach ($_SESSION['mathsQuizzes'] as &$quiz) {
        if ($quiz['id'] === $quizId && $quiz['progress'] < 100) {
            $quiz['progress'] += 25; // Increment by 25% for each quiz start (you can adjust this)
            break;
        }
    }
}

$mathsQuizzes = $_SESSION['mathsQuizzes'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Maths Course Dashboard</title>
  <style>
/* General Styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    color: #333;
}

header {
    background-color: black;
    color: white;
    text-align: center;
    padding: 20px;
}

h1 {
    font-size: 36px;
    margin: 0;
}

h2 {
    font-size: 20px;
    margin-top: 5px;
}

.dashboard {
    padding: 20px;
    max-width: 900px;
    margin: 20px auto;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

h2 {
    font-size: 24px;
    margin-bottom: 10px;
}

ul.quiz-list {
    list-style-type: none;
    padding: 0;
}

.quiz-item {
    background-color: #f9f9f9;
    border-radius: 5px;
    padding: 15px;
    margin-bottom: 15px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.quiz-title {
    font-size: 18px;
    font-weight: bold;
    color: #333;
}

.progress-bar {
    background-color: darkblue;
    border-radius: 5px;
    height: 20px;
    width: 100%;
    margin-top: 10px;
}

.progress {
    background-color: #4CAF50;
    height: 100%;
    border-radius: 5px;
}

.start-quiz-button {
    display: inline-block;
    margin-top: 10px;
    padding: 10px 20px;
    background-color: darkblue;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.start-quiz-button:hover {
    background-color: blue;
}

.go-to-courses-button {
    display: inline-block;
    margin-top: 10px;
    margin-left: 10px;
    padding: 10px 20px;
    background-color: grey;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.go-to-courses-button:hover {
    background-color: darkgrey;
}

.logout {
    display: inline-block;
    margin-top: 20px;
    padding: 10px 20px;
    background-color: #f44336;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.logout:hover {
    background-color: #e53935;
}

  </style>
</head>
<body>
  <header>
    <h1>Maths Course Dashboard</h1>
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</h2>
  </header>

  <div class="dashboard">
    <h2>Your Maths Quizzes</h2>
    <ul class="quiz-list">
      <?php foreach ($mathsQuizzes as $quiz): ?>
        <li class="quiz-item">
          <h3 class="quiz-title"><?php echo htmlspecialchars($quiz['title']); ?></h3>
          <div class="progress-bar">
            <div 
              class="progress" 
              style="width: <?php echo $quiz['progress']; ?>%;"></div>
          </div>
          <p><?php echo $quiz['progress']; ?>% completed</p>
          <!-- Link to each quiz page, this will trigger the progress update -->
          <a href="?quizId=<?php echo $quiz['id']; ?>" class="start-quiz-button">Start Quiz</a>
          
          <!-- Link to the Courses Page -->
          <a href="courses2.php" class="go-to-courses-button">Go to Courses</a>
        </li>
      <?php endforeach; ?>
    </ul>
    <a href="index.php" class="logout">Logout</a>
  </div>
</body>
</html>
