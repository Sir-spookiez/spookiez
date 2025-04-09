<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['userAuth']) || $_SESSION['userAuth'] !== true) {
    header("Location: signup_login.php");
    exit();
}

// Check if progress update is submitted
if (isset($_POST['update_progress'])) {
    $courseId = (int)$_POST['course_id'];

    // Update course progress
    foreach ($_SESSION['courses'] as &$course) {
        if ($course['id'] === $courseId && $course['progress'] < 100) {
            $course['progress'] += 10; // Increment progress by 10%
            if ($course['progress'] > 100) {
                $course['progress'] = 100; // Cap at 100%
            }
        }
    }

    // Save updated courses to session
    $_SESSION['courses'] = $_SESSION['courses'];

    // Redirect back to the dashboard
    header("Location: dashboard.php");
    exit();
}
