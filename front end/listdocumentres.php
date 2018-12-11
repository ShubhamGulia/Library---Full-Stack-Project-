<!DOCTYPE html>
<html>
<body style="background-image:url('Images/hello.jpg')">
<h1>PLEASE CONFIRM YOUR IDENTITY</h1>
<h2></h2>
<form action="" method="post">
<table>
<tr>
    <td>Enter your READER ID :</td>
    <td><input type="text" name="READERID" required/></td>
</tr>
</table>
<p></p>
<input type="submit" value="submit"/>
</form>
<form action="READERID.php" method="post">
<input type="submit" value="Cancel"/>
</form>
<p></p>
</body>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "7868499555";
$dbname = "libraryfinal";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST['READERID']))
{
$READERID = $_POST['READERID'];

$sql = "SELECT RESUMBER, DOCID, DTIME FROM RESERVES where READERID='$READERID'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "RESUMBER: " . $row["RESUMBER"]. " - DOCID: " . $row["DOCID"]. " - DATE TIME" . $row["DTIME"]. "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
}
?>
