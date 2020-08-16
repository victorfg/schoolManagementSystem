<?php
include_once('../../../service/mysqlConection.php');
if($_SESSION['login_type']!=='admin' || empty($_SESSION['login_type'])){
    echo "no tienes acceso";
    return;
}
$id=$_GET['id'];
$idStudent=$_GET['idStudent'];
$idCourse=$_GET['idCourse'];

$id=stripslashes($id);
$idStudent=stripslashes($idStudent);
$idCourse=stripslashes($idCourse);

$specified = !empty($id);
if($specified) {
    $sql = "SELECT * FROM enrollments WHERE 
    id = {$id}";
}

$result = mysqli_query($link, $sql);
$rows=mysqli_fetch_array($result);


$sqlStudents = "SELECT * FROM users WHERE 
type = 'student'";


$resultStudent = mysqli_query($link, $sqlStudents);
$rowsStudents=mysqli_fetch_array($resultStudent);


$sqlCourses = "SELECT * FROM courses";


$resultCourses = mysqli_query($link, $sqlCourses);
$rowsCourses=mysqli_fetch_array($resultCourses);

?>
<html>
<head></head>
<div id="wrapper">
    <div id="content">
        <form action="../enrollment/db/insertOrUpdate.php" method="post">
            <label for="lid">id:</label>
            <input type="text" id="lid" name="lid" value="<?php echo $rows['id_enrollment']; ?>"><br><br>
            <select id="lidcourse" name="lidcourse">
                <?php while($rowsCourses = mysqli_fetch_array($resultCourses)): ?>
                    <?php
                    $selected = $rowsCourses['id_course']==$idCourse?"selected=\"selected\"":"";
                    ?>
                    <option value="<?php echo $rowsCourses['id_course']; ?>"><?php echo $rowsCourses['name']; ?></option>
                <?php endwhile; ?>
            </select><br><br>
            <select id="lidstudent" name="lidstudent">
                <?php while($rowsStudents = mysqli_fetch_array($resultStudent)): ?>
                    <?php
                        $selected = $rowsStudents['id']==$idStudent?"selected='selected'":'';
                    ?>
                    <option value="<?php echo $rowsStudents['id']; ?>" <?php echo $selected; ?>><?php echo $rowsStudents['username']; ?></option>
                <?php endwhile; ?>
            </select><br><br>
            <label for="lactive">Activado:</label>
            <input type="checkbox" id="lactive" name="lactive" <?php echo $rows['active']===1?'checked':'' ?>"><br><br>
            <input type="submit" value="Submit">
        </form>
    </div>

</div>
</body>
</html>