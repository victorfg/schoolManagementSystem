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
}else {
    $sql = "SELECT * FROM users";
}

$result = mysqli_query($link, $sql);
$row = mysqli_num_rows($result);
?>
<table width="500", cellpadding=5 callspacing=5 border=1>
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
        <th>Name</th>
        <th>Last Name</th>
        <th>Telephone</th>
        <th>Nif</th>
        <th>Date registered</th>
        <th>Type</th>
        <th></th>
        <th></th>
    </tr>

<?php while($rows = mysqli_fetch_array($result)): ?>
    <tr>
        <td><?php echo $rows['id']; ?></td>
        <td><?php echo $rows['username']; ?></td>
        <td><?php echo $rows['email']; ?></td>
        <td><?php echo $rows['name']; ?></td>
        <td><?php echo $rows['surname']; ?></td>
        <td><?php echo $rows['telephone']; ?></td>
        <td><?php echo $rows['nif']; ?></td>
        <td><?php echo $rows['date_registered']; ?></td>
        <td><?php echo $rows['type']; ?></td>
        <td> <a href=<?php echo "form.php?id=".$rows['id']; ?>>Modificar</a></td>
        <td> <a href=<?php echo "db/delete.php?id=".$rows['id']; ?>>Borrar</a></td>
    </tr>
<?php endwhile; ?>
<table>

