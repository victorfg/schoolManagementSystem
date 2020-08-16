<?php
    include_once('../../service/mysqlConection.php');
    $check=$_SESSION['login_id'];
    //$session=mysql_query("SELECT name  FROM admin WHERE id='$check' ");
    if($link){
        $session = mysqli_query($link, "SELECT name FROM users WHERE username='$check' and type='student'");
        if($session){
            $row=mysqli_fetch_array($session);
            $login_session = $loged_user_name = $row['name'];
            if(!isset($login_session)){
                header("Location:../../");
            }
        } else {
            echo mysqli_error($link);   
        }
    } else{
        echo "Error: La conexión no existe";
    }
?>