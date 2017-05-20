<?php
   include_once 'connect.php';
    if(isset($_GET['c_id'])){
        //get the conversation id and
        $conversation_id = base64_decode($_GET['c_id']);
        //fetch all the messages of $user_id(loggedin user) and $user_two from their conversation
        $q = mysql_query("SELECT * FROM `messages` WHERE chatid='$conversation_id'");
        //check their are any messages
        if(mysql_num_rows($q) > 0){
            while ($m = mysql_fetch_assoc($q)) {
                //format the message and display it to the user
                $user_form = $m['sender'];
                $user_to = $m['reciver'];
                $message = $m['message'];
				$time = $m['time'];
 
                //get name and image of $user_form from `user` table
                $user = mysql_query( "SELECT * FROM `users` WHERE id='$user_form'");
                $user_fetch = mysql_fetch_assoc($user);
                $user_form_username = $user_fetch['username'];
			
                
               
 
                //display the message
                echo "
                            <div class='message'>
                                
                                <div class='text-con'>
                                    <a href='#'>{$user_form_username}</a>
                                    <h4>{$message}</h4>
									 <p>{$time}</p>
                                </div>
                            </div>
                            <hr>";
 
            }
        }else{
            echo "No Messages";
        }
			
					
				
    }
 
?>