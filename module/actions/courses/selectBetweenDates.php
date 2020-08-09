<?php
include_once('mysqlConection.php');
$time=$_POST['time'];
$date=$_POST['date'];

$time=stripslashes($time);
$date=stripslashes($date);

$sql="SELECT * FROM schedule WHERE 
    '.$time.' >= time_start and 
    '.$time.' <= time_end and 
    day = '.$date.'";

$result = mysqli_query($link, $sql);

$count=mysqli_num_rows($result);
$type=mysqli_fetch_array($result);

$control=$type['username'];
echo $control;

?>