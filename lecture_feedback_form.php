<<<<<<< HEAD
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
    <title>Lecture Feedback Form</title>
    
    <style>
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
		h2 {
    text-align: center;
	 font-size: 35px;
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
        .statement-buttons button.clicked {
            background-color: #007bff;
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
    </style>
</head>
<body>
    <h2>Lecture feedback Form</h2>
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
	<!-- Your form content here -->

        <h3>A. Time Management</h3>
        <p>i. Lectures/ Labs/ Fieldworks started and finished on time</p>
        <div id="timeManagementI" class="statement-buttons">
            <button type="button" value="-2">-2</button>
            <button type="button" value="-1">-1</button>
            <button type="button" value="0">0</button>
            <button type="button" value="1">+1</button>
            <button type="button" value="2">+2</button>
        </div>

        <p>ii. The lecturer managed class time effectively</p>
        <div id="timeManagementII" class="statement-buttons">
            <button type="button" value="-2">-2</button>
            <button type="button" value="-1">-1</button>
            <button type="button" value="0">0</button>
            <button type="button" value="1">+1</button>
            <button type="button" value="2">+2</button>
        </div>

        <p>iii. The lecturer was readily available for consultation with students</p>
        <div id="timeManagementIII" class="statement-buttons">
            <button type="button" value="-2">-2</button>
            <button type="button" value="-1">-1</button>
            <button type="button" value="0">0</button>
            <button type="button" value="1">+1</button>
            <button type="button" value="2">+2</button>
        </div>
        
        <h3>B. Delivery Method</h3>
        <p>i. Use of teaching aids (multimedia, white board)</p>
        <div id="deliveryMethodI" class="statement-buttons">
            <button type="button" value="-2">-2</button>
            <button type="button" value="-1">-1</button>
            <button type="button" value="0">0</button>
            <button type="button" value="1">+1</button>
            <button type="button" value="2">+2</button>
        </div>

        <p>ii. Lectures were easy to understand</p>
        <div id="deliveryMethodII" class="statement-buttons">
            <button type="button" value="-2">-2</button>
            <button type="button" value="-1">-1</button>
            <button type="button" value="0">0</button>
            <button type="button" value="1">+1</button>
            <button type="button" value="2">+2</button>
        </div>

        <p>iii. The lecturer encouraged students to participate in discussions</p>
        <div id="deliveryMethodIII" class="statement-buttons">
            <button type="button" value="-2">-2</button>
            <button type="button" value="-1">-1</button>
            <button type="button" value="0">0</button>
            <button type="button" value="1">+1</button>
            <button type="button" value="2">+2</button>
        </div>
        
        <h3>C. Subject Command</h3>
        <p>i. The lecturer focused on syllabi</p>
        <div id="subjectCommandI" class="statement-buttons">
            <button type="button" value="-2">-2</button>
            <button type="button" value="-1">-1</button>
            <button type="button" value="0">0</button>
            <button type="button" value="1">+1</button>
            <button type="button" value="2">+2</button>
        </div>
        
        <p>ii. The lecturer was self-confident in subject and teaching</p>
        <div id="subjectCommandII" class="statement-buttons">
            <button type="button" value="-2">-2</button>
            <button type="button" value="-1">-1</button>
            <button type="button" value="0">0</button>
            <button type="button" value="1">+1</button>
            <button type="button" value="2">+2</button>
        </div>

        <p>iii. The lecturer linked real-world applications and creating interest in the subject</p>
        <div id="subjectCommandIII" class="statement-buttons">
            <button type="button" value="-2">-2</button>
            <button type="button" value="-1">-1</button>
            <button type="button" value="0">0</button>
            <button type="button" value="1">+1</button>
            <button type="button" value="2">+2</button>
        </div>
        
        <h3>D. About Myself</h3>
        <p>i. The lecturer focused on syllabi</p>
        <div id="aboutMyselfI" class="statement-buttons">
            <button type="button" value="-2">-2</button>
            <button type="button" value="-1">-1</button>
            <button type="button" value="0">0</button>
            <button type="button" value="1">+1</button>
            <button type="button" value="2">+2</button>
        </div>
        
        <p>ii. The lecturer was self-confident in subject and teaching</p>
        <div id="aboutMyselfII" class="statement-buttons">
            <button type="button" value="-2">-2</button>
            <button type="button" value="-1">-1</button>
            <button type="button" value="0">0</button>
            <button type="button" value="1">+1</button>
            <button type="button" value="2">+2</button>
        </div>

        <h3>Any other comments:</h3>
        <textarea name="comments" rows="4" cols="50"></textarea>
        
        <!-- Error message container -->
        <div id="errorMessage" class="error-message" style="display: none;">Please select at least one statement in each section.</div>

        <!-- Hidden fields to store selected values -->
        <input type="hidden" name="time_management_i">
        <input type="hidden" name="time_management_ii">
        <input type="hidden" name="time_management_iii">

        <input type="hidden" name="delivery_method_i">
        <input type="hidden" name="delivery_method_ii">
        <input type="hidden" name="delivery_method_iii">
        
        <input type="hidden" name="subject_command_i">
        <input type="hidden" name="subject_command_ii">
        <input type="hidden" name="subject_command_iii">
        
        <input type="hidden" name="about_myself_i">
        <input type="hidden" name="about_myself_ii">

        <button type="submit" id="submitButton">Submit Feedback</button>
    </form>

    <!-- JavaScript to capture button clicks and update hidden input fields -->
    <script>
        function handleButtonClicks(buttons, inputField) {
            buttons.forEach(button => {
                button.addEventListener('click', () => {
                    // Remove the 'selected' class from all buttons in the group
                    buttons.forEach(btn => btn.classList.remove('selected', 'clicked'));
                    // Add the 'selected' class to the clicked button
                    button.classList.add('selected', 'clicked');
                    // Update the hidden input field with the clicked button's value
                    inputField.value = button.value;
                });
            });
        }

        // Time Management
         const timeManagementButtonsI = document.querySelectorAll('#timeManagementI button');
        const timeManagementInputI = document.querySelector('input[name="time_management_i"]');
        handleButtonClicks(timeManagementButtonsI, timeManagementInputI);

        const timeManagementButtonsII = document.querySelectorAll('#timeManagementII button');
        const timeManagementInputII = document.querySelector('input[name="time_management_ii"]');
        handleButtonClicks(timeManagementButtonsII, timeManagementInputII);

        const timeManagementButtonsIII = document.querySelectorAll('#timeManagementIII button');
        const timeManagementInputIII = document.querySelector('input[name="time_management_iii"]');
        handleButtonClicks(timeManagementButtonsIII, timeManagementInputIII);

        
		// Delivery Method
const deliveryMethodButtonsI = document.querySelectorAll('#deliveryMethodI button');
const deliveryMethodInputI = document.querySelector('input[name="delivery_method_i"]');
handleButtonClicks(deliveryMethodButtonsI, deliveryMethodInputI);

const deliveryMethodButtonsII = document.querySelectorAll('#deliveryMethodII button');
const deliveryMethodInputII = document.querySelector('input[name="delivery_method_ii"]');
handleButtonClicks(deliveryMethodButtonsII, deliveryMethodInputII);

const deliveryMethodButtonsIII = document.querySelectorAll('#deliveryMethodIII button');
const deliveryMethodInputIII = document.querySelector('input[name="delivery_method_iii"]');
handleButtonClicks(deliveryMethodButtonsIII, deliveryMethodInputIII);

// Subject Command
const subjectCommandButtonsI = document.querySelectorAll('#subjectCommandI button');
const subjectCommandInputI = document.querySelector('input[name="subject_command_i"]');
handleButtonClicks(subjectCommandButtonsI, subjectCommandInputI);

const subjectCommandButtonsII = document.querySelectorAll('#subjectCommandII button');
const subjectCommandInputII = document.querySelector('input[name="subject_command_ii"]');
handleButtonClicks(subjectCommandButtonsII, subjectCommandInputII);

const subjectCommandButtonsIII = document.querySelectorAll('#subjectCommandIII button');
const subjectCommandInputIII = document.querySelector('input[name="subject_command_iii"]');
handleButtonClicks(subjectCommandButtonsIII, subjectCommandInputIII);

// About Myself
const aboutMyselfButtonsI = document.querySelectorAll('#aboutMyselfI button');
const aboutMyselfInputI = document.querySelector('input[name="about_myself_i"]');
handleButtonClicks(aboutMyselfButtonsI, aboutMyselfInputI);

const aboutMyselfButtonsII = document.querySelectorAll('#aboutMyselfII button');
const aboutMyselfInputII = document.querySelector('input[name="about_myself_ii"]');
handleButtonClicks(aboutMyselfButtonsII, aboutMyselfInputII);


        // Submit Feedback button click handler with validation
        const submitButton = document.getElementById('submitButton');
        submitButton.addEventListener('click', (event) => {
            // Prevent form submission if any section has no button selected
            if (!timeManagementInputI.value /* Add conditions for other sections */) {
                event.preventDefault(); // Prevent form submission
                document.getElementById('errorMessage').style.display = 'block'; // Display error message
            } else {
                document.getElementById('errorMessage').style.display = 'none'; // Hide error message if all sections are filled
            }
        });
    </script>
</body>
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
    <title>Lecture Feedback Form</title>
    
    <style>
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
		h2 {
    text-align: center;
	 font-size: 35px;
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
        .statement-buttons button.clicked {
            background-color: #007bff;
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
    </style>
</head>
<body>
    <h2>Lecture feedback Form</h2>
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
	<!-- Your form content here -->

        <h3>A. Time Management</h3>
        <p>i. Lectures/ Labs/ Fieldworks started and finished on time</p>
        <div id="timeManagementI" class="statement-buttons">
            <button type="button" value="-2">-2</button>
            <button type="button" value="-1">-1</button>
            <button type="button" value="0">0</button>
            <button type="button" value="1">+1</button>
            <button type="button" value="2">+2</button>
        </div>

        <p>ii. The lecturer managed class time effectively</p>
        <div id="timeManagementII" class="statement-buttons">
            <button type="button" value="-2">-2</button>
            <button type="button" value="-1">-1</button>
            <button type="button" value="0">0</button>
            <button type="button" value="1">+1</button>
            <button type="button" value="2">+2</button>
        </div>

        <p>iii. The lecturer was readily available for consultation with students</p>
        <div id="timeManagementIII" class="statement-buttons">
            <button type="button" value="-2">-2</button>
            <button type="button" value="-1">-1</button>
            <button type="button" value="0">0</button>
            <button type="button" value="1">+1</button>
            <button type="button" value="2">+2</button>
        </div>
        
        <h3>B. Delivery Method</h3>
        <p>i. Use of teaching aids (multimedia, white board)</p>
        <div id="deliveryMethodI" class="statement-buttons">
            <button type="button" value="-2">-2</button>
            <button type="button" value="-1">-1</button>
            <button type="button" value="0">0</button>
            <button type="button" value="1">+1</button>
            <button type="button" value="2">+2</button>
        </div>

        <p>ii. Lectures were easy to understand</p>
        <div id="deliveryMethodII" class="statement-buttons">
            <button type="button" value="-2">-2</button>
            <button type="button" value="-1">-1</button>
            <button type="button" value="0">0</button>
            <button type="button" value="1">+1</button>
            <button type="button" value="2">+2</button>
        </div>

        <p>iii. The lecturer encouraged students to participate in discussions</p>
        <div id="deliveryMethodIII" class="statement-buttons">
            <button type="button" value="-2">-2</button>
            <button type="button" value="-1">-1</button>
            <button type="button" value="0">0</button>
            <button type="button" value="1">+1</button>
            <button type="button" value="2">+2</button>
        </div>
        
        <h3>C. Subject Command</h3>
        <p>i. The lecturer focused on syllabi</p>
        <div id="subjectCommandI" class="statement-buttons">
            <button type="button" value="-2">-2</button>
            <button type="button" value="-1">-1</button>
            <button type="button" value="0">0</button>
            <button type="button" value="1">+1</button>
            <button type="button" value="2">+2</button>
        </div>
        
        <p>ii. The lecturer was self-confident in subject and teaching</p>
        <div id="subjectCommandII" class="statement-buttons">
            <button type="button" value="-2">-2</button>
            <button type="button" value="-1">-1</button>
            <button type="button" value="0">0</button>
            <button type="button" value="1">+1</button>
            <button type="button" value="2">+2</button>
        </div>

        <p>iii. The lecturer linked real-world applications and creating interest in the subject</p>
        <div id="subjectCommandIII" class="statement-buttons">
            <button type="button" value="-2">-2</button>
            <button type="button" value="-1">-1</button>
            <button type="button" value="0">0</button>
            <button type="button" value="1">+1</button>
            <button type="button" value="2">+2</button>
        </div>
        
        <h3>D. About Myself</h3>
        <p>i. The lecturer focused on syllabi</p>
        <div id="aboutMyselfI" class="statement-buttons">
            <button type="button" value="-2">-2</button>
            <button type="button" value="-1">-1</button>
            <button type="button" value="0">0</button>
            <button type="button" value="1">+1</button>
            <button type="button" value="2">+2</button>
        </div>
        
        <p>ii. The lecturer was self-confident in subject and teaching</p>
        <div id="aboutMyselfII" class="statement-buttons">
            <button type="button" value="-2">-2</button>
            <button type="button" value="-1">-1</button>
            <button type="button" value="0">0</button>
            <button type="button" value="1">+1</button>
            <button type="button" value="2">+2</button>
        </div>

        <h3>Any other comments:</h3>
        <textarea name="comments" rows="4" cols="50"></textarea>
        
        <!-- Error message container -->
        <div id="errorMessage" class="error-message" style="display: none;">Please select at least one statement in each section.</div>

        <!-- Hidden fields to store selected values -->
        <input type="hidden" name="time_management_i">
        <input type="hidden" name="time_management_ii">
        <input type="hidden" name="time_management_iii">

        <input type="hidden" name="delivery_method_i">
        <input type="hidden" name="delivery_method_ii">
        <input type="hidden" name="delivery_method_iii">
        
        <input type="hidden" name="subject_command_i">
        <input type="hidden" name="subject_command_ii">
        <input type="hidden" name="subject_command_iii">
        
        <input type="hidden" name="about_myself_i">
        <input type="hidden" name="about_myself_ii">

        <button type="submit" id="submitButton">Submit Feedback</button>
    </form>

    <!-- JavaScript to capture button clicks and update hidden input fields -->
    <script>
        function handleButtonClicks(buttons, inputField) {
            buttons.forEach(button => {
                button.addEventListener('click', () => {
                    // Remove the 'selected' class from all buttons in the group
                    buttons.forEach(btn => btn.classList.remove('selected', 'clicked'));
                    // Add the 'selected' class to the clicked button
                    button.classList.add('selected', 'clicked');
                    // Update the hidden input field with the clicked button's value
                    inputField.value = button.value;
                });
            });
        }

        // Time Management
         const timeManagementButtonsI = document.querySelectorAll('#timeManagementI button');
        const timeManagementInputI = document.querySelector('input[name="time_management_i"]');
        handleButtonClicks(timeManagementButtonsI, timeManagementInputI);

        const timeManagementButtonsII = document.querySelectorAll('#timeManagementII button');
        const timeManagementInputII = document.querySelector('input[name="time_management_ii"]');
        handleButtonClicks(timeManagementButtonsII, timeManagementInputII);

        const timeManagementButtonsIII = document.querySelectorAll('#timeManagementIII button');
        const timeManagementInputIII = document.querySelector('input[name="time_management_iii"]');
        handleButtonClicks(timeManagementButtonsIII, timeManagementInputIII);

        
		// Delivery Method
const deliveryMethodButtonsI = document.querySelectorAll('#deliveryMethodI button');
const deliveryMethodInputI = document.querySelector('input[name="delivery_method_i"]');
handleButtonClicks(deliveryMethodButtonsI, deliveryMethodInputI);

const deliveryMethodButtonsII = document.querySelectorAll('#deliveryMethodII button');
const deliveryMethodInputII = document.querySelector('input[name="delivery_method_ii"]');
handleButtonClicks(deliveryMethodButtonsII, deliveryMethodInputII);

const deliveryMethodButtonsIII = document.querySelectorAll('#deliveryMethodIII button');
const deliveryMethodInputIII = document.querySelector('input[name="delivery_method_iii"]');
handleButtonClicks(deliveryMethodButtonsIII, deliveryMethodInputIII);

// Subject Command
const subjectCommandButtonsI = document.querySelectorAll('#subjectCommandI button');
const subjectCommandInputI = document.querySelector('input[name="subject_command_i"]');
handleButtonClicks(subjectCommandButtonsI, subjectCommandInputI);

const subjectCommandButtonsII = document.querySelectorAll('#subjectCommandII button');
const subjectCommandInputII = document.querySelector('input[name="subject_command_ii"]');
handleButtonClicks(subjectCommandButtonsII, subjectCommandInputII);

const subjectCommandButtonsIII = document.querySelectorAll('#subjectCommandIII button');
const subjectCommandInputIII = document.querySelector('input[name="subject_command_iii"]');
handleButtonClicks(subjectCommandButtonsIII, subjectCommandInputIII);

// About Myself
const aboutMyselfButtonsI = document.querySelectorAll('#aboutMyselfI button');
const aboutMyselfInputI = document.querySelector('input[name="about_myself_i"]');
handleButtonClicks(aboutMyselfButtonsI, aboutMyselfInputI);

const aboutMyselfButtonsII = document.querySelectorAll('#aboutMyselfII button');
const aboutMyselfInputII = document.querySelector('input[name="about_myself_ii"]');
handleButtonClicks(aboutMyselfButtonsII, aboutMyselfInputII);


        // Submit Feedback button click handler with validation
        const submitButton = document.getElementById('submitButton');
        submitButton.addEventListener('click', (event) => {
            // Prevent form submission if any section has no button selected
            if (!timeManagementInputI.value /* Add conditions for other sections */) {
                event.preventDefault(); // Prevent form submission
                document.getElementById('errorMessage').style.display = 'block'; // Display error message
            } else {
                document.getElementById('errorMessage').style.display = 'none'; // Hide error message if all sections are filled
            }
        });
    </script>
</body>
</html>




>>>>>>> 3dd0583586d2aabc9dd7c8843076206d74304298
