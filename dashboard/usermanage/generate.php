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
					<a class="navbar-brand" href="generate.php">Wireshark Administrator</a>
           
				</div>
 
			</div>
		</div>
		<div class="clearfix"></div>

		<div class="container">
			<a href="index.php" class="btn btn-large btn-info"><i class="glyphicon glyphicon-eye-open"></i> &nbsp; View Users</a>
		</div>

		<div class="clearfix"></div><br />

		<div class="container">
			<form method="post" action="addusers.php">

				<table class='table table-bordered'>

					<tr>
						<td> Please enter how many users you want to add</td>
					</tr>

					<tr>
						<td>
							<input type="text" name="no_of_rec" placeholder="how many users u want to add" maxlength="2" pattern="[0-9]+" class="form-control" required />
						</td>
					</tr>

					<tr>
						<td><button type="submit" name="btn-gen-form" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> &nbsp; Add Users</button> 

							<a href="index.php" class="btn btn-large btn-success"> <i class="glyphicon glyphicon-fast-backward"></i> &nbsp; Go back</a>
						</td>
					</tr>

				</table>

			</form>

		</div>
	</body>
</html>