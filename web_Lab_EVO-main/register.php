<?php
include('db.php'); // Include the database connection file

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $studentId = $_POST['studentId'];
    $department = $_POST['department'];
    $major = $_POST['major'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];

    // Validate required fields
    if (empty($name) || empty($email)) {
        $error_message = "Name and Email are required!";
    } else {
        // Insert data into the database
        $sql = "INSERT INTO students (name, email, student_id, department, major, dob, address) 
                VALUES ('$name', '$email', '$studentId', '$department', '$major', '$dob', '$address')";

        if ($conn->query($sql) === TRUE) {
            $success_message = "Student registered successfully!";
        } else {
            $error_message = "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .form-container { max-width: 600px; margin: 20px auto; padding: 20px; border: 1px solid #ccc; }
        label { display: block; margin-bottom: 5px; }
        input, textarea, select { width: 100%; padding: 8px; margin-bottom: 15px; }
        button { padding: 10px 20px; background-color: #4CAF50; color: white; border: none; cursor: pointer; }
        button:hover { background-color: #45a049; }
        .error { color: red; }
        .success { color: green; }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Student Registration</h2>

        <?php if (isset($error_message)): ?>
            <div class="error"><?php echo $error_message; ?></div>
        <?php elseif (isset($success_message)): ?>
            <div class="success"><?php echo $success_message; ?></div>
        <?php endif; ?>

        <form action="register.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="studentId">Student ID:</label>
            <input type="text" id="studentId" name="studentId">

            <label for="department">Department:</label>
            <select id="department" name="department">
                <option value="Computer Science">Computer Science</option>
                <option value="Electrical Engineering">Electrical Engineering</option>
                <option value="Mechanical Engineering">Mechanical Engineering</option>
            </select>

            <label for="major">Major:</label>
            <select id="major" name="major">
                <option value="Software Engineering">Software Engineering</option>
                <option value="Artificial Intelligence">Artificial Intelligence</option>
                <option value="Data Science">Data Science</option>
            </select>

            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob">

            <label for="address">Address:</label>
            <textarea id="address" name="address"></textarea>

            <button type="submit">Submit</button>
        </form>
    </div>

</body>
</html>
