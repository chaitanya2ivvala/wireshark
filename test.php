<?php
    //connect to the database
    require_once("connect.php");
    session_start();
    // if session is not set this will redirect to login page
	if( !isset($_SESSION['user']) ) {
		header("Location: index.php");
		exit;
	}
	// select loggedin users detail
	$res=mysql_query("SELECT * FROM users WHERE id=".$_SESSION['user']);
if(isset($_POST['reply'])){
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
		
	
		echo $user_form;
		echo $user_to;
		
 
        //insert into `messages`
        $q = mysql_query("INSERT INTO 'messages' (sender,reciver,chatid,ip,time,message) VALUES ('$user_form','$user_to','$conversation_id','$ip','$time','$message')");
        if($q){
            echo "Posted";
        }else{
            echo "Error";
        }
    }
	?>
<!DOCTYPE html>
<html>
<head>
    <title>Wireshark Messanger</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	
   
	
	
</head>
<body>
    
     
    <div class="message-body">
        <div class="message-left">
            <ul>
                <?php
                    //show all the users expect me
					$userid=$_SESSION['user'];
                    $q = mysql_query("SELECT * FROM users WHERE id !=".$_SESSION['user']);
                    //display all the results
                    while($row = mysql_fetch_array($q)){
						
					echo "<a href='test.php?id={$row['id']}'><li> {$row['username']}</li></a>";
						
                    }
                ?>
            </ul>
        </div>
 
        <div class="message-right">
            <!-- display message -->
            <div class="display-message">
            <?php
                //check $_GET&#91;'id'&#93; is set
                if(isset($_GET)){
					
                     $user_two = trim(mysql_real_escape_string($_GET['id'],$conn ));
					 
                    //check $user_two is valid
                    $q = mysql_query("SELECT `id` FROM `users` WHERE id='$user_two' AND id!='$userid'");
                    //valid $user_two
                    if(mysql_num_rows($q) == 1){
                        //check $user_id and $user_two has conversation or not if no start one
                        $conver = mysql_query("SELECT * FROM `chat` WHERE (user1='$userid' AND user2='$user_two') OR (user1='$user_two' AND user2='$userid')");
 
                        //they have a conversation
                        if(mysql_num_rows($conver) == 1){
                            //fetch the converstaion id
							 
                            $fetch = mysql_fetch_assoc($conver);
                            $conversation_id = $fetch['id'] ;
							
                        }else{ //they do not have a conversation
                            //start a new converstaion and fetch its id
                            $query = "INSERT INTO chat (user1,user2) VALUES ('$userid','$user_two')";
			                $res = mysql_query($query);
                        }
                    }
                }else {
                    die("Click On the Person to start Chating.");
                }
            ?>
            </div>
            <!-- /display message -->
 
            <!-- send message -->
			 <form action="test.php" method='post'>
            <div class="send-message">
                <!-- store conversation_id, user_from, user_to so that we can send send this values to post_message_ajax.php -->
                <input type="hidden" name="conversation_id" id="conversation_id" value="<?php echo base64_encode($conversation_id); ?>">
                <input type="hidden" name="user_form" id="user_form" value="<?php echo base64_encode($userid); ?>">
                <input type="hidden" name="user_to" id="user_to" value="<?php echo base64_encode($user_two); ?>">
                <div class="form-group">
                    <textarea class="form-control" name="message" id="message" placeholder="Enter Your Message"></textarea>
                </div>
                <button class="btn btn-primary" type="submit" name='reply' id="reply">Reply</button> 
                <span id="error"></span>
				</form>
            </div>
            <!-- / send message -->
        </div>
        </div>
    	  
          

</body>
</html>