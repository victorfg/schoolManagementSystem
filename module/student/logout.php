<?php
    include ('../../service/mysqlConection.php');
    session_start();
    session_destroy();
    header("Location: ../../start.php");
?>