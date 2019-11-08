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
session_start();
  include('connect.php');

   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $mail = mysqli_real_escape_string($conn,$_POST['mail']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['Password']);     
      $sql = "SELECT * FROM USER WHERE EMAIL = '$mail'";
      $result = mysqli_query($conn,$sql);
      


      if (mysqli_num_rows($result)>0) {
         while ($row=mysqli_fetch_array($result)) {
           if ($row[7]=='0') {
             # code...
             if (password_verify($mypassword,$row[5])) {
                if (!empty( $_SESSION['pass'])) {
                  session_destroy();
                }
                
                $rand=rand();
                $_SESSION['pass']=$rand;
                $_SESSION['user']=$mail;
                $_SESSION['idnum']=$row[3];
                $_SESSION['phone']=$row[2];
                $_SESSION['name']=$row[1];
                $_SESSION['ID']=$row[0];
                $_SESSION['domain']=$row[6];
                $welcome='Welcome ';

               
                echo '<script type="text/javascript">
                swal({
                            title: "Revenue Collection System!",
                            text: "'.$welcome.$_SESSION['name'].'",
                            icon: "success",
                            button: "Okay"}).then(function(){
                               window.location="/Revenue/index.php";
                               });
               
                </script>';

               
              }else{
                echo '<script type="text/javascript">
                swal({
                            title: "Invalid Password!",
                            text: "Please enter the right Password!",
                            icon: "info",
                            button: "Okay"}).then(function(){
                               window.location="/Revenue/pages/examples/login.html";
                               });
               
                </script>';
            }
           }else{
               
                echo '<script type="text/javascript">
                swal({
                            title: "Account Suspended!",
                            text: "Please contact your Administrator!",
                            icon: "error",
                            button: "Okay"}).then(function(){
                               window.location="/Revenue/pages/examples/login.html";
                               });
               
                </script>';
           }
          }
         
     }else{
     	
        
         echo '<script type="text/javascript">
                swal({
                            title: "User does not exist!",
                            text: "Please register to use the System!",
                            icon: "error",
                            button: "Okay"}).then(function(){
                               window.location="/Revenue/pages/examples/login.html";
                               });
               
                </script>';


       
   }
 }

?>

</body>
</html>