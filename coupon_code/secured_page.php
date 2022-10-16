<?php
require("config.php");

if (! ( isset($_SESSION['logged_in'])  && $_SESSION['logged_in']==true )){
	header("Location: index.php?status=104");
}

$logged_in_username = $_SESSION['username'];
$logged_in_fullname = $users[$logged_in_username]['fullname'];
$logged_in_coupon_code = $users[$logged_in_username]['coupon_code'];

?>

<p>Hello <?php echo $logged_in_fullname; ?>,</p>
<p>Welcome to your secured page. You are authorised to view this page.</p>
<p>Your coupon code is: <?php echo $logged_in_coupon_code; ?></p>
<p><a href="logout.php">Logout</a></p>