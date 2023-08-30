<?php
date_default_timezone_set("Africa/Nairobi");
$postData = file_get_contents('php://input');
$jsonData = json_decode($postData, true);          
                

// This uses a sample validation URL set with the "validate" query keyword e.g.
//https://example.com/callback?validate. You may change the logic or even separate the files into two different ones

if(array_key_exists("validate", $_GET))
{
    //this is a validation request...
    $transactionType = $jsonData["TransactionType"];
    $mpesaTransID = $jsonData["TransactionID"];
    $transactionTime = $jsonData["TransactionTime"];
    $amount = round(floatval($jsonData["TransactionAmount"]), 2);
    $shortcode = $jsonData["BusinessShortcode"];
    $accountRef = $jsonData["AccountReference"];
    $senderPhoneNumber = $jsonData["SenderMSISDN"];
    $senderFirstName = $jsonData["SenderFirstName"];
    $senderMiddleName = $jsonData["SenderMiddleName"];
    $senderLastName = $jsonData["SenderLastName"];
    $creditsRemaining = $jsonData["RemainingCredits"];
    
    $allowTransaction = true;
    
    //...do your validation here if any, and saving first to DB to have a record of it,
    //and if the transaction is not valid, set $allowTransaction to false
    
    if(!$allowTransaction)
    {
        //transaction was not allowed, cancel it
        http_response_code(400);
        die("Transaction refused");
        return;
    }
    
   
}
else
{
    //This is a confirmation request. Transaction was completed successfully, do save to DB or confirm what was saved to DB in validation step. That will be useful if by some chance validation is not enabled on MPesa
    
    $transactionType = $jsonData["TransactionType"];
    $mpesaTransID = $jsonData["TransactionID"];
    $transactionTime = $jsonData["TransactionTime"];
    $amount = round(floatval($jsonData["TransactionAmount"]), 2);
    $shortcode = $jsonData["BusinessShortcode"];
    $accountRef = $jsonData["AccountReference"];
    $senderPhoneNumber = $jsonData["SenderMSISDN"];
    $senderFirstName = $jsonData["SenderFirstName"];
    $senderMiddleName = $jsonData["SenderMiddleName"];
    $senderLastName = $jsonData["SenderLastName"];
    $creditsRemaining = $jsonData["RemainingCredits"];

//save to DB and other stuff
    if(file_put_contents('login_data.json', $jsonData))  
    {  
        // Create connection
         require 'connect.php';    
      
         
        
        // Check connection
        
             $sql = "INSERT INTO `TBLPAYMENTS` (`date_time`, `t_code`, `account`,`amount`, `phone_no`, `first_name`, `middle_name`, `last_name`) VALUES ('$transactionTime', '$mpesaTransID','$accountRef', '$amount', '$senderPhoneNumber', '$senderFirstName', '$senderMiddleName', '$senderLastName');";
       
    		 if ($conn->query($sql) === TRUE) {
    	         $url = 'https://quicksms.advantasms.com/api/services/sendsms/';
                  $curl = curl_init();
                  $sms = 'Dear '.$senderFirstName.' '.$senderLastName.', Your Payment of '.$amount.' for '.$accountRef.' has been succesfully received . All the best in your business. Tulipe Ushuru Tujitegemee ';
                  curl_setopt($curl, CURLOPT_URL, $url);
                  curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json')); //setting custom header
                  $curl_post_data = array(
                          //Fill in the request parameters with valid values
                         'partnerID' =>246,
                         'apikey' => 'xxxxxxxxxxxxxxxxx',
                         'mobile' => $senderPhoneNumber,
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
                //   $code= $httpcode;
                //   echo $code;
    	} else {
    	    echo "error";
    	}
        
        
    }      
}
?>
