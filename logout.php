<?php

	/**
	* Make sure you started your'e sessions!
	* You need to include su.inc.php to make SimpleUsers Work
	* After that, create an instance of SimpleUsers and your'e all set!
	*/

	session_start();
	require_once(dirname(__FILE__)."/backend/su.inc.php");

	$db = new SimpleUsers();

	// This simply logs out the current user
	$db->logoutUser();
	header("Location: users");

?>
