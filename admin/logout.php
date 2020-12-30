<?php
	session_start();

	$_SESSION['BB_admin'] = null;
	unset($_SESSION['BB_admin']);
	header('location: login.php')
?>