
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="styles.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<style>
        /* Custom CSS styles */
		body {
            background-image: url('EFac.jpg'); 
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
		.registration-container {
		background-color: rgba(255, 255, 255, 0.8); /* Adjust the last value (0.8) to change transparency */
		padding: 20px;
		border-radius: 10px;
		box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Optional: Add a box shadow for a subtle effect */
		}
		</style>
    <script>
        $(document).ready(function(){
            $('.registration-form').submit(function(e){
                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    type: 'POST',
                    url: 'registration_process.php',
                    data: formData,
                    success: function(response){
                        $('.message').html(response);
                    }
                });
            });
        });
    </script>
</head>
<body>
    <div class="registration-container">
        <img src="logo.png" alt="Campus Logo" class="logo">
        <h1>User Registration</h1>
        <form action="registration_process.php" method="POST">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" required pattern="20\d{2}e\d{3}@eng\.jfn\.ac\.lk" title="Please enter a valid username in the format 20XXeXXX@eng.jfn.ac.lk"><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br>
            <label for="department">Department:</label><br>
            <select id="department" name="department" required>
                <option value="">Select Department</option>
                <option value="civil">Civil</option>
                <option value="mechanical">Mechanical</option>
                <option value="electrical">Electrical</option>
                <option value="computer">Computer</option>
            </select><br>
            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>