<html>
<head>
	<style type="text/css">
		h1{text-align: center; color: #FF7F50; background-color: #FFF8DC;padding: 20px;}
		.user{margin-left: 400px; font-size: 18px; padding: 10px;}
		.user_id{margin-right: 10px;}
	</style>
</head>
<body>
<form action = "<?php echo $_SERVER['PHP_SELF'];?>" method = "get">

<h1> Delete User </h1>

<div class="user">
 ID:   <input type = "text" name = "ID" placeholder="ID" class="user_id"> 
	<input type = "submit" name = "Delete" value = "Delete">
</div>

</form>
</body>
</html>

<?php
require('connect.php');

if(isset($_GET['Delete']))
{
	$id			= $_GET['ID'];
	$id_exists	= false;
	$sql		= "SELECT * FROM customers WHERE ID = '$id'";
	$result		= mysqli_query($conn, $sql);
	
	if(mysqli_num_rows($result) == 0)
	{
		$id_exists = false;
		echo " ID " .$id. " does not exists.";
	}
	else
	{
		$id_exists = true; 
	}
	
	if($id_exists == true)
	{
		$sql = "DELETE FROM customers WHERE ID = '$id'";
		
		if(mysqli_query($conn,$sql))
		{
			echo "<script>alert('ID deleted');</script>";
			header("refresh:1; url = user_list.php");
		}
		else
		{
			echo "Error: " .$sql. "<br>" . mysqli_error($conn);
		}
	}
}
mysqli_close($conn);

?>