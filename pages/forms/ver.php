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
$location = mysqli_real_escape_string($conn, $_REQUEST['location']);
$emp = mysqli_real_escape_string($conn, $_REQUEST['emp']);
$size = mysqli_real_escape_string($conn, $_REQUEST['size']);


$sql1 = "SELECT TYPE FROM BUSINESS WHERE BUSSID='$name'";
$result = mysqli_query($conn,$sql1);
$row = mysqli_fetch_array($result);

$sql2 = "SELECT * FROM BUSSTYPE WHERE BUSSTYPE='$row[0]' ";
$result1 = mysqli_query($conn,$sql2);
$row1 = mysqli_fetch_array($result1);

$tax = (($location.'.'.$emp.''.$size)*1000)+$row1[2];
$formated_tax = number_format((float)$tax,2,'.','');

$sql = "UPDATE BUSINESS SET STAGE='3',NOEMP='$emp',AREA='$size',REGION='$location',TAX='$formated_tax' WHERE BUSSID='$name'";

if ($conn->query($sql) === TRUE) {
# code...

echo '<script type="text/javascript">
                swal({
                            title: "Revenue Collection System!",
                            text: "Successful Validation",
                            icon: "success",
                            button: "Okay"}).then(function(){
                               window.location="/Revenue/pages/tables/data.php";
                               });
               
                </script>';


}else{

echo '<script type="text/javascript">
                swal({
                            title: "Revenue Collection System!",
                            text: "Unsuccessfull Validation",
                            icon: "success",
                            button: "Okay"}).then(function(){
                               window.location="/Revenue/pages/forms/verification.php";
                               });
               
                </script>';

}
# code...

		


$conn->close();
?>


</body>
</html>