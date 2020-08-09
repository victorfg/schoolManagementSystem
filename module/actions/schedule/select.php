<?php
include_once('mysqlConection.php');
$id=$_POST['id'];
$idClass=$_POST['id_class'];

$id=stripslashes($id);
$idClass=stripslashes($idClass);

$sql="SELECT * FROM schedule WHERE 
    id_schedule = '. $id .' or 
    id_class = '. $idClass .'";

$result = mysqli_query($link, $sql);

$count=mysqli_num_rows($result);
$type=mysqli_fetch_array($result);

$control=$type['username'];
echo $control;

?>