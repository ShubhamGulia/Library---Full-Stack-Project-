<!DOCTYPE html>
<html>
<style>
body {
        color: black;
}
h1 {
        color: #00FF00;
}
p {
        color: rgb(0,0,255)
}
body  {

    background-color: #17bbff;
}

</style>

<body>

<h1>Welcome</h1>

<script>
function validateForm() {
    var x = document.forms["myForm"]["id"].value;
    if (x == "") {
        alert("Name must be filled out");
        return false;
    }
}
</script>
<form name="myForm" action="searchadv.php"
onsubmit="return validateForm()" method="post">
Document Search by keyword or document id: <input type="text" name="id">
<input type="submit" value="Search">
</form>
<p></p>
<form action="READERID.php" method="post">
<input type="submit" value="Cancel"/>
</form>
<style>
body {
        color: black;
}
h1 {
        color: #00FF00;
}
p {
        color: rgb(0,0,255)
}
body  {

    background-color: #17bbff;
}

</style>

</body>
</html>