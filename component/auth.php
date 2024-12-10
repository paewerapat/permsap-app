<?php
	if (!isset($_SESSION)) {
		// server should keep session data for AT LEAST 24 hour
		ini_set('session.gc_maxlifetime', 60 * 60 * 24);
		
		session_start();
		
	}
	if(!$_SESSION['login']) {
		header("location: login.php");
		exit;
	}
?>