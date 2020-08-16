<?php
include_once('../../../../service/mysqlConection.php');
if($_SESSION['login_type']!=='admin' || empty($_SESSION['login_type'])){
    echo "no tienes acceso";
    return;
}

$id=$_POST['lid'];
$idStudent=$_POST['lidstudent'];
$idCourse=$_POST['lidcourse'];
$active=$_POST['lactive']==='on'?1:0;


$id=stripslashes($id);
$idStudent=stripslashes($idStudent);
$idCourse=stripslashes($idCourse);
$status=stripslashes($status);

$insert = empty($id);
if($insert){ //insert
    $sql="insert into enrollment(id_student,id_course,status)
            values('{$idStudent}','{$idCourse}','{$active}')";
}else{ //update
    $sql="update enrollment set id_student='{$idStudent}',id_course='{$idCourse}',status='{$active}'
               where id_enrollment={$id}";
}

if (mysqli_query($link, $sql)) {
    header("Location:../list.php?idCourse={$idCourse}");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}
?>