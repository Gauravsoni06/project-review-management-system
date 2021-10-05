<html>
<h2>Welcome you 
<?php
session_start();
echo $_SESSION["firstName"];
$a=$_SESSION["fac_id"];
?>
<hr>
<br><br>
<table align="center" border="4">
<tr>
<th>Group No</th>
<th>Project Title</th>
<th>Student Details</th>
<th>Take Review</th>
<th>Add Student</th>
</tr>
<?php
include 'conn.php';
$sel="select g.group_no,g.proj_title,s.stu_name from faculty f,group_header g,group_details g1,student s where g.fac_id=f.fac_id and s.stu_id=g1.stu_id and g.group_no=g1.group_no and f.fac_id=" .$a. " order by g.group_no asc";

	$res=$con->query($sel);
	while($f=$res->fetch_object())
	{
?>
<style>
a{
	text-decoration:none;
}
</style>
		<tr>
		<td><?php echo $f->group_no;?></td>
		<td><?php echo $f->proj_title;?></td>
		<td><?php echo $f->stu_name;?></td>
		<td><a href="project_review.php?gid=<?php echo $f->group_no;?>"><font color="#3399FF">Take Review..</font></a></td>
		<td><a href="cds.php"><font color="#3399FF">Add Student..</font></a></td>
		</tr>
	<?php
	}
	?>
</table>
</h2>

<center><a href="logout.php"><input type="button" value="Logout"></a></center>

</html>
