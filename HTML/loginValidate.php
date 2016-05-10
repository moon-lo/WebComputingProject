<?php
	
	include 'validateFunctions.inc';
	
	$errors = array();
	$loggedIn = false;
	
	if (validateLogin($errors, $_POST)) {
		$loggedIn = true;
		include 'index.inc';
	}
	else {
		// Display errors
		include 'loginForm.inc';
	
	}

?>
