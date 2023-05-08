<?php
include_once('config.php');

// Retrieve the budget options based on the user ID
$user_id = $_SESSION['userid'];
$query = "SELECT budgetid, bname FROM `budget` WHERE userid = '$user_id' AND budget_status = ''";
$result = mysqli_query($conn, $query);

// Create an array of budget options
$budget_options = [];
while ($row = mysqli_fetch_assoc($result)) {
    $budget_options[] = $row;
}

if(isset($_POST['submit'])) {
    // Get values from form
    $userid = $_SESSION['userid'];
    $xpayee = $_POST['xpayee'];
    $xname = $_POST['xname'];
    $xamount = $_POST['xamount'];
    $xdate = $_POST['xdate'];
    $budget_id = $_POST['budgetid'];
    $status = 'ON-GOING';

    // Insert user data into database
    $sql = "INSERT INTO expenses (userid, budgetid, xname, xpayee, xamount, xdate, status) VALUES ('$userid', '$budget_id', '$xname','$xpayee','$xamount','$xdate', '$status')";
    $result = mysqli_query($conn, $sql);

    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>