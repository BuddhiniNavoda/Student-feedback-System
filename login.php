<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Feedback Management System - Login</title>
    <link rel="stylesheet" href="styles.css">
    <!-- Include Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Custom CSS styles */
		body {
            background-image: url('EFac.jpg'); 
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
		.login-container {
		background-color: rgba(255, 255, 255, 0.8); /* Adjust the last value (0.8) to change transparency */
		padding: 20px;
		border-radius: 10px;
		box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Optional: Add a box shadow for a subtle effect */
		}
        .password-container {
            position: relative;
        }
        .toggle-password {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
            background: none;
            border: none;
        }
        .center {
            text-align: center;
        }
        .center button[type="submit"] {
            margin: 20px auto;
            display: block;
        }
        .success-message {
            color: green;
        }
        .error-message {
            color: red;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <img src="logo.png" alt="Campus Logo" class="logo">
        <h1>Login</h1>

        <?php
        // Check if success or error message is set
        if (isset($_GET['success'])) {
            echo '<p class="success-message">' . $_GET['success'] . '</p>';
        } elseif (isset($_GET['error'])) {
            echo '<p class="error-message">' . $_GET['error'] . '</p>';
        }
        ?>

        <form action="login_process.php" method="POST">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" required pattern="20\d{2}e\d{3}@eng\.jfn\.ac\.lk" title="Please enter a valid username in the format 20XXeXXX@eng.jfn.ac.lk"><br>
            <label for="userid">User ID:</label><br>
            <div class="password-container">
                <input type="password" id="userid" name="userid" required>
                <button class="toggle-password" type="button" onclick="togglePasswordVisibility()">
                    <i class="fas fa-eye"></i>
                </button>
            </div>
            <select id="department" name="department" required>
                <option value="">Select Department</option>
                <option value="civil">Civil</option>
                <option value="mechanical">Mechanical</option>
                <option value="electrical">Electrical</option>
                <option value="computer">Computer</option>
            </select><br>
            <div class="center"> <!-- Center the login button -->
                <button type="submit">Login</button>
            </div>
        </form>
        <p>Don't have an account? <a href="create_account.php">Create an account</a></p>
    </div>

    <script>
        function togglePasswordVisibility() {
            var passwordField = document.getElementById("userid");
            var eyeIcon = document.querySelector(".toggle-password i");

            if (passwordField.type === "password") {
                passwordField.type = "text";
                eyeIcon.classList.remove("fa-eye");
                eyeIcon.classList.add("fa-eye-slash");
            } else {
                passwordField.type = "password";
                eyeIcon.classList.remove("fa-eye-slash");
                eyeIcon.classList.add("fa-eye");
            }
        }
    </script>
</body>
</html>
=======
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Feedback Management System - Login</title>
    <link rel="stylesheet" href="styles.css">
    <!-- Include Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Custom CSS styles */
		body {
            background-image: url('EFac.jpg'); 
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
		.login-container {
		background-color: rgba(255, 255, 255, 0.8); /* Adjust the last value (0.8) to change transparency */
		padding: 20px;
		border-radius: 10px;
		box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Optional: Add a box shadow for a subtle effect */
		}
        .password-container {
            position: relative;
        }
        .toggle-password {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
            background: none;
            border: none;
        }
        .center {
            text-align: center;
        }
        .center button[type="submit"] {
            margin: 20px auto;
            display: block;
        }
        .success-message {
            color: green;
        }
        .error-message {
            color: red;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <img src="logo.png" alt="Campus Logo" class="logo">
        <h1>Login</h1>

        <?php
        // Check if success or error message is set
        if (isset($_GET['success'])) {
            echo '<p class="success-message">' . $_GET['success'] . '</p>';
        } elseif (isset($_GET['error'])) {
            echo '<p class="error-message">' . $_GET['error'] . '</p>';
        }
        ?>

        <form action="login_process.php" method="POST">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" required pattern="20\d{2}e\d{3}@eng\.jfn\.ac\.lk" title="Please enter a valid username in the format 20XXeXXX@eng.jfn.ac.lk"><br>
            <label for="userid">User ID:</label><br>
            <div class="password-container">
                <input type="password" id="userid" name="userid" required>
                <button class="toggle-password" type="button" onclick="togglePasswordVisibility()">
                    <i class="fas fa-eye"></i>
                </button>
            </div>
            <select id="department" name="department" required>
                <option value="">Select Department</option>
                <option value="civil">Civil</option>
                <option value="mechanical">Mechanical</option>
                <option value="electrical">Electrical</option>
                <option value="computer">Computer</option>
            </select><br>
            <div class="center"> <!-- Center the login button -->
                <button type="submit">Login</button>
            </div>
        </form>
        <p>Don't have an account? <a href="create_account.php">Create an account</a></p>
    </div>

    <script>
        function togglePasswordVisibility() {
            var passwordField = document.getElementById("userid");
            var eyeIcon = document.querySelector(".toggle-password i");

            if (passwordField.type === "password") {
                passwordField.type = "text";
                eyeIcon.classList.remove("fa-eye");
                eyeIcon.classList.add("fa-eye-slash");
            } else {
                passwordField.type = "password";
                eyeIcon.classList.remove("fa-eye-slash");
                eyeIcon.classList.add("fa-eye");
            }
        }
    </script>
</body>
</html>
>>>>>>> 3dd0583586d2aabc9dd7c8843076206d74304298
