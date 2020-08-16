<?php
include_once('mysqlConection.php');
$id=$_POST['id'];
$name=$_POST['name'];
$description=$_POST['description'];
$active=$_POST['active'];

$id=stripslashes($id);
$name=stripslashes($name);
$description=stripslashes($description);
$active=stripslashes($active);

$sql="SELECT * FROM courses WHERE 
    id_course= '. $id .' or 
    name like %'. $name .'% or 
    description like %'. $description .'% or 
    active = '. $active .'";

$result = mysqli_query($link, $sql);

$count=mysqli_num_rows($result);
$type=mysqli_fetch_array($result);

$control=$type['username'];
echo $control;

?>