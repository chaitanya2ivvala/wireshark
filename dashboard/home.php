<?php
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();

require '_database/database.php';
$user_username=$_SESSION['user_username'];
?>   
<?php include 'controllers/base/head.php' ?>
<?php
$current_user = $_SESSION['user_username'];
$sql = "SELECT * FROM user WHERE user_username='$current_user'";
$result = mysqli_query($database,$sql);
while($row = mysqli_fetch_array($result,MYSQLI_BOTH)){
	?>
	<!-- Navbar1 -->
	<div id="navigation" class="navbar navbar-default navbar-fixed-top">
		<div class="fluid-container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse1">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="home.php"><b>Wireshark Administrator</b></a>	        
			</div>
			<div class="navbar-collapse collapse" id="navbar-collapse1">
				<ul class="nav navbar-nav">
					<li>
						<a href="home.php"><i class="fa fa-home"></i> Home</a>
					</li>
				</ul>
				
				<ul class="nav navbar-nav navbar-right">
					
					</li>	
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="fa fa-bars" style="font-size: 1.27em;"></i>
						</a>
						<ul class="dropdown-menu">
							<li>
								<a href="components/logout.php"><i class="fa fa-mail-reply"></i> Logout</a>
							</li>
						</ul>
					</li>	
				</ul>    
			</div><!--/.nav-collapse -->
		</div>
	</div>
	<!-- ./Navbar1 -->
	<?php
}
?>





<script>
	$.growl("<?php echo $dialogue; ?> ", {
			animate: {
				enter: 'animated zoomInDown',
				exit: 'animated zoomOutUp'
			}								
		});
</script>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12">
			<h1 class="text-center">Welcome Administrator</h1>
		</div>
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<ul class="nav text-center">
                
				<li><a href="usermanage/index.php">View all users</a></li>
				<li><a href="actdec.php">Activate/Deactivate Users</a></li>
				<li><a href="usermanage/generate.php">Add Users</a></li>
				<li><a href="components/logout.php">Logout</a></li>
				<li></li>
				<li></li>
			</ul>
		</div>
		<div class="col-md-4"></div>
	</div>
</div>