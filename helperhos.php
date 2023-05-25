<!-- Task: Gets Hospital Information - helper page that displays tables of info based on user selection -->
<!-- Programmer: 08 -->
<!-- Date: Nov 25 -->

<!DOCTYPE html>
<html>
<head>
<title>View Hospital Information</title>
<link rel="stylesheet" type="text/css" href="assign3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
</head>
<body>

<h1> View Hospital Information</h1>

<h3>General Hospital Information:</h3>
<?php
    include 'connectdb.php'; // connect to db
$hoscode = $_POST["hoscode"];

// first query: to retrieve basic info of hospital with name of head doc of selected hospital
$query1='SELECT hospital.hosname, hospital.city, hospital.prov, hospital.numofbed, doctor.firstname, doctor.lastname FROM hospital, doctor WHERE licensenum IN (SELECT headdoc FROM hospital WHERE hoscode = "' . $hoscode .'") AND hoscode= "' . $hoscode .'";';
// second query: to retrieve names of all doctors that work at hospital (NOTE: it is possible for a hospital to be assigned a head doc but have no doctors working there)
$query2='SELECT * FROM doctor WHERE hosworksat = "' . $hoscode .'";';

$result1 = mysqli_query($connection,$query1);
$result2 = mysqli_query($connection,$query2);

// Check validities of queries
if (!$result1) {
    die ("Error while trying to view hospital information 1. " . "<br>" . mysqli_error($connection));
}

if (!$result2) {
   die ("Error while trying to view hospital information 2. " . "<br>" . mysqli_error($connection));
}

// TABLE 1: Create the first table using the first query to display basic hospital info with name of head doc
echo "<table border='1'>

<tr>
<th>Hospital Name</th>
<th>Hospital City</th>
<th>Hospital Province</th>
<th>Number of Beds</th>
<th>Head Doctor First Name</th>
<th>Head Doctor Last Name</th>
</tr>";

// get information and display in table
while ($row = mysqli_fetch_assoc($result1)) {
    echo "<tr>";
    echo "<td>" . $row['hosname'] . "</td>";
    echo "<td>" . $row['city'] . "</td>";
    echo "<td>" . $row['prov'] . "</td>";
    echo "<td>" . $row['numofbed'] . "</td>";
    echo "<td>" . $row['firstname'] . "</td>";
    echo "<td>" . $row['lastname'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_free_result($result1);
?>

<br>
<br>

<h3>All Doctors at Hospital:</h3>
<?php
// TABLE 2: Create a second table using the second query to display names of all doctors working at selected hospital - possible to return none!!
echo "<table border='1'>

<tr>
<th>Doctor First Name</th>
<th>Doctor Last Name</th>
</tr>";

// fetch info and display in table
while ($row = mysqli_fetch_assoc($result2)) {
    echo "<tr>";
    echo "<td>" . $row['firstname'] . "</td>";
    echo "<td>" . $row['lastname'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_free_result($result2);
?>

<br>
<br>
<!-- Button to return to main page-->
<input type="button" value="Take me back to Main Page" onclick="main()"><br>

<script>
function main(){
        window.location="website.php";
}
</script>


</body>
</html>