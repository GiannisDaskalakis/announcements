 				 
<?php  
   if (isset($_GET['LNAME'])){
		include("conf.php");   
		$conn = new mysqli(HOST,USERNAME,DB_PWD,DATABASE);        
		mysqli_set_charset($conn,"utf8");				
		$LNAME = $_GET['LNAME'];
		
		$result = $conn->query("SELECT LNAME, ANTEXT from posts where LNAME = '$LNAME'");		
		header('Content-type: application/json');		
		print json_encode($result->fetch_all(MYSQLI_ASSOC), JSON_PRETTY_PRINT);		
   	    $conn->close();
	}
?>         		         
