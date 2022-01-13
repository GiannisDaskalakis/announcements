<!DOCTYPE html>
<html>
	<head>
		<title>List of Staff</title>
		<style>
			th {
				color: white;	
				background-color: #009900
			}
			table{
				border-collapse: collapse;	
				font-family: Arial     
			}

			table, td, th {   
			   border: 1px solid black;    
			}
			tr:nth-child(even){background-color: #ccffcc}
			
		</style>	
		<script>
			function checkIfOk(){  				
			   if (document.getElementById("ln").value == ""){
				   alert("Please complete the field!");
				   return false;
			   }
			   return true; 
			}					
		</script>	
	</head>	
	
	<body>
		
		<form name='frm' action='posts_byname.php' method='GET' onsubmit='return checkIfOk()'>
			Lastname filter: <input style='width:100%' name=lname id='ln' type=text/>
			<input style='width:30%' name='sub' type=submit value='Apply filters'/>
		</form>

		<?php 				 
             include("conf.php");    
	         $conn = new mysqli(HOST,USERNAME,DB_PWD,DATABASE);	         
	         $conn->set_charset("utf8");
	         //mysqli_set_charset($conn,"utf8");
             $sqlcommand = "SELECT LNAME, ANTEXT from POSTS";
             if (isset($_GET['lname'])){			
				 //$sqlcommand = $sqlcommand." where LNAME like '".$_GET['lname']."%'";
				 $criterion = mysqli_real_escape_string($conn, $_GET['lname']); //for sqlescape				 
				 $sqlcommand = $sqlcommand." where LNAME like '".$criterion."%'"; 
			 }
			 $sqlcommand=$sqlcommand." order by lNAME";
			 			 		 
			 echo "$sqlcommand";
                 
             $result = $conn->query($sqlcommand);                 
             
             echo "<table>";
             echo "<tr><th>Επώνυμο</th></th><th>Ανάρτηση</th></tr>";
			 while ($row = $result->fetch_assoc()){				 
				echo "<tr>";
				
				echo "<td>".$row['LNAME']."</td>";
				echo "<td>".$row['ANTEXT']."</a></td>";
				echo "</tr>";				
			   
			 }
			 echo "</table>";
			 echo "<br><br>Σύνολο:".$result->num_rows;	
			 $conn->close(); 	             	                                                        
        ?> 		
</body>
</html>
			
			
	
		
	
		


