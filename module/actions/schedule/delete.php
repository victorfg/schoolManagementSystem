<?php
include_once('mysqlConection.php');
$id=$_POST['id'];

$myid = stripslashes($id);

$sql="delete from class WHERE id_schedule='$id'";

$result = mysqli_query($link, $sql);
?>
