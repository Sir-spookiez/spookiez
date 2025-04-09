<?php
session_start();

// Ensure the staff is logged in
if (!isset($_SESSION['staff_id'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get teacher details from the form
    $teacher_id = $_POST['teacher_id'];
    $trip_id = $_POST['trip_id'];

    // Database connection
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

    // Insert teacher into the trip
    $query = "INSERT INTO trip_teachers (TripID, TeacherID) VALUES ('$trip_id', '$teacher_id')";
    if (mysqli_query($conn, $query)) {
        echo "Teacher assigned successfully!";
    } else {
        echo "Error: Could not assign teacher. Please try again later.";
    }

    // Close connection
    mysqli_close($conn);
}
?>

<form method="POST">
    <label for="teacher_id">Teacher ID:</label>
    <input type="text" name="teacher_id" required><br><br>
    <label for="trip_id">Trip ID:</label>
    <input type="text" name="trip_id" required><br><br>
    <input type="submit" value="Assign Teacher">
</form>
