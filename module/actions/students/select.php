<?php
include_once('mysqlConection.php');
$id=$_POST['id'];
$username=$_POST['username'];
$pass=$_POST['pass'];
$email=$_POST['email'];
$name=$_POST['name'];
$surname=$_POST['surname'];
$telephone=$_POST['telephone'];
$nif=$_POST['nif'];

$id=stripslashes($id);
$username=stripslashes($username);
$pass=stripslashes($pass);
$email=stripslashes($email);
$name=stripslashes($name);
$surname=stripslashes($surname);
$telephone=stripslashes($telephone);
$nif=stripslashes($nif);

$sql="SELECT * FROM students WHERE 
    id= '. $id .' or 
    username like '%'. $username .'%' or 
    pass like '%'. $pass .'%' or 
    email like '%'. $email .'%' or 
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