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
    $sql = "SELECT * FROM courses WHERE 
    id_course = {$id}";
}

$result = mysqli_query($link, $sql);
$rows=mysqli_fetch_array($result);

?>
<html>
<head></head>
<div id="wrapper">
    <div id="content">
        <form action="../courses/db/insertOrUpdate.php" method="post">
            <label for="lid">id:</label>
            <input type="text" id="lid" name="lid" value="<?php echo $rows['id_course']; ?>"><br><br>
            <label for="lname">Nombre:</label>
            <input type="text" id="lname" name="lname" value="<?php echo $rows['name']; ?>"><br><br>
            <label for="ldescription">Description:</label>
            <input type="text" id="ldescription" name="ldescription" value="<?php echo $rows['description']; ?>"><br><br>
            <label for="ldate_start">Inicio:</label>
            <input type="date" id="ldate_start" name="ldate_start" value="<?php echo $rows['date_start']; ?>"><br><br>
            <label for="ldate_end">Fin:</label>
            <input type="date" id="ldate_end" name="ldate_end" value="<?php echo $rows['date_end']; ?>"><br><br>
            <label for="lactive">Activado:</label>
            <input type="checkbox" id="lactive" name="lactive" <?php echo $rows['active']===1?'checked':'' ?>"><br><br>
            <input type="submit" value="Submit">
        </form>
    </div>

</div>
</body>
</html>