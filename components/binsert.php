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

    // Deduct budget from user balance
    $query = "SELECT balance FROM user WHERE userid = '$userid'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $current_balance = $row['balance'];

    $new_balance = $current_balance - $budget;
    $update_query = "UPDATE user SET balance = '$new_balance' WHERE userid = '$userid'";
    mysqli_query($conn, $update_query);

    // Insert user data into database
    $sql = "INSERT INTO budget (userid, bname, budget, period) VALUES ('$userid','$bname', '$budget', '$period')";
    $result = mysqli_query($conn, $sql);

    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>
