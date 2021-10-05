<html>
<form>
<?php
include "conn.php";
session_start();
$a=$_SESSION["fac_id"];
?>
<html>
<body>
<form action="" method="post">
<h1>Uploaded Documents</h1>
<table align="center" border="2">
<tr>
<td>Group List:</td>
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
</form>


<form action="" method="post">	  
<table align="center" border="2">
<tr>
<td>Student Name</td>
<td>
<select name="studentlist">
<?php
if (isset($_REQUEST['select-btn']))
{
$grp=$_REQUEST['grouplist'];
$s="select s.stu_id,s.stu_name from student s, group_details g WHERE s.stu_id=g.stu_id and group_no=$grp";
	$res=$con->query($s);
	while($f=$res->fetch_object())
	{
	  ?>
	  	<option value="<?php echo $f->stu_id;?>"><?php echo $f->stu_name;?></option>
		<?php
	} 
	}
	?>
</select>
</td>
</tr>

<tr>
<td colspan="2"><center><input type="submit" name="select2-btn" value="submit"></center></td>
</tr>
</table>


<table>
  <p>&nbsp;</p>
  <table width="500" height="48" border="4" align="center">
<tr>
<th width="50">Documents name</th>
<th width="50">Download</th>
</tr>
<?php
if (isset($_REQUEST['select2-btn']))
{
 $s1=$_REQUEST['studentlist'];
 //echo $_REQUEST['studentlist'];
 $select="SELECT id,name FROM files WHERE stu_id=$s1";
$res=$con->query($select);
while($f=$res->fetch_object())
	{
?>
<tr>
<td><?php echo $f->name;?></td>
<td><a href="downloads.php?file_id=<?php echo $f->id; ?>">Download</a></td>
</tr>
<?php
	}
}
?>
</table>
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
  height: 300px;
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
