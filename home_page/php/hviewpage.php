<html>
<h2>Welcome you 
<?php
include "conn.php";
session_start();
echo $_SESSION["firstName"];
$a=$_SESSION["fac_id"];
?>
<style>
a{
	text-decoration:none;
}
</style>
<hr>
<head></head>
<body>

<center>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p><a href="logout.php">
    <input name="button" type="button" value="Logout">
  </a> </p>
</center>
</body>
</html>