<?php
// Include the database connection file
include_once 'db_connect.php';

// Start the session
session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username, user ID, and department from the form
    $username = $_POST['username'];
    $userid = $_POST['userid'];
    $department = $_POST['department'];

    // Validate username, user ID, and department
    // (You should add more validation here)

    // Check if the user already exists in the login table
    $check_user_sql = "SELECT * FROM login WHERE UserName = '$username'";
    $result = $conn->query($check_user_sql);

    if ($result->num_rows > 0) {
        // User already exists, retrieve the associated user ID
        $row = $result->fetch_assoc();
        $userid_from_db = $row['User_ID'];

        // Check if the provided user ID matches the one in the database
        if ($userid_from_db != $userid) {
            // Provided user ID does not match the one in the database
            header("Location: login.php?error=Error: User ID mismatch");
            exit(); // Terminate the script
        }
    } else {
        // User does not exist, insert a new row into the login table
        $insert_sql = "INSERT INTO login (User_ID, UserName, Department) VALUES ('$userid', '$username', '$department')";

        // Execute the insert query
        if ($conn->query($insert_sql) !== TRUE) {
            // Error adding new user
            header("Location: login.php?error=Error adding new user: " . $conn->error);
            exit(); // Terminate the script
        }
    }

    // Set the user ID as a session variable
    $_SESSION['User_id'] = $userid;

    // User login successful, redirect to registration interface
    header("Location: student_details.php?success=Login successful");
    exit();
} else {
    // Redirect to login page if form is not submitted
    header("Location: login.php");
    exit();
}

// Close database connection
$conn->close();
?>
