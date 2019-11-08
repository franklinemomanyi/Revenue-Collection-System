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

$mail = mysqli_real_escape_string($conn, $_REQUEST['email']);
$email = $mail;
$sql="SELECT * FROM USER WHERE EMAIL = '$mail'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result,MYSQLI_NUM);





if (mysqli_num_rows($result)==1) {

	#TOKEN
	date_default_timezone_set('Africa/Nairobi');
	$crttime = date('Y-m-d H:i');
	$exptime = date('Y-m-d H:i',strtotime('+1 hour',strtotime($crttime)));
	$rand = mt_rand(100000,999999);
	$sql1="INSERT INTO PASSRESET(EMAIL,TOKEN,CRTDATE,EXPDATE) VALUES('$mail','$rand','$crttime','$exptime')";
	
	#TOKEN


	require 'PHPMailer/PHPMailerAutoload.php';

	$mail = new PHPMailer;

	$mail->SMTPDebug = 0;                                 // Enable verbose debug output

	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com ';                      // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'revcollsystem@gmail.com';           // SMTP username
	$mail->Password = 'moi.1984';                         // SMTP password
	$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;                                    // TCP port to connect to

	$mail->setFrom('revcollsystem@gmail.com', $row[1]);
	$mail->addAddress($_POST['email']);                   // Add a recipient   cs.class.moi@gmail.com

	                                                      // Name is optional
	$mail->addReplyTo('revcollsystem@gmail.com');
	

	//$mail->addAttachment('/var/tmp/file.tar.gz');       // Add attachments
	//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');  // Optional name
	$mail->isHTML(true);                                  // Set email format to HTML
    
	$mail->Subject = 'PASSWORD RESET:';
	$mail->Body    = 'Click on this <a href="http://nelfixcomputers.co.ke/Revenue/pages/examples/newpassword.php?token='.$rand.'&& email='.$email.'">Link</a> to reset your password <br/>
	N/B: This Link is only Valid for one hour.<br/><br/><br/>Revenue Collection System.<br/>Department of Economics and Finance.<br/>XYZ County Government.';
	$mail->AltBody = '/Revenue/pages/examples/forgot.html';
    

	if(!$mail->send()) {
		echo '<script type="text/javascript">';
        echo 'alert("Message could not be sent.");';
        echo 'window.location="/Revenue/pages/examples/forgot.html";';
        echo '</script>';
	    echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {

        if (mysqli_query($conn,$sql1)) {
        	# code...
        	echo '<script type="text/javascript">';
	        echo 'alert("A Password Reset link has been sent to your email");';
	        echo 'window.location="/Revenue/pages/examples/login.html";';
	        echo '</script>';
        }
	   
	}

}else{
    echo '<script type="text/javascript">';
    echo 'alert("Please enter a valid email adress");';
    echo 'window.location="/Revenue/pages/examples/forgot.html";';
    echo '</script>';
}

?>


</body>
</html>


