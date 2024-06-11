<?php
include 'db_connect.php';

// Function to handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_Section = $_POST['new_Section'];
    $new_Category = $_POST['new_Category'];

    // Insert new entry into the edit_lfb table
    $insert_query = "INSERT INTO edit_lfb (section, category) VALUES ('$new_Section', '$new_Category')";
    mysqli_query($conn, $insert_query);

    // Refresh the page to update the list
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

$query = "SELECT * FROM edit_lfb";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Lecture Feedback Form</title>
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
    <h1>Edit Lecture Feedback Form</h1>
    <a href="#" class="add-btn" onclick="showNewCourseRow()">Add New Section</a>
    <p class="dashboard-link">If you want to go back to the dashboard, <a href="dashboard.php">click here</a>.</p> <!-- Message with Dashboard Link -->
    <table border="1">
        <tr>
            <th>Section</th>
            <th>Category</th>
            <th>Action</th>
        </tr>
        
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row['Section']}</td>";
            echo "<td>{$row['Category']}</td>";
            echo "<td><a href='l_edit.php?Section={$row['Section']}'>L_Edit</a> | <a href='l_delete.php?Section={$row['Section']}'>L_Delete</a></td>";
            echo "</tr>";

        }
        ?>
        
        <!-- New row for adding a course -->
        <tr id="new-course-row" style="display: none;">
            <form method="post" onsubmit="return confirm('Are you sure you want to save this course?');">
                <td><input type="text" name="new_Section" placeholder="Section" required></td>
                <td><input type="text" name="new_Category" placeholder="Category" required></td>
                <td>
                    <input type="submit" name="save" value="Save" style="background-color: #28a745; color: #fff; border: none; border-radius: 5px; padding: 5px 10px; cursor: pointer;">
                    <button type="button" onclick="clearFields()" style="background-color: #dc3545; color: #fff; border: none; border-radius: 5px; padding: 5px 10px; cursor: pointer;">Clear</button>
                </td>
            </form>
        </tr>
    </table>

    <script>
        function showNewCourseRow() {
            var newRow = document.getElementById('new-course-row');
            newRow.style.display = 'table-row';
        }

        function clearFields() {
            var inputs = document.querySelectorAll('#new-course-row input[type="text"]');
            inputs.forEach(function(input) {
                input.value = '';
            });
        }
    </script>
</body>
</html>

