<!DOCTYPE html>
<html>
<head>
    <title>Course Feedback Form</title>
</head>
<body>
    <?php
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Establish a database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "feedback_management_system";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Define required fields
        $required_fields = [
            'course_unit', 'teacher', 'date', 'general_i', 'general_ii', 'general_iii',
            'materials_i', 'materials_ii', 'materials_iii', 'tutorials_examples_i', 'tutorials_examples_ii',
            'lab_fieldwork_i', 'lab_fieldwork_ii', 'lab_fieldwork_iii', 'about_myself_i', 'about_myself_ii',
            'about_myself_iii', 'about_myself_iv', 'comments'
        ];

        // Check if all required fields are set
        foreach ($required_fields as $field) {
            if (!isset($_POST[$field]) || empty($_POST[$field])) {
                die("Error: Missing required field: $field");
            }
        }

        // Get form data
        $course_unit = $_POST['course_unit'];
        $teacher = $_POST['teacher'];
        $date = $_POST['date'];
        $general_i = $_POST['general_i'];
        $general_ii = $_POST['general_ii'];
        $general_iii = $_POST['general_iii'];
        $materials_i = $_POST['materials_i'];
        $materials_ii = $_POST['materials_ii'];
        $materials_iii = $_POST['materials_iii'];
        $tutorials_examples_i = $_POST['tutorials_examples_i'];
        $tutorials_examples_ii = $_POST['tutorials_examples_ii'];
        $lab_fieldwork_i = $_POST['lab_fieldwork_i'];
        $lab_fieldwork_ii = $_POST['lab_fieldwork_ii'];
        $lab_fieldwork_iii = $_POST['lab_fieldwork_iii'];
        $about_myself_i = $_POST['about_myself_i'];
        $about_myself_ii = $_POST['about_myself_ii'];
        $about_myself_iii = $_POST['about_myself_iii'];
        $about_myself_iv = $_POST['about_myself_iv'];
        $comments = $_POST['comments'];

        // Validate date
        if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $date)) {
            die("Invalid date format. Please enter the date in YYYY-MM-DD format.");
        }

        // Prepare an SQL statement for safe insertion
        $stmt = $conn->prepare("INSERT INTO cource_feedback (CourseCode, teacher, date, general_i, general_ii, general_iii, 
            materials_i, materials_ii, materials_iii, tutorials_examples_i, tutorials_examples_ii, 
            lab_fieldwork_i, lab_fieldwork_ii, lab_fieldwork_iii, about_myself_i, about_myself_ii, 
            about_myself_iii, about_myself_iv, comments) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->bind_param("sssiiiiiiiiiiiiiiis", $course_unit, $teacher, $date, $general_i, $general_ii, $general_iii, 
            $materials_i, $materials_ii, $materials_iii, $tutorials_examples_i, $tutorials_examples_ii, 
            $lab_fieldwork_i, $lab_fieldwork_ii, $lab_fieldwork_iii, $about_myself_i, $about_myself_ii, 
            $about_myself_iii, $about_myself_iv, $comments);

        // Execute the statement
        if ($stmt->execute()) {
            // Display feedback data in a table
    echo "<h2>Feedback Submitted Successfully</h2>";
    echo "<h3>Course Unit: $course_unit</h3>";
    echo "<h3>Teacher: $teacher</h3>";
    echo "<h3>Date: $date</h3>";

    echo "<h3>A. General</h3>";
    echo "<table border='1'>";
    echo "<tr><td>This course helped me to enhance my knowledge</td><td>$general_i</td></tr>";
    echo "<tr><td>The workload of the course was manageable</td><td>$general_ii</td></tr>";
    echo "<tr><td>The course was interesting</td><td>$general_iii</td></tr>";
    echo "</table>";

    echo "<h3>B. Materials</h3>";
    echo "<table border='1'>";
    echo "<tr><td>Adequate Materials (handouts) were provided</td><td>$materials_i</td></tr>";
    echo "<tr><td>Handouts were easy to understand</td><td>$materials_ii</td></tr>";
    echo "<tr><td>Enough reference books were used</td><td>$materials_iii</td></tr>";
    echo "</table>";

    echo "<h3>C. Tutorials/ Examples</h3>";
    echo "<table border='1'>";
    echo "<tr><td>Given problems (examples/ tutorials/ exercises) were enough</td><td>$tutorials_examples_i</td></tr>";
    echo "<tr><td>Given problems (examples/ tutorials/ exercises) were challenging</td><td>$tutorials_examples_ii</td></tr>";
    echo "</table>";

    echo "<h3>D. Lab/ Fieldwork</h3>";
    echo "<table border='1'>";
    echo "<tr><td>I could relate what I learnt from lectures to lab/ field classes</td><td>$lab_fieldwork_i</td></tr>";
    echo "<tr><td>Labs & Fieldwork helped to improve my skills and practical knowledge</td><td>$lab_fieldwork_ii</td></tr>";
    echo "<tr><td>I can conduct experiments/ fieldwork myself through set of instructions in future</td><td>$lab_fieldwork_iii</td></tr>";
    echo "</table>";

    echo "<h3>E. About Myself</h3>";
    echo "<table border='1'>";
    echo "<tr><td>I prepared thoroughly for each class</td><td>$about_myself_i</td></tr>";
    echo "<tr><td>I attended lectures, lab/fieldwork regularly</td><td>$about_myself_ii</td></tr>";
    echo "<tr><td>I did all assigned work (homework/assignments/lab & field report) on time</td><td>$about_myself_iii</td></tr>";
    echo "<tr><td>I referred recommended textbooks regularly</td><td>$about_myself_iv</td></tr>";
    echo "</table>";

    echo "<h3>Any other comments:</h3>";
    echo "<p>$comments</p>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
 
    
        <label for="course_unit">Course Unit:</label>
        <input type="text" id="course_unit" name="course_unit" required><br><br>

        <label for="teacher">Teacher:</label>
        <input type="text" id="teacher" name="teacher" required><br><br>

        <label for="date">Date (YYYY-MM-DD):</label>
        <input type="text" id="date" name="date" required><br><br>

        <h3>A. General</h3>
        <label for="general_i">This course helped me to enhance my knowledge:</label>
        <input type="number" id="general_i" name="general_i" required><br><br>
        
        <label for="general_ii">The workload of the course was manageable:</label>
        <input type="number" id="general_ii" name="general_ii" required><br><br>

        <label for="general_iii">The course was interesting:</label>
        <input type="number" id="general_iii" name="general_iii" required><br><br>

        <h3>B. Materials</h3>
        <label for="materials_i">Adequate Materials (handouts) were provided:</label>
        <input type="number" id="materials_i" name="materials_i" required><br><br>

        <label for="materials_ii">Handouts were easy to understand:</label>
        <input type="number" id="materials_ii" name="materials_ii" required><br><br>

        <label for="materials_iii">Enough reference books were used:</label>
        <input type="number" id="materials_iii" name="materials_iii" required><br><br>

        <h3>C. Tutorials/ Examples</h3>
        <label for="tutorials_examples_i">Given problems (examples/ tutorials/ exercises) were enough:</label>
        <input type="number" id="tutorials_examples_i" name="tutorials_examples_i" required><br><br>

        <label for="tutorials_examples_ii">Given problems (examples/ tutorials/ exercises) were challenging:</label>
        <input type="number" id="tutorials_examples_ii" name="tutorials_examples_ii" required><br><br>

        <h3>D. Lab/ Fieldwork</h3>
        <label for="lab_fieldwork_i">I could relate what I learnt from lectures to lab/ field classes:</label>
        <input type="number" id="lab_fieldwork_i" name="lab_fieldwork_i" required><br><br>

        <label for="lab_fieldwork_ii">Labs & Fieldwork helped to improve my skills and practical knowledge:</label>
        <input type="number" id="lab_fieldwork_ii" name="lab_fieldwork_ii" required><br><br>

        <label for="lab_fieldwork_iii">I can conduct experiments/ fieldwork myself through set of instructions in future:</label>
        <input type="number" id="lab_fieldwork_iii" name="lab_fieldwork_iii" required><br><br>

        <h3>E. About Myself</h3>
        <label for="about_myself_i">I prepared thoroughly for each class:</label>
        <input type="number" id="about_myself_i" name="about_myself_i" required><br><br>

        <label for="about_myself_ii">I attended lectures, lab/fieldwork regularly:</label>
        <input type="number" id="about_myself_ii" name="about_myself_ii" required><br><br>

        <label for="about_myself_iii">I did all assigned work (homework/assignments/lab & field report) on time:</label>
        <input type="number" id="about_myself_iii" name="about_myself_iii" required><br><br>

        <label for="about_myself_iv">I referred recommended textbooks regularly:</label>
        <input type="number" id="about_myself_iv" name="about_myself_iv" required><br><br>

        <label for="comments">Any other comments:</label>
        <textarea id="comments" name="comments"></textarea><br><br>

        <input type="submit" value="Submit Feedback">
    

    </form>
</body>
</html>
