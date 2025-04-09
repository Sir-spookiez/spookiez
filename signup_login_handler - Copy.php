<?php
session_start();

// Simple in-memory user storage (replace with database queries in production)
$users = [];

// Check if form is submitted for signup
if (isset($_POST['signup'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Simulate saving user to a database
    $_SESSION['users'][] = ['name' => $name, 'email' => $email, 'password' => $password];

    $_SESSION['userAuth'] = true;
    $_SESSION['userName'] = $name;
    header("Location: dashboard.php");
    exit();
}

// Check if form is submitted for login
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Simulate checking credentials from a database
    if (isset($_SESSION['users'])) {
        foreach ($_SESSION['users'] as $user) {
            if ($user['email'] === $email && $user['password'] === $password) {
                $_SESSION['userAuth'] = true;
                $_SESSION['userName'] = $user['name'];
                header("Location: dashboard.php");
                exit();
            }
        }
    }

    // If invalid credentials
    echo "<script>alert('Invalid login credentials'); window.location.href='signup_login.php';</script>";
}
?>
