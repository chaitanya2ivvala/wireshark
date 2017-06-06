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
	$res=mysql_query("SELECT * FROM users WHERE id=".$_SESSION['user']);
	$userRow=mysql_fetch_array($res);
?>
<!DOCTYPE html>
<html>
<head>
<title>Wireshark Messanger</title>
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"  />

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
	  <li><a href="chat.php">Messages</a></li>
	  <li><a href="sentfile.php">Sent files</a></li>
	  <li  class = "active"><a href="recivefile.php">Received files</a></li>
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



	<div class="table-responsive">
	<table class="table table-striped">

    <tr>
     <td>File Name</td>
	 <td>receiver</td>
     <td>View</td>
	
    </tr>
    <?php
	$userId=$_SESSION['user'];
	$sql="SELECT * FROM files where reciver=$userId";
	$result_set=mysql_query($sql);
	
	
	
	
	
	
	while($row=mysql_fetch_array($result_set))
	{
		$reciver=$row['sender'];
	$sq="SELECT * FROM users where id=$reciver";
	$result_se=mysql_query($sq);
	$ro=mysql_fetch_array($result_se);
		?>
			
        <tr>
        <td><?php echo $row['file'] ?></td>
        <td><?php echo $ro['username'] ?></td>
        <td><a href="uploads/<?php echo $row['file']?>" target="_blank">view file</a></td>
		
        </tr>
        <?php
	}
	?>
    </table>
    
</div>
 
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>