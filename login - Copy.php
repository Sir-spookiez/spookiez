<?php
// PG Connection String
$conString = "host=82.165.6.246 port=5432 dbname=pg24_225321 user=pg24tylerevetts password=pgte782454";

// Create connection
$pgCon = pg_connect($conString);

// Session config
session_start();

// Check if the user is already logged in
if (isset($_SESSION['userAuth']) && $_SESSION['userAuth'] === true) {
    header("Location: dashboard.php");
    exit();
}

// Handle Login
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login-email']) && isset($_POST['login-password'])) {
  $email = $_POST['login-email'];
  $password = $_POST['login-password'];

  // Query to check user credentials
  $query = "SELECT * FROM users WHERE email = $1 AND password = $2";
  $result = pg_query_params($pgCon, $query, array($email, $password));

  if (pg_num_rows($result) > 0) {
      // User found, set session variables
      $_SESSION['userAuth'] = true;
      $_SESSION['userEmail'] = $email;
      header("Location: dashboard.php");
      exit();
  } else {
      echo "<script>alert('Invalid login credentials');</script>";
  }
}

// Handle Signup
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Query to insert new user into the database
  $query = "INSERT INTO users (user_name, email, password) VALUES ($1, $2, $3)";
  $result = pg_query_params($pgCon, $query, array($name, $email, $password));

  if ($result) {
      echo "<script>alert('Account created successfully!');</script>";
      header("Location: dashboard.php");
      exit();
  } else {
      echo "<script>alert('Error creating account');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="login.css">
  <title>Signup & Login Page</title>
</head>
<body>

  <header>
    <h1>Welcome to Our Site</h1>
  </header>

  <!-- Signup Form -->
  <main id="signup">
    <h2>Create Account</h2>
    <form id="signup-form" method="POST">
      <input type="text" name="name" placeholder="Full Name" required><br>
      <input type="email" name="email" placeholder="Email" required><br>
      <input type="password" name="password" placeholder="Password" required><br>
      <input type="submit" value="Sign Up">
    </form>
    <p>Already have an account? <a href="#login" class="footer-link" onclick="switchToLogin()">Login here</a></p>
  </main>

  <!-- Login Form ( hidden) -->
  <main id="login" style="display: none;">
    <h2>Login</h2>
    <form id="login-form" method="POST">
      <input type="email" name="login-email" placeholder="Email" required><br>
      <input type="password" name="login-password" placeholder="Password" required><br>
      <input type="submit" value="Login">
    </form>
    <p>Don't have an account? <a href="#signup" class="footer-link" onclick="switchToSignup()">Sign up here</a></p>
  </main>

  <footer>
    <p>&copy; 2025 My Website</p>
  </footer>

  <!-- JavaScript logic for handling the forms -->
  <script>
    // Switch to Login form
    function switchToLogin() {
      document.getElementById('signup').style.display = 'none';
      document.getElementById('login').style.display = 'block';
    }

    // Switch to Signup form
    function switchToSignup() {
      document.getElementById('login').style.display = 'none';
      document.getElementById('signup').style.display = 'block';
    }
  </script>

</body>
</html>
