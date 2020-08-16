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
}else {
    $sql = "SELECT * FROM courses";
}

$result = mysqli_query($link, $sql);
$row = mysqli_num_rows($result);
?>
<table width="500", cellpadding=5 callspacing=5 border=1>
    <tr>
        <th>ID</th>
        <th>name</th>
        <th>description</th>
        <th>Inicio</th>
        <th>Fin</th>
        <th>Activo</th>
    </tr>

    <?php while($rows = mysqli_fetch_array($result)): ?>
        <tr>
            <td><?php echo $rows['id_course']; ?></td>
            <td><a href=<?php echo "list.php?idCourse=".$rows['id_course']; ?>><?php echo $rows['name']; ?></td>
            <td><?php echo $rows['description']; ?></td>
            <td><?php echo $rows['date_start']; ?></td>
            <td><?php echo $rows['date_end']; ?></td>
            <td><?php echo $rows['active']; ?></td>
        </tr>
    <?php endwhile; ?>
    <table>

