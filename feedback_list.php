<?php
// feedback_list.php

// Establish a database connection
$servername = "localhost"; // Change this to your servername
$username = "root"; // Change this to your username
$password = ""; // Change this to your password
$dbname = "feedback_management_system"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch feedback data
$sql = "SELECT id, course_unit, teacher, date, username FROM course_feedback";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback List</title>
     <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('EFac.jpg'); /* Change to your image path */
            background-size: cover;
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-position: center;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.9); /* White background with opacity */
        }
        h1 {
            text-align: center;
        }
        table {
            width: 55%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: rgba(255, 255, 255, 0.8); /* White background with opacity */
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        .form-group {
            margin-bottom: 20px;
            text-align: center;
        }
        input[type="text"] {
            width: 70%;
            padding: 10px;
            margin-right: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            padding: 10px 20px;
            border: none;
            background-color: #007BFF;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Feedback List</h1>
    <table>
        <tr>
            <th>Username</th>
            <th>Course feedback Summury</tr>

        <?php
        if ($result->num_rows > 0) {
            $displayedUsernames = array(); // Array to keep track of displayed usernames

            // Output data of each row
            while($row = $result->fetch_assoc()) {
                if (!in_array($row["username"], $displayedUsernames)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row["username"]) . "</td>";
                    echo "<td><a href='feedback_view.php?username=" . urlencode($row["username"]) . "'>View</a></td>";
                    echo "</tr>";
                    $displayedUsernames[] = $row["username"]; // Add username to the array
                }
            }
        } else {
            echo "<tr><td colspan='2'>0 results</td></tr>";
        }

        // Close connection
        $conn->close();
        ?>

    </table>
</body>
</html>
