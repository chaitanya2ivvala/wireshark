<?php
   include_once 'connect.php';
    //post message
    if(isset($_POST['message'])){
        $message = mysql_real_escape_string($_POST['message'],$conn);
        $conversation_id = mysql_real_escape_string($_POST['conversation_id'],$conn);
        $user_form = mysql_real_escape_string($_POST['user_form'],$conn);
        $user_to = mysql_real_escape_string($_POST['user_to'],$conn);
 
        //decrypt the conversation_id,user_from,user_to
        $conversation_id = base64_decode($conversation_id);
        $user_form = base64_decode($user_form);
        $user_to = base64_decode($user_to);
		$ip=$_SERVER['REMOTE_ADDR'];
		
		$time=date("Y-m-d H:i:s");
		
		
  //get name and image of $user_form from `user` table
                $user = mysql_query( "SELECT * FROM `users` WHERE id='$user_to'");
                $user_fetch = mysql_fetch_assoc($user);
                $user_to_username = $user_fetch['username'];
				$user_to_email = $user_fetch['email'];
				$user_to_status = $user_fetch['status'];
				
				  $userform = mysql_query( "SELECT * FROM `users` WHERE id='$user_form'");
                $userform_fetch = mysql_fetch_assoc($userform);
                $user_form_username = $userform_fetch['username'];
				$user_form_email = $userform_fetch['email'];
				$user_form_status = $userform_fetch['status'];
			
			
				
				
				if($user_to_status == 0 || $user_to_status == 3 ){
				$to      = $user_to_email; // Send email to our user
                $subject = ' message from '  .$user_form_username. ' ' ; // Give the email a subject 
                $message1 = ''
 
                  .$message. ' click this link to see the message:
https://localhost/wireshark/ '
 
; // Our message above including the link// Our message above including the link
                     
$headers = 'From:wireshark07@gmail.com' . "\r\n"; // Set from headers
mail($to, $subject, $message1, $headers); // Send our email
				
        //insert into `messages`
		$query="INSERT INTO messages (sender,reciver,chatid,ip,time,message,msg_read) VALUES ('$user_form','$user_to','$conversation_id','$ip','$time','$message','0')";
       $res = mysql_query($query);
	   }
	   else{
		   
		$query="INSERT INTO messages (sender,reciver,chatid,ip,time,message,msg_read) VALUES ('$user_form','$user_to','$conversation_id','$ip','$time','$message','1')";
       $res = mysql_query($query);   
	   }
        if($res){
            echo "Posted";
        }else{
            echo "Error";
        }
    }
?>