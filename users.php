<?php
$con = mysql_connect('localhost','root','');
if (!$con){
	die('Could Not Connect');
}

try{

		$db = new PDO('mysql:dbname=info2180project4;host=localhost', 'root', '');
		}catch (PDOException $e) {
		echo 'ERROR: ' . $e->getMessage();
		}

$menu = "http://localhost/Home.html";

echo "<html>
				
				<head>
				
				</head>
			
			
			<body>
			
			<table>
			
				
				
				<tr'>				
					<th>ID</th>
					<th>Username</th>
				</tr> 
				";
				
		$result = $db->prepare("SELECT id, username FROM user"); 
		$result ->execute();
		
				while($row =$result->fetch(PDO::FETCH_ASSOC))
				{   //Creates a loop to loop through results
			
		   				  echo "<tr>
		   				  <td>" . $row['id'] . "</td>
						  <td>" . $row['username'] ."</td>
						  
						  
					  </tr>";  //$row['index'] the index here is a field name
				}
				
						
		echo "	
				</table>
				<br/>
				<a href = $menu>Home</a>
				</body>				
				</html>";

	



?>