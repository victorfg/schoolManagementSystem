<?php
    session_start();
    $host="localhost";
    $username="root";
    $password="";
    $db_name="schoolDB";

    $link = mysqli_connect($host,$username,$password,$db_name);

    // Check connection
    if (!$link) {
        die("No se ha podido conectar a la base de datos " . mysqli_connect_error());
    }
?>
