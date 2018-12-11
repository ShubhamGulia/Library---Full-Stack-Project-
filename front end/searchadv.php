<?php
include 'dbinfo.php'; 
?> 
<!DOCTYPE html>

<html>
<style>
body {
        color: #FFDEAD;
}
h1 {
        color: #F8F8FF;
}
p {
        color: rgb(0,0,255)
}
body  {

    background-color: #4B0082;
}

</style>

<body>

<h1>RESULT:</h1>
<p></p>

</body>
</html>

<?php

$id = $_POST['id'];
$sql = "SELECT TITLE, DOCID, PUBLISHERID ,PDATE FROM DOCUMENT WHERE TITLE LIKE '%$id%' OR DOCID='$id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "TITLE: " . $row["TITLE"]. " - DOCID: " . $row["DOCID"]. " - PUBLISHERID" . $row["PUBLISHERID"]. " - PDATE" . $row["PDATE"]. "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>