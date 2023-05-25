<!-- Task: View Doctor Info with Selected Speciality - landing page -->
<!-- Programmer: 08 -->
<!-- Date: Nov 25 -->

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Doctor with Specialty</title>
<link rel="stylesheet" type="text/css" href="assign3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
</head>

<body>
<?php
	include "connectdb.php" // connect to database
?>

<h1>View Doctor with Speciality</h1>

<h3>Select speciality:</h3>

<!-- Create form that will redirect to new page when completed -->
<form action="getspecdoc.php" method="post">

<?php
$query = "SELECT DISTINCT(speciality) FROM doctor";
$result = mysqli_query($connection,$query);

if (!$result) {
        die("databases query failed.");
}

/*Fetching the doctor info from database and displaying it in radio buttons, value stored in variable */
while ($row = mysqli_fetch_assoc($result)) {
        echo "<input type ='radio' name='speciality' id ='".$row["speciality"]."'value='".$row["speciality"]."'required>";
        echo "<label for='".$row["speciality"]."'>".$row["speciality"]."</label><br>";
        }
mysqli_free_result($result);
?>
<br> 
<!-- Button to submit and complete form -->
<input type="submit" name="submit" value="Submit">

</form>

</body>
</html>