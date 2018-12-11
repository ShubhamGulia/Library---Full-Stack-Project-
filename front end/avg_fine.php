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
$sql_query="select READERID, avg(fine) as AVG_FINE from borrows group by READERID";
//select readerid, bdtime, rdtime from borrows group by readerid;";
//$sql = "SELECT TITLE, DOCID, PUBLISHERID ,PDATE FROM DOCUMENT WHERE TITLE LIKE '%$docid%' OR DOCID='$docid'";
$result = mysqli_query($conn, $sql_query);
	echo "<table><tr><th>Reader ID</th><th>Average Fine</th></tr>";
    while($row = $result->fetch_assoc()) {
	if($row["AVG_FINE"]==NULL)
	{
	$row["AVG_FINE"]=0;
	}		
        echo "<tr><td>" . $row["READERID"]. "</td><td>" . $row["AVG_FINE"] . "</td></tr>";
			}
    
mysqli_close($conn);
?>

</body>
</html>