<?php
require('connect.php');

if(isset($_POST['Search']))
{
	$id  	= $_POST['ID'];
	$sql 	= "SELECT * FROM customers WHERE ID = '$id'";
	$result = mysqli_query($conn, $sql);
	
	if(mysqli_query($conn, $sql))
	{
		echo "<script>alert('Record Found');</script>";

		while($row = mysqli_fetch_assoc($result))
		{
			$_SESSION['id'] = $row['ID'];
			$_SESSION['U_id'] = $row['Unique_ID'];
			$_SESSION['fname'] = $row['First_Name'];
			$_SESSION['lname'] = $row['Last_Name'];
			$_SESSION['ic'] = $row['IC'];
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

<h1> Update Users Details </h1>

<table>
	<tr>
		<td> ID: </td>
		<td> <input type = "text" name = "ID"  value = "<?php if(isset($_SESSION['id'])) 
		echo $_SESSION['id']; ?>">
			 <input type = "submit" name = "Search" value = "Search"> </td>
	</tr>

	<td> USER ID: </td>
		<td> <input type = "text" name = "Unique_ID"  value = "<?php if(isset($_SESSION['U_id'])) 
		echo $_SESSION['U_id']; ?>"></td>
	
	<tr>
		<td> FIRST NAME: </td>
		<td> <input type = "text" name = "First_Name" value = "<?php if(isset($_SESSION['fname']))
		 echo $_SESSION['fname']; ?>"> </td>
	</tr>
	
	<tr>
		<td> LAST NAME: </td> 
		<td> <input type = "text" name = "Last_Name" value = "<?php if(isset($_SESSION['lname'])) 
		echo $_SESSION['lname']; ?>"> </td>
	</tr>
	
	<tr>
		<td> NRIC: </td>
		<td> <input type = "text" name = "IC"  value = "<?php if(isset($_SESSION['ic'])) 
		echo $_SESSION['ic']; ?>"> </td>
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
	$id = $_POST['ID'];
    $U_id = $_POST['Unique_ID'];
	$fname = $_POST['First_Name'];
	$lname = $_POST['Last_Name'];
	$ic = $_POST['IC'];
	$email = $_POST['Email'];
	$password = $_POST['Password'];
	
	$sql = "UPDATE customers SET
	        ID = '$id', 
			Unique_ID = '$U_id',
			First_Name = '$fname',
			Last_Name = '$lname',
			IC = '$ic',
			Email = '$email',
			Password = '$password'
			WHERE ID = '$id'";
			
	if(mysqli_query($conn, $sql))
	{
		mysqli_close($conn);
		echo "<script>alert('Update Successful');</script>";
		header("refresh:1; url = user_list.php");
	}
	else
	{
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}
?>