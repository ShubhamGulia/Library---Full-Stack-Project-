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

$sql = "SELECT * FROM DOCUMENT" ;
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "TITLE : " . $row["TITLE"]. " - DOCID : " . $row["DOCID"]. " - PUBLISHERID :" . $row["PUBLISHERID"]. " - PDATE :" . $row["PDATE"]. "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body style="background-image:url('Images/hello.jpg')">

</body>
</html>