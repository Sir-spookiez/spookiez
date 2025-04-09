<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutoring System</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>
<body>
    <header>
        <nav>
            <ul class="navbar">
                <li><a href="index.php">Home</a></li>
                <li><a href="courses.php">Courses</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="hero">
            <h1>Welcome to Our Tutoring Platform</h1>
            <p>Track your progress, improve skills, and excel in your studies.</p>
            <a href="login.php" class="btn">Get Started</a>
        </section>

        <section class="features">
            <h2>Features</h2>
            <ul>
                <li>Interactive Quizzes</li>
                <li>Progress Tracking</li>
                <li>Personalized Recommendations</li>
            </ul>
        </section>
        <p>At GibJohn tutoring, we have a range of staff ready to help you grow</p>
        <div class="quotecontainer">
            <div class="profilepic">
                <img src="images/pexels-stefanstefancik-91227.jpg" alt="picture of staff member stephan" title="staff member: stefan">
            </div>
            <div class="profilequote">
                <h3>"We take pride in our good quality of one-way service"</h3>
                <p>Staff member Stefan</p>
            </div>
        </div>
    </main>

    <!-- Cookie Consent Modal -->
    <div id="cookieConsentModal" class="cookie-consent-modal">
        <div class="cookie-consent-modal-content">
            <span id="closeModal" class="close">&times;</span>
            <p>This website uses cookies to ensure you get the best experience. <a href="learn-more.php">Learn More</a></p>
            <button id="acceptCookies" class="btn">Got it!</button>
        </div>
    </div>

    <footer>
        <p>&copy; 2025 Tutoring System</p>
    </footer>

    <!-- Cookie consent modal script -->
    <script>
        window.onload = function () {
            if (!getCookie("cookieConsent")) {
                document.getElementById("cookieConsentModal").style.display = "flex"; // Show the modal if not accepted
            }

            document.getElementById("acceptCookies").onclick = function () {
                setCookie("cookieConsent", "accepted", 30); // Set a cookie for 30 days
                document.getElementById("cookieConsentModal").style.display = "none"; // Hide the modal
            };

            document.getElementById("closeModal").onclick = function () {
                document.getElementById("cookieConsentModal").style.display = "none"; // Close the modal
            };
        };

        function getCookie(name) {
            let cookieArr = document.cookie.split(";");

            for (let i = 0; i < cookieArr.length; i++) {
                let cookie = cookieArr[i].trim();
                if (cookie.indexOf(name + "=") == 0) {
                    return cookie.substring(name.length + 1, cookie.length);
                }
            }

            return "";
        }

        function setCookie(name, value, days) {
            let date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000)); // Set expiration
            let expires = "expires=" + date.toUTCString();
            document.cookie = name + "=" + value + ";" + expires + ";path=/";
        }
    </script>
</body>
</html>
