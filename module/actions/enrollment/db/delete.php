<?php
include_once('../../../../service/mysqlConection.php');
if($_SESSION['login_type']!=='admin' || empty($_SESSION['login_type'])){
    echo "no tienes acceso";
    return;
}
$id=$_GET['id'];
$idCourse=$_GET['idCourse'];

$id=stripslashes($id);
$specified = !empty($id);
if($specified) {
    $sql = "delete from enrollment WHERE 
    id_enrollment = {$id}";
}else {
    echo "Id not specified";
    return;
}
if (mysqli_query($link, $sql)) {
    header("Location: ../list.php?idCourse={$idCourse}");
    //echo "Record deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}
?>
