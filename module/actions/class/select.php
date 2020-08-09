<?php
include_once('mysqlConection.php');
$id=$_POST['id'];
$idTeacher=$_POST['id_teacher'];
$idCourse=$_POST['id_course'];
$idSchedule=$_POST['id_schedule'];
$name=$_POST['id_schedule'];
$color=$_POST['id_schedule'];

$id=stripslashes($id);
$idTeacher=stripslashes($idTeacher);
$idCourse=stripslashes($idCourse);
$idSchedule=stripslashes($idSchedule);
$name=stripslashes($name);
$color=stripslashes($color);

$sql="SELECT * FROM class WHERE 
    id_class = '. $id .' or 
    id_teacher = '. $idTeacher .' or 
    id_course = '. $idCourse .' or 
    id_Schedule = '. $idSchedule .'  or 
    name like %'. $name .'% or 
    color like %'. $color .'%";

$result = mysqli_query($link, $sql);

$count=mysqli_num_rows($result);
$type=mysqli_fetch_array($result);

$control=$type['username'];
echo $control;

?>