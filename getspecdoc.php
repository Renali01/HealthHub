<!-- Task: View Doctor Info with Selected Speciality - helper page that produces results based on user selected speciality -->
<!-- Programmer: Rena Li -->
<!-- Date: Nov 25, 2022 -->

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>List of Doctors Spec</title>
<link rel="stylesheet" type="text/css" href="assign3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
</head>

<body>
<?php
include "connectdb.php";
$whichSpec = $_POST["speciality"]; // store value of speciality from variable
echo "<h1>". "List of Doctors with Specialty of " . $whichSpec."s: </h1>";
$query = "SELECT * FROM doctor WHERE speciality='".$whichSpec."';"; // fill in with correct query
// echo "<br>" . $query . "<br>"; //this line is just to help you debug

$result = mysqli_query($connection, $query);
if (!$result) {
        die("databases query failed. ");
}

/*Creating table to display results */
echo "<table border='1'>

<tr>
<th>License Number</th>
<th>First Name</th>
<th>Last Name</th>
<th>License Date</th>
<th>Birth date</th>
<th>Hospital Works At</th>
<th>Speciality</th>
</tr>";

/*Fetching the doctor info from database and dispplaying it in the table */
while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['licensenum'] . "</td>";
        echo "<td>" . $row['firstname'] . "</td>";
        echo "<td>" . $row['lastname'] . "</td>";
        echo "<td>" . $row['licensedate'] . "</td>";
        echo "<td>" . $row['birthdate'] . "</td>";
        echo "<td>" . $row['hosworksat'] . "</td>";
        echo "<td>" . $row['speciality'] . "</td>";
        echo "</tr>";
}

echo "</table>";
 mysqli_free_result($result);
?>

<br>
<!-- Button to return to main page with JS button after -->
<input type="button" value="Take me back to Main Page" onclick="main()"><br>

<script>
function main(){
        window.location="website.php";
}
</script>


</body>
</html>

