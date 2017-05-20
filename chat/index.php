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
  <form action="index.php" method="post">
    <lable>Enter Name:<input type="text" name="sender"/></lable>
      <lable> Enter Message:<input type="text" name="message" /></lable>
         <input type="submit" name="send" value="Send Message"/>
 </form> 
 </div><!--Input-->
 

<div id="messages">
<?php
  $res=mysql_query("SELECT * FROM chat");
	$userRow=mysql_fetch_array($res);
	 
	foreach($messages){
	echo $userRow['sender']; 
	?><br>
		<?php
	echo $userRow['message']; 
		
	}
	   
	  
   

?>

</div><!-- message -->
<div id="input">

 </body>
 </html>