<?php
session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate password and confirm password
    if ($password !== $confirm_password) {
        // Passwords don't match, handle error (e.g., redirect back to create_account.php with an error message)
        header("Location: create_account.php?error=password_mismatch");
        exit();
    }

    // Dummy code to generate user ID (replace with your database auto-increment)
    $userid = 1; // Replace with auto-increment from database
    
    // Insert user data into database (replace with your actual database insertion code)
    // Example query: INSERT INTO users (userid, username, password) VALUES ('$userid', '$username', '$password')
    
    // Set session variable to indicate user is logged in
    $_SESSION['username'] = $username;

    // Redirect to the user registration page
    header("Location: user_registration.php");
    exit();
}
?>

