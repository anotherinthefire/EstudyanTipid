<?php
include_once('config.php');

if(isset($_POST['status'], $_GET['exid'])) {
    // Get values from form

    $exid = $_GET['exid'];  
    $status = 'PAID'; 
    // print_r($_POST); 
    

    // Insert user data into database
    $sql = "UPDATE expenses SET status = '$status' WHERE exid= '$exid'";
    $sult = mysqli_query($conn, $sql);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
