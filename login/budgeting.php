<?php
// Function to generate OTP
// If form is submitted
include_once('../components/config.php');

if(isset($_POST['wallet'])) {
    // Get values from form 

    $balance = $_POST['balance'];
   
    $userId = $_SESSION['userid'];
    // $balance = $_SESSION['balance'];
    // print_r($balance);
         
    // Update user data into database
    $query = "UPDATE user SET balance = '$balance' WHERE userid = ".$_SESSION['userid']."";
    $result = mysqli_query($conn, $query);
    

    //Redirect to login page
    header('Location: ../components/profile.php');
  }
?>