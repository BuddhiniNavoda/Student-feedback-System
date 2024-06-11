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
$sql = "SELECT * FROM course_feedback WHERE username = ?";
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
    width: 95%;
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
    echo "<h2>Course feedback Summary for Username: $username</h2>";
    echo "<table>";
    echo "<tr><th>Course Unit</th><th>Teacher</th><th>Date</th><th>General 1</th><th>General 2</th><th>General 3</th><th>Materials 1</th><th>Materials 2</th><th>Materials 3</th><th>Delivery 1</th><th>Delivery 2</th><th>Delivery 3</th><th>Overall 1</th><th>Comments</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["course_unit"] . "</td>";
        echo "<td>" . $row["teacher"] . "</td>";
        echo "<td>" . $row["date"] . "</td>";
        echo "<td>" . $row["general_1"] . "</td>";
        echo "<td>" . $row["general_2"] . "</td>";
        echo "<td>" . $row["general_3"] . "</td>";
        echo "<td>" . $row["materials_1"] . "</td>";
        echo "<td>" . $row["materials_2"] . "</td>";
        echo "<td>" . $row["materials_3"] . "</td>";
        echo "<td>" . $row["delivery_1"] . "</td>";
        echo "<td>" . $row["delivery_2"] . "</td>";
        echo "<td>" . $row["delivery_3"] . "</td>";
        echo "<td>" . $row["overall_1"] . "</td>";
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
