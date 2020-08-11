<?php
session_start();
require('connect.php');
include('header.php');
if (isset($_POST['signup_button'])){ 
                   $Unique_ID=$_POST['Unique_ID'];
                   $First_Name=$_POST['First_Name'];
                   $Last_Name=$_POST['Last_Name'];
                   $IC=$_POST['IC'];
                   $Email=$_POST['Email'];
                   $Password=$_POST['Password'];
                   $Password2=$_POST['Password2'];
//matching 2 password
if($Password == $Password2){
  //Checking Acount existence.
  $sql = "SELECT * FROM customers WHERE Email = '$Email'";
  $result = $conn->query($sql);

  if($result->num_rows == 0){
    //success status of registration. 
        echo "<script>alert('Registration Successful');</script>";
        header("Refresh:0; url = user_login.php"); 
        $Password = $Password;
        //Create a customers record
        $sql = "INSERT INTO customers (Unique_ID, First_Name, Last_Name, IC, Email, Password)
         VALUES ('$Unique_ID', '$First_Name', '$Last_Name', '$IC','$Email', '$Password')";

        $conn->query($sql);
    }
    else{
      echo "<script>alert('Already Register or Email Exist');</script>";
        }  
    }     
   else {
    echo "<script>alert('Two Password Must be Same');</script>";
    }
}
mysqli_close($conn); //connection close
?>

<!DOCTYPE html>
<html>
<head>
  <title>Registration</title>
<style type="text/css">
body{
   font: Helvetica,sans-serif;
   background: linear-gradient(rgba(0,0,0,0.8), rgba(0,0,0,0.8)),
   url("../images/college.jpeg") no-repeat center fixed;
   margin: 0px 0px 0px 0px;
   padding: 0px 0px 0px 0px;
   color: #FFFAF0;
}

.banner{font-size: 40px;margin: 10px 10px 10px 10px;color: #FF7F50;}
.message{grid-area: about;}
.user_signup{grid-area: signup;margin-left: 200px;}
.mainbody{display: grid;grid-template-areas:
                  'about about about signup';
                   background-color: rgba(64,255,0,.1); 
}
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
label {padding: 25px 25px 25px 25px; display: inline-block;margin-left: 20px;}
.row{margin: 10px 10px 10px 10px;}
.column1 {float: left; width: 40%; margin-top: 20px; font-size: 20px;color: #1E90FF;}
.column2{float: left; width: 55%; margin-top: 5px; padding: 5px;}
.row:after { content: ""; display: table; clear: both;}

.btn{
  padding: 10px;
  border: none;
  outline: none;
  height: 40px;
  width: 100px;
  color: #1E90FF;
  font-size: 16px;
  background: #FF7F50;
  cursor: pointer;
  border-radius: 20px;
  margin-bottom: 30px;
  margin-left: 10px;}

.btn:hover{background: #B22222; color: white;}
.forget{color: #1E90FF; margin-left: 30px; font-size: 15px; font-weight: bold; text-decoration: none;}
footer{background-color: gray;
                 padding: 10px;
                 width: 100%;
                 text-align: center;}
.welcome {
          list-style: none;
          position: absolute;
          left: 25%;
          top: 50%;
          transform: translateX(-50%) translateY(-50%);
}
.welcome li {
                display: inline-block;
                margin-right: 20px;
                font-family: Open Sans, Arial;
                font-weight: 300;
                font-size: 50px;
                color: #FF7F50;
                opacity: 1;
                transition: all 2.5s ease;
}
  .welcome li:last-child {margin-right: 0;}
  .welcome.hidden li {opacity: 0;}
  .welcome.hidden li:nth-child(1) { transform: translateX(-200px) translateY(-200px); }
  .welcome.hidden li:nth-child(2) { transform: translateX(20px) translateY(100px); }
  .welcome.hidden li:nth-child(3) { transform: translateX(-150px) translateY(-80px); }
  .welcome.hidden li:nth-child(4) { transform: translateX(10px) translateY(-200px); }
  .welcome.hidden li:nth-child(5) { transform: translateX(-300px) translateY(200px); }
  .welcome.hidden li:nth-child(6) { transform: translateX(20px) translateY(-20px); }
  .welcome.hidden li:nth-child(7) { transform: translateX(30px) translateY(200px); }

</style>
</head>
<body>
<section class="mainbody">
<div class="message">
        <ul class="welcome hidden">
            <li>W</li>
            <li>E</li>
            <li>L</li>
            <li>C</li>
            <li>O</li>
            <li>M</li>
            <li>E</li>
        </ul>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">
            $(function() {
                setTimeout(function() {
                    $('.welcome').removeClass('hidden');
                }, 400);   
            })(); 
</script>
</div>

<script type="text/javascript">
  function makingid(){
    var str = document.forms["myForm"]["First_Name"].value;
    var str1 = document.forms["myForm"]["Last_Name"].value;
    var str2 = document.forms["myForm"]["IC"].value;
    var res = str.slice(0,1);
    var res1 = str1.slice(0,50);
    var res2 = str2.slice(8,12);
    document.myForm.Unique_ID.value = res+res1+res2;
  }
</script>

<form class="user_signup" name="myForm" action = "<?php echo $_SERVER['PHP_SELF'];?>" 
  onsubmit="makingid()" method = "POST">

    <h1 class="banner">CREATE USER ACCOUNT</h1>

  <div class="row" style="visibility: hidden;margin-top: -50px;">
    <div class="column1">
     <lavel for="ID">ID :</lavel> 
    </div>
     <div class="column2">
   <input type="text" name="Unique_ID" id="Unique_ID">
     </div>
  </div>

  <div class="row">
    <div class="column1">
      <lavel for="First_Name">FIRST NAME :</lavel>
    </div>
    <div class="column2">
      <input type = "text" name = "First_Name" placeholder="First Name" required/>
    </div>
  </div>

  <div class="row">
    <div class="column1">
      <lavel for="Last_Name">LAST NAME :</lavel>
    </div>
    <div class="column2">
      <input type = "text" name = "Last_Name" placeholder="Last Name" required/>
    </div> 
  </div>

  <div class="row">
    <div class="column1">
      <lavel for="IC">NRIC:</lavel>
    </div>
    <div class="column2">
     <input type = "text" name = "IC" maxlength="12" placeholder="12 digits" required/> 
    </div>
  </div>

  <div class="row">
    <div class="column1">
      <lavel for="Email">EMAIL:</lavel>
    </div>
    <div class="column2">
    <input type = "text" name = "Email" placeholder="xyz@abc.com" required/>
  </div>
  </div>

  <div class="row">
    <div class="column1">
      <lavel for="Password">PASSWORD:</lavel>
    </div>
    <div class="column2">
    <input type = "password" name = "Password" placeholder="Password" required/>
    </div>
  </div>

  <div class="row">
    <div class="column1">
      <lavel for=" Confirm Password">CONFIRM PASSWORD:</lavel>
    </div>
    <div class="column2">
    <input type = "password" name = "Password2" placeholder="Confirm password" required/>
    </div>
  </div>

    <button type = "submit" class = "btn" name = "signup_button"> Sign Up </button>
    <button type = "button" class = "btn" onclick = "location.href ='index.php'"> 
      Cancel 
    </button>
    <a class="forget" href="#">Forget Password</a>

</from>
</section>
<footer>Copyright&copy Biography,2018</footer>
</body>
</html>