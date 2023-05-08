<?php
include_once('config.php');

if(isset($_POST['submit'])) {
    // Get values from form
    $budget = $_POST['budget'];
    $userid = $_SESSION['userid'];

    // Update user's balance in database
    $sql = "UPDATE user SET balance = balance + $budget WHERE userid = $userid";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Redirect back to the previous page
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    } else {
        // Handle error
        echo "Error updating balance: " . mysqli_error($conn);
    }
}
?>
