/*
Javascript file that redirects user to correct webpage based on selection on main menu
Programmer: 08
Date: Nov 25, 2022
*/

function SelectTask(){
	switch(document.getElementById('selection').value){
		case "doctor":
			window.location="getdoc.php";
			break;
		case "spec":
			window.location="getspec.php";
			break;
		case "insert":
			window.location="insertdoc.php";
			break;
		case "delete":
			window.location="deletedoc.php";
			break;
		case "assign":
			window.location="assigndoc.php";
			break;
		case "view":
			window.location="getpatients.php";
			break;
		case "hosp":
			window.location="hos.php";
			break;
		case "update":
			window.location="updatebeds.php"
			break;
	}
}
