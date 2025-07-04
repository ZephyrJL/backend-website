<!doctype html>
<html>
	
	
	<head>
	
		<title> Update 	</title>
		
		<style>
		
		
		</style>
		
	</head>
	
	<body>
		
		<?php
		
			
			
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "ProjectDB";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}

			$sql = "UPDATE Visitors SET lastname='Del Rio' WHERE id=4";

			if ($conn->query($sql) === TRUE) {
				echo "Record updated successfully";
			} else {
				echo "Error updating record: " . $conn->error;
			}

			$conn->close();
		?>
	
	
	
	</body>

</html>