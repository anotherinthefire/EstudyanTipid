<?php
include_once('config.php');



if(isset($_POST['edit'], $_GET['gid'])) {
    // Get values from form

    $gid = $_GET['gid'];  
    $gtitle = $_POST['gtitle'];
    $userid = $_SESSION['userid'];
    $balance = $_SESSION['balance'];
    $gtamount = $_POST['gtamount'];
    $gddate = $_POST['gddate'];  
    $status = $_POST['status']; 
    // print_r($_POST); 
    

    // Insert user data into database
    $sql = "UPDATE goal SET gtitle='$gtitle', gtamount ='$gtamount', gddate='$gddate', status = '$status' WHERE gid= '$gid'";
    $sult = mysqli_query($conn, $sql);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>