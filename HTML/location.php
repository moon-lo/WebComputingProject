<html>
<?php
	
	include 'setup.inc';
	
	/* if(isset($_GET["lat"]) && isset($_GET["lon"])){
		echo $_GET["lat"];
		echo $_GET["lon"];
	} */
	
	
	$lat = $_GET["lat"];
	$lon = $_GET["lon"];
	
	$query = "SELECT ParkName, Street, Suburb FROM parks WHERE (($lat - 0.02) < Latitude) && (Latitude < ($lat + 0.02)) && (($lon - 0.02) < Longitude) && (Longitude < ($lon + 0.02))";
	$results = $pdo->query($query);
	
	/* foreach ($results as $park){
		echo $park['ParkName'];
		echo "</br>";
	} */
	
	include 'searchResultsTrueLoc.inc';
	
?>
</html>