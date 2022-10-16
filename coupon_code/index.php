<?php
require("config.php");
// check if action is set
if(isset($_GET['action'])){
	// check if action is login	
	if($_GET['action'] == "login"){		
		$user_entered_username = $_POST['username'];
		$user_entered_password = $_POST['password'];
		// check if the user entered username is in array
		if(   isset($users[$user_entered_username]) )
		{
			$user_array = $users[$user_entered_username];
			// check if the given password matches in the user's array
			if( $user_entered_password == $user_array['password'] )
			{
				// create session
				$_SESSION['logged_in'] = true;
				$_SESSION['username']  = $user_entered_username;
				// redirect
				header("Location: secured_page.php");
			}
			else
			{
				// 101 - User entered wrong password
				header("Location: index.php?status=101");
			}
		}
		else
		{
			// 102 - User is not available
			header("Location: index.php?status=102");
		}
	}
}
else{

$message = "";
if(   isset($_GET['status'])   ){
	switch ($_GET['status']) {
		case 101:
			$message = "User entered wrong password";
			break;
		case 102:
			$message = "User is not available";
			break;
		case 103:
			$message = "User logged out successfully";
			break;
		case 104:
			$message = "You are not logged in yet. Please login to access your secure page";
			break;
	}
}


// check if user is already logged in, if so do not show login page
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
	// redirect to secured page
	header("Location: secured_page.php");
}



?>
<h1>Coupon Codes Portal</h1>
<h2>User Login</h2>

<?php echo "<p>" . $message . "</p>"; ?>

<form action="index.php?action=login" method="post">
	Username:<br>
	<input type="text" name="username"><br>
	Password:<br>
	<input type="password" name="password"><br>
	<input type="submit" value="Login">
</form>
<?php
}
?>