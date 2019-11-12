<?php

require '../../web_accesibility.php';
$servername = "localhost";
$username = "root";
$password = "12345";
$dbname = "revenue2";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>