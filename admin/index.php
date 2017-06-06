<?php
ob_start();
	session_start();
	if( isset($_SESSION['user'])){
		header("Location: chat.php");
	}

include_once 'connect.php';
$error = false;
if (isset($_POST['signup']) ) {
	
	    // clean user inputs to prevent sql injections
		$username = trim($_POST['username']);
		$username = strip_tags($username);
		$username = htmlspecialchars($username);
		
		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);
		
		$password = trim($_POST['password']);
		$password = strip_tags($password);
		$password = htmlspecialchars($password);
		
		$retypepassword = trim($_POST['retypepassword']);
		$retypepassword = strip_tags($retypepassword);
		$retypepassword = htmlspecialchars($retypepassword);
		
		$ip=$_SERVER['REMOTE_ADDR'];
		
		$time=date("Y-m-d H:i:s");
		
		// basic name validation
		if (empty($username)) {
			$error = true;
			$nameError = "Please enter your full name.";
		} else if (strlen($username) < 3) {
			$error = true;
			$nameError = "Name must have atleat 3 characters.";
		} else if (!preg_match("/^[a-zA-Z ]+$/",$username)) {
			$error = true;
			$nameError = "Name must contain alphabets and space.";
		}
		
		//basic email validation
		if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$error = true;
			$emailError = "Please enter valid email address.";
		} 
		// check email exist or not
			$query = "SELECT email FROM users WHERE email='$email'";
			$result = mysql_query($query);
			$count = mysql_num_rows($result);
			if($count!=0){
				$error = true;
				$emailError = "Provided Email is already in use.";
			}
		// password validation
		if (empty($password)){
			$error = true;
			$passError = "Please enter password.";
		} else if(strlen($password) < 6) {
			$error = true;
			$passError = "Password must have atleast 6 characters.";
		}
		//retype password validation
		
		if (empty($retypepassword)){
			$error = true;
			$repassError = "Please retype password.";
		} else if($_POST['password']!=$_POST['retypepassword']) {
			$error = true;
			$repassError = "Password dose not match";
		}
		// password encrypt using SHA256();
		$password = hash('sha256', $password);
		
		
		// if there's no error, continue to signup
		if( !$error ) {
		
			$query = "INSERT INTO admin (username,email,password,ip,time) VALUES('$username','$email','$password','$ip','$time')";
			$res = mysql_query($query);
			
			
			if ($res) {
				$errTyp = "success";
				$errMSG = "Registration Successfully ";
				unset($username);
				unset($email);
				unset($password);
			} else {
				$errTyp = "danger";
				$errMSG = "Something went wrong, try again later...";	
			}	
				
		}
	}


if( isset($_POST['login']) ) {	
		
		// prevent sql injections/ clear user invalid inputs
		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);
		
		$password = trim($_POST['password']);
		$password = strip_tags($password);
		$password = htmlspecialchars($password);
		// prevent sql injections / clear user invalid inputs
		
		if(empty($email)){
			$error = true;
			$loemailError = "Please enter your email address.";
		} else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$error = true;
			$loemailError = "Please enter valid email address.";
		}
		
		if(empty($password)){
			$error = true;
			$lopassError = "Please enter your password.";
		}
		
		// if there's no error, continue to login
		if (!$error) {
			
			$password = hash('sha256', $password); // password hashing using SHA256
		
			$res=mysql_query("SELECT id, username,email,password FROM admin WHERE email='$email'");
			$row=mysql_fetch_array($res);
			$count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row
			
			if( $count == 1 && $row['password']==$password ) {
				$_SESSION['user'] = $row['id'];
				
				
				
				header("Location: home.php");
			} else {
				$loerrMSG = "Incorrect Credentials, Try again...";
			}
				
		}
		
	}
	?>

<html>
<head>
<title>WIRESHARK MESSENGER</title>
<link rel="stylesheet" href='../css/bootstrap.min.css'>
</head>

<body background='../images/1.jpg' style="max-width:100%;overflow-x:hidden;" >
<nav class="navbar navbar-inverse">
<center><h2 style='color:white'>Admin</center>

</nav>
  <div class="row">
  <div class="col-md-6">
  <center><h3>SIGNUP</center>
  <form action="index.php" method="POST">
  <?php
			if ( isset($errMSG) ) {
				
				?>
				<div class="form-group">
            	<div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
				<span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
            	</div>
                <?php
			}
			?>
  
  
  <div class="form-group">
    <label class="col-sm-3" for="exampleInputName2">Username</label>
	<div class='col-md-9'>
    <input type="text" name='username' class="form-control" id="exampleInputName2" placeholder="Username">
	<br>
	<span class="text-danger"><?php echo $nameError; ?></span>
	</div>
    </div>
  <div class="form-group">
    <label class="col-sm-3" for="exampleInputEmail1">Email address</label>
	<div class='col-md-9'>
    <input type="email" name='email' class="form-control" id="exampleInputEmail1" placeholder="Email">
	<br>
	<span class="text-danger"><?php echo $emailError; ?></span>
	</div>
	
  </div>
  
  
  <div class="form-group">
    <label class="col-sm-3" for="exampleInputPassword1">Password</label>
	<div class='col-md-9'>
    <input type="password" name='password' class="form-control" id="exampleInputPassword1" placeholder="Password">
 <br>
	<span class="text-danger"><?php echo $passError; ?></span>
	</div>
  </div>
  <div class="form-group">
    <label class="col-sm-3" for="exampleInputPassword1">Re-Type Password</label>
	<div class='col-md-9'>
    <input type="password" name='retypepassword' class="form-control" id="exampleInputPassword1" placeholder="Re-Type Password">
	<br>
	<span class="text-danger"><?php echo $repassError; ?></span>
  </div>
	
  </div>
  <div class='col-md-8'>
  <center><button type="submit" name='signup' class="btn btn-info">SIGNUP</center>
  </div>
  <br>
  
 </div> 
 </form>
  <div class="col-md-6"><center><h3>LOGIN</center>
  <form action="index.php" method='post'>
  
   <?php
			if ( isset($loerrMSG) ) {
				
				?>
				<div class="form-group">
            	<div class="alert alert-danger">
				<span class="glyphicon glyphicon-info-sign"></span> <?php echo $loerrMSG; ?>
                </div>
            	</div>
                <?php
			}
			?>
  <div class="form-group">
    <label class="col-sm-3" for="exampleInputEmail2">Email address</label>
	<div class='col-md-9'>
    <input type="email" name='email' class="form-control" id="exampleInputEmail2" placeholder="Email">
	<span class="text-danger"><?php echo $loemailError; ?></span>
	<br>
	</div>
  </div>
  
  <div class="form-group">
    <label class="col-sm-3" for="exampleInputPassword1">Password</label>
	<div class='col-md-9'>
    <input type="password" name='password' class="form-control" id="exampleInputPassword1" placeholder="Password">
	<span class="text-danger"><?php echo $lopassError; ?></span>
	<br>
	</div>
  </div>
  <div class='col-md-8'>
  <center><button type="submit" name='login' class="btn btn-info">LOGIN</button></center>
  </div>
  <br>
  </div>
  </div>
</body>
</html>