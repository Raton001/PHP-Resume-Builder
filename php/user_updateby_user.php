<?php
require('connect.php');
include('user_header.php');
if(isset($_POST['Search']))
{
	$email  	= $_POST['Email'];
	$password  	= $_POST['Password'];
	$sql 	= "SELECT * FROM customers WHERE Email = '$email' AND Password = '$password'";
	$result = mysqli_query($conn, $sql);
	
	if(mysqli_query($conn, $sql))
	{
		echo "<script>alert('Record Found');</script>";

		while($row = mysqli_fetch_assoc($result))
		{
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

<?php
require('connect.php');
if(isset($_POST['Update']))
{
    $U_id = $_POST['Unique_ID'];
	$fname = $_POST['First_Name'];
	$lname = $_POST['Last_Name'];
	$ic = $_POST['IC'];
	$email = $_POST['Email'];
	$password = $_POST['Password'];
	
	$sql = "UPDATE customers SET
			Unique_ID = '$U_id',
			First_Name = '$fname',
			Last_Name = '$lname',
			IC = '$ic',
			Email = '$email',
			Password = '$password'
			WHERE Email = '$email' OR Password = '$password'";
			
	if(mysqli_query($conn, $sql))
	{
		mysqli_close($conn);
		echo "<h2>User ID: ".$U_id. "</h2>";
		echo "<h2>First Name: ".$fname. "</h2>";
		echo "<h2>Last Name: ".$lname. "</h2>";
		echo "<h2>IC: ".$ic. "</h2>";
		echo "<h2>Email: ".$email. "</h2>";
		echo "<h2>Password: ".$password. "</h2>";
	}
	else
	{
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}
?>

<html>
<head>
	<style type="text/css">
	    body{margin: 0px;background-color: #FAFAD2;}
	   .user{text-align: center; color: #FFF; background-color: lightgray;padding: 20px;margin: 0px;}
	   input[type=text],input[type=password] {
                                   width: 90%;
                                   padding: 10px;
                                   color: #FFF;
                                   background-color: rgba(0,0,0,0.8);
                                   border-top: none;
                                   border-right: none;
                                   border-left: none;
                                   border-bottom: 3px solid #8B0000;
                                   }
label { display: inline-block;margin-left: 20px;}
.row{margin: 10px 10px 10px 10px;}
.column1 {float: left; width: 40%; margin-top: 20px; font-size: 20px;color: #1E90FF;}
.column2{float: left; width: 55%; margin-top: 5px; padding: 5px;}
.row:after { content: ""; display: table; clear: both;}
.update{background-color: green;color: #FFF; padding: 5px;}
h2{text-align: left; color: #32CD32;margin: 0px;}
footer{background-color: gray;
                 padding: 10px;
                 width: 100%;
                 text-align: center;}
		
	</style>
</head>
<body>

<form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "post">

<h1 class="user"> Update Your Account Details </h1>
         
         <div class="row">
         <div class="column1">
		 <label>CONFIRM EMAIL: </label>
		 </div>
		 <div class="column2">
		 <input type = "text" name = "Email" value = "<?php if(isset($_SESSION['email'])) 
		 echo $_SESSION['email']; ?>">
		 </div>  
	     </div>

	     <div class="row">
         <div class="column1">
		 <label>CONFIRM PASSWORD: </label>
		 </div>
		 <div class="column2">
		 <input type = "password" name = "Password" value = "<?php if(isset($_SESSION['password'])) 
		 echo $_SESSION['password'];?>">
		 </div>  
	     </div>

	     <div class="row">
         <div class="column1">
		 <label> </label>
		 </div>
		 <div class="column2">
		 <input type = "submit" name = "Search" value = "CONFIRM" class="update">
		 </div>  
	     </div>

	     <div class="row">
         <div class="column1">
		 <label> USER ID: </label>
		 </div>
		 <div class="column2">
		 <input type = "text" name = "Unique_ID"  value = "<?php if(isset($_SESSION['U_id'])) 
		 echo $_SESSION['U_id']; ?>">
		 </div>  
	     </div>

	     <div class="row">
         <div class="column1">
		 <label> FIRST NAME: </label>
		 </div>
		 <div class="column2">
		 <input type = "text" name = "First_Name" value = "<?php if(isset($_SESSION['fname']))
		 echo $_SESSION['fname']; ?>"> 
		 </div>  
	     </div>
	
	    <div class="row">
         <div class="column1">
		 <label> LAST NAME:  </label>
		 </div>
		 <div class="column2">
		 <input type = "text" name = "Last_Name" value = "<?php if(isset($_SESSION['lname'])) 
		 echo $_SESSION['lname']; ?>"> 
		 </div>  
	     </div>

	     <div class="row">
         <div class="column1">
		 <label> NRIC:  </label>
		 </div>
		 <div class="column2">
		 <input type = "text" name = "IC"  value = "<?php if(isset($_SESSION['ic'])) 
		 echo $_SESSION['ic']; ?>"> 
		 </div>  
	     </div>

	     <div class="row">
         <div class="column1">
		 <label>  </label>
		 </div>
		 <div class="column2">
		 <input type = "submit" name = "Update" value = "UPDATE" class="update">
		 </div>  
	     </div>
<footer>Copyright&copy Biography,2018</footer>
		
</body>
</html>

