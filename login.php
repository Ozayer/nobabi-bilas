<?php


$con = mysqli_connect('localhost','root','');

//check if form is submitted
if (isset($_POST['login'])) {
	session_start();
	$Email = mysqli_real_escape_string($con, $_POST['email']);
	$Password = mysqli_real_escape_string($con, $_POST['password']);
	$Result = mysqli_query($con, "SELECT * FROM users WHERE Email = '" . $Email. "' and Password = '" . md5($Password) . "'");

	if ($row = mysqli_fetch_array($Result)) {
		$_SESSION['usr_id'] = $row['id'];
		$_SESSION['usr_name'] = $row['name'];
		header("Location: home.php");
	} else {
		$errormsg = "Incorrect Email or Password!!!";
	}
}
?>
