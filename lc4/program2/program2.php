<?php
	$servername = "localhost";
	$username = "root";  
	$password = "";    
	$dbname = "student";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if (!$conn) 
	{
		die("Connection failed: " . mysqli_connect_error());
	}
	if ($_SERVER['REQUEST_METHOD'] == 'POST') 
	{
		$username = $_POST['username'];
	    	$password = $_POST['password'];
	    	if (empty($username) || empty($password)) 
	    	{
			echo "Please enter both username and password.";
	    	} 
	    	else 
	    	{
			$sql = "SELECT * FROM login WHERE username = ?";
			$stmt = $conn->prepare($sql);
			$stmt->bind_param("s", $username); 
			$stmt->execute(); 
			$result = $stmt->get_result(); 
			if ($result->num_rows == 1) 
			{
		    		$row = $result->fetch_assoc();
		    		if ($password==$row['password']) 
		    		{  
		        		echo "<h2>Welcome, " . htmlspecialchars($row['username']) . "!</h2>"; 
		    		} 
		    		else 
		    		{
		        		echo "Invalid password!"; 
		    		}
			}
			else 
			{
		    		echo "User not found!"; 
			}
			$stmt->close();
	    	}
	}
	$conn->close();
?>
