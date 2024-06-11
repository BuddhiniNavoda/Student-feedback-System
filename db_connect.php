<<<<<<< HEAD
<?php
// Database configuration
$host = "localhost"; // Host name
$user = "root"; // Database username
$password = ""; // Database password
$database = "feedback_management_system"; // Database name
$port = 3306; // Database port (default is 3306)

// Create connection
$conn = new mysqli($host, $user, $password, $database, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to execute SQL queries
function execute_query($sql) {
    global $conn;
    if ($conn->query($sql) === TRUE) {
        echo "Query executed successfully";
    } else {
        echo "Error executing query: " . $conn->error;
    }
}

// Close connection
function close_connection() {
    global $conn;
    $conn->close();
}
?>

=======
<?php
// Database configuration
$host = "localhost"; // Host name
$user = "root"; // Database username
$password = ""; // Database password
$database = "feedback_management_system"; // Database name
$port = 3306; // Database port (default is 3306)

// Create connection
$conn = new mysqli($host, $user, $password, $database, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to execute SQL queries
function execute_query($sql) {
    global $conn;
    if ($conn->query($sql) === TRUE) {
        echo "Query executed successfully";
    } else {
        echo "Error executing query: " . $conn->error;
    }
}

// Close connection
function close_connection() {
    global $conn;
    $conn->close();
}
?>

>>>>>>> 3dd0583586d2aabc9dd7c8843076206d74304298
