<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Feedback Management System</title>
    <style>
        body {
            background-image: url('faculty.jpg');
            background-size: cover; 
            color: white;
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 20px;
        }
        .container {
            background-color: rgba(95, 158, 160, 0.7); 
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 90%; 
            max-width: 600px; 
            margin: 100px auto;
        }
        h1 {
            color: black;
            margin-bottom: 20px;
        }
        p { color: black;
            margin-bottom: 40px;
            font-size: 1.2em; 
        }
        .button-container {
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        .login-button {
            background-color: #4CAF50; /* Green background */
            border: 2px solid black; /* Black border around the button */
            color: black;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            transition-duration: 0.4s;
            cursor: pointer;
            border-radius: 10px;
        }
        .login-button:hover {
            background-color: white;
            color: black;
            border: 2px solid black;
        }
        .logo-container {
            width: 150px;
            height: 150px;
            overflow: hidden;
            border-radius: 50%;
            margin: 0 auto 20px; /* Center the logo and add bottom margin */
        }
        .logo-container img {
            width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to the Student Feedback Management System</h1>
        <p>FACULTY OF ENGINEERING UNIVERSITY OF JAFFNA</p>
        <div class="logo-container">
            <img src="campus_logo.png" alt="Campus Logo">
        </div>
        <div class="button-container">
            <a href="login.php"><button class="login-button">Student Login</button></a>
            <a href="MA_login.php"><button class="login-button">Manage Assistant Login</button></a>
            <a href="lecture_login.php"><button class="login-button">Lecture Login</button></a>
        </div>
    </div>
</body>
</html>
