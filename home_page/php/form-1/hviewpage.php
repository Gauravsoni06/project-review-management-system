<html>
<form>
<h1>
ADMIN PAGE
</h1>
  <h1>Welcome 
  <?php
include "conn.php";
session_start();
echo $_SESSION["firstName"];
$a=$_SESSION["fac_id"];
?>
</h1>

<br>
<table width="1100" height="150" border="4" align="center" >
<tr>
<th>Select the Faculty</th>
<td>
<select name="viewallfaculty">
<?php
	$sel="select * from faculty where fac_id not in ($a)";
	$res=$con->query($sel);
	while($s=$res->fetch_object())
	{
	?>
	<option value="<?php echo $s->fac_id;?>" ><?php echo $s->fac_name;?></option>
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

<br>
	  <table width="1100" height="150" border="4" align="center">
	  <tr>
	  <th colspan="4"><font size="+1">Group Information</font></th>
	  </tr>
	  <tr>
	  <th width="133">Faculty Name</th>
	  <th width="112">Group No</th>
	  <th width="146">Student Name</th>
	  <th width="187">Add Student</th>
	  </tr>
<?php
if (isset($_REQUEST['select-btn']))
{
$fac=$_REQUEST['viewallfaculty'];
	$s="select f.fac_name,g.group_no,s.stu_name from faculty f,group_header g,student s,group_details g1 where f.fac_id=g.fac_id and s.stu_id=g1.stu_id and g.group_no=g1.group_no and f.fac_id=" .$fac. " order by g.group_no asc";
	$res=$con->query($s);
	while($f=$res->fetch_object())
	{
	  ?>
	  	<tr>
		<td><?php echo $f->fac_name;?></td>
		<td><?php echo $f->group_no;?></td>
		<td><?php echo $f->stu_name;?></td>
		<td><a href="addstud.php?fid=<?php echo $fac;?>"><font color="#3399FF">Add Student..</font></a></td>
		</tr>
		<?php
	} 
	}
	?>

	</table>
	
<br><br>

  <p><a href="logout.php">
  <table>
    <input name="button" type="button" value="Logout">
	</table>
  </a></p>
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
  font-size: 18px;
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

label {
  color: #666;
  display: block;
  padding-bottom: 9px;
}

input[type="text"],
input[type="password"] {
  width: 100%;
  padding: 8px 5px;
  background: linear-gradient(#1f2124, #27292c);
  border: 1px solid #222;
  box-shadow: 0 1px 0 rgba(255, 255, 255, 0.1);
  border-radius: 0.3em;
  margin-bottom: 20px;
}

label[for="remember"] {
  color: white;
  display: inline-block;
  padding-bottom: 0;
  padding-top: 5px;
}

input[type="checkbox"] {
  display: inline-block;
  vertical-align: top;
}

.p-container {
  padding: 0 20px 20px 20px;
}

.p-container:after {
  clear: both;
  display: table;
  content: "";
}

.p-container span {
  display: block;
  float: left;
  color: #0d93ff;
  padding-top: 8px;
}

input[type="submit"] {
  padding: 5px 20px;
  border: 1px solid rgba(0, 0, 0, 0.4);
  text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.4);
  box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.3),
    inset 0 10px 10px rgba(255, 255, 255, 0.1);
  border-radius: 0.3em;
  background: #0184ff;
  color: white;
  margin-right:0%;
  font-weight: bold;
  cursor: pointer;
  font-size: 13px;
}

input[type="submit"]:hover {
  box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.3),
    inset 0 -10px 10px rgba(255, 255, 255, 0.1);
}

input[type="text"]:hover,
input[type="password"]:hover,
label:hover ~ input[type="text"],
label:hover ~ input[type="password"] {
  background: #27292c;
}

</style>
</html>