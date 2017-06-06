
<?php
include_once 'connect.php';
?>
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
	$res=mysql_query("SELECT * FROM admin WHERE id=".$_SESSION['user']);
	$userRow=mysql_fetch_array($res);
?>
<!DOCTYPE html>
<html>
<head>
<title>Wireshark Admin</title>
<link rel="stylesheet" href="../css/bootstrap.css" type="text/css"  />

</head>
<body>
<div class='container'>
<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Wireshark Messanger</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
         
          <ul class="nav navbar-nav navbar-right">
             <li><a href="home.php">Dashboard</a></li>
            <li class ="active"><a href="userstats.php">Statistics</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			  <span class="glyphicon glyphicon-user"></span>&nbsp;Hi <?php echo $userRow['username']; ?>&nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav> 
</div>

<br>
<br>
<br>
<br>
<div class="col-md-2">
</div>
<div class="col-md-8">
<div class="table-responsive">
	<table class="table table-striped">
	<tr>
	<h3>User Statistics</h3>
	</tr>
<tr>
<td>
	 Total users
	 </td>
	 <td>
	 <?php  
$result = mysql_query("SELECT count(*) from users;");
echo mysql_result($result, 0);
?>
	 </td>
</tr>
<tr>
<td>
Online users
</td>
<td>
	 <?php  
$result = mysql_query("SELECT count(*) from users where status='1';");
echo mysql_result($result, 0);
?>
</td>
	</tr>
	<tr>
<td>
	Offline users
</td>
<td>
	 <?php  
$result = mysql_query("SELECT count(*) from users where status='0';");
echo mysql_result($result, 0);
?>
</td>
	</tr>
	<tr>
<td>
Available users
</td>
<td>
	 <?php  
$result = mysql_query("SELECT count(*) from users where status='2';");
echo mysql_result($result, 0);
?>
</td>
	</tr>
	<tr>
<td>
Busy users
</td>
<td>
	 <?php  
$result = mysql_query("SELECT count(*) from users where status='3';");
echo mysql_result($result, 0);
?>
</td>
	</tr>
	<tr>
<td>
Unactivated users
</td>
<td>
	 <?php  
$result = mysql_query("SELECT count(*) from users where activation='0';");
echo mysql_result($result, 0);
?>
</td>
	</tr>
	<tr>
<td>
Activated users
</td>
<td>
	 <?php  
$result = mysql_query("SELECT count(*) from users where activation='1';");
echo mysql_result($result, 0);
?>
</td>
	</tr>
	<tr>
<td>
	 Blocked users
</td>
<td>
	 <?php  
$result = mysql_query("SELECT count(*) from users where block='1';");
echo mysql_result($result, 0);
?>
</td>
	</tr>
	<tr>
<td>
	 Total Messages
</td>
<td>
	 <?php  
$result = mysql_query("SELECT count(*) from messages;");
echo mysql_result($result, 0);
?>
</td>
	</tr>
	<tr>
<td>
	 Offline mails 
</td>
<td>
	 <?php  
$result = mysql_query("SELECT count(*) from messages where msg_read='0';");
echo mysql_result($result, 0);
?>
</td>
	</tr>
	<tr>
<td>
	 Seen Messages
</td>
<td>
	 <?php  
$result = mysql_query("SELECT count(*) from messages where msg_read='1';");
echo mysql_result($result, 0);
?>
</td>
	</tr>
	<tr>
<td>
	 Unseen Messages
</td>
<td>
	 <?php  
$result = mysql_query("SELECT count(*) from messages where msg_read='0';");
echo mysql_result($result, 0);
?>
</td>
	</tr>
</table>

    
</div>
 
 </div>
 <div class="col-md-2">
</div>
 
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>
