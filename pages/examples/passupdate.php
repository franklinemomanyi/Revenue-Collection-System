<!DOCTYPE html>
<html>
<head>
  <title></title>
  <?php
     require('../../sweetalert.php');
  ?>
</head>
<body>

<?php

include('connect.php');

$email = mysqli_real_escape_string($conn, $_GET['email']);
$password = mysqli_real_escape_string($conn, $_REQUEST['Password']);
$NPassword = password_hash($password,PASSWORD_DEFAULT);
$password1 = mysqli_real_escape_string($conn, $_REQUEST['Password1']);


$sql = "UPDATE USER SET PASSWORD='$NPassword' WHERE EMAIL='$email'";


if ($password === $password1) {
	if ($conn->query($sql) === TRUE) {
		
			echo '<script type="text/javascript">
                swal({
                            title: "Revenue Collection System!",
                            text: "Password Successfully Updated",
                            icon: "success",
                            button: "Okay"}).then(function(){
                               window.location="http://www.nelfixcomputers.co.ke/Revenue/pages/examples/login.html";
                               });
               
                </script>';
		
	}else {
	   echo '<script type="text/javascript">
                swal({
                            title: "Revenue Collection System!",
                            text: "Server Error",
                            icon: "error",
                            button: "Okay"}).then(function(){
                               window.location="http://www.nelfixcomputers.co.ke/Revenue/pages/examples/login.html";
                               });
               
                </script>';
	}
}else{
	echo '<script type="text/javascript">
                swal({
                            title: "Revenue Collection System!",
                            text: "Passwords dont match",
                            icon: "error",
                            button: "Okay"}).then(function(){
                               window.location="http://www.nelfixcomputers.co.ke/Revenue/pages/examples/login.html";
                               });
               
                </script>';
}

$conn->close();
?>

</body>
</html>
