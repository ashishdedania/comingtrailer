<html>
   
   <head>
      <title>Sending HTML email using PHP</title>
   </head>
   
   <body>
      
      <?php
	  $to = "joshi.yogi005@gmail.com";
	  $msg = "<b>Your Order is confirm. We will get back to you soon</b>";
	  send_notification($to, $msg);
	  
	  function send_notification($to, $msg) {
         /*$to = "joshi.yogi005@gmail.com";*/
         $subject = "Melocity order confirmation";
         
         $message = $msg;
        /* $message .= "<h1>This is headline.</h1>";*/
         
         $header = "From:cominlvi@comingtrailer.com \r\n";
        /* $header .= "Cc:afgh@somedomain.com \r\n";*/
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
           echo "Message sent successfully...";
         }else {
           echo "Message could not be sent...";
         }
		 
	}
      ?>
      
   </body>
</html>