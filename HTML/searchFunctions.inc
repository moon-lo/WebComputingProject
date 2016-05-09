<?php

	function checkEmpty($field_list) {
	
		$filled = false; 
		
		if (!empty($field_list['parkName'])){
			$filled = true;
		}
		if (!empty($field_list['rating'])){
			$filled = true;
		}
		if (!empty($field_list['suburbs'])){
			$filled = true;
		}
		if (!empty($field_list['parkSize'])){
			$filled = true;
		}
		
		return $filled;	
	}
	
	function searchParks($field_list) {
		$parks = array(1, 2, 3);
		
		if (!empty($field_list['parkName'])){
			// If field is not empty, search for park and add to array
			// getPark
		}
		
		if (!empty($field_list['rating'])){
			// If field is not empty, search for park and add to array
			// getPark
		}
		
		if (!empty($field_list['suburbs'])){
			// If field is not empty, search for park and add to array
			// getPark
		}
		
		if (!empty($field_list['parkSize'])){
			// If field is not empty, search for park and add to array
			// getPark
		}
		
		// Checks to see if there are any valid results
		$parks = array_filter($parks);
		if (empty($parks)) {
			include 'searchResultsNull.inc';
		}
		else {
			
			// Remove duplicate results from array
			$GLOBALS['parks'] = array_unique($parks);
			
			// Display search results page and generate dynamic table for results
			include 'searchResultsTrue.inc';
			
		}
		
	}
	
	function getPark(&$parks, $key) {
		// Search database for matching parks add to array
	}
	
	function displayParks($parks) {
		// Unsure of how the database will return the array yet, this is hard coded for now
		
		echo '<div class="table"><table>';
		echo '<tr id="headings"><td>Park Name</td><td>Street Name</td><td>Suburb</td></tr>';
		
		// Loop here to generate dynamic table
		
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
		if (!empty($_POST['suburbs'])){
			$mes_str .= "Suburb: '$_POST[suburbs]' | ";
		}
		if (!empty($_POST['parkSize'])){
			$mes_str .= "Park size: ";
			foreach ($_POST['parkSize'] as $val) {
				$mes_str .= " $val";
			}
		}
		
		$mes_str .= "</p>";
		echo $mes_str;
	}
	
	
	
	
	
	
	
	
	
	
?>