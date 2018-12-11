<?php
$servername = "localhost";
$username = "root";
$password = "7868499555";
$dbname = "libraryfinal";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>

<!DOCTYPE html>
<html>
<body style="background-image:url('Images/library.jpg')">
<h3> New Document </h3>

<?php
//always start the session before anything else!!!!!! 

session_start(); 

if(isset($_POST['docid']) and isset($_POST['pubid']))  { //check null
	$docid = $_POST['docid']; // text field for docid
	$pubid = $_POST['pubid']; // text field for pubid
	$dtitle = $_POST['dtitle'];
// store sessineton data
$_SESSION['docid']=$docid;

//connect to the db 

$link = mysqli_connect($servername,$username,$password) or die( "Unable to connect");
mysqli_select_db($link, $dbname) or die( "Unable to select database");

		$sql_query = "Select publisherid From publisher Where publisherid = '$pubid'";
			$result = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));  
			if($result == false)
			{
				echo 'Please enter a valid Publisher ID!';
				exit();
			}
			$parts = explode('-', $_POST['pdate']);
			$pdate  = "$parts[0]-$parts[1]-$parts[2]";
					
			
			$row = mysqli_fetch_array($result);
			
			$insert = "INSERT INTO document (`DOCID`,`TITLE`,`PDATE`,`PUBLISHERID`) VALUES ('$docid','$dtitle','$pdate','$pubid')";
			
						
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
Document ID <input type="text" name="docid" autofocus required />
<br><br>
Title <input type="text" name="dtitle" required /> 
<br><br>
Published Date <input type="date" name="pdate" required />
<br><br>
Publisher ID <input type="text" name="pubid" required />
<br><br>
<input type="submit" value="Add Document" />
</form>
<form action="admin_menu.php" method="post">
<input type="submit" value="Cancel"/>
</body>
</html>