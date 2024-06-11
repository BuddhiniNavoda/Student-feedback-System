<?php
session_start();

// Database connection details
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

// Fetch available courses and lecturers
$courses = [];
$lecturers = [];

$course_query = "SELECT Ccode FROM course";
$course_result = $conn->query($course_query);
if ($course_result->num_rows > 0) {
    while ($row = $course_result->fetch_assoc()) {
        $courses[] = $row['Ccode'];
    }
}

$lecturer_query = "SELECT LName FROM lecturer";
$lecturer_result = $conn->query($lecturer_query);
if ($lecturer_result->num_rows > 0) {
    while ($row = $lecturer_result->fetch_assoc()) {
        $lecturers[] = $row['LName'];
    }
}

// Get selected Ccode and LName from the form
$ccode = isset($_POST['ccode']) ? $_POST['ccode'] : '';
$lname = isset($_POST['lname']) ? $_POST['lname'] : '';

// Initialize feedback summary arrays
$course_feedback_summary = [];
$course_comments = [];
$lecture_feedback_summary = [];
$lecture_comments = [];

// Function to calculate averages and convert to percentages
function calculate_averages($summary, $columns) {
    foreach ($columns as $col) {
        $total_count = array_sum($summary[$col]);
        if ($total_count > 0) {
            foreach ($summary[$col] as $value => &$count) {
                $count = ($count / $total_count) * 100;
            }
        }
    }
    return $summary;
}

// Fetch feedback summaries if Ccode and LName are selected
if ($ccode && $lname) {
    // Initialize course feedback summary table structure
    $course_summary_template = ['-2' => 0, '-1' => 0, '0' => 0, '1' => 0, '2' => 0];
    $course_columns = ['general_1', 'general_2', 'general_3', 'materials_1', 'materials_2', 'materials_3', 'delivery_1', 'delivery_2', 'delivery_3', 'overall_1'];
    foreach ($course_columns as $col) {
        $course_feedback_summary[$col] = $course_summary_template;
    }

    // Fetch course feedback data
    $query = "SELECT * FROM course_feedback WHERE course_unit = ? AND teacher = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $ccode, $lname);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        foreach ($course_columns as $col) {
            $value = $row[$col];
            if (isset($course_feedback_summary[$col][$value])) {
                $course_feedback_summary[$col][$value]++;
            }
        }
        $course_comments[] = $row['comments'];
    }

    // Calculate averages for course feedback
    $course_feedback_summary = calculate_averages($course_feedback_summary, $course_columns);

    // Initialize lecture feedback summary table structure
    $lecture_summary_template = ['-2' => 0, '-1' => 0, '0' => 0, '1' => 0, '2' => 0];
    $lecture_columns = ['timeManagement_1', 'timeManagement_2', 'timeManagement_3', 'deliveryMethod_1', 'deliveryMethod_2', 'deliveryMethod_3', 'subjectCommand_1', 'subjectCommand_2', 'subjectCommand_3', 'aboutMyself_1', 'aboutMyself_2'];
    foreach ($lecture_columns as $col) {
        $lecture_feedback_summary[$col] = $lecture_summary_template;
    }

    // Fetch lecture feedback data
    $query = "SELECT * FROM lecture_feedback WHERE course_unit = ? AND teacher = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $ccode, $lname);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        foreach ($lecture_columns as $col) {
            $value = $row[$col];
            if (isset($lecture_feedback_summary[$col][$value])) {
                $lecture_feedback_summary[$col][$value]++;
            }
        }
        $lecture_comments[] = $row['comments'];
    }

    // Calculate averages for lecture feedback
    $lecture_feedback_summary = calculate_averages($lecture_feedback_summary, $lecture_columns);
    
    // Function to find max values for highlighting
    function find_max_values($summary, $columns) {
        $max_values = [];
        foreach ($columns as $col) {
            $max_values[$col] = max($summary[$col]);
        }
        return $max_values;
    }

    // Find max values for course and lecture feedback summaries
    $course_max_values = find_max_values($course_feedback_summary, $course_columns);
    $lecture_max_values = find_max_values($lecture_feedback_summary, $lecture_columns);

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Summary</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9; /* Light background color */
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: #eaf6ff; /* Light blue container background */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            text-align: center;
            margin-bottom: 20px;
        }

        select {
            padding: 10px;
            margin: 0 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            background-color: #f5f5f5; /* Lighter gray select background */
        }

        button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50; /* Green button */
            color: white;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049; /* Darker green on hover */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f5f5f5; /* Lighter gray table header background */
        }

        .comments {
            margin-top: 20px;
        }

        .highlight {
            background-color: #ff0; /* Light yellow for highlighting */
        }
 body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            margin: 0;
            padding: 20px;
        }
        h2 {
            color: #4CAF50;
            text-align: center;
        }
        h3, h4 {
            color: #008CBA;
        }
        .form-section {
            background-color: #ffffff;
            border: 2px solid #4CAF50;
            border-radius: 10px;
            padding: 20px;
            width: 60%;
            margin: 20px auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Select Course and Lecturer</h2>
        <form method="post">
            <select name="ccode" required>
                <option value="">Select Course</option>
                <?php foreach ($courses as $course): ?>
                    <option value="<?php echo $course; ?>" <?php if ($ccode == $course) echo 'selected'; ?>><?php echo $course; ?></option>
                <?php endforeach; ?>
            </select>
            <select name="lname" required>
                <option value="">Select Lecturer</option>
                <?php foreach ($lecturers as $lecturer): ?>
                    <option value="<?php echo $lecturer; ?>" <?php if ($lname == $lecturer) echo 'selected'; ?>><?php echo $lecturer; ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit">View Feedback Summary</button>
        </form>

        <?php if ($ccode && $lname): ?>
            <form method="post" action="logout.php">
                <button type="submit">Logout</button>
            </form>
	    
           
    
<h2>Course Feedback Summary</h2>
	    <div class="scale">
            <p>-2: Strongly Disagree, -1: Disagree, 0: Not Sure, +1: Agree, +2: Strongly Agree</p>
            
            </div>
            
            <table>
                <tr>
                    <th>Value</th>
                    <?php foreach ($course_columns as $col): ?>
                        <th><?php echo $col; ?></th>
                    <?php endforeach; ?>
                </tr>
                <?php foreach ($course_summary_template as $value => $count): ?>
                    <tr>
                        <td><?php echo $value; ?></td>
                        <?php foreach ($course_columns as $col): ?>
                            <td class="<?php echo ($course_feedback_summary[$col][$value] == $course_max_values[$col]) ? 'highlight' : ''; ?>">
                                <?php echo number_format($course_feedback_summary[$col][$value], 2); ?>%
                            </td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </table>

            <div class="comments">
                <h2>Course Feedback Comments</h2>
                <?php foreach ($course_comments as $comment): ?>
                    <p><?php echo htmlspecialchars($comment); ?></p>
                <?php endforeach; ?>
            </div>

            <h2>Lecture Feedback Summary</h2>
            <table>
                <tr>
                    <th>Value</th>
                    <?php foreach ($lecture_columns as $col): ?>
                        <th><?php echo $col; ?></th>
                    <?php endforeach; ?>
                </tr>
                <?php foreach ($lecture_summary_template as $value => $count): ?>
                    <tr>
                        <td><?php echo $value; ?></td>
                        <?php foreach ($lecture_columns as $col): ?>
                            <td class="<?php echo ($lecture_feedback_summary[$col][$value] == $lecture_max_values[$col]) ? 'highlight' : ''; ?>">
                                <?php echo number_format($lecture_feedback_summary[$col][$value], 2); ?>%
                            </td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </table>

            <div class="comments">
                <h2>Lecture Feedback Comments</h2>
                <?php foreach ($lecture_comments as $comment): ?>
                    <p><?php echo htmlspecialchars($comment); ?></p>
                <?php endforeach; ?>
            </div>
 <h2>Course Feedback Form</h2>
<div class="form-section">
        <h3>General</h3>
        <label>1. This course helped me to enhance my knowledge.</label>
        <label>2. The workload of the course was manageable.</label>
        <label>3. The course was interesting.</label>

        <h3>Materials</h3>
        <label>1. Adequate Materials (handouts) were provided.</label>
        <label>2. Handouts were easy to understand.</label>
        <label>3. Reference books were relevant.</label>

        <h3>Delivery</h3>
        <label>1. The lecturer was punctual.</label>
        <label>2. The lecturer communicated effectively.</label>
        <label>3. The lecturer encouraged participation.</label>

        <h3>Overall</h3>
        <label>1. Overall, I am satisfied with this course.</label>
    </div>

    <h2>Lecture Feedback Form</h2>
    <div class="form-section">
        <h4>Time Management</h4>
        <label>1. Lectures/ Labs/ Fieldworks started and finished on time.</label>
        <label>2. The lecturer managed class time effectively.</label>
        <label>3. The lecturer was readily available for consultation with students.</label>

        <h4>Delivery Method</h4>
        <label>1. The teaching methods used were effective.</label>
        <label>2. Lectures were easy to understand.</label>
        <label>3. The lecturer encouraged students to participate in discussions.</label>

        <h4>Subject Command</h4>
        <label>1. The lecturer focused on syllabus.</label>
        <label>2. The lecturer was self-confident in subject and teaching.</label>
        <label>3. The lecturer linked real-world applications and created interest in the subject.</label>

        <h4>About Myself</h4>
        <label>1. The lecture was engaging and interesting.</label>
        <label>2. The lecturer was self-confident in subject and teaching.</label>
    </div>
        <?php endif; ?>
    </div>
</body>
</html>
