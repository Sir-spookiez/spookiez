<?php
session_start();

// Ensure the staff is logged in
if (!isset($_SESSION['staff_id'])) {
    header("Location: index.php");
    exit();
}

$trip_id = $_GET['trip_id'];

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

// Fetch students registered for the trip
$query = "SELECT s.Name, s.Email FROM registrations r JOIN students s ON r.StudentID = s.StudentID WHERE r.TripID = '$trip_id'";
$result = mysqli_query($conn, $query);

if ($result) {
    echo "<h2>Students Registered for this Trip</h2>";
    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1'>
                <tr>
                    <th>Student Name</th>
                    <th>Student Email</th>
                    <th>Action</th>
                </tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>" . $row['Name'] . "</td>
                    <td>" . $row['Email'] . "</td>
                    <td>
                        <form action='remove_student.php' method='POST'>
                            <input type='hidden' name='student_id' value='" . $row['StudentID'] . "'>
                            <input type='submit' value='Remove Student'>
                        </form>
                    </td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No students registered for this trip.</p>";
    }
} else {
    echo "Error executing query: " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>
