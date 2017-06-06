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
		   <li class ="active"><a href="home.php">Dashboard</a></li>
            <li><a href="userstats.php">Statistics</a></li>
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
	<td>Id</td>
    <td>Username</td>
    <td>Email</td>
    <td>Delete</td>
	<td>Block Status</td>
	</tr>
    <?php
	$userId=$_SESSION['user'];
	$sql="SELECT * FROM users ORDER BY id";
	$result_set=mysql_query($sql);
	while($row=mysql_fetch_array($result_set))
	{
		?>
			
        <tr>
		<td><?php echo $row['id'] ?></td>
        <td><?php echo $row['username'] ?></td>
        <td><?php echo $row['email'] ?></td>
        <td><a href="delete.php?id=<?php echo $row['id'];?>" target="_self">Delete</a></td>
		<?php
		if($row['block']==0){
			?>
			
		<td><a href="block.php?id=<?php echo $row['id']; ?>" target="_blank">block</a></td>
		<?php
		}
		else{
			
		?>
			
		<td><a href="unblock.php?id=<?php echo $row['id']; ?>" target="_blank">unblock</a></td>
		<?php	
		}
		?>
        </tr>
        <?php
	}
	?>
    </table>
    
</div>
 </div>
 <div class="col-md-2">
</div>
 
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>