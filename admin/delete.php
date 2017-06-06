<?php
ob_start();
	session_start();
	require_once 'connect.php';
	
	
	$id=$_GET["id"];
	
	$query = "DELETE FROM messages WHERE sender=$id or reciver=$id";
	$result = mysql_query($query);
	$quer = "DELETE FROM chat WHERE user1=$id or user2=$id";
	$resul = mysql_query($quer);
	$que = "DELETE FROM users WHERE id=$id";
	$resu = mysql_query($que);
	?>
		<script type="text/javascript">
		
           window.location="home.php";
		</script>
	 