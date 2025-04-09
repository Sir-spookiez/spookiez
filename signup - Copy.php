<?php
    //PG Connection String
    $conString = "host=82.165.6.246 port=5432 dbname=pg24_225321 user=pg24tylerevetts password=pgte782454";

    //Create connection
    $pgCon = pg_connect($conString);

    //Session config
    session_start();

    // Check if the user is already logged in
    if (isset($_SESSION['userAuth']) && $_SESSION['userAuth'] == true) {
        header("Location: LoginSuccess.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
body {
    margin: 0;
    padding: 0;
    background-color: #000;
    color: #fff;
    font-family: Arial, Helvetica, sans-serif;
}

header {
    padding: 20px;
    background-color: #000;
    color: #fff;
    text-align: center;
}

main {
    width: 50%; /* Reduced width for a smaller box */
    margin-left: 25%; /* Centered the box */
    margin-right: 25%;
    margin-top: 30px;
    margin-bottom: 30px;
    background-color: #333;
    box-shadow: 0px 0px 10px 10px #444;
    text-align: center;
    padding: 20px; /* Reduced padding */
}

footer {
    background-color: #000;
    color: #fff;
    padding: 20px;
    text-align: center;
    position: fixed;
    bottom: 0;
    width: 100%;
}

.red {
    color: red;
}

.errorLogin {
    width: 80%;
    background-color: rgb(255,230,230);
    border: solid 1px rgb(255,0,0);
    color: rgb(255,0,0);
    padding: 10px;
    border-radius: 5px;
    margin-left: 10%;
    margin-right: 10%;
    margin-bottom: 10px;
}

form {
    display: inline-block;
    text-align: left;
    width: 100%;
}

input[type="text"],
input[type="password"],
input[type="email"] {
    width: 100%;
    padding: 10px; /* Reduced padding */
    margin: 8px 0; /* Reduced margin */
    background-color: #222;
    color: #fff;
    border: 1px solid #444;
    border-radius: 5px;
}

input[type="submit"] {
    background-color: #14d28a;
    color: #fff;
    padding: 10px 20px; /* Adjusted padding */
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #12c57a;
}

</style>
    <title>Sign Up</title>
</head>
<body>
    <header><h1>Sign Up</h1></header>
    <main>
        <h1>Sign Up</h1>
        <p>Please enter the following details below to sign up.</p>
        <form method="POST" action="validateSignUp.php">
            <p>Username:<span class="red">*</span></p>
            <input type="text" required maxlength="200" name="user">
            <p>Password:<span class="red">*</span></p>
            <input type="password" required maxlength="200" name="paswd">
            <p>Confirm Password:<span class="red">*</span></p>
            <input type="password" required maxlength="200" name="paswdConfirm">
            <p>Email:<span class="red">*</span></p>
            <input type="email" required maxlength="200" name="email">
            <p><input type="submit" value="Sign Up" href="dashboard.php"></p>
        </form>
        <p><span class="red">*</span> mandatory field</p>

        <?php
            if (isset($_SESSION['signup_error']) && $_SESSION['signup_error'] == true) {
                echo "<div class=\"errorLogin\">\n";
                if (isset($_SESSION['signup_e_message'])) {
                    $message = $_SESSION['signup_e_message'];
                    echo "<p><strong>ERROR:</strong> $message</p>";
                    unset($_SESSION['signup_e_message']);
                }
                echo "<p><strong>ERROR:</strong> Some of your details are missing or incorrect, please try again.</p>";
                echo "</div>\n";
                unset($_SESSION['signup_error']);
            } else {
                echo "<p><strong>ERROR:</strong> Some of your details are missing or incorrect, please try again.</p>";
                echo "</div>\n";
            }
        ?>

        <p>Already have an account? <a href="login.php" title="Log In" alt="Link to sign in to our site">Return to Log In</a></p>
    </main>
    <footer>
        <p>Log In Example - &copy; Tyler Evetts 2025</p>
    </footer>
</body>
</html>
