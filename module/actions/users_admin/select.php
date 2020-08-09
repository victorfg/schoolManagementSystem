<?php
include_once('mysqlConection.php');
$id=$_POST['id'];
$username=$_POST['username'];
$email=$_POST['email'];
$name=$_POST['name'];

$id=stripslashes($id);
$username=stripslashes($username);
$email=stripslashes($email);
$name=stripslashes($name);

$sql="SELECT * FROM users_admin WHERE 
    id= '. $id .' or 
    username like '%'. $username .'%' or 
    email like '%'. $email .'%' or 
    name like '%'. $name .'%'";

$result = mysqli_query($link, $sql);

$count=mysqli_num_rows($result);
$type=mysqli_fetch_array($result);

$control=$type['username'];
echo $control;

?>