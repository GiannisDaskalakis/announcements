 				 
<?php  
   $status = "ERROR";
   if ((isset($_POST['LNAME'])) && (isset($_POST['ANTEXT']))  ){
	   if (($_POST['LNAME']!='') && ($_POST['ANTEXT']!='')){
			include("conf.php");   
			$conn = new mysqli(HOST,USERNAME,DB_PWD,DATABASE);        
			mysqli_set_charset($conn,"utf8");	
			$result = $conn->query("INSERT INTO posts (LNAME, ANTEXT) VALUES ('".$_POST['LNAME']."', '".$_POST['ANTEXT']."')");		
			if ($result)
				$status = "OK"; 
			else 
				$status = "ERROR";	
			$conn->close();
		}
	}
	header('Content-type: application/json');
	echo json_encode(array('status' => $status)); // where $status is 'OK' or 'ERROR'	 	
?>         		         
