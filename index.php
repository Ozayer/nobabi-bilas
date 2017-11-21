<?php

	session_start();
	$con = mysqli_connect('localhost','root','');

	if(!$con)
	{
		echo 'Not connected to server';
	}

	if(!mysqli_select_db($con, 'nobabi-bilas'))
	{
		echo 'DB not Selected';
	}

	$Name = $_POST['Username'];
	$Password = $_POST['Password'];
	$Password = md5($Password);
	$Email = $_POST['Email'];
	$Contact = $_POST['Contact'];
	$Address = $_POST['Address'];

	$sql = "INSERT INTO users (Name, Email, Password, Address, Contact) VALUES ('$Name', '$Email', '$Password', '$Address', '$Contact')";

	if(!mysqli_query($con, $sql))
	{
		echo 'Not Inserted';
	}
	else
	{
		header("refresh:1 url = index.html");

	}

	


?>
