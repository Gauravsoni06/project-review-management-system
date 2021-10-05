<?php
require_once ("dbcontroller.php");
$db_handle = new DBController();
if (!empty($_REQUEST["course_id"])) 
    {
    $query = "SELECT * FROM degree WHERE course_id = '" . $_REQUEST["course_id"] . "'";
    $results = $db_handle->runQuery($query);
    ?>
<option value disabled selected>Select Degree</option>
<?php
    foreach ($results as $state) {
        ?>
<option value="<?php echo $state["degree_id"]; ?>"><?php echo $state["degree_name"]; ?></option>
<?php
    }
}
?>