<?php
include_once('../../../../service/mysqlConection.php');
if($_SESSION['login_type']==='student' || empty($_SESSION['login_type'])){
    echo $_SESSION['login_type'];
    echo "no tienes acceso";
    return;
}

$id=$_POST['lid'];
$idCourse=$_POST['lidcourse'];
$idSubject=$_POST['lidsubject'];
$timeStart=$_POST['ltime_start'];
$timeEnd=$_POST['ltime_end'];
$weekDays=$_POST['lweek'];


$id=stripslashes($id);
$idCourse=stripslashes($idCourse);
$idSubject=stripslashes($idSubject);
$timeStart=stripslashes($timeStart);
$timeEnd=stripslashes($timeEnd);
$weekDays=implode('|', $weekDays);

$insert = empty($id);
if($insert){ //insert
    $sql="insert into schedule(id_course,id_subject,time_start,time_end,day)
            values('{$idCourse}','{$idSubject}','{$timeStart}','{$timeEnd}','{$weekDays}')";
}else{ //update
    $sql="update schedule set id_course='{$idCourse}',id_subject='{$idSubject}',time_start='{$timeStart}',time_end='{$timeEnd}',day='{$weekDays}'
               where id_schedule={$id}";
}

if (mysqli_query($link, $sql)) {
    //$result = $insert?"inserted":"updated";
    //echo "New record {$result} successfully";
    header("Location:../list.php?idcourse={$idCourse}&idsubject={$idSubject}");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}
?>