<!-- Task: Delete Doctor - landing page -->
<!-- Programmer: Rena Li -->
<!-- Date: Nov 25, 2022 -->

<!DOCTYPE html>
<html>
<head>
<title>Delete Doctor</title>
<link rel="stylesheet" type="text/css" href="assign3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
</head>
<body>

<?php
include "connectdb.php"; //connect to the database
?>

<h1> Delete Doctor</h1>
<!--Creation of new form to redirect to helper file --> 
<form action="helperdelete.php" method="post" >
<!--Prompt user for license num of doctor they want to delete --> 
Enter License Number (format AB12): <input type="text" name="licnum"><br>
<!--Submit button to complete form and trigger helper file--> 
<input type="submit" value="Delete Doctor">
</form>

</body>
</html>