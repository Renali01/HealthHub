<!-- Task: Updates Number of Beds - helper php (not shown to users) that updates number of beds with query-->
<!-- Programmer: 08 -->
<!-- Date: Nov 25 -->

<?php
include 'connectdb.php'; // connects to db
$hoscode = $_POST["hoscode"]; // stores hospital code value into variable
$numofbed = $_POST["beds"]; // stores num of beds value into variable
$query= 'UPDATE hospital SET numofbed= "' . $numofbed .'" WHERE hoscode= "' . $hoscode .'";'; // correct query

if (!mysqli_query($connection,$query)) {
die ("Error while trying to add new doctor. " . "<br>" . mysqli_error($connection));
}
?>

<!-- if updated correctly, result in successful alert and redirects user to new page to view hospital information to see updated num of beds -->
<script>
alert("Success! Updated Number of Beds in Hospital. Taking you to view hospital information..")
window.location="hos.php"

</script>





