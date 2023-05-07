<?php
include_once('config.php');

$query = "SELECT * FROM `expenses`;";
$result = mysqli_query($conn, $query);

if(isset($_POST['submit'])) {
    // Get values from form

    $userid = $_SESSION['userid'];
    $xpayee = $_POST['xpayee'];
    $xname = $_POST['xname'];
    $xamount = $_POST['xamount'];
    $xdate = $_POST['xdate']; 
    $status = 'ON-GOING';  
    print_r($_POST);
    // Insert user data into database
    $sql = "INSERT INTO expenses (userid, xname, xpayee, xamount, xdate, status) VALUES ('$userid', '$xname','$xpayee','$xamount','$xdate', '$status')";
    $sult = mysqli_query($conn, $sql);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>