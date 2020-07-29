<?php
namespace source\Controllers;

use service\DB;
require_once '../../service/DB.php';

session_start();
(new LoginController())->login($_POST);

class LoginController
{
    public function login($request)
    {
        $myid=$request['myid'];
        $mypassword=$request['mypassword'];

        $myid = stripslashes($myid);
        $mypassword = stripslashes($mypassword);

        $_SESSION['login_id']=$myid;
        $sql="SELECT * FROM users_admin WHERE username='$myid' and password='$mypassword'";

        $type = DB::execute($sql);

        $control=$type['username'];


        if(is_null($type) || !isset($control)){
            header("Location:../index.php?login=false");
        } else if(!is_null($type) && $control=="admin"){
            header("Location:../module/admin");
        } else {
            header("Location:../index.php?login=false");
        }
    }
}