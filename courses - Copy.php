<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GibJohn Tutoring | Courses</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }

        header {
            background-color: black;
            color: #fff;
            padding: 10px 20px;
        }

        nav ul {
            list-style: none;
            padding: 0;
            display: flex;
            justify-content: space-around;
        }

        nav ul li {
            margin: 0 10px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
        }

        .courses-container {
            width: 80%;
            margin: 50px auto;
        }

        .course {
            background: #fff;
            padding: 20px;
            margin-bottom: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .course h3 {
            margin-bottom: 10px;
        }

        .course p {
            margin-bottom: 10px;
        }

        .course a {
            text-decoration: none;
            color: #007BFF;
        }

        .course a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="courses.php">Courses</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="courses-container">
            <h2>Available Courses</h2>

            <div class="course">
                <h3>Math</h3>
                <p>Explore topics like Algebra, Geometry, Calculus, and more.</p>
                <a href="course-math.php">Start Course</a>
            </div>

            <div class="course">
                <h3>English</h3>
                <p>Improve your skills in writing, grammar, and literature analysis.</p>
                <a href="course-english.php">Start Course</a>
            </div>

            <div class="course">
                <h3>Science</h3>
                <p>Learn about Biology, Chemistry, Physics, and more.</p>
                <a href="course-science.php">Start Course</a>
            </div>

            <div class="course">
                <h3>History</h3>
                <p>Learn about historical events, figures, and movements.</p>
                <a href="course-history.php">Start Course</a>
            </div>

            <div class="course">
                <h3>Computer Science</h3>
                <p>Learn coding, algorithms, and the basics of computer systems.</p>
                <a href="course-computer-science.php">Start Course</a>
            </div>

        </div>
    </main>

</body>
</html>
