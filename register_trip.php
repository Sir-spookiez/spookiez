<?php
session_start();  // Start the session to access the logged-in student ID

// Ensure the student is logged in (you should have this logic somewhere in your application)
if (!isset($_SESSION['student_id'])) {
    // Redirect to the login page if not logged in
    header("Location: index.php");
    exit();
}

// Database connection (same as in students_dashboard.php)
    // Database connection details
    $servername = "82.165.6.246";
    $username = "pg24tylerevetts";
    $password = "pgte782454";
    $dbname = "pg24_225321";
    
    // Establish the connection to the MySQL database
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    
    // Check if the connection was successful
    if (!$conn) {
        // Detailed error message with connection failure details
        die("Connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
    } else {
        echo "Connection successful!";
    }

// Get the trip_id from the form
$student_id = $_SESSION['student_id'];  // Get student ID from session
$trip_id = $_POST['trip_id'];  // Get trip ID from the form

// Check if the student is already registered for the trip
$query = "SELECT * FROM registrations WHERE StudentID = '$student_id' AND TripID = '$trip_id'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    echo "You are already registered for this trip.";
} else {
    // Register the student for the trip
    $insert_query = "INSERT INTO registrations (StudentID, TripID) VALUES ('$student_id', '$trip_id')";
    if (mysqli_query($conn, $insert_query)) {
        echo "You have successfully registered for the trip!";
    } else {
        echo "Error: Could not register for the trip. Please try again later.";
    }
}

// Close the database connection
mysqli_close($conn);
?>
