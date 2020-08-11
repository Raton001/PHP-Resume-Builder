<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$mysqli = new mysqli($servername, $username, $password, $dbname);
$result = $mysqli->query 
        
        ("SELECT * FROM admin ORDER BY rand()") 
        or die($mysqli->error);
?>


<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		div{
			background-color: #778899;
		    padding: 10px;
		    border-bottom: 2px solid #FFF;
		    margin-bottom: 10px;}
		    h1{text-align: center; color: #FF7F50; background-color: #FFF8DC;padding: 20px;}
		    h2{color: #FFF;margin: 0px;}
	</style>
</head>
<body>
<h1>Admin Lsit</h1>

<?php while ($admin = $result->fetch_assoc()): ?>

<div class="admin_show">

<h2>Admin ID: <?= $admin['Admin_ID'] ?></h2>
<h2>User Name: <?= $admin['Username'] ?></h2>
<h2>Name: <?= $admin['Name'] ?> </h2> 
<h2>Email: <?= $admin['Email'] ?></h2>
 
 </div> 

<?php endwhile; ?>

</body>
</html>