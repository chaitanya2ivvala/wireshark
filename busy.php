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
	
				$query = "UPDATE users SET status='3' where id={$_SESSION['user']}";
                mysql_query($query);
				header("Location: chat.php");
?>