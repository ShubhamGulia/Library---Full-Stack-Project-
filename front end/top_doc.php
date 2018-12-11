<!DOCTYPE html>
<html>
<body style="background-image:url('Images/library.jpg')">
<h2> Select Branch </h2>

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


session_start(); 
$_SESSION['lname'] = $lname;
$sql = "SELECT libid,lname FROM Branch";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    //echo "<table><tr><th>Branch</th><th>Location</th></tr>";
    // output data of each row
	echo "<form action='freq_bor.php' method='post'>";
    while($row = $result->fetch_assoc()) {
		//echo "<a href="/">"
   echo "<input required type='radio' name='libid' value='" . $row['libid'] . "' /> ". $row['lname'] . '<br />';
     }
	echo '<br>';
   echo "<input type='submit' value='Submit' /></form>";
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>
<p></p>
<form action="admin_menu.php" method="post">
<input type="submit" value="Cancel"/>
</form>
</body>
</html>