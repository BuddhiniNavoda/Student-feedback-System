<?php
include 'db_connect.php';

// Check if form is submitted for updating or adding an entry
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['Section'])) {
        // If Section is provided, it's an update operation
        $section = $_POST['Section'];
        $new_section = $_POST['new_section'];
        $category = $_POST['Category'];
        
        $query = "UPDATE edit_lfb SET Section='$new_section', Category='$category' WHERE section='$section'";
        mysqli_query($conn, $query);
        mysqli_close($conn);
        // Redirect to edit_course_feedback.php after updating the entry
        header("Location: edit_lecture_feedback.php");
        exit();
    } else {
        // If Section is not provided, it's an add operation
        $section = $_POST['new_section'];
        $category = $_POST['Category'];
                
        $query = "INSERT INTO edit_lfb (Section, Category) VALUES ('$section', '$category')";
        mysqli_query($conn, $query);
        mysqli_close($conn);
        // Redirect to edit_course_feedback.php after adding new entry
        header("Location: edit_lecture_feedback.php");
        exit();
    }
}

// Retrieve the section from the URL parameter if it's an edit operation
if (isset($_GET['Section'])) {
    $section = $_GET['Section'];
    $query = "SELECT * FROM edit_lfb WHERE section='$section'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo isset($row) ? 'Edit Entry' : 'Add New Entry'; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            color: #333;
            font-weight: bold;
            margin-bottom: 10px;
            display: block;
        }

        input[type="text"], input[type="submit"] {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 100%;
            margin-bottom: 20px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1><?php echo isset($row) ? 'Edit Entry' : 'Add New Entry'; ?></h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <?php if (isset($row)): ?>
        <input type="hidden" name="Section" value="<?php echo $row['Section']; ?>">
        <?php endif; ?>
        <?php if (!isset($row)): ?>
        <label for="new_section" style="color: #007bff;">Section:</label>
        <input type="text" name="new_section" id="new_section" style="border-color: #007bff;"><br>
        <?php else: ?>
        <label for="new_section" style="color: #007bff;">Section:</label>
        <input type="text" name="new_section" id="new_section" value="<?php echo $row['Section']; ?>" style="border-color: #007bff;"><br>
        <?php endif; ?>
        <label for="Category" style="color: #007bff;">Category:</label>
        <input type="text" name="Category" id="Category" value="<?php echo isset($row) ? $row['Category'] : ''; ?>" style="border-color: #007bff;"><br>
        <input type="submit" value="<?php echo isset($row) ? 'Update Entry' : 'Add Entry'; ?>" style="background-color: #007bff;">
    </form>
</body>
</html>

<?php
mysqli_close($conn);
?>
