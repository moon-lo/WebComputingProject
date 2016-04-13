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