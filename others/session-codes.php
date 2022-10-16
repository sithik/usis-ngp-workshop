<?php


session_start();
$_SESSION['logged_in'] = true;

//.....
//.....

if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
	//.....
}

//.....
//.....

unset($_SESSION['logged_in']);

