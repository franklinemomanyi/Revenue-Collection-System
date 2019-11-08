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

if (isset($_POST['busstype'])) {
	# code...
	$one = mysqli_real_escape_string($conn, $_REQUEST['one']);
	$two = mysqli_real_escape_string($conn, $_REQUEST['two']);

	$sql = "INSERT INTO BUSSTYPE (BUSSTYPE,RATES)
	VALUES ('$one','$two')";
		
	if ($conn->query($sql) === TRUE) {

		# code...
		echo '<script type="text/javascript">
                swal({
                            title: "Revenue Collection System",
                            text: "Business Type Successfully Added!",
                            icon: "success",
                            button: "Okay"}).then(function(){
                               window.location="/Revenue/pages/forms/add.php";
                               });
               
                </script>';
	}
	
}elseif (isset($_POST['area'])) {
	# code...
	$one = mysqli_real_escape_string($conn, $_REQUEST['one']);
	$two = mysqli_real_escape_string($conn, $_REQUEST['two']);

	$sql = "INSERT INTO AREA (AREA,RATES)
	VALUES ('$one','$two')";
		
	if ($conn->query($sql) === TRUE) {
	
		# code...
		echo '<script type="text/javascript">
                swal({
                            title: "Revenue Collection System",
                            text: "Area Successfully Added!",
                            icon: "success",
                            button: "Okay"}).then(function(){
                               window.location="/Revenue/pages/forms/add.php";
                               });
               
                </script>';
	}

}elseif (isset($_POST['emp'])) {
	# code...
	$one = mysqli_real_escape_string($conn, $_REQUEST['one']);
	$two = mysqli_real_escape_string($conn, $_REQUEST['two']);

	$sql = "INSERT INTO NOEMP (NOEMP,RATES)
	VALUES ('$one','$two')";
		
	if ($conn->query($sql) === TRUE) {
		
		# code...
		echo '<script type="text/javascript">
                swal({
                            title: "Revenue Collection System",
                            text: "No.Emp Successfully Added!",
                            icon: "success",
                            button: "Okay"}).then(function(){
                               window.location="/Revenue/pages/forms/add.php";
                               });
               
                </script>';
	}

}else{
	echo "Invalid";
}


$conn->close();
?>

</body>
</html>
