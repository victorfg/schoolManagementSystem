<?php
include_once('mysqlConection.php');
$id=$_POST['id'];
$idStudent=$_POST['id_student'];
$idCourse=$_POST['id_course'];

$id=stripslashes($id);
$idStudent=stripslashes($idStudent);
$idCourse=stripslashes($idCurse);

$sql="SELECT * FROM enrollment WHERE 
    id_enrollment = '. $id .' or 
    id_student = '. $idStudent .' or 
    id_course = '. $idCourse .'";

$result = mysqli_query($link, $sql);

$count=mysqli_num_rows($result);
$type=mysqli_fetch_array($result);

$control=$type['username'];
echo $control;

?>