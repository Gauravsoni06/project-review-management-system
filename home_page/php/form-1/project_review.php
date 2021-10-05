<style>
a{
	text-decoration:none;
}
</style>
<html>
<head>
<caption>Project Review</caption>
</head>
<body>
	
<form action="" method="post">
<h1>Review</h1>
<table border="2" align="center" width="1100" height="60">
<tr>
		<th >Project Title</th>
<?php
include 'conn.php';
if(isset($_REQUEST['gid']))
{
	$gid=$_REQUEST['gid'];
	$sel="select distinct g.proj_title from group_header g,group_details g1 where g.group_no=g1.group_no and g.group_no=$gid";
	$res=$con->query($sel);
	while($f=$res->fetch_object())
	{
?>
	<td><?php echo $f->proj_title;?></td>
  </tr>
	<?php
	}
	?>
</table>
<br>
<table width="1100" height="260" border="2" align="center">
<tr>
	<th width="78">Student Id</th>
	<th width="107">Student Name</th>
	<th width="135">Attend</th>
</tr>
<?php
$sel=" select s.stu_id,s.stu_name from group_header g,group_details g1,student s where g.group_no=g1.group_no and s.stu_id=g1.stu_id and g.group_no=$gid ";
	$res=$con->query($sel);
	$cn=0;
	while($f=$res->fetch_object())
	{ 
	$cn++;
?>
	<tr>
	<td><?php echo $sid = $f->stu_id;?></td>
	<td><?php echo $f->stu_name;?></td>
	<td><center><input type="checkbox" name="attend<?php echo $cn;?>" value="<?php echo $sid = $f->stu_id;?>"></center></td>
	</tr>
	<?php
	}
?>

<input type="hidden" value="<?php echo $cn;?>" name="cn" />
<?php
	}
	?>
	
</table>
<br>
<table align="center" border="2">
<tr>
<th colspan="2">Add Review</th>
</tr>
<tr>
<td>
<textarea rows="5" cols="50" name="comments">
</textarea> 
</td>
</tr>
</table>
<br><br>
<center><input type="submit" name="insert-btn" value="Add"></center>
</form>
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
<?php
	if(isset($_REQUEST['insert-btn']))
	{
		$id=$_REQUEST['gid'];
		//echo $id;
		$c=$_REQUEST['comments'];
		$cn=$_REQUEST['cn'];
		
		$ins="INSERT INTO `review_header` (`group_no`, `review_date`, `comment`) VALUES ($id,CURDATE(),'$c')";
		$res=$con->query($ins);
		
		for($i=1;$i<=$cn;$i++)
		{
		$name='attend'.$i;
		$sel="SELECT review_header_id from review_header ORDER by review_header_id desc limit 1";
		$res=$con->query($sel);
		$k="0";
		while($f=$res->fetch_object())
	    {
		$k=$f->review_header_id;
	 
		if (isset($_REQUEST[$name]))
			{
			$d=$_REQUEST[$name];	
				$q="INSERT INTO `review_details` (`review_header_id`, `stu_id`, `p_a`) VALUES ('$k', '$d', 'p')";
			    $con->query($q);
				}	
				
		/**		
		if (!isset($_REQUEST[$name]))
				{
				$d=$_REQUEST[$name];
			 	$q="INSERT INTO `review_details` (`review_header_id`, `stu_id`, `p_a`) VALUES ('$k', '$d', 'a')";
			    $con->query($q);
				}		
				**/
		} 
			}

		if($res)
		{
		?>
			<script type="text/javascript">
			alert('Entered Successfully');
	window.location="fviewpage.php";
			</script>
			<?php
		}
		else
		{	
			?>
			<script type="text/javascript">
			alert('Fail');
			</script>
			<?php
		}
		
		}
	
?>