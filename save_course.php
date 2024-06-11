<?php
include 'db_connect.php';

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $courseCode = $_POST['course_code'];
    $courseName = $_POST['course_name'];
    
    // Perform SQL query to insert the course data into the database
    $insert_query = "INSERT INTO course (Ccode, CName) 
                     VALUES ('$courseCode', '$courseName')";
    
    if (mysqli_query($conn, $insert_query)) {
        // Course added successfully, redirect back to index.php
        header("Location: course_manage.php");
        exit();
    } else {
        echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
