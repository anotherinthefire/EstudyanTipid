<?php
include_once('config.php');

if(isset($_POST['delete'], $_GET['gid'])) {

$gid = $_GET['gid'];  
$query = "DELETE FROM goal WHERE gid = '$gid'";
$result = mysqli_query($conn, $query);
header('Location: ' . $_SERVER['HTTP_REFERER']);
}

?>