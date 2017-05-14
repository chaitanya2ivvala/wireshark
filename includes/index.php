<?php

require('core.inc.php');
 if(isset($_POST['send'])) 
 { if(send_message($_POST['sender'],$_POST['message'])) 
     { echo 'Message Sent.'; } 
 else { 
		    echo 'Message failed to send'; }
          }

?>
<!DOCTYPE html>
<head>
<!--Page Title-->
<title>Chat Apps</title>

<!--CSS Stylesheets-->
<link type="text/css" rel="stylesheet" href="public/css/main.css/>"

</head> 

<body>

      <lable> Enter Message:<input type="text" name="message" /></lable>
         <input type="submit" name="send" value="Send Message"/>
 </form> 
 </div><!--Input-->
 

<div id="messages">
<?php
  $messages=get_message();
  foreach($messages as $message){
	   
	   echo '<strong>' ,$message['sender'],'Sent</strong><br />';
	   echo $message['message'],'<br /><br/>';
	   
	   
	  
   }

?>

</div><!-- message -->
<div id="input">

 </body>
 </html>