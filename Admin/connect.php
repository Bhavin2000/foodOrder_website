<?php

$UserId = filter_input(INPUT_POST,'UserId');
$Password = filter_input(INPUT_POST,'Password');

if (!empty($UserId))
{
	if (!empty($Password)) 
	{
		$host = "localhost";
		$dbusername = "root";
		$dbpassword = "";
		$dbname = "userlogin";

		//create connection

		$conn = new mysqli($host ,$dbusername,$dbpassword,$dbname);
		if(mysqli_connect_error())
		{
			die('connect error ('. mysqli_connect_error() .')' .mysqli_connect_error());
		}
		else
		{
			$sql = "INSERT INTO user (UserId, Password)
			values ('$UserId','$Password')";
			if ($conn->query($sql))
			 {
				echo "new record is inserted successfully";
			 }
			 else
			 {
			 	echo "error:".$sql ."<br>".$conn->error;
			 }
			 $conn->close();
		}
	}
	else
	{
		echo "password should not be empty";
		die();
	}
}
else
{
	echo "userid should not be empty";
	die();
}

?>