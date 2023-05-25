<!-- Task: Updates Number of Beds - landing page -->
<!-- Programmer: 08 -->
<!-- Date: Nov 25 -->

<!DOCTYPE html>
<html>
<head>
<title>Update Number of Beds at Hospital</title>
<link rel="stylesheet" type="text/css" href="assign3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
</head>
<body>

<?php
        include "connectdb.php";  //connect to the database
?>

<h1> Update Number of Beds at Hospital</h1>

<h3>Select Hospital Code:</h3>

<!-- Form to complete following and trigger helper file -->
<form action="helperupdate.php" method="post">

<?php
// Query to get existing hospitals based on code
        $query = "SELECT hoscode FROM hospital;";
        $result = mysqli_query($connection,$query);
        if (!$result) {
        die("databases query failed.");
 }

 // Fetch data and display as radio buttons for user to seelct from
while ($row = mysqli_fetch_assoc($result)) {
        echo "<input type ='radio' name='hoscode' id ='".$row["hoscode"]."'value='".$row["hoscode"]."'required>";
        echo "<label for='".$row["hoscode"]."'>".$row["hoscode"]."</label><br>";
        }
mysqli_free_result($result);
?>

<br>

<h3>Update Number of Beds to:</h3>
<!-- Prompt user to enter number of sets they want to update to -->
<input type="number" id="beds" name="beds" min="1" max="1000000000000">

<br>
<br>
<br>
<!-- Submit button that completes form and triggers new file -->
<input type="submit" value="View Hospital Information">

</form>

</body>
</html>