<?php
include 'db_connect.php';

$L_ID = $_GET['L_ID'];

// Delete the lecture from the `lecturer` table
$query_delete_lecture = "DELETE FROM lecturer WHERE L_ID='$L_ID'";
mysqli_query($conn, $query_delete_lecture);

header("Location: lecture_manage.php");
exit();
?>
