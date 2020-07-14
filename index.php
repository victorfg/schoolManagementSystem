<?php
    $login_code= isset($_REQUEST['login']) ? $_REQUEST['login'] : '1';
    if($login_code=="false"){
        $login_message="Wrong Credentials !";
        $color="red";
    }
    else{
        $login_message="Please Login!";
        $color="green";
    }
?>
<!DOCTYPE html>
<html>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <head>
        <meta charset="UTF-8">
	        <script src="source/js/loginValidate.js"></script>
            <title>School Management System</title>
    </head>
    <body>
        <center>
            <img width="300" height="300" src="source/images/logo.png" />
            <hr/>
            <?php echo "<font size='4' color='$color'>$login_message</font>";?>
            <form  action="service/check.access.php" onsubmit="return loginValidate();" method="post"><br/>
                <input type="text" id="myid" name="myid" placeholder="your id" autofocus=""   /><br/><br/><br/>
                <input type="password" id="mypassword" name="mypassword" placeholder="your password"  /><br/><br/><br/>
                <button type="submit" value="Login" class="btn btn-primary">Login</button>
            </form>
        </center>
    </body>
</html>