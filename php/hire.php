<?php
session_start();
require('connect.php');
include('user_header.php');
if (isset($_POST['hire'])){ 
                   $name=$_POST['name'];
                   $email=$_POST['email'];
                   $file=$_POST['file'];
        $sql = "INSERT INTO hire (name, email, file)
         VALUES ('$name', '$email', '$file')";

        $conn->query($sql);
        echo "<script>alert('Successfully uploaded');</script>";
}
mysqli_close($conn); //connection close
?>

<!DOCTYPE html>
<html>
<head>
  <style type="text/css">
body{margin: 0px;}
.hiree{text-align: center; color: #FF7F50; background-color: #FFF8DC;padding: 20px; margin: 0px;}
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
.add {font-size: 20px;margin-left: 100px;}
.rset{font-size: 20px;}
  </style>
</head>
<body>
<h1 class="hiree">Award $50</h1>
<h1 class="hiree">Hire a Expart</h1>

<form class="admin" method="POST" action="hire.php">

  <div class="row" data-validate="Name is required">
    <div class="column1">
      <lavel for="Name">Name :</level>
    </div>
    <div class="column2">
      <input type = "text" name = "name" required="required" placeholder="Name..">
  </div>

  <div class="row" data-validate="Email is required">
    <div class="column1">
      <lavel for="Email">Email:</level>
    </div>
    <div class="column2">
      <input type = "text" name = "email" required="required" placeholder="Email..">
  </div>

  <div class="row" data-validate="File is required">
    <div class="column1">
      <lavel for="File">File :</level>
    </div>
    <div class="column2">
      <input type = "file" name = "file" required="required" placeholder="File..">
  </div>
  <br><br>
    <input type="submit" name="hire" value="Add" class="add">
    <input type="reset" value="Reset" class="rset">
  </div> 
  
</form>
</body>
</html>