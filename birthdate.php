<!-- Task: View Doctor Information - in ascending order of birth date-->
<!-- Programmer: 08 -->
<!-- Date: Nov 25 -->

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Doctor Information</title>
<link rel="stylesheet" type="text/css" href="assign3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
</head>

<body>
<?php
        include "connectdb.php" // connect to database
?>

<!-- Buttons to Select for either Asc or Desc Order, redirects to javascript at bottom of page -->
<h1>List of Doctors by Birth Date (in Ascending Order)</h1>
<input type="button" name="ques2" id="asc" value="Ascending" onclick="displayAsc()">
<input type="button" name="ques2" id="desc" value="Descending" onclick="displayDesc()"><br>
<br>
<?php
/* Uses query to display doctor information from database based on selected ordering of birth date ascending */
        $query = "SELECT * FROM doctor ORDER BY birthdate";
        $result = mysqli_query($connection,$query);
        if (!$result) {
                die("databases query failed.");
        }

        /*Creating a table to display info */
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

        /*Getting info from database */
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
<!-- Button to return to main page -->
<input type="button" value="Take me back to Main Page" onclick="main()"><br>

</body>

<script>
/* Javascript functions to redirect user to new page depending on selection (asc order - same page, desc - mew page, main page) */
function displayAsc(){
        window.location="birthdate.php";
}
function displayDesc(){
        window.location="birthdateDesc.php";
}
function main(){
        window.location="website.php";
}
</script>

</html>
