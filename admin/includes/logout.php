<?php
	session_start(); 

	$_SESSION['username'] = null;
	$_SESSION['password'] = null;
	$_SESSION['firstname'] = null;
	$_SESSION['lastname'] = null;
	$_SESSION['email'] = null;
	$_SESSION['userimg'] = null;
	$_SESSION['role'] = null;

header('Location: ../../login.php')
?>