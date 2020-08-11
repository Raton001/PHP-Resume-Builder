<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$mysqli = new mysqli($servername, $username, $password, $dbname);
$result = $mysqli->query 
        
        ("SELECT * FROM customers ORDER BY rand()") 
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
		    h3{background-color: #F0FFFF;color: #008B8B;margin: 0px;padding: 3px;}
	</style>
</head>
<body>
<h1>User List</h1>
<?php while ($customers = $result->fetch_assoc()): ?>

<div class="admin_show">
<h3>ID: <?= $customers['ID'] ?></h3>
<h3>User ID: <?= $customers['Unique_ID'] ?></h3>
<h3>Fast Name: <?= $customers['First_Name'] ?></h3>
<h3>Last Name: <?= $customers['Last_Name'] ?></h3>  
<h3>IC Number: <?= $customers['IC'] ?> </h3> 
<h3>Email: <?= $customers['Email'] ?></h3>
 
 </div> 

<?php endwhile; ?>

</body>
</html>