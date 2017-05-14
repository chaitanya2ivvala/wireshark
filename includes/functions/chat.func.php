<?php
function get_message() {
	$query="SELECT 'Sender','message' FROM chat.chat1 ORDER BY 'Msg_ID' DESC ";
	$run=mysql_query($query);
	$messages=array();
	while($message=mysql_fetch_assoc($run)){
		
		$messages[]=array('sender'=>$message['sender'],'message'=>$message['message']);
	}
	/*if ($run == 1) {
		# calculating online status
	if (time() - $sender['status'] <= (2*60)) { // 120 seconds = 2 minutes timeout
		$status = "Online";
	} else {
		$status = "Offline";
	}
	}*/
 
	return $messages;
}
function send_message($Sender, $message){
	
	if (!empty($Sender) && !empty($message)){
	   $Sender = mysql_real_escape_string($Sender);
       $message=mysql_real_escape_string($message);
	$query="INSERT INTO chat.chat1 VALUES (null,'{$Sender}','$message')" ;
       if($run=mysql_query($query)){
		   
		   return true;
		   
	   }	else {
		   return false;
	   }   
	}
	    else {
		
		return false;
	    }
	
}



?>

 