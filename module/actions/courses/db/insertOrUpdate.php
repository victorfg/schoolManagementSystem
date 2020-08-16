<?php
include_once('../../../../service/mysqlConection.php');
if($_SESSION['login_type']!=='admin' || empty($_SESSION['login_type'])){
    echo "no tienes acceso";
    return;
}

$id=$_POST['lid'];
$name=$_POST['lname'];
$description=$_POST['ldescription'];
$dateStart=$_POST['ldate_start'];
$dateEnd=$_POST['ldate_end'];
$active=$_POST['lactive']==='on'?1:0;


$id=stripslashes($id);
$name=stripslashes($name);
$description=stripslashes($description);
$dateStart=stripslashes($dateStart);
$dateEnd=stripslashes($dateEnd);
$active=stripslashes($active);


$insert = empty($id);
if($insert){ //insert
    $sql="insert into courses(name,description,date_start,date_end,active)
            values('{$name}','{$description}','{$dateStart}','{$dateEnd}','{$active}')";
}else{ //update
    $sql="update users set name='{$name}',description='{$description}',date_start='{$dateStart}',date_end='{$dateEnd}',active='{$active}'
               where id={$id}";
}

if (mysqli_query($link, $sql)) {
    $result = $insert?"inserted":"updated";
    echo "New record {$result} successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}
?>