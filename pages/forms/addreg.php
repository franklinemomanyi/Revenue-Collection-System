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

 require('../../conn.php');

$name = mysqli_real_escape_string($conn, $_REQUEST['name']);
$desc = mysqli_real_escape_string($conn, $_REQUEST['desc']);
$rates = mysqli_real_escape_string($conn, $_REQUEST['rates']);



$sql = "INSERT INTO REGION (REGION,MORE,RATES)
VALUES ('$name','$desc','$rates')";



if ($conn->query($sql) === TRUE) {

	echo '<script type="text/javascript">
                swal({
                            title: "Revenue Collection System",
                            text: "Region Successfully Added!",
                            icon: "success",
                            button: "Okay"}).then(function(){
                               window.location="/Revenue/pages/examples/viewregion.php";
                               });
               
                </script>';

}else{

	echo '<script type="text/javascript">
                swal({
                            title: "Revenue Collection System",
                            text: "Server Error!",
                            icon: "error",
                            button: "Okay"}).then(function(){
                               window.location="/Revenue/pages/forms/addregion.php";
                               });
               
                </script>';
}
		

$conn->close();
?>


</body>
</html>
