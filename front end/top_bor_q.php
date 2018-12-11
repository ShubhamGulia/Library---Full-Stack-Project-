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

	$sql_query="SELECT b.readerid as ReaderID, r.rname as Rname, count(*) AS count FROM reader r, borrows b WHERE b.readerID = r.readerid 
AND b.libid='$libid' GROUP BY b.readerid ORDER BY count DESC LIMIT 10";

$result = mysqli_query($conn,$sql_query);
if(mysqli_num_rows($result) > 0) {
    // output data of each row
	
	echo "<table><tr><th>Reader ID</th><th>Rname</th><th>Count</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["ReaderID"]. "</td><td>" . $row["Rname"]. "</td><td>" . $row["count"]. "</td></tr>";
		
			} 
		echo '</table>';	
    echo '<br> <br> <form name="Back" action="new_top.php" method="post">';
			echo '<input type="submit" value="<< Back"/>';
			echo '</form>';
			echo '<br> <br> <form name="Home" action="admin_menu.php" method="post">';
			echo '<input type="submit" value="Admin Menu"/>';
			echo '</form>';
			} 
	else {
    echo "No records for the selected Branch. Try a different branch.";
	echo '<br> <br> <form name="Back" action="new_top.php" method="post">';
	echo '<input type="submit" value="<< Back"/>';
	echo '</form>';
}

mysqli_close($conn);
?>

</body>
</html>