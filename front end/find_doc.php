<!DOCTYPE html>
<html>
<body style="background-image:url('Images/library.jpg')">
<h3> Enter a Document ID or Title to Search </h3>
<script>
function validateForm() {
    var x = document.forms["myForm"]["docid"].value;
    if (x == "") {
        alert("Name must be filled out");
        return false;
    }
}
</script>
<form name="myForm" action="doc_stat.php"
onsubmit="return validateForm()" method="post">
Document ID or Title: <input type="text" name="docid" autofocus required>
<input type="submit" value="Search >>">
<br><br>
<div onClick="window.location = 'admin_menu.php';">
    <input type="Submit" style="pointer-events:none;" value="<< Main Menu">

</form>
</body>
</html>