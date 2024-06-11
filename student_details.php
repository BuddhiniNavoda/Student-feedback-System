<<<<<<< HEAD
<?php
// Include the database connection file
include_once 'db_connect.php';
// Start the session
session_start();

// Check if User_id is set in the session
if(isset($_SESSION['User_id'])) {
    $User_ID = $_SESSION['User_id'];
    // Now you can use $User_ID in this file
} else {
    // Redirect to login page or handle the case where User_id is not set
    header("Location: login.php");
    exit();
}
$ma_id_options = '';
    $ma_query = "SELECT MA_ID FROM ma_login";
    $ma_result = $conn->query($ma_query);
    if ($ma_result->num_rows > 0) {
        while ($ma_row = $ma_result->fetch_assoc()) {
            $ma_id_options .= '<option value="' . $ma_row['MA_ID'] . '">' . $ma_row['MA_ID'] . '</option>';
        }
    } else {
        // Handle case where there are no MA IDs
        $ma_id_options = '<option value="">No MA IDs found</option>';
    }
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get student details from the form
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $semester = $_POST['semester'];
    $studentId = $_POST['studentId']; // Corrected variable name
	$S_MA_ID=$_POST['ma_id'];;
	
	

    // Insert data into the database
    $insert_sql = "INSERT INTO student (S_ID,Name, Semester,S_UserID,S_MA_ID) VALUES (?, ?,?,?,?)";
    $stmt = $conn->prepare($insert_sql);
    //$stmt->bind_param("sisi", $firstNameLastName, $semester, $studentId,$User_id);
	$stmt->bind_param("sssss", $studentId, $firstNameLastName, $semester, $User_ID, $S_MA_ID);

    $firstNameLastName = $firstName . " " . $lastName;

   if ($stmt->execute()) {
        // If record inserted successfully, redirect to registration interface
        echo "<script>window.location = 'user_registration.php';</script>";
        exit;
    } else {
        echo "Error: " . $insert_sql . "<br>" . $conn->error;
    }
	
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details Form</title>
    <!-- Add your CSS styles here -->
    <style>
        body {
            background-image: url('EFac.jpg'); 
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 45px auto;
            padding: 20px;
            width: 48%;
            max-width: 600px;
        }
        h1 {
            color: #333333;
            text-align: center;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        input[type="text"], select {
            border: 1px solid #cccccc;
            border-radius: 5px;
            padding: 10px;
            width: 100%;
        }
        select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='10' height='5' viewBox='0 0 10 5'%3E%3Cpath fill='%23333333' d='M5 5L0 0h10z'/%3E%3C/svg%3E");
            background-size: 10px 5px;
            background-position: right 10px center;
            background-repeat: no-repeat;
            padding-right: 30px;
        }
        .button-container {
            text-align: center;
        }
        button[type="submit"] {
            background-color: #4CAF50;
            border: none;
            color: white;
            cursor: pointer;
            font-size: 16px;
            padding: 10px 20px;
            border-radius: 5px;
        }
    
		</style>
</head>
<body>
    <div class="container">
	<img src="logo.png" alt="Campus Logo" class="logo">
        <h1>Fill Student Details</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="form-group">
                <label for="firstName">First Name:</label>
                <input type="text" id="firstName" name="firstName" required>
            </div>
            <div class="form-group">
                <label for="lastName">Last Name:</label>
                <input type="text" id="lastName" name="lastName" required>
            </div>
            <div class="form-group">
                <label for="studentId">Student ID:</label>
                <input type="text" id="studentId" name="studentId" pattern="20\d{2}/[A-Za-z]/\d{3}" title="Please enter a valid Student ID (e.g., 20XX/E/XXX)" required>
            </div>
            <div class="form-group">
                <label for="semester">Choose Semester:</label>
                <select id="semester" name="semester" required>
                    <option value="">Select Semester</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                </select>
            </div>
			<div class="form-group">
				<label for="ma_id"> MA ID:</label>
				<select id="ma_id" name="ma_id" required>
				<option value="">Select MA ID</option>
				<?php echo $ma_id_options; ?>
				</select><br><br>
			</div>
            <div class="button-container">
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>
=======
<?php
// Include the database connection file
include_once 'db_connect.php';
// Start the session
session_start();

// Check if User_id is set in the session
if(isset($_SESSION['User_id'])) {
    $User_ID = $_SESSION['User_id'];
    // Now you can use $User_ID in this file
} else {
    // Redirect to login page or handle the case where User_id is not set
    header("Location: login.php");
    exit();
}
$ma_id_options = '';
    $ma_query = "SELECT MA_ID FROM ma_login";
    $ma_result = $conn->query($ma_query);
    if ($ma_result->num_rows > 0) {
        while ($ma_row = $ma_result->fetch_assoc()) {
            $ma_id_options .= '<option value="' . $ma_row['MA_ID'] . '">' . $ma_row['MA_ID'] . '</option>';
        }
    } else {
        // Handle case where there are no MA IDs
        $ma_id_options = '<option value="">No MA IDs found</option>';
    }
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get student details from the form
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $semester = $_POST['semester'];
    $studentId = $_POST['studentId']; // Corrected variable name
	$S_MA_ID=$_POST['ma_id'];;
	
	

    // Insert data into the database
    $insert_sql = "INSERT INTO student (S_ID,Name, Semester,S_UserID,S_MA_ID) VALUES (?, ?,?,?,?)";
    $stmt = $conn->prepare($insert_sql);
    //$stmt->bind_param("sisi", $firstNameLastName, $semester, $studentId,$User_id);
	$stmt->bind_param("sssss", $studentId, $firstNameLastName, $semester, $User_ID, $S_MA_ID);

    $firstNameLastName = $firstName . " " . $lastName;

   if ($stmt->execute()) {
        // If record inserted successfully, redirect to registration interface
        echo "<script>window.location = 'user_registration.php';</script>";
        exit;
    } else {
        echo "Error: " . $insert_sql . "<br>" . $conn->error;
    }
	
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details Form</title>
    <!-- Add your CSS styles here -->
    <style>
        body {
            background-image: url('EFac.jpg'); 
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 45px auto;
            padding: 20px;
            width: 48%;
            max-width: 600px;
        }
        h1 {
            color: #333333;
            text-align: center;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        input[type="text"], select {
            border: 1px solid #cccccc;
            border-radius: 5px;
            padding: 10px;
            width: 100%;
        }
        select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='10' height='5' viewBox='0 0 10 5'%3E%3Cpath fill='%23333333' d='M5 5L0 0h10z'/%3E%3C/svg%3E");
            background-size: 10px 5px;
            background-position: right 10px center;
            background-repeat: no-repeat;
            padding-right: 30px;
        }
        .button-container {
            text-align: center;
        }
        button[type="submit"] {
            background-color: #4CAF50;
            border: none;
            color: white;
            cursor: pointer;
            font-size: 16px;
            padding: 10px 20px;
            border-radius: 5px;
        }
    
		</style>
</head>
<body>
    <div class="container">
	<img src="logo.png" alt="Campus Logo" class="logo">
        <h1>Fill Student Details</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="form-group">
                <label for="firstName">First Name:</label>
                <input type="text" id="firstName" name="firstName" required>
            </div>
            <div class="form-group">
                <label for="lastName">Last Name:</label>
                <input type="text" id="lastName" name="lastName" required>
            </div>
            <div class="form-group">
                <label for="studentId">Student ID:</label>
                <input type="text" id="studentId" name="studentId" pattern="20\d{2}/[A-Za-z]/\d{3}" title="Please enter a valid Student ID (e.g., 20XX/E/XXX)" required>
            </div>
            <div class="form-group">
                <label for="semester">Choose Semester:</label>
                <select id="semester" name="semester" required>
                    <option value="">Select Semester</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                </select>
            </div>
			<div class="form-group">
				<label for="ma_id"> MA ID:</label>
				<select id="ma_id" name="ma_id" required>
				<option value="">Select MA ID</option>
				<?php echo $ma_id_options; ?>
				</select><br><br>
			</div>
            <div class="button-container">
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>
>>>>>>> 3dd0583586d2aabc9dd7c8843076206d74304298
