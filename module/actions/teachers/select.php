<?php
include_once('mysqlConection.php');
$id=$_POST['id'];
$name=$_POST['name'];
$surname=$_POST['surname'];
$telephone=$_POST['telephone'];
$nif=$_POST['nif'];
$email=$_POST['email'];

$id=stripslashes($id);
$name=stripslashes($name);
$surname=stripslashes($surname);
$telephone=stripslashes($telephone);
$nif=stripslashes($nif);
$email=stripslashes($email);

$sql="SELECT * FROM teachers WHERE 
    id_teacher = '. $id .' or 
    name like '%'. $name .'%' or 
    surname like '%'. $surname .'%' or
    telephone like '%'. $telephone .'%' or
    nif like '%'. $nif .'%' or
    email like '%'. $email .'%'";

$result = mysqli_query($link, $sql);

$count=mysqli_num_rows($result);
$type=mysqli_fetch_array($result);

$control=$type['username'];
echo $control;

?>

