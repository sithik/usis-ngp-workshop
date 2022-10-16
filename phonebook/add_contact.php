<?php
session_start();
if (! (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) ){
	header("Location: index.php");
}
?>


<h1>Phonebook</h1>
<h2>Add Contact</h2>

<form action="add_contact_action.php" method="post">
	Contact Name<br>
	<input type="text" name="contact_full_name"><br>
	Email ID<br>
	<input type="text" name="contact_email_id"><br>
	Phone Number<br>
	<input type="text" name="contact_phone_no"><br>
	Contact Group<br>
	<select name="contact_group_id">
		<option value="1">Friends</option>
		<option value="2">Family</option>
		<option value="3">Office</option>
		<option value="4">College</option>
		<option value="5">Other</option>
	</select><br><br>
	<input type="submit" name="add_contact" value="Add Contact">
</form>