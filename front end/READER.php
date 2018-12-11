<?php
include 'dbinfo.php'; 
?> 
<html>
<style>
body {
        color: black;
}
h1 {
        color: #16GGFF;
}
p {
        color: rgb(0,0,255)
}
body  {

    background-color: #800080;
}

</style>
<body>
<h1>Login</h1>

<?php
//always start the session before anything else!!!!!! 
session_start(); 

if(isset($_POST['READERID']))  { //check null
	$READERID = $_POST['READERID']; // text field for READERID 
	
// store session data
$_SESSION['READERID']=$READERID;

//connect to the db 

$link = mysqli_connect($servername,$username,$password) or die( "Unable to connect");
mysqli_select_db($link, $dbname) or die( "Unable to select database");

			
           $sql_query = "Select readerid From reader Where readerid = '$READERID'";  

            //Run our sql query
           $result = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));  
			if($result == false)
				{
				echo 'The query failed.';
				exit();
			}

			//this is where the actual verification happens 
			if(mysqli_num_rows($result) == 1){ 
			//the READERID and password matches the database 
			//move them to the page to which they need to go 
				header('Location: readerid.php');
			   
			}else{ 
			$err = 'Incorrect READERID ...only member allowed' ; 
			} 
			//then just above your login form or where ever you want the error to be displayed you just put in 
			echo "$err";
    } 
	
?>	

<form action="" method="post">
<table>
<tr>
    <td>ENTER THE IDENTITY PLEASE </td>
    <td><input type="text" name="READERID" required/></td>
</tr>
</table>
<p></p>
<input type="Submit" value="Send"/>
</body>
</html>