<?php
include_once('../../../service/mysqlConection.php');
if($_SESSION['login_type']!=='admin' || empty($_SESSION['login_type'])){
    echo "no tienes acceso";
    return;
}
$idCourse=$_GET['idCourse'];
$idCourse=stripslashes($idCourse);

$specified = !empty($idCourse);
if($specified) {
    $sql = "SELECT * FROM enrollment WHERE 
    id_course= {$idCourse}";
}else {
    header("Location: courses-list.php");
}

$result = mysqli_query($link, $sql);
$row = mysqli_num_rows($result);
?>
<div class="justify-content-center">
    <button>
        <a href="form.php?idCourse=<?php echo $idCourse; ?>">Crear matricula</a>
    </button>
</div>
<table width="500", cellpadding=5 callspacing=5 border=1>
    <tr>
        <th>ID</th>
        <th>ID_student</th>
        <th>ID_course</th>
        <th>Activo</th>
    </tr>

    <?php while($rows = mysqli_fetch_array($result)): ?>
        <tr>
            <td><?php echo $rows['id_enrollment']; ?></td>
            <td><?php echo $rows['id_student']; ?></td>
            <td><?php echo $rows['id_course']; ?></td>
            <td><?php echo $rows['status']; ?></td>
            <td> <a href="<?php echo "form.php?id={$rows['id_enrollment']}&idStudent={$rows['id_student']}&idCourse={$rows['id_course']}"; ?>">Modificar</a></td>
            <td> <a href=<?php echo "db/delete.php?id={$rows['id_enrollment']}&idCourse={$rows['id_course']}";?>>Borrar</a></td>
        </tr>
    <?php endwhile; ?>
    <table>

