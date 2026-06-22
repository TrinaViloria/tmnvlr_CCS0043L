<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "dog_database";

$conn = new mysqli($host, $user, $pass);

if($conn->connect_error){
    die("Connection Failed: " . $conn->connect_error);
}

if(!$conn->query("CREATE DATABASE IF NOT EXISTS `$dbname`")){
    die("Database setup failed: " . $conn->error);
}

$conn->select_db($dbname);

?>