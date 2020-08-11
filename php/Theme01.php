<?php
require('connect.php');
include('user_header.php');
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width">
  <meta name="description" content="Assignment">
  <meta name="keywords" content="web design">
  <meta name="author" content="Imran, Raton, Shama">
  <title>Biography</title>
  <style type="text/css">
  body{
background-color: rgba(20,20,0,0.5);
font-style: italic;
margin: 20px 30px 30px 30px;
font-size: 22px;
color: white;
margin: 0px;
}
#content{margin: 20px 20px 20px 20px;
background-color: rgba(0,0,250,0.2);
padding: 10px 80px 10px 80px;
height: auto;
border: 5px solid white;
}
.image{width: 40%;
float: left;
}
img{border-radius: 5%;
width: 250px;
height: 250px;
border: 5px solid white;
}
.name{
  font-size: 70px;
}
.letter{
  color: #8B4513;
}
.about{float: right;
width: 70%;
}
.location{float: left;
  width: 30%;
}
.award{float: right;
    width: 70%;
}
.profile{float: left;
width: 30%;
}
.work{float: right;
  width: 70%;
}
.skill{float: left;
width: 30%;
margin-top: -30px;
}
.interest{float: right;
  width: 70%;
}
.language{float: left;
  width: 30%;
}
.refer{float: left;
  width: 30%;
}
.language{
  margin-top: -100px;
}
.refer{
  margin-top: -120px;
}
h2{
  color: #ADFF2F;
  background-color: rgba(0,0,0,0.5);
  padding: 5px;
  margin-right: 4px;
  border-radius: 5%;
}
a{text-decoration: none;
  color: tomato;
}
p{margin: 0px;
  padding: 0px;
}
table{
  text-align: left;
}
.row:after {content: "";
display: table;
clear: both;
}
div {text-align: justify;
  text-justify: inter-word;
}
.musketter{margin-top: -40px;
  font-size: 40px;
  margin-left: 420px;
}
#take-right{float: right;
  margin-top: -20px;
}
#take-right1{float: right;
  margin-top: -50px;
}
.senior{
  margin-top: -20px;
}
.summary{
  margin-top: -30px;
}
.pawssibily, .meowsmiaos{
  visibility: hidden;
}
li{
   text-decoration: none;
   display: inline;
     background-color:rgba(0,0,0,0.5);
     padding:10px;
     border-radius: 5%;
 }
 a{
  text-decoration: none;
 }
a:visited {
  text-decoration: none;
}
.phone{
  color: tomato;
}
.master{
  color: gray;
}
.interest{
  margin-top: -30px;
}
.skillimage{
  width: 30px;
  height: 30px;
  border:none;
  padding-right: 10px;
}
.about_para{
  padding-left: 5px;
  padding-right: 5px;
}
.award_para{
  padding-left: 10px;
  padding-right: 5px;
}
.work_para{
  padding-left: 5px;
  padding-right: 5px;
  padding-bottom: 20px;
}
.interest_para{
  padding-left: 10px;
  padding-right: 5px;
}
.twitimage{
  height: 20px;
  width: 20px;
  border: none;
}
#itimage{
  height: 20px;
  width: 20px;
  border: none;
}
.insta:hover{
     transform: scale(1.5);
}
.twit:hover{
     transform: scale(1.5);
}
footer{
  background-color: rgba(0,0,0,0.5);
  padding: 10px;
  margin-top: -10px;
  margin-right: 21px;
  margin-left: 21px;
}
@media screen and (max-width: 600px){
  body{
    float: none;
    width: 100%;
  }
}
  </style>
</head>
<body>

<form>
  <input type = "text" placeholder = "Phone" name = "Phone">
         <input type = "submit" name = "Search" value = "Search"> 
      </td>
</form>

<?php
require('connect.php');
if(isset($_GET['Search']))
{
  $Phone   = $_GET['Phone'];
  $sql  = "SELECT * FROM resume WHERE Phone = $Phone";
  $result = mysqli_query($conn, $sql);
 
if(mysqli_num_rows($result) > 0) { ?>

<?php  while($row = mysqli_fetch_assoc($result)){ ?>
    
<section id="content">
  <div class="row">
      <div class="image">
      </div>
     <div class="fullname">
          <h1 class="name"><span class="letter"><?php echo $row['First_Name'] ; ?>
        </h1>
          <h2 class="musketter"><?php echo $row['Last_Name']; ?></h2>
     </div>
     <div class="summary">
    <p>Website: <a href="http://tmt2654-59412.000webhostapp.com/"><?php echo $row['Website']; ?></a></p>
    <p>Email: <a href="mailto:mhtimran@gmail.com"><?php echo $row['Email']; ?></a></p>
    <p>Phone: <span class="phone"><?php echo $row['Phone']; ?></span></p> 
  </div>
  </div>
  <div class="row">
  <div class="about">
    <h2>About</h2>
    <p class="about_para"><?php echo $row['About']; ?> </p>
  </div>
  <div class="location">
    <h2>Location</h2>
    <p>Address: <?php echo $row['Address']; ?></p>
    <p>Postal Code: <?php echo $row['Post_Code']; ?></p>
    <p>City: <?php echo $row['City']; ?></p>
    <p>Region: <?php echo $row['Region']; ?></p>
  </div>
  </div>
  <div class="row">
  <div class="profile">
     <h2>Profile</h2>
     <table>
    <tr>
      <th class="twit" title="Click here to Twitter me">
        <a href="https://twitter.com/?lang=en"><?php echo $row['Twitter']; ?></a></th>
      <th class="insta" title="My Instagram Profile">
        <a href="https://www.instagram.com/?hl=en"><?php echo $row['Instagram']; ?></a></th>
    </tr>
    <tr>
      <td class="pawssibily"></td>
      <td class="meowsmiaos"></td>
    </tr>
   </table>
  </div>
  <div class="award">
    <h2>Awards</h2>
    <div class="award_para">
    <p><?php echo $row['Awards_Name']; ?><br>
    <p id="take-right"><?php echo $row['Awards_Date']; ?></p>
    <p><?php echo $row['Awards_Type']; ?></p>
   </div>
  </div>
  </div>
  <div class="row">
  <div class="work">
    <h2>Work</h2>
    <div class="work_para">
     <h3><?php echo $row['Company_Name']; ?></h3>
       <p id="take-right1"><?php echo $row['Working_Duration']; ?> - Present</p>
       <p class="senior"><?php echo $row['Working_Position']; ?></p>
                    <a href="http://ssfm.com/"><?php echo $row['Company_Website']; ?></a>
   <p><?php echo $row['Company_Details']; ?></p>
    <p><?php echo $row['Responsibility']; ?></p>
  </div>
  </div>
  <div class="skill">
     <h2><img src="../images/skill.png" class="skillimage">Skills</h2>
      <h3><?php echo $row['Skill_Name']; ?><br>
    <span class="master"><?php echo $row['Skill_Level']; ?></span></h3>
   <ul>
    <li><a><?php echo $row['Skill_Type']; ?></a></li>
   </ul>
  </div>
  </div>
  <div class="row">
  <div class="language">
       <h2>Languages</h2>
     <h3><?php echo $row['Language_Name']; ?><br>
    <span class="master"><?php echo $row['Language_Skill']; ?></span></h3>
  </div>
  <div class="interest">
  <h2>Interests</h2>
  <div class="interest_para">
   <h3><?php echo $row['Interest_Name']; ?></h3>
   <ul>
    <li><a><?php echo $row['Interest_Type']; ?></a></li>
   </ul>
   </div>
  </div>
  </div>
  <div class="row">
  <div class="refer">
     <h2 class="references">References</h2>
     <p><?php echo $row['Referer_Name']; ?></p>
  </div>
  </div>    
    </section>
    <footer>
    <center>
      <address>
       Copyright &copy; ,2018 Biography.com
      </address>
    </center>
  </footer>  
</body>
</html>

<?php  }
        mysqli_free_result($result);
    }
  else
  {
        echo "No records matching your query were found.";
  }
}

mysqli_close($conn);
?>