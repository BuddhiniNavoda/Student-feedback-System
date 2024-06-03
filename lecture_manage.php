<?php
include 'db_connect.php';

// Function to handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_L_ID = $_POST['new_L_ID'];
    $new_LName = $_POST['new_LName'];

    // Insert new lecture into the database
    $insert_query = "INSERT INTO lecturer (L_ID, LName) VALUES ('$new_L_ID', '$new_LName')";
    mysqli_query($conn, $insert_query);

    // Refresh the page to update the lecture list
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}

$query = "SELECT * FROM lecturer";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lecturer List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #8BB381;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #fff;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            margin-top: 20px;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        tr:hover {
            background-color: #f9f9f9;
        }

        a {
            text-decoration: none;
            color: #007bff;
            transition: color 0.3s;
        }

        a:hover {
            color: #0056b3;
        }

        .add-btn {
            background-color: #007bff;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s;
        }

        .add-btn:hover {
            background-color: #0056b3;
        }

        .dashboard-link {
            color: #fff;
            font-weight: bold;
            margin-top: 10px;
            display: block;
        }

        .dashboard-link:hover {
            color: #007bff;
        }
    </style>
</head>
<body>
    <h1>Lecturer List</h1>
    <a href="#" class="add-btn" onclick="showNewLectureRow()">Add New Lecturer</a>
    <p class="dashboard-link">If you want to go back to the dashboard, <a href="dashboard.php">click here</a>.</p> <!-- Message with Dashboard Link -->
    <table border="1">
        <tr>
            <th>Lecturer ID</th>
            <th>Lecturer Name</th>
            <th>Action</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row['L_ID']}</td>";
            echo "<td>{$row['LName']}</td>";
            echo "<td><a href='lecturer_edit.php?L_ID={$row['L_ID']}'>lecturer_edit</a> | <a href='lecturer_delete.php?L_ID={$row['L_ID']}'>lecturer_delete</a></td>";
            echo "</tr>";
        }
        ?>
        <!-- New row for adding a lecture -->
        <tr id="new-lecture-row" style="display: none;">
            <form method="post" onsubmit="return confirm('Are you sure you want to save this lecture?');">
                <td><input type="text" name="new_L_ID" placeholder="Lecturer ID" required></td>
                <td><input type="text" name="new_LName" placeholder="Lecturer Name" required></td>
                <td>
                    <input type="submit" name="save" value="Save" style="background-color: #28a745; color: #fff; border: none; border-radius: 5px; padding: 5px 10px; cursor: pointer;">
                    <button type="button" onclick="clearFields()" style="background-color: #dc3545; color: #fff; border: none; border-radius: 5px; padding: 5px 10px; cursor: pointer;">Clear</button>
                </td>
            </form>
        </tr>
    </table>

    <script>
        function showNewLectureRow() {
            var newRow = document.getElementById('new-lecture-row');
            newRow.style.display = 'table-row';
        }

        function clearFields() {
            var inputs = document.querySelectorAll('#new-lecture-row input[type="text"]');
            inputs.forEach(function(input) {
                input.value = '';
            });
        }
    </script>
</body>
</html>

<?php
mysqli_close($conn);
?>
