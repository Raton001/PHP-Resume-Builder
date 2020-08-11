<?php
session_start();
require('connect.php');
include('header.php');
if(isset($_POST['Login'])){
	if(!empty($_POST['Email']) && !empty($_POST['Password']))
	{
		$Email 	= $_POST['Email'];
		$Password 	= $_POST['Password'];
		$sql 	= "SELECT * FROM customers WHERE Email='$Email' AND Password = '$Password'";
		$result = mysqli_query($conn, $sql);
		
		if (mysqli_num_rows($result) > 0)
		{	
			echo "<script>alert('Login Successful');</script>";
			header("Refresh:0; url = make_resume.php"); 
		}
		else{
			echo "<script>alert('Invalid Username or Password!!');</script>";
		}
	}
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
	<title>User Login</title>
	<style type="text/css">
body{
	background: linear-gradient(rgba(0,0,0,0.8), 
    rgba(0,0,0,0.8)),
    url("../images/college.jpeg") no-repeat center fixed;
    margin: 0px 0px 0px 0px;
    padding: 0px 0px 0px 0px; 
}
.loginBox{
	position: absolute;
	top: 60%;
	left: 50%;
	transform: translate(-50%,-50%);
	width: 350px;
	height: 370px;
	padding: 80px 40px;
	box-sizing: border-box;
	background: rgba(250,25,20,.5);
}
.user
{
	width: 150px;
	height: 150px;
	border-radius: 50%;
	overflow: hidden;
	position: absolute;
	top: calc(-150px/2);
	left: calc(50% - 70px);
}
.User
{
	margin: 0;
	padding: 0 0 20px;
	color: #F8F8FF;
	text-align: center;
}
.loginBox p
{
	margin: 0;
	padding: 0;
	font-weight: bold;
	color: #fff;
}
.loginBox input
{
	width: 100%;
	margin-bottom: 20px;
}
.loginBox input[type="text"],
.loginBox input[type="password"]
{
	border: none;
	border-bottom: 1px solid #fff;
	background: transparent;
	outline: none;
	height: 40px;
	color: #fff;
	font-size: 16px;
}
::placeholder
{
	color: rgba(200,200,200,.5);
}
.btn
{
	padding: 10px;
	border: none;
	outline: none;
	height: 40px;
	width: 80px;
	color: #fff;
	font-size: 16px;
	background: gray;
	cursor: pointer;
	border-radius: 20px;
}
.btn:hover
{
	background: #B22222;
	color: white;
}
.loginBox a
{
	color: #fff;
	font-size: 14px;
	font-weight: bold;
	text-decoration: none;
}
</style>
</head>
<body>
<div class="loginBox">
    <img src="../images/customer.png" class="user">
	<h1 class="User">User LogIn</h1>
        <form action = "<?php echo $_SERVER["PHP_SELF"]; ?>" method = "post">
		<p> Email </p>
		<input type = "text" placeholder = "Email..." name = "Email" required> 
		<p> Password </p>
		<input type = "password" placeholder = "Password..." name = "Password" required>
		<button type = "submit" class = "btn" name = "Login"> Login </button>
		<button type = "button" class = "btn" onclick = "location.href ='index.php'"> Cancel 
		</button>
	    <a href="#">Forget Password</a>
</form>
</div>
</body>
</html>
<?php
include("footer.php");
?>