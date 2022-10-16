<?php

$host 		= "localhost";
$username 	= "root";
$password 	= "";
$database 	= "workshop";

$cn = mysqli_connect($host,$username,$password,$database);

if ($cn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

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

if($cn->query($sql)){
	$new_id = $cn->insert_id;
	echo "Successfully inserted. Recently inserted record id is: ".$new_id ;
}


$sql = "UPDATE `users` SET `last_name` = 'Kumar test' WHERE `last_name` = 'Kumar'";

if($cn->query($sql)){
	echo "Successfully updated.";
}


$sql = "DELETE FROM users WHERE `id` >= 5";

if($cn->query($sql)){
	echo "Successfully deleted.";
}



$sql = "SELECT * FROM users";

$results = $cn->query($sql);

if($results->num_rows > 0){
	echo  $results->num_rows. " Records available<br>";
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
