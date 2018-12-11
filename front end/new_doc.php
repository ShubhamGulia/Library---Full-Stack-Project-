<!DOCTYPE html>
<html>
<body>
<h3> New Document </h3>

<?php
//always start the session before anything else!!!!!! 
session_start(); 

if(isset($_POST['docid']) and isset($_POST['pubid']))  { //check null
	$docid = $_POST['docid']; // text field for docid
	$pubid = $_POST['pubid']; // text field for pubid
	
// store session data
$_SESSION['docid']=$docid;

//connect to the db 

$link = mysqli_connect($servername,$username,$password) or die( "Unable to connect");
mysqli_select_db($link, $dbname) or die( "Unable to select database");

		$sql_query = "Select publisherid From publisher Where publisherid = '$pid'";
			$result = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));  
			if($result == false)
			{
				echo 'Please enter a valid Publisher ID!';
				exit();
			}
			$row = mysqli_fetch_array($result);
			$insert = "INSERT INTO document (`DOCID`, `TITLE`, `PDATE`, `PUBLISHERID`) VALUES ('$docid','$title','$pdate','$pid')";
			$result = mysqli_query ($link, $insert)  or die(mysqli_error($link));
			if($result == false)
				{
				echo 'Document could not be added at this moment.';
				exit();
			}
			header('Location: doc_success.php');	
    } 
	
?>


<form action="" method="post">
Document ID <input type="text" name="docid" autofocus >
<br><br>
Title <input type="text" name="title" >
<br><br>
Published Date <input type="date" name="pdate" >
<br><br>
Publisher ID <input type="text" name="pubid" >
<br><br>
<input type="submit" value="Add Document" >
</form>
<form action="admin_menu.php" method="post">
<input type="submit" value="Cancel"/>
</body>
</html>