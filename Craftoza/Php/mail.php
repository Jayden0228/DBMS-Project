<?php
   // session_start();
   $to = "{$_SESSION['FEmail']}";
   $subject = "OTP Verification";
   
   $message = "Your OTP is {$_SESSION['otp']}";
   $message .= "\nPlease dont share it with anyone";
   $message .= "\n\nOnly valid for 5 minutes";
   
   $header = "From:enquirycraftoza@gmail.com \r\n";
   $header .= "Cc:craftoza@craft.com \r\n";
   
   $retval = mail ($to,$subject,$message,$header);
   
   // if( $retval == true ) {
   //    echo "Message sent successfully...";
   // }else {
   //    echo "Message could not be sent...";
   // }
?>