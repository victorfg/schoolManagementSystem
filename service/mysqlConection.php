<?php
    session_start();
    $host="localhost";
    $username="root";
    $password="";
    $db_name="schoolDB";

    $link = 
    mysqli_connect($host,$username,$password,$db_name);
    /*if(!$link) {
        echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
    } else {
        echo "<h3>Conexion Exitosa PHP - MySQL</h3><hr><br>";
    }*/
?>
