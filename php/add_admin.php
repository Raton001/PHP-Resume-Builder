<?php
session_start();
require('connect.php');
if (isset($_POST['admin_signup'])){ 
                   $Name=$_POST['Name'];
                   $Username=$_POST['Username'];
                   $Email=$_POST['Email'];
                   $Password=$_POST['Password'];
                   $Password2=$_POST['Password2'];
//matching 2 password
if($Password == $Password2){
  //Checking Acount existence.
  $sql = "SELECT * FROM admin WHERE Email = '$Email'";
  $result = $conn->query($sql);

  if($result->num_rows == 0){
        echo "<script>alert('Successful Added');</script>";
        // header("Refresh:0; url = resume.php"); 
        $Password = $Password;
        //Create a customers record
        $sql = "INSERT INTO admin (Name, Username, Email, Password)
         VALUES ('$Name', '$Username', '$Email', '$Password')";

        $conn->query($sql);
    }
    else{
      echo "<script>alert('Already Register or Email Exist');</script>";
    }  
    }     
   else {
    echo "<script>alert('Two Password not match');</script>";
}
}
mysqli_close($conn); //connection close
?>

<!DOCTYPE html>
<html>
<head>
  <style type="text/css">
h1{text-align: center; color: #FF7F50; background-color: #FFF8DC;padding: 20px;}
.admin{margin-left: 300px;margin-right: 300px;} 
input[type=text],input[type=password] {
                                   width: 100%;
                                   padding: 10px;
                                   border: 3px solid #008000;
                                   background-color: #E6E6FA;
                                   border-top: none;
                                   border-right: none;
                                   border-left: none;
                                   }
 label {padding: 25px 25px 25px 25px; display: inline-block;margin-left: 20px;}
.column1 {float: left; width: 45%; margin-top: 5px; font-size: 30px;}
.column2{float: left; width: 50%; margin-top: 5px; padding: 5px;}
.row:after { content: ""; display: table; clear: both;}
.add {font-size: 20px;margin-left: 300px;}
.rset{font-size: 20px;}
  </style>
</head>
<body>

<h1>Add New Admin</h1>

<form class="admin" method="POST" action="add_admin.php">

  <div class="row" data-validate="Name is required">
    <div class="column1">
      <lavel for="Name">Full Name :</level>
    </div>
    <div class="column2">
      <input type = "text" name = "Name" required="required" placeholder="Name..">
  </div>

  <div class="row" data-validate="Username is required">
    <div class="column1">
      <lavel for="Username">Username :</level>
    </div>
    <div class="column2">
      <input type = "text" name = "Username" required="required" placeholder="Username..">
  </div>

  <div class="row" data-validate="Email is required">
    <div class="column1">
      <lavel for="Email">Email :</level>
    </div>
    <div class="column2">
      <input type = "text" name = "Email" required="required" placeholder="Email..">
  </div>

   <div class="row" data-validate="Password is required">
    <div class="column1">
      <lavel for="Password">Password:</lavel>
    </div>
    <div class="column2">
    <input type = "password" name = "Password" required="required" placeholder="Password..">
    </div>
  </div>

  <div class="row" data-validate="Password is required">
    <div class="column1">
      <lavel for=" Confirm Password">Confirm Password:</lavel>
    </div>
    <div class="column2">
    <input type = "password" name = "Password2" required="required" placeholder="Confirm password..">
    </div>
  </div>
  <div>
    <input type="submit" name="admin_signup" value="Add" class="add">
    <input type="reset" value="Reset" class="rset">
  </div> 
  
</form>
</body>
</html>