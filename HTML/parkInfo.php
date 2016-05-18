<?php

	include 'setup.inc';
	include 'searchFunctions.inc';
	
	$parkID = $_GET['ParkID'];
	
	$query = "SELECT ParkName, Street, Suburb, DogParkName, DogParkArea, Latitude, Longitude FROM parks WHERE ParkID = $parkID";
	$query_rating = "SELECT AVG(rating) FROM reviews WHERE ParkID = $parkID";
	
	$results = $pdo->query($query);
	$avg = $pdo->query($query_rating);
	
	
	function displayParkInfo($results, $avg){
		foreach ($results as $park){
			$pName = formatString($park['ParkName']);
			$pSt = formatString($park['Street']);
			$pSub = formatString($park['Suburb']);
			$pDPname = formatString($park['DogParkName']);
			$pArea = formatString($park['DogParkArea']);
		}
		$rating = $avg->fetch(PDO::FETCH_BOTH);
		$display_rating = round($rating[0], 1, PHP_ROUND_HALF_EVEN);
		if ($display_rating == 0){
			$display_rating = "No rating";
		} 
		
		echo "<h1>$pName</h1>";
		echo '<div class="parkInfo"><ul>';
		echo "<li>Dog Park Name: $pDPname</li>";
		echo "<li>Address: $pSt, $pSub</li>";
		echo "<li>Park Size: $pArea m&sup2</li>";
		echo "<li>Average Rating: $display_rating </li>";
		echo "</div>";
	}
	
	function avRating(){
		$query = "";
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
	
?>