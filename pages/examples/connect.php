<?php

require '../../web_accesibility.php';
$servername = "localhost";
$username = "root";
$password = "xxxxxxxxxxxxxx";
$dbname = "revenue2";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>
