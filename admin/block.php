<?php
ob_start();
	session_start();
	require_once 'connect.php';
	
	
	$id=$_GET["id"];
	
	$query = "UPDATE users SET block='1' where id=$id";
                mysql_query($query);
				header("Location: home.php");
	?>
		
	 