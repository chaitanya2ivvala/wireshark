<?php
include('db.php');
if(isset($_GET['status'])){
	$status1=$_GET['status'];
	$select=mysql_query("select * from users where id='$status1'");
	while($row=mysql_fetch_object($select)){
		$status_var=$row->status;
		if($status_var=='0'){
			$status_state=1;
		}
		else{
			$status_state=0;
		}
		$update=mysql_query("update users set status='$status_state' where id='$status1' ");
		if($update){
			header("Location:actdec.php");
		}
		else{
			echo mysql_error();
		}
	}
	?>
	<?php
}
?>