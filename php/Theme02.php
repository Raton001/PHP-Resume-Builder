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
  margin: 0;
  padding: 0;
  background: rgba(0,0,100,0.3);
  font-family: sans-serif;
  font-size: 18px;
}
#content{
  width: 1280px;
  height: auto;
  padding: 20px;
  background: #F0FFFF;
  color: #000;
  top: 20%;
  left: 3%;
  position: absolute;
  box-sizing: border-box;
  margin-bottom: 10px;
  padding-top: 80px;
}
.image{
  position: absolute;
  top: -120px;
  left: calc(45% - 50px);
}
img{
border-radius: 50%;
width: 250px;
height: 250px;
}
.name{
  font-size: 60px;
  text-align: center;
  border-bottom: 2px solid gray;
  color:tomato; 
}
.letter{
  color: gray;
}
.musketter{
  margin-top: -40px;
  text-align: center;
  font-size: 30px;
}
h2{
  color: #A52A2A;
  background-color: #FFA07A;
  padding: 8px;
  text-shadow: 10px;
}
.summary{
  float: right;
  width: 30%;
}
.row:after {content: "";
display: table;
clear: both;
}
div {text-align: justify;
  text-justify: inter-word;
}
.about{
  margin-top: -140px;
  width: 65%;
  border-right: 5px solid green;
  padding-right: 25px;
  margin-bottom: 15px;
}
.location{
  background-color: #A9A9A9;
  border: 2px solid tomato;
  padding: 5px;
  padding-left: 10px;
  width: 25%;
  box-shadow: 10px 10px #20B2AA;
  opacity: 50%;
  opacity: 0.9;
}
.profile{
  width: 30%;
  float: right;
  box-shadow: 10px 10px #20B2AA;
  opacity: 50%;
  opacity: 0.9;
  background-color: #A9A9A9;
  border: 2px solid tomato;
  padding: 5px;
  padding-left: 10px;
  margin-top: -270px;
  margin-right: 490px;
  padding-bottom: 110px;
}
.meowsmiaos, .insta{
  padding-left: 15px;
}

.award{
  width: 36%;
  float: right;
  box-shadow: 10px 10px #20B2AA;
  opacity: 50%;
  opacity: 0.9;
  background-color: #A9A9A9;
  border: 2px solid tomato;
  margin-top: -270px;
  padding-bottom: 25px;
  padding-left: 5px;
  padding-right: 5px;
}
#take-right{
  text-align: right;
  padding-right: 5px;
  margin-top: -40px;
}
.work{
  background-color: #20B2AA;
  padding: 20px;
  margin-top: 20px;
  margin-right: -10px;
}
#take-right1{
  text-align: right;
  margin-top:-50px; 
}
.master{
  color: gray;
}
.skillimage{
  width: 40px;
  height: 40px;
  margin-bottom: -10px;
}
.skill{
  width: 30%;
  float: left;
}

li a{
  text-decoration: none;
  color: red;
}
.language{
  width: 30%;
  float: right;
  margin-right: 430px;
  margin-top: -260px;
  padding-top: 5px;
  font-size: 20px;
}
.interest{
  width: 30%;
  float: right;
  margin-top: -255px;
  font-size: 20px;
}
.refer{
  text-align: center;
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
footer{
  visibility: hidden;

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
  $Phone = $_GET['Phone'];
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
        &copy; ,2018 imran.shama.raton.com
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