<?php
require('connect.php');

if(isset($_POST['Search']))
{
	$id  	= $_POST['Admin_ID'];
	$sql 	= "SELECT * FROM admin WHERE Admin_ID = '$id'";
	$result = mysqli_query($conn, $sql);
	
	if(mysqli_query($conn, $sql))
	{
		echo "<script>alert('Record Found');</script>";

		while($row = mysqli_fetch_assoc($result))
		{
			$_SESSION['id'] = $row['Admin_ID'];
			$_SESSION['name'] = $row['Name'];
			$_SESSION['username'] = $row['Username'];
			$_SESSION['email'] = $row['Email'];
			$_SESSION['password'] = $row['Password'];
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

<h1> Update Admin Details </h1>

<table>
	<tr>
		<td> ID: </td>
		<td> <input type = "text" name = "Admin_ID"  value = "<?php if(isset($_SESSION['id'])) 
		echo $_SESSION['id']; ?>">
			 <input type = "submit" name = "Search" value = "Search"> </td>
	</tr>
	
	<tr>
		<td> NAME: </td>
		<td> <input type = "text" name = "Name" value = "<?php if(isset($_SESSION['name']))
		 echo $_SESSION['name']; ?>"> </td>
	</tr>
	
	<tr>
		<td> USER NAME: </td> 
		<td> <input type = "text" name = "Username" value = "<?php if(isset($_SESSION['username'])) 
		echo $_SESSION['username']; ?>"> </td>
	</tr>
	
	<tr>
		<td> EMAIL: </td>
		<td> <input type = "text" name = "Email" value = "<?php if(isset($_SESSION['email'])) 
		 echo $_SESSION['email']; ?>"> </td>
	</tr>
	
	<tr>
		<td> PASSWORD: </td>
		<td> <input type = "password" name = "Password" value = "<?php if(isset($_SESSION['password'])) 
		echo $_SESSION['password'];?>"> </td>
	</tr>
</table> <br> <br>
	
<input type = "submit" name = "Update" value = "Update" class="update"> <br>

</body>
</html>

<?php
require('connect.php');

if(isset($_POST['Update']))
{
	$id = $_POST['Admin_ID'];
	$name = $_POST['Name'];
	$username = $_POST['Username'];
	$email = $_POST['Email'];
	$password = $_POST['Password'];
	
	$sql = "UPDATE admin SET
	        Admin_ID = '$id', 
			Name = '$name',
			Username = '$username',
			Email = '$email',
			Password = '$password'
			WHERE Admin_ID = '$id'";
			
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