<?php
include_once('../../../service/mysqlConection.php');
if($_SESSION['login_type']!=='admin' || empty($_SESSION['login_type'])){
    echo "no tienes acceso";
    return;
}
$id=$_GET['id_subject'];

$id=stripslashes($id);

$specified = !empty($id);
if($specified) {
    $sql = "SELECT * FROM subjects WHERE 
    id_subject = {$id}";
}

$result = mysqli_query($link, $sql);
$rows=mysqli_fetch_array($result);


$sqlTeacher = "SELECT * FROM users WHERE 
type = 'teacher'";


$resultTeacher = mysqli_query($link, $sqlTeacher);
$rowsTeachers=mysqli_fetch_array($resultTeacher);


?>
<html>
<head></head>
    <div id="wrapper">
            <div id="content">
                <form action="../subjects/db/insertOrUpdate.php" method="post">
                    <select id="lidteacher" name="lidteacher">
                        <?php while($rowsTeachers = mysqli_fetch_array($resultTeacher)): ?>
                            <?php
                            $selected = $rowsTeachers['id']==$result['id_teacher']?"selected='selected'":'';
                            ?>
                            <option value="<?php echo $rowsTeachers['id']; ?>" <?php echo $selected; ?>><?php echo $rowsTeachers['username']; ?></option>
                        <?php endwhile; ?>
                    </select><br><br>
                    <label for="lname">Nombre:</label>
                    <input type="text" id="lname" name="lname"><br><br>
                    <label for="lcolor">Color:</label>
                    <input type="text" id="lcolor" name="lcolor"><br><br>
                    <input type="submit" value="Submit">
                </form>
            </div>
    </div>
</body>
</html>