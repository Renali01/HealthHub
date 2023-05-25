<!-- Task: View Doctor Information - landing page-->
<!-- Programmer: 08 -->
<!-- Date: Nov 25 -->

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Doctor Information</title>
<link rel="stylesheet" type="text/css" href="assign3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
</head>

<body>
<?php
include "connectdb.php" // connect to database
?>

<!-- Radio Buttons of Options (Last Name OR Birth Date) -->
<h1>View Doctor Information</h1>
<h3>Select order by last name or birth date:</h3>
<input type="radio" name="ques1" id="name" value="name">Last Name<br>
<input type="radio" name="ques1" id="birth" value="birth">Birth Date<br>
<br>
<!-- Submit that redirects to javascript function below-->
<input type="submit" name="submit" value="Submit" onclick="display();">

</body>

<script>
/* Depending on selections made in radio buttons, display the according webpage showing that ordering*/
function display(){
if (document.getElementById('name').checked){
	window.location="lastname.php";
}
else if(document.getElementById('birth').checked){
	window.location="birthdate.php";
}
}
</script>

</html>


