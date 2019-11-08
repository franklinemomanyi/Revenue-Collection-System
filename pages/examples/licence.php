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
    $idnum=$_GET['idnum'];
    $amount=$_GET['amount'];
    require('../../conn.php');
    $sql="SELECT TAX FROM BUSINESS WHERE ACCOUNT='$idnum'";
    $results=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($results);
    if ($amount>=$row[0]) {
      # code...
      include('free.php');
    }else{
      
      echo '<script type="text/javascript">
                swal({
                            title: "Revenue Collection system",
                            text: "Cannot generate Permit: Insufficient Payments!",
                            icon: "error",
                            button: "Okay"}).then(function(){
                               window.location="/Revenue/pages/examples/payments.php";
                               });
               
                </script>';
    }
?>

</body>
</html>