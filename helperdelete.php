<!-- Task: Delete Doctor - helper php (not shown to users) that checks if attempted delete input is valid and if yes, deletes from database with query-->
<!-- Programmer: 08 -->
<!-- Date: Nov 25 -->

<!DOCTYPE html>
<html>
<head>
<title>Delete Doctor</title>
</head>
<body>

<?php
include 'connectdb.php';
$licensenum = $_POST["licnum"];
$query1= 'SELECT * FROM doctor WHERE licensenum = "' . $licensenum .'";'; //  first check: check if licensenum does not exist
$query2= 'SELECT headdoc FROM hospital WHERE headdoc = "' . $licensenum .'";'; // second check: check if doc is headdoc
$query3= 'SELECT licensenum FROM looksafter WHERE licensenum = "' . $licensenum .'";'; // third check: check if doc treats patients
$query4= 'DELETE FROM doctor WHERE licensenum= "' . $licensenum .'";'; // actual query to delete from databases - once all checks are passed!

// Store results of calling the queries
$result1 = mysqli_query($connection,$query1);
$result2 = mysqli_query($connection,$query2);
$result3 = mysqli_query($connection,$query3);
$result4 = mysqli_query($connection,$query4);

// Check validity of query
if (!$result1) {
    echo"'Error while trying to delete doctor. ' . '<br>' . mysqli_error($connection)' ";
}
// if number of rows is 0, then the license num does not exist in database and therefore doctor does not exist
else if (mysqli_num_rows($result1) == 0){
    // Button to return to main page
    echo"Error while attempting to deleting doctor. " . "<br>" . "License number does not exist in database.";
    echo"<br>";
    echo"<br>";
    echo "<input type='button' id='2' value='Take me back to Main Page' onclick='main()'>";
}

// Check validity of query
else if (!$result2) {
    echo'"Error while trying to delete doctor. " . "<br>" . mysqli_error($connection)"';
}

// if number of rows is NOT 0, therefore at least a value of 1 is produced, then the license num does belong to a head doctor and therefore cannot be deleted
else if (mysqli_num_rows($result2) != 0){
    echo"Unable to delete doctor. " . "<br>" . "Doctor selected is a head doctor of a hospital or/and currently treating patients.";
}

// Check validity of query
else if (!$result3) {
    echo'"Error while trying to delete doctor. " . "<br>" . mysqli_error($connection)"';
}

// if number of rows is NOT 0, therefore at least a value of 1 is produced, then the license num does belong to a doctor that treats patients and thus can't be deleted
else if (mysqli_num_rows($result3) != 0){
    echo"Unable to delete doctor. " . "<br>" . "Doctor selected is a head doctor of a hospital or/and currently treating patients.";
}

else{
    // if gotten to this point: then all checks complete and we can now delete from database
    echo"Are you sure you want to delete? Deletions are permanent! Go back if you wish to undo."; // Final call for user to change their mind
    echo '<input type="button" value="Yes, Delete" onclick="displayDelete()">';
    echo"<br>";
}

?>

<script>
// Based on user selection, calls for different results

// If user goes through with deletion, then query is called
function displayDelete(){
<?php
if (!$result4) { // the actual delete statement!
    die ("Error while trying to delete doctor. " . "<br>" . mysqli_error($connection));
}
?>
    // Final outputs for successful deletion, direts user to different page to view current doctor information to see doctor has now been deleted
    alert("Success! Doctor Deleted from Database. Taking you to view current doctors...")
    window.location="getdoc.php"
}

// Return to main page
function main(){
    window.location="website.php";
}

</script>
