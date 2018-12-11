<?php
include 'dbinfo.php'; 
?> 
<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
}
</style>
</head>
<body>
<?php

$docid = $_POST['docid'];
$sql = "SELECT TITLE, DOCID, PUBLISHERID ,PDATE FROM DOCUMENT WHERE TITLE LIKE '%$docid%' OR DOCID='$docid'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
	
	echo "<table><tr><th>Title</th><th>Document ID</th><th>Publisher ID</th><th>Published Date</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["TITLE"]. "</td><td>" . $row["DOCID"]. "</td><td>" . $row["PUBLISHERID"]. "</td><td>" . $row["PDATE"]. "</td></tr>";
			}
    } 
	else {
		echo "<h2>ERROR</h2>";
    echo "<h4>No records found for the Document Name or ID like $docid.</h4>";
	echo '<form name="Back" action="find_doc.php" method="post">';
	echo '<input type="submit" value="<< Back"/>';
	echo '</form>';
	}

mysqli_close($conn);
?>

</body>
</html>