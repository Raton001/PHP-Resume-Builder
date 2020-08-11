<?php
require('connect.php');

if(isset($_POST['Search']))
{
	$id  	= $_POST['ID'];
	$sql 	= "SELECT * FROM discount WHERE ID = '$id'";
	$result = mysqli_query($conn, $sql);
	
	if(mysqli_query($conn, $sql))
	{
		echo "<script>alert('Record Found');</script>";

		while($row = mysqli_fetch_assoc($result))
		{
			$_SESSION['id'] = $row['ID'];
			$_SESSION['price'] = $row['Price'];
			$_SESSION['discount'] = $row['Discount'];
		}
	}
	else
	{
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}

mysqli_close($conn);
?>

<html>
<head>
	<style type="text/css">
		h1{text-align: center; color: #FF7F50; background-color: #FFF8DC;padding: 20px;}
		tr,td{padding: 10px;font-size: 18px;}
		table{margin-left: 400px;}
		.update{margin-left: 450px;}
	</style>
</head>
<body>

<form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "post">

<h1> Update Discount </h1>

<table>
	<tr>
		<td> ID: </td>
		<td> <input type = "text" name = "ID"  value = "<?php if(isset($_SESSION['id'])) 
		echo $_SESSION['id']; ?>">
			 <input type = "submit" name = "Search" value = "Search"> </td>
	</tr>
	
	<tr>
		<td> Price: </td>
		<td> <input type = "text" name = "Price" value = "<?php if(isset($_SESSION['price']))
		 echo $_SESSION['price']; ?>"> </td>
	</tr>
	
	<tr>
		<td> Discount: </td> 
		<td> <input type = "text" name = "Discount" value = "<?php if(isset($_SESSION['discount'])) 
		echo $_SESSION['discount']; ?>"> </td>
	</tr>

</table> <br> <br>
	
<input type = "submit" name = "Update" value = "Update" class="update"> <br>

</body>
</html>

<?php
require('connect.php');

if(isset($_POST['Update']))
{
	$id = $_POST['ID'];
	$price = $_POST['Price'];
	$discount = $_POST['Discount'];
	
	$sql = "UPDATE admin SET
	        ID = '$id', 
			Price = '$price',
			Discount = '$discount',
			WHERE ID = '$id'";
			
	if(mysqli_query($conn, $sql))
	{
		mysqli_close($conn);
		echo "<script>alert('Update Successful');</script>";
		header("refresh:1; url = admin_list.php");
	}
	else
	{
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}
?>