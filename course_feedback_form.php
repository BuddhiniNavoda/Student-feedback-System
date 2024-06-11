<<<<<<< HEAD
<?php
$servername = "localhost"; // Change this to your servername
$username = "root"; // Change this to your username
$password = ""; // Change this to your password
$dbname = "feedback_management_system"; // Change this to your database name

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
=======

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

// Check if query was successful
if (!$result_courses) {
    // Handle error
    die("Error fetching courses: " . mysqli_error($conn));
}

// Fetch lecturer names from the lecturer table
$sql_lecturers = "SELECT LName FROM lecturer";
$result_lecturers = mysqli_query($conn, $sql_lecturers);

// Check if query was successful
if (!$result_lecturers) {
    // Handle error
    die("Error fetching lecturers: " . mysqli_error($conn));
}
// Close the connection
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Feedback Form</title>
    
    <style>
       /* Custom CSS styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 20px;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.center {
    text-align: center;
}

.scale {
    width: 200px; /* Increase the width of the scale box */
    font-size: 16px; /* Increase the font size of the scale */
	float: left;
}

.statement-buttons button.selected {
    background-color: #FFA500; /* Change the color of the selected button */
}

.date-container {
    display: flex;
    align-items: center;
}

.date-container input[type="text"] {
    flex: 1;
    margin-right: 10px;
}

input[type="date"]::-webkit-calendar-picker-indicator {
    filter: invert(1);
}

h1 {
    text-align: center;
    color: #333;
}

form {
    margin-top: 20px;
}

.scale {
            float: right;
            margin-top: 20px;
            background-color: #f9f9f9;
            padding: 10px;
            border-radius: 5px;
        }
        .scale p {
            margin: 5px 0;
            font-size: 14px;
            color: #555;
}

h3 {
    color: #333;
    margin-top: 30px;
    margin-bottom: 10px;
}

p {
    color: #666;
    margin: 5px 0;
}

.statement-buttons {
    margin-bottom: 20px;
}

.statement-buttons button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.statement-buttons button.selected {
    background-color: #45a049;
}

.error-message {
    color: red;
    font-size: 14px;
    margin-top: 10px;
}

textarea {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    resize: vertical;
}

button[type="submit"] {
    background-color: #007bff;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button[type="submit"]:hover {
    background-color: #0056b3;
	
}
	
.statement-buttons button.selected {
            background-color: #FFA500; /* Change the color of the selected button */
        }
h2 {
    font-size: 35px; /* Increase the font size of the h2 element */
}

    </style>
</head>
<body>
    <h2 class="center">Course Feedback Form</h2>
    <form id="feedbackForm" method="post" action="process_feedback.php">
        <div class="scale">
            <p>-2: Strongly Disagree</p>
            <p>-1: Disagree</p>
            <p>0: Not Sure</p>
            <p>+1: Agree</p>
            <p>+2: Strongly Agree</p>
        </div>   
        <h3>Course Unit:</h3>
        <!-- Dropdown menu for selecting course units -->
        <select name="course_unit">
            <?php while ($row = mysqli_fetch_assoc($result_courses)): ?>
                <option value="<?php echo $row['Ccode']; ?>"><?php echo $row['Ccode']; ?></option>
            <?php endwhile; ?>
        </select>
        <h3>Name of the Teacher:</h3>
        <!-- Dropdown menu for selecting teachers -->
        <select name="teacher">
            <?php while ($row = mysqli_fetch_assoc($result_lecturers)): ?>
                <option value="<?php echo $row['LName']; ?>"><?php echo $row['LName']; ?></option>
            <?php endwhile; ?>
        </select>
        <h3>Date:</h3>
        <input type="text" name="date" placeholder="Enter Date">

        <!-- A. General -->
        <h3>A. General</h3>
        <!-- Statement i -->
        <p>i. This course helped me to enhance my knowledge</p>
        <div id="general I" class="statement-buttons">
            <button type="button" value="-2">-2</button>
            <button type="button" value="-1">-1</button>
            <button type="button" value="0">0</button>
            <button type="button" value="1">+1</button>
            <button type="button" value="2">+2</button>
        </div>
        <!-- Statement ii -->
        <p>ii. The workload of the course was manageable</p>
        <div id="general II" class="statement-buttons">
            <button type="button" value="-2">-2</button>
            <button type="button" value="-1">-1</button>
            <button type="button" value="0">0</button>
            <button type="button" value="1">+1</button>
            <button type="button" value="2">+2</button>
        </div>
        <!-- Statement iii -->
        <p>iii. The course was interesting</p>
        <div id="general III" class="statement-buttons">
            <button type="button" value="-2">-2</button>
            <button type="button" value="-1">-1</button>
            <button type="button" value="0">0</button>
            <button type="button" value="1">+1</button>
            <button type="button" value="2">+2</button>
        </div>
        
        <!-- B. Materials -->
        <h3>B. Materials</h3>
        <!-- Statement i -->
        <p>i. Adequate Materials (handouts) were provided</p>
        <div id="materials I" class="statement-buttons">
            <button type="button" value="-2">-2</button>
            <button type="button" value="-1">-1</button>
            <button type="button" value="0">0</button>
            <button type="button" value="1">+1</button>
            <button type="button" value="2">+2</button>
        </div>
        <!-- Statement ii -->
        <p>ii. Handouts were easy to understand</p>
        <div id="materials II" class="statement-buttons">
            <button type="button" value="-2">-2</button>
            <button type="button" value="-1">-1</button>
            <button type="button" value="0">0</button>
            <button type="button" value="1">+1</button>
            <button type="button" value="2">+2</button>
        </div>
        <!-- Statement iii -->
        <p>iii. Enough reference books were used</p>
        <div id="materials III" class="statement-buttons">
            <button type="button" value="-2">-2</button>
            <button type="button" value="-1">-1</button>
            <button type="button" value="0">0</button>
            <button type="button" value="1">+1</button>
            <button type="button" value="2">+2</button>
        </div>
        
        <!-- C. Tutorials/ Examples -->
        <h3>C. Tutorials/ Examples</h3>
        <!-- Statement i -->
        <p>i. Given problems (examples/ tutorials/ exercises) were enough</p>
        <div id="tutorialsExamples I" class="statement-buttons">
            <button type="button" value="-2">-2</button>
            <button type="button" value="-1">-1</button>
            <button type="button" value="0">0</button>
            <button type="button" value="1">+1</button>
            <button type="button" value="2">+2</button>
        </div>
        <!-- Statement ii -->
        <p>ii. Given problems (examples/ tutorials/ exercises) were challenging</p>
        <div id="tutorialsExamples II" class="statement-buttons">
            <button type="button" value="-2">-2</button>
            <button type="button" value="-1">-1</button>
            <button type="button" value="0">0</button>
            <button type="button" value="1">+1</button>
            <button type="button" value="2">+2</button>
        </div>
        
        <!-- D. Lab/ Fieldwork -->
        <h3>D. Lab/ Fieldwork</h3>
        <!-- Statement i -->
        <p>i. I could relate what I learnt from lectures to lab/ field classes</p>
        <div id="labFieldwork I" class="statement-buttons">
            <button type="button" value="-2">-2</button>
            <button type="button" value="-1">-1</button>
            <button type="button" value="0">0</button>
            <button type="button" value="1">+1</button>
            <button type="button" value="2">+2</button>
        </div>
        <!-- Statement ii -->
        <p>ii. Labs & Fieldwork helped to improve my skills and practical knowledge</p>
        <div id="labFieldwork II" class="statement-buttons">
            <button type="button" value="-2">-2</button>
            <button type="button" value="-1">-1</button>
            <button type="button" value="0">0</button>
            <button type="button" value="1">+1</button>
            <button type="button" value="2">+2</button>
        </div>
        <!-- Statement iii -->
        <p>iii. I can conduct experiments/ fieldwork myself through set of instructions in future</p>
        <div id="labFieldwork III" class="statement-buttons">
            <button type="button" value="-2">-2</button>
            <button type="button" value="-1">-1</button>
            <button type="button" value="0">0</button>
            <button type="button" value="1">+1</button>
            <button type="button" value="2">+2</button>
        </div>
        
        <!-- E. About Myself -->
        <h3>E. About Myself</h3>
        <!-- Statement i -->
        <p>i. I prepared thoroughly for each class</p>
        <div id="aboutMyself I" class="statement-buttons">
            <button type="button" value="-2">-2</button>
            <button type="button" value="-1">-1</button>
            <button type="button" value="0">0</button>
            <button type="button" value="1">+1</button>
            <button type="button" value="2">+2</button>
        </div>
        <!-- Statement ii -->
        <p>ii. I attended lectures, lab/fieldwork regularly</p>
        <div id="aboutMyself II" class="statement-buttons">
            <button type="button" value="-2">-2</button>
            <button type="button" value="-1">-1</button>
            <button type="button" value="0">0</button>
            <button type="button" value="1">+1</button>
            <button type="button" value="2">+2</button>
        </div>
        <!-- Statement iii -->
        <p>iii. I did all assigned work (homework/assignments/lab & field report) on time</p>
        <div id="aboutMyself III" class="statement-buttons">
            <button type="button" value="-2">-2</button>
            <button type="button" value="-1">-1</button>
            <button type="button" value="0">0</button>
            <button type="button" value="1">+1</button>
            <button type="button" value="2">+2</button>
        </div>
        <!-- Statement iv -->
        <p>iv. I referred recommended textbooks regularly</p>
        <div id="aboutMyself IV" class="statement-buttons">
            <button type="button" value="-2">-2</button>
            <button type="button" value="-1">-1</button>
            <button type="button" value="0">0</button>
            <button type="button" value="1">+1</button>
            <button type="button" value="2">+2</button>
        </div>
        
        <!-- Any other comments -->
        <h3>Any other comments:</h3>
        <textarea name="comments" rows="4" cols="50"></textarea>
        
        <!-- Error message container -->
        <div id="errorMessage" class="error-message" style="display: none;">Please select at least one statement in each section.</div>

        <!-- Hidden fields to store selected values -->
        <!-- Similar structure as A. General -->

        <button type="submit" id="submitButton">Submit Feedback</button>
    </form>

    <!-- JavaScript to capture button clicks and update hidden input fields -->
    <script>
function handleButtonClick(section, statement, value) {
    // Update the selected button's appearance
    document.querySelectorAll('#' + section + ' button').forEach(button => {
        button.classList.remove('selected');
    });
    event.target.classList.add('selected');

    // Update the hidden input field with the selected value
    document.querySelector('#' + statement + 'Input').value = value;
}

// Add event listeners to all buttons
document.querySelectorAll('.statement-buttons button').forEach(button => {
    button.addEventListener('click', function(event) {
        // Get section, statement, and value of the clicked button
        const section = this.parentElement.id;
        const statement = section.replace(/\s+/g, '');
        const value = parseInt(this.value);

        // Call function to handle button click
        handleButtonClick(section, statement, value);
    });
});
</script>
</body>
</html>
>>>>>>> 3dd0583586d2aabc9dd7c8843076206d74304298
