<?php
require_once ("dbcontroller.php");
$db_handle = new DBController();
if (!empty($_REQUEST["degree_id"])) {
    $query = "SELECT * FROM semester WHERE degree_id = '" . $_REQUEST["degree_id"] . "' order by sem_name asc";
    $results = $db_handle->runQuery($query);
    ?>
<option value disabled selected>Select Semester</option>
<?php
    foreach ($results as $city) {
        ?>
<option value="<?php echo $city["sem_id"]; ?>"><?php echo $city["sem_name"]; ?></option>
<?php
    }
}
?>