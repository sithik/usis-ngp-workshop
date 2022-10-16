<?php
session_start();
$host 		= "localhost";
$username 	= "root";
$password 	= "";
$database 	= "phonebook";
$cn = mysqli_connect($host,$username,$password,$database);
if ($cn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$user_entered_email_id = $_POST['email_id'];
$user_entered_password = $_POST['password'];
$sql = "SELECT * FROM `users` WHERE email_id = '{$user_entered_email_id}' and password=md5('{$user_entered_password}')";

$result = $cn->query($sql);
if($result->num_rows > 0){
	if($row = $result->fetch_assoc()){
		//echo "Login success";
		$_SESSION['logged_in'] = true;
		$_SESSION['user_id']   = $row['user_id'];
		$_SESSION['logged_in_full_name']   = $row['full_name'];
		$_SESSION['logged_in_email_id']   = $row['email_id'];
		header("Location: contacts.php");
	}
	else{
		echo "Login failed";
	}
}
else{
	echo "Login failed";
}
