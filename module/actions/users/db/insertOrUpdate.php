<?php
include_once('../../../../service/mysqlConection.php');
    if($_SESSION['login_type']!=='admin' || empty($_SESSION['login_type'])){
        echo "no tienes acceso";
        return;
    }

    $id=$_POST['lid'];
    $username=$_POST['lusername'];
    $password=$_POST['lpassword'];
    $email=$_POST['lemail'];
    $name=$_POST['lname'];
    $surname=$_POST['lsurname'];
    $telephone=$_POST['ltelephone'];
    $nif=$_POST['lnif'];
    $type=$_POST['ltype'];


    $id=stripslashes($id);
    $username=stripslashes($username);
    $password=stripslashes($password);
    $email=stripslashes($email);
    $name=stripslashes($name);
    $surname=stripslashes($surname);
    $telephone=stripslashes($telephone);
    $nif=stripslashes($nif);
    $type=stripslashes($type);

    $insert = empty($id);
    if($insert){ //insert
        $sql="insert into users(username,password,email,name,surname,telephone,nif,date_registered,type)
            values('{$username}','{$password}','{$email}','{$name}','{$surname}','{$telephone}','{$nif}',NOW(),'{$type}')";
    }else{ //update
        $sql="update users set password='{$password}',name='{$name}',surname='{$surname}',telephone='{$telephone}',type='{$type}'
               where id={$id}";
    }

    if (mysqli_query($link, $sql)) {
        //$result = $insert?"inserted":"updated";
        //echo "New record {$result} successfully";
        header("Location:../list.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($link);
    }
?>