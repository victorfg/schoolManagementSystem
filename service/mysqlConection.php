<?php
    session_start();
    $host="localhost";
    $username="root";
    $password="123";
    $db_name="schoolDB";

    $link = 
    mysqli_connect($host,$username,$password,$db_name);
?>
