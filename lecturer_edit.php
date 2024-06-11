<<<<<<< HEAD
<?php
include 'db_connect.php';

// Check if form is submitted for updating or adding a course
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['L_ID'])) {
        // If L_ID is provided, it's an update operation
        $L_ID = $_POST['L_ID'];
        $New_L_ID = $_POST['New_L_ID']; // Changed variable name to match HTML form
        $LName = $_POST['LName'];
        
        $query = "UPDATE lecturer SET L_ID='$New_L_ID', LName='$LName' WHERE L_ID='$L_ID'";
        mysqli_query($conn, $query);
        mysqli_close($conn);
        // Redirect to index.php after updating lecture
        header("Location: lecture_manage.php");
        exit();
    } else {
        // If L_ID is not provided, it's an add operation
        $L_ID = $_POST['New_L_ID']; // Changed variable name to match HTML form
        $LName = $_POST['LName'];
                
$query = "INSERT INTO lecturer (L_ID, LName) VALUES ('$L_ID', '$LName')";
        mysqli_query($conn, $query);
        mysqli_close($conn);
        // Redirect to index.php after adding new lecture
        header("Location: lecture_manage.php");
        exit();
    }
}

// Retrieve the lecture ID from the URL parameter if it's an edit operation
if (isset($_GET['L_ID'])) {
    $L_ID = $_GET['L_ID'];
    $query = "SELECT * FROM lecturer WHERE L_ID='$L_ID'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo isset($row) ? 'Edit Lecture' : 'Add New Lecture'; ?></title>
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
    <h1><?php echo isset($row) ? 'Edit Lecture' : 'Add New Lecture'; ?></h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <?php if (isset($row)): ?>
        <input type="hidden" name="L_ID" value="<?php echo $row['L_ID']; ?>">
        <?php endif; ?>
        <?php if (!isset($row)): ?>
        <label for="New_L_ID" style="color: #007bff;">Lecture ID:</label>
        <input type="text" name="New_L_ID" id="New_L_ID" style="border-color: #007bff;"><br>
        <?php else: ?>
        <label for="L_ID" style="color: #007bff;">Lecture ID:</label>
        <input type="text" name="New_L_ID" id="New_L_ID" value="<?php echo $row['L_ID']; ?>" style="border-color: #007bff;"><br>
        <?php endif; ?>
        <label for="LName" style="color: #007bff;">Lecture Name:</label>
        <input type="text" name="LName" id="LName" value="<?php echo isset($row) ? $row['LName'] : ''; ?>" style="border-color: #007bff;"><br>
        <input type="submit" value="<?php echo isset($row) ? 'Update Lecture' : 'Add Lecture'; ?>" style="background-color: #007bff;">
    </form>
</body>
</html>

<?php
mysqli_close($conn);
?>
=======
<?php
include 'db_connect.php';

// Check if form is submitted for updating or adding a course
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['L_ID'])) {
        // If L_ID is provided, it's an update operation
        $L_ID = $_POST['L_ID'];
        $New_L_ID = $_POST['New_L_ID']; // Changed variable name to match HTML form
        $LName = $_POST['LName'];
        
        $query = "UPDATE lecturer SET L_ID='$New_L_ID', LName='$LName' WHERE L_ID='$L_ID'";
        mysqli_query($conn, $query);
        mysqli_close($conn);
        // Redirect to index.php after updating lecture
        header("Location: lecture_manage.php");
        exit();
    } else {
        // If L_ID is not provided, it's an add operation
        $L_ID = $_POST['New_L_ID']; // Changed variable name to match HTML form
        $LName = $_POST['LName'];
                
$query = "INSERT INTO lecturer (L_ID, LName) VALUES ('$L_ID', '$LName')";
        mysqli_query($conn, $query);
        mysqli_close($conn);
        // Redirect to index.php after adding new lecture
        header("Location: lecture_manage.php");
        exit();
    }
}

// Retrieve the lecture ID from the URL parameter if it's an edit operation
if (isset($_GET['L_ID'])) {
    $L_ID = $_GET['L_ID'];
    $query = "SELECT * FROM lecturer WHERE L_ID='$L_ID'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo isset($row) ? 'Edit Lecture' : 'Add New Lecture'; ?></title>
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
    <h1><?php echo isset($row) ? 'Edit Lecture' : 'Add New Lecture'; ?></h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <?php if (isset($row)): ?>
        <input type="hidden" name="L_ID" value="<?php echo $row['L_ID']; ?>">
        <?php endif; ?>
        <?php if (!isset($row)): ?>
        <label for="New_L_ID" style="color: #007bff;">Lecture ID:</label>
        <input type="text" name="New_L_ID" id="New_L_ID" style="border-color: #007bff;"><br>
        <?php else: ?>
        <label for="L_ID" style="color: #007bff;">Lecture ID:</label>
        <input type="text" name="New_L_ID" id="New_L_ID" value="<?php echo $row['L_ID']; ?>" style="border-color: #007bff;"><br>
        <?php endif; ?>
        <label for="LName" style="color: #007bff;">Lecture Name:</label>
        <input type="text" name="LName" id="LName" value="<?php echo isset($row) ? $row['LName'] : ''; ?>" style="border-color: #007bff;"><br>
        <input type="submit" value="<?php echo isset($row) ? 'Update Lecture' : 'Add Lecture'; ?>" style="background-color: #007bff;">
    </form>
</body>
</html>

<?php
mysqli_close($conn);
?>
>>>>>>> 3dd0583586d2aabc9dd7c8843076206d74304298
