<?php
include 'db_connect.php';

$Ccode = $_GET['Ccode'];

// Delete the course from the `course` table
$query_delete_course = "DELETE FROM course WHERE Ccode='$Ccode'";
mysqli_query($conn, $query_delete_course);

header("Location: course_manage.php");
exit();
?>
