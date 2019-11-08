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

$name = mysqli_real_escape_string($conn, $_REQUEST['name']);
$number = mysqli_real_escape_string($conn, $_REQUEST['number']);
$idnum = mysqli_real_escape_string($conn, $_REQUEST['idnum']);
$mail = mysqli_real_escape_string($conn, $_REQUEST['mail']);
$password = mysqli_real_escape_string($conn, $_REQUEST['password']);
$passwordc = mysqli_real_escape_string($conn, $_REQUEST['passwordc']);
$Npassword = password_hash($password,PASSWORD_DEFAULT);



$sql = "INSERT INTO USER (NAME,PHONE,IDNUM,EMAIL,PASSWORD,DOMAIN,STATUS)
VALUES ('$name','$number','$idnum','$mail','$Npassword','2','0')";

$sql1 = "SELECT PHONE,EMAIL,IDNUM FROM user WHERE PHONE='$number' OR EMAIL='$mail' OR IDNUM='$idnum'";
$result = mysqli_query($conn,$sql1);
$row = mysqli_fetch_array($result,MYSQLI_NUM);

if ($row[0]!=$number) {
	if ($row[1]!=$mail) {
		if ($row[2]!=$idnum) {
			# code...
			if ($password==$passwordc) {
			# code...
			if ($conn->query($sql) === TRUE) {
			# code...
			echo '<script type="text/javascript">
                swal({
                            title: "Revenue Collection System!",
                            text: "Successfully Registered",
                            icon: "success",
                            button: "Okay"}).then(function(){
                               window.location="/Revenue/pages/examples/login.html";
                               });
               
                </script>';   

		}else{

			echo '<script type="text/javascript">
                swal({
                            title: "Revenue Collection System!",
                            text: "Server Error",
                            icon: "error",
                            button: "Okay"}).then(function(){
                               window.location="/Revenue/pages/examples/register.html";
                               });
               
                </script>';   
		}
		# code...
		}else{


		    echo '<script type="text/javascript">
                swal({
                            title: "Revenue Collection System!",
                            text: "Passwords dont match",
                            icon: "error",
                            button: "Okay"}).then(function(){
                               window.location="/Revenue/pages/examples/register.html";
                               });
               
                </script>';
		}
		}else{
			
		    echo '<script type="text/javascript">
                swal({
                            title: "Revenue Collection System!",
                            text: "ID Number already used",
                            icon: "error",
                            button: "Okay"}).then(function(){
                               window.location="/Revenue/pages/examples/register.html";
                               });
               
                </script>';
		}
		
	}else{
		

	     echo '<script type="text/javascript">
                swal({
                            title: "Revenue Collection System!",
                            text: "Email address already used",
                            icon: "error",
                            button: "Okay"}).then(function(){
                               window.location="/Revenue/pages/examples/register.html";
                               });
               
                </script>';


	}
	# code...
}else{
	

    echo '<script type="text/javascript">
                swal({
                            title: "Revenue Collection System!",
                            text: "Phone Number already used",
                            icon: "error",
                            button: "Okay"}).then(function(){
                               window.location="/Revenue/pages/examples/register.html";
                               });
               
                </script>';
}

$conn->close();
?>

</body>
</html>


