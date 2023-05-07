<?php
include_once('../components/config.php');
// Function to generate OTP
// If form is submitted
if(isset($_POST['signup'])) {
  // Get values from form
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $email = $_POST['email'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  
  // Insert user data into database
  $query = "INSERT INTO user (first_name, last_name, email, username, password) VALUES ('$first_name', '$last_name', '$email', '$username', '$password')";
  $result = mysqli_query($conn, $query);
  
  // Redirect to login page
  header('Location: Login.php');
  exit;
}
?>