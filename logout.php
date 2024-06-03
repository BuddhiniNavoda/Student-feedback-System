<?php
// Start session if not already started
session_start();

// Perform logout action, such as destroying the session
session_destroy();

// Redirect to index.php after logout
header("Location: index.php");
exit;
?>
