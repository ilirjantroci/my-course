<?php
include_once '../model/Delete.php';

$delete=new Deletee();

if ($k=$_GET['k']) {
	$delete->delete_kursi($k);
    header("Location:../view/course_list.php");
}
if ($kl=$_GET['kl']) {
	$delete->delete_klasa($kl);
    header("Location:../view/class_list.php");
}
if ($tch=$_GET['tch']) {
	$delete->delete_teacher($tch);
    header("Location:../view/teacher_list.php");
}
if ($st=$_GET['st']) {
	$delete->delete_student($st);
    header("Location:../view/student_list.php");
}
if ($mnd=$_GET['mandat']) {
	$delete->delete_mandat($mnd);
	header("Location:../view/mandat_list.php");
}

/*
$k=$_GET['k'];
$delete->delete_kursi($k);
header("Location:../view/course_list.php");



$kl=$_GET['kl'];
$delete->delete_klasa($kl);
header("Location:../view/class_list.php");


$tch=$_GET['tch'];
$delete->delete_teacher($tch);
header("Location:../view/teacher_list.php");


$st=$_GET['st'];
$delete->delete_student($st);
header("Location:../view/student_list.php");
*/
/*
$mnd=$_GET['mandat'];
$delete->delete_mandat($mnd);
*/
?>