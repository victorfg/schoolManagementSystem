<?php
include_once('../../../service/mysqlConection.php');
if($_SESSION['login_type']==='student' || empty($_SESSION['login_type'])){
    echo $_SESSION['login_type'];
    echo "no tienes acceso";
    return;
}

$id=$_GET['id'];
$idSubject=$_GET['idSubject'];
$idCourse=$_GET['idCourse'];
$check=$_SESSION['login_id'];
$id=stripslashes($id);
$idSubject=stripslashes($idSubject);
$idCourse=stripslashes($idCourse);
$specified = !empty($id);
if($specified) {
    $sql = "SELECT * FROM schedule WHERE 
    id_schedule = {$id}";
}

$result = mysqli_query($link, $sql);
$rows=mysqli_fetch_array($result);
if(empty($idSubject)){
    $idSubject = $rows['id_subject'];
}
if(empty($idCourse)){
    $idCourse = $rows['id_course'];
}

$sqlSubjects = "SELECT * FROM subjects";

$resultSubject = mysqli_query($link, $sqlSubjects);

$sqlCourses = "SELECT * FROM courses";

$resultCourses  = mysqli_query($link, $sqlCourses);

?>
<html>
<head></head>
<div id="wrapper">
    <div id="content">
        <form action="../schedule/db/insertOrUpdate.php" method="post">
            <label for="fid">id:</label>
            <input type="text" id="lid" name="lid" value="<?php echo $rows['id']; ?>"><br><br>
            <label for="fidcourse">Curso:</label>
            <select id="lidcourse" name="lidcourse">
                <?php while($rowsCourse = mysqli_fetch_array($resultCourses)): ?>
                    <?php
                    $selected = $rowsCourse['id_course']==$idCourse?'selected=\'selected\'':'';
                    ?>
                    <option value="<?php echo $rowsCourse['id_course']; ?>" <?php echo $selected; ?>><?php echo $rowsCourse['name']; ?></option>
                <?php endwhile; ?>
            </select><br><br>
            <label for="lidsubject">Asignatura:</label>
            <select id="lidsubject" name="lidsubject">
                <?php while($rowsSubject = mysqli_fetch_array($resultSubject)): ?>
                    <?php
                    $selected = $rowsSubject['id_subject']==$idSubject?'selected=\'selected\'':'';
                    ?>
                    <option value="<?php echo $rowsSubject['id_subject']; ?>" <?php echo $selected; ?>><?php echo $rowsSubject['name']; ?></option>
                <?php endwhile; ?>
            </select><br><br>
            <label for="ltime_start">Hora inicio:</label>
            <input type="time" id="ltime_start" name="ltime_start" value="<?php echo $rows['time_start']; ?>"><br><br>
            <label for="ltime_end">Hora fin:</label>
            <input type="time" id="ltime_end" name="ltime_end" value="<?php echo $rows['time_end']; ?>"><br><br>
            <label for="lweek">Días semana:</label><br><br>
            <select multiple name="lweek[]">
                <option value="m" <?php echo (strpos($rows['day'], 'm') !== false)?'selected=\'selected\'':''; ?>>Lunes</option>
                <option value="t" <?php echo (strpos($rows['day'], 't') !== false)?'selected=\'selected\'':''; ?>>Martes</option>
                <option value="w" <?php echo (strpos($rows['day'], 'w') !== false)?'selected=\'selected\'':''; ?>>Miercoles</option>
                <option value="r" <?php echo (strpos($rows['day'], 'r') !== false)?'selected=\'selected\'':''; ?>>Jueves</option>
                <option value="f" <?php echo (strpos($rows['day'], 'f') !== false)?'selected=\'selected\'':''; ?>>Viernes</option>
                <option value="s" <?php echo (strpos($rows['day'], 's') !== false)?'selected=\'selected\'':''; ?>>Sábado</option>
                <option value="u" <?php echo (strpos($rows['day'], 'u') !== false)?'selected=\'selected\'':''; ?>>Domingo</option>
            </select><br><br>
            <input type="submit" value="Submit">
        </form>
    </div>
</div>
</body>
</html>