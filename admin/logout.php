<?php

	session_start();
require_once 'connect.php';

				
				
unset($_SESSION['user']);
session_destroy();


header("Location: index.php");
exit;
?>