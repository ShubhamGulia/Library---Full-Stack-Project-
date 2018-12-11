<?php
include 'dbinfo.php'; 
?>
<html>
<body style="background-image:url('Images/hello.jpg')">
<h1>Return Book</h1>

<form action="" method="post">
<table>
<tr>
    <td>Enter your bornumber number</td>
    <td><input type="text" name="BORNUMBER" required/></td>
</tr>
<tr>
    <td>library identity location of return</td>
    <td><input type="text" name="LIBID" required/></td>
</tr>
</table>
<input type="submit" value="Return"/>
</form>

<form action="listdocumentres.php" method="post">
<input type="submit" value="Back"/>
</form>


</body>
</html>  
<?php
//always start the session before anything else!!!!!! 
session_start(); 
//connect to the db 
if(isset($_POST['BORNUMBER'])){
	$BORNUMBER = $_POST['BORNUMBER'];
	$LIBID = $_POST['LIBID'];
	$_SESSION['BORNUMBER']=$BORNUMBER;	
$link = mysqli_connect($servername,$username,$password) or die( "Unable to connect");
mysqli_select_db($link, $dbname) or die( "Unable to select database");
	//Our SQL Query
	$sql_query = "Select readerid, docid, copyno, bdtime, rdtime, actretdate, fine From borrows Where bornumber = '$BORNUMBER' AND LIBID ='$LIBID'";
	//Run our sql query
	$result = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));
	$numrow = mysqli_num_rows($result);
	if($numrow == 0){
		echo 'Wrong issue ID';
	} else {
		$row = mysqli_fetch_array($result);
		$rdtime = $row['rdtime'];
		$rdtime_copy = new DateTime($rdtime);	
		$today = date("Y-m-d");
		$actretdate=$row['actretdate'];
		$today_copy = new DateTime($today);
		
		$interval = $today_copy->diff($rdtime_copy)->days; // rdtime_copy - today_copy
		
		$invert = $today_copy->diff($rdtime_copy)->invert;
		
		if($invert == 1) {
			$this_penalty = $interval * 0.20;
			echo "Fine to be paid:". $this_penalty;
			
		}			
		//Our SQL Query
		//if $actretdate==='null'{
		$updatestmt = "UPDATE BORROWS set ACTRETDATE='$today', FINE='$this_penalty' Where bornumber = '$BORNUMBER' AND LIBID ='$LIBID'";
		$result = mysqli_query ($link, $updatestmt)  or die(mysqli_error($link)); 
		if($result == false) {
			echo 'The query failed.';
			exit();
		} else {
			
			echo '----->>>Return Success';
		}
		/*}else
		{
			echo "Return was not successful, Kindly check the details before returning.";
		}*/
	}	
}
?> 
