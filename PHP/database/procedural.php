<?php

$servername = "localhost";
$username = "root";
$password = "";
$dname = "test";

$conn = mysqli_connect($servername,$username,$password,$dname);

if(!$conn){
    die("Connection Failed:" . mysqli_connect_error());
} else {
    echo "Connection Successfully";
}

?>