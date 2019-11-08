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
$account=$_GET['account'];
$amount=$_GET['amount'];

require('../../conn.php');

$approve="UPDATE BUSINESS SET STAGE=4,STATUS=1 WHERE ACCOUNT='$account'";

$querry="SELECT * FROM TBLPAYMENTS WHERE account='$account' AND amount>='$amount'";

$confirm=mysqli_query($conn,$querry);
$row=mysqli_fetch_array($confirm);



if (mysqli_num_rows($confirm)>=1) {
	if (mysqli_query($conn,$approve)) {


		echo '<script type="text/javascript">
                swal({
                            title: "Revenue Collection System!",
                            text: "Successfull Payment!",
                            icon: "success",
                            button: "Okay"}).then(function(){
                               window.location="/Revenue/pages/examples/payments.php";
                               });
               
                </script>';

	
	}else{
		echo "Wrong Querry";
	}
?>

<?php
}else{


echo '<script type="text/javascript">
                swal({
                            title: "Revenue Collection System!",
                            text: "Payment not received!",
                            icon: "error",
                            button: "Okay"}).then(function(){
                               window.location="/Revenue/pages/examples/invoice.php";
                               });
               
                </script>';

}


?>


</body>
</html>







