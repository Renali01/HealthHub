<!-- Task: Gets Hospital Information - landing page -->
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
<?php
    include "connectdb.php";  //connect to the database
?>

<h1> View Hospital Information</h1>

<h3>Select Hospital Code:</h3>

<!-- Form to complete that triggers helper file -->
<form action="helperhos.php" method="post">

<?php
// Query to get list of existing hospital codes
$query = "SELECT hoscode FROM hospital;";
$result = mysqli_query($connection,$query);
if (!$result) {
    die("databases query failed.");
}
// Display as radio buttons for user to select one from
while ($row = mysqli_fetch_assoc($result)) {
        echo "<input type ='radio' name='hoscode' id ='".$row["hoscode"]."'value='".$row["hoscode"]."'required>";
        echo "<label for='".$row["hoscode"]."'>".$row["hoscode"]."</label><br>";
        }
mysqli_free_result($result);
?>

<br>
<!-- Submit button to complete form and trigger helper file-->
<input type="submit" value="View Hospital Information">
</form>

</body>
</html>

