<html>
    <head>
	<title>List of Posts</title>
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
			function picA() {				
				document.getElementById('img').src = "a.jpg";
			}

			function picB() {				
				document.getElementById('img').src = "b.jpg";
			}
			function picC() {				
				document.getElementById('img').src = "c.png";
			}
		</script>
		<script>
			function checkIfOk(){  				
			   if (document.getElementById("ln").value == ""){
				   alert("Please complete the field!");
				   return false;
			   }
			   return true; 
			}					
		</script>
      
		<link href="hor-menu-styles.css" rel="stylesheet" type="text/css"/>
    </head>
    
    <body>
		<img id="img" src="b.jpg" style="width:400px" onmousemove="picA()" onmouseout="picB()"  onmousedown="picC()">
        <img id="img" src="c.png" style="width:400px" onmousemove="picA()" onmouseout="picB()"  onmousedown="picC()">
		<div id="tabs">
			<ul>
				<li><a href="arxikh.html"><span>Αρχική</span></a></li>
				
				
				
			</ul>
		</div>
		<hr>
		<form action="" method="post">
		
		<select name="teachers">
		
		<?php 
		include("conf.php");    
	         $conn = new mysqli(HOST,USERNAME,DB_PWD,DATABASE);	         
	         $conn->set_charset("utf8");
	         //mysqli_set_charset($conn,"utf8");
		     $sqlcommand = "SELECT LNAME, ANTEXT from POSTS";
			
			$res=mysqli_query($conn, "select * from author order by LNAME asc");
			?>
			
			<option value=""  disabled selected> ΕΠΙΛΕΞΤΕ ΔΙΔΑΣΚΟΝΤΑ <option>
			
			<?php
			
			while($row=mysqli_fetch_array($res))
			{
				?>
				
				<option><?php echo $row["LNAME"]; ?> </option>
				

		<?php 				 
			
			}
			?>
			</select>
			<input type="submit" name="submit" value="Choose Options">
			</form>
			
			<?php
			
             $sqlcommand = "SELECT LNAME, ANTEXT from POSTS";
			 
				if(isset($_POST['submit'])){
				if(!empty($_POST['teachers'])) {
					$selected = $_POST['teachers'];
				echo 'You have chosen: ' . $selected;
				} else {
				echo 'Please select the value.';
				}
				}


             if (isset($_POST['teachers'])){			
				 //$sqlcommand = $sqlcommand." where LNAME like '".$_GET['lname']."%'";
				 $criterion = mysqli_real_escape_string($conn, $_POST['teachers']); //for sqlescape				 
				 $sqlcommand = $sqlcommand." where LNAME like '".$criterion."%'"; 
			 }
			 $sqlcommand=$sqlcommand." order by lNAME";
			 			 		 
			//echo "$sqlcommand";
                 
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
