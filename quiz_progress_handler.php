<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['userAuth']) || $_SESSION['userAuth'] !== true) {
    header("Location: signup_login.php");
    exit();
}

// Check if progress update is submitted
if (isset($_POST['update_progress'])) {
    $quizId = (int)$_POST['quiz_id'];

    // Update progress for the selected quiz
    foreach ($_SESSION['mathsQuizzes'] as &$quiz) {
        if ($quiz['id'] === $quizId && $quiz['progress'] < 100) {
            $quiz['progress'] += 25; // Increment progress by 25% per completion
            if ($quiz['progress'] > 100) {
                $quiz['progress'] = 100; // Cap progress at 100%
            }
        }
    }

    // Save updated quizzes to session
    $_SESSION['mathsQuizzes'] = $_SESSION['mathsQuizzes'];

    // Redirect back to the dashboard
    header("Location: dashboard.php");
    exit();
}
