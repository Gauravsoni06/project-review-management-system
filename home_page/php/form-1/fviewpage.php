<html>
  
  <form >
  <h1>
  FACULTY PAGE
  </h1>
    <h2>	&nbsp	&nbsp	&nbspWelcome 
    <?php
    
  include "conn.php";
  session_start();
  echo $_SESSION["firstName"];
  $a=$_SESSION["fac_id"];
  ?>
  
  </h2>
    
    <p><a href="logout.php">
    &emsp; &emsp; &emsp;<input name="button" type="button" value="Logout">
    <table>
    <p>&nbsp;</p>
    <table width="1100" height="260" border="4" align="center">
  <tr>
  <th width="126">Group No</th>
  <th width="134">Project Title</th>
  <th width="207">Student Details</th>
  <th width="146">Take Review</th>
  <th width="154">Add Student</th>
  </tr>
  <?php
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
  <br><br><br>
  <h2><a href="uploaded_documents.php" >&emsp; &emsp; &emsp;Click  here to See uploaded documents</a></h2>

  <h2 style=><a href="report.php" >&emsp; &emsp; &emsp;Click here Generate Report</a><h2>
    
  
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