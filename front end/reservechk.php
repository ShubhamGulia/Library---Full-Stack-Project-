<?php
$servername = "localhost";
$username = "root";
$password = "7868499555";
$dbname = "libraryfinal";
date_default_timezone_set('America/New_York'); 
// Create connection

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>
<?php
$today = date("Y-m-d H:i:s");
$plus = strtotime("+20 day", time());
$estimate = date('Y-m-d H:i:s', $plus);
if(isset($_POST['RESUMBER']))  {
	$RESUMBER = $_POST['RESUMBER'];
	
	$link = mysqli_connect($servername,$username,$password) or die( "Unable to connect");
    mysqli_select_db($link, $dbname) or die( "Unable to select database");
    //Our SQL Query
	$sql_query = "Select READERID,DOCID,COPYNO,LIBID From RESERVES WHERE(RESUMBER = '$RESUMBER')";
	//Run our sql query
    $result = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));  
	if($result == false)
	{
		echo 'No such RESERVE exists in library or u are late !!!.';
		exit();
	}
	$row = mysqli_fetch_array($result);
$DOCID = $row["DOCID"];
	$COPYNO = $row["COPYNO"];
	$READERID =$row["READERID"];
	$LIBID = $row["LIBID"];
	 //echo "DOCID : " . $row["DOCID"]. " - COPYNO : " . $row["COPYNO"]. " - READERID :" . $row["READERID"]. " - LIBID :" . $row["LIBID"]. "<br>";
	$sql_query1 = "INSERT INTO BORROWS(`READERID`,`DOCID`,`COPYNO`,`LIBID`,`BDTIME`,`RDTIME`) VALUES('$READERID','$DOCID','$COPYNO','$LIBID','$today','$estimate')";
		//Run our sql query
		$result1 = mysqli_query ($link, $sql_query1)  or die(mysqli_error($link));  
		if($result1 == false)
		{
			echo 'INSERTING failed.';
			exit();
		}
		else
		{
	$sql_query2 = "DELETE  FROM RESERVES WHERE(RESUMBER = '$RESUMBER' )";
    $result2 = mysqli_query ($link, $sql_query2)  or die(mysqli_error($link));
		}
		header('Location: ConfirmCheckout.php');		
	    
}
?> 
<html>
<body>
<h1>Reserve Book Checkout</h1>

<form action="" method="post">
<table>
<tr>
    <td>Enter Reserve Number</td>
    <td><input type="text" name="RESUMBER" required/></td>
</tr>
</table>
<p></p>
<input type="submit" value="Confirm"/>
</form>

<br><br>
<form action="READERID.php" method="post">
<input type="submit" value="Cancel"/>
</form>
<p></p>

<style>
body {
        color:  #5B083C  ;
}
h1 {
        color: #470D33;
}
p {
        color: rgb(0,0,255)
}
body  {

    background-color: #BDBA11;
}

</style>
</body >
</html>