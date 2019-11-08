<?php
   require('../../conn.php');
   require('../../sweetalert.php');
  ?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>


<?php

$name = mysqli_real_escape_string($conn, $_REQUEST['name']);
$pin = mysqli_real_escape_string($conn, $_REQUEST['pin']);
$type = mysqli_real_escape_string($conn, $_REQUEST['type']);
date_default_timezone_set("Africa/Nairobi");
$Timestamp = date('Y-m-d H:i');

if (isset($_POST['submit'])) {
	# code...
	if((isset($_FILES['file'])) && (isset($_FILES['file1']))){
      $errors= array();

      $file_name  = uniqid().$_FILES['file']['name'];
      $file_size  =$_FILES['file']['size'];
      $file_tmp   =$_FILES['file']['tmp_name'];
      $file_type  =$_FILES['file']['type'];

      $filename   = uniqid().$_FILES['file1']['name'];
      $filesize   =$_FILES['file1']['size'];
      $filetmp    =$_FILES['file1']['tmp_name'];
      $filetype   =$_FILES['file1']['type'];
    
      
      if(($file_size > 5097152) && ($filesize > 5097152)){
         $errors[]='File is above 5 MB';
      }
      
      if(empty($errors)==true){
         $id=$_SESSION['ID'];
      	$location="Documents/$file_name";
         $loc="Documents/$filename";
         $adm=$_SESSION['idnum'];
         
         $querry=mysqli_query($conn,"INSERT INTO BUSINESS(USERID,NAME,KRAPIN,KRACERT,KRACOMPLIANCE,TYPE,STAGE,NOEMP,AREA,REGION,STATUS,TIMESTAMP) VALUES('$id','$name','$pin','$location','$loc','$type','1','','','','','$Timestamp')");
         if ($querry===TRUE) {
            # code...
            $sql_update = "UPDATE BUSINESS SET `ACCOUNT` = CONCAT($adm,BUSSID) WHERE USERID = $id AND ACCOUNT ='';";

             if($querry=mysqli_query($conn,$sql_update) ==TRUE){
               move_uploaded_file($file_tmp,$location);
               move_uploaded_file($filetmp,$loc);
               echo '<script type="text/javascript">
                swal({
                            title: "Revenue Collection System!",
                            text: "Successful Application",
                            icon: "success",
                            button: "Okay"}).then(function(){
                               window.location="/Revenue/pages/tables/data.php";
                               });
               
                </script>';

             }
            
         }else{

            echo '<script type="text/javascript">
                swal({
                            title: "Revenue Collection System!",
                            text: "Server Error",
                            icon: "error",
                            button: "Okay"}).then(function(){
                               window.location="/Revenue/pages/forms/general.php";
                               });
               
                </script>';
         }
         
      }else{
         
         echo '<script type="text/javascript">
                swal({
                            title: "Revenue Collection System!",
                            text: "'.print_r($errors).'",
                            icon: "error",
                            button: "Okay"}).then(function(){
                               window.location="/Revenue/pages/forms/general.php";
                               });
               
                </script>';
      }
   }else{

      echo '<script type="text/javascript">
                swal({
                            title: "Revenue Collection System!",
                            text: "File not selected",
                            icon: "error",
                            button: "Okay"}).then(function(){
                               window.location="/Revenue/pages/forms/general.php";
                               });
               
                </script>';
   }
}else{
	echo "No Submit";
	# code...
}
	
?>


</body>
</html>