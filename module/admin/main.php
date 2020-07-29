<?php
include "../../autoload.php";

    $link = mysqli_connect(env('DB_HOST'),
    env('DB_USERNAME'),
    env('DB_PASSWORD'),
    env('DB_NAME'),
    env('DB_PORT'));

    $check=$_SESSION['login_id'];

if ($link) {
    $session = mysqli_query($link, "SELECT name FROM users_admin WHERE username='$check' ");
    if ($session) {
        $row = mysqli_fetch_array($session);
        $login_session = $loged_user_name = $row['name'];
        if (!isset($login_session)) {
            header("Location:../../");
        }
    } else {
        echo mysqli_error($link);
    }
} else {
    echo "Error: La conexión no existe";
}

?>