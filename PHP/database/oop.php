<?php

$servername = "localhost";
$username = "root";
$password = "";
$dname = "test";

$conn = new mysqli($servername,$username,$password,$dname);

if($conn->connect_error){
    die("Connection Failed:" . $conn->connect_error);
} else {
    echo "Connection Successfully";
}

?>