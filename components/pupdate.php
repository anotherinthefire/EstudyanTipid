<?php
include('config.php');
if(isset($_POST['edit'])){
    $exid = $_GET['exid'];
    $xname = $_POST['xname'];
    $xamount = $_POST['xamount'];
    $xpayee = $_POST['xpayee'];
    $xdate = $_POST['xdate'];
    $budgetid = $_POST['budgetid'];
    $status = $_POST['status'];

    $query = "UPDATE expenses SET xname='$xname', xamount='$xamount', xpayee='$xpayee', xdate='$xdate', budgetid='$budgetid', status='$status' WHERE exid='$exid'";

    $result = mysqli_query($conn, $query);
    
    if($result){
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        echo "<script>alert('Expenses Updated Successfully')</script>";
        echo "<script>window.location.href='expenses.php'</script>";
    }
    else{
        echo "<script>alert('Failed to Update Expenses')</script>";
    }
}

    // Redirect back to previous page
    

