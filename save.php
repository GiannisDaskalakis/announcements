<?php
	include 'database.php';
	session_start();
	
	if($_POST['type']==2){
		$USNAME=$_POST['USNAME'];
		$USPASSW=$_POST['USPASSW'];
		$check=mysqli_query($conn,"select * from author where USNAME='$USNAME' and USPASSW='$USPASSW'");
		if (mysqli_num_rows($check)>0)
		{
			$_SESSION['USNAME']=$USNAME;
			echo json_encode(array("statusCode"=>200));
		}
		else{
			echo json_encode(array("statusCode"=>201));
		}
		mysqli_close($conn);
	}
?>