<?php
$server="localhost";
$user="root";
$password="";
$dbname="carrodio";

$conn = new mysqli($server,$user,$password,$dbname);

if($conn->connect_error){
    die("Connection failed:".$conn->connect_error);
}else{
    // echo"Connected successfully";
}

?>