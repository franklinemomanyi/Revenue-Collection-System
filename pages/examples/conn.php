<?php
 
require '../../web_accesibility.php';
$servername = "localhost";
$username = "root";
$password = "xxxxxxxxxxxxxxxx";
$dbname = "revenue";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

session_start();
if (!$_SESSION['pass']) {
header("Location: /Revenue/pages/examples/login.html");
}else{
// echo "CREATED";
}

?>
