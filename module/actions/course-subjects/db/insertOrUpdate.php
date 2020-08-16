<?php
include_once('../../../../service/mysqlConection.php');
if($_SESSION['login_type']!=='admin' || empty($_SESSION['login_type'])){
    echo "no tienes acceso";
    return;
}

$id=$_POST['lid'];
$idCourse=$_POST['lidcourse'];
$idSubject=$_POST['lidsubject'];


$id=stripslashes($id);
$idCourse=stripslashes($idCourse);
$idSubject=stripslashes($idSubject);

$insert = empty($id);
if($insert){ //insert
    $sql="insert into course_subjects(id_course,id_subject)
            values('{$idCourse}','{$idSubject}')";
}else{ //update
    $sql="update course_subjects set id_course='{$idCourse}',id_subject='{$idSubject}'
               where id={$id}";
}

if (mysqli_query($link, $sql)) {
    //$result = $insert?"inserted":"updated";
    //echo "New record {$result} successfully";
    header("Location:../list.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}
?>