<?php
include 'db_connect.php';

// Check if the section is provided in the URL
if (isset($_GET['Section'])) {
    // Get the section from the URL parameter
    $section = $_GET['Section'];

    // Delete the entry from the `edit_lfb` table
    $query = "DELETE FROM edit_lfb WHERE section='$section'";
    mysqli_query($conn, $query);

    // Redirect back to the edit course feedback page
    header("Location: edit_lecture_feedback.php");
    exit();
} else {
    // Redirect to an error page or handle the error accordingly
    echo "Section is not provided.";
}
?>
