<?php
	
	include 'setup.inc';
	

	function checkEmpty($field_list) {
	
		$filled = false; 
		
		if (!empty($field_list['parkName'])){
			$filled = true;
		}
		if (!empty($field_list['rating'])){
			$filled = true;
		}
		if (!empty($field_list['suburb'])){
			$filled = true;
		}
		
		return $filled;	
	}
	
	function searchParks($field_list) {
		
		$search_fields = array('parkName', 'rating', 'suburb');
		$criteria = array();
		$search_query = "SELECT ParkName, Street, Suburb FROM parks WHERE ";
		
		foreach($search_fields as $field){
			if(!empty($field_list[$field])){
				$criteria[] = "`$field` LIKE '%$field_list[$field]%'";
			}
		}
		
		$search_query .= implode(' AND ', $criteria);
		
		return $search_query;
	}
	
	
	function displayParks($result) {
		
		echo '<div class="table"><table>';
		echo '<tr id="headings"><td>Park Name</td><td>Street Name</td><td>Suburb</td></tr>';
		
		// Loop here to generate dynamic table DISPLAYS ALL PARKS
		foreach ($result as $park){
			$pName = formatString($park['ParkName']);
			$pSt = formatString($park['Street']);
			$pSub = formatString($park['Suburb']);
			echo "<tr>";
			echo "<td><a href=''>$pName</td>";
			echo "<td>$pSt</td>";
			echo "<td>$pSub</td>";
			echo "</tr>";
		}
		echo '</table></div>';
		
	}
	
	function displaySearchCriteria() {
	
		$mes_str = "<p class=\"searchCriteria\">Results for ";
	
		if (!empty($_POST['parkName'])){
			$mes_str .= "Park name: '$_POST[parkName]' | ";
		}
		if (!empty($_POST['rating'])){
			$mes_str .= "Rating: '$_POST[rating]/5' | ";
		}
		if (!empty($_POST['suburb'])){
			$mes_str .= "Suburb: '$_POST[suburb]' | ";
		}
		
		$mes_str .= "</p>";
		echo $mes_str;
	}
	
	function displayLocation(){
		$mes_str = "<p class=\"searchCriteria\">Results for parks near you ( Latitude: $_GET[lat] | Longitude: $_GET[lon] )";
		echo $mes_str;
	}
	
	function formatString($str){
		$str = strtolower($str);
		$str = ucwords($str);
		return $str;
	}
	
	
	
	
	
	
	
	
?>