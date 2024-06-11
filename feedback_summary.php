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

// Function to fetch and summarize feedback for a given section and statement
function getFeedbackSummary($conn, $section, $statement) {
    $sql = "SELECT $statement, COUNT(*) as count 
            FROM feedback
            GROUP BY $statement";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Error fetching feedback summary: " . mysqli_error($conn));
    }

    $summary = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $summary[$row[$statement]] = $row['count'];
    }

    return $summary;
}

// Define sections and statements
$sections = [
    'general' => ['i', 'ii', 'iii'],
    'materials' => ['i', 'ii', 'iii'],
    'tutorialsExamples' => ['i', 'ii'],
    'labFieldwork' => ['i', 'ii', 'iii'],
    'aboutMyself' => ['i', 'ii', 'iii', 'iv']
];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Summary</title>
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

        h1, h3 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f9f9f9;
        }

        .summary-section {
            margin-bottom: 40px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Feedback Summary</h1>
        <?php foreach ($sections as $section => $statements): ?>
            <div class="summary-section">
                <h3><?php echo ucfirst($section); ?></h3>
                <table>
                    <thead>
                        <tr>
                            <th>Statement</th>
                            <th>-2</th>
                            <th>-1</th>
                            <th>0</th>
                            <th>+1</th>
                            <th>+2</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($statements as $statement): 
                            $summary = getFeedbackSummary($conn, $section, $section . $statement);
                        ?>
                            <tr>
                                <td><?php echo ucfirst($section) . " " . $statement; ?></td>
                                <td><?php echo isset($summary[-2]) ? $summary[-2] : 0; ?></td>
                                <td><?php echo isset($summary[-1]) ? $summary[-1] : 0; ?></td>
                                <td><?php echo isset($summary[0]) ? $summary[0] : 0; ?></td>
                                <td><?php echo isset($summary[1]) ? $summary[1] : 0; ?></td>
                                <td><?php echo isset($summary[2]) ? $summary[2] : 0; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
<?php
// Close the connection
mysqli_close($conn);
?>
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

// Function to fetch and summarize feedback for a given section and statement
function getFeedbackSummary($conn, $section, $statement) {
    $sql = "SELECT $statement, COUNT(*) as count 
            FROM feedback
            GROUP BY $statement";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Error fetching feedback summary: " . mysqli_error($conn));
    }

    $summary = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $summary[$row[$statement]] = $row['count'];
    }

    return $summary;
}

// Define sections and statements
$sections = [
    'general' => ['i', 'ii', 'iii'],
    'materials' => ['i', 'ii', 'iii'],
    'tutorialsExamples' => ['i', 'ii'],
    'labFieldwork' => ['i', 'ii', 'iii'],
    'aboutMyself' => ['i', 'ii', 'iii', 'iv']
];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Summary</title>
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

        h1, h3 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f9f9f9;
        }

        .summary-section {
            margin-bottom: 40px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Feedback Summary</h1>
        <?php foreach ($sections as $section => $statements): ?>
            <div class="summary-section">
                <h3><?php echo ucfirst($section); ?></h3>
                <table>
                    <thead>
                        <tr>
                            <th>Statement</th>
                            <th>-2</th>
                            <th>-1</th>
                            <th>0</th>
                            <th>+1</th>
                            <th>+2</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($statements as $statement): 
                            $summary = getFeedbackSummary($conn, $section, $section . $statement);
                        ?>
                            <tr>
                                <td><?php echo ucfirst($section) . " " . $statement; ?></td>
                                <td><?php echo isset($summary[-2]) ? $summary[-2] : 0; ?></td>
                                <td><?php echo isset($summary[-1]) ? $summary[-1] : 0; ?></td>
                                <td><?php echo isset($summary[0]) ? $summary[0] : 0; ?></td>
                                <td><?php echo isset($summary[1]) ? $summary[1] : 0; ?></td>
                                <td><?php echo isset($summary[2]) ? $summary[2] : 0; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
<?php
// Close the connection
mysqli_close($conn);
?>
>>>>>>> 3dd0583586d2aabc9dd7c8843076206d74304298
