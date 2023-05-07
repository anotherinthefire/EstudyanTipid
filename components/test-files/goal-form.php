<?php
// Check if the form has been submitted
if(isset($_POST['submit'])){
  
  // Establish a database connection
  $servername = "localhost"; // Change this if your MySQL server is hosted elsewhere
  $username = "root"; // Change this to your MySQL username
  $password = ""; // Change this to your MySQL password
  $dbname = "estudyantipid"; // Change this to the name of your database
  
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  
  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  
  // Get the form data and sanitize it
  $gtitle = mysqli_real_escape_string($conn, $_POST['gtitle']);
  $gtamount = mysqli_real_escape_string($conn, $_POST['gtamount']);
  $gddate = mysqli_real_escape_string($conn, $_POST['gddate']);
  $status = mysqli_real_escape_string($conn, $_POST['status']);
  
  // Insert the data into the database
  $sql = "INSERT INTO goal (gtitle, gtamount, gddate, status)
  VALUES ('$gtitle', '$gtamount', '$gddate', '$status')";
  
  if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  
  // Close the database connection
  mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="shortcut icon" href="https://i.ibb.co/2KsCsg8/Estudyan-Tipid-logo-white.png">
</head>
<body>
    <!-- HTML form -->
<form method="post" action="">
    <label for="gtitle">Goal Title:</label>
    <input type="text" id="gtitle" name="gtitle"><br><br>
    
    <label for="gtamount">Goal Target Amount:</label>
    <input type="number" id="gtamount" name="gtamount"><br><br>
    
    <label for="balance">Balance:</label>
    <input type="number" id="balance" name="balance"><br><br>
    
    <label for="gddate">Goal Deadline Date:</label>
    <input type="date" id="gddate" name="gddate"><br><br>
    
    <label for="status">Status:</label>
    <input type="text" id="status" name="status"><br><br>
    
    <input type="submit" name="submit" value="Submit">
  </form>
</body>
</html>