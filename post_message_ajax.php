<?php
    require_once("connect.php");
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
 
        //insert into `messages`
        $q = mysql_query("INSERT INTO `messages` VALUES ('','$user_form','$user_to','$conversation_id','$message')");
        if($q){
            echo "Posted";
        }else{
            echo "Error";
        }
    }
?>