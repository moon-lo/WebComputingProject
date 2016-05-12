<html>
<?php

/* 	echo $_POST['parkName'];
	echo '<br/>';
	echo $_POST['rating'];
	echo '<br/>';
	echo $_POST['suburbs'];
	echo '<br/>';
	
*/
	
	include 'setup.inc';
	
	require 'searchFunctions.inc';
	
	// Checks that at least one search field is filled out
	if (checkEmpty($_POST)){
		
		// Search for parks with matching criteria
		$query = searchParks($_POST);
		$rowNum = $pdo->prepare($query);
		$rowNum->execute();
		$results = $pdo->query($query);
		
		// Checks that the results are not empty
		if ($rowNum->rowCount()==0){
			include 'searchResultsNull.inc';
		}
		else {
			include 'searchResultsTrue.inc';
			//echo $rowNum->rowCount();
			
		}
		
	}
	else {
	
		// Display error message on Search page
		include 'searchForm.inc';
	}
	
		/* foreach($results as $park){
		if(empty($park['ParkName']) || is_null($park['ParkName'])){
			echo "empty name";
		} else {
			echo "not empty???";
		} */
		/* echo $park['ParkName'];
		echo "</br>";
		echo $park['Street'];
		echo "</br>";
		echo $park['Suburb'];
		echo "</br>"; 
	} */


?>
</html>