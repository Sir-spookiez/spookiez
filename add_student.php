<?php
session_start();

// Ensure the staff is logged in
if (!isset($_SESSION['staff_id'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get student details from the form
    $student_name = $_POST['student_name'];
    $student_email = $_POST['student_email'];
    
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

    // Insert new student into the database
    $query = "INSERT INTO students (Name, Email) VALUES ('$student_name', '$student_email')";
    if (mysqli_query($conn, $query)) {
        echo "Student added successfully!";
    } else {
        echo "Error: Could not add student. Please try again later.";
    }

    // Close connection
    mysqli_close($conn);
}
?>

<form method="POST">
    <label for="student_name">Student Name:</label>
    <input type="text" name="student_name" required><br><br>
    <label for="student_email">Student Email:</label>
    <input type="email" name="student_email" required><br><br>
    <input type="submit" value="Add Student">
</form>
