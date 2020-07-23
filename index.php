<?php
    $login_code= isset($_REQUEST['login']) ? $_REQUEST['login'] : '1';
    if($login_code=="false"){
        $login_message="El usuario o contraseña es incorrecto";
        $color="red";
    }
    else{
        $login_message="Introduce tu usuario y contraseña";
        $color="green";
    }
?>
<!DOCTYPE html>
<html>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="source/css/index.css">
    <link rel="stylesheet" href="source/css/fonts.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <head>
        <meta charset="UTF-8">
        <title>School Management System</title>
    </head>
    <body style="background-color: #666666;">
	
        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100">
                    <form action="service/checkAccess.php" onsubmit="return loginValidate();" method="post" class="login100-form validate-form">                        
                        <h1 class="flex-1">School Management System</h1>
                        <?php echo "<div class='margin-top-15'><font size='4' color='$color'>$login_message</font></div>";?>
                        <div class="margin-top-15 wrap-input100 validate-input" data-validate = "el nombre de usuario es obligatorio">
                            <input class="input100" id="myid" name="myid">
                            <span class="focus-input100"></span>
                            <span class="label-input100">Nombre</span>
                        </div>
                        
                        
                        <div class="wrap-input100 validate-input" data-validate="El password es obligatorio">
                            <input class="input100" type="password" name="mypassword" id="mypassword">
                            <span class="focus-input100"></span>
                            <span class="label-input100">Password</span>
                        </div>

                        <div class="container-login100-form-btn">
                            <button type="submit" value="Login" class="login100-form-btn">
                                Login
                            </button>
                        </div>
                        <div class="text-align-center margin-top-15">
                        <div>Para loguearse como admin  </div>
                            <div>user:admin pass:123 </div>
                        </div>
                    </form>

                    <div class="login100-more" style="background-image: url('landing/images/cover.jpg');"></div>
                </div>
            </div>
        </div>
    </body>
    <script src="source/js/loginValidate.js"></script>
</html>