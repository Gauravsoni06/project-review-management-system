<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$query ="SELECT * FROM course";
$results = $db_handle->runQuery($query);
?>
<html>
<head>
<style type="text/css">
<!--
.demoInputBox1 {
padding: 10px;
border: #bdbdbd 1px solid;
border-radius: 4px;
background-color: #FFF;
width: 50%;

}
-->


</style>
<head>
<br><br><br><br>

<style>
body{width:610px;font-family:calibri; margin:auto}
.frmDronpDown {border: 1px solid #111;background-color:#111;opacity: 0.9;margin: 2px 0px;padding:40px;border-radius:4px;}
.demoInputBox {padding: 10px;border: #bdbdbd 1px solid;border-radius: 4px;background-color: #FFF;width: 50%;}
.row{padding-bottom:15px;}
</style>
 
<script>
function getState(str) {
 
						 
 
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("state-list").innerHTML = this.responseText;
				
            }
        };
        xmlhttp.open("GET", "getState.php?course_id=" + str, true);
        xmlhttp.send();
		
		
}



function getCity(str) {
	
	
	
	  var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("city-list").innerHTML = this.responseText;
				
            }
        };
        xmlhttp.open("GET", "getCity.php?degree_id=" + str, true);
        xmlhttp.send();
		
}

</script>
</head>
<body>
<div class="frmDronpDown">
<div class="row">
<label>Course:</label><br/>
<select name="country" id="country-list" class="demoInputBox1" onChange="getState(this.value);">
  <option value disabled selected>Select Course</option>
  <?php
foreach($results as $country) {
?>
  <option value="<?php echo $country["course_id"]; ?>"><?php echo $country["course_name"]; ?></option>
  <?php
}
?>
</select>
</div>
<div class="row">
<label>Degree:</label><br/>
<select name="state" id="state-list" class="demoInputBox" onChange="getCity(this.value);">
<option value="">Select Degree</option>
</select>
</div>
<div class="row">
<label>Semester:</label><br/>
<select name="city" id="city-list" class="demoInputBox">
<option value="">Select Semester</option>
</select>
</div>
</div>
</body>
<center><a href="group_all.php"><input type="button" value="Next"></a></center>
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




</style>
</html>