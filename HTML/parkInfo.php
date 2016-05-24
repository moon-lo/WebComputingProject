<?php

	include 'setup.inc';
	include 'searchFunctions.inc';
	
	$parkID = $_GET['ParkID'];
	
	$query = "SELECT ParkName, Street, Suburb, DogParkName, DogParkArea, Latitude, Longitude FROM parks WHERE ParkID = $parkID";
	$query_rating = "SELECT AVG(rating) FROM reviews WHERE ParkID = $parkID";
	
	$results = $pdo->query($query);
	$micro = $pdo->query($query);
	$avg = $pdo->query($query_rating);
	
	
	function microDataPlace($micro){
		foreach ($micro as $data){
			$name = formatString($data['ParkName']);
			$lat = $data['Latitude'];
			$lng = $data['Longitude'];
			$street = formatString($data['Street']);
		}
		
		echo "
		<script type=\"application/ld+json\">{
		  \"@context\": \"http://fastapps04.qut.edu.au:8080/n9050159/HTML/index.php\",
		  \"@type\": \"Place\",
		  \"geo\": {
			\"@type\": \"GeoCoordinates\",
			\"latitude\": \"$lat\",
			\"longitude\": \"$lng\"
		  },
		  \"name\": \"$name\",
		  \"address\": {
			  \"@type\": \"PostalAddress\",
			  \"addressLocality\": \"Brisbane\",
			  \"addressRegion\": \"QLD\",
			  \"streetAddress\": \"$street\"
		  },
		  \"url\": \"http://fastapps04.qut.edu.au:8080/n9050159/HTML/park.php?ParkID=$_GET[ParkID]\"
		}</script>
		";
	}
	
	
	function displayParkInfo($results, $avg){
		foreach ($results as $park){
			$pName = formatString($park['ParkName']);
			$pSt = formatString($park['Street']);
			$pSub = formatString($park['Suburb']);
			$pDPname = formatString($park['DogParkName']);
			$pArea = formatString($park['DogParkArea']);
			$pLat = $park['Latitude'];
			$pLng = $park['Longitude'];
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
		
		echo "<div id='map'><script> 
			function initMap() {
			var myLatLng = {lat: $pLat, lng: $pLng};

			var map = new google.maps.Map(document.getElementById('map'), {
				zoom: 12,
				center: myLatLng
			});

			var marker = new google.maps.Marker({
				position: myLatLng,
				map: map,
				title: 'Dog Park Location'
			});

			var markerLabel = '<b>$pName</b></br> $pSt, $pSub';

			var infowindow = new google.maps.InfoWindow({
				content: markerLabel
			});

			marker.addListener('click', function() {
				infowindow.open(map, marker);
			});
			}
			</script>
			<script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyBvUsbUSmkyhKNo4CfPWXtA26ytz3Qr01s&callback=initMap' async defer></script></div>";
		
	}
	
	
	
?>