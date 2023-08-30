<?php
require('../../conn.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <?php
     require('../../sweetalert.php');
  ?>
</head>
<body class="hold-transition sidebar-mini layout-navbar-fixed sidebar-collapse">
<?php
    $pnumber=$_POST['pnumber'];
    $message=$_POST['message'];

    
    $sql="SELECT NAME FROM USER WHERE PHONE='$pnumber'";
    $results=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($results);

    date_default_timezone_set('Africa/Nairobi');
    $time = date('Y-m-d H:i');


    $url = 'https://quicksms.advantasms.com/api/services/sendsms/';
    $curl = curl_init();
    $sms = $message;
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json')); //setting custom header
    $curl_post_data = array(
            //Fill in the request parameters with valid values
            'partnerID' =>356,
            'apikey' => 'xxxxxxxxxxxxxxxxx',
            'mobile' => '254'.$pnumber,
            'message' => $sms,
            'shortcode' => 'INFOTEXT',
            'pass_type' => 'plain', //bm5 {base64 encode} or pla
    );
  
    $data_string = json_encode($curl_post_data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
  
    $curl_response = curl_exec($curl);
    $obj = json_decode($curl_response, true);
    $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);


    $sql1="INSERT INTO SMS(NAME,PHONE,MESSAGE,SENDTIME) VALUES('$row[0]','$pnumber','$message','$time')";
    $results1=mysqli_query($conn,$sql1);

    if ($results1==TRUE) {
      # code...
      echo '<script type="text/javascript">
              swal({
                          title: "Revenue Collection system",
                          text: "Message successfully sent!",
                          icon: "success",
                          button: "Okay"}).then(function(){
                             window.location="/Revenue/pages/mailbox/sms.php";
                             });
             
              </script>';
    }
      
?>

</body>
</html>
