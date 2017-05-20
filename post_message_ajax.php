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
 
        //insert into `messages`
		$query="INSERT INTO messages (sender,reciver,chatid,ip,time,message) VALUES ('$user_form','$user_to','$conversation_id','$ip','$time','$message')";
       $res = mysql_query($query);
        if($res){
            echo "Posted";
        }else{
            echo "Error";
        }
    }
?>