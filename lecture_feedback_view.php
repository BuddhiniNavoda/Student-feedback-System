<?php
// feedback_view.php

// Establish a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "feedback_management_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get username from URL
$username = $_GET['username'];

// Fetch feedback data for the specified username
$sql = "SELECT * FROM lecture_feedback WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Feedback View</title>
    
	<Style>
	body {
    background-color: #f0f8ff; /* Light blue background color */
    font-family: Arial, sans-serif;
}

h2 {
    text-align: center;
    color: #333; /* Darker text for contrast */
}

table {
    width: 100%;
    margin: 20px auto;
    border-collapse: collapse;
    background-color: #fff; /* White background for the table */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Subtle shadow for better visibility */
}

th, td {
    border: 1px solid #ddd;
    padding: 12px;
    text-align: center;
}

th {
    background-color: #4CAF50; /* Green background for header */
    color: white;
}



tr:nth-child(even) {
    background-color: #f2f2f2; /* Light grey for even rows */
}

tr:hover {
    background-color: #ddd; /* Grey on hover */
}

	</Style>
</head>
<body>
<?php
if ($result->num_rows > 0) {
    // Output data of each feedback in a table
    echo "<h2>Lecture feedback Summary for Username: $username</h2>";
    echo "<table>";
    echo "<tr><th>Course Unit</th><th>Teacher</th><th>Date</th><th>Time Management 1</th><th>Time Management 2</th><th>Time Management 3</th><th>Delivery Method 1</th><th>Delivery Method 2</th><th>Delivery Method 3</th><th>Subject Command 1</th><th>Subject Command 2</th><th>Subject Command 3</th><th>About Myself 1</th><th>About Myself 2</th><th>Comments</th></tr>";

   while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["course_unit"] . "</td>";
        echo "<td>" . $row["teacher"] . "</td>";
        echo "<td>" . $row["date"] . "</td>";
        echo "<td>" . $row["timeManagement_1"] . "</td>";
        echo "<td>" . $row["timeManagement_2"] . "</td>";
        echo "<td>" . $row["timeManagement_3"] . "</td>";
        echo "<td>" . $row["deliveryMethod_1"] . "</td>";
        echo "<td>" . $row["deliveryMethod_2"] . "</td>";
        echo "<td>" . $row["deliveryMethod_3"] . "</td>";
        echo "<td>" . $row["subjectCommand_1"] . "</td>";
        echo "<td>" . $row["subjectCommand_2"] . "</td>";
        echo "<td>" . $row["subjectCommand_3"] . "</td>";
        echo "<td>" . $row["aboutMyself_1"] . "</td>";
        echo "<td>" . $row["aboutMyself_2"] . "</td>";
        echo "<td>" . $row["comments"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<h2>No feedback found for username: $username</h2>";
}

// Close connection
$stmt->close();
$conn->close();
?>
</body>
</html>
