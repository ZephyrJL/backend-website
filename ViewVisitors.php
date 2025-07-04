<!doctype html>
<html>
	
	
	<head>
		<link rel="stylesheet" type="text/css" href="recursos/css/view.css">
		<title> View </title>
		
	</head>
	
	
	
	<body>
		<header>
			
			<nav class="ReturnMain">
					
				<a href="FinalProjectJonellLuna.php"> Return to homepage </a>
					
			</nav>
		</header>	
		
		<div class="ViewRecords">
			<h1 class="TopText"> Welcome, here you can view all of our visitors! </h1>
			<br>
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

				$sql = "SELECT id, firstname, lastname, email, gender, comments, reg_date FROM Visitors";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
				// Output data of each row
					while($row = $result->fetch_assoc()) {
						echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. " - Email: " . $row["email"]. " - Gender: " . $row["gender"].
						 " - Comments " . $row["comments"]. " - Registry date: " . $row["reg_date"]. "<br>";
					}
				} else {
					echo "0 results";
				}
				$conn->close();
			?>
		
		</div>
	
	</body>

</html>