<?php
include 'db_connect.php';

// Check if form is submitted for updating or adding a course
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['Ccode'])) {
        // If Ccode is provided, it's an update operation
        $Ccode = $_POST['Ccode'];
        $New_Ccode = $_POST['New_Ccode']; // Changed variable name to match HTML form
        $CName = $_POST['CName'];
        
        $query = "UPDATE course SET Ccode='$New_Ccode', CName='$CName' WHERE Ccode='$Ccode'";
        mysqli_query($conn, $query);
        mysqli_close($conn);
        // Redirect to index.php after updating course
        header("Location: course_manage.php");
        exit();
    } else {
        // If Ccode is not provided, it's an add operation
        $Ccode = $_POST['New_Ccode']; // Changed variable name to match HTML form
        $CName = $_POST['CName'];
                
$query = "INSERT INTO course (Ccode, CName) VALUES ('$Ccode', '$CName')";
        mysqli_query($conn, $query);
        mysqli_close($conn);
        // Redirect to index.php after adding new course
        header("Location: course_manage.php");
        exit();
    }
}

// Retrieve the course code from the URL parameter if it's an edit operation
if (isset($_GET['Ccode'])) {
    $Ccode = $_GET['Ccode'];
    $query = "SELECT * FROM course WHERE Ccode='$Ccode'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo isset($row) ? 'Edit Course' : 'Add New Course'; ?></title>
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
    <h1><?php echo isset($row) ? 'Edit Course' : 'Add New Course'; ?></h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <?php if (isset($row)): ?>
        <input type="hidden" name="Ccode" value="<?php echo $row['Ccode']; ?>">
        <?php endif; ?>
        <?php if (!isset($row)): ?>
        <label for="New_Ccode" style="color: #007bff;">Course Code:</label>
        <input type="text" name="New_Ccode" id="New_Ccode" style="border-color: #007bff;"><br>
        <?php else: ?>
        <label for="Ccode" style="color: #007bff;">Course Code:</label>
        <input type="text" name="New_Ccode" id="New_Ccode" value="<?php echo $row['Ccode']; ?>" style="border-color: #007bff;"><br>
        <?php endif; ?>
        <label for="CName" style="color: #007bff;">Course Name:</label>
        <input type="text" name="CName" id="CName" value="<?php echo isset($row) ? $row['CName'] : ''; ?>" style="border-color: #007bff;"><br>
        <input type="submit" value="<?php echo isset($row) ? 'Update Course' : 'Add Course'; ?>" style="background-color: #007bff;">
    </form>
</body>
</html>

<?php
mysqli_close($conn);
?>

