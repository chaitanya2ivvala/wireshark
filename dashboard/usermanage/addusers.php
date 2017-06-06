<?php
error_reporting(0);
include_once 'db.php';

if(isset($_POST['save_mul'])){		
	$total = $_POST['total'];
		
	for($i=1; $i<=$total; $i++){
		$fn = $_POST["fname$i"];
		$ln = $_POST["lname$i"];		
		$sql="INSERT INTO users(username,email) VALUES('".$fn."','".$ln."')";
		$sql = $MySQLiconn->query($sql);		
	}
	
	if($sql){
		?>
		<script>
			alert('<?php echo $total." users was added"; ?>');
			window.location.href='index.php';
		</script>
		<?php
	}
	else{
		?>
		<script>
			alert('error while adding users , please try again');
		</script>
		<?php
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Wireshark admin</title>
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css" />
		<script src="jquery.js" type="text/javascript"></script>
		<script src="js-script.js" type="text/javascript"></script>
	</head>

	<body>

		<div class="navbar navbar-default navbar-static-top" role="navigation">
			<div class="container">
 
				<div class="navbar-header">
					<a class="navbar-brand" href="index.php">Wireshark Administrator</a>
           
				</div>
 
			</div>
		</div>
		<div class="clearfix"></div>

		<div class="container">
			<a href="generate.php" class="btn btn-large btn-info"><i class="glyphicon glyphicon-plus"></i> &nbsp; Add Users</a>
		</div>

		<div class="clearfix"></div><br />

		<div class="container">
			<?php
			if(isset($_POST['btn-gen-form'])){
				?>
				<form method="post">
					<input type="hidden" name="total" value="<?php echo $_POST["no_of_rec"]; ?>" />
					<table class='table table-bordered'>
    
						<tr>
							<th>##</th>
							<th>Username</th>
							<th>Email</th>
						</tr>
						<?php
						for($i=1; $i<=$_POST["no_of_rec"]; $i++){
							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><input type="text" name="fname<?php echo $i; ?>" placeholder="username" class='form-control' /></td>
								<td><input type="text" name="lname<?php echo $i; ?>" placeholder="email" class='form-control' /></td>
							</tr>
							<?php
						}
						?>
						<tr>
							<td colspan="3">
    
								<button type="submit" name="save_mul" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> &nbsp; Add all users</button> 

								<a href="index.php" class="btn btn-large btn-success"> <i class="glyphicon glyphicon-fast-backward"></i> &nbsp; Go back</a>
    
							</td>
						</tr>
					</table>
				</form>
				<?php
			}
			?>
		</div>

	</body>
</html>