<?php
include "conn.php";
session_start();
$a=$_SESSION["fac_id"];
?>

<?php
require_once("config.php");

require('fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
// code for print Heading of tables
$pdf->SetFont('Arial','B',12);
$ret ="SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='prms' AND `TABLE_NAME`='eg'";
$query1 = $dbh -> prepare($ret);
$query1->execute();
$header=$query1->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query1->rowCount() > 0)
{
foreach($header as $heading) {
foreach($heading as $column_heading)
$pdf->Cell(60,20,$column_heading,1);
}}
//code for print data
$sql = "select g.group_no as GroupNo,g.proj_title as ProjectTitle,s.stu_name as StudentName from faculty f,group_header g,group_details g1,student s where g.fac_id=f.fac_id and s.stu_id=g1.stu_id and g.group_no=g1.group_no and f.fac_id=" .$a. " order by g.group_no asc";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row) {
$pdf->SetFont('Arial','',12);
$pdf->Ln();
foreach($row as $column)
$pdf->Cell(60,20,$column,1);
} }
$pdf->Output();
?>

