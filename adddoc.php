<!-- Task: Insert New Doctor - helper page not shown to users that checks inputs and inserts correct inputs into database with query-->
<!-- Programmer: Rena Li -->
<!-- Date: Nov 25, 2022 -->

<?php
include 'connectdb.php'; // connect to database

//Store values into variables to use in query
$licensenum = $_POST["licnum"];
$firstname = $_POST["first"];
$lastname = $_POST["last"];
$licensedate = $_POST["licdate"];
$birthdate = $_POST["birthdate"];
$hosworksat = $_POST["hosworksat"];
$speciality = $_POST["spec"];
// Query with correct inputs to insert new doctor into database
$query= 'INSERT INTO doctor VALUES ("' . $licensenum.'","' . $firstname.'","' . $lastname.'","' . $licensedate.'","' . $birthdate.'","' . $hosworksat.'","' . $speciality .'");';


if (!mysqli_query($connection,$query)) {
    die ("Error while trying to add new doctor. " . "<br>" . mysqli_error($connection));
}
?>

<script>
/*Alerts user of successful insertion and redirects them back to page to view doctors to see newly inserted doctor info */
alert("Success! New Doctor Inserted to Database. Taking you to view current doctors...")
window.location="getdoc.php"
</script>





