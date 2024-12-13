<html>
	<body>
		<center>
		<form method='POST'>
		Name:<input type='text' name='name'><br>
		Class:<input type='text' name='class'><br>
		Age:<input type='text' name='age'><br>
		Admission No:<input type='text' name='admnno'><br>
		<input type='submit' value='submit' name='b'>
		</form>
		</center>
	</body>
</html>

<?php
	$name=$_POST['name'];
	$class=$_POST['class'];
	$age=$_POST['age'];
	$admn=$_POST['admnno'];
	if(isset($_POST['b']))
	{
		if($name=='' || $class=='' || $age=='' || $admn=='')
		{
			echo"<center>Please Fill all the fields</center>";
		}
		else
		{
			echo"<center>Name : $name<br>Class : $class<br>Age : $age<br>Admission No : $admn</center>";
		}
	}
?>
