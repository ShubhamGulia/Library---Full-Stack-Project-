<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
}
</style>
</head>
<body style="background-image:url('Images/library.jpg')">

<?php
$servername = "localhost";
$username = "root";
$password = "7868499555";
$dbname = "libraryfinal";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT lname, llocation FROM Branch";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo '<h2> Branch Information </h2>';
    echo "<table><tr><th>Branch</th><th>Location</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["lname"]. "</td><td>" . $row["llocation"]. "</td></tr>";
    }
    echo "</table>";
	echo '<br><form name="Back" action="admin_menu.php" method="post">';
	echo '<input type="submit" value="Main Menu"/>';
	echo '</form>';
} else {
    echo "0 results";
	echo '<form name="Back" action="new_top.php" method="post">';
	echo '<input type="submit" value="<< Back"/>';
	echo '</form>';
}

$conn->close();
?> 
<!--add button-->
</body>
</html>