<<<<<<< HEAD
<?php
// Include the database connection file
require_once 'db_connect.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assume the form has a field named 'feedback_type'
    $feedback_type = $_POST['feedback_type'];

    // Modify SQL query based on feedback type
    $sql = "";
    if ($feedback_type == "course_feedback") {
        // Insert course feedback into database
        $sql = "INSERT INTO feedback (FType) VALUES ('Course Feedback')";
    } elseif ($feedback_type == "lecture_feedback") {
        // Insert lecture feedback into database
        $sql = "INSERT INTO feedback (FType) VALUES ('Lecture Feedback')";
    } else {
        // Handle error if feedback type is not recognized
        echo "Error: Invalid feedback type";
        exit();
    }

    // Execute SQL query
    if (mysqli_query($conn, $sql)) {
        // Redirect based on feedback type
        if ($feedback_type == "course_feedback") {
            // Redirect to course_feedback_form.php if course feedback
            header("Location: course_feedback_form.php");
            exit();
        } elseif ($feedback_type == "lecture_feedback") {
            // Redirect to lecture_feedback_form.php if lecture feedback
            header("Location: lecture_feedback_form.php");
            exit();
        }
    } else {
        // Handle database error
        echo "Error: " . mysqli_error($conn);
        echo "<br>SQL Query: " . $sql;
        exit();
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Feedback Form</title>
    <style>
        body {
            background-image: url('EFac.jpg'); 
            background-size: 150%;
            background-position: center;
            background-repeat: no-repeat;
        }
        .container {
            width: 30%;
            margin: 0 auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 10px;
            color: #333;
        }
        select, textarea, input[type="submit"] {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: black;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Feedback Form</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="feedbackForm">
            <label for="feedback_type">Feedback Type:</label>
            <select name="feedback_type" id="feedback_type">
                <option value="course_feedback">Course Feedback</option>
                <option value="lecture_feedback">Lecture Feedback</option>
            </select>
            <input type="submit" value="Submit Feedback">
        </form>
    </div>
</body>
</html>
=======
<?php
// Include the database connection file
require_once 'db_connect.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assume the form has a field named 'feedback_type'
    $feedback_type = $_POST['feedback_type'];

    // Modify SQL query based on feedback type
    $sql = "";
    if ($feedback_type == "course_feedback") {
        // Insert course feedback into database
        $sql = "INSERT INTO feedback (FType) VALUES ('Course Feedback')";
    } elseif ($feedback_type == "lecture_feedback") {
        // Insert lecture feedback into database
        $sql = "INSERT INTO feedback (FType) VALUES ('Lecture Feedback')";
    } else {
        // Handle error if feedback type is not recognized
        echo "Error: Invalid feedback type";
        exit();
    }

    // Execute SQL query
    if (mysqli_query($conn, $sql)) {
        // Redirect based on feedback type
        if ($feedback_type == "course_feedback") {
            // Redirect to course_feedback_form.php if course feedback
            header("Location: course_feedback_form.php");
            exit();
        } elseif ($feedback_type == "lecture_feedback") {
            // Redirect to lecture_feedback_form.php if lecture feedback
            header("Location: lecture_feedback_form.php");
            exit();
        }
    } else {
        // Handle database error
        echo "Error: " . mysqli_error($conn);
        echo "<br>SQL Query: " . $sql;
        exit();
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Feedback Form</title>
    <style>
        body {
            background-image: url('EFac.jpg'); 
            background-size: 150%;
            background-position: center;
            background-repeat: no-repeat;
        }
        .container {
            width: 30%;
            margin: 0 auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 10px;
            color: #333;
        }
        select, textarea, input[type="submit"] {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: black;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Feedback Form</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="feedbackForm">
            <label for="feedback_type">Feedback Type:</label>
            <select name="feedback_type" id="feedback_type">
                <option value="course_feedback">Course Feedback</option>
                <option value="lecture_feedback">Lecture Feedback</option>
            </select>
            <input type="submit" value="Submit Feedback">
        </form>
    </div>
</body>
</html>
>>>>>>> 3dd0583586d2aabc9dd7c8843076206d74304298
