<?php
// feedback_form.php
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

    // Fetch feedback ratings
$timeManagement_1 = $_POST['timeManagementI'];
$timeManagement_2 = $_POST['timeManagementII'];
$timeManagement_3 = $_POST['timeManagementIII'];
$deliveryMethod_1 = $_POST['deliveryMethodI'];
$deliveryMethod_2 = $_POST['deliveryMethodII'];
$deliveryMethod_3 = $_POST['deliveryMethodIII'];
$subjectCommand_1 = $_POST['subjectCommandI'];
$subjectCommand_2 = $_POST['subjectCommandII'];
$subjectCommand_3 = $_POST['subjectCommandIII'];
$aboutMyself_1 = $_POST['aboutMyselfI'];
$aboutMyself_2 = $_POST['aboutMyselfII'];
$comments = $_POST['additional_comments'];

    // Insert feedback into the database
    $sql_insert = "INSERT INTO lecture_feedback (course_unit, teacher, date, timeManagement_1, timeManagement_2,timeManagement_3, deliveryMethod_1, deliveryMethod_2,deliveryMethod_3 ,subjectCommand_1,subjectCommand_2,subjectCommand_3,aboutMyself_1,aboutMyself_2, comments, username)
        VALUES ('$course_unit', '$teacher', '$date', ' $timeManagement_1', '$timeManagement_2', '$timeManagement_3', '$deliveryMethod_1 ', '$deliveryMethod_2','$deliveryMethod_3 ','$subjectCommand_1',' $subjectCommand_2 ',' $subjectCommand_3','$aboutMyself_1','$aboutMyself_2', '$comments', '$username')";

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
    <title>Lecture Feedback Form</title>
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
    <h2 class="center">Lecture Feedback Form</h2>
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
        
        <h3>A. Time Management</h3>
        <p>i. Lectures/ Labs/ Fieldworks started and finished on time</p>
        <div id="timeManagementI" class="statement-buttons">
            <input type="radio" name="timeManagementI" value="-2" required>-2
            <input type="radio" name="timeManagementI" value="-1">-1
            <input type="radio" name="timeManagementI" value="0">0
            <input type="radio" name="timeManagementI" value="1">+1
            <input type="radio" name="timeManagementI" value="2">+2
        </div>
        <p>ii. The lecturer managed class time effectively</p>
        <div id="timeManagementII" class="statement-buttons">
            <input type="radio" name="timeManagementII" value="-2" required>-2
            <input type="radio" name="timeManagementII" value="-1">-1
            <input type="radio" name="timeManagementII" value="0">0
            <input type="radio" name="timeManagementII" value="1">+1
            <input type="radio" name="timeManagementII" value="2">+2
        </div>
		<p>iii. The lecturer was readily available for consultation with students</p>
        <div id="timeManagementIII" class="statement-buttons">
            <input type="radio" name="timeManagementIII" value="-2" required>-2
            <input type="radio" name="timeManagementIII" value="-1">-1
            <input type="radio" name="timeManagementIII" value="0">0
            <input type="radio" name="timeManagementIII" value="1">+1
            <input type="radio" name="timeManagementIII" value="2">+2
        </div>
		
        <h3>B. Delivery Method</h3>
        <p>i. The teaching methods used were effective</p>
        <div id="deliveryMethodI" class="statement-buttons">
            <input type="radio" name="deliveryMethodI" value="-2" required>-2
            <input type="radio" name="deliveryMethodI" value="-1">-1
            <input type="radio" name="deliveryMethodI" value="0">0
            <input type="radio" name="deliveryMethodI" value="1">+1
            <input type="radio" name="deliveryMethodI" value="2">+2
        </div>
		
		
        <p>ii. Lectures were easy to understand</p>
        <div id="deliveryMethodII" class="statement-buttons">
            <input type="radio" name="deliveryMethodII" value="-2" required>-2
            <input type="radio" name="deliveryMethodII" value="-1">-1
            <input type="radio" name="deliveryMethodII" value="0">0
            <input type="radio" name="deliveryMethodII" value="1">+1
            <input type="radio" name="deliveryMethodII" value="2">+2
        </div>
		
		<p>iii. The lecturer encouraged students to participate in discussions</p>
        <div id="deliveryMethodIII" class="statement-buttons">
            <input type="radio" name="deliveryMethodIII" value="-2" required>-2
            <input type="radio" name="deliveryMethodIII" value="-1">-1
            <input type="radio" name="deliveryMethodIII" value="0">0
            <input type="radio" name="deliveryMethodIII" value="1">+1
            <input type="radio" name="deliveryMethodIII" value="2">+2
        </div>
        
        <h3>C. Subject Command</h3>
        <p>i. The lecturer focused on syllabus</p>
        <div id="subjectCommandI" class="statement-buttons">
            <input type="radio" name="subjectCommandI" value="-2" required>-2
            <input type="radio" name="subjectCommandI" value="-1">-1
            <input type="radio" name="subjectCommandI" value="0">0
            <input type="radio" name="subjectCommandI" value="1">+1
            <input type="radio" name="subjectCommandI" value="2">+2
        </div>
		<p>ii. The lecturer was self-confident in subject and teaching</p>
        <div id="subjectCommandII" class="statement-buttons">
            <input type="radio" name="subjectCommandII" value="-2" required>-2
            <input type="radio" name="subjectCommandII" value="-1">-1
            <input type="radio" name="subjectCommandII" value="0">0
            <input type="radio" name="subjectCommandII" value="1">+1
            <input type="radio" name="subjectCommandII" value="2">+2
        </div>
        <p>iii. The lecturer linked real-world applications and creating interest in the subject</p>
        <div id="subjectCommandIII" class="statement-buttons">
            <input type="radio" name="subjectCommandIII" value="-2" required>-2
            <input type="radio" name="subjectCommandIII" value="-1">-1
            <input type="radio" name="subjectCommandIII" value="0">0
            <input type="radio" name="subjectCommandIII" value="1">+1
            <input type="radio" name="subjectCommandIII" value="2">+2
        </div>
		
        <h3>D. About Myself</h3>
        <p>i. The lecture was engaging and interesting</p>
        <div id="aboutMyselfI" class="statement-buttons">
            <input type="radio" name="aboutMyselfI" value="-2" required>-2
            <input type="radio" name="aboutMyselfI" value="-1">-1
            <input type="radio" name="aboutMyselfI" value="0">0
            <input type="radio" name="aboutMyselfI" value="1">+1
            <input type="radio" name="aboutMyselfI" value="2">+2
        </div>
		<p>ii. The lecturer was self-confident in subject and teaching</p>
        <div id="aboutMyselfII" class="statement-buttons">
            <input type="radio" name="aboutMyselfII" value="-2" required>-2
            <input type="radio" name="aboutMyselfII" value="-1">-1
            <input type="radio" name="aboutMyselfII" value="0">0
            <input type="radio" name="aboutMyselfII" value="1">+1
            <input type="radio" name="aboutMyselfII" value="2">+2
        </div>
        <!-- Error message container -->
        <div id="errorMessage" class="error-message" style="display: none;">Please select at least one statement in each section.</div>

        
        <h3>I. Additional Comments</h3>
        <textarea name="additional_comments" rows="4" cols="50"></textarea><br><br>
        
        <button type="submit">Submit Feedback</button>
    </form>
</body>
</html>
