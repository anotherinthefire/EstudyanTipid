<?php
include_once('config.php');

$query = "SELECT * FROM `budget`";
$result = mysqli_query($conn, $query);

if(isset($_POST['submit'])) {
    // Get values from form

    $bname = $_POST['bname'];
    $userid = $_SESSION['userid'];
    $budget = $_POST['budget'];
    $period = $_POST['period'];   
    $xamount = $_SESSION['xamount'];
    // Insert user data into database
    $sql = "INSERT INTO budget (userid, bname, budget, period) VALUES ('$userid','$bname', '$budget', '$period')";
    $sult = mysqli_query($conn, $sql);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    
}
?>