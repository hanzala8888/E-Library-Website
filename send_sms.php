<?php
session_start(); // Start a session to store the fixed code and timestamp

$servername = "localhost";
$username = "root";
$password = "Pakistan@123";
$dbname = "credentials";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Store the current timestamp in the session
$_SESSION['timestamp'] = time();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['phone'])) 
{
  $enteredPhone = $_POST['phone']; // Retrieve the entered phone number from the form

  // Prepare and execute the query to check for a matching phone number
  $stmt = $conn->prepare("SELECT phone FROM login WHERE phone = ?");
  $stmt->bind_param("s", $enteredPhone);
  $stmt->execute();
  $stmt->store_result();

  if ($stmt->num_rows > 0)
  {
    // Match found, proceed to send the code
    $APIKey = '8979a1eeaeff460c95770541600aabfd';
    $receiver = $_POST['phone']; // Retrieve the entered cellphone number from the phone form
    $sender = '8583';
    $textmessage = 'Test SMS from VT API';
    
    $url = "https://api.veevotech.com/sendsms?hash=".$APIKey. 
            "&receivenum=" .$receiver. 
            "&sendernum=" .urlencode($sender).
            "&textmessage=" .urlencode($textmessage);
    
    #----CURL Request Start
    $ch = curl_init();
    $timeout = 30;
    curl_setopt ($ch,CURLOPT_URL, $url) ;
    curl_setopt ($ch,CURLOPT_RETURNTRANSFER, 1);
    curl_setopt ($ch,CURLOPT_CONNECTTIMEOUT, $timeout) ;
    $response = curl_exec($ch) ;
    curl_close($ch) ;
    #----CURL Request End, Output Response
    echo $response ;
    
    // redirect after when message will be sent
    header('Location: code.php');
  }
  else
  {
    echo '<script>';
    echo 'alert("Phone number mismatch.");';
    echo '</script>';
  }

  // Close the statement
  $stmt->close();
}
?>


<!DOCTYPE html>
<html>
<head>
  <title>Form Example</title>
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      padding: 0;
    }

    form {
      display: flex;
      flex-direction: column;
      align-items: center;
      width: 300px;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      background-color: #f5f5f5;
    }

    label {
      margin-bottom: 10px;
    }

    input[type="text"],
    input[type="submit"] {
      width: 100%;
      padding: 8px;
      border-radius: 3px;
      border: 1px solid #ccc;
    }

    input[type="submit"] {
      margin-top: 10px;
      background-color: #4CAF50;
      color: #fff;
      font-weight: bold;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <form method="post" action="">
    <label for="phone">Phone:</label>
    <input type="text" name="phone" id="phone" required>
    <br>
    <input type="submit" value="Submit Code">
  </form>
</body>
</html>
