<?php include 'components/authentication.php' ?>     

<?php include 'controllers/base/head.php' ?>
<?php include 'controllers/navigation/first-navigation.php' ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Activate and de-activate the account</title>

		<style type="text/css">
			* { 
				margin: 0px; 
				padding: 0px; 
				font-family: Tahoma, Geneva, sans-serif; 
				background-color: #999; 
				color: #FFF;  }
			a { 
				text-decoration: none; }
			.act { 
				color: #0F0; }
			.deact { 
				color: #F00;}
			.header { 
				width: 650px; 
				min-height: 450px; 
				border: 0px green dashed; 
				margin: 0 auto; 
				padding: 10px; }
			.left { 
				float: left; 
				font-size: 20px; 
				text-transform: uppercase; 
				text-align: center; 
				width: 290px; 
				min-height: 20px; 
				font-size: 24px; 
				border-bottom: 1px #003 solid; 
				padding: 10px; }
			.right { 
				float: left; 
				font-size: 20px; 
				text-transform: uppercase; 
				text-align: center; 
				width: 290px; 
				min-height: 20px; 
				font-size: 24px; 
				border-bottom: 1px #003 solid; 
				padding: 10px; }
			.left1 { 
				float: left; 
				text-align: center; 
				width: 290px; 
				min-height: 20px; 
				border-right: 1px #666 solid; 
				font-size: 26px; 
				border-bottom: 1px #666 solid; 
				padding: 10px; }
			.right1 { 
				float: left; 
				text-align: center; 
				width: 290px; 
				min-height: 20px; 
				border-left: 1px #666 solid; 
				font-size: 26px; 
				border-bottom: 1px #666 solid; 
				padding: 10px; }

		</style>
	</head>

	<body>

		<h2 align="center"> <a href="">Activate/Deactivate Users</a> &nbsp;  &nbsp; <a href="localhost/index.php">  </a> </h2> 


		<div class="header">
			<div class="left"> email </div>
			<div class="right"> Status </div>


			<?php 
			include('db.php');
			$select=mysql_query("select * from users");
			while($row=mysql_fetch_array($select)){
				$id=$row['id'];
				$data=$row['email'];
				$status=$row['status'];

				?>

				<div class="left1"> <?php echo $data?> </div>
				<div class="right1"> 
					<?php
					if(($status)=='0'){
						?>
						<a href="action.php?status=<?php echo $row['id'];?>" 
 class="act" onclick="return confirm('Deactivate <?php echo $data?>');"> Active </a>
						<?php
					}
					if(($status)=='1'){
						?>
						<a href="action.php?status=<?php echo $row['id'];?>" 
 class="deact" onclick="return confirm('Activate <?php echo $data?>');">Inactive</a>
						<?php
					}
					?>
				</div>
				<?php }?> 
		</div>


	</body>
</html>