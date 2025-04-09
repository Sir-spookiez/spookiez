<?php
    //PG Connection String
    $conString = "host=82.165.6.246 port=5432 dbname=pg24_225321 user=pg24tylerevetts password=pgte782454";

    //Create connection
    $pgCon = pg_connect($conString);

    //Session config
    session_start();

    if (isset($_POST['user']) && isset($_POST['paswd']) && isset($_POST['paswdConfirm']) && isset($_POST['email'])) {
        $user = $_POST['user'];
        $password = $_POST['paswd'];
        $confirmPassword = $_POST['paswdConfirm'];
        $email = $_POST['email'];

        // Check if username already exists
        $query = "SELECT username FROM LIE_Users WHERE username = '$user';";
        $result = pg_query($pgCon, $query);

        if (pg_num_rows($result) == 0) {
            if ($password == $confirmPassword) {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // Insert the new user into the database
                $insertQuery = "INSERT INTO LIE_Users (username, password, email) VALUES ('$user', '$hashedPassword', '$email');";
                pg_query($pgCon, $insertQuery);

                // Redirect to login page
                header("Location: login.php");
                exit();
            } else {
                $_SESSION['signup_error'] = true;
                $_SESSION['signup_e_message'] = "Passwords do not match.";
                header("Location: signup.php");
                exit();
            }
        } else {
            $_SESSION['signup_error'] = true;
            $_SESSION['signup_e_message'] = "Username already exists.";
            header("Location: signup.php");
            exit();
        }
    } else {
        $_SESSION['signup_error'] = true;
        $_SESSION['signup_e_message'] = "All fields are required.";
        header("Location: signup.php");
        exit();
    }
?>
