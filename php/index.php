<?php
session_start();
include("connect.php");
include("header.php");
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Resume Maker</title>
	<style type="text/css">
	body{
	       background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)),
         url("../images/index.jpg") no-repeat center fixed;
         margin: 0px 0px 0px 0px;
         padding: 0px 0px 0px 0px;
         color: #FFF;
         font-family: sans-serif;
         text-align: center;}

  .Slides{display:none;width: 100%;margin: 0px 0px 0px 0px;}
  .Writting_tips{font-size: 30px;color: #ADFF2F;}
  h2{color: #ADFF2F;}
  p{text-align: justify; text-justify: inter-word; text-align: left;}
  footer{background-color: gray;
                 padding: 10px;
                 width: 100%;}
  .imagess{border: 3px solid #ADFF2F;margin-top: 1px;}
  ul{text-decoration: none; }
  .tips{padding-bottom: 15px;}
	</style>
</head>
<body>
	<section class="content">
		<div class="imagess">
        <img class="Slides" src="../images/abc.jpg" style="width:100%; height: 400px">
        <img class="Slides" src="../images/c.jpg" style="width:100%; height: 400px">
        <img class="Slides" src="../images/b.png" style="width:100%; height: 400px">
        </div>
 <script>
var indexnumber = 0;
imageprocess();

function imageprocess() {
    var i;
    var x = document.getElementsByClassName("Slides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    indexnumber++;
    if (indexnumber > x.length) {indexnumber = 1}    
    x[indexnumber-1].style.display = "block";  
    setTimeout(imageprocess, 2000);
}
</script>

	<div class="tips">
			<h1 class="Writting_tips">2 Tips for Writing an Effective Resume</h1>
			<p>Pencil Hiring managers and recruiters alike say they've seen more poorly written resumes cross their desks recent than ever before. Attract more interview offers and ensure your resume doesn't eliminate you from consideration by following these six key tips:</p>

            <h2>1.Format Your Resume Wisely "Do the Hiring Managers" Work for Them</h2>

            <p>No matter how well written, your resume won't get a thorough reading the first time through. Generally a resume gets scanned for 25 seconds. Scanning is more difficult if it is hard to read, poorly organized or exceeds two pages.</p>

            <li>Use a logical format and wide margins, clean type and clear headings</li>
            <li>Selectively apply bold and italic typeface that help guide the reader's eye</li>
            <li>Use bullets to call attention to important points (i.e. accomplishments)</li>
          
            <h2>2.Identify Accomplishments not Just Job Descriptions</h2>

            <p>Hiring managers, especially in technical fields like engineering, seek candidates that can help them solve a problem or satisfy a need within their company. Consequently, you can't be a solution to their problems without stating how you solved similar problems in other companies and situations.</p>
        
            <li>Focus on what you did in the job, NOT what your job was there's a difference</li>
            <li>Include a one or two top line job description first, then list your accomplishments</li>
    
	</div>
	</section>
	<footer>Copyright&copy Biography,2018</footer>
</body>
</html>