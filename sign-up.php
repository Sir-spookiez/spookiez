<?php
// signup.php
// Defining variables
$title = "King of Burgers";
$header = "Create a New Account";
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
$signUpButton = "Sign Up";
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
 
    <!-- Sign-Up Section -->
    <section id="signup">
        <h3><?php echo $header; ?></h3>
        <form id="signupForm" method="POST" action="signup_process.php">
            <label for="newEmail"><?php echo $emailLabel; ?></label>
            <input type="email" id="newEmail" name="newEmail" required>
            <label for="newPassword"><?php echo $passwordLabel; ?></label>
            <input type="password" id="newPassword" name="newPassword" required>
            <button type="submit"><?php echo $signUpButton; ?></button>
        </form>
    </section>

    <footer>
        <p><?php echo $footerText; ?></p>
    </footer>

    <script src="burgers.js"></script>
</body>
</html>
