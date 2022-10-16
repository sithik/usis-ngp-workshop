<?php
session_start();
if (! (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) ){
	header("Location: index.php");
}

// check if URL parameter contains contact_id
if (! (isset($_GET['contact_id']) ) ){
	header("Location: contacts.php");
}

$host 		= "localhost";
$username 	= "root";
$password 	= "";
$database 	= "phonebook";
$cn = mysqli_connect($host,$username,$password,$database);
if ($cn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$logged_in_user_id = $_SESSION['user_id'];
$url_contact_id    = $_GET['contact_id'];

// prepare sql
$sql = "DELETE FROM contacts WHERE contact_id = {$url_contact_id} and user_id = {$logged_in_user_id}";
// execute SQL
if($cn->query($sql)){
	// redirect to contacts.php
	header("Location: contacts.php");
}
else{
	// redirect to add_contact.php
	header("Location: contacts.php");
}
