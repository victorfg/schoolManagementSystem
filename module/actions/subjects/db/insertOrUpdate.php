<?php
include_once('../../../../service/mysqlConection.php');
if($_SESSION['login_type']!=='admin' || empty($_SESSION['login_type'])){
    echo "no tienes acceso";
    return;
}

$id=$_POST['lid'];
$idTeacher=$_POST['lidteacher'];
$name=$_POST['lname'];
$color=$_POST['lcolor'];


$id=stripslashes($id);
$idTeacher=stripslashes($idTeacher);
$name=stripslashes($name);
$color=stripslashes($color);

$insert = empty($id);
if($insert){ //insert
    $sql="insert into subjects(id_teacher,name,color)
            values('{$idTeacher}','{$name}','{$color}')";
}else{ //update
    $sql="update subjects set id_teacher='{$idTeacher}',name='{$name}',color='{$color}'
               where id_subject={$id}";
}

if (mysqli_query($link, $sql)) {
    header("Location:../list.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}
?>