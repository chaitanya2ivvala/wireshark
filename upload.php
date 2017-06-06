<?php
	ob_start();
	session_start();
	require_once 'connect.php';
	
	// if session is not set this will redirect to login page
	if( !isset($_SESSION['user']) ) {
		header("Location: index.php");
		exit;
	}
	// select loggedin users detail
	$res=mysql_query("SELECT * FROM users WHERE id=".$_SESSION['user']);
	$userRow=mysql_fetch_array($res);
include_once 'connect.php';
if(isset($_POST['btn-upload']))
{    
	$file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
	$file_size = $_FILES['file']['size'];
	$file_type = $_FILES['file']['type'];
	$folder="uploads/";     

	

	
	
	// new file size in KB
	$new_size = $file_size/1024;  
	// new file size in KB
	
	// make file name in lower case
	$new_file_name = strtolower($file);
	// make file name in lower case
	
	$final_file=str_replace(' ','-',$new_file_name);
	$userId=$_SESSION['user'];
	
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
	if(move_uploaded_file($file_loc,$folder.$final_file))
	{
						$to      = $user_to_email; // Send email to our user
                $subject = ' message from '  .$user_form_username. ' ' ; // Give the email a subject 
                $message1 = ''
 
                  .$message. ' click this link to see the message:
https://localhost/wireshark/ '
 
; // Our message above including the link// Our message above including the link
                     
$headers = 'From:wireshark07@gmail.com' . "\r\n"; // Set from headers
mail($to, $subject, $message1, $headers); // Send our email

		$sql="INSERT INTO files(sender,reciver,chatid,ip,time,file,type,size,file_read) VALUES('$user_form','$user_to','$conversation_id','$ip','$time','$final_file','$file_type','$new_size','0')";
		
		
		mysql_query($sql);
		?>
		<script>
		alert('successfully uploaded');
        window.location.href='sentfile.php';
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('error while uploading file');
        window.location.href='chat.php';
        </script>
		<?php
	}
				}
				else {
					if(move_uploaded_file($file_loc,$folder.$final_file))
	{
	$sql="INSERT INTO files(sender,reciver,chatid,ip,time,file,type,size,file_read) VALUES('$user_form','$user_to','$conversation_id','$ip','$time','$final_file','$file_type','$new_size','1')";
		
		
		mysql_query($sql);
		?>
		<script>
		alert('successfully sent file');
        window.location.href='sentfile.php';
        </script>
		<?php	
	}else
	{
		?>
		<script>
		alert('sent file fail');
        window.location.href='sentfile.php';
        </script>
		<?php
	}
					
					
				}
}
?>