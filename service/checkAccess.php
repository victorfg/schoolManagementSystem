<?php
    include_once('mysqlConection.php');
    $myid=$_POST['myid'];
    $mypassword=$_POST['mypassword'];

    $myid = stripslashes($myid);
    $mypassword = stripslashes($mypassword);
    
    $_SESSION['login_id']=$myid;
    $sql="SELECT * FROM users_admin WHERE username='$myid' and password='$mypassword'";

    $result = mysqli_query($link, $sql);

    $count=mysqli_num_rows($result);
    $type=mysqli_fetch_array($result);

    $control=$type['username'];
    echo $control;

    if($count!=1 || !isset($control)){
        header("Location:../index.php?login=false");
    } else if($count==1 && $control=="admin"){
        header("Location:../module/admin");
    } else {
        header("Location:../index.php?login=false");
    }
?>
