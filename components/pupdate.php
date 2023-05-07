<?php
include_once('config.php');



if(isset($_POST['edit'], $_GET['exid'])) {
    // Get values from form

    $exid = $_GET['exid'];  
    $userid = $_SESSION['userid'];
    $xname = $_POST['xname'];
    $xpayee = $_POST['xpayee'];
    $xamount = $_POST['xamount'];
    $xdate = $_POST['xdate'];  
    $status = $_POST['status']; 
    // print_r($_POST); 
    

    // Insert user data into database
    $sql = "UPDATE expenses SET xname='$xname', xpayee='$xpayee' ,xamount ='$xamount', xdate='$xdate', status = '$status' WHERE exid= '$exid'";
    $sult = mysqli_query($conn, $sql);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>