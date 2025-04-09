

/* PHP file: index.php */
<?php
// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Include database connection
include 'db.php';

// Fetch user data
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM users WHERE id = $user_id";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome, <?php echo htmlspecialchars($user['name']); ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1>Welcome, <?php echo htmlspecialchars($user['name']); ?></h1>
</header>
<main>
    <p>Your progress: <?php echo $user['progress']; ?>%</p>
</main>
<footer>
    <p>&copy; 2025 Tutoring System</p>
</footer>
</body>
</html>

