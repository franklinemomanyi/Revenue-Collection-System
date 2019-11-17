<?php

require 'web_accesibility.php';
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

<link rel="shortcut icon" href="../../dist/img/icon.png" type="image/x-icon">

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5dcb05be43be710e1d1cf70e/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

<!-- Start of ChatBox -->
<script type="text/javascript">
var _userway_config = {
account: 'EiPLo35ion'
};
</script>
<script type="text/javascript" src="https://cdn.userway.org/widget.js"></script>
<!-- End of Chatbox -->
