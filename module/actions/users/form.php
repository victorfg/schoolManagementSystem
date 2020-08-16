<?php
include_once('../../../service/mysqlConection.php');
if($_SESSION['login_type']!=='admin' || empty($_SESSION['login_type'])){
    echo "no tienes acceso";
    return;
}

$id=$_GET['id'];
$id=stripslashes($id);
$specified = !empty($id);
if($specified) {
    $sql = "SELECT * FROM users WHERE 
    id = {$id}";
}

$result = mysqli_query($link, $sql);
$rows=mysqli_fetch_array($result);

?>
<html>
<head></head>
<div id="wrapper">
    <div id="content">
        <form action="../users/db/insertOrUpdate.php" method="post">
            <label for="lid">id:</label>
            <input type="text" id="lid" name="lid" value="<?php echo $rows['id']; ?>"><br><br>
            <label for="lusername">Usuario:</label>
            <input type="text" id="lusername" name="lusername" value="<?php echo $rows['username']; ?>"><br><br>
            <label for="lpassword">Contraseña:</label>
            <input type="text" id="lpassword" name="lpassword" value="<?php echo $rows['password']; ?>"><br><br>
            <label for="lemail">Email:</label>
            <input type="text" id="lemail" name="lemail" value="<?php echo $rows['email']; ?>"><br><br>
            <label for="lname">Nombre:</label>
            <input type="text" id="lname" name="lname" value="<?php echo $rows['name']; ?>"><br><br>
            <label for="lsurname">Apellido:</label>
            <input type="text" id="lsurname" name="lsurname" value="<?php echo $rows['surname']; ?>"><br><br>
            <label for="ltelephone">Teléfono:</label>
            <input type="text" id="ltelephone" name="ltelephone" value="<?php echo $rows['telephone']; ?>"><br><br>
            <label for="lnif">NIF/DNI:</label>
            <input type="text" id="lnif" name="lnif" value="<?php echo $rows['nif']; ?>"><br><br>
            <label for="ltype">Tipo:</label>
            <select id="ltype" name="ltype" value="<?php echo $rows['type']; ?>">
                <option value="admin">Administrador</option>
                <option value="teacher">Profesor</option>
                <option value="student">Estudiante</option>
            </select><br><br>
            <input type="submit" value="Submit">
        </form>
    </div>

</div>
</body>
</html>