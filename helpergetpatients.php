<!-- Task: Get Patients of Selected Doctor - helper page that produces results based on user's selected doctor -->
<!-- Programmer: 08 -->
<!-- Date: Nov 25 -->

<!DOCTYPE html>
<html>
<head>
<title>View Doctor's Patients</title>
<link rel="stylesheet" type="text/css" href="assign3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
</head>
<body>

<h1> View Doctor's Patients</h1>

<h3>Patients of Doctor Selected:</h3>

<?php
    include 'connectdb.php'; // connect to database

$licensenum = $_POST["licensenum"]; // store licensenum into variable

$query= 'SELECT * FROM patient WHERE ohipnum IN (SELECT ohipnum FROM looksafter WHERE licensenum= "' . $licensenum .'");'; // get correct query
$result = mysqli_query($connection,$query);

if (!mysqli_query($connection,$query)) {
    die ("Error while retrieving doctor's patients " . "<br>" . mysqli_error($connection));
}

// If number of rows is 0, then doctor has no assigned patients, table not displayed
if (mysqli_num_rows($result) == 0){ 
    die("Doctor has no assigned patients.");
}

// Create table to display information of patients
echo "<table border='1'>

<tr>
<th>Patient First Name</th>
<th>Patient Last Name</th>
<th>Patient OHip Number</th>
</tr>";

// Fetch patient information, display into table
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['firstname'] . "</td>";
    echo "<td>" . $row['lastname'] . "</td>";
    echo "<td>" . $row['ohipnum'] . "</td>";
    echo "</tr>";
    }

echo "</table>";
mysqli_free_result($result);
?>

<br>
<!-- Button to take back to main page-->
<input type="button" value="Take me back to Main Page" onclick="main()"><br>

<script>
function main(){
        window.location="website.php";
}
</script>


</body>
</html>