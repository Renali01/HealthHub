<!-- Task: Get Patients of Selected Doctor - landing page -->
<!-- Programmer: Rena Li -->
<!-- Date: Nov 25, 2022 -->

<!DOCTYPE html>
<html>
<head>
 <title>View Doctor's Patients</title>
 <link rel="stylesheet" type="text/css" href="assign3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
</head>
<body>
<?php
    include "connectdb.php"; //connect to the database
?>
<h1> View Doctor's Patients</h1>

<h3>Select License Number of Doctor:</h3>

<!-- Form to complete to trigger helper file -->
<form action="helpergetpatients.php" method="post">

<?php
// Query to get existing licensenumbers of doctors
$query = "SELECT DISTINCT(licensenum) FROM doctor";
$result = mysqli_query($connection,$query);
if (!$result) {
    die("databases query failed.");
}
// Display as radio buttons for user to select one from
while ($row = mysqli_fetch_assoc($result)) {
    echo "<input type ='radio' name='licensenum' id ='".$row["licensenum"]."'value='".$row["licensenum"]."'required>";
        echo "<label for='".$row["licensenum"]."'>".$row["licensenum"]."</label><br>";
    }
mysqli_free_result($result);
?>

<br>
<!-- Submit button to complete form-->
<input type="submit" value="See Doctor's Patients">

</form>

</body>
</html>

