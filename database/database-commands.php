<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "workshop";

/**********************/
// Database Connection
/**********************/

$conn = mysqli_connect($servername, $username, $password, $database);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}


/**********************/
// Record insert
/**********************/
$sql = "INSERT INTO users (firstname, lastname, email) VALUES ('John', 'Doe', 'john@example.com')";

if ($conn->query($sql) === TRUE) {
	$last_id = $conn->insert_id;
	echo "New record created successfully";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}




/**********************/
// Select all records
/**********************/
$sql = "SELECT id, firstname, lastname FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
  }
} else {
  echo "0 results";
}


/**********************/
// Select records by where clause
/**********************/

$sql = "SELECT id, firstname, lastname FROM MyGuests WHERE id=5";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
  }
} else {
  echo "0 results";
}


/**********************/
// Update record
/**********************/
$sql = "UPDATE MyGuests SET lastname='Raj' WHERE id=2";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

/**********************/
// Delete a record
/**********************/
$sql = "DELETE FROM MyGuests WHERE id=3";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

mysqli_close($conn);
