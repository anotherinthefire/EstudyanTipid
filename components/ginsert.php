<?php
include_once('config.php');

$query = "SELECT * FROM `goal`;";
$result = mysqli_query($conn, $query);

if(isset($_POST['submit'])) {
    // Get values from form

    $gtitle = $_POST['gtitle'];
    $userid = $_SESSION['userid'];
    $balance = $_SESSION['balance'];
    $gtamount = $_POST['gtamount'];
    $gddate = $_POST['gddate'];   
    // Insert user data into database
    $sql = "INSERT INTO goal (gtitle, gtamount, gddate,userid, status) 
    VALUES ('$gtitle', '$gtamount', '$gddate ','$userid', 'PENDING')";
    $sult = mysqli_query($conn, $sql);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>