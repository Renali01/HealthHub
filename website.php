<!-- Main Page: Menu of all options of tasks for user to choose from-->
<!-- Programmer: Rena Li -->
<!-- Date: Nov 25, 2022 -->

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Rena's Hospital Website</title>
<link rel="stylesheet" type="text/css" href="assign3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
<script src="gettask.js"></script>
</head>

<body>

<!-- Menu of Options -->
<h1>Welcome to the Hospital</h1>
<h3>Select a task:</h3>
   <select id="selection" NAME="section1">
	<option value="select">Select task</option>
	<option	value="doctor">View Doctor Information</option>
	<option value="spec">View Doctor with Specialty</option>
	<option value="insert">Insert Doctor</option>
	<option value="delete">Delete Doctor</option>
	<option value="assign">Assign Doctor to Patient</option>
	<option value="view">View Doctor's Patients</option>
	<option value="hosp">View Hospital Information</option>
	<option value="update">Update Hospital Beds</option>
   </select>
<!-- Submit button that takes us to SelectTask() function in javascript file -->
<input type="submit" name="submit" value="Submit" onclick="return SelectTask();"> 

</body>
</html>
