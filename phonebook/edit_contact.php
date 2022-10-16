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

// get existing contact data using the URL param contact_id
$url_contact_id = $_GET['contact_id'];
$logged_in_user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM contacts where contact_id = {$url_contact_id} and user_id = {$logged_in_user_id}";
$results = $cn->query($sql);

if($results->num_rows > 0){
	$row = $results->fetch_assoc();
?>

<h1>Phonebook</h1>
<h2>Edit Contact</h2>

<form action="edit_contact_action.php" method="post">
	Contact ID<br>
	<input type="hidden" name="contact_id" value="<?php echo $row['contact_id']; ?>">
	<?php echo $row['contact_id']; ?><br>
	Contact Name<br>
	<input type="text" name="contact_full_name" value="<?php echo $row['contact_full_name']; ?>"><br>
	Email ID<br>
	<input type="text" name="contact_email_id" value="<?php echo $row['contact_email_id']; ?>"><br>
	Phone Number<br>
	<input type="text" name="contact_phone_no" value="<?php echo $row['contact_phone_no']; ?>"><br>
	Contact Group<br>
	<select name="contact_group_id">
		<option value="1">Friends</option>
		<option value="2">Family</option>
		<option value="3">Office</option>
		<option value="4">College</option>
		<option value="5">Other</option>
	</select><br><br>
	<input type="submit" name="edit_contact" value="Edit Contact">
</form>

<?php
	}
else{
	header("Location: contacts.php");
}
?>