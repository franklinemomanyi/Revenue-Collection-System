
<?php
require('../../connect.php');

	$querry="SELECT * FROM MARKERS";
    $result=mysqli_query($conn,$querry);
    $row=mysqli_fetch_all($result,MYSQLI_ASSOC);

    header('Content-Type: application/json');
    echo json_encode($row,JSON_PRETTY_PRINT);
			
?>