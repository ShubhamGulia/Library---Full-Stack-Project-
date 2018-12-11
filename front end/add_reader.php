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
<h2> Register a New Reader </h2>

<?php
//always start the session before anything else!!!!!! 

session_start(); 

if(isset($_POST['readerid']) and isset($_POST['rtype']) and isset($_POST['rname']))  { //check null
	$readerid = $_POST['readerid']; // text field for readerid
	$rtype = $_POST['rtype']; // text field for rtype
	$rname = $_POST['rname'];//text field for rname
	$addr = $_POST['addr'];//text field for addr
	
	
	
// store session data
$_SESSION['readerid']=$readerid;

//connect to the db 

$link = mysqli_connect($servername,$username,$password) or die( "Unable to connect");
mysqli_select_db($link, $dbname) or die( "Unable to select database");

			$insert = "INSERT INTO reader (`readerid`,`rtype`,`rname`,`address`) VALUES ('$readerid','$rtype','$rname','$addr')";
			$result = mysqli_query ($link, $insert)  or die(mysqli_error($link));
			if($result == false)
				{
				echo 'Reader could not be added at this moment.';
				exit();
			}
			header('Location: reader_success.php');	
    } 
	
?>


<form action="" method="post">
Reader ID <input type="text" name="readerid" autofocus required />
<br><br>
Reader Type <input type="text" name="rtype" />
<br><br>
Reader Name <input type="text" name="rname" />
<br><br>
Address <input type="text" name="addr" />
<br><br>
<input type="submit" value="Add Reader" />
</form>
<form action="admin_menu.php" method="post"/>
<br>
<input type="submit" value="Cancel"/>
</body>
</html>