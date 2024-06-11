<<<<<<< HEAD
<?php
// Database configuration
$host = "localhost"; // Host name
$user = "root"; // Database username
$password = ""; // Database password
$database = "feedback_management_system"; // Database name
$port = 3306; // Database port (default is 3306)

// Create connection
$conn = new mysqli($host, $user, $password, $database, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to execute SQL queries
function execute_query($sql) {
    global $conn;
    if ($conn->query($sql) === TRUE) {
        echo "Query executed successfully";
    } else {
        echo "Error executing query: " . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecture Login</title>
    <style>
        body {
            background-image: url('EFac.jpg'); 
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            text-align: center;
            padding: 20px;
        }
        .container {
            background-color: #5F9EA0;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 90%; /* Adjust the width as needed */
            max-width: 600px; /* Set a maximum width to prevent the container from becoming too wide */
            margin: 100px auto;
        }
        h1 {
            color: white;
            margin-bottom: 20px;
        }
        p {
            margin-bottom: 40px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome Lecture</h1>
        <p>Please enter your ID and name to login.</p>
        <form action="L_Summary.php" method="post">
            <label for="lecture_id">Lecture ID:</label><br>
            <input type="text" id="lecture_id" name="lecture_id" required><br><br>
            <label for="lecture_name">Lecture Name:</label><br>
            <input type="text" id="lecture_name" name="lecture_name" required><br><br>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>


=======
<?php
// Database configuration
$host = "localhost"; // Host name
$user = "root"; // Database username
$password = ""; // Database password
$database = "feedback_management_system"; // Database name
$port = 3306; // Database port (default is 3306)

// Create connection
$conn = new mysqli($host, $user, $password, $database, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to execute SQL queries
function execute_query($sql) {
    global $conn;
    if ($conn->query($sql) === TRUE) {
        echo "Query executed successfully";
    } else {
        echo "Error executing query: " . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecture Login</title>
    <style>
        body {
            background-image: url('EFac.jpg'); 
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            text-align: center;
            padding: 20px;
        }
        .container {
            background-color: #5F9EA0;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 90%; /* Adjust the width as needed */
            max-width: 600px; /* Set a maximum width to prevent the container from becoming too wide */
            margin: 100px auto;
        }
        h1 {
            color: white;
            margin-bottom: 20px;
        }
        p {
            margin-bottom: 40px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome Lecture</h1>
        <p>Please enter your ID and name to login.</p>
        <form action="L_Summary.php" method="post">
            <label for="lecture_id">Lecture ID:</label><br>
            <input type="text" id="lecture_id" name="lecture_id" required><br><br>
            <label for="lecture_name">Lecture Name:</label><br>
            <input type="text" id="lecture_name" name="lecture_name" required><br><br>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>


>>>>>>> 3dd0583586d2aabc9dd7c8843076206d74304298
