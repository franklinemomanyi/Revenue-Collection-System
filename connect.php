<?php

$servername = "localhost";
$username = "root";
$password = "onyonka97";
$dbname = "revenue";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


?>

<link rel="shortcut icon" href="../../dist/img/icon.png" type="image/x-icon">