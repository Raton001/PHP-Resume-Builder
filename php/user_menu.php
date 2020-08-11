<?php
session_start();
include("connect.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Biography</title>
	<style type="text/css">
	body{background-color: #DCDCDC;}
    h1{
    font-size: 40px;
    background-color: pink;
    text-align: center;
    padding: 20px;
    margin: 0px 0px 0px 0px;}
     footer{background-color: gray;
                 padding: 10px;
                 width: 100%;
                 text-align: center;}
    a{font-size: 20px;
                    text-decoration: none;}
    .admin_iframe{margin-top: 20px;}
</style>
</head>
<body>
    <h1>User Menu</h1>
<nav>
     <?php include 'menu.php'; ?>   
</nav>

<div class="admin_iframe">
    <span> <a href = "user_list.php" target = "iframe_1">User List | </a> </span>
    <span> <a href = "user_update.php" target = "iframe_1"> Update | </a> </span>
    <span> <a href = "user_delete.php" target = "iframe_1"> Delete | </a> </span>
    <hr>
    <br>    
    
    <!-- When the target of a link matches the name of the iframe, the link will open in the iframe -->
    <iframe height = "600px" width = "100%" style = "border:3px solid tomato;"
      src = "user_list.php" name = "iframe_1"> </iframe>
</div>
<footer>Copyright &copyBiography, 2018</footer>
</body>
</html>
