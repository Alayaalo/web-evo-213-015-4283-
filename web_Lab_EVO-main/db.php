<?php
$servername = "localhost";
$username = "root"; // Default MySQL username in XAMPP
$password = ""; // Default MySQL password in XAMPP is empty
$dbname = "university_system"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
