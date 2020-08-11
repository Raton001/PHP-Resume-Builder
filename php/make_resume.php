<?php
session_start();
$conn = mysqli_connect("localhost","root","","project");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
include('user_header.php');

if (isset($_POST['register_btn'])){ 
                   $first_name=$_POST['First_Name'];
                   $last_name=$_POST['Last_Name'];
                   $website=$_POST['Website'];
                   $email=$_POST['Email'];
                   $phone=$_POST['Phone'];
                   $about=$_POST['About'];
                   $address=$_POST['Address'];
                   $post_code=$_POST['Post_Code'];
                   $city=$_POST['City'];
                   $region=$_POST['Region'];
                   $twitter=$_POST['Twitter'];
                   $instagram=$_POST['Instagram'];
                   $awards_date=$_POST['Awards_Date'];
                   $awards_name=$_POST['Awards_Name'];
                   $awards_type=$_POST['Awards_Type'];
                   $awards_details=$_POST['Awards_Details'];
                   $working_duration = $_POST['Working_Duration'];
                   $company_name = $_POST['Company_Name'];
                   $company_website = $_POST['Company_Website'];
                   $working_position = $_POST['Working_Position'];
                   $company_details = $_POST['Company_Details'];
                   $responsibility = $_POST['Responsibility'];
                   $skill_name = $_POST['Skill_Name'];
                   $skill_type = $_POST['Skill_Type'];
                   $skill_level = $_POST['Skill_Level'];
                   $language_name = $_POST['Language_Name'];
                   $language_skill = $_POST['Language_Skill'];
                   $interest_name = $_POST['Interest_Name'];
                   $interest_type = $_POST['Interest_Type'];
                   $referer_name = $_POST['Referer_Name'];


        $sql = "INSERT INTO resume (First_Name, Last_Name, Website, Email, Phone, About, Address,
                Post_Code, City,Region, Twitter, Instagram, Awards_Date, Awards_Name, Awards_Type, 
                Awards_Details, Working_Duration, Company_Name, Company_Website, Working_Position,
                Company_Details, Responsibility, Skill_Name, Skill_Type, Skill_Level, Language_Name,
                Language_Skill, Interest_Name, Interest_Type, Referer_Name)
         VALUES ('$first_name', '$last_name','$website' ,'$email','$phone','$about','$address',
          '$post_code','$city','$region','$twitter', '$instagram', '$awards_date', '$awards_name',
          '$awards_type', '$awards_details', '$working_duration', '$company_name', '$company_website',
          '$working_position','$company_details','$responsibility','$skill_name',
          '$skill_type', '$skill_level','$language_name','$language_skill','$interest_name',
          '$interest_type','$referer_name')";

        $conn->query($sql);
        header("Refresh:0; url = payment.php");
    } 
    mysqli_close($conn);   
?>
<!DOCTYPE html>
<html>
<head>
  <title>Biography</title>
  <style type="text/css">
    body{margin: 0px;background-color: #FFF;}
    footer{background-color: gray;
                 padding: 10px;
                 width: 100%;
                 text-align: center;}
h2{margin: 0px;background-color: pink;color: #FFF; text-align: center;padding: 5px;}
.row{margin: 10px 10px 10px 10px;}
.column1 {float: left; width: 20%; margin-top: 20px; font-size: 20px;color: #1E90FF;
 margin-left: 100px;}
.column2{float: left; width: 50%; margin-top: 5px; padding: 5px;}
.row:after { content: ""; display: table; clear: both;}
input[type=text],input[type=password],input[type=submit],input[type=date] {
                                   width: 90%;
                                   padding: 10px;
                                   background-color: rgba(250,200,200,0.8);
                                   border-top: none;
                                   border-right: none;
                                   border-left: none;
                                   border-bottom: 3px solid #8B0000;
                                   }
.Submit{margin-left: 400px;}

  </style>
</head>
<body>
   <h2>Fillup The Information Form</h2>
   <div class="resume_form">
   <form method = "POST" action = "make_resume.php">
   <div class="row">
   <div class="column1">
    <label for="First_Name">First name :</label>
   </div>
   <div class="column2"> <input type = "text" name = "First_Name" placeholder="First Name" ></div>
   </div>
   <div class="row">
    <div class="column1">Last name :</div> 
    <div class="column2"><input type = "text" name = "Last_Name" placeholder="Last Name"></div>
   </div>
   <div class="row">
    <div class="column1">Web site :</div>
    <div class="column2"> <input type = "text" name = "Website" placeholder="Website"></div>
   </div>
   <div class="row">
     <div class="column1">Email:</div>
     <div class="column2"> <input type = "text" name = "Email" placeholder="Email"></div>
   </div>
  <div class="row">
    <div class="column1">Phone :</div> 
    <div class="column2"><input type = "text" name = "Phone" placeholder="Phone"></div>
  </div>
  <div class="row">
    <div class="column1">About:</div>
    <div class="column2"><input type = "text" name = "About" placeholder="About"></div>
  </div>
  <div class="row">
    <div class="column1">Address: </div> 
    <div class="column2"><input type = "text" name = "Address" placeholder="Address"></div>
  </div>
  <div class="row">
    <div class="column1">Post Code:</div>
    <div class="column2"><input type = "text" name = "Post_Code" placeholder="Post Code"></div>
  </div>
  <div class="row">
    <div class="column1">City:</div> 
    <div class="column2"><input type = "text" name = "City" placeholder="City"></div>
  </div>
  <div class="row">
    <div class="column1">Region:</div> 
    <div class="column2"><input type = "text" name = "Region" placeholder="Region"></div>
  </div>
  <div class="row">
    <div class="column1">Twitter:</div>
    <div class="column2"> <input type = "text" name = "Twitter" placeholder="Twitter"></div>
  </div>
  <div class="row">
    <div class="column1">Instragram:</div> 
    <div class="column2"><input type = "text" name = "Instagram" placeholder="Instragram"></div>
  </div>
  <div class="row">
    <div class="column1">Award Date:</div>
    <div class="column2"><input type = "date" name = "Awards_Date" placeholder="Award Date"></div>
  </div>
  <div class="row">
   <div class="column1">Award Name:</div> 
   <div class="column2"><input type = "text" name = "Awards_Name" placeholder="Award Name"></div> 
  </div>
  <div class="row">
   <div class="column1">Award Type:</div> 
   <div class="column2"><input type = "text" name = "Awards_Type" placeholder="Award Type"></div> 
  </div>
  <div class="row">
   <div class="column1">Award Details:</div> 
   <div class="column2"><input type = "text" name = "Awards_Details" placeholder="Award Details">
   </div> 
  </div>
  <div class="row">
    <div class="column1">Working Duration: </div> 
    <div class="column2"><input type = "text" name = "Working_Duration" placeholder="Working Duration"></div>
  </div>
  <div class="row">
   <div class="column1">Company Name: </div>
   <div class="column2"><input type = "text" name = "Company_Name" placeholder="Company Name">
   </div> 
  </div>
  <div class="row">
    <div class="column1">Company Website:</div>
    <div class="column2"><input type = "text" name = "Company_Website" placeholder="Company Website">
    </div>
  </div>
  <div class="row">
    <div class="column1">Working Position: </div>
      <div class="column2">
        <input type = "text" name = "Working_Position" placeholder="Working Position">
      </div>
  </div>
  <div class="row">
    <div class="column1">Company Details: </div>
    <div class="column2">
      <input type = "text" name = "Company_Details" placeholder="Company Details">
    </div>
  </div>
  <div class="row">
    <div class="column1">Responsibity:</div>
    <div class="column2"><input type = "text" name = "Responsibility" placeholder="Responsibility">
    </div>
  </div>
  <div class="row">
    <div class="column1">Skill Name: </div> 
    <div class="column2">
      <input type = "text" name = "Skill_Name" placeholder="Skill Name">
    </div>
  </div>
  <div class="row">
    <div class="column1">Skill type: </div>
    <div class="column2"><input type = "text" name = "Skill_Type" placeholder="Skill Type">
    </div>
  </div>
  <div class="row">
    <div class="column1">Skill Level:</div> 
    <div class="column2"><input type = "text" name = "Skill_Level" placeholder="Skill Lavel"></div>
  </div>
  <div class="row">
    <div class="column1">Language Name:</div> 
      <div class="column2"><input type = "text" name = "Language_Name" placeholder="Language Name">
    </div>
  </div>
  <div class="row">
    <div class="column1">Language Skill:</div> 
    <div class="column2"><input type = "text" name = "Language_Skill" placeholder="Language Skill">
  </div>
  </div>
  <div class="row">
    <div class="column1">Interest Name: </div>
    <div class="column2"><input type = "text" name = "Interest_Name" placeholder="Interest Name">
    </div>
  </div>
  <div class="row">
    <div class="column1">Interest Type:</div>
    <div class="column2"><input type = "text" name = "Interest_Type" placeholder="Interest Type"></div>
  </div>
  <div class="row">
   <div class="column1">Referer Name:</div>
   <div class="column2"><input type = "text" name = "Referer_Name" placeholder="Referer"></div>  
  </div>
  
  <div class="row">
    <div class="column2"><input type = "submit" name = "register_btn" class="Submit"></div></div>
  </from>
  </div>
  <footer>Copyright&copy Biography,2018</footer>
</body>
</html>