<?php
// login.php
// Defining variables
$title = "King of Burgers";
$header = "Login to Your Account";
$navLinks = [
    "Home" => "index.php",
    "Menu" => "#menu",
    "Cart" => "#cart",
    "Login" => "login.php",
    "Sign Up" => "signup.php"
];
$footerText = "&copy; 2024 King of Burgers | Made with love for burger lovers!";
$emailLabel = "Email:";
$passwordLabel = "Password:";
$loginButton = "Login";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" type="text/css" href="burger.css">
</head>
<body>

    <!-- Navigation Bar -->
    <header>
        <h1><?php echo $title; ?></h1>
        <nav>
            <ul>
                <?php foreach ($navLinks as $linkText => $linkUrl): ?>
                    <li><a href="<?php echo $linkUrl; ?>"><?php echo $linkText; ?></a></li>
                    <li><a> ---- </a></li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </header>
 
    <!-- Login Section -->
    <section id="login">
        <h3><?php echo $header; ?></h3>
        <form id="loginForm" method="POST" action="login_process.php">
            <label for="email"><?php echo $emailLabel; ?></label>
            <input type="email" id="email" name="email" required>
            <label for="password"><?php echo $passwordLabel; ?></label>
            <input type="password" id="password" name="password" required>
            <button type="submit"><?php echo $loginButton; ?></button>
        </form>
    </section>

    <footer>
        <p><?php echo $footerText; ?></p>
    </footer>

    <script src="burgers.js"></script>
</body>
</html>
