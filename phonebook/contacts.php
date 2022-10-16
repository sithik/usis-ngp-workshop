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

$logged_in_user_id = $_SESSION['user_id'];
$logged_in_full_name = $_SESSION['logged_in_full_name'];
$logged_in_email_id = $_SESSION['logged_in_email_id'];

$sql = "SELECT * FROM `contacts` where user_id = {$logged_in_user_id}";
$results = $cn->query($sql);
?>
<h1>Phonebook</h1>

Logged in as <?php echo $logged_in_full_name; ?> (<?php echo $logged_in_email_id; ?>) - <a href="logout.php">Logout</a>


<h2>All Contacts</h2>

<a href="add_contact.php">Add Contact</a>

<table border="1">
	<tr>
		<td>ID</td>
		<td>Name</td>
		<td>Email ID</td>
		<td>Phone</td>
		<td>Action</td>
	</tr>
<?php
if($results->num_rows > 0){
	while($row = $results->fetch_assoc()) {
?>
	<tr>
		<td><?php echo $row['contact_id']; ?></td>
		<td><?php echo $row['contact_full_name']; ?></td>
		<td><?php echo $row['contact_email_id']; ?></td>
		<td><?php echo $row['contact_phone_no']; ?></td>
		<td>
			<a href="edit_contact.php?contact_id=<?php echo $row['contact_id']; ?>">Edit</a>
			<a href="delete_contact.php?contact_id=<?php echo $row['contact_id']; ?>">Delete</a>
		</td>
	</tr>
<?php
	} // closing while
} // closing if
?>
</table>