<?php
error_reporting(E_ALL ^ E_DEPRECATED);

$con=mysql_connect('localhost','root','root')or die(mysql_error());
$db=mysql_select_db('chat',$con) or die(mysql_error());

?>