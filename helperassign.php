<!-- Task: Assign Doctor to Patient - helper php (not visible to users) that checks if assignment is valid and if yes, assigns with query -->
<!-- Programmer: Rena Li -->
<!-- Date: Nov 25, 2022 -->

<?php
include 'connectdb.php'; // connect to database
$licensenum = $_POST["licensenum"]; // store licensenum value into variable
$ohip = $_POST["ohipnum"]; // store ohipnum value into variable

$query1= 'SELECT * FROM looksafter WHERE ohipnum= "' . $ohip .'" AND licensenum= "' . $licensenum .'";'; //  first query: check if licensenum does no$
$query2= 'INSERT INTO looksafter VALUES ("' . $licensenum.'","' . $ohip .'");'; // second query: actual insertion once check is complete

$result1 = mysqli_query($connection,$query1);
$result2 = mysqli_query($connection,$query2);

if (!mysqli_query($connection,$query1)) {
    die ("Error while assign doctor to patient. " . "<br>" . mysqli_error($connection));
}

// If number of rows is not 0, thus at least 1, then doctor is already assigned to patient and cannot be reassigned
if (mysqli_num_rows($result1) != 0){ // relationship already exists
    die("Unable to assign doctor to patient. " . "<br>" . "Relationship between doctor and patient already exists.");
}

// Once check is complete, now we use query2 to assign new relationship
if (!$result2) { // the actual insert statement!
    die ("Error while trying to delete doctor. " . "<br>" . mysqli_error($connection));
}
?>

<script>
// Alert to show success of new assignment and redirects user to view list of updated patients treated by selected doctor
alert("Success! New Doctor Inserted to Database. Taking you to view the list of patients treated by doctors...")
window.location="getpatients.php"
</script>
