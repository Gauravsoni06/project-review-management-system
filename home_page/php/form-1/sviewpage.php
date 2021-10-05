<html>
<form>
	<br><br>
<h2>Welcome you 
<?php
include "conn.php";
session_start();
echo $_SESSION["firstName"];
$a=$_SESSION["stu_id"];
?>
<hr>
<style>
a{
	text-decoration:none;
}
</style>
<br><br>
<h4></h4>
	  <table width="1100" height="260" border="4" align="center">
	  <tr>
	  <th colspan="7"><font size="+1">Group Information</font></th>
	  </tr>
	  <tr>
	  <th width="110">Project Title</th>	  
	  <th width="110">Student Name</th>	  
	  <th width="104">Faculty Name</th>
	  <th width="112">Group No</th>
	  <th width="110">Review Date</th>
	  <th width="110">Comment</th>
	  <th width="110">Attendence</th>
	  <th width="110">Upload</th>
	  </tr>
<?php

	$sel="select g1.proj_title,s.stu_name,f.fac_name,g.group_no,r.review_date,r.comment,r1.p_a from student s,faculty f,group_header g1,group_details g,review_header r,review_details r1 where s.stu_id=g.stu_id and g.group_no=r.group_no and  r.review_header_id=r1.review_header_id and r1.stu_id=s.stu_id and f.fac_id=g1.fac_id and g.group_no=g1.group_no and s.stu_id=$a";
	$res=$con->query($sel);
	while($f=$res->fetch_object())
	{
	  ?>
	  	<tr>
		<td><?php echo $f->proj_title;?></td>
		<td><?php echo $f->stu_name;?></td>
		<td><?php echo $f->fac_name;?></td>
		<td><?php echo $f->group_no;?></td>
		<td><?php echo $f->review_date;?></td>
		<td><?php echo $f->comment;?></td>		
		<td><?php echo $f->p_a;?></td>
		<td><a href="upload.php"><font color="#3399FF">Upload file..</font></a></td>
		</tr>
		<?php
	}
?> 
</td>
</tr>
</table>
<br><br>
<center><a href="logout.php"><input type="button" value="Logout"></a></center>
</form>
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue",
    Helvetica, Arial, "Lucida Grande", sans-serif;
  color: white;
  font-size: 12px;
  background:  url(image/b1.jpg);
}
a {
  color: white;
  font-size: 15px;
  text-shadow: 0 1px 0 black;
  text-align: center;
  padding: 15px 0;
}
form {
  
  background: #111;
  opacity: 0.9;
  width: 1200px;
  height: 700px;
  margin: 80px auto;
  border-radius: 4.4em;
  border: 1px solid #191919;
  overflow: hidden;
  position: relative;
  box-shadow: 0 5px 10px 5px rgba(0, 0, 0, 0.2);
}

form:after {
  content: "";
  display: block;
  position: absolute;
  height: 1px;
  width: 100px;
  left: 20%;
  background: linear-gradient(left, #111, #444, #b6b6b8, #444, #111);
  top: 0;
}

form:before {
  content: "";
  display: block;
  position: absolute;
  width: 8px;
  height: 5px;
  border-radius: 50%;
  left: 34%;
  top: -7px;
  box-shadow: 0 0 6px 4px #fff;
}

.inset {
  padding: 20px;
  border-top: 1px solid #19191a;
}

form h1 {
  font-size: 30px;
  text-shadow: 0 1px 0 black;
  text-align: center;
  padding: 15px 0;
  border-bottom: 1px solid rgba(0, 0, 0, 1);
  position: relative;
}

form h1:after {
  content: "";
  display: block;
  width: 250px;
  height: 100px;
  position: absolute;
  top: 0;
  left: 50px;
  pointer-events: none;
  transform: rotate(70deg);
  background: linear-gradient(
    50deg,
    rgba(255, 255, 255, 0.15),
    rgba(0, 0, 0, 0)
  );
}



</style>
</html>