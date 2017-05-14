<?php

	session_start();
require_once 'connect.php';
$tm=date("Y-m-d H:i:s");
				
				$query = "UPDATE users SET status='0',checkout='$tm' where id={$_SESSION['user']}";
                mysql_query($query);
unset($_SESSION['user']);
session_destroy();


header("Location: index.php");
exit;
?>