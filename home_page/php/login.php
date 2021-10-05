<html>
<form action="connection.php" method="post">
<head>
<?php
  if(isset($_REQUEST['q']))
   {
	   echo "<script>alert('Login Fail - User name OR Password May Wrong');</script>"; 
   } 
?>
<br><br><br><br><br><br>
<center>
<table width="415" height="422" border="0">
<tr>
<td width="96" height="56" colspan="2"><center><font size="+3" color="#333333"><b>LOGIN</b></font></center></td>
</tr>
  <tr>
    <td width="96" colspan="2"><center><img src="Photos/logo4.png" width="100" height="100"></center></td>
  </tr>
  <tr>
    <td height="68"><font size="5" color="#000000"><b>Username</b></font></td>
    <td><input type="text" name="username" style="font-size:24px"></td>
  </tr>
  <tr>
    <td height="78"><font size="5" color="#000000"><b>Password<b></font></td>
    <td><input type="password" name="password" style="font-size:24px"></td>
  </tr>
  <tr>
    <td width="96" height="44" colspan="2">
	
</td>
  </tr>
  <tr>
  <td><strong><font color="#333333" size="3"> </font></strong>
    &nbsp;
    <select name="Role">
<option name="admin" value="admin">Admin</option>
<option name="faculty" value="faculty">Faculty</option>
<option name="student" value="student">Student</option>
</select>
</td>
  <td width="96" height="56" colspan="2"><center><input type="submit"></center></td>
  </tr>
</table>
</center>
</form>
</body>
</html>




