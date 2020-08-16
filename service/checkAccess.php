<?php
    include_once('mysqlConection.php');
    $myid=$_POST['myid'];
    $mypassword=$_POST['mypassword'];

    $myid = stripslashes($myid);
    $mypassword = stripslashes($mypassword);
    
    $_SESSION['login_id']=$myid;
    $sql="SELECT * FROM users WHERE username='$myid' and password='$mypassword'";

    $result = mysqli_query($link, $sql);

    $count=mysqli_num_rows($result);
    $type=mysqli_fetch_array($result);

    $_SESSION['login_type'] = $type['type'];
    $control=$type['type'];
    echo $control;

    if($count!=1 || !isset($control)){
        header("Location:../start.php?login=false");
    } else if($count==1 && $control=="admin"){
        header("Location:../module/admin");
    }else if($count==1 && $control=="teacher"){
        header("Location:../module/teacher");
    }else if($count==1 && $control=="student"){
        header("Location:../module/student");
    } else {
        header("Location:../start.php?login=false");
    }
?>
