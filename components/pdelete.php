<?php
include_once('config.php');

if(isset($_POST['delete'], $_GET['exid'])) {


$exid = $_GET['exid'];  
$query = "DELETE FROM expenses WHERE exid = '$exid'";
$result = mysqli_query($conn, $query);
header('Location: ' . $_SERVER['HTTP_REFERER']);
}

?>