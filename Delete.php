<!doctype html>
<html>

	<head>
		<link rel="stylesheet" type="text/css" href="recursos/css/delete.css">
		<title> Delete </title>
		
		
	</head>
	
	
	
	<body>
		<?php 
			$idnumber = 0; 
			$idnumberErr = "";
			
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				
				if (empty($_POST["idnumber"])) {
							$idnumberErr = "A number is required";
					}
						
				else {
						$idnumber = test_input($_POST["idnumber"]);
						
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

						// sql to delete a record
						$sql = "DELETE FROM Visitors WHERE id='$idnumber'";

						if ($conn->query($sql) === TRUE) {
							
						} else {
							echo "Error deleting record: " . $conn->error;
						}

						$conn->close();
						
						$idnumber = 0;

					}
					
			}
			
			function test_input($data) {
					$data = trim($data);
					$data = stripslashes($data);
					$data = htmlspecialchars($data);
					return $data;
				}
		?>	
		
		
		
		<header>
			<nav class="ReturnMain">
				
				<a href="FinalProjectJonellLuna.php"> Return to homepage </a>
				
			</nav>
		</header>
		
		<div class="deleteRecords">
			<h1 class = "TopText"> These are your current records, choose by the ID to delete the corresponding record </h1>
			<form method="post" 
				action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
				<br>
				ID Number: <input type="number" name="idnumber" value="<?php echo $idnumber;?>">
					<span class="error">* <?php echo $idnumberErr;?></span>
				<br><br>
				
				<input type="submit" name="submit" value="Submit"> 
				
			</form>
			<br><br>
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
	