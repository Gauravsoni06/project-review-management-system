<?php
include "conn.php";
session_start();
//echo $_SESSION["firstName"];
$a=$_SESSION["fac_id"];
?>

<?php
include("config.php");
?>
<html>
<head>
</head>
<form>
<body>
<h1 style=text-align:right><a href="genratepdf.php" target="_blank">Click here to Generate PDF</a></p>
<table width="1100" height="260" border="4" align="center">
<tr>
<td width="79" style="font-weight:bold;">Group No</td>
<td width="149" style="font-weight:bold;">Project Title</td>
<td width="158" style="font-weight:bold;">Student Details</td>
</tr>
<?php 
$sql = "select g.group_no,g.proj_title,s.stu_name from faculty f,group_header g,group_details g1,student s where g.fac_id=f.fac_id and s.stu_id=g1.stu_id and g.group_no=g1.group_no and f.fac_id=" .$a. " order by g.group_no asc";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row) 
	{ ?>

<tr>
<td><?php echo htmlentities($row->group_no);?></td>
<td><?php echo htmlentities($row->proj_title);?></td>
<td><?php echo htmlentities($row->stu_name);?></td>
</tr>

<?php } }
?>
</table>
<center><a href="logout.php"><input type="button" value="Logout"></a></center>
<form>
</body>
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