<?php
include 'dbinfo.php'; 
date_default_timezone_set('America/New_York'); 
?> 

<?php
$link = mysqli_connect($servername,$username,$password) or die( "Unable to connect");
mysqli_select_db($link, $dbname) or die( "Unable to select database");
date_default_timezone_set('America/New_York'); 
   $currentTime = time() ;

if ($currentTime > strtotime('18:00:00')) {
    
$sql_query ="DELETE FROM RESERVES ";
mysqli_query ($link, $sql_query)  or die(mysqli_error($link));

}
?>


<html>
<body style="background-image:url('Images/reder.jpg')">
<h1>WELCOME READER</h1>

<form action="search.php" method="post">
<input type="submit" value="search a document"/>
</form>

<form action="documentchk.php" method="post">
<input type="submit" value="Document Checkout"/>
</form>


<form action="documentres.php" method="post">
<input type="submit" value="Document Reserve"/>
</form>


<form action="listdocumentres.php" method="post">
<input type="submit" value="List of document reserved"/>
</form>


<form action="returnbook.php" method="post">
<input type="submit" value="Document Return and fine check"/>
</form>

<form action="viewd.php" method="post">
<input type="submit" value="View document id and titles"/>
</form>

<form action="reader.php" method="post">
<input type="submit" value="close"/>
</form>
</body>
</html>
