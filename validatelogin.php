<?php
    //PG Connection String
    $conString = "host=82.165.6.246 port=5432 dbname=pg24_225321 user=pg24tylerevetts password=pgte782454";

    //Create connection
    $pgCon = pg_connect($conString);

    //Session config
    session_start();

    if (isset($_POST['user']) && isset($_POST['paswd'])) {
        $user = $_POST['user'];
        $password = $_POST['paswd'];

        // Query the database for the user
        $query = "SELECT * FROM LIE_Users WHERE username = '$user';";
        $result = pg_query($pgCon, $query);

        if (pg_num_rows($result) > 0) {
            $row = pg_fetch_assoc($result);
            // Verify password
            if (password_verify($password, $row['password'])) {
                $_SESSION['userAuth'] = true;
                $_SESSION['username'] = $user;
                header("Location: LoginSuccess.php");
                exit();
            } else {
                $_SESSION['login_error'] = true;
                header("Location: login.php");
                exit();
            }
        } else {
            $_SESSION['login_error'] = true;
            header("Location: login.php");
            exit();
        }
    } else {
        $_SESSION['login_error'] = true;
        header("Location: login.php");
        exit();
    }
?>
