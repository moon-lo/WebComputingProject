<html>
<?php

/* 	echo $_POST['parkName'];
	echo '<br/>';
	echo $_POST['rating'];
	echo '<br/>';
	echo $_POST['suburbs'];
	echo '<br/>';
	
	foreach ($_POST['parkSize'] as $val) {
		echo $val;
		echo '<br/>';
	} */
	
	require 'searchFunctions.inc';
	
	// Checks that at least one search field is filled out
	if (checkEmpty($_POST)){
		
		// Search for parks with matching criteria
		searchParks($_POST);
	}
	else {
	
		// Display error message on Search page
		include 'searchForm.inc';
	}
	
	


?>
</html>