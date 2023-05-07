<?php
include_once('config.php');
if(isset($_POST['status'], $_GET['gid'])) {
    // Get values from form

    $gid = $_GET['gid'];  
    $status = 'ACHIEVED'; 
    // print_r($_POST); 
    

    // Insert user data into database
    $sql = "UPDATE goal SET status = '$status' WHERE gid= '$gid'";
    $sult = mysqli_query($conn, $sql);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>