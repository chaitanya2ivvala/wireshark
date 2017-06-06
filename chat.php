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
	$userRow=mysql_fetch_array($res);
?>
<!DOCTYPE html>
<html>
<head>
    <title>WIRESHARK MESSENGER</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	
   
	
	
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">WIRESHARK MESSENGER</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
   
     
      <ul class="nav navbar-nav navbar-right">
	  <li class = "active"><a href="chat.php">Messages</a></li>
	  <li><a href="sentfile.php">Sent files</a></li>
	  <li><a href="recivefile.php">Recived files</a></li>
       <?php
								if ($userRow['status']==1){
						?>
						<span class="label label-success">online</span>
						<?php
					}
					
					else if ($userRow['status']==2) {
						?>
						<span class="label label-info">available</span>
						<?php
					}
					else if ($userRow['status']==3) {
						?>
						<span class="label label-warning">busy</span>
						<?php
					}
						
                    
                ?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $userRow['username']; ?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="logout.php">logout</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="available.php">Available</a></li>
			<li><a href="busy.php">Busy</a></li>
			<li><a href="online.php">online</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
     
    <div class="message-body">
        <div class="message-left">
		 <div class='navbar navbar-inverse'>
								
								<a href='#' class="navbar-brand">Address Book</a>
								  
								
				
				
					</div>			
            <ul>
                <?php
                    //show all the users expect me
					$userid=$_SESSION['user'];
                    $q = mysql_query("SELECT * FROM users WHERE id !=".$_SESSION['user']);
                    //display all the results
                    while($row = mysql_fetch_array($q)){
						
					echo "<a href='chat.php?id={$row['id']}'><li> {$row['username']}</li></a>";
					if ($row['status']==1){
						?>
						<span class="label label-success">online</span>
						<?php
					}
					else if ($row['status']==0) {
						?>
						<span class="label label-danger">offline</span>
						<?php
					}
					else if ($row['status']==2) {
						?>
						<span class="label label-info">available</span>
						<?php
					}
					else if ($row['status']==3) {
						?>
						<span class="label label-warning">busy</span>
						<?php
					}
					echo "<hr>";	
                    }
                ?>
            </ul>
        </div>
 
        <div class="message-right">
            <!-- display message -->
			<div class='head-con'>
								<?php
									$userto = mysql_query( "SELECT * FROM `users` WHERE id='$user_two'");
                $userto_fetch = mysql_fetch_assoc($userto);
                $user_to_username = $userto_fetch['username'];
				?>
								<a href='#'><?php echo "{$user_to_username}" ?></a>
								</div>
                              
            
			
            <?php
                //check $_GET['id']; is set
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
			  <div class='navbar navbar-inverse'>
								<?php
									$userto = mysql_query( "SELECT * FROM `users` WHERE id='$user_two'");
                $userto_fetch = mysql_fetch_assoc($userto);
                $user_to_username = $userto_fetch['username'];
				?>
								<a href='#' class="navbar-brand" ><?php echo "{$user_to_username}" ?></a>
								</div>
								
								<div class="display-message">
            </div>
			
            <!-- /display message -->
 
            <!-- send message -->
            <div class="send-message">
                <!-- store conversation_id, user_from, user_to so that we can send send this values to post_message_ajax.php -->
                <input type="hidden" id="conversation_id" value="<?php echo base64_encode($conversation_id); ?>">
                <input type="hidden" id="user_form" value="<?php echo base64_encode($userid); ?>">
                <input type="hidden" id="user_to" value="<?php echo base64_encode($user_two); ?>">
                <div class="form-group">
                    <textarea class="form-control" id="message" placeholder="Enter Your Message"></textarea>
                </div>
                <button class="btn btn-primary" id="reply">Reply</button> 
				<form action="upload.php" method="post" enctype="multipart/form-data">
				 <input type="hidden" name="conversation_id" value="<?php echo base64_encode($conversation_id); ?>">
                <input type="hidden" name="user_form" value="<?php echo base64_encode($userid); ?>">
                <input type="hidden" name="user_to" value="<?php echo base64_encode($user_two); ?>">
		        <input type="file" name="file" />
		        <button class="btn btn-default" type="submit" name="btn-upload">upload</button>
		
		</form>
				
  
                <span id="error"></span>
            </div>
            <!-- / send message -->
        </div>
        </div>
    	  
          

</body>
</html>