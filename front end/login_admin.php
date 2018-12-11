<?php
include 'dbinfo.php'; 
?>
<html>
<body style="background-image:url('Images/library.jpg')">
<h1>Admin Login</h1>

<?php
//always start the session before anything else!!!!!! 
session_start(); 

if(isset($_POST['userid']) and isset($_POST['pwd']))  { //check null
	$userid = $_POST['userid']; // text field for userid
	$pwd = $_POST['pwd']; // text field for password
	
// store session data
$_SESSION['userid']=$userid;

//connect to the db 

$link = mysqli_connect($servername,$username,$password) or die( "Unable to connect");
mysqli_select_db($link, $dbname) or die( "Unable to select database");

			$sql = "Select userid from user where userid = '$userid' and pwd = '$pwd'";
			
			$result = mysqli_query ($link, $sql)  or die(mysqli_error($link));
			if($result == false)
				{
				echo 'The query failed.';
				exit();
			}
			if(mysqli_num_rows($result) == 1){ 
			header('Location: admin_menu.php');	
				//break;
			}
			else{ 
			$err = 'Incorrect username or password' ; 
			} 
			//then just above your login form or where ever you want the error to be displayed you just put in 
			echo "$err";
    } 
	
?>


<form action="" method="post">
<table>
<tr>
    <td>User ID</td>
    <td><input type="text" name="userid" autofocus required/></td>
	<tr></tr>
</tr>
<tr>
    <td>Password</td>
    <td><input type="password" name="pwd" required/></td>
</tr>
</table>

<input type="Submit" value="Login"/>
</form>
<form action="create_user.php" method="post">
<input type="Submit" value="Create User"/>
</form>


</body>
</html>