<?php

/*********************************

Methods:
mysqli_connect() 			- Connect to DB server and select a database
$cn->query()				- Executing a query
$results->fetch_assoc() 	- Get the record from result and return it as associative array

Properties:
$cn->insert_id 				- Get the last inserted auto increment id
$results->num_rows 			- Get the resultant records count

**********************************/



//---------- Database Credentials ----------//
$host 		= "localhost";
$username 	= "root";
$password 	= "";
$database 	= "workshop";
//-----------------------------------------//



//---------- Database Connection ----------//
$cn = mysqli_connect($host,$username,$password,$database);
if ($cn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
//-----------------------------------------//



//---------- Insert Queries ----------//
// Query preparation
$sql = "
INSERT INTO 
	`users` 
	(
		`id`, 
		`first_name`, 
		`last_name`,
		`email_id`
	) 
VALUES (
	NULL, 
	'Sabarish', 
	'Kumar', 
	'sabarish.kumar@usistech.com'
	)
";
// Query execution
if($cn->query($sql)){
	// Last inserted record's auto increment id
	$new_id = $cn->insert_id;
	echo "Successfully inserted. Recently inserted record id is: ".$new_id ;
}
//-----------------------------------------//


//---------- Update Query ----------//
$sql = "UPDATE `users` SET `last_name` = 'Kumar test' WHERE `last_name` = 'Kumar'";
if($cn->query($sql)){
	echo "Successfully updated.";
}
//-----------------------------------------//



//---------- Delete Query ----------//
$sql = "DELETE FROM users WHERE `id` >= 5";
if($cn->query($sql)){
	echo "Successfully deleted.";
}
//-----------------------------------------//


//---------- Select and fetch records from table ----------//
// Query preparation
$sql = "SELECT * FROM users";
// Query Execution
$results = $cn->query($sql);

// Recults count
if($results->num_rows > 0){
	echo  $results->num_rows. " Records available<br>";
	// Fetch record and run into loop
	while($row = $results->fetch_assoc()) {
		//print_r($row);
		echo "ID: ". $row['id'].
		"First Name: ". $row['first_name'].
		"Last Name: ". $row['last_name'].
		"Email ID: ". $row['email_id']."<br>";
	}
}
else{
	echo "No records returned";
}
//-----------------------------------------//