<?php
$servername = "localhost";
$username = "root";
$password = "Pakistan@123";
$dbname = "credentials";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}

// Escape user inputs for security
$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

// Prepare the SQL statement with placeholders
$sql = "INSERT INTO login (name, email, phone, password) VALUES (?, ?, ?, ?)";

// Prepare the statement
$stmt = $conn->prepare($sql);

// Bind the values to the placeholders
$stmt->bind_param("ssss", $name, $email, $phone, $password);

// Execute the statement
$stmt->execute();

// Close the statement and the database connection
$stmt->close();
$conn->close();

// Redirect to login.html
header("Location: send_sms.php");
exit;
?>