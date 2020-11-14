<?php
if (!isset($_SESSION)) {
	session_start();
}
if (!empty($_SESSION['usernm']) && !empty($_SESSION['userlv']) && !empty($_SESSION['userid'])) {

	if ($_SESSION['userlv'] == "1") {
		header('Location: views/');
	} else {
		include('login.php');
	}
} else {
	include('login.php');
}
