<?php
$user = 'root';
$pass = '7868499555';
$host = 'localhost';   
$database = 'libraryfinal';
date_default_timezone_set('America/New_York'); 
?>  

<?php
session_start(); 
$link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
mysqli_select_db($link, $database) or die( "Unable to select database");

if(isset($_POST['userid']) and isset($_POST['pwd']) and isset($_POST['confirmpwd']))  {
	$userid = $_POST['userid'];
	$pwd = $_POST['pwd'];
	$confirmpwd = $_POST['confirmpwd'];
	
	$_SESSION['userid']=$userid;
	$_SESSION['pwd']=$pwd;
	$_SESSION['confirmpwd']=$confirmpwd;
	
	if($pwd == $confirmpwd) {
		$insertStatement = "INSERT INTO user (userid, pwd) VALUES ('$userid', '$pwd')";
		$result = mysqli_query ($link, $insertStatement)  or die(mysqli_error($link)); 
		if($result == false) {
			echo 'The query failed.';
			exit();
		} else {
			header('Location: login_admin.php');
		}
	} else {
		echo 'Password not consistent';
	}
}
?>

<html>
<body>
<h1>New User Registration</h1>

<form action="" method="post">
<table>
<tr>
    <td>User ID</td>
    <td><input type="text" name="userid" required/></td>
</tr>
<tr>
    <td>Password</td>
    <td><input type="password" name="pwd" required/></td>
</tr>

<tr>
    <td>Confirm Password</td>
    <td><input type="password" name="confirmpwd" required/></td>
</tr>
</table>

<input type="submit" value="Register"/>
</form>

<form action="login_admin.php" method="post">
<input type="submit" value="Back"/>
</form>

</body>
</html>