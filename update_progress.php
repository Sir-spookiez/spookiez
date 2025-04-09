<?php
// PG Connection String
$conString = "host=82.165.6.246 port=5432 dbname=pg24_225321 user=pg24tylerevetts password=pgte782454";
$pgCon = pg_connect($conString);

// Session config
session_start();

// Check if the user is logged in
if (!isset($_SESSION['userAuth']) || $_SESSION['userAuth'] !== true) {
    header("Location: signup_login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['quiz_id']) && isset($_POST['progress'])) {
    $quizId = $_POST['quiz_id'];
    $progress = $_POST['progress'];

    $progress = max(0, min(100, intval($progress)));

    // Update the progress in the database (Example query, replace with actual table/columns)
    $query = "UPDATE user_progress SET progress = $1 WHERE user_id = $2 AND quiz_id = $3";
    $result = pg_query_params($pgCon, $query, array($progress, $_SESSION['userId'], $quizId));

    if ($result) {
        header("Location: dashboard.php"); // Redirect back to the dashboard
        exit();
    } else {
        echo "Error updating progress.";
    }
} else {
    echo "Invalid request.";
}
?>
