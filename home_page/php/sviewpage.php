<html>
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
	  <table align="center" border="2">
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
		</tr>
		<?php
	}
?> 
</td>
</tr>
</table>
<br><br>
<center><a href="logout.php"><input type="button" value="Logout"></a></center>