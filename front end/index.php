<!DOCTYPE html>
<html>
<head>

<style>
.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
	
}

.dropbtn:hover, .dropbtn:focus {
    background-color: #3e8e41;
	
}

.dropdown {
    position: relative;
    display: inline-block;
	
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown a:hover {background-color: #f1f1f1}

.show {display:block;}
</style>
</head>
<body style="background-image:url('Images/hello.jpg')">

<h1 align="center">LIBRARY</h1>

<p align="center">sg952,av496,sr674 @njit.edu</p>


<div class="dropdown" >

<button onclick="myFunction()" class="dropbtn" >Main Menu</button>
  <div id="myDropdown" class="dropdown-content">
    <a href="READER.PHP">Reader</a>
    <a href="login_admin.php">Admin</a>
    <a href="QUIT.PHP">Quit</a>
  </div>
</div>

<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>

</body>
</html>