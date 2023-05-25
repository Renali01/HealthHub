<!-- Task: Insert New Doctor - landing page -->
<!-- Programmer: Rena Li -->
<!-- Date: Nov 25, 2022 -->

<!DOCTYPE html>
<html>
<head>
<title>Insert New Doctor</title>
<link rel="stylesheet" type="text/css" href="assign3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
</head>
<body>
<?php
        include "connectdb.php";  //connect to the database
?>

<!-- Prompting user for necessary input -->
<h1> Insert New Doctor</h1>
<form action="adddoc.php" method="post" >
Enter License Number (format AB12): <input type="text" name="licnum"><br>
Enter First Name: <input type="text" name="first"><br>
Enter Last Name: <input type="text" name="last"><br>
Enter License Date: <input type="date" name="licdate"><br>
Enter Birth Date: <input type="date" name="birthdate"><br>
Enter Speciality: <input type="text" name="spec"><br>
<!-- For Hospital Code, display existing codes as radio buttons to prevent users from selecting non existing codes -->
Enter Hospital Works At Code:
<br>
<form action="adddoc.php" method="post">
<?php
$query = "SELECT DISTINCT(hosworksat) FROM doctor";
$result = mysqli_query($connection,$query);
if (!$result) {
        die("databases query failed.");
}
// displaying it in radio buttons
while ($row = mysqli_fetch_assoc($result)) {
        echo "<input type ='radio' name='hosworksat' id ='".$row["hosworksat"]."'value='".$row["hosworksat"]."'required>";
        echo "<label for='".$row["hosworksat"]."'>".$row["hosworksat"]."</label><br>";
}

mysqli_free_result($result);

?>

<br>
<!-- Submit button that completes form and triggers new file -->
<input type="submit" value="Insert New Doctor">
</form>
</body>
</html>

