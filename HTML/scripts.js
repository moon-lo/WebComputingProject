/*function checkPassword(psw) {
	//var p = document.getElementsById("psw").value;
	//var psw = document.getElementsByName("cpsw").value; 
	if (psw.value != document.getElementsById("psw").value) {
		window.alert("what");
		input.setCustomValidity('Passwords do not match.');
	} else {
		input.setCustomValidity('');
	}
}*/

function validate () {
	
	var validated = true;
	
	if (checkPassword()) {
		document.forms["registration"]["cpsw"].setCustomValidity("Passwords must match.");
		document.forms["registration"]["cpsw"].style.backgroundColor = "#ff9999";
		document.forms["registration"]["cpsw"].focus();
		validated = false;
	}
	
	if (validated) {
		window.alert("Form validated!");
	}
	
	return validated;
	
}

function checkPassword() {
	var p = document.forms["registration"]["psw"].value;
	var p2 = document.forms["registration"]["cpsw"].value;
	
	if (p == null || p == "" || p2 == null || p2 == "") {
		return true;
	}
	else if (p  !== p2) {
		return true;
	}
	else {
		return false;
	}
}


function hideError() {
	document.forms["registration"]["cpsw"].style.backgroundColor = "white";
}

/* Functions related to resizable screens (incomplete)

function showMenu() {
	//window.alert("working");
	document.getElementById("navMenu").style.display = "inline-block";
}

function hideMenu() {
	document.getElementById("navMenu").style.display = "none";
}

function defaultMenu() {
	window.alert("ok");
} */

/* function validate () {
	
	var validated = true;
	
	if (checkName()) {
		//window.alert("Missing surname");
		document.getElementById("surnameMissing").style.visibility = "visible";
		document.getElementById("surname").focus();
		validated = false;
	}
	
	if (checkPassword()) {
		window.alert("Please make sure that the passwords match");
		validated = false;
	}
	
	if (validated) {
		window.alert("Form validated!");
	}
	
	return validated;
	
}

function checkName() {
	var x = document.forms["myform"]["surname"].value;
	if (x == null || x == "") {
		return true;
	}
	else {
		return false;
	}
}

function hideError() {
	document.getElementById("surnameMissing").style.visibility = "hidden";
}

function checkPassword() {
	var p = document.forms["myform"]["psw"].value;
	var p2 = document.forms["myform"]["conpsw"].value;
	
	if (p == null || p == "" || p2 == null || p2 == "") {
		return true;
	}
	else if (p  !== p2) {
		return true;
	}
	else {
		return false;
	}
} */