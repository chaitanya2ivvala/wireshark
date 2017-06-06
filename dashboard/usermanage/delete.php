<?php
	
error_reporting(0);
	
include_once 'db.php';
	
$chk = $_POST['chk'];
$chkcount = count($chk);
	
if(!isset($chk)){
	?>
	<script>
		alert('At least one user must be Selected');
		window.location.href = 'index.php';
	</script>
	<?php
}
else{
	for($i=0; $i<$chkcount; $i++){
			
		$del = $chk[$i];
		$sql=$MySQLiconn->query("DELETE FROM users WHERE id=".$del);
	}	
		
	if($sql){
		?>
		<script>
			alert('<?php echo $chkcount; ?> User Was Deleted');
			window.location.href='index.php';
		</script>
		<?php
	}
	else{
		?>
		<script>
			alert('Error while deleting users,please try again');
			window.location.href='index.php';
		</script>
		<?php
	}
		
}

	
?>