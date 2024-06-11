<?php
// Include the database connection file
include 'db_connect.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    $department = $_POST['department'];

    // Insert data into the registration table
    $sql = "INSERT INTO registration (RName, Password, RDepartment) VALUES ('$username', '$password', '$department')";
    
    // Execute the query
    if ($conn->query($sql) === TRUE) {
        header("Location: feedback.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Form not submitted.";
}
?>
