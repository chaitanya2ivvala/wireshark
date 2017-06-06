
<?php include 'db.php'
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Wireshark Admin</title>
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
		<div class="container">
			<div class="row clearfix">
				<div class="col-md-12">
					<h1 class="text-center">Welcome Administrator</h1>
				</div>
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<ul class="nav text-center">
                
						<li><a href="http://localhost/dashboard/home.php">Back to home</a></li>
               
						<li></li>
						<li></li>
					</ul>
				</div>
				<div class="col-md-4"></div>
			</div>
		</div>
		<div class="clearfix"></div>

		<div class="container">
			<a href="generate.php" class="btn btn-large btn-info"><i class="glyphicon glyphicon-plus"></i> &nbsp; Add Users</a>
		</div>

		<div class="clearfix"></div><br />

		<div class="container">
		<form method="post" name="frm">
			<table class='table table-bordered table-responsive'>
				<tr>
					<th>##</th>
					<th>Username</th>
					<th>Email</th>
				</tr>
				<?php
				$res = $MySQLiconn->query("SELECT * FROM users");
				$count = $res->num_rows;

				if($count > 0){
					while($row=$res->fetch_array()){
						?>
						<tr>
							<td><input type="checkbox" name="chk[]" class="chk-box" value="<?php echo $row['id']; ?>"  /></td>
							<td><?php echo $row['username']; ?></td>
							<td><?php echo $row['email']; ?></td>
						</tr>
						<?php
					}	
				}
				else{
					?>
					<tr>
						<td colspan="3"> No Users Found</td>
					</tr>
					<?php
				}
				?>

				<?php

				if($count > 0){
					?>
					<tr>
						<td colspan="3">
							<label><input type="checkbox" class="select-all" /> Check / Uncheck All</label>

    
							<label style="margin-left:100px;">
								<span style="word-spacing:normal;"> with selected :</span>
								<span><img src="edit.png" onClick="edit_records();" alt="edit" />edit</span> 
								<span><img src="delete.png" onClick="delete_records();" alt="delete" />delete</span>
							</label>
    
    
						</td>
					</tr>    
					<?php
				}

				?>

			</table>
		</form>

	</body>
</html>