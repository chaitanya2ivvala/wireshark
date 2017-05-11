<?php
function get_message() {
	$query="SELECT 'sender','message' FROM chat ORDER BY 'Message_ID' DESC ";
	$run=mysql_query($query);
	$messages=array();
	while($message=mysql_fetch_assoc($run)){
		
		$messages[]=array('sender'=>$message['sender'],'message'=>$message['message']);
	}
	return $messages;
}
function send_message($sender, $message){
	
	if (!empty($sender) && !empty($message)){
	   $sender = mysql_real_escape_string($sender);
       $message=mysql_real_escape_string($message);
       $query="INSERT INTO chat(sender,message) VALUES ('$sender','$message')" ;
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

 