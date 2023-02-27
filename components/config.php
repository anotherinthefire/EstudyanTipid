<?php
$con = mysqli_connect("localhost", "root", "estudyantipid");

if(!$con){
    die('Connection Faied'. mysqli_connect_errno()); 
}
