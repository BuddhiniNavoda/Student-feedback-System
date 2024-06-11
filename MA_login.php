<<<<<<< HEAD
<?php
include 'db_connect.php'; // Include the db_connection.php file

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $MA_ID = $_POST['MA_ID'];
    $MA_Name = $_POST['MA_Name'];

    // Perform any necessary validation

    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to check if the entered credentials exist in the ma_login table
    $sql = "SELECT * FROM ma_login WHERE MA_ID = '$MA_ID' AND MA_Name = '$MA_Name'";
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
        // Credentials are valid, redirect to dashboard
        header("Location: dashboard.php");
        exit;
    } else {
        // Credentials are invalid, set error message
        $error = "Invalid credentials. Please try again.";    }
    
 


    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<img src="logo.png" alt="Campus Logo" class="logo">
    <title>Manage Assistant Login</title>
    <style>
        body {
           
            background-image: url('EFac.jpg'); 
            background-size: 150%;
            background-position: center;
            background-repeat: no-repeat;
        
        }
        .container {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 90%; /* Adjust the width as needed */
            max-width: 600px; /* Set a maximum width to prevent the container from becoming too wide */
            margin: 100px auto;
        }
        h1 {
            color: black;
			text-align: center;
            margin-bottom: 20px;
        }
        p {
            margin-bottom: 40px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .btn {
            padding: 10px 20px;
            background-color: #008CBA;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #005F6B;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Management Assistant Login</h1>
        <form method="post" action="">
            <div class="form-group">
                <label for="MA_ID">MA ID:</label>
                <input type="text" id="MA_ID" name="MA_ID" required>
            </div>
            <div class="form-group">
                <label for="MA_Name">MA Name:</label>
                <input type="text" id="MA_Name" name="MA_Name" required>
            </div>
            <button type="submit" class="btn" name="login_submit">Login</button>
            <?php 
            if (isset($_POST['login_submit']) && !empty($error)) {
                // Display error message only if the form is submitted by the "Login" button click and there is an error
            ?>
                <p style="color: red;"><?php echo $error; ?></p>
            <?php } ?>
        </form>
    </div>
</body>
</html>







=======
<?php
include 'db_connect.php'; // Include the db_connection.php file

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $MA_ID = $_POST['MA_ID'];
    $MA_Name = $_POST['MA_Name'];

    // Perform any necessary validation

    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to check if the entered credentials exist in the ma_login table
    $sql = "SELECT * FROM ma_login WHERE MA_ID = '$MA_ID' AND MA_Name = '$MA_Name'";
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
        // Credentials are valid, redirect to dashboard
        header("Location: dashboard.php");
        exit;
    } else {
        // Credentials are invalid, set error message
        $error = "Invalid credentials. Please try again.";    }
    
 


    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<img src="logo.png" alt="Campus Logo" class="logo">
    <title>Manage Assistant Login</title>
    <style>
        body {
           
            background-image: url('EFac.jpg'); 
            background-size: 150%;
            background-position: center;
            background-repeat: no-repeat;
        
        }
        .container {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 90%; /* Adjust the width as needed */
            max-width: 600px; /* Set a maximum width to prevent the container from becoming too wide */
            margin: 100px auto;
        }
        h1 {
            color: black;
			text-align: center;
            margin-bottom: 20px;
        }
        p {
            margin-bottom: 40px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .btn {
            padding: 10px 20px;
            background-color: #008CBA;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #005F6B;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Management Assistant Login</h1>
        <form method="post" action="">
            <div class="form-group">
                <label for="MA_ID">MA ID:</label>
                <input type="text" id="MA_ID" name="MA_ID" required>
            </div>
            <div class="form-group">
                <label for="MA_Name">MA Name:</label>
                <input type="text" id="MA_Name" name="MA_Name" required>
            </div>
            <button type="submit" class="btn" name="login_submit">Login</button>
            <?php 
            if (isset($_POST['login_submit']) && !empty($error)) {
                // Display error message only if the form is submitted by the "Login" button click and there is an error
            ?>
                <p style="color: red;"><?php echo $error; ?></p>
            <?php } ?>
        </form>
    </div>
</body>
</html>







>>>>>>> 3dd0583586d2aabc9dd7c8843076206d74304298
