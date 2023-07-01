<?php
$servername = "localhost";
$username = "root";
$password = "Pakistan@123";
$dbname = "reviewd";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Escape user inputs for security
$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$review = mysqli_real_escape_string($conn, $_POST['review']);

// Prepare the SQL statement with placeholders
$sql = "INSERT INTO commentdb (name, email, review) VALUES (?, ?, ?)";

// Prepare the statement
$stmt = $conn->prepare($sql);

// Bind the values to the placeholders
$stmt->bind_param("sss", $name, $email, $review);


// Execute the statement
$stmt->execute();

// Close the statement and the database connection
$stmt->close();
$conn->close();

header("Location: retrieve_data.php");
exit;
?>
