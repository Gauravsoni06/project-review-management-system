<?php
$con=new mysqli('localhost','root','','prms');
session_start();
$a=$_SESSION["fac_id"];
?>

<html>
<body>
<div id="mai">
<form action="" method="post">
	<br><br>
<h1 style=text-align:center>Group Details</h1>
<table width="500" height="100" border="4" align="center">
<tr>
<td width="50%">Group List:</td>
<td>
<select name="grouplist">
<?php
$sel="select group_no from group_header where fac_id=$a";
	$res=$con->query($sel);
	while($f=$res->fetch_object())
	{
	?>
	<option value="<?php echo $f->group_no;?>"><?php echo $f->group_no;?></option>
	<?php
	}
	?>	
</select>	
</td>
</tr>
<tr>
<td colspan="2"><center><input type="submit" name="select-btn" value="submit"></center></td>
</tr>
</table>

<?php
if (isset($_REQUEST['select-btn']))
{
$grp=$_REQUEST['grouplist'];
$s="select g.proj_title,f.fac_name from group_header g ,faculty f where g.fac_id=f.fac_id and 							g.group_no=$grp";
	$res=$con->query($s);
	while($f=$res->fetch_object())
	{
	  ?>
	 
	  <table width="500" height="100" border="4" align="center">
	  <tr>
	  <th colspan="2"><font size="+1">Group Information</font></th>
	  </tr>
	  <tr>
	  <th width="109">Project Title</th>
	  <th width="104">Faculty Name</th>	
	  </tr>

	  	<tr>
		<td><?php echo $f->proj_title;?></td>
		<td><?php echo $f->fac_name;?></td>
		</tr>
		<?php
	} 
	}
	?>

	</table>
	<br><br>
	
	
	
	<input type="hidden" name="grouplist" value="<?php echo $grp ?>"; />	  
	<table width="500" height="100" border="4" align="center">
	<tr>
<td width="50%">Add Student</td>
<td>

<select name="studentlist">
<?php
	$sel="select stu_id,stu_name from student where stu_id not in (select stu_id from group_details)";
	$res=$con->query($sel);
	while($s=$res->fetch_object())
	{
	?>
	<option value="<?php echo $s->stu_id;?>"><?php echo $s->stu_name;?></option>
	<?php
	}

?>
</select>
</td>
</tr>

<tr>
<td colspan="2"><center><input type="submit" name="select2-btn" value="submit"></center></td>
</tr>
</table>

<?php
if (isset($_REQUEST['select2-btn']))
{	
	  $gl=$_REQUEST['grouplist'];
	  $si=$_REQUEST['studentlist'];
	
$ins="insert into group_details (group_no,stu_id) values ($gl,$si)";
$res=$con->query($ins);
	
	if ($res)	
	{
	?>
		<script type="text/javascript">
				alert('Successfully Inserted');
				window.location="fviewpage.php";
			</script>
			<?php
	}
	else
	{
	echo "Fails";
	}
	
	?>
	<a href="View More"><input type="button" value="View More"></a>
	<?php
}
?>
<br><br>
<center><a href="logout.php"><input type="button" value="Logout"></a></center>
</form>

</div>
</body>
<style>
body {
  font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue",
    Helvetica, Arial, "Lucida Grande", sans-serif;
  color: white;
  font-size: 12px;
  background:  url(image/b1.jpg);
}
form{
	
  
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

</style>
</html>	