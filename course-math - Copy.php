<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Math Course</title>
    <link rel="stylesheet" type="text/css" href="course-math.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }

        header {
            background: black;
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

        .form-container {
            width: 90%;
            margin: 30px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-container p {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-container a {
            color: #007BFF;
            text-decoration: none;
        }

        .form-container a:hover {
            text-decoration: underline;
        }

        .quiz-buttons-container {
            display: flex;
            flex-wrap: wrap; 
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        .form-container .button {
            padding: 15px 25px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
            min-width: 150px; 
            flex: 1 1 auto; 
        }

        .form-container .button:hover {
            background-color: #0056b3;
        }

        .form-container .button.resources-button {
            margin-top: 20%;
        }

        footer {
            background-color: black;
            color: white;
            text-align: center;
            padding: 15px;
            position: fixed;
            bottom: 0;
            width: 100%;
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
        <section id="courseOverview" class="form-container">
            <h2>Math Course Overview</h2>
            <p>Welcome to the Math Course. This course will help you master essential math skills ranging from basic arithmetic to advanced topics.</p>

            <h3>Topics Covered:</h3>
            <div class="quiz-buttons-container">
                <a href="quiz-basic-arithmatic.php" class="button">Basic Arithmetic</a>
                <a href="quiz-algebra.php" class="button">Algebra</a>
                <a href="quiz-geomatry.php" class="button">Geometry</a>
                <a href="quiz-trigenometry.php" class="button">Trigonometry</a>
                <a href="quiz-calculus.php" class="button">Calculus</a>
            </div>

            <p><a href="resources.php" class="button resources-button">Explore Resources</a></p>
            <p>If you have any questions, <a href="contact.php">contact us</a>.</p>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 Math Learning Platform. All rights reserved.</p>
    </footer>
</body>
</html>
