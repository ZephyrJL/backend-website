<!doctype html>

<html>
	
	<head>
		
		<link rel="stylesheet" type="text/css" href="recursos/css/insert.css">
		<title> Insert </title>


	</head>
	
	<body>
	
		<?php
			// define variables and set to empty values
			$firstnameErr = $lastnameErr = $emailErr = $genderErr = "";
			$firstname = $lastname = $email = $gender = $comment = "";

			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				
				if (empty($_POST["firstname"])) {
						$firstnameErr = "First Name is required";
				} 	
				else {
						$firstname = test_input($_POST["firstname"]);
						// check if name only contains letters and whitespace
					if (!preg_match("/^[a-zA-Z ]*$/", $firstname)) {
							$firstnameErr = "Only letters and white space allowed";
						}
				}
			}
				if ($_SERVER["REQUEST_METHOD"] == "POST") {
				
				if (empty($_POST["lastname"])) {
						$lastnameErr = "Last Name is required";
				} 	
				else {
						$lastname = test_input($_POST["lastname"]);
						// check if name only contains letters and whitespace
					if (!preg_match("/^[a-zA-Z ]*$/", $lastname)) {
							$lastnameErr = "Only letters and white space allowed";
						}
				}
				
				
				if (empty($_POST["email"])) {
						$emailErr = "Email is required";
				} 
				else {
						$email = test_input($_POST["email"]);
						// check if e-mail address is well-formed
						if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
							$emailErr = "Invalid email format";
						}
				}
				
				if (empty($_POST["comment"])) {
					$comment = "";
				} else {
						$comment = test_input($_POST["comment"]);
				}

				if (empty($_POST["gender"])) {
						$genderErr = "Gender is required";
				} 
				else {
						$gender = test_input($_POST["gender"]);
				}
				
				if ($firstnameErr == "" && $lastnameErr == "" && $emailErr == "" && $genderErr == "") {
				
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

					$sql = "INSERT INTO Visitors (firstname, lastname, email, gender, comments)
						VALUES ('$firstname', '$lastname', '$email', '$gender', '$comment')";
				
				 
					if ($conn->query($sql) === TRUE) {
						echo "New record created successfully";
					} 
					else {
						echo "Error: " . $sql . "<br>" . $conn->error;
					}

					$conn->close();
					
					}
					else {
						echo "Your information is incorrect, please";
					}
				
					
				
					
			}
				
				
				function test_input($data) {
					$data = trim($data);
					$data = stripslashes($data);
					$data = htmlspecialchars($data);
					return $data;
				}
				
				
		?>

		<!-- 	HTML Form also includes input data validation -->
		<header>
			<nav class="ReturnMain">
				
				<a href="FinalProjectJonellLuna.php"> Return to homepage </a>
				
			</nav>
		</header>	
		
		<div class = "VisitorRecords">
			<h2>New visitor record</h2>
			
			<p><span class="error">* required field</span></p>
			
			<form method="post" 
				action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
				
				First Name: <input type="text" name="firstname" value="<?php echo $firstname;?>">
					<span class="error">* <?php echo $firstnameErr;?></span>
				<br><br>
				
				Last Name: <input type="text" name="lastname" value="<?php echo $lastname;?>">
					<span class="error">* <?php echo $lastnameErr;?></span>
				<br><br>
				
				E-mail: <input type="text" name="email" value="<?php echo $email;?>">
					<span class="error">* <?php echo $emailErr;?></span>
				<br><br>
				
				Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?>
					</textarea>
				<br><br>
				
				Gender:
					<input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
					<input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male 
					<input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
					<span class="error">* <?php echo $genderErr;?></span>
				<br><br>
				
				<input type="submit" name="submit" value="Submit"> 


				
				
				
			</form>
		</div>
	</body>
</html>