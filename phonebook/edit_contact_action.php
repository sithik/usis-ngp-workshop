<?php
session_start();
if (! (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) ){
	header("Location: index.php");
}
$host 		= "localhost";
$username 	= "root";
$password 	= "";
$database 	= "phonebook";
$cn = mysqli_connect($host,$username,$password,$database);
if ($cn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

// receive all form values from $_POST
$contact_id = $_POST['contact_id'];
$user_entered_full_name = $_POST['contact_full_name'];
$user_entered_email_id = $_POST['contact_email_id'];
$user_entered_phone_no = $_POST['contact_phone_no'];
$user_entered_group_id = $_POST['contact_group_id'];

//prepare update sql
$sql = "UPDATE `contacts` 
		SET 
			`contact_full_name` = '{$user_entered_full_name}', 
			`contact_email_id` = '{$user_entered_email_id}', 
			`contact_phone_no` = '$user_entered_phone_no', 
			`contact_group_id` = '$user_entered_group_id' 
		WHERE 
			`contacts`.`contact_id` = {$contact_id};";
// execute SQL
if($cn->query($sql)){
	// redirect to contacts.php
	header("Location: contacts.php");
}
else{
	// redirect to add_contact.php
	header("Location: edit_contact.php?contact_id=".$contact_id);
}
