<?php

// Establish a database connection
$servername = "localhost"; // Change this to your servername
$username = "root"; // Change this to your username
$password = ""; // Change this to your password
$dbname = "feedback_management_system"; // Change this to your database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch course codes from the course table
$sql_courses = "SELECT Ccode FROM course";
$result_courses = mysqli_query($conn, $sql_courses);

// Fetch lecturer names from the lecturer table
$sql_lecturers = "SELECT LName FROM lecturer";
$result_lecturers = mysqli_query($conn, $sql_lecturers);

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_unit = $_POST['course_unit'];
    $teacher = $_POST['teacher'];
    $date = $_POST['date'];
    $username = $_POST['username']; // Assuming a username field is added

    // Validate date
    if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $date)) {
        die("Invalid date format. Please enter the date in YYYY-MM-DD format.");
    }

    // Get feedback ratings
    $general_1 = $_POST['general_1'];
    $general_2 = $_POST['general_2'];
    $general_3 = $_POST['general_3'];
    $materials_1 = $_POST['materials_1'];
    $materials_2 = $_POST['materials_2'];
    $materials_3 = $_POST['materials_3'];
    $delivery_1 = $_POST['delivery_1'];
    $delivery_2 = $_POST['delivery_2'];
    $delivery_3 = $_POST['delivery_3'];
    $overall_1 = $_POST['overall_1'];
    $comments = $_POST['comments'];

    // Insert feedback into the database
    $sql_insert = "INSERT INTO course_feedback (course_unit, teacher, date, general_1, general_2, general_3, materials_1, materials_2, materials_3, delivery_1, delivery_2, delivery_3, overall_1, comments, username)
        VALUES ('$course_unit', '$teacher', '$date', '$general_1', '$general_2', '$general_3', '$materials_1', '$materials_2', '$materials_3', '$delivery_1', '$delivery_2', '$delivery_3', '$overall_1', '$comments', '$username')";

    if ($conn->query($sql_insert) === TRUE) {
        header("Location: process_feedback.php");
        exit();
    } else {
        echo "Error: " . $sql_insert . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Feedback Form</title>
	
    <style>
       h2.center {
    text-align: center;
    color: Black; /* Changed color */
}
body {
    font-family: Arial, sans-serif;
    background-color: #b5f0ea;
}
 form#feedbackForm button[type="submit"]:hover {
    background-color: white;
	color: black;
    border: none;
}
  </style>
</head>
<body>
    <h2 class="center">Course Feedback Form</h2>
    <form id="feedbackForm" method="post" action="">
        <div class="scale">
            <p>-2: Strongly Disagree</p>
            <p>-1: Disagree</p>
            <p>0: Not Sure</p>
            <p>+1: Agree</p>
            <p>+2: Strongly Agree</p>
        </div>
        <h3>Course Unit:</h3>
        <select name="course_unit">
            <?php while ($row = mysqli_fetch_assoc($result_courses)): ?>
                <option value="<?php echo $row['Ccode']; ?>"><?php echo $row['Ccode']; ?></option>
            <?php endwhile; ?>
        </select>
        <h3>Name of the Teacher:</h3>
        <select name="teacher">
            <?php while ($row = mysqli_fetch_assoc($result_lecturers)): ?>
                <option value="<?php echo $row['LName']; ?>"><?php echo $row['LName']; ?></option>
            <?php endwhile; ?>
        </select>
        <h3>Date:</h3>
        <input type="date" id="date" name="date" required><br><br>
        <input type="text" name="username" placeholder="Your Username" required><br><br>
        
        <h3>A. General</h3>
        <p>i. This course helped me to enhance my knowledge</p>
        <div id="general I" class="statement-buttons">
            <input type="radio" name="general_1" value="-2" required>-2
            <input type="radio" name="general_1" value="-1">-1
            <input type="radio" name="general_1" value="0">0
            <input type="radio" name="general_1" value="1">+1
            <input type="radio" name="general_1" value="2">+2
        </div>
        <p>ii. The workload of the course was manageable</p>
        <div id="general II" class="statement-buttons">
            <input type="radio" name="general_2" value="-2" required>-2
            <input type="radio" name="general_2" value="-1">-1
            <input type="radio" name="general_2" value="0">0
            <input type="radio" name="general_2" value="1">+1
            <input type="radio" name="general_2" value="2">+2
        </div>
        <p>iii. The course was interesting</p>
        <div id="general III" class="statement-buttons">
            <input type="radio" name="general_3" value="-2" required>-2
            <input type="radio" name="general_3" value="-1">-1
            <input type="radio" name="general_3" value="0">0
            <input type="radio" name="general_3" value="1">+1
            <input type="radio" name="general_3" value="2">+2
        </div>
        
        <h3>B. Materials</h3>
        <p>i. Adequate Materials (handouts) were provided</p>
        <div id="materials I" class="statement-buttons">
            <input type="radio" name="materials_1" value="-2" required>-2
            <input type="radio" name="materials_1" value="-1">-1
            <input type="radio" name="materials_1" value="0">0
            <input type="radio" name="materials_1" value="1">+1
            <input type="radio" name="materials_1" value="2">+2
        </div>
        <p>ii. Handouts were easy to understand</p>
        <div id="materials II" class="statement-buttons">
            <input type="radio" name="materials_2" value="-2" required>-2
            <input type="radio" name="materials_2" value="-1">-1
            <input type="radio" name="materials_2" value="0">0
            <input type="radio" name="materials_2" value="1">+1
            <input type="radio" name="materials_2" value="2">+2
        </div>
        <p>iii. Reference books were relevant</p>
        <div id="materials III" class="statement-buttons">
            <input type="radio" name="materials_3" value="-2" required>-2
            <input type="radio" name="materials_3" value="-1">-1
            <input type="radio" name="materials_3" value="0">0
            <input type="radio" name="materials_3" value="1">+1
            <input type="radio" name="materials_3" value="2">+2
        </div>
        
        <h3>C. Delivery</h3>
        <p>i. The lecturer was punctual</p>
        <div id="delivery I" class="statement-buttons">
            <input type="radio" name="delivery_1" value="-2" required>-2
            <input type="radio" name="delivery_1" value="-1">-1
            <input type="radio" name="delivery_1" value="0">0
            <input type="radio" name="delivery_1" value="1">+1
            <input type="radio" name="delivery_1" value="2">+2
        </div>
        <p>ii. The lecturer communicated effectively</p>
        <div id="delivery II" class="statement-buttons">
            <input type="radio" name="delivery_2" value="-2" required>-2
            <input type="radio" name="delivery_2" value="-1">-1
            <input type="radio" name="delivery_2" value="0">0
            <input type="radio" name="delivery_2" value="1">+1
            <input type="radio" name="delivery_2" value="2">+2
        </div>
        <p>iii. The lecturer encouraged participation</p>
        <div id="delivery III" class="statement-buttons">
            <input type="radio" name="delivery_3" value="-2" required>-2
            <input type="radio" name="delivery_3" value="-1">-1
            <input type="radio" name="delivery_3" value="0">0
            <input type="radio" name="delivery_3" value="1">+1
            <input type="radio" name="delivery_3" value="2">+2
        </div>
        
        <h3>D. Overall</h3>
        <p>i. Overall, I am satisfied with this course</p>
        <div id="overall I" class="statement-buttons">
            <input type="radio" name="overall_1" value="-2" required>-2
            <input type="radio" name="overall_1" value="-1">-1
            <input type="radio" name="overall_1" value="0">0
            <input type="radio" name="overall_1" value="1">+1
            <input type="radio" name="overall_1" value="2">+2
        </div>
        <h3>Any other comments:</h3>
        <textarea name="comments" rows="4" cols="50"></textarea> <br><br>
        <button type="submit">Submit Feedback</button>
    </form>
</body>
<script>
    document.querySelectorAll('.statement-buttons button').forEach(function(button) {
        button.addEventListener('click', function() {
            this.parentNode.querySelectorAll('button').forEach(function(btn) {
                btn.classList.remove('selected');
            });
            this.classList.add('selected');
        });
    });
</script>
</html>
