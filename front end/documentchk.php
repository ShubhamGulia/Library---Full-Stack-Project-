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
if(isset($_POST['DOCID']) and isset($_POST['COPYNO']) and isset($_POST['READERID']) and isset($_POST['LIBID']))  {
	$DOCID = $_POST['DOCID'];
	$COPYNO = $_POST['COPYNO'];
	//$BORNUMBER = $_POST['BORNUMBER'];
	$READERID = $_POST['READERID'];
	$LIBID = $_POST['LIBID'];
	
	$link = mysqli_connect($servername,$username,$password) or die( "Unable to connect");
    mysqli_select_db($link, $dbname) or die( "Unable to select database");
    //Our SQL Query
	$sql_query = "Select DOCID From COPY Where (DOCID = '$DOCID' AND COPYNO = '$COPYNO' AND LIBID = '$LIBID')";
	//Run our sql query
    $result = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));  
	if($result == false)
	{
		echo 'No such copy exists in library !!!.';
		exit();
	}
	$row = mysqli_fetch_array($result);

		$sql_query = "INSERT INTO BORROWS(`READERID`,`DOCID`,`COPYNO`,`LIBID`,`BDTIME`,`RDTIME`) VALUES('$READERID','$DOCID','$COPYNO','$LIBID','$today','$estimate')";
		//Run our sql query
		$result = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));  
		if($result == false)
		{
			echo 'INSERTING failed.';
			exit();
		}
		header('Location: ConfirmCheckout.php');		
	    
}
?> 
<html>
<body>
<h1>Book Checkout</h1>

<form action="" method="post">
<table>
<tr>
    <td>Reader ID</td>
    <td><input type="text" name="READERID" required/></td>
</tr>


<tr>
    <td>DOCUMENT IDENTITY NUMBER</td>
    <td><input type="text" name="DOCID" required/></td>
</tr>

<tr>
    <td>Copy Number</td>
    <td><input type="text" name="COPYNO" required/></td>
</tr>

<tr>
    <td>LIBRARY IDENTITY</td>
    <td><input type="text" name="LIBID" required/></td>
</tr>

<tr>
    <td>BORROW Date and time</td>
    <td><?php echo $today; ?></td>
</tr>

<tr>
    <td>Estimated Return Date</td>
    <td><?php echo $estimate; ?></td>
</tr>

</table>
<p></p>
<input type="submit" value="Confirm"/>
</form>
<p></p>
<form action="reservechk.php" method="post">
<input type="submit" value="Checkout reserved documents"/>
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