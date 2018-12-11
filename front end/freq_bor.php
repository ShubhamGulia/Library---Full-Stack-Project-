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

session_start(); 
$libid = $_POST['libid'];

	$sql_query="select b.docid as Docid, d.Title as Title, count(*) AS Count from borrows b, document d where b.docid=d.docid and 
	libid = '$libid' GROUP BY docid order by Count DESC LIMIT 10";

$result = mysqli_query($conn,$sql_query);
if(mysqli_num_rows($result) > 0) {
    // output data of each row
	
	echo "<table><tr><th>Document ID</th><th>Title</th><th>Count</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["Docid"]. "</td><td>" . $row["Title"]. "</td><td>" . $row["Count"]. "</td></tr>";
			}
    } 
	else {
    echo "0 results";
}

mysqli_close($conn);
?>

</body>
</html>