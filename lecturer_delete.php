<<<<<<< HEAD
<?php
include 'db_connect.php';

$L_ID = $_GET['L_ID'];

// Delete the lecture from the `lecturer` table
$query_delete_lecture = "DELETE FROM lecturer WHERE L_ID='$L_ID'";
mysqli_query($conn, $query_delete_lecture);

header("Location: lecture_manage.php");
exit();
?>
=======
<?php
include 'db_connect.php';

$L_ID = $_GET['L_ID'];

// Delete the lecture from the `lecturer` table
$query_delete_lecture = "DELETE FROM lecturer WHERE L_ID='$L_ID'";
mysqli_query($conn, $query_delete_lecture);

header("Location: lecture_manage.php");
exit();
?>
>>>>>>> 3dd0583586d2aabc9dd7c8843076206d74304298
