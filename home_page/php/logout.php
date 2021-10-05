<?php
  session_start();
  session_destroy();
  if(isset($_SESSION['staff_username']))
unset($_SESSION['staff_username']);
header("location: login.php");
?>