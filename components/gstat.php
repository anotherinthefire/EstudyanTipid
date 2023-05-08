<?php
include_once('config.php');

function deductAmountFromBalance($conn, $userId, $amountToDeduct) {
    $sql = "UPDATE user SET balance = balance - $amountToDeduct WHERE userid = $userId";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        // handle error
        return false;
    }
    return true;
}

if (isset($_POST['status'], $_GET['gid'])) {
    $gid = $_GET['gid'];  
    $status = 'ACHIEVED'; 
    
    $sql = "UPDATE goal SET status = '$status' WHERE gid = '$gid'";
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        $query = "SELECT userid, gtamount FROM goal WHERE gid = '$gid'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $userId = $row['userid'];
            $amountToDeduct = $row['gtamount'];
            $deducted = deductAmountFromBalance($conn, $userId, $amountToDeduct);
            if ($deducted) {
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit;
            } else {
                // handle error
            }
        }
    } else {
        // handle error
    }
}
?>
