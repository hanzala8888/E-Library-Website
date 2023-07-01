<?php
$fixedCode = "16870912444"; // Fixed code to be entered by the user

if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
  if (isset($_POST['code'])) 
  {
    $enteredCode = $_POST['code']; // Retrieve the entered code from the form

    // Validate the entered code against the fixed code
    if ($enteredCode == $fixedCode) 
    {
      // Code is correct, proceed to the next page
      header('Location: login.html');
      exit;
    } 
    else 
    {
      // Wrong code entered
      echo '<script>alert("Wrong code entered.");</script>';
    }
  }
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
    <label for="code">Code:</label>
    <input type="text" name="code" id="code" required>
    <br>
    <input type="submit" value="Submit Code">
  </form>
</body>
</html>
