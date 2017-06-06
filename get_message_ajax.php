<?php
   include_once 'connect.php';
    include 'timeago.php';
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
				$read = $m['msg_read'];
				$timeago=get_timeago(strtotime($time));

									
 
                //get name and image of $user_form from `user` table
                $user = mysql_query( "SELECT * FROM `users` WHERE id='$user_form'");
                $user_fetch = mysql_fetch_assoc($user);
                $user_form_username = $user_fetch['username'];
				
                
               
 if($read == 0){
                //display the message
                ?>
                            <div class='message'>
                                
                                <div class='text-con'>
                                    <a href='#'><?php echo "{$user_form_username}"?></a>  <span><?php echo "{$timeago}"?></span> <span class="glyphicon glyphicon-remove"></span>
									<p><?php echo "{$message}" ?></p> 
								
                                </div>
                            </div>
                            <hr>
							<?php
 }else{
	 
	 //display the message
                ?>
                            <div class='message'>
                                
                                <div class='text-con'>
                                    <a href='#'><?php echo "{$user_form_username}"?></a>  <span><?php echo "{$timeago}"?></span> <span class="glyphicon glyphicon-ok"></span>
									<p><?php echo "{$message}" ?></p> 
								
                                </div>
                            </div>
                            <hr>
							<?php
 }
 
            }
        }else{
            echo "No Messages";
        }
    }
 
?>