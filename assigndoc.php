<!-- Task: Assign Doctor to Patient - landing page -->
<!-- Programmer: Rena Li -->
<!-- Date: Nov 25, 2022 -->

<!DOCTYPE html>
<html>
<head>
<title>Assign Doctor to Patient</title>
<link rel="stylesheet" type="text/css" href="assign3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
</head>
<body>

<?php
    include "connectdb.php"; //connect to the database
?>

<h1> Assign Doctor to Patient</h1>

<h3>Select License Number of Doctor:</h3>

<!-- Form to redirect to helper file to assign doctor to patient-->
<form action="helperassign.php" method="post">

<?php
// Use query to display existing licensenumbers from doctor
$query = "SELECT DISTINCT(licensenum) FROM doctor";
$result = mysqli_query($connection,$query);
if (!$result) {
    die("databases query failed.");
}
// display as radio button list for users to choose one from
while ($row = mysqli_fetch_assoc($result)) {
    echo "<input type ='radio' name='licensenum' id ='".$row["licensenum"]."'value='".$row["licensenum"]."'required>";
    echo "<label for='".$row["licensenum"]."'>".$row["licensenum"]."</label><br>";
    }
mysqli_free_result($result);
?>

<br>

<h3>Select OHip Number of Patient:</h3>
<?php
// Use query to display existing ohipnumbers of patients
$query = "SELECT DISTINCT(ohipnum) FROM patient";
$result = mysqli_query($connection,$query);
if (!$result) {
    die("databases query failed.");
}
// display as radio button list for users to choose one from
while ($row = mysqli_fetch_assoc($result)) {
    echo "<input type ='radio' name='ohipnum' id ='".$row["ohipnum"]."'value='".$row["ohipnum"]."'required>";
        echo "<label for='".$row["ohipnum"]."'>".$row["ohipnum"]."</label><br>";
    }
mysqli_free_result($result);
?>

<br>
<!-- Submit button to complete form and trigger helper file-->
<input type="submit" value="Assign Doctor to Patient">

</form>

</body>
</html>