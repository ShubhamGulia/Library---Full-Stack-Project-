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
<body style="background-image:url('Images/library.jpg')">
<?php

$docid = $_POST['docid'];
$sql_query="select b.Docid as Document_ID,Title, count(*) as Count from borrows b, document d where b.docid=d.docid and b.docid in 
(select docid from book) group by b.docid order by count desc";
//$sql = "SELECT TITLE, DOCID, PUBLISHERID ,PDATE FROM DOCUMENT WHERE TITLE LIKE '%$docid%' OR DOCID='$docid'";
$result = mysqli_query($conn, $sql_query);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
	
	echo "<table><tr><th>Document ID</th><th>Title</th><th>Count</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["Document_ID"]. "</td><td>" . $row["Title"]. "</td><td>" . $row["Count"]. "</td></tr>";
			}
    } 
	else {
    echo "0 results";
}

mysqli_close($conn);
?>

</body>
</html>