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
	$res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
	$userRow=mysql_fetch_array($res);
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome - <?php echo $userRow['userEmail']; ?></title>
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>

	<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">BTH</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="view.php">My files</a></li>
			<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">sent files <span class="caret"></span></a>
          <ul class="dropdown-menu">
           <li><a href="view_send.php">can view</a></li>
			<li><a href="edit_send.php">can edit</a></li>
          </ul>
        </li>
		<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">recived files <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="view_recive.php">can view</a></li>
			<li><a href="edit_recive.php">can edit</a></li>
          </ul>
        </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			  <span class="glyphicon glyphicon-user"></span>&nbsp;Hi' <?php echo $userRow['userEmail']; ?>&nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	<br>
	<br>
	
	<div class="jumbotron">
	 <div class="container">
	 <div class="col-md-4">
<h2>Drop Your Files!</h2>
<img src="assets/images/upload.png">
<p><a class="btn btn-primary btn-lg" href="home.php" role="button">Upload</a></p>
</div>


<div class="col-md-4">
 
  <h2>View Files!</h2>
  <img src="assets/images/view.png" >
  
  <p><a class="btn btn-primary btn-lg" href="view.php" role="button">View</a></p>
</div>


<div class="col-md-4">
  <h2>Share Files</h2>
   <img src="assets/images/share.png">
   <p><a class="btn btn-primary btn-lg" href="view.php" role="button">share</a></p>
</div>

</div>
</div>


    <div class="container">
	<h1>Drop Your Files Here !</h1>
        <form action="upload.php" method="post" enctype="multipart/form-data">
		<div class="form-group">
		<label> File input</label>
		<input type="file" name="file" />
		</div>
		<div class="form-group">
		<label>Uplode</label><br>
		<button class="btn btn-default" type="submit" name="btn-upload">upload</button>
		</div>
		</form>
    
    </div>
  </div>
  <div class="container">
 <?php
 if(isset($_GET['success']))
 {
  ?>
        <label>File Uploaded Successfully...  <a href="view.php">click here to view file.</a></label>
        <?php
 }
 else if(isset($_GET['fail']))
 {
  ?>
        <label>Problem While File Uploading !</label>
        <?php
 }
 else
 {
  ?>
        <label>Upload any files(PDF, DOC, EXE, VIDEO, MP3, ZIP,etc...)</label>
        <?php
 }
 ?>
	 </div>
</div>
    <script src="assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    
</body>
</html>
<?php ob_end_flush(); ?>