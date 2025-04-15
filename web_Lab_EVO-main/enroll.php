<?php
include('db.php'); // Include the database connection file

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentId = $_POST['studentId'];
    $courseCode = $_POST['courseCode'];
    $courseTitle = $_POST['courseTitle'];
    $semester = $_POST['semester'];

    // Validate required fields
    if (empty($studentId) || empty($courseCode)) {
        $error_message = "Student ID and Course Code are required!";
    } else {
        // Insert enrollment data into the database
        $sql = "INSERT INTO enrollments (student_id, course_code, course_title, semester) 
                VALUES ('$studentId', '$courseCode', '$courseTitle', '$semester')";

        if ($conn->query($sql) === TRUE) {
            $success_message = "Course enrollment successful!";
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
    <title>Course Enrollment</title>
</head>
<body>

<h2>Course Enrollment</h2>

<?php if (isset($error_message)): ?>
    <div class="error"><?php echo $error_message; ?></div>
<?php elseif (isset($success_message)): ?>
    <div class="success
