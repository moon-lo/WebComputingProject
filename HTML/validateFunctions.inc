<?php
function validateLogin(&$errors, $field_list){
	
	$validated = true;
	
	if(empty($field_list['username'])){
		$errors['username'] = 'Username cannot be empty.';
		$validated = false;
	}

	if(empty($field_list['psw'])){
		$errors['psw'] = 'Password cannot be empty.';
		$validated = false;
	}	
	
	return $validated;
	
}



?>