 				 
<?php  
   if (isset($_GET['USNAME'])){
		include("conf.php");   
		$conn = new mysqli(HOST,USERNAME,DB_PWD,DATABASE);        
		mysqli_set_charset($conn,"utf8");				
		$USNAME = $_GET['USNAME'];
		
		$result = $conn->query("SELECT USNAME, LNAME from author where USNAME = '$USNAME'");		
		header('Content-type: application/json');		
		print json_encode($result->fetch_all(MYSQLI_ASSOC), JSON_PRETTY_PRINT);		
   	    $conn->close();
	}
?>         		         
