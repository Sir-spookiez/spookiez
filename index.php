<?php
session_start();

// Check if the user is already logged in (to avoid showing login form if already logged in)
if (isset($_SESSION['student_id'])) {
    header("Location: students_dashboard.php");  // Redirect student to their dashboard
    exit();
} elseif (isset($_SESSION['staff_id'])) {
    header("Location: staff_dashboard.php");  // Redirect staff to their dashboard
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the login credentials
    $username = $_POST['username'];
    $password = $_POST['password'];

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
    
    

    // Check if the login is for a student or staff
    $student_query = "SELECT * FROM students WHERE Email = '$username' AND Password = '$password'";
    $staff_query = "SELECT * FROM staff WHERE Email = '$username' AND Password = '$password'";

    // Check if student exists
    $student_result = mysqli_query($conn, $student_query);
    if (mysqli_num_rows($student_result) > 0) {
        $student = mysqli_fetch_assoc($student_result);
        $_SESSION['student_id'] = $student['StudentID'];  // Store student ID in session
        header("Location: students_dashboard.php");  // Redirect student to dashboard
        exit();
    }

    // Check if staff exists
    $staff_result = mysqli_query($conn, $staff_query);
    if (mysqli_num_rows($staff_result) > 0) {
        $staff = mysqli_fetch_assoc($staff_result);
        $_SESSION['staff_id'] = $staff['StaffID'];  // Store staff ID in session
        header("Location: staff_dashboard.php");  // Redirect staff to dashboard
        exit();
    }

    // If login fails
    $error_message = "Invalid login credentials. Please try again.";
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>

    <?php if (isset($error_message)) { echo "<p style='color:red;'>$error_message</p>"; } ?>

    <form method="POST">
        <label for="username">Email:</label>
        <input type="email" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
