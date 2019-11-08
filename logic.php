<?php
$query="SELECT * FROM BUSSTYPE";
$result=mysqli_query($conn,$query);




function suspend()
{
//$frank=$row['0'];
include('connect.php');

$insert1='UPDATE BUSINESS SET STAGE="0" WHERE BUSSID="$bid"';
$result1=mysqli_query($conn,$insert1);

if ($result1===TRUE) {
# code...
echo '<script type="text/javascript">';
echo 'alert("Successful Suspension");';
echo '</script>';
}else{
echo "Momanyi";
}

}


?>


