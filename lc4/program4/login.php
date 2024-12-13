<?php
	session_start();
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "student_db";
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) 
	{
	    	die("Connection failed: " . $conn->connect_error);
	}
	if ($_SERVER['REQUEST_METHOD'] == 'POST') 
	{
	    	$email = $_POST['email'];
	    	$sql = "SELECT * FROM students WHERE email = '$email'";
	    	$result = $conn->query($sql);
	    	if ($result->num_rows > 0) 
	    	{
			$row = $result->fetch_assoc();
			$_SESSION['student_id']=$row['email'];
			$_SESSION['first_name']=$row['first_name'];
			$_SESSION['last_name']=$row['last_name'];
			header("Location: dashboard.php");
			exit();
	    	} 
	    	else 
	    	{
			echo "No user found with that email.";
	    	}
	    	$conn->close();
	}
?>

<html>
	<body>
		<center>
	    	<h2>Login</h2>
	    	<form method="POST" action="login.php">
			<label for="email">Email:</label><br>
			<input type="email" id="email" name="email" required><br><br>
			<input type="submit" value="Login">
	    	</form>
	    	</center>
	</body>
</html>
