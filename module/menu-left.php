<?php
$userType = $_SESSION['login_type'];
?>
<?php if($userType==='admin'): ?>
<!-- Nav Item - Tables -->

<li class="nav-item">
    <a class="nav-link" href="../module/actions/subjects/list.php">
        <i class="fas fa-fw fa-table"></i>
        <span>Asignaturas</span></a>
</li>

    <hr class="sidebar-divider d-none d-md-block">
<!-- Nav Item - Tables -->
<li class="nav-item">
    <a class="nav-link" href="../module/actions/courses/list.php">
        <i class="fas fa-fw fa-table"></i>
        <span>Cursos</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Nav Item - Tables -->
<li class="nav-item">
<a class="nav-link" href="../module/actions/users/list.php">
<i class="fas fa-fw fa-table"></i>
<span>Usuarios</span></a>
</li>
<?php endif; ?>
<?php if($userType!=='student'): ?>
<!-- Nav Item - Tables -->

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

<li class="nav-item">
    <a class="nav-link" href="../module/actions/enrollment/courses-list.php">
        <i class="fas fa-fw fa-table"></i>
        <span>Matriculas</span></a>
</li>
<?php endif; ?>