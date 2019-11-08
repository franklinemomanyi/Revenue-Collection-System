<?php 

 include('phpqrcode/qrlib.php'); 
 $text='/Revenue/pages/examples/login.html';
 $folder="images/";
 $file_name="qr.png";
 $file_name=$folder.$file_name;
 $ecc='L';
 $pixel_size=6;
 $frame_size=5;
 QRcode::png($text,$file_name,$ecc,$pixel_size,$frame_size);
 echo"<img src='images/qr.png'>";
 
?>