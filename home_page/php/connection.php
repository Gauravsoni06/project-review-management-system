<?php  
@session_start();

$uname=$_REQUEST['username'];
$password=$_REQUEST['password'];
$type=$_REQUEST['Role'];


$conn = mysqli_connect("localhost:3306", "root", "","prms");  
if(!$conn)
{  
  die('Could not connect: '.mysqli_connect_error());  
}  

if ($type=='admin') 
{
$sql = "select * from faculty where username = '$uname'";
$result=$conn->query($sql);
mysqli_query($conn, $sql);  
		 while(($row = mysqli_fetch_row($result))!= NULL )
		 {
		 		 echo $u = $row[3];
				 echo $p = $row[4];
				 echo $t = $row[2];
				 echo $fn = $row[1];
				 echo $id = $row[0];
				 $_SESSION["fac_id"] = $id;
				 $_SESSION["firstName"] = $fn;
				 $_SESSION["userName"] = $u;
		 }
		 
		 if ($t == "101" && $uname==$u && $password==$p )
		 {
		 header('Location: hviewpage.php');	 
		 }
		 else
		 {
		 header('Location: login.php?q=error');
		 }
}
			
elseif ($type=='faculty')
{
$sql = "select * from faculty where username = '$uname'";
$result=$conn->query($sql);
mysqli_query($conn, $sql);  
		 while(($row = mysqli_fetch_row($result))!= NULL )
		 {
		 		 echo $u = $row[3];
				 echo $p = $row[4];
				 echo $t = $row[2];
				 echo $fn = $row[1];
				 echo $id = $row[0];
				 $_SESSION["fac_id"] = $id;
				 $_SESSION["firstName"] = $fn;
				$_SESSION["userName"] = $u;
		 }
		 
		 if ($t == "102" && $uname==$u && $password==$p)
		 {
		 header('Location: fviewpage.php');	 
		 }
		 else
		 {
		 header('Location: login.php?q=error');
		 }
}


else
{
$sql = "select * from student where username = '$uname'";
$result=$conn->query($sql);
mysqli_query($conn, $sql);  
while(($row = mysqli_fetch_row($result))!= NULL )
		 {
		 		 echo $u = $row[4];
				 echo $p = $row[5];
				 echo $t = $row[2];
				 echo $fn = $row[1];
				 echo $id = $row[0];
				 $_SESSION["stu_id"] = $id;
				 $_SESSION["firstName"] = $fn;
				 $_SESSION["userName"] = $u;
		 }
		 
		if ($t == "103" && $uname==$u && $password==$p )
		 {
		 header('Location: sviewpage.php');	 
		 }		
		 else
		 {
		 header('Location: login.php?q=error');
		 }
}
mysqli_close($conn); 
?>

