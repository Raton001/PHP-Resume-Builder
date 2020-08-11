<?php
require('connect.php');
include('user_header.php');
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Biography</title>
	<style type="text/css">
	    body{background-color: rgba(250,200,0,0.5);margin: 0px;}
		.temp{text-align: center; color: gray; background-color: #FFFFF0;padding: 10px; margin: 0px;}
		img{height: 500px;}
		footer{background-color: #FF7F50;
                 padding: 10px;
                 width: 100%;
                 text-align: center;}
        button{margin-bottom: 10px;margin-top: 10px;}
        .container{margin-left: 400px;}
	</style>

</head>
<body>
	<h1 class="temp">Available Template</h1>
<div class="container">
 
<div class="Slides">
  <img src="../images/111.png" style="width:45%">
  <div class="black">Theme01</div>
</div>

<div class=" Slides">
  <img src="../images/222.png" style="width:45%">
  <div class="black">Theme02
  </div>
</div>

<button class="black" onclick="plusDivs(-1)">&#10094;</button>
<button class="black" onclick="plusDivs(1)">&#10095;</button>

</div>

<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("Slides");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}
</script>

<footer>Copyright &copy Biography,2018</footer>

</body>
</html>
